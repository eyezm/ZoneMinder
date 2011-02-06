//
// ZoneMinder Local Camera Class Implementation, $Date$, $Revision$
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

#include "zm_local_camera.h"

#include <sys/types.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <unistd.h>
#include <sys/mman.h>
#include <errno.h>

static int vidioctl( int fd, int request, void *arg )
{
    int result = -1;
    do
    {
        result = ioctl( fd, request, arg );
    } while ( result == -1 && errno == EINTR );
    return( result );
}

#if HAVE_LIBSWSCALE
static PixelFormat getFfPixFormatFromV4lPalette( int v4l_version, int palette )
{
    PixelFormat pixFormat = PIX_FMT_NONE;
#ifdef ZM_V4L2
    if ( v4l_version == 2 )
    {
        switch( palette )
        {
#ifdef V4L2_PIX_FMT_RGB444
            case V4L2_PIX_FMT_RGB444 :
                pixFormat = PIX_FMT_RGB32;
                break;
#endif // V4L2_PIX_FMT_RGB444
            case V4L2_PIX_FMT_RGB555 :
                pixFormat = PIX_FMT_RGB555;
                break;
            case V4L2_PIX_FMT_RGB565 :
                pixFormat = PIX_FMT_RGB565;
                break;
            case V4L2_PIX_FMT_BGR24 :
                pixFormat = PIX_FMT_BGR24;
                break;
            case V4L2_PIX_FMT_RGB24 :
                pixFormat = PIX_FMT_RGB24;
                break;
            case V4L2_PIX_FMT_BGR32 :
                pixFormat = PIX_FMT_BGR32;
                break;
            case V4L2_PIX_FMT_RGB32 :
                pixFormat = PIX_FMT_RGB32;
                break;
            case V4L2_PIX_FMT_GREY :
                pixFormat = PIX_FMT_GRAY8;
                break;
            case V4L2_PIX_FMT_YUYV :
                pixFormat = PIX_FMT_YUYV422;
                break;
            case V4L2_PIX_FMT_YUV422P :
                pixFormat = PIX_FMT_YUV422P;
                break;
            case V4L2_PIX_FMT_YUV411P :
                pixFormat = PIX_FMT_YUV411P;
                break;
#ifdef V4L2_PIX_FMT_YUV444
            case V4L2_PIX_FMT_YUV444 :
                pixFormat = PIX_FMT_YUV444P;
                break;
#endif // V4L2_PIX_FMT_YUV444
            case V4L2_PIX_FMT_YUV410 :
                pixFormat = PIX_FMT_YUV410P;
                break;
            case V4L2_PIX_FMT_YUV420 :
                pixFormat = PIX_FMT_YUV420P;
                break;
            case V4L2_PIX_FMT_JPEG :
                pixFormat = PIX_FMT_YUVJ444P;
                break;
            // These don't seem to have ffmpeg equivalents
            // See if you can match any of the ones in the default clause below!?
            case V4L2_PIX_FMT_UYVY :
            case V4L2_PIX_FMT_RGB332 :
            case V4L2_PIX_FMT_RGB555X :
            case V4L2_PIX_FMT_RGB565X :
            //case V4L2_PIX_FMT_Y16 :
            //case V4L2_PIX_FMT_PAL8 :
            case V4L2_PIX_FMT_YVU410 :
            case V4L2_PIX_FMT_YVU420 :
            case V4L2_PIX_FMT_Y41P :
            //case V4L2_PIX_FMT_YUV555 :
            //case V4L2_PIX_FMT_YUV565 :
            //case V4L2_PIX_FMT_YUV32 :
            case V4L2_PIX_FMT_NV12 :
            case V4L2_PIX_FMT_NV21 :
            case V4L2_PIX_FMT_YYUV :
            case V4L2_PIX_FMT_HI240 :
            case V4L2_PIX_FMT_HM12 :
            //case V4L2_PIX_FMT_SBGGR8 :
            //case V4L2_PIX_FMT_SGBRG8 :
            //case V4L2_PIX_FMT_SBGGR16 :
            case V4L2_PIX_FMT_MJPEG :
            case V4L2_PIX_FMT_DV :
            case V4L2_PIX_FMT_MPEG :
            case V4L2_PIX_FMT_WNVA :
            case V4L2_PIX_FMT_SN9C10X :
            case V4L2_PIX_FMT_PWC1 :
            case V4L2_PIX_FMT_PWC2 :
            case V4L2_PIX_FMT_ET61X251 :
            //case V4L2_PIX_FMT_SPCA501 :
            //case V4L2_PIX_FMT_SPCA505 :
            //case V4L2_PIX_FMT_SPCA508 :
            //case V4L2_PIX_FMT_SPCA561 :
            //case V4L2_PIX_FMT_PAC207 :
            //case V4L2_PIX_FMT_PJPG :
            //case V4L2_PIX_FMT_YVYU :
            default :
            {
                Fatal( "Can't find swscale format for palette %d", palette );
                break;
                // These are all spare and may match some of the above
                pixFormat = PIX_FMT_YUVJ420P;
                pixFormat = PIX_FMT_YUVJ422P;
                pixFormat = PIX_FMT_XVMC_MPEG2_MC;
                pixFormat = PIX_FMT_XVMC_MPEG2_IDCT;
                pixFormat = PIX_FMT_UYVY422;
                pixFormat = PIX_FMT_UYYVYY411;
                pixFormat = PIX_FMT_BGR565;
                pixFormat = PIX_FMT_BGR555;
                pixFormat = PIX_FMT_BGR8;
                pixFormat = PIX_FMT_BGR4;
                pixFormat = PIX_FMT_BGR4_BYTE;
                pixFormat = PIX_FMT_RGB8;
                pixFormat = PIX_FMT_RGB4;
                pixFormat = PIX_FMT_RGB4_BYTE;
                pixFormat = PIX_FMT_NV12;
                pixFormat = PIX_FMT_NV21;
                pixFormat = PIX_FMT_RGB32_1;
                pixFormat = PIX_FMT_BGR32_1;
                pixFormat = PIX_FMT_GRAY16BE;
                pixFormat = PIX_FMT_GRAY16LE;
                pixFormat = PIX_FMT_YUV440P;
                pixFormat = PIX_FMT_YUVJ440P;
                pixFormat = PIX_FMT_YUVA420P;
                //pixFormat = PIX_FMT_VDPAU_H264;
                //pixFormat = PIX_FMT_VDPAU_MPEG1;
                //pixFormat = PIX_FMT_VDPAU_MPEG2;
            }
        }
    }
    else
#endif // ZM_V4L2
    if ( v4l_version == 1 )
    {
        switch( palette )
        {
            case VIDEO_PALETTE_RGB555 :
                pixFormat = PIX_FMT_RGB555;
                break;
            case VIDEO_PALETTE_RGB565 :
                pixFormat = PIX_FMT_RGB565;
                break;
            case VIDEO_PALETTE_RGB24 :
                if ( config.local_bgr_invert )
                    pixFormat = PIX_FMT_BGR24;
                else
                    pixFormat = PIX_FMT_RGB24;
                break;
            case VIDEO_PALETTE_GREY :
                pixFormat = PIX_FMT_GRAY8;
                break;
            case VIDEO_PALETTE_YUYV :
            case VIDEO_PALETTE_YUV422 :
                pixFormat = PIX_FMT_YUYV422;
                break;
            case VIDEO_PALETTE_YUV422P :
                pixFormat = PIX_FMT_YUV422P;
                break;
            case VIDEO_PALETTE_YUV420P :
                pixFormat = PIX_FMT_YUV420P;
                break;
            default :
            {
                Fatal( "Can't find swscale format for palette %d", palette );
                break;
                // These are all spare and may match some of the above
                pixFormat = PIX_FMT_YUVJ420P;
                pixFormat = PIX_FMT_YUVJ422P;
                pixFormat = PIX_FMT_YUVJ444P;
                pixFormat = PIX_FMT_XVMC_MPEG2_MC;
                pixFormat = PIX_FMT_XVMC_MPEG2_IDCT;
                pixFormat = PIX_FMT_UYVY422;
                pixFormat = PIX_FMT_UYYVYY411;
                pixFormat = PIX_FMT_BGR565;
                pixFormat = PIX_FMT_BGR555;
                pixFormat = PIX_FMT_BGR8;
                pixFormat = PIX_FMT_BGR4;
                pixFormat = PIX_FMT_BGR4_BYTE;
                pixFormat = PIX_FMT_RGB8;
                pixFormat = PIX_FMT_RGB4;
                pixFormat = PIX_FMT_RGB4_BYTE;
                pixFormat = PIX_FMT_NV12;
                pixFormat = PIX_FMT_NV21;
                pixFormat = PIX_FMT_RGB32_1;
                pixFormat = PIX_FMT_BGR32_1;
                pixFormat = PIX_FMT_GRAY16BE;
                pixFormat = PIX_FMT_GRAY16LE;
                pixFormat = PIX_FMT_YUV440P;
                pixFormat = PIX_FMT_YUVJ440P;
                pixFormat = PIX_FMT_YUVA420P;
                //pixFormat = PIX_FMT_VDPAU_H264;
                //pixFormat = PIX_FMT_VDPAU_MPEG1;
                //pixFormat = PIX_FMT_VDPAU_MPEG2;
            }
        }
    }
    return( pixFormat );
}
#endif // HAVE_LIBSWSCALE

int LocalCamera::camera_count = 0;
int LocalCamera::channel_count = 0;
int LocalCamera::channels[VIDEO_MAX_FRAME];
int LocalCamera::standards[VIDEO_MAX_FRAME];

int LocalCamera::vid_fd = -1;

int LocalCamera::v4l_version = 0;
#ifdef ZM_V4L2
LocalCamera::V4L2Data LocalCamera::v4l2_data;
#endif // ZM_V4L2
LocalCamera::V4L1Data LocalCamera::v4l1_data;

#if HAVE_LIBSWSCALE
AVFrame **LocalCamera::capturePictures = 0;
#endif // HAVE_LIBSWSCALE

unsigned char *LocalCamera::y_table;
signed char *LocalCamera::uv_table;
short *LocalCamera::r_v_table;
short *LocalCamera::g_v_table;
short *LocalCamera::g_u_table;
short *LocalCamera::b_u_table;

LocalCamera *LocalCamera::last_camera = NULL;

LocalCamera::LocalCamera( int p_id, const std::string &p_device, int p_channel, int p_standard, const std::string &p_method, int p_width, int p_height, int p_palette, int p_brightness, int p_contrast, int p_hue, int p_colour, bool p_capture ) :
#ifdef ZM_V4L2
    Camera( p_id, LOCAL_SRC, p_width, p_height, ((p_palette==VIDEO_PALETTE_GREY||p_palette==V4L2_PIX_FMT_GREY)?1:3), p_brightness, p_contrast, p_hue, p_colour, p_capture ),
#else // ZM_V4L2
    Camera( p_id, LOCAL_SRC, p_width, p_height, (p_palette==VIDEO_PALETTE_GREY?1:3), p_brightness, p_contrast, p_hue, p_colour, p_capture ),
#endif // ZM_V4L2
    device( p_device ),
    channel( p_channel ),
    standard( p_standard ),
    palette( p_palette ),
    channel_index( 0 )
{
    // If we are the first, or only, input on this device then
    // do the initial opening etc
    device_prime = (camera_count++ == 0);

    if ( capture )
    {
	    if ( device_prime )
        {
            v4l_version = (p_method=="v4l2"?2:1);
#ifdef ZM_V4L2
            Debug( 2, "V4L2 support enabled, using V4L%d api", v4l_version );
#endif // ZM_V4L2
        }

        if ( !last_camera || channel != last_camera->channel )
        {
            // We are the first, or only, input that uses this channel
            channel_prime = true;
            channel_index = channel_count++;
            channels[channel_index] = channel;
            standards[channel_index] = standard;
        }
        else
        {
            // We are the second, or subsequent, input using this channel
            channel_prime = false;
        }

        if ( last_camera )
        {
            if ( (p_method == "v4l2" && v4l_version != 2) || (p_method == "v4l1" && v4l_version != 1) ) 
                Fatal( "Different Video For Linux version used for monitors sharing same device" );

            if ( standard != last_camera->standard )
                Warning( "Different video standards defined for monitors sharing same device, results may be unpredictable or completely wrong" );

            if ( palette != last_camera->palette )
                Warning( "Different video palettes defined for monitors sharing same device, results may be unpredictable or completely wrong" );

            if ( width != last_camera->width || height != last_camera->height )
                Warning( "Different capture sizes defined for monitors sharing same device, results may be unpredictable or completely wrong" );
        }
#if HAVE_LIBSWSCALE
        imagePixFormat = (colours==1)?PIX_FMT_GRAY8:PIX_FMT_RGB24;
        capturePixFormat = getFfPixFormatFromV4lPalette( v4l_version, palette );
#endif // HAVE_LIBSWSCALE
    }
    last_camera = this;
}

LocalCamera::~LocalCamera()
{
	if ( device_prime && capture )
		Terminate();
}

void LocalCamera::Initialise()
{
#if HAVE_LIBSWSCALE
    if ( zmDbgLevel > ZM_DBG_INF )
        av_log_set_level( AV_LOG_DEBUG );
    else
        av_log_set_level( AV_LOG_QUIET );
#endif // HAVE_LIBSWSCALE

    struct stat st; 

    if ( stat( device.c_str(), &st ) < 0 )
		Fatal( "Failed to stat video device %s: %s", device.c_str(), strerror(errno) );

    if ( !S_ISCHR(st.st_mode) )
		Fatal( "File %s is not device file: %s", device.c_str(), strerror(errno) );

    Debug( 3, "Opening video device %s", device.c_str() );
    //if ( (vid_fd = open( device.c_str(), O_RDWR|O_NONBLOCK, 0 )) < 0 )
    if ( (vid_fd = open( device.c_str(), O_RDWR, 0 )) < 0 )
		Fatal( "Failed to open video device %s: %s", device.c_str(), strerror(errno) );

#ifdef ZM_V4L2
    Debug( 2, "V4L2 support enabled, using V4L%d api", v4l_version );
    if ( v4l_version == 2 )
    {
        struct v4l2_capability vid_cap;

        Debug( 3, "Checking video device capabilities" );
        if ( vidioctl( vid_fd, VIDIOC_QUERYCAP, &vid_cap ) < 0 )
            Fatal( "Failed to query video device: %s", strerror(errno) );

        if ( !(vid_cap.capabilities & V4L2_CAP_VIDEO_CAPTURE) )
            Fatal( "Video device is not video capture device" );

        if ( !(vid_cap.capabilities & V4L2_CAP_STREAMING) )
            Fatal( "Video device does not support streaming i/o" );

        Debug( 3, "Setting up video format" );

        memset( &v4l2_data.fmt, 0, sizeof(v4l2_data.fmt) );
        v4l2_data.fmt.type = V4L2_BUF_TYPE_VIDEO_CAPTURE;

        if ( vidioctl( vid_fd, VIDIOC_G_FMT, &v4l2_data.fmt ) < 0 )
            Fatal( "Failed to get video format: %s", strerror(errno) );

        Debug( 4, " v4l2_data.fmt.type = %08x",  v4l2_data.fmt.type );
        Debug( 4, " v4l2_data.fmt.fmt.pix.width = %08x",  v4l2_data.fmt.fmt.pix.width );
        Debug( 4, " v4l2_data.fmt.fmt.pix.height = %08x",  v4l2_data.fmt.fmt.pix.height );
        Debug( 4, " v4l2_data.fmt.fmt.pix.pixelformat = %08x",  v4l2_data.fmt.fmt.pix.pixelformat );
        Debug( 4, " v4l2_data.fmt.fmt.pix.field = %08x",  v4l2_data.fmt.fmt.pix.field );
        Debug( 4, " v4l2_data.fmt.fmt.pix.bytesperline = %08x",  v4l2_data.fmt.fmt.pix.bytesperline );
        Debug( 4, " v4l2_data.fmt.fmt.pix.sizeimage = %08x",  v4l2_data.fmt.fmt.pix.sizeimage );
        Debug( 4, " v4l2_data.fmt.fmt.pix.colorspace = %08x",  v4l2_data.fmt.fmt.pix.colorspace );
        Debug( 4, " v4l2_data.fmt.fmt.pix.priv = %08x",  v4l2_data.fmt.fmt.pix.priv );

        v4l2_data.fmt.type = V4L2_BUF_TYPE_VIDEO_CAPTURE;
        v4l2_data.fmt.fmt.pix.width = width; 
        v4l2_data.fmt.fmt.pix.height = height;
        v4l2_data.fmt.fmt.pix.pixelformat = palette;

        if ( config.v4l2_capture_fields )
        {
            v4l2_data.fmt.fmt.pix.field = (v4l2_field)config.v4l2_capture_fields;
            if ( vidioctl( vid_fd, VIDIOC_S_FMT, &v4l2_data.fmt ) < 0 )
            {
                Warning( "Failed to set V4L2 field to %d, falling back to auto", config.v4l2_capture_fields );
                v4l2_data.fmt.fmt.pix.field = V4L2_FIELD_ANY;
                if ( vidioctl( vid_fd, VIDIOC_S_FMT, &v4l2_data.fmt ) < 0 )
                    Fatal( "Failed to set video format: %s", strerror(errno) );
            }
        }
        if ( vidioctl( vid_fd, VIDIOC_S_FMT, &v4l2_data.fmt ) < 0 )
            Fatal( "Failed to set video format: %s", strerror(errno) );

        /* Note VIDIOC_S_FMT may change width and height. */
        Debug( 4, " v4l2_data.fmt.type = %08x",  v4l2_data.fmt.type );
        Debug( 4, " v4l2_data.fmt.fmt.pix.width = %08x",  v4l2_data.fmt.fmt.pix.width );
        Debug( 4, " v4l2_data.fmt.fmt.pix.height = %08x",  v4l2_data.fmt.fmt.pix.height );
        Debug( 4, " v4l2_data.fmt.fmt.pix.pixelformat = %08x",  v4l2_data.fmt.fmt.pix.pixelformat );
        Debug( 4, " v4l2_data.fmt.fmt.pix.field = %08x",  v4l2_data.fmt.fmt.pix.field );
        Debug( 4, " v4l2_data.fmt.fmt.pix.bytesperline = %08x",  v4l2_data.fmt.fmt.pix.bytesperline );
        Debug( 4, " v4l2_data.fmt.fmt.pix.sizeimage = %08x",  v4l2_data.fmt.fmt.pix.sizeimage );
        Debug( 4, " v4l2_data.fmt.fmt.pix.colorspace = %08x",  v4l2_data.fmt.fmt.pix.colorspace );
        Debug( 4, " v4l2_data.fmt.fmt.pix.priv = %08x",  v4l2_data.fmt.fmt.pix.priv );

        /* Buggy driver paranoia. */
        unsigned int min;
        min = v4l2_data.fmt.fmt.pix.width * 2;
        if (v4l2_data.fmt.fmt.pix.bytesperline < min)
            v4l2_data.fmt.fmt.pix.bytesperline = min;
        min = v4l2_data.fmt.fmt.pix.bytesperline * v4l2_data.fmt.fmt.pix.height;
        if (v4l2_data.fmt.fmt.pix.sizeimage < min)
            v4l2_data.fmt.fmt.pix.sizeimage = min;

        Debug( 3, "Setting up request buffers" );
       
        memset( &v4l2_data.reqbufs, 0, sizeof(v4l2_data.reqbufs) );
        if ( channel_count > 1 )
            if ( config.v4l_multi_buffer )
                v4l2_data.reqbufs.count = 2*channel_count;
            else
                v4l2_data.reqbufs.count = 1;
        else
            v4l2_data.reqbufs.count = 8;
        v4l2_data.reqbufs.type = v4l2_data.fmt.type;
        v4l2_data.reqbufs.memory = V4L2_MEMORY_MMAP;

        if ( vidioctl( vid_fd, VIDIOC_REQBUFS, &v4l2_data.reqbufs ) < 0 )
        {
            if ( errno == EINVAL )
            {
                Fatal( "Unable to initialise memory mapping, unsupported in device" );
            }
            else
            {
                Fatal( "Unable to initialise memory mapping: %s", strerror(errno) );
            }
        }

        if ( v4l2_data.reqbufs.count < (config.v4l_multi_buffer?2:1) )
            Fatal( "Insufficient buffer memory %d on video device", v4l2_data.reqbufs.count );

        Debug( 3, "Setting up %d data buffers", v4l2_data.reqbufs.count );

        v4l2_data.buffers = new V4L2MappedBuffer[v4l2_data.reqbufs.count];
#if HAVE_LIBSWSCALE
        capturePictures = new AVFrame *[v4l2_data.reqbufs.count];
#endif // HAVE_LIBSWSCALE
        for ( int i = 0; i < v4l2_data.reqbufs.count; i++ )
        {
            struct v4l2_buffer vid_buf;

            memset( &vid_buf, 0, sizeof(vid_buf) );

            //vid_buf.type = V4L2_BUF_TYPE_VIDEO_CAPTURE;
            vid_buf.type = v4l2_data.fmt.type;
            //vid_buf.memory = V4L2_MEMORY_MMAP;
            vid_buf.memory = v4l2_data.reqbufs.memory;
            vid_buf.index = i;

            if ( vidioctl( vid_fd, VIDIOC_QUERYBUF, &vid_buf ) < 0 )
                Fatal( "Unable to query video buffer: %s", strerror(errno) );

            v4l2_data.buffers[i].length = vid_buf.length;
            v4l2_data.buffers[i].start = mmap( NULL, vid_buf.length, PROT_READ|PROT_WRITE, MAP_SHARED, vid_fd, vid_buf.m.offset );

            if ( v4l2_data.buffers[i].start == MAP_FAILED )
                Fatal( "Can't map video buffer %d (%d bytes) to memory: %s(%d)", i, vid_buf.length, strerror(errno), errno );

#if HAVE_LIBSWSCALE
            if ( imagePixFormat != capturePixFormat || v4l2_data.fmt.fmt.pix.width != width || v4l2_data.fmt.fmt.pix.height != height )
            {
                capturePictures[i] = avcodec_alloc_frame();
                if ( !capturePictures[i] )
                    Fatal( "Could not allocate picture" );
                avpicture_fill( (AVPicture *)capturePictures[i], (unsigned char *)v4l2_data.buffers[i].start, capturePixFormat, v4l2_data.fmt.fmt.pix.width, v4l2_data.fmt.fmt.pix.height );
            }
#endif // HAVE_LIBSWSCALE
        }

        Debug( 3, "Configuring video source" );

        if ( vidioctl( vid_fd, VIDIOC_S_INPUT, &channel ) < 0 )
        {
            Fatal( "Failed to set camera source %d: %s", channel, strerror(errno) );
        }

        struct v4l2_input input;
        v4l2_std_id stdId;

        memset( &input, 0, sizeof(input) );

        if ( vidioctl( vid_fd, VIDIOC_ENUMINPUT, &input ) < 0 )
        {
            Fatal( "Failed to enumerate input %d: %s", channel, strerror(errno) );
        }

        if ( (input.std != V4L2_STD_UNKNOWN) && ((input.std & standard) == V4L2_STD_UNKNOWN) )
        {
            Fatal( "Device does not support video standard %d", standard );
        }

        stdId = standard;
        if ( (input.std != V4L2_STD_UNKNOWN) && vidioctl( vid_fd, VIDIOC_S_STD, &stdId ) < 0 )   
        {
            Fatal( "Failed to set video standard %d: %s", standard, strerror(errno) );
        }

        Contrast(contrast);
        Brightness(brightness);
        Hue(hue);
        Colour(colour);
    }
    else
#endif // ZM_V4L2
    if ( v4l_version == 1 )
    {
        Debug( 3, "Configuring picture attributes" );

        struct video_picture vid_pic;
        memset( &vid_pic, 0, sizeof(vid_pic) );
        if ( ioctl( vid_fd, VIDIOCGPICT, &vid_pic) < 0 )
            Fatal( "Failed to get picture attributes: %s", strerror(errno) );

        Debug( 4, "Old P:%d", vid_pic.palette );
        Debug( 4, "Old D:%d", vid_pic.depth );
        Debug( 4, "Old B:%d", vid_pic.brightness );
        Debug( 4, "Old h:%d", vid_pic.hue );
        Debug( 4, "Old Cl:%d", vid_pic.colour );
        Debug( 4, "Old Cn:%d", vid_pic.contrast );

        switch (vid_pic.palette = palette)
        {
            case VIDEO_PALETTE_GREY :
            {
                vid_pic.depth = 8;
                break;
            }
            case VIDEO_PALETTE_RGB565 :
            case VIDEO_PALETTE_YUYV :
            case VIDEO_PALETTE_YUV422 :
            case VIDEO_PALETTE_YUV420P :
            case VIDEO_PALETTE_YUV422P :
            {
                vid_pic.depth = 16;
                break;
            }
            case VIDEO_PALETTE_RGB24 :
            {
                vid_pic.depth = 24;
                break;
            }
        }

        if ( brightness >= 0 ) vid_pic.brightness = brightness;
        if ( hue >= 0 ) vid_pic.hue = hue;
        if ( colour >= 0 ) vid_pic.colour = colour;
        if ( contrast >= 0 ) vid_pic.contrast = contrast;

        if ( ioctl( vid_fd, VIDIOCSPICT, &vid_pic ) < 0 )
        {
            Error( "Failed to set picture attributes: %s", strerror(errno) );
            if ( config.strict_video_config )
                exit(-1);
        }

        Debug( 3, "Configuring window attributes" );

        struct video_window vid_win;
        memset( &vid_win, 0, sizeof(vid_win) );
        if ( ioctl( vid_fd, VIDIOCGWIN, &vid_win) < 0 )
        {
            Error( "Failed to get window attributes: %s", strerror(errno) );
            exit(-1);
        }
        Debug( 4, "Old X:%d", vid_win.x );
        Debug( 4, "Old Y:%d", vid_win.y );
        Debug( 4, "Old W:%d", vid_win.width );
        Debug( 4, "Old H:%d", vid_win.height );
        
        vid_win.x = 0;
        vid_win.y = 0;
        vid_win.width = width;
        vid_win.height = height;
        vid_win.flags &= ~VIDEO_WINDOW_INTERLACE;

        if ( ioctl( vid_fd, VIDIOCSWIN, &vid_win ) < 0 )
        {
            Error( "Failed to set window attributes: %s", strerror(errno) );
            if ( config.strict_video_config )
                exit(-1);
        }

        Info( "vid_win.width = %08x", vid_win.width );
        Info( "vid_win.height = %08x", vid_win.height );
        Info( "vid_win.flags = %08x", vid_win.flags );

        Debug( 3, "Setting up request buffers" );
        if ( ioctl( vid_fd, VIDIOCGMBUF, &v4l1_data.frames ) < 0 )
            Fatal( "Failed to setup memory: %s", strerror(errno) );
        if ( channel_count > 1 && !config.v4l_multi_buffer )
            v4l1_data.frames.frames = 1;
        v4l1_data.buffers = new video_mmap[v4l1_data.frames.frames];
        Debug( 4, "vmb.frames = %d", v4l1_data.frames.frames );
        Debug( 4, "vmb.size = %d", v4l1_data.frames.size );

        Debug( 3, "Setting up %d frame buffers", v4l1_data.frames.frames );

        v4l1_data.bufptr = (unsigned char *)mmap( 0, v4l1_data.frames.size, PROT_READ|PROT_WRITE, MAP_SHARED, vid_fd, 0 );
        if ( v4l1_data.bufptr == MAP_FAILED )
            Fatal( "Could not mmap video: %s", strerror(errno) );

#if HAVE_LIBSWSCALE
        capturePictures = new AVFrame *[v4l1_data.frames.frames];
        for ( int i = 0; i < v4l1_data.frames.frames; i++ )
        {
            v4l1_data.buffers[i].frame = i;
            v4l1_data.buffers[i].width = width;
            v4l1_data.buffers[i].height = height;
            v4l1_data.buffers[i].format = palette;

            if ( imagePixFormat != capturePixFormat )
            {
                capturePictures[i] = avcodec_alloc_frame();
                if ( !capturePictures[i] )
                    Fatal( "Could not allocate picture" );
                avpicture_fill( (AVPicture *)capturePictures[i], (unsigned char *)v4l1_data.bufptr+v4l1_data.frames.offsets[i], capturePixFormat, width, height );
            }
        }
#endif // HAVE_LIBSWSCALE

        Debug( 3, "Configuring video source" );

        struct video_channel vid_src;
        memset( &vid_src, 0, sizeof(vid_src) );
        vid_src.channel = channel;
        if ( ioctl( vid_fd, VIDIOCGCHAN, &vid_src) < 0 )
            Fatal( "Failed to get camera source: %s", strerror(errno) );

        Debug( 4, "Old C:%d", vid_src.channel );
        Debug( 4, "Old F:%d", vid_src.norm );
        Debug( 4, "Old Fl:%x", vid_src.flags );
        Debug( 4, "Old T:%d", vid_src.type );

        vid_src.norm = standard;
        vid_src.flags = 0;
        vid_src.type = VIDEO_TYPE_CAMERA;
        if ( ioctl( vid_fd, VIDIOCSCHAN, &vid_src ) < 0 )
        {
            Error( "Failed to set camera source %d: %s", channel, strerror(errno) );
            if ( config.strict_video_config )
                exit(-1);
        }

        if ( ioctl( vid_fd, VIDIOCGWIN, &vid_win) < 0 )
            Fatal( "Failed to get window data: %s", strerror(errno) );

        Info( "vid_win.width = %08x", vid_win.width );
        Info( "vid_win.height = %08x", vid_win.height );
        Info( "vid_win.flags = %08x", vid_win.flags );

        Debug( 4, "New X:%d", vid_win.x );
        Debug( 4, "New Y:%d", vid_win.y );
        Debug( 4, "New W:%d", vid_win.width );
        Debug( 4, "New H:%d", vid_win.height );
        
        if ( ioctl( vid_fd, VIDIOCGPICT, &vid_pic) < 0 )
            Fatal( "Failed to get window data: %s", strerror(errno) );

        Debug( 4, "New P:%d", vid_pic.palette );
        Debug( 4, "New D:%d", vid_pic.depth );
        Debug( 4, "New B:%d", vid_pic.brightness );
        Debug( 4, "New h:%d", vid_pic.hue );
        Debug( 4, "New Cl:%d", vid_pic.colour );
        Debug( 4, "New Cn:%d", vid_pic.contrast );
    }

    Debug( 3, "Setting up static colour tables" );

	y_table = new unsigned char[256];
	for ( int i = 0; i <= 255; i++ )
	{
		unsigned char c = i;
		if ( c <= 16 )
			y_table[c] = 0;
		else if ( c >= 235 )
			y_table[c] = 255;
		else
			y_table[c] = (255*(c-16))/219;
	}

	uv_table = new signed char[256];
	for ( int i = 0; i <= 255; i++ )
	{
		unsigned char c = i;
		if ( c <= 16 )
			uv_table[c] = -127;
		else if ( c >= 240 )
			uv_table[c] = 127;
		else
			uv_table[c] = (127*(c-128))/112;
	}

	r_v_table = new short[255];
	g_v_table = new short[255];
	g_u_table = new short[255];
	b_u_table = new short[255];
    for ( int i = 0; i < 255; i++ )
    {
        r_v_table[i] = (1402*(i-128))/1000;
        g_u_table[i] = (344*(i-128))/1000;
        g_v_table[i] = (714*(i-128))/1000;
        b_u_table[i] = (1772*(i-128))/1000;
    }
}

void LocalCamera::Terminate()
{
#ifdef ZM_V4L2
    if ( v4l_version == 2 )
    {
        Debug( 3, "Terminating video stream" );
        //enum v4l2_buf_type type = V4L2_BUF_TYPE_VIDEO_CAPTURE;
        enum v4l2_buf_type type = v4l2_data.fmt.type;
        if ( vidioctl( vid_fd, VIDIOC_STREAMOFF, &type ) < 0 )
            Error( "Failed to stop capture stream: %s", strerror(errno) );

        Debug( 3, "Unmapping video buffers" );
        for ( int i = 0; i < v4l2_data.reqbufs.count; i++ )
            if ( munmap( v4l2_data.buffers[i].start, v4l2_data.buffers[i].length ) < 0 )
                Error( "Failed to munmap buffer %d: %s", i, strerror(errno) );
    }
    else
#endif // ZM_V4L2
    if ( v4l_version == 1 )
    {
        Debug( 3, "Unmapping video buffers" );
	    if ( munmap((char*)v4l1_data.bufptr, v4l1_data.frames.size) < 0 )
		    Error( "Failed to munmap buffers: %s", strerror(errno) );

	    delete[] v4l1_data.buffers;
    }

	close( vid_fd );
}

#define capString(test,prefix,yesString,noString,capability) \
    (test) ? (prefix yesString " " capability "\n") : (prefix noString " " capability "\n")

bool LocalCamera::GetCurrentSettings( const char *device, char *output, int version, bool verbose )
{
	output[0] = 0;

    char queryDevice[PATH_MAX] = "";
    int devIndex = 0;
    do
    {
        if ( device )
            strcpy( queryDevice, device );
        else
            sprintf( queryDevice, "/dev/video%d", devIndex );
        if ( (vid_fd = open(queryDevice, O_RDWR)) <= 0 )
        {
            if ( device )
            {
                Error( "Failed to open video device %s: %s", queryDevice, strerror(errno) );
                if ( verbose )
                    sprintf( output+strlen(output), "Error, failed to open video device %s: %s\n", queryDevice, strerror(errno) );
                else
                    sprintf( output+strlen(output), "error%d\n", errno );
                return( false );
            }
            else
            {
                return( true );
            }
        }
        if ( verbose )
            sprintf( output+strlen(output), "Video Device: %s\n", queryDevice );
        else
            sprintf( output+strlen(output), "d:%s|", queryDevice );

#ifdef ZM_V4L2
        if ( version == 2 )
        {
            struct v4l2_capability vid_cap;
            if ( vidioctl( vid_fd, VIDIOC_QUERYCAP, &vid_cap ) < 0 )
            {
                Error( "Failed to query video device: %s", strerror(errno) );
                if ( verbose )
                    sprintf( output, "Error, failed to query video capabilities %s: %s\n", queryDevice, strerror(errno) );
                else
                    sprintf( output, "error%d\n", errno );
                return( false );
            }

            if ( verbose )
            {
                sprintf( output+strlen(output), "General Capabilities\n" );
                sprintf( output+strlen(output), "  Driver: %s\n", vid_cap.driver );
                sprintf( output+strlen(output), "  Card: %s\n", vid_cap.card );
                sprintf( output+strlen(output), "  Bus: %s\n", vid_cap.bus_info );
                sprintf( output+strlen(output), "  Version: %u.%u.%u\n", (vid_cap.version>>16)&0xff, (vid_cap.version>>8)&0xff, vid_cap.version&0xff  );
                sprintf( output+strlen(output), "  Type: 0x%x\n%s%s%s%s%s%s%s%s%s%s%s%s%s%s", vid_cap.capabilities,
                    capString( vid_cap.capabilities&V4L2_CAP_VIDEO_CAPTURE,         "    ", "Supports", "Does not support", "video capture (X)" ),
                    capString( vid_cap.capabilities&V4L2_CAP_VIDEO_OUTPUT,          "    ", "Supports", "Does not support", "video output" ),
                    capString( vid_cap.capabilities&V4L2_CAP_VIDEO_OVERLAY,         "    ", "Supports", "Does not support", "frame buffer overlay" ),
                    capString( vid_cap.capabilities&V4L2_CAP_VBI_CAPTURE,           "    ", "Supports", "Does not support", "VBI capture" ),
                    capString( vid_cap.capabilities&V4L2_CAP_VBI_OUTPUT,            "    ", "Supports", "Does not support", "VBI output" ),
                    capString( vid_cap.capabilities&V4L2_CAP_SLICED_VBI_CAPTURE,    "    ", "Supports", "Does not support", "sliced VBI capture" ),
                    capString( vid_cap.capabilities&V4L2_CAP_SLICED_VBI_OUTPUT,     "    ", "Supports", "Does not support", "sliced VBI output" ),
#ifdef V4L2_CAP_VIDEO_OUTPUT_OVERLAY
                    capString( vid_cap.capabilities&V4L2_CAP_VIDEO_OUTPUT_OVERLAY,  "    ", "Supports", "Does not support", "video output overlay" ),
#else // V4L2_CAP_VIDEO_OUTPUT_OVERLAY
                    "",
#endif // V4L2_CAP_VIDEO_OUTPUT_OVERLAY
                    capString( vid_cap.capabilities&V4L2_CAP_TUNER,                 "    ", "Has", "Does not have", "tuner" ),
                    capString( vid_cap.capabilities&V4L2_CAP_AUDIO,                 "    ", "Has", "Does not have", "audio in and/or out" ),
                    capString( vid_cap.capabilities&V4L2_CAP_RADIO,                 "    ", "Has", "Does not have", "radio" ),
                    capString( vid_cap.capabilities&V4L2_CAP_READWRITE,             "    ", "Supports", "Does not support", "read/write i/o (X)" ),
                    capString( vid_cap.capabilities&V4L2_CAP_ASYNCIO,               "    ", "Supports", "Does not support", "async i/o" ),
                    capString( vid_cap.capabilities&V4L2_CAP_STREAMING,             "    ", "Supports", "Does not support", "streaming i/o (X)" )
                );
            }
            else
            {
                sprintf( output+strlen(output), "D:%s|", vid_cap.driver );
                sprintf( output+strlen(output), "C:%s|", vid_cap.card );
                sprintf( output+strlen(output), "B:%s|", vid_cap.bus_info );
                sprintf( output+strlen(output), "V:%u.%u.%u|", (vid_cap.version>>16)&0xff, (vid_cap.version>>8)&0xff, vid_cap.version&0xff  );
                sprintf( output+strlen(output), "T:0x%x|", vid_cap.capabilities );
            }

            if ( verbose )
                sprintf( output+strlen(output), "    Standards:\n" );
            else
                sprintf( output+strlen(output), "S:" );
            struct v4l2_standard standard;
            int standardIndex = 0;
            do
            {
                memset( &standard, 0, sizeof(standard) );
                standard.index = standardIndex;

                if ( vidioctl( vid_fd, VIDIOC_ENUMSTD, &standard ) < 0 )
                {
                    if ( errno == EINVAL )
                    {
                        standardIndex = -1;
                        break;
                    }
                    else
                    {
                        Error( "Failed to enumerate standard %d: %s", standard.index, strerror(errno) );
                        if ( verbose )
                            sprintf( output, "Error, failed to enumerate standard %d: %s\n", standard.index, strerror(errno) );
                        else
                            sprintf( output, "error%d\n", errno );
                        return( false );
                    }
                }
                if ( verbose )
                    sprintf( output+strlen(output), "      %s\n", standard.name );
                else
                    sprintf( output+strlen(output), "%s/", standard.name );
            }
            while ( standardIndex++ >= 0 );
            if ( !verbose && output[strlen(output)-1] == '/')
                output[strlen(output)-1] = '|';
      
            if ( verbose )
                sprintf( output+strlen(output), "  Formats:\n" );
            else
                sprintf( output+strlen(output), "F:" );
            struct v4l2_fmtdesc format;
            int formatIndex = 0;
            do
            {
                memset( &format, 0, sizeof(format) );
                format.type = V4L2_BUF_TYPE_VIDEO_CAPTURE;
                format.index = formatIndex;

                if ( vidioctl( vid_fd, VIDIOC_ENUM_FMT, &format ) < 0 )
                {
                    if ( errno == EINVAL )
                    {
                        formatIndex = -1;
                        break;
                    }
                    else
                    {
                        Error( "Failed to enumerate format %d: %s", format.index, strerror(errno) );
                        if ( verbose )
                            sprintf( output, "Error, failed to enumerate format %d: %s\n", format.index, strerror(errno) );
                        else
                            sprintf( output, "error%d\n", errno );
                        return( false );
                    }
                }
                if ( verbose )
                    sprintf( output+strlen(output), "    %s (%c%c%c%c)\n", format.description, format.pixelformat&0xff, (format.pixelformat>>8)&0xff, (format.pixelformat>>16)&0xff, (format.pixelformat>>24)&0xff );
                else
                    sprintf( output+strlen(output), "%c%c%c%c/", format.pixelformat&0xff, (format.pixelformat>>8)&0xff, (format.pixelformat>>16)&0xff, (format.pixelformat>>24)&0xff );
            }
            while ( formatIndex++ >= 0 );
            if ( !verbose )
                output[strlen(output)-1] = '|';
      
            struct v4l2_cropcap cropcap;
            memset( &cropcap, 0, sizeof(cropcap) );
            cropcap.type = V4L2_BUF_TYPE_VIDEO_CAPTURE;
            if ( vidioctl( vid_fd, VIDIOC_CROPCAP, &cropcap ) < 0 )
            {
                Error( "Failed to query crop capabilities: %s", strerror(errno) );
                if ( verbose )
                    sprintf( output, "Error, failed to query crop capabilities %s: %s\n", queryDevice, strerror(errno) );
                else
                    sprintf( output, "error%d\n", errno );
                return( false );
            }
            if ( verbose )
            {
                sprintf( output+strlen(output), "Crop Capabilities\n" );
                sprintf( output+strlen(output), "  Bounds: %d x %d\n", cropcap.bounds.width, cropcap.bounds.height );
                sprintf( output+strlen(output), "  Default: %d x %d\n", cropcap.defrect.width, cropcap.defrect.height );
            }
            else
            {
                sprintf( output+strlen(output), "B:%dx%d|", cropcap.bounds.width, cropcap.bounds.height );
            }

            struct v4l2_crop crop;
            memset( &crop, 0, sizeof(crop) );
            crop.type = V4L2_BUF_TYPE_VIDEO_CAPTURE;
            if ( vidioctl( vid_fd, VIDIOC_G_CROP, &crop ) < 0 )
            {
                if ( errno != EINVAL )
                {
                    Error( "Failed to query crop: %s", strerror(errno) );
                    if ( verbose )
                        sprintf( output, "Error, failed to query crop %s: %s\n", queryDevice, strerror(errno) );
                    else
                        sprintf( output, "error%d\n", errno );

                    return( false );
                }
                else if ( verbose )
                {
                    Info( "Does not support VIDIOC_G_CROP");
                }
            }
            else
            {
                if ( verbose )
                sprintf( output+strlen(output), "  Current: %d x %d\n", crop.c.width, crop.c.height );
            }

            struct v4l2_input input;
            int inputIndex = 0;
            do
            {
                memset( &input, 0, sizeof(input) );
                input.index = inputIndex;

                if ( vidioctl( vid_fd, VIDIOC_ENUMINPUT, &input ) < 0 )
                {
                    if ( errno == EINVAL )
                    {
                        break;
                    }
                    else
                    {
                        Error( "Failed to enumerate input %d: %s", input.index, strerror(errno) );
                        if ( verbose )
                            sprintf( output, "Error, failed to enumerate input %d: %s\n", input.index, strerror(errno) );
                        else
                            sprintf( output, "error%d\n", errno );
                        return( false );
                    }
                }
            }
            while ( inputIndex++ >= 0 );

            if ( verbose )
                sprintf( output+strlen(output), "Inputs: %d\n", inputIndex );
            else
                sprintf( output+strlen(output), "I:%d|", inputIndex );

            inputIndex = 0;
            do
            {
                memset( &input, 0, sizeof(input) );
                input.index = inputIndex;

                if ( vidioctl( vid_fd, VIDIOC_ENUMINPUT, &input ) < 0 )
                {
                    if ( errno == EINVAL )
                    {
                        inputIndex = -1;
                        break;
                    }
                    else
                    {
                        Error( "Failed to enumerate input %d: %s", input.index, strerror(errno) );
                        if ( verbose )
                            sprintf( output, "Error, failed to enumerate input %d: %s\n", input.index, strerror(errno) );
                        else
                            sprintf( output, "error%d\n", errno );
                        return( false );
                    }
                }

                if ( vidioctl( vid_fd, VIDIOC_S_INPUT, &input.index ) < 0 )
                {
                    Error( "Failed to set video input %d: %s", input.index, strerror(errno) );
                    if ( verbose )
                        sprintf( output, "Error, failed to switch to input %d: %s\n", input.index, strerror(errno) );
                    else
                        sprintf( output, "error%d\n", errno );
                        return( false );
                }

                if ( verbose )
                {
                    sprintf( output+strlen(output), "  Input %d\n", input.index );
                    sprintf( output+strlen(output), "    Name: %s\n", input.name );
                    sprintf( output+strlen(output), "    Type: %s\n", input.type==V4L2_INPUT_TYPE_TUNER?"Tuner":(input.type==V4L2_INPUT_TYPE_CAMERA?"Camera":"Unknown") );
                    sprintf( output+strlen(output), "    Audioset: %08x\n", input.audioset );
                    sprintf( output+strlen(output), "    Standards: 0x%llx\n", input.std );
                }
                else
                {
                    sprintf( output+strlen(output), "i%d:%s|", input.index, input.name );
                    sprintf( output+strlen(output), "i%dT:%s|", input.index, input.type==V4L2_INPUT_TYPE_TUNER?"Tuner":(input.type==V4L2_INPUT_TYPE_CAMERA?"Camera":"Unknown") );
                    sprintf( output+strlen(output), "i%dS:%llx|", input.index, input.std );
                }

                if ( verbose )
                {
                    sprintf( output+strlen(output), "    %s", capString( input.status&V4L2_IN_ST_NO_POWER, "Power ", "off", "on", " (X)" ) );
                    sprintf( output+strlen(output), "    %s", capString( input.status&V4L2_IN_ST_NO_SIGNAL, "Signal ", "not detected", "detected", " (X)" ) );
                    sprintf( output+strlen(output), "    %s", capString( input.status&V4L2_IN_ST_NO_COLOR, "Colour Signal ", "not detected", "detected", "" ) );
                    sprintf( output+strlen(output), "    %s", capString( input.status&V4L2_IN_ST_NO_H_LOCK, "Horizontal Lock ", "not detected", "detected", "" ) );
                }
                else
                {
                    sprintf( output+strlen(output), "i%dSP:%d|", input.index, input.status&V4L2_IN_ST_NO_POWER?0:1 );
                    sprintf( output+strlen(output), "i%dSS:%d|", input.index, input.status&V4L2_IN_ST_NO_SIGNAL?0:1 );
                    sprintf( output+strlen(output), "i%dSC:%d|", input.index, input.status&V4L2_IN_ST_NO_COLOR?0:1 );
                    sprintf( output+strlen(output), "i%dHP:%d|", input.index, input.status&V4L2_IN_ST_NO_H_LOCK?0:1 );
                }
            }
            while ( inputIndex++ >= 0 );
            if ( !verbose )
                output[strlen(output)-1] = '\n';
        }
        else
#endif // ZM_V4L2
        {
            struct video_capability vid_cap;
            if ( ioctl( vid_fd, VIDIOCGCAP, &vid_cap ) < 0 )
            {
                Error( "Failed to get video capabilities: %s", strerror(errno) );
                if ( verbose )
                    sprintf( output, "Error, failed to get video capabilities %s: %s\n", queryDevice, strerror(errno) );
                else
                    sprintf( output, "error%d\n", errno );
                return( false );
            }
            if ( verbose )
            {
                sprintf( output+strlen(output), "Video Capabilities\n" );
                sprintf( output+strlen(output), "  Name: %s\n", vid_cap.name );
                sprintf( output+strlen(output), "  Type: %d\n%s%s%s%s%s%s%s%s%s%s%s%s%s%s", vid_cap.type,
                    vid_cap.type&VID_TYPE_CAPTURE?"    Can capture\n":"",
                    vid_cap.type&VID_TYPE_TUNER?"    Can tune\n":"",
                    vid_cap.type&VID_TYPE_TELETEXT?"    Does teletext\n":"",
                    vid_cap.type&VID_TYPE_OVERLAY?"    Overlay onto frame buffer\n":"",
                    vid_cap.type&VID_TYPE_CHROMAKEY?"    Overlay by chromakey\n":"",
                    vid_cap.type&VID_TYPE_CLIPPING?"    Can clip\n":"",
                    vid_cap.type&VID_TYPE_FRAMERAM?"    Uses the frame buffer memory\n":"",
                    vid_cap.type&VID_TYPE_SCALES?"    Scalable\n":"",
                    vid_cap.type&VID_TYPE_MONOCHROME?"    Monochrome only\n":"",
                    vid_cap.type&VID_TYPE_SUBCAPTURE?"    Can capture subareas of the image\n":"",
                    vid_cap.type&VID_TYPE_MPEG_DECODER?"    Can decode MPEG streams\n":"",
                    vid_cap.type&VID_TYPE_MPEG_ENCODER?"    Can encode MPEG streams\n":"",
                    vid_cap.type&VID_TYPE_MJPEG_DECODER?"    Can decode MJPEG streams\n":"",
                    vid_cap.type&VID_TYPE_MJPEG_ENCODER?"    Can encode MJPEG streams\n":""
                );
                sprintf( output+strlen(output), "  Video Channels: %d\n", vid_cap.channels );
                sprintf( output+strlen(output), "  Audio Channels: %d\n", vid_cap.audios );
                sprintf( output+strlen(output), "  Maximum Width: %d\n", vid_cap.maxwidth );
                sprintf( output+strlen(output), "  Maximum Height: %d\n", vid_cap.maxheight );
                sprintf( output+strlen(output), "  Minimum Width: %d\n", vid_cap.minwidth );
                sprintf( output+strlen(output), "  Minimum Height: %d\n", vid_cap.minheight );
            }
            else
            {
                sprintf( output+strlen(output), "N:%s|", vid_cap.name );
                sprintf( output+strlen(output), "T:%d|", vid_cap.type );
                sprintf( output+strlen(output), "nC:%d|", vid_cap.channels );
                sprintf( output+strlen(output), "nA:%d|", vid_cap.audios );
                sprintf( output+strlen(output), "mxW:%d|", vid_cap.maxwidth );
                sprintf( output+strlen(output), "mxH:%d|", vid_cap.maxheight );
                sprintf( output+strlen(output), "mnW:%d|", vid_cap.minwidth );
                sprintf( output+strlen(output), "mnH:%d|", vid_cap.minheight );
            }

            struct video_window vid_win;
            if ( ioctl( vid_fd, VIDIOCGWIN, &vid_win ) < 0 )
            {
                Error( "Failed to get window attributes: %s", strerror(errno) );
                if ( verbose )
                    sprintf( output, "Error, failed to get window attributes: %s\n", strerror(errno) );
                else
                    sprintf( output, "error%d\n", errno );
                return( false );
            }
            if ( verbose )
            {
                sprintf( output+strlen(output), "Window Attributes\n" );
                sprintf( output+strlen(output), "  X Offset: %d\n", vid_win.x );
                sprintf( output+strlen(output), "  Y Offset: %d\n", vid_win.y );
                sprintf( output+strlen(output), "  Width: %d\n", vid_win.width );
                sprintf( output+strlen(output), "  Height: %d\n", vid_win.height );
            }
            else
            {
                sprintf( output+strlen(output), "X:%d|", vid_win.x );
                sprintf( output+strlen(output), "Y:%d|", vid_win.y );
                sprintf( output+strlen(output), "W:%d|", vid_win.width );
                sprintf( output+strlen(output), "H:%d|", vid_win.height );
            }

            struct video_picture vid_pic;
            if ( ioctl( vid_fd, VIDIOCGPICT, &vid_pic ) < 0 )
            {
                Error( "Failed to get picture attributes: %s", strerror(errno) );
                if ( verbose )
                    sprintf( output, "Error, failed to get picture attributes: %s\n", strerror(errno) );
                else
                    sprintf( output, "error%d\n", errno );
                return( false );
            }
            if ( verbose )
            {
                sprintf( output+strlen(output), "Picture Attributes\n" );
                sprintf( output+strlen(output), "  Palette: %d - %s\n", vid_pic.palette, 
                    vid_pic.palette==VIDEO_PALETTE_GREY?"Linear greyscale":(
                    vid_pic.palette==VIDEO_PALETTE_HI240?"High 240 cube (BT848)":(
                    vid_pic.palette==VIDEO_PALETTE_RGB565?"565 16 bit RGB":(
                    vid_pic.palette==VIDEO_PALETTE_RGB24?"24bit RGB":(
                    vid_pic.palette==VIDEO_PALETTE_RGB32?"32bit RGB":(
                    vid_pic.palette==VIDEO_PALETTE_RGB555?"555 15bit RGB":(
                    vid_pic.palette==VIDEO_PALETTE_YUV422?"YUV422 capture":(
                    vid_pic.palette==VIDEO_PALETTE_YUYV?"YUYV":(
                    vid_pic.palette==VIDEO_PALETTE_UYVY?"UVYV":(
                    vid_pic.palette==VIDEO_PALETTE_YUV420?"YUV420":(
                    vid_pic.palette==VIDEO_PALETTE_YUV411?"YUV411 capture":(
                    vid_pic.palette==VIDEO_PALETTE_RAW?"RAW capture (BT848)":(
                    vid_pic.palette==VIDEO_PALETTE_YUYV?"YUYV":(
                    vid_pic.palette==VIDEO_PALETTE_YUV422?"YUV422":(
                    vid_pic.palette==VIDEO_PALETTE_YUV422P?"YUV 4:2:2 Planar":(
                    vid_pic.palette==VIDEO_PALETTE_YUV411P?"YUV 4:1:1 Planar":(
                    vid_pic.palette==VIDEO_PALETTE_YUV420P?"YUV 4:2:0 Planar":(
                    vid_pic.palette==VIDEO_PALETTE_YUV410P?"YUV 4:1:0 Planar":"Unknown"
                ))))))))))))))))));
                sprintf( output+strlen(output), "  Colour Depth: %d\n", vid_pic.depth );
                sprintf( output+strlen(output), "  Brightness: %d\n", vid_pic.brightness );
                sprintf( output+strlen(output), "  Hue: %d\n", vid_pic.hue );
                sprintf( output+strlen(output), "  Colour :%d\n", vid_pic.colour );
                sprintf( output+strlen(output), "  Contrast: %d\n", vid_pic.contrast );
                sprintf( output+strlen(output), "  Whiteness: %d\n", vid_pic.whiteness );
            }
            else
            {
                sprintf( output+strlen(output), "P:%d|", vid_pic.palette );
                sprintf( output+strlen(output), "D:%d|", vid_pic.depth );
                sprintf( output+strlen(output), "B:%d|", vid_pic.brightness );
                sprintf( output+strlen(output), "h:%d|", vid_pic.hue );
                sprintf( output+strlen(output), "Cl:%d|", vid_pic.colour );
                sprintf( output+strlen(output), "Cn:%d|", vid_pic.contrast );
                sprintf( output+strlen(output), "w:%d|", vid_pic.whiteness );
            }

            for ( int chan = 0; chan < vid_cap.channels; chan++ )
            {
                struct video_channel vid_src;
                vid_src.channel = chan;
                if ( ioctl( vid_fd, VIDIOCGCHAN, &vid_src ) < 0 )
                {
                    Error( "Failed to get channel %d attributes: %s", chan, strerror(errno) );
                    if ( verbose )
                        sprintf( output, "Error, failed to get channel %d attributes: %s\n", chan, strerror(errno) );
                    else
                        sprintf( output, "error%d\n", errno );
                    return( false );
                }
                if ( verbose )
                {
                    sprintf( output+strlen(output), "Channel %d Attributes\n", chan );
                    sprintf( output+strlen(output), "  Name: %s\n", vid_src.name );
                    sprintf( output+strlen(output), "  Channel: %d\n", vid_src.channel );
                    sprintf( output+strlen(output), "  Flags: %d\n%s%s", vid_src.flags,
                        vid_src.flags&VIDEO_VC_TUNER?"    Channel has a tuner\n":"",
                        vid_src.flags&VIDEO_VC_AUDIO?"    Channel has audio\n":""
                    );
                    sprintf( output+strlen(output), "  Type: %d - %s\n", vid_src.type,
                        vid_src.type==VIDEO_TYPE_TV?"TV":(
                        vid_src.type==VIDEO_TYPE_CAMERA?"Camera":"Unknown"
                    ));
                    sprintf( output+strlen(output), "  Format: %d - %s\n", vid_src.norm,
                        vid_src.norm==VIDEO_MODE_PAL?"PAL":(
                        vid_src.norm==VIDEO_MODE_NTSC?"NTSC":(
                        vid_src.norm==VIDEO_MODE_SECAM?"SECAM":(
                        vid_src.norm==VIDEO_MODE_AUTO?"AUTO":"Unknown"
                    ))));
                }
                else
                {
                    sprintf( output+strlen(output), "n%d:%s|", chan, vid_src.name );
                    sprintf( output+strlen(output), "C%d:%d|", chan, vid_src.channel );
                    sprintf( output+strlen(output), "Fl%d:%x|", chan, vid_src.flags );
                    sprintf( output+strlen(output), "T%d:%d|", chan, vid_src.type );
                    sprintf( output+strlen(output), "F%d:%d%s|", chan, vid_src.norm, chan==(vid_cap.channels-1)?"":"," );
                }
            }
            if ( !verbose )
                output[strlen(output)-1] = '\n';
        }
        close( vid_fd );
        if ( device )
            break;
    }
    while ( ++devIndex < 32 );
	return( true );
}

int LocalCamera::Brightness( int p_brightness )
{
#ifdef ZM_V4L2
    if ( v4l_version == 2 )
    {
        struct v4l2_control vid_control;

        memset( &vid_control, 0, sizeof(vid_control) );
        vid_control.id = V4L2_CID_BRIGHTNESS;

        if ( vidioctl( vid_fd, VIDIOC_G_CTRL, &vid_control ) < 0 )
        {
            if ( errno != EINVAL )
                Error( "Unable to query brightness: %s", strerror(errno) )
            else
                Warning( "Brightness control is not suppported" )
            //Info( "Brightness 1 %d", vid_control.value );
        }
        else if ( p_brightness >= 0 )
        {
            vid_control.value = p_brightness;

            //Info( "Brightness 2 %d", vid_control.value );
            /* The driver may clamp the value or return ERANGE, ignored here */
            if ( vidioctl ( vid_fd, VIDIOC_S_CTRL, &vid_control ) )
            {
                if ( errno != ERANGE )
                    Error( "Unable to set brightness: %s", strerror(errno) )
                else
                    Warning( "Given brightness value (%d) may be out-of-range", p_brightness )
            }
            //Info( "Brightness 3 %d", vid_control.value );
        }
        return( vid_control.value );
    }
    else
#endif // ZM_V4L2
    if ( v4l_version == 1 )
    {
        struct video_picture vid_pic;
        if ( ioctl( vid_fd, VIDIOCGPICT, &vid_pic) < 0 )
        {
            Error( "Failed to get picture attributes: %s", strerror(errno) );
            return( -1 );
        }

        if ( p_brightness >= 0 )
        {
            vid_pic.brightness = p_brightness;
            if ( ioctl( vid_fd, VIDIOCSPICT, &vid_pic ) < 0 )
            {
                Error( "Failed to set picture attributes: %s", strerror(errno) );
                return( -1 );
            }
        }
        return( vid_pic.brightness );
    }
    return( -1 );
}

int LocalCamera::Hue( int p_hue )
{
#ifdef ZM_V4L2
    if ( v4l_version == 2 )
    {
        struct v4l2_control vid_control;

        memset( &vid_control, 0, sizeof(vid_control) );
        vid_control.id = V4L2_CID_HUE;

        if ( vidioctl( vid_fd, VIDIOC_G_CTRL, &vid_control ) < 0 )
        {
            if ( errno != EINVAL )
                Error( "Unable to query hue: %s", strerror(errno) )
            else
                Warning( "Hue control is not suppported" )
        }
        else if ( p_hue >= 0 )
        {
            vid_control.value = p_hue;

            /* The driver may clamp the value or return ERANGE, ignored here */
            if ( vidioctl ( vid_fd, VIDIOC_S_CTRL, &vid_control ) < 0 )
            {
                if ( errno != ERANGE )
                    Error( "Unable to set hue: %s", strerror(errno) )
                else
                    Warning( "Given hue value (%d) may be out-of-range", p_hue )
            }
        }
        return( vid_control.value );
    }
    else
#endif // ZM_V4L2
    if ( v4l_version == 1 )
    {
        struct video_picture vid_pic;
        if ( ioctl( vid_fd, VIDIOCGPICT, &vid_pic) < 0 )
        {
            Error( "Failed to get picture attributes: %s", strerror(errno) );
            return( -1 );
        }

        if ( p_hue >= 0 )
        {
            vid_pic.hue = p_hue;
            if ( ioctl( vid_fd, VIDIOCSPICT, &vid_pic ) < 0 )
            {
                Error( "Failed to set picture attributes: %s", strerror(errno) );
                return( -1 );
            }
        }
        return( vid_pic.hue );
    }
    return( -1 );
}

int LocalCamera::Colour( int p_colour )
{
#ifdef ZM_V4L2
    if ( v4l_version == 2 )
    {
        struct v4l2_control vid_control;

        memset( &vid_control, 0, sizeof(vid_control) );
        vid_control.id = V4L2_CID_SATURATION;

        if ( vidioctl( vid_fd, VIDIOC_G_CTRL, &vid_control ) < 0 )
        {
            if ( errno != EINVAL )
                Error( "Unable to query saturation: %s", strerror(errno) )
            else
                Warning( "Saturation control is not suppported" )
        }
        else if ( p_colour >= 0 )
        {
            vid_control.value = p_colour;

            /* The driver may clamp the value or return ERANGE, ignored here */
            if ( vidioctl ( vid_fd, VIDIOC_S_CTRL, &vid_control ) < 0 )
            {
                if ( errno != ERANGE )
                    Error( "Unable to set saturation: %s", strerror(errno) )
                else
                    Warning( "Given saturation value (%d) may be out-of-range", p_colour )
            }
        }
        return( vid_control.value );
    }
    else
#endif // ZM_V4L2
    if ( v4l_version == 1 )
    {
        struct video_picture vid_pic;
        if ( ioctl( vid_fd, VIDIOCGPICT, &vid_pic) < 0 )
        {
            Error( "Failed to get picture attributes: %s", strerror(errno) );
            return( -1 );
        }

        if ( p_colour >= 0 )
        {
            vid_pic.colour = p_colour;
            if ( ioctl( vid_fd, VIDIOCSPICT, &vid_pic ) < 0 )
            {
                Error( "Failed to set picture attributes: %s", strerror(errno) );
                return( -1 );
            }
        }
        return( vid_pic.colour );
    }
    return( -1 );
}

int LocalCamera::Contrast( int p_contrast )
{
#ifdef ZM_V4L2
    if ( v4l_version == 2 )
    {
        struct v4l2_control vid_control;

        memset( &vid_control, 0, sizeof(vid_control) );
        vid_control.id = V4L2_CID_CONTRAST;

        if ( vidioctl( vid_fd, VIDIOC_G_CTRL, &vid_control ) < 0 )
        {
            if ( errno != EINVAL )
                Error( "Unable to query contrast: %s", strerror(errno) )
            else
                Warning( "Contrast control is not suppported" )
        }
        else if ( p_contrast >= 0 )
        {
            vid_control.value = p_contrast;

            /* The driver may clamp the value or return ERANGE, ignored here */
            if ( vidioctl ( vid_fd, VIDIOC_S_CTRL, &vid_control ) )
            {
                if ( errno != ERANGE )
                    Error( "Unable to set contrast: %s", strerror(errno) )
                else
                    Warning( "Given contrast value (%d) may be out-of-range", p_contrast )
            }
        }
        return( vid_control.value );
    }
    else
#endif // ZM_V4L2
    if ( v4l_version == 1 )
    {
        struct video_picture vid_pic;
        if ( ioctl( vid_fd, VIDIOCGPICT, &vid_pic) < 0 )
        {
            Error( "Failed to get picture attributes: %s", strerror(errno) );
            return( -1 );
        }

        if ( p_contrast >= 0 )
        {
            vid_pic.contrast = p_contrast;
            if ( ioctl( vid_fd, VIDIOCSPICT, &vid_pic ) < 0 )
            {
                Error( "Failed to set picture attributes: %s", strerror(errno) );
                return( -1 );
            }
        }
        return( vid_pic.contrast );
    }
    return( -1 );
}

int LocalCamera::PrimeCapture()
{
    Initialise();

    Debug( 2, "Priming capture" );
#ifdef ZM_V4L2
    if ( v4l_version == 2 )
    {
        Debug( 3, "Queueing buffers" );
        for ( int frame = 0; frame < v4l2_data.reqbufs.count; frame++ )
        {
            struct v4l2_buffer vid_buf;

            memset( &vid_buf, 0, sizeof(vid_buf) );

            vid_buf.type = v4l2_data.fmt.type;
            vid_buf.memory = v4l2_data.reqbufs.memory;
            vid_buf.index = frame;

            if ( vidioctl( vid_fd, VIDIOC_QBUF, &vid_buf ) < 0 )
                Fatal( "Failed to queue buffer %d: %s", frame, strerror(errno) );
        }
        v4l2_data.bufptr = NULL;

        Debug( 3, "Starting video stream" );
        //enum v4l2_buf_type type = V4L2_BUF_TYPE_VIDEO_CAPTURE;
        enum v4l2_buf_type type = v4l2_data.fmt.type;
        if ( vidioctl( vid_fd, VIDIOC_STREAMON, &type ) < 0 )
            Fatal( "Failed to start capture stream: %s", strerror(errno) );
    }
    else
#endif // ZM_V4L2
    if ( v4l_version == 1 )
    {
        for ( int frame = 0; frame < v4l1_data.frames.frames; frame++ )
        {
            Debug( 3, "Queueing frame %d", frame );
            if ( ioctl( vid_fd, VIDIOCMCAPTURE, &v4l1_data.buffers[frame] ) < 0 )
            {
                Error( "Capture failure for frame %d: %s", frame, strerror(errno) );
                return( -1 );
            }
        }
    }

    return( 0 );
}

int LocalCamera::PreCapture()
{
    Debug( 2, "Pre-capturing" );
	return( 0 );
}

int LocalCamera::Capture( Image &image )
{
    Debug( 3, "Capturing" );

    static unsigned char *buffer = 0;

	int captures_per_frame = 1;
	if ( channel_count > 1 )
		captures_per_frame = config.captures_per_frame;
    int captureWidth = width;
    int captureHeight = height;

    // Do the capture, unless we are the second or subsequent camera on a channel, in which case just reuse the buffer
    if ( channel_prime )
    {
        int capture_frame = -1;
#ifdef ZM_V4L2
        if ( v4l_version == 2 )
        {
            static struct v4l2_buffer vid_buf;

            memset( &vid_buf, 0, sizeof(vid_buf) );

            vid_buf.type = v4l2_data.fmt.type;
            //vid_buf.memory = V4L2_MEMORY_MMAP;
            vid_buf.memory = v4l2_data.reqbufs.memory;

            Debug( 3, "Capturing %d frames", captures_per_frame );
            while ( captures_per_frame )
            {
                if ( vidioctl( vid_fd, VIDIOC_DQBUF, &vid_buf ) < 0 )
                {
                    if ( errno == EIO )
                        Warning( "Capture failure, possible signal loss?: %s", strerror(errno) )
                    else
                        Error( "Unable to capture frame %d: %s", vid_buf.index, strerror(errno) )
                    return( -1 );
                }

                v4l2_data.bufptr = &vid_buf;
                capture_frame = v4l2_data.bufptr->index;
                if ( --captures_per_frame )
                {
                    if ( vidioctl( vid_fd, VIDIOC_QBUF, &vid_buf ) < 0 )
                    {
                        Error( "Unable to requeue buffer %d: %s", vid_buf.index, strerror(errno) );
                        return( -1 );
                    }
                }
            }

            Debug( 3, "Captured frame %d/%d from channel %d", capture_frame, v4l2_data.bufptr->sequence, channel );

            buffer = (unsigned char *)v4l2_data.buffers[v4l2_data.bufptr->index].start;

            captureWidth = v4l2_data.fmt.fmt.pix.width;
            captureHeight = v4l2_data.fmt.fmt.pix.height;
        }
        else
#endif // ZM_V4L2
        if ( v4l_version == 1 )
        {
            Debug( 3, "Capturing %d frames", captures_per_frame );
            while ( captures_per_frame )
            {
                Debug( 3, "Syncing frame %d", v4l1_data.active_frame );
                if ( ioctl( vid_fd, VIDIOCSYNC, &v4l1_data.active_frame ) < 0 )
                {
                    Error( "Sync failure for frame %d buffer %d: %s", v4l1_data.active_frame, captures_per_frame, strerror(errno) );
                    return( -1 );
                }
                captures_per_frame--;
                if ( captures_per_frame )
                {
                    Debug( 3, "Capturing frame %d", v4l1_data.active_frame );
                    if ( ioctl( vid_fd, VIDIOCMCAPTURE, &v4l1_data.buffers[v4l1_data.active_frame] ) < 0 )
                    {
                        Error( "Capture failure for buffer %d (%d): %s", v4l1_data.active_frame, captures_per_frame, strerror(errno) );
                        return( -1 );
                    }
                }
            }
            capture_frame = v4l1_data.active_frame;
            Debug( 3, "Captured %d for channel %d", capture_frame, channel );

            buffer = v4l1_data.bufptr+v4l1_data.frames.offsets[capture_frame];
        }
#if HAVE_LIBSWSCALE
        Debug( 3, "Doing format conversion" );

        static struct SwsContext *imgConversionContext = 0;
        static AVFrame *tmpPicture = NULL;

        if ( imagePixFormat != capturePixFormat || captureWidth != width || captureHeight != height )
        {
            if ( !imgConversionContext )
            {
                imgConversionContext = sws_getCachedContext( NULL, captureWidth, captureHeight, capturePixFormat, width, height, imagePixFormat, SWS_BICUBIC, NULL, NULL, NULL );
                if ( !imgConversionContext )
                    Fatal( "Unable to initialise image scaling context" );

                tmpPicture = avcodec_alloc_frame();
                if ( !tmpPicture )
                    Fatal( "Could not allocate temporary picture" );
                int pictureSize = avpicture_get_size( imagePixFormat, width, height );
                uint8_t *tmpPictureBuf = (uint8_t *)av_malloc(pictureSize);
                if (!tmpPictureBuf)
                    Fatal( "Could not allocate temporary picture buffer" );
                avpicture_fill( (AVPicture *)tmpPicture, tmpPictureBuf, imagePixFormat, width, height );
            }
            sws_scale( imgConversionContext, capturePictures[capture_frame]->data, capturePictures[capture_frame]->linesize, 0, height, tmpPicture->data, tmpPicture->linesize );
            buffer = tmpPicture->data[0];
        }
#else // HAVE_LIBSWSCALE 
        static unsigned char temp_buffer[ZM_MAX_IMAGE_SIZE];
        switch( palette )
        {
            case VIDEO_PALETTE_YUV420P :
#ifdef ZM_V4L2
            case V4L2_PIX_FMT_YUV420 :
#endif // ZM_V4L2
            {
                static unsigned char y_plane[ZM_MAX_IMAGE_DIM];
                static char u_plane[ZM_MAX_IMAGE_DIM];
                static char v_plane[ZM_MAX_IMAGE_DIM];

                unsigned char *rgb_ptr = temp_buffer;
                unsigned char *y_ptr = y_plane;
                char *u1_ptr = u_plane;
                char *u2_ptr = u_plane+width;
                char *v1_ptr = v_plane;
                char *v2_ptr = v_plane+width;

                int Y_size = width*height;
                int C_size = Y_size>>2; // Every little bit helps...
                unsigned char *Y_ptr = buffer;
                unsigned char *Cb_ptr = buffer + Y_size;
                unsigned char *Cr_ptr = Cb_ptr + C_size;
                
                int y,u,v;
                for ( int i = 0; i < Y_size; i++ )
                {
                    *y_ptr++ = y_table[*Y_ptr++];
                }
                int half_width = width>>1; // We are the king of optimisations!
                for ( int i = 0, j = 0; i < C_size; i++, j++ )
                {
                    if ( j == half_width )
                    {
                        j = 0;
                        u1_ptr += width;
                        u2_ptr += width;
                        v1_ptr += width;
                        v2_ptr += width;
                    }
                    u = uv_table[*Cb_ptr++];

                    *u1_ptr++ = u;
                    *u1_ptr++ = u;
                    *u2_ptr++ = u;
                    *u2_ptr++ = u;

                    v = uv_table[*Cr_ptr++];

                    *v1_ptr++ = v;
                    *v1_ptr++ = v;
                    *v2_ptr++ = v;
                    *v2_ptr++ = v;
                }

                y_ptr = y_plane;
                u1_ptr = u_plane;
                v1_ptr = v_plane;
                int size = Y_size*3;
                int r,g,b;
                for ( int i = 0; i < size; i += 3 )
                {
                    y = *y_ptr++;
                    u = *u1_ptr++;
                    v = *v1_ptr++;

                    r = y + r_v_table[v];
                    g = y - (g_u_table[u]+g_v_table[v]);
                    b = y + b_u_table[u];

                    *rgb_ptr++ = r<0?0:(r>255?255:r);
                    *rgb_ptr++ = g<0?0:(g>255?255:g);
                    *rgb_ptr++ = b<0?0:(b>255?255:b);
                }
                buffer = temp_buffer;
                break;
            }
            case VIDEO_PALETTE_YUV422P :
#ifdef ZM_V4L2
            case V4L2_PIX_FMT_YUV422P :
#endif // ZM_V4L2
            {
                static unsigned char y_plane[ZM_MAX_IMAGE_DIM];
                static char u_plane[ZM_MAX_IMAGE_DIM];
                static char v_plane[ZM_MAX_IMAGE_DIM];

                unsigned char *rgb_ptr = temp_buffer;
                unsigned char *y_ptr = y_plane;
                char *u1_ptr = u_plane;
                char *v1_ptr = v_plane;

                int Y_size = width*height;
                int C_size = Y_size>>1; // Every little bit helps...
                unsigned char *Y_ptr = buffer;
                unsigned char *Cb_ptr = buffer + Y_size;
                unsigned char *Cr_ptr = Cb_ptr + C_size;
                
                int y,u,v;
                for ( int i = 0; i < Y_size; i++ )
                {
                    *y_ptr++ = y_table[*Y_ptr++];
                }
                for ( int i = 0, j = 0; i < C_size; i++, j++ )
                {
                    u = uv_table[*Cb_ptr++];

                    *u1_ptr++ = u;
                    *u1_ptr++ = u;

                    v = uv_table[*Cr_ptr++];

                    *v1_ptr++ = v;
                    *v1_ptr++ = v;
                }

                y_ptr = y_plane;
                u1_ptr = u_plane;
                v1_ptr = v_plane;
                int size = Y_size*3;
                int r,g,b;
                for ( int i = 0; i < size; i += 3 )
                {
                    y = *y_ptr++;
                    u = *u1_ptr++;
                    v = *v1_ptr++;

                    r = y + r_v_table[v];
                    g = y - (g_u_table[u]+g_v_table[v]);
                    b = y + b_u_table[u];

                    *rgb_ptr++ = r<0?0:(r>255?255:r);
                    *rgb_ptr++ = g<0?0:(g>255?255:g);
                    *rgb_ptr++ = b<0?0:(b>255?255:b);
                }
                buffer = temp_buffer;
                break;
            }
            case VIDEO_PALETTE_YUYV :
            case VIDEO_PALETTE_YUV422 :
#ifdef ZM_V4L2
            case V4L2_PIX_FMT_YUYV :
#endif // ZM_V4L2
            {
                int size = width*height*2;
                unsigned char *s_ptr = buffer;
                unsigned char *d_ptr = temp_buffer;

                int y1,y2,u,v;
                int r,g,b;
                for ( int i = 0; i < size; i += 4 )
                {
                    y1 = *s_ptr++;
                    u = *s_ptr++;
                    y2 = *s_ptr++;
                    v = *s_ptr++;

                    r = y1 + r_v_table[v];
                    g = y1 - (g_u_table[u]+g_v_table[v]);
                    b = y1 + b_u_table[u];

                    *d_ptr++ = r<0?0:(r>255?255:r);
                    *d_ptr++ = g<0?0:(g>255?255:g);
                    *d_ptr++ = b<0?0:(b>255?255:b);

                    r = y2 + r_v_table[v];
                    g = y2 - (g_u_table[u]+g_v_table[v]);
                    b = y2 + b_u_table[u];

                    *d_ptr++ = r<0?0:(r>255?255:r);
                    *d_ptr++ = g<0?0:(g>255?255:g);
                    *d_ptr++ = b<0?0:(b>255?255:b);
                }
                buffer = temp_buffer;
                break;
            }
            case VIDEO_PALETTE_RGB555 :
#ifdef ZM_V4L2
            case V4L2_PIX_FMT_RGB555 :
#endif // ZM_V4L2
            {
                int size = width*height*2;
                unsigned char r,g,b;
                unsigned char *s_ptr = buffer;
                unsigned char *d_ptr = temp_buffer;
                for ( int i = 0; i < size; i += 2 )
                {
                    b = ((*s_ptr)<<3)&0xf8;
                    g = (((*(s_ptr+1))<<6)|((*s_ptr)>>2))&0xf8;
                    r = ((*(s_ptr+1))<<1)&0xf8;

                    *d_ptr++ = r;
                    *d_ptr++ = g;
                    *d_ptr++ = b;
                    s_ptr += 2;
                }
                buffer = temp_buffer;
                break;
            }
            case VIDEO_PALETTE_RGB565 :
#ifdef ZM_V4L2
            case V4L2_PIX_FMT_RGB565 :
#endif // ZM_V4L2
            {
                int size = width*height*2;
                unsigned char r,g,b;
                unsigned char *s_ptr = buffer;
                unsigned char *d_ptr = temp_buffer;
                for ( int i = 0; i < size; i += 2 )
                {
                    b = ((*s_ptr)<<3)&0xf8;
                    g = (((*(s_ptr+1))<<5)|((*s_ptr)>>3))&0xfc;
                    r = (*(s_ptr+1))&0xf8;

                    *d_ptr++ = r;
                    *d_ptr++ = g;
                    *d_ptr++ = b;
                    s_ptr += 2;
                }
                buffer = temp_buffer;
                break;
            }
            case VIDEO_PALETTE_RGB24 :
            {
                if ( config.local_bgr_invert )
                {
                    int size = width*height*3;
                    unsigned char *s_ptr = buffer;
                    unsigned char *d_ptr = temp_buffer;
                    for ( int i = 0; i < size; i += 3 )
                    {
                        *d_ptr++ = *(s_ptr+2);
                        *d_ptr++ = *(s_ptr+1);
                        *d_ptr++ = *s_ptr;
                        s_ptr += 3;
                    }
                    buffer = temp_buffer;
                }
                break;
            }
#ifdef ZM_V4L2
            case V4L2_PIX_FMT_BGR24 :
            {
                int size = width*height*3;
                unsigned char *s_ptr = buffer;
                unsigned char *d_ptr = temp_buffer;
                for ( int i = 0; i < size; i += 3 )
                {
                    *d_ptr++ = *(s_ptr+2);
                    *d_ptr++ = *(s_ptr+1);
                    *d_ptr++ = *s_ptr;
                    s_ptr += 3;
                }
                buffer = temp_buffer;
                break;
            }
#endif // ZM_V4L2
            case VIDEO_PALETTE_GREY :
#ifdef ZM_V4L2
            case V4L2_PIX_FMT_GREY :
#endif // ZM_V4L2
            {
                //int size = width*height;
                //for ( int i = 0; i < size; i++ )
                //{
                    //if ( buffer[i] < 16 )
                        //Info( "Lo grey %d", buffer[i] );
                    //if ( buffer[i] > 235 )
                        //Info( "Hi grey %d", buffer[i] );
                //}
            }
            default : // Everything else is straightforward, for now.
            {
                break;
            }
        }
#endif // HAVE_LIBSWSCALE 
    }

    Debug( 3, "Assigning image" );
	image.Assign( width, height, colours, buffer );

	return( 0 );
}

int LocalCamera::PostCapture()
{
    Debug( 2, "Post-capturing" );
    // Requeue the buffer unless we need to switch or are a duplicate camera on a channel
    if ( channel_count == 1 || channel_prime )
    {
#ifdef ZM_V4L2
        if ( v4l_version == 2 )
        {
            if ( channel_count > 1 )
            {
                int next_channel = (channel_index+1)%channel_count;
                Debug( 3, "Switching video source to %d", channels[next_channel] );
                if ( vidioctl( vid_fd, VIDIOC_S_INPUT, &channels[next_channel] ) < 0 )
                {
                    Error( "Failed to set camera source %d: %s", channels[next_channel], strerror(errno) );
                    return( -1 );
                }

                v4l2_std_id stdId = standards[next_channel];
                if ( vidioctl( vid_fd, VIDIOC_S_STD, &stdId ) < 0 )
                {
                    Error( "Failed to set video format %d: %s", standards[next_channel], strerror(errno) );
                    return( -1 );
                }
            }
            Debug( 3, "Requeueing buffer %d", v4l2_data.bufptr->index );
            if ( vidioctl( vid_fd, VIDIOC_QBUF, v4l2_data.bufptr ) < 0 )
            {
                Error( "Unable to requeue buffer %d: %s", v4l2_data.bufptr->index, strerror(errno) )
                return( -1 );
            }
        }
        else
#endif // ZM_V4L2
        if ( v4l_version == 1 )
        {
            if ( channel_count > 1 )
            {
                Debug( 3, "Switching video source" );
                int next_channel = (channel_index+1)%channel_count;
                struct video_channel vid_src;
                memset( &vid_src, 0, sizeof(vid_src) );
                vid_src.channel = channel;
                if ( ioctl( vid_fd, VIDIOCGCHAN, &vid_src) < 0 )
                {
                    Error( "Failed to get camera source %d: %s", channel, strerror(errno) );
                    return(-1);
                }

                vid_src.channel = channels[next_channel];
                vid_src.norm = standards[next_channel];
                vid_src.flags = 0;
                vid_src.type = VIDEO_TYPE_CAMERA;
                if ( ioctl( vid_fd, VIDIOCSCHAN, &vid_src ) < 0 )
                {
                    Error( "Failed to set camera source %d: %s", channel, strerror(errno) );
                    return( -1 );
                }
            }
            Debug( 3, "Requeueing frame %d", v4l1_data.active_frame );
            if ( ioctl( vid_fd, VIDIOCMCAPTURE, &v4l1_data.buffers[v4l1_data.active_frame] ) < 0 )
            {
                Error( "Capture failure for frame %d: %s", v4l1_data.active_frame, strerror(errno) );
                return( -1 );
            }
            v4l1_data.active_frame = (v4l1_data.active_frame+1)%v4l1_data.frames.frames;
        }
    }
	return( 0 );
}

