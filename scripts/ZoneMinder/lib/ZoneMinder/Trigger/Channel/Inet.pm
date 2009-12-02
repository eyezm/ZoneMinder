# ==========================================================================
#
# ZoneMinder Trigger Channel Handle Module, $Date$, $Revision$
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
# This module contains the class definition of the tcp socket based trigger
# channel class
#
package ZoneMinder::Trigger::Channel::Inet;

use 5.006;
use strict;
use warnings;

require ZoneMinder::Base;
require ZoneMinder::Trigger::Channel::Spawning;

our @ISA = qw(ZoneMinder::Trigger::Channel::Spawning);

our $VERSION = $ZoneMinder::Base::VERSION;

# ==========================================================================
#
# Internet (TCP) based trigger channel
#
# ==========================================================================

use ZoneMinder::Debug qw(:all);

use Carp;
use Socket;

sub new
{
	my $class = shift;
	my %params = @_;
	my $self = ZoneMinder::Trigger::Channel::Spawning->new();
	$self->{selectable} = !undef;
	$self->{port} = $params{port};
	bless( $self, $class );
	return $self;
}

sub open()
{
	my $self = shift;
	local *sfh;
	my $saddr = sockaddr_in( $self->{port}, INADDR_ANY );
	socket( *sfh, PF_INET, SOCK_STREAM, getprotobyname('tcp') ) or croak( "Can't open socket: $!" );
	setsockopt( *sfh, SOL_SOCKET, SO_REUSEADDR, 1 );
	bind( *sfh, $saddr ) or croak( "Can't bind: $!" );
	listen( *sfh, SOMAXCONN ) or croak( "Can't listen: $!" );
	$self->{state} = 'open';
	$self->{handle} = *sfh;
}

sub _spawn( $ )
{
	my $self = shift;
	my $new_handle = shift;
	my $clone = $self->clone();
	$clone->{handle} = $new_handle;
	$clone->{state} = 'connected';
	return( $clone );
}

sub accept()
{
	my $self = shift;
	local *cfh;
	my $paddr = accept( *cfh, $self->{handle} );
	return( $self->_spawn( *cfh ) );
}

1;
__END__
# Below is stub documentation for your module. You'd better edit it!

=head1 NAME

ZoneMinder::Database - Perl extension for blah blah blah

=head1 SYNOPSIS

  use ZoneMinder::Database;
  blah blah blah

=head1 DESCRIPTION

Stub documentation for ZoneMinder, created by h2xs. It looks like the
author of the extension was negligent enough to leave the stub
unedited.

Blah blah blah.

=head2 EXPORT

None by default.



=head1 SEE ALSO

Mention other useful documentation such as the documentation of
related modules or operating system documentation (such as man pages
in UNIX), or any relevant external documentation such as RFCs or
standards.

If you have a mailing list set up for your module, mention it here.

If you have a web site set up for your module, mention it here.

=head1 AUTHOR

Philip Coombes, E<lt>philip.coombes@zoneminder.comE<gt>

=head1 COPYRIGHT AND LICENSE

Copyright (C) 2001-2008  Philip Coombes

This library is free software; you can redistribute it and/or modify
it under the same terms as Perl itself, either Perl version 5.8.3 or,
at your option, any later version of Perl 5 you may have available.


=cut
