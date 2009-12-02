/*
 * ZoneMinder Signal Handling Interface, $Date$, $Revision$
 * Copyright (C) 2001-2008 Philip Coombes
 * 
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*/  

#ifndef ZM_SIGNAL_H
#define ZM_SIGNAL_H

#include <signal.h>
#include <execinfo.h>

#include "zm.h"

typedef RETSIGTYPE (SigHandler)( int );

extern bool zm_reload;
extern bool zm_terminate;

RETSIGTYPE zmc_hup_handler( int signal );
RETSIGTYPE zmc_term_handler( int signal );
#if HAVE_STRUCT_SIGCONTEXT
RETSIGTYPE zmc_die_handler( int signal, struct sigcontext context );
#elif ( HAVE_SIGINFO_T && HAVE_UCONTEXT_T )
#include <ucontext.h>
RETSIGTYPE zmc_die_handler( int signal, siginfo_t *info, void *context );
#else
RETSIGTYPE zmc_die_handler( int signal );
#endif

void zmSetHupHandler( SigHandler *handler );
void zmSetTermHandler( SigHandler *handler );
void zmSetDieHandler( SigHandler *handler );

void zmSetDefaultHupHandler();
void zmSetDefaultTermHandler();
void zmSetDefaultDieHandler();

#endif // ZM_SIGNAL_H
