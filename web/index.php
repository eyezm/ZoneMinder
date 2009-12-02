<?php
//
// ZoneMinder main web interface file, $Date$, $Revision$
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

error_reporting( E_ALL );

$debug = false;
if ( $debug )
{
    // Use these for debugging, though not both at once!
    phpinfo( INFO_VARIABLES );
    //error_reporting( E_ALL );
}

// Use new style autoglobals where possible
if ( version_compare( phpversion(), "4.1.0", "<") )
{
    $_SESSION = &$HTTP_SESSION_VARS;
    $_SERVER = &$HTTP_SERVER_VARS;
}

// Useful debugging lines for mobile devices
if ( false )
{
    ob_start();
    phpinfo( INFO_VARIABLES );
    $fp = fopen( "/tmp/env.html", "w" );
    fwrite( $fp, ob_get_contents() );
    fclose( $fp );
    ob_end_clean();
}

if ( isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == 'on' )
{
    $protocol = 'https';
}
else
{
    $protocol = 'http';
}
define( "ZM_BASE_URL", $protocol.'://'.$_SERVER['HTTP_HOST'] );

if ( isset($_GET['skin']) )
    $skin = $_GET['skin'];
elseif ( isset($_COOKIE['zmSkin']) )
    $skin = $_COOKIE['zmSkin'];
else
    $skin = "classic";

define( "ZM_BASE_PATH", dirname( $_SERVER['REQUEST_URI'] ) );
define( "ZM_SKIN_PATH", "skins/$skin" );

$skinBase = array(); // To allow for inheritance of skins
if ( !file_exists( ZM_SKIN_PATH ) )
    die( "Invalid skin '$skin'" );
require_once( ZM_SKIN_PATH.'/includes/init.php' );
$skinBase[] = $skin;

ini_set( "session.name", "ZMSESSID" );

session_start();

if ( !isset($_SESSION['skin']) || isset($_REQUEST['skin']) )
{
    $_SESSION['skin'] = $skin;
    setcookie( "zmSkin", $skin );
}

require_once( 'includes/config.php' );

if ( ZM_OPT_USE_AUTH )
    if ( isset( $_SESSION['user'] ) )
        $user = $_SESSION['user'];
    else
        unset( $user );
else
    $user = $defaultUser;

require_once( 'includes/lang.php' );
require_once( 'includes/functions.php' );

if ( isset($_REQUEST['view']) )
    $view = validHtmlStr($_REQUEST['view']);

if ( isset($_REQUEST['action']) )
    $action = validHtmlStr($_REQUEST['action']);

require_once( 'includes/actions.php' );

foreach ( getSkinIncludes( 'skin.php' ) as $includeFile )
    require_once $includeFile;

if ( isset( $_REQUEST['request'] ) )
{
    $request = validHtmlStr($_REQUEST['request']);
    foreach ( getSkinIncludes( 'ajax/'.$request.'.php', true, true ) as $includeFile )
    {
        if ( !file_exists( $includeFile ) )
        {
            error_log( "Request '$request' does not exist" );
            die( "Request '$request' does not exist" );
        }
        require_once $includeFile;
    }
    return;
}
else
{
    if ( $includeFiles = getSkinIncludes( 'views/'.$view.'.php', true, true ) )
    {
        foreach ( $includeFiles as $includeFile )
        {
            if ( !file_exists( $includeFile ) )
            {
                error_log( "View '$view' does not exist" );
                die( "View '$view' does not exist" );
            }
            require_once $includeFile;
        }
    }
    if ( !$includeFiles || $view == 'error' )
    {
        foreach ( getSkinIncludes( 'views/error.php', true, true ) as $includeFile )
            require_once $includeFile;
    }
}
?>
