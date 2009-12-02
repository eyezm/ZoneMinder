# ==========================================================================
#
# ZoneMinder Axis version 2 API Control Protocol Module, $Date$, $Revision$
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
# This module contains the implementation of the Axis V2 API camera control
# protocol
#
package ZoneMinder::Control::AxisV2;

use 5.006;
use strict;
use warnings;

require ZoneMinder::Base;
require ZoneMinder::Control;

our @ISA = qw(ZoneMinder::Control);

our $VERSION = $ZoneMinder::Base::VERSION;

# ==========================================================================
#
# Axis V2 Control Protocol
#
# ==========================================================================

use ZoneMinder::Debug qw(:all);
use ZoneMinder::Config qw(:all);

use Time::HiRes qw( usleep );

sub new
{
    my $class = shift;
    my $id = shift;
    my $self = ZoneMinder::Control->new( $id );
    bless( $self, $class );
    srand( time() );
    return $self;
}

our $AUTOLOAD;

sub AUTOLOAD
{
    my $self = shift;
    my $class = ref($self) || croak( "$self not object" );
    my $name = $AUTOLOAD;
    $name =~ s/.*://;
    if ( exists($self->{$name}) )
    {
        return( $self->{$name} );
    }
    Fatal( "Can't access $name member of object of class $class" );
}

sub open
{
    my $self = shift;

    $self->loadMonitor();

    use LWP::UserAgent;
    $self->{ua} = LWP::UserAgent->new;
    $self->{ua}->agent( "ZoneMinder Control Agent/".ZM_VERSION );

    $self->{state} = 'open';
}

sub close
{
    my $self = shift;
    $self->{state} = 'closed';
}

sub printMsg
{
    my $self = shift;
    my $msg = shift;
    my $msg_len = length($msg);

    Debug( $msg."[".$msg_len."]" );
}

sub sendCmd
{
    my $self = shift;
    my $cmd = shift;

    my $result = undef;

    printMsg( $cmd, "Tx" );

    #print( "http://$address/$cmd\n" );
    my $req = HTTP::Request->new( GET=>"http://".$self->{Monitor}->{ControlAddress}."/$cmd" );
    my $res = $self->{ua}->request($req);

    if ( $res->is_success )
    {
        $result = !undef;
    }
    else
    {
        Error( "Error check failed: '".$res->status_line()."'" );
    }

    return( $result );
}

sub cameraReset
{
    my $self = shift;
    Debug( "Camera Reset" );
    my $cmd = "/axis-cgi/admin/restart.cgi";
    $self->sendCmd( $cmd );
}

sub moveConUp
{
    my $self = shift;
    Debug( "Move Up" );
    my $cmd = "/axis-cgi/com/ptz.cgi?move=up";
    $self->sendCmd( $cmd );
}

sub moveConDown
{
    my $self = shift;
    Debug( "Move Down" );
    my $cmd = "/axis-cgi/com/ptz.cgi?move=down";
    $self->sendCmd( $cmd );
}

sub moveConLeft
{
    my $self = shift;
    Debug( "Move Left" );
    my $cmd = "/axis-cgi/com/ptz.cgi?move=left";
    $self->sendCmd( $cmd );
}

sub moveConRight
{
    my $self = shift;
    Debug( "Move Right" );
    my $cmd = "/axis-cgi/com/ptz.cgi?move=right";
    $self->sendCmd( $cmd );
}

sub moveConUpRight
{
    my $self = shift;
    Debug( "Move Up/Right" );
    my $cmd = "/axis-cgi/com/ptz.cgi?move=upright";
    $self->sendCmd( $cmd );
}

sub moveConUpLeft
{
    my $self = shift;
    Debug( "Move Up/Left" );
    my $cmd = "/axis-cgi/com/ptz.cgi?move=upleft";
    $self->sendCmd( $cmd );
}

sub moveConDownRight
{
    my $self = shift;
    Debug( "Move Down/Right" );
    my $cmd = "/axis-cgi/com/ptz.cgi?move=downright";
    $self->sendCmd( $cmd );
}

sub moveConDownLeft
{
    my $self = shift;
    Debug( "Move Down/Left" );
    my $cmd = "/axis-cgi/com/ptz.cgi?move=downleft";
    $self->sendCmd( $cmd );
}

sub moveMap
{
    my $self = shift;
    my $params = shift;
    my $xcoord = $self->getParam( $params, 'xcoord' );
    my $ycoord = $self->getParam( $params, 'ycoord' );
    Debug( "Move Map to $xcoord,$ycoord" );
    my $cmd = "/axis-cgi/com/ptz.cgi?center=$xcoord,$ycoord&imagewidth=".$self->{Monitor}->{Width}."&imageheight=".$self->{Monitor}->{Height};
    $self->sendCmd( $cmd );
}

sub moveRelUp
{
    my $self = shift;
    my $params = shift;
    my $step = $self->getParam( $params, 'tiltstep' );
    Debug( "Step Up $step" );
    my $cmd = "/axis-cgi/com/ptz.cgi?rtilt=$step";
    $self->sendCmd( $cmd );
}

sub moveRelDown
{
    my $self = shift;
    my $params = shift;
    my $step = $self->getParam( $params, 'tiltstep' );
    Debug( "Step Down $step" );
    my $cmd = "/axis-cgi/com/ptz.cgi?rtilt=-$step";
    $self->sendCmd( $cmd );
}

sub moveRelLeft
{
    my $self = shift;
    my $params = shift;
    my $step = $self->getParam( $params, 'panstep' );
    Debug( "Step Left $step" );
    my $cmd = "/axis-cgi/com/ptz.cgi?rpan=-$step";
    $self->sendCmd( $cmd );
}

sub moveRelRight
{
    my $self = shift;
    my $params = shift;
    my $step = $self->getParam( $params, 'panstep' );
    Debug( "Step Right $step" );
    my $cmd = "/axis-cgi/com/ptz.cgi?rpan=$step";
    $self->sendCmd( $cmd );
}

sub moveRelUpRight
{
    my $self = shift;
    my $params = shift;
    my $panstep = $self->getParam( $params, 'panstep' );
    my $tiltstep = $self->getParam( $params, 'tiltstep' );
    Debug( "Step Up/Right $tiltstep/$panstep" );
    my $cmd = "/axis-cgi/com/ptz.cgi?rpan=$panstep&rtilt=$tiltstep";
    $self->sendCmd( $cmd );
}

sub moveRelUpLeft
{
    my $self = shift;
    my $params = shift;
    my $panstep = $self->getParam( $params, 'panstep' );
    my $tiltstep = $self->getParam( $params, 'tiltstep' );
    Debug( "Step Up/Left $tiltstep/$panstep" );
    my $cmd = "/axis-cgi/com/ptz.cgi?rpan=-$panstep&rtilt=$tiltstep";
    $self->sendCmd( $cmd );
}

sub moveRelDownRight
{
    my $self = shift;
    my $params = shift;
    my $panstep = $self->getParam( $params, 'panstep' );
    my $tiltstep = $self->getParam( $params, 'tiltstep' );
    Debug( "Step Down/Right $tiltstep/$panstep" );
    my $cmd = "/axis-cgi/com/ptz.cgi?rpan=$panstep&rtilt=-$tiltstep";
    $self->sendCmd( $cmd );
}

sub moveRelDownLeft
{
    my $self = shift;
    my $params = shift;
    my $panstep = $self->getParam( $params, 'panstep' );
    my $tiltstep = $self->getParam( $params, 'tiltstep' );
    Debug( "Step Down/Left $tiltstep/$panstep" );
    my $cmd = "/axis-cgi/com/ptz.cgi?rpan=-$panstep&rtilt=-$tiltstep";
    $self->sendCmd( $cmd );
}

sub zoomRelTele
{
    my $self = shift;
    my $params = shift;
    my $step = $self->getParam( $params, 'step' );
    Debug( "Zoom Tele" );
    my $cmd = "/axis-cgi/com/ptz.cgi?rzoom=$step";
    $self->sendCmd( $cmd );
}

sub zoomRelWide
{
    my $self = shift;
    my $params = shift;
    my $step = $self->getParam( $params, 'step' );
    Debug( "Zoom Wide" );
    my $cmd = "/axis-cgi/com/ptz.cgi?rzoom=-$step";
    $self->sendCmd( $cmd );
}

sub focusRelNear
{
    my $self = shift;
    my $params = shift;
    my $step = $self->getParam( $params, 'step' );
    Debug( "Focus Near" );
    my $cmd = "/axis-cgi/com/ptz.cgi?rfocus=-$step";
    $self->sendCmd( $cmd );
}

sub focusRelFar
{
    my $self = shift;
    my $params = shift;
    my $step = $self->getParam( $params, 'step' );
    Debug( "Focus Far" );
    my $cmd = "/axis-cgi/com/ptz.cgi?rfocus=$step";
    $self->sendCmd( $cmd );
}

sub focusAuto
{
    my $self = shift;
    Debug( "Focus Auto" );
    my $cmd = "/axis-cgi/com/ptz.cgi?autofocus=on";
    $self->sendCmd( $cmd );
}

sub focusMan
{
    my $self = shift;
    Debug( "Focus Manual" );
    my $cmd = "/axis-cgi/com/ptz.cgi?autofocus=off";
    $self->sendCmd( $cmd );
}

sub irisRelOpen
{
    my $self = shift;
    my $params = shift;
    my $step = $self->getParam( $params, 'step' );
    Debug( "Iris Open" );
    my $cmd = "/axis-cgi/com/ptz.cgi?riris=$step";
    $self->sendCmd( $cmd );
}

sub irisRelClose
{
    my $self = shift;
    my $params = shift;
    my $step = $self->getParam( $params, 'step' );
    Debug( "Iris Close" );
    my $cmd = "/axis-cgi/com/ptz.cgi?riris=-$step";
    $self->sendCmd( $cmd );
}

sub irisAuto
{
    my $self = shift;
    Debug( "Iris Auto" );
    my $cmd = "/axis-cgi/com/ptz.cgi?autoiris=on";
    $self->sendCmd( $cmd );
}

sub irisMan
{
    my $self = shift;
    Debug( "Iris Manual" );
    my $cmd = "/axis-cgi/com/ptz.cgi?autoiris=off";
    $self->sendCmd( $cmd );
}

sub presetClear
{
    my $self = shift;
    my $params = shift;
    my $preset = $self->getParam( $params, 'preset' );
    Debug( "Clear Preset $preset" );
    my $cmd = "/axis-cgi/com/ptz.cgi?removeserverpresetno=$preset";
    $self->sendCmd( $cmd );
}

sub presetSet
{
    my $self = shift;
    my $params = shift;
    my $preset = $self->getParam( $params, 'preset' );
    Debug( "Set Preset $preset" );
    my $cmd = "/axis-cgi/com/ptz.cgi?setserverpresetno=$preset";
    $self->sendCmd( $cmd );
}

sub presetGoto
{
    my $self = shift;
    my $params = shift;
    my $preset = $self->getParam( $params, 'preset' );
    Debug( "Goto Preset $preset" );
    my $cmd = "/axis-cgi/com/ptz.cgi?gotoserverpresetno=$preset";
    $self->sendCmd( $cmd );
}

sub presetHome
{
    my $self = shift;
    Debug( "Home Preset" );
    my $cmd = "/axis-cgi/com/ptz.cgi?move=home";
    $self->sendCmd( $cmd );
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
