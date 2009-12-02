//
// ZoneMinder Camera Class Interface, $Date$, $Revision$
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

#ifndef ZM_CAMERA_H
#define ZM_CAMERA_H

#include <sys/types.h>
#include <sys/ioctl.h>

#include "zm_image.h"

//
// Abstract base class for cameras. This is intended just to express
// common attributes
//
class Camera
{
protected:
	typedef enum { LOCAL_SRC, REMOTE_SRC, FILE_SRC, FFMPEG_SRC } SourceType;

    int             id;
	SourceType		type;
	unsigned int	width;
	unsigned int	height;
	unsigned int	colours;
	unsigned int	pixels;
	int				brightness;
	int				hue;
	int				colour;
	int				contrast;
    bool            capture;

public:
	Camera( int p_id, SourceType p_type, int p_width, int p_height, int p_colours, int p_brightness, int p_contrast, int p_hue, int p_colour, bool p_capture );
	virtual ~Camera();

    int getId() const { return( id ); }
	SourceType Type() const { return( type ); }
	bool IsLocal() const { return( type == LOCAL_SRC ); }
	bool IsRemote() const { return( type == REMOTE_SRC ); }
	bool IsFile() const { return( type == FILE_SRC ); }
	bool IsFfmpeg() const { return( type == FFMPEG_SRC ); }
	unsigned int Width() const { return( width ); }
	unsigned int Height() const { return( height ); }
	unsigned int Colours() const { return( colours ); }
	unsigned int ImageSize() const { return( pixels ); }

	virtual int Brightness( int/*p_brightness*/=-1 ) { return( -1 ); }
	virtual int Hue( int/*p_hue*/=-1 ) { return( -1 ); }
	virtual int Colour( int/*p_colour*/=-1 ) { return( -1 ); }
	virtual int Contrast( int/*p_contrast*/=-1 ) { return( -1 ); }

    bool CanCapture() const { return( capture ); }
    
	virtual int PrimeCapture() { return( 0 ); }
	virtual int PreCapture()=0;
	virtual int Capture( Image &image )=0;
	virtual int PostCapture()=0;
};

#endif // ZM_CAMERA_H
