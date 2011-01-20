//
// ZoneMinder base static javascript file, $Date$, $Revision$
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

//
// This file should only contain static JavaScript and no php.
// Use skin.js.php for JavaScript that need pre-processing
//

if ( !window.console )
{
    window.console =
    {
        init:function() {},
        log:function() {},
        debug:function() {},
        info:function() {},
        warn:function() {},
        error:function() {}
    };
}
if ( !console.debug )//IE8 has console but doesn't have console.debug so lets alias it.
    console.debug = console.log;

// Javascript window sizes
var popupSizes = {
    'bandwidth':    { 'width': 200, 'height': 120 },
    'console':      { 'width': 750, 'height': 312 },
    'control':      { 'width': 380, 'height': 480 },
    'controlcaps':  { 'width': 780, 'height': 320 },
    'controlcap':   { 'width': 400, 'height': 400 },
    'cycle':        { 'addWidth': 16, 'minWidth': 384, 'addHeight': 48 },
    'device':       { 'width': 260, 'height': 150 },
    'devices':      { 'width': 400, 'height': 240 },
    'donate':       { 'width': 500, 'height': 280 },
    'event':        { 'addWidth': 108, 'minWidth': 496, 'addHeight': 200, minHeight: 540 },
    'eventdetail':  { 'width': 400, 'height': 220 },
    'events':       { 'width': 760, 'height': 480 },
    'export':       { 'width': 400, 'height': 340 },
    'filter':       { 'width': 720, 'height': 360 },
    'filtersave':   { 'width': 560, 'height': 120 },
    'frame':        { 'addWidth': 32, 'minWidth': 384, 'addHeight': 100 },
    'frames':       { 'width': 500, 'height': 300 },
    'function':     { 'width': 248, 'height': 92 },
    'group':        { 'width': 360, 'height': 180 },
    'groups':       { 'width': 400, 'height': 220 },
    'image':        { 'addWidth': 48, 'addHeight': 80 },
    'login':        { 'width': 720, 'height': 480 },
    'logout':       { 'width': 240, 'height': 100 },
    'monitor':      { 'width': 380, 'height': 364 },
    'monitorpreset':{ 'width': 400, 'height': 200 },
    'monitorprobe': { 'width': 500, 'height': 240 },
    'monitorselect':{ 'width': 160, 'height': 200 },
    'montage':      { 'width': -1, 'height': -1 },
    'optionhelp':   { 'width': 400, 'height': 320 },
    'options':      { 'width': 920, 'height': 620 },
    'preset':       { 'width': 300, 'height': 120 },
    'settings':     { 'width': 200, 'height': 225 },
    'state':        { 'width': 240, 'height': 124 },
    'stats':        { 'width': 740, 'height': 200 },
    'timeline':     { 'width': 760, 'height': 540 },
    'user':         { 'width': 320, 'height': 420 },
    'version':      { 'width': 320, 'height': 140 },
    'video':        { 'width': 420, 'height': 360 },
    'videoview':    { 'addWidth': 48, 'addHeight': 80 },
    'watch':        { 'addWidth': 96, 'minWidth': 420, 'addHeight': 384 },
    'zone':         { 'addWidth': 450, 'addHeight': 200, 'minHeight': 450 },
    'zones':        { 'addWidth': 72, 'addHeight': 232 }
};

var popupOptions = "resizable,scrollbars,status=no";

// Deprecated
function newWindow( url, name, width, height )
{
    var windowId = window.open( url, name, popupOptions+",width="+width+",height="+height );
}

function clone( obj )
{
    if ( typeof(obj) != 'object' )
        return( obj );
    if ( obj == null )
        return( obj );

    var newObj = new Object();
    for ( var i in obj )
        newObj[i] = clone( obj[i] );
    return( newObj );
}

function getPopupSize( tag, width, height )
{
    var popupSize = clone( popupSizes[tag] );
    if ( !popupSize )
    {
        console.error( "Can't find window size for tag '"+tag+"'" );
        return( { 'width': 0, 'height': 0 } );
    }
    if ( popupSize.width && popupSize.height )
    {
        if ( width || height )
            console.warn( "Ignoring passed dimensions "+width+"x"+height+" when getting popup size for tag '"+tag+"'"  );
        return( popupSize );
    }
    if ( popupSize.addWidth )
    {
        popupSize.width = popupSize.addWidth;
        if ( !width )
            console.error( "Got addWidth but no passed width when getting popup size for tag '"+tag+"'" );
        else
            popupSize.width += parseInt(width);
    }
    else if ( width )
    {
        popupSize.width = width;
        console.error( "Got passed width but no addWidth when getting popup size for tag '"+tag+"'" );
    }
    if ( popupSize.minWidth && popupSize.width < popupSize.minWidth )
    {
        console.warn( "Adjusting to minimum width when getting popup size for tag '"+tag+"'" );
        popupSize.width = popupSize.minWidth;
    }
    if ( popupSize.addHeight )
    {
        popupSize.height = popupSize.addHeight;
        if ( !height )
            console.error( "Got addHeight but no passed height when getting popup size for tag '"+tag+"'" );
        else
            popupSize.height += parseInt(height);
    }
    else if ( height )
    {
        popupSize.height = height;
        console.error( "Got passed height but no addHeight when getting popup size for tag '"+tag+"'" );
    }
    if ( popupSize.minHeight && popupSize.height < popupSize.minHeight )
    {
        console.warn( "Adjusting to minimum height when getting popup size for tag '"+tag+"'" );
        popupSize.height = popupSize.minHeight;
    }
    console.debug( popupSize );
    return( popupSize );
}

function zmWindow()
{
    var zmWin = window.open( 'http://www.zoneminder.com', 'ZoneMinder' );
    zmWin.focus();
}

function createPopup( url, name, tag, width, height )
{
    var popupSize = getPopupSize( tag, width, height );
    var popupDimensions = "";
    if ( popupSize.width > 0 )
        popupDimensions += ",width="+popupSize.width;
    if ( popupSize.height > 0 )
        popupDimensions += ",height="+popupSize.height;
    var popup = window.open( url, name, popupOptions+popupDimensions );
}

function createEventPopup( eventId, eventFilter, width, height )
{
    var url = '?view=event&eid='+eventId;
    if ( eventFilter )
        url += eventFilter;
    var name = 'zmEvent';
    var popupSize = getPopupSize( 'event', width, height );
    var popup = window.open( url, name, popupOptions+",width="+popupSize.width+",height="+popupSize.height );
}

function createFramesPopup( eventId, width, height )
{
    var url = '?view=frames&eid='+eventId;
    var name = 'zmFrames';
    var popupSize = getPopupSize( 'frames', width, height );
    var popup = window.open( url, name, popupOptions+",width="+popupSize.width+",height="+popupSize.height );
}

function createFramePopup( eventId, frameId, width, height )
{
    var url = '?view=frame&eid='+eventId+'&fid='+frameId;
    var name = 'zmFrame';
    var popupSize = getPopupSize( 'frame', width, height );
    var popup = window.open( url, name, popupOptions+",width="+popupSize.width+",height="+popupSize.height );
}

function windowToFront()
{
    top.window.focus();
}

function closeWindow()
{
    top.window.close();
}

function refreshWindow()
{
    window.location.reload( true );
}

function refreshParentWindow()
{
    if ( window.opener )
        window.opener.location.reload( true );
}

//Shows a message if there is an error in the streamObj or the stream doesn't exist.  Returns true if error, false otherwise.
function checkStreamForErrors( funcName, streamObj )
{
    if ( !streamObj )
    {
        console.error( funcName+": stream object was null" );
        return true;
    }
    if ( streamObj.result == "Error" )
    {
        console.error( funcName+" stream error: "+streamObj.message );
        return true;
    }
    return false;
}

function secsToTime( seconds )
{
    var timeString = "--";
    if ( seconds < 60 )
        timeString = seconds.toString();
    else if ( seconds < 60*60 )
    {
        var timeMins = parseInt(seconds/60);
        var timeSecs = seconds%60;
        if ( timeSecs < 10 )
            timeSecs = '0'+timeSecs.toString().substr( 0, 4 );
        else
            timeSecs = timeSecs.toString().substr( 0, 5 );
        timeString = timeMins+":"+timeSecs;
    }
    else
    {
        var timeHours = parseInt(seconds/3600);
        var timeMins = (seconds%3600)/60;
        var timeSecs = seconds%60;
        if ( timeMins < 10 )
            timeMins = '0'+timeMins.toString().substr( 0, 4 );
        else
            timeMins = timeMins.toString().substr( 0, 5 );
        if ( timeSecs < 10 )
            timeSecs = '0'+timeSecs.toString().substr( 0, 4 );
        else
            timeSecs = timeSecs.toString().substr( 0, 5 );
        timeString = timeHours+":"+timeMins+":"+timeSecs;
    }
    return( timeString );
}

function submitTab( tab )
{
    var form = $('contentForm');
    form.action.value = "";
    form.tab.value = tab;
    form.submit();
}

function configureDeleteButton( element )
{
    var form = element.form;
    var checked = element.checked;
    if ( !checked )
    {
        for ( var i = 0; i < form.elements.length; i++ )
        {
            if ( form.elements[i].name == element.name )
            {
                if ( form.elements[i].checked )
                {
                    checked = true;
                    break;
                }
            }
        }
    }
    form.deleteBtn.disabled = !checked;
}

function confirmDelete( message )
{
    return( confirm( message?message:'Are you sure you wish to delete?' ) );
}

if ( refreshParent )
{
    refreshParentWindow();
}

if ( focusWindow )
{
    windowToFront();
}
