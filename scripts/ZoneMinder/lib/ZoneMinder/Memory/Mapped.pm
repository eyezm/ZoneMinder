# ==========================================================================
#
# ZoneMinder Mapped Memory Access Module, $Date: 2008-02-25 10:13:13 +0000 (Mon, 25 Feb 2008) $, $Revision: 2323 $
# Copyright (C) 2001-2008  Philip Coombes
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
#
# ==========================================================================
#
# This module contains the definitions and functions used when accessing mapped memory
#
package ZoneMinder::Memory::Mapped;

use 5.006;
use strict;
use warnings;

require Exporter;
require ZoneMinder::Base;

our @ISA = qw(Exporter ZoneMinder::Base);

# Items to export into callers namespace by default. Note: do not export
# names by default without a very good reason. Use EXPORT_OK instead.
# Do not simply export all your public functions/methods/constants.

# This allows declaration	use ZoneMinder ':all';
# If you do not need this, moving things directly into @EXPORT or @EXPORT_OK
# will save memory.
our %EXPORT_TAGS = (
	'functions' => [ qw(
		zmMemKey
		zmMemAttach
		zmMemDetach
		zmMemGet
		zmMemPut
		zmMemClean
	) ],
);
push( @{$EXPORT_TAGS{all}}, @{$EXPORT_TAGS{$_}} ) foreach keys %EXPORT_TAGS;

our @EXPORT_OK = ( @{ $EXPORT_TAGS{'all'} } );

our @EXPORT = @EXPORT_OK;

our $VERSION = $ZoneMinder::Base::VERSION;

# ==========================================================================
#
# Mapped Memory Facilities
#
# ==========================================================================

use ZoneMinder::Config qw(:all);
use ZoneMinder::Debug qw(:all);

use Sys::Mmap;

sub zmMemKey( $ )
{
	my $monitor = shift;
    return( defined($monitor->{MMapAddr})?$monitor->{MMapAddr}:undef );
}

sub zmMemAttach( $$ )
{
	my $monitor = shift;
	my $size = shift;
	if ( !defined($monitor->{MMapAddr}) )
	{
        my $mmap_file = ZM_PATH_MAP."/zm.mmap.".$monitor->{Id};
        if ( !open( MMAP, "+<".$mmap_file ) )
        {
    		Error( sprintf( "Can't open memory map file '%s': $!\n", $mmap_file ) );
			return( undef );
        }
        my $mmap = undef;
        my $mmap_addr = mmap( $mmap, $size, PROT_READ|PROT_WRITE, MAP_SHARED, \*MMAP );
        if ( !$mmap_addr || !$mmap )
        {
    		Error( sprintf( "Can't mmap to file '%s': $!\n", $mmap_file ) );
			return( undef );
        }
		$monitor->{MMapHandle} = \*MMAP;
		$monitor->{MMapAddr} = $mmap_addr;
		$monitor->{MMap} = \$mmap;
	}
	return( !undef );
}

sub zmMemDetach( $ )
{
	my $monitor = shift;

    if ( $monitor->{MMap} )
    {
        munmap( ${$monitor->{MMap}} );
	    delete $monitor->{MMap};
    }
    if ( $monitor->{MMapAddr} )
    {
	    delete $monitor->{MMapAddr};
    }
    if ( $monitor->{MMapHandle} )
    {
        close( $monitor->{MMapHandle} );
	    delete $monitor->{MMapHandle};
    }
}

sub zmMemGet( $$$ )
{
	my $monitor = shift;
	my $offset = shift;
	my $size = shift;

	my $mmap = $monitor->{MMap};
    if ( !$mmap || !$$mmap )
    {
        Error( sprintf( "Can't read from mapped memory for monitor '%d', gone away?", $monitor->{Id} ) );
        return( undef );
    }
	my $data = substr( $$mmap, $offset, $size );
    return( $data );
}

sub zmMemPut( $$$$ )
{
	my $monitor = shift;
	my $offset = shift;
	my $size = shift;
	my $data = shift;

	my $mmap = $monitor->{MMap};
    if ( !$mmap || !$$mmap )
    {
        Error( sprintf( "Can't write mapped memory for monitor '%d', gone away?", $monitor->{Id} ) );
        return( undef );
    }
	substr( $$mmap, $offset, $size ) = $data;
	return( !undef );
}

sub zmMemClean
{
	Debug( "Removing memory map files\n" );
    my $mapPath = ZM_PATH_MAP."/zm.mmap.*";
    foreach my $mapFile( glob( $mapPath ) )
    {
        ( $mapFile ) = $mapFile =~ /^(.+)$/;
	    Debug( "Removing memory map file '$mapFile'\n" );
        unlink( $mapFile );
    }
}

1;
__END__
