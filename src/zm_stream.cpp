//
// ZoneMinder Stream Class Implementation, $Date$, $Revision$
// Copyright (C) 2001-2008 Philip Coombes
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
//

#include <sys/un.h>

#include "zm.h"
#include "zm_mpeg.h"
#include "zm_monitor.h"

#include "zm_stream.h"

StreamBase::~StreamBase()
{
    closeComms();
}

bool StreamBase::loadMonitor( int monitor_id )
{
    if ( !(monitor = Monitor::Load( monitor_id, false, Monitor::QUERY )) )
    {
        Fatal( "Unable to load monitor id %d for streaming", monitor_id );
        return( false );
    }
    return( true );
}

bool StreamBase::checkInitialised()
{
    if ( !monitor )
    {
        Fatal( "Cannot stream, not initialised" );
        return( false );
    }
    return( true );
}

void StreamBase::updateFrameRate( double fps )
{
    base_fps = fps;
    effective_fps = (base_fps*abs(replay_rate))/ZM_RATE_BASE;
    frame_mod = 1;
    Debug( 3, "FPS:%.2f, MXFPS:%.2f, BFPS:%.2f, EFPS:%.2f, FM:%d", fps, maxfps, base_fps, effective_fps, frame_mod );
    // Min frame repeat?
    while( effective_fps > maxfps )
    {
        effective_fps /= 2.0;
        frame_mod *= 2;
    }
    Debug( 3, "aEFPS:%.2f, aFM:%d", effective_fps, frame_mod );
}

bool StreamBase::checkCommandQueue()
{
    if ( sd >= 0 )
    {
        CmdMsg msg;
        memset( &msg, 0, sizeof(msg) );
        int nbytes = recvfrom( sd, &msg, sizeof(msg), MSG_DONTWAIT, 0, 0 );
        if ( nbytes < 0 )
        {
            if ( errno != EAGAIN )
            {
                Fatal( "recvfrom(), errno = %d, error = %s", errno, strerror(errno) );
            }
        }
        //else if ( (nbytes != sizeof(msg)) )
        //{
            //Error( "Partial message received, expected %d bytes, got %d", sizeof(msg), nbytes );
        //}
        else
        {
            processCommand( &msg );
            return( true );
        }
    }
    return( false );
}

Image *StreamBase::prepareImage( Image *image )
{
    static int last_scale = 0;
    static int last_zoom = 0;
    static int last_x = 0;
    static int last_y = 0;

    if ( !last_scale )
        last_scale = scale;
    if ( !last_zoom )
        last_zoom = zoom;

    // Do not bother to scale zoomed in images, just crop them and let the browser scale
    // Works in FF2 but breaks FF3 which doesn't like image sizes changing in mid stream.
    bool optimisedScaling = false;

    bool image_copied = false;

    int mag = (scale * zoom) / ZM_SCALE_BASE;
    int act_mag = optimisedScaling?(mag > ZM_SCALE_BASE?ZM_SCALE_BASE:mag):mag;
    Debug( 3, "Scaling by %d, zooming by %d = magnifying by %d(%d)", scale, zoom, mag, act_mag );

    int last_mag = (last_scale * last_zoom) / ZM_SCALE_BASE;
    int last_act_mag = last_mag > ZM_SCALE_BASE?ZM_SCALE_BASE:last_mag;
    Debug( 3, "Last scaling by %d, zooming by %d = magnifying by %d(%d)", last_scale, last_zoom, last_mag, last_act_mag );

    int base_image_width = image->Width(), base_image_height = image->Height();
    Debug( 3, "Base image width = %d, height = %d", base_image_width, base_image_height );

    int virt_image_width = (base_image_width * mag) / ZM_SCALE_BASE, virt_image_height = (base_image_height * mag) / ZM_SCALE_BASE;
    Debug( 3, "Virtual image width = %d, height = %d", virt_image_width, virt_image_height );

    int last_virt_image_width = (base_image_width * last_mag) / ZM_SCALE_BASE, last_virt_image_height = (base_image_height * last_mag) / ZM_SCALE_BASE;
    Debug( 3, "Last virtual image width = %d, height = %d", last_virt_image_width, last_virt_image_height );

    int act_image_width = (base_image_width * act_mag ) / ZM_SCALE_BASE, act_image_height = (base_image_height * act_mag ) / ZM_SCALE_BASE;
    Debug( 3, "Actual image width = %d, height = %d", act_image_width, act_image_height );

    int last_act_image_width = (base_image_width * last_act_mag ) / ZM_SCALE_BASE, last_act_image_height = (base_image_height * last_act_mag ) / ZM_SCALE_BASE;
    Debug( 3, "Last actual image width = %d, height = %d", last_act_image_width, last_act_image_height );

    int disp_image_width = (image->Width() * scale) / ZM_SCALE_BASE, disp_image_height = (image->Height() * scale) / ZM_SCALE_BASE;
    Debug( 3, "Display image width = %d, height = %d", disp_image_width, disp_image_height );

    int last_disp_image_width = (image->Width() * last_scale) / ZM_SCALE_BASE, last_disp_image_height = (image->Height() * last_scale) / ZM_SCALE_BASE;
    Debug( 3, "Last display image width = %d, height = %d", last_disp_image_width, last_disp_image_height );

    int send_image_width = (disp_image_width * act_mag ) / mag, send_image_height = (disp_image_height * act_mag ) / mag;
    Debug( 3, "Send image width = %d, height = %d", send_image_width, send_image_height );

    int last_send_image_width = (last_disp_image_width * last_act_mag ) / last_mag, last_send_image_height = (last_disp_image_height * last_act_mag ) / last_mag;
    Debug( 3, "Last send image width = %d, height = %d", last_send_image_width, last_send_image_height );

    if ( mag != ZM_SCALE_BASE )
    {
        if ( act_mag != ZM_SCALE_BASE )
        {
            Debug( 3, "Magnifying by %d", mag );
            if ( !image_copied )
            {
	            static Image copy_image;
                copy_image.Assign( *image );
                image = &copy_image;
                image_copied = true;
            }
            image->Scale( mag );
        }
    }

    Debug( 3, "Real image width = %d, height = %d", image->Width(), image->Height() );

    if ( disp_image_width < virt_image_width || disp_image_height < virt_image_height )
    {
        static Box last_crop;

        if ( mag != last_mag || x != last_x || y != last_y )
        {
            Debug( 3, "Got click at %d,%d x %d", x, y, mag );

            //if ( !last_mag )
                //last_mag = mag;

            if ( !(last_disp_image_width < last_virt_image_width || last_disp_image_height < last_virt_image_height) )
                last_crop = Box();

            Debug( 3, "Recalculating crop" );
            // Recalculate crop parameters, as %ges
            int click_x = (last_crop.LoX() * 100 ) / last_act_image_width; // Initial crop offset from last image
            click_x += ( x * 100 ) / last_virt_image_width;
            int click_y = (last_crop.LoY() * 100 ) / last_act_image_height; // Initial crop offset from last image
            click_y += ( y * 100 ) / last_virt_image_height;
            Debug( 3, "Got adjusted click at %d%%,%d%%", click_x, click_y );

            // Convert the click locations to the current image pixels
            click_x = ( click_x * act_image_width ) / 100;
            click_y = ( click_y * act_image_height ) / 100;
            Debug( 3, "Got readjusted click at %d,%d", click_x, click_y );

            int lo_x = click_x - (send_image_width/2);
            if ( lo_x < 0 )
                lo_x = 0;
            int hi_x = lo_x + (send_image_width-1);
            if ( hi_x >= act_image_width )
            {
                hi_x = act_image_width - 1;
                lo_x = hi_x - (send_image_width - 1);
            }

            int lo_y = click_y - (send_image_height/2);
            if ( lo_y < 0 )
                lo_y = 0;
            int hi_y = lo_y + (send_image_height-1);
            if ( hi_y >= act_image_height )
            {
                hi_y = act_image_height - 1;
                lo_y = hi_y - (send_image_height - 1);
            }
            last_crop = Box( lo_x, lo_y, hi_x, hi_y );
        }
        Debug( 3, "Cropping to %d,%d -> %d,%d", last_crop.LoX(), last_crop.LoY(), last_crop.HiX(), last_crop.HiY() );
        if ( !image_copied )
        {
	        static Image copy_image;
            copy_image.Assign( *image );
            image = &copy_image;
            image_copied = true;
        }
        image->Crop( last_crop );
    }
    last_scale = scale;
    last_zoom = zoom;
    last_x = x;
    last_y = y;

    return( image );
}

bool StreamBase::sendTextFrame( const char *frame_text )
{
    Debug( 2, "Sending text frame '%s'", frame_text );

    Image image( monitor->Width(), monitor->Height(), monitor->Colours() );
    image.Annotate( frame_text, image.centreCoord( frame_text ) );

    if ( scale != 100 )
    {
        image.Scale( scale );
    }
#if HAVE_LIBAVCODEC
    if ( type == STREAM_MPEG )
    {
        if ( !vid_stream )
        {
            vid_stream = new VideoStream( "pipe:", format, bitrate, effective_fps, image.Colours(), image.Width(), image.Height() );
            fprintf( stdout, "Content-type: %s\r\n\r\n", vid_stream->MimeType() );
            vid_stream->OpenStream();
        }
        /* double pts = */ vid_stream->EncodeFrame( image.Buffer(), image.Size() );
    }
    else
#endif // HAVE_LIBAVCODEC
    {
        static unsigned char buffer[ZM_MAX_IMAGE_SIZE];
        int n_bytes = 0;

        image.EncodeJpeg( buffer, &n_bytes );

        fprintf( stdout, "--ZoneMinderFrame\r\n" );
        fprintf( stdout, "Content-Length: %d\r\n", n_bytes );
        fprintf( stdout, "Content-Type: image/jpeg\r\n\r\n" );
        if ( fwrite( buffer, n_bytes, 1, stdout ) )
        {
            Error( "Unable to send stream text frame: %s", strerror(errno) );
            return( false );
        }
        fprintf( stdout, "\r\n\r\n" );
        fflush( stdout );
    }
    last_frame_sent = TV_2_FLOAT( now );
    return( true );
}

void StreamBase::openComms()
{
    if ( connkey > 0 )
    {
        sd = socket( AF_UNIX, SOCK_DGRAM, 0 );
        if ( sd < 0 )
        {
            Fatal( "Can't create socket: %s", strerror(errno) );
        }

        snprintf( loc_sock_path, sizeof(loc_sock_path), "%s/zms-%06ds.sock", config.path_socks, connkey );
        unlink( loc_sock_path );

        strncpy( loc_addr.sun_path, loc_sock_path, sizeof(loc_addr.sun_path) );
        loc_addr.sun_family = AF_UNIX;
        if ( bind( sd, (struct sockaddr *)&loc_addr, strlen(loc_addr.sun_path)+sizeof(loc_addr.sun_family)) < 0 )
        {
            Fatal( "Can't bind: %s", strerror(errno) );
        }

        snprintf( rem_sock_path, sizeof(rem_sock_path), "%s/zms-%06dw.sock", config.path_socks, connkey );
        strncpy( rem_addr.sun_path, rem_sock_path, sizeof(rem_addr.sun_path) );
        rem_addr.sun_family = AF_UNIX;
    }
}

void StreamBase::closeComms()
{
    if ( connkey > 0 )
    {
        if ( sd >= 0 )
        {
            close( sd );
            sd = -1;
        }
        if ( loc_sock_path[0] )
        {
            unlink( loc_sock_path );
        }
    }
}

