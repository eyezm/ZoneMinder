function validateForm( form )
{
    var errors = new Array();
    if ( selfIntersecting )
    {
        errors[errors.length] = selfIntersectingString;
    }
    if ( form.elements['newZone[Type]'].value != 'Inactive' )
    {
        if ( !form.newAlarmRgbR.value || !form.newAlarmRgbG.value || !form.newAlarmRgbB.value )
        {
            errors[errors.length] = alarmRGBUnsetString;
        }
        form.elements['newZone[AlarmRGB]'].value = (form.newAlarmRgbR.value<<16)|(form.newAlarmRgbG.value<<8)|form.newAlarmRgbB.value;
        if ( !form.elements['newZone[MinPixelThreshold]'].value || (parseInt(form.elements['newZone[MinPixelThreshold]'].value) <= 0 ) )
        {
            errors[errors.length] = minPixelThresUnsetString;
        }
        else if ( (parseInt(form.elements['newZone[MinPixelThreshold]'].value) >= parseInt(form.elements['newZone[MaxPixelThreshold]'].value)) && (parseInt(form.elements['newZone[MaxPixelThreshold]'].value) > 0) )
        {
            errors[errors.length] = minPixelThresLtMaxString;
        }
        if ( form.elements['newZone[CheckMethod]'].value == 'FilteredPixels' || form.elements['newZone[CheckMethod]'].value == 'Blobs' )
        {
            if ( !form.elements['newZone[FilterX]'].value || !form.elements['newZone[FilterY]'].value )
            {
                errors[errors.length] = filterUnsetString;
            }
        }
        if ( !form.elements['newZone[MinAlarmPixels]'].value || (parseFloat(form.elements['newZone[MinAlarmPixels]'].value) <= 0 ) )
        {
            errors[errors.length] = minAlarmAreaUnsetString;
        }
        else if ( (parseFloat(form.elements['newZone[MinAlarmPixels]'].value) >= parseFloat(form.elements['newZone[MaxAlarmPixels]'].value)) && (parseFloat(form.elements['newZone[MaxAlarmPixels]'].value) > 0) )
        {
            errors[errors.length] = minAlarmAreaLtMaxString;
        }
        if ( form.elements['newZone[CheckMethod]'].value == 'FilteredPixels' || form.elements['newZone[CheckMethod]'].value == 'Blobs' )
        {
            if ( !form.elements['newZone[MinFilterPixels]'].value || (parseFloat(form.elements['newZone[MinFilterPixels]'].value) <= 0 ) )
            {
                errors[errors.length] = minFilterAreaUnsetString;
            }
            else if ( (parseFloat(form.elements['newZone[MinFilterPixels]'].value) >= parseFloat(form.elements['newZone[MaxFilterPixels]'].value)) && (parseFloat(form.elements['newZone[MaxFilterPixels]'].value) > 0) )
            {
                errors[errors.length] = minFilterAreaLtMaxString;
            }
            else if ( parseFloat(form.elements['newZone[MinAlarmPixels]'].value) < parseFloat(form.elements['newZone[MinFilterPixels]'].value) )
            {
                errors[errors.length] = minFilterLtMinAlarmString;
            }
            if ( form.elements['newZone[CheckMethod]'].value == 'Blobs' )
            {
                if ( !form.elements['newZone[MinBlobPixels]'].value || (parseFloat(form.elements['newZone[MinBlobPixels]'].value) <= 0 ) )
                {
                    errors[errors.length] = minBlobAreaUnsetString;
                }
                else if ( (parseFloat(form.elements['newZone[MinBlobPixels]'].value) >= parseFloat(form.elements['newZone[MaxBlobPixels]'].value)) && (parseFloat(form.elements['newZone[MaxBlobPixels]'].value) > 0) )
                {
                    errors[errors.length] = minBlobAreaLtMaxString;
                }
                else if ( parseFloat(form.elements['newZone[MinFilterPixels]'].value) < parseFloat(form.elements['newZone[MinBlobPixels]'].value) )
                {
                    errors[errors.length] = minBlobLtMinFilterString;
                }
                if ( !form.elements['newZone[MinBlobs]'].value || (parseInt(form.elements['newZone[MinBlobs]'].value) <= 0 ) )
                {
                    errors[errors.length] = minBlobsUnsetString;
                }
                else if ( (parseInt(form.elements['newZone[MinBlobs]'].value) >= parseInt(form.elements['newZone[MaxBlobs]'].value)) && (parseInt(form.elements['newZone[MaxBlobs]'].value) > 0) )
                {
                    errors[errors.length] = minBlobsLtMaxString;
                }
            }
        }
    }
    if ( errors.length )
    {
        alert( errors.join( "\n" ) );
        return( false );
    }
    return( true );
}

function submitForm( form )
{
    form.elements['newZone[AlarmRGB]'].value = (form.newAlarmRgbR.value<<16)|(form.newAlarmRgbG.value<<8)|form.newAlarmRgbB.value;
    form.elements['newZone[NumCoords]'].value = zone['Points'].length;
    form.elements['newZone[Coords]'].value = getCoordString();
    form.elements['newZone[Area]'].value = zone.Area;

    form.submit();
}

function applyZoneType()
{
    var form = document.zoneForm;
    if ( form.elements['newZone[Type]'].value == 'Inactive' )
    {
        form.presetSelector.disabled = true;
        form.newAlarmRgbR.disabled = true;
        form.newAlarmRgbG.disabled = true;
        form.newAlarmRgbB.disabled = true;
        form.elements['newZone[CheckMethod]'].disabled = true;
        form.elements['newZone[MinPixelThreshold]'].disabled = true;
        form.elements['newZone[MaxPixelThreshold]'].disabled = true;
        form.elements['newZone[MinAlarmPixels]'].disabled = true;
        form.elements['newZone[MaxAlarmPixels]'].disabled = true;
        form.elements['newZone[FilterX]'].disabled = true;
        form.elements['newZone[FilterY]'].disabled = true;
        form.elements['newZone[MinFilterPixels]'].disabled = true;
        form.elements['newZone[MaxFilterPixels]'].disabled = true;
        form.elements['newZone[MinBlobPixels]'].disabled = true;
        form.elements['newZone[MaxBlobPixels]'].disabled = true;
        form.elements['newZone[MinBlobs]'].disabled = true;
        form.elements['newZone[MaxBlobs]'].disabled = true;
        form.elements['newZone[OverloadFrames]'].disabled = true;
    }
    else if ( form.elements['newZone[Type]'].value == 'Preclusive' )
    {
        form.presetSelector.disabled = false;
        form.newAlarmRgbR.disabled = true;
        form.newAlarmRgbG.disabled = true;
        form.newAlarmRgbB.disabled = true;
        form.elements['newZone[CheckMethod]'].disabled = false;
        form.elements['newZone[MinPixelThreshold]'].disabled = false;
        form.elements['newZone[MaxPixelThreshold]'].disabled = false;
        form.elements['newZone[MinAlarmPixels]'].disabled = false;
        form.elements['newZone[MaxAlarmPixels]'].disabled = false;
        form.elements['newZone[OverloadFrames]'].disabled = false;
        applyCheckMethod();
    }
    else
    {
        form.presetSelector.disabled = false;
        form.newAlarmRgbR.disabled = false;
        form.newAlarmRgbG.disabled = false;
        form.newAlarmRgbB.disabled = false;
        form.elements['newZone[CheckMethod]'].disabled = false;
        form.elements['newZone[MinPixelThreshold]'].disabled = false;
        form.elements['newZone[MaxPixelThreshold]'].disabled = false;
        form.elements['newZone[MinAlarmPixels]'].disabled = false;
        form.elements['newZone[MaxAlarmPixels]'].disabled = false;
        form.elements['newZone[OverloadFrames]'].disabled = false;
        applyCheckMethod(); 
    }
}

function applyCheckMethod()
{
    var form = document.zoneForm;
    if ( form.elements['newZone[CheckMethod]'].value == 'AlarmedPixels' )
    {
        form.elements['newZone[FilterX]'].disabled = true;
        form.elements['newZone[FilterY]'].disabled = true;
        form.elements['newZone[MinFilterPixels]'].disabled = true;
        form.elements['newZone[MaxFilterPixels]'].disabled = true;
        form.elements['newZone[MinBlobPixels]'].disabled = true;
        form.elements['newZone[MaxBlobPixels]'].disabled = true;
        form.elements['newZone[MinBlobs]'].disabled = true;
        form.elements['newZone[MaxBlobs]'].disabled = true;
    }
    else if ( form.elements['newZone[CheckMethod]'].value == 'FilteredPixels' )
    {
        form.elements['newZone[FilterX]'].disabled = false;
        form.elements['newZone[FilterY]'].disabled = false;
        form.elements['newZone[MinFilterPixels]'].disabled = false;
        form.elements['newZone[MaxFilterPixels]'].disabled = false;
        form.elements['newZone[MinBlobPixels]'].disabled = true;
        form.elements['newZone[MaxBlobPixels]'].disabled = true;
        form.elements['newZone[MinBlobs]'].disabled = true;
        form.elements['newZone[MaxBlobs]'].disabled = true;
    }
    else
    {
        form.elements['newZone[FilterX]'].disabled = false;
        form.elements['newZone[FilterY]'].disabled = false;
        form.elements['newZone[MinFilterPixels]'].disabled = false;
        form.elements['newZone[MaxFilterPixels]'].disabled = false;
        form.elements['newZone[MinBlobPixels]'].disabled = false;
        form.elements['newZone[MaxBlobPixels]'].disabled = false;
        form.elements['newZone[MinBlobs]'].disabled = false;
        form.elements['newZone[MaxBlobs]'].disabled = false;
    }
}

function applyPreset()
{
    var form = document.zoneForm;
    var presetId = $('presetSelector').get('value');

    if ( presets[presetId] )
    {
        var preset = presets[presetId];

        form.elements['newZone[Units]'].selectedIndex = preset['UnitsIndex'];
        form.elements['newZone[CheckMethod]'].selectedIndex = preset['CheckMethodIndex'];
        form.elements['newZone[MinPixelThreshold]'].value = preset['MinPixelThreshold'];
        form.elements['newZone[MaxPixelThreshold]'].value = preset['MaxPixelThreshold'];
        form.elements['newZone[FilterX]'].value = preset['FilterX'];
        form.elements['newZone[FilterY]'].value = preset['FilterY'];
        form.elements['newZone[MinAlarmPixels]'].value = preset['MinAlarmPixels'];
        form.elements['newZone[MaxAlarmPixels]'].value = preset['MaxAlarmPixels'];
        form.elements['newZone[MinFilterPixels]'].value = preset['MinFilterPixels'];
        form.elements['newZone[MaxFilterPixels]'].value = preset['MaxFilterPixels'];
        form.elements['newZone[MinBlobPixels]'].value = preset['MinBlobPixels'];
        form.elements['newZone[MaxBlobPixels]'].value = preset['MaxBlobPixels'];
        form.elements['newZone[MinBlobs]'].value = preset['MinBlobs'];
        form.elements['newZone[MaxBlobs]'].value = preset['MaxBlobs'];
        form.elements['newZone[OverloadFrames]'].value = preset['OverloadFrames'];

        applyCheckMethod();
        form.elements['newZone[TempArea]'].value = 100;
    }
}

function toPixels( field, maxValue )
{
    if ( field.value != '' )
        field.value = Math.round((field.value*maxValue)/100);
}

function toPercent( field, maxValue )
{
    if ( field.value != '' )
        field.value = Math.round((100*100*field.value)/maxValue)/100;
}

function applyZoneUnits()
{
    var area = zone.Area;

    var form = document.zoneForm;
    if ( form.elements['newZone[Units]'].value == 'Pixels' )
    {
        form.elements['newZone[TempArea]'].value = area;
        toPixels( form.elements['newZone[MinAlarmPixels]'], area );
        toPixels( form.elements['newZone[MaxAlarmPixels]'], area );
        toPixels( form.elements['newZone[MinFilterPixels]'], area );
        toPixels( form.elements['newZone[MaxFilterPixels]'], area );
        toPixels( form.elements['newZone[MinBlobPixels]'], area );
        toPixels( form.elements['newZone[MaxBlobPixels]'], area );
    }
    else
    {
        form.elements['newZone[TempArea]'].value = 100;
        toPercent( form.elements['newZone[MinAlarmPixels]'], area );
        toPercent( form.elements['newZone[MaxAlarmPixels]'], area );
        toPercent( form.elements['newZone[MinFilterPixels]'], area );
        toPercent( form.elements['newZone[MaxFilterPixels]'], area );
        toPercent( form.elements['newZone[MinBlobPixels]'], area );
        toPercent( form.elements['newZone[MaxBlobPixels]'], area );
    }
}

function limitRange( field, minValue, maxValue )
{
    if ( parseInt(field.value) < parseInt(minValue) )
    {
        field.value = minValue;
    }
    else if ( parseInt(field.value) > parseInt(maxValue) )
    {
        field.value = maxValue;
    }
}

function limitFilter( field )
{
    var minValue = 3;
    var maxValue = 15;

    field.value = (Math.floor((field.value-1)/2)*2) + 1;
    if ( parseInt(field.value) < minValue )
    {
        field.value = minValue;
    }
    if ( parseInt(field.value) > maxValue )
    {
        field.value = maxValue;
    }
}

function limitArea( field )
{
    var minValue = 0;
    var maxValue = zone.Area;
    if ( document.zoneForm.elements['newZone[Units]'].value == "Percent" )
    {
        maxValue = 100;
    }
    limitRange( field, minValue, maxValue );
}

function highlightOn( index )
{
    $('row'+index).addClass( 'highlight' );
    $('point'+index).addClass( 'highlight' );
}

function highlightOff( index )
{
    $('row'+index).removeClass( 'highlight' );
    $('point'+index).removeClass( 'highlight' );
}

function setActivePoint( index )
{
    highlightOff( index );
    $('row'+index).addClass( 'active' );
    $('point'+index).addClass( 'active' );
}

function unsetActivePoint( index )
{
    $('row'+index).removeClass( 'active' );
    $('point'+index).removeClass( 'active' );
}

function updateZoneImageResponse( respObj, respText )
{
    if ( respObj.result == 'Ok' )
    {
        document.zoneForm.elements['submitBtn'].disabled = ( selfIntersecting = respObj.selfIntersecting );
        document.zoneForm.elements['newZone[Area]'].value = zone.Area = respObj.area;
        if ( document.zoneForm.elements['newZone[Units]'].value == 'Pixels' )
            document.zoneForm.elements['newZone[TempArea]'].value = document.zoneForm.elements['newZone[Area]'].value;
        
        var newImage = new Asset.image( respObj.zoneImage, { 'onload': function() { $('zoneImage').src = newImage.src; } } );
    }
}

function getCoordString()
{
    var coords = new Array();
    for ( var i = 0; i < zone['Points'].length; i++ )
        coords[coords.length] = zone['Points'][i].x+','+zone['Points'][i].y;
    return( coords.join( " " ) );
}

function updateZoneImage()
{
    var parms = "view=request&request=zone&action=zoneImage&mid="+zone.MonitorId+"&zid="+zone.Id+"&coords="+getCoordString();
    var query = new Request.JSON( { url: thisUrl, method: 'post', timeout: AJAX_TIMEOUT, data: parms, onSuccess: updateZoneImageResponse } );
    query.send();
}

function fixActivePoint( index )
{
    updateActivePoint( index );
    unsetActivePoint( index );
    updateZoneImage();
}

function updateActivePoint( index )
{
    var point = $('point'+index);
    var x = point.getStyle( 'left' ).toInt();
    var y = point.getStyle( 'top' ).toInt();

    $('newZone[Points]['+index+'][x]').value = x;
    $('newZone[Points]['+index+'][y]').value = y;
    zone['Points'][index].x = x;
    zone['Points'][index].y = y;
}

function addPoint( index )
{
    var nextIndex = index+1;
    if ( index >= (zone['Points'].length-1) )
        nextIndex = 0;
    var newX = parseInt(Math.round((zone['Points'][index]['x']+zone['Points'][nextIndex]['x'])/2));
    var newY = parseInt(Math.round((zone['Points'][index]['y']+zone['Points'][nextIndex]['y'])/2));
    if ( nextIndex == 0 )
        zone['Points'][zone['Points'].length] = { 'x': newX, 'y': newY };
    else
        zone['Points'].splice( nextIndex, 0, { 'x': newX, 'y': newY } );
    drawZonePoints();
    //setActivePoint( nextIndex );
}

function delPoint( index )
{
    zone['Points'].splice( index, 1 );
    drawZonePoints();
}

function limitPointValue( point, loVal, hiVal )
{
    if ( point.value < loVal )
        point.value = 0;
    else if ( point.value > hiVal )
        point.value = hiVal;
}

function updateX( index )
{
    limitPointValue( $('newZone[Points]['+index+'][x]'), 0, maxX );

    var point = $('point'+index);
    var x = $('newZone[Points]['+index+'][x]').get('value');

    point.setStyle( 'left', x+'px' );
    zone['Points'][index].x = x;

    updateZoneImage();
}

function updateY( index )
{
    limitPointValue( $('newZone[Points]['+index+'][y]'), 0, maxY );

    var point = $('point'+index);
    var y = $('newZone[Points]['+index+'][y]').get('value');

    point.setStyle( 'top', y+'px' );
    zone['Points'][index].y = y;

    updateZoneImage();
}

function saveChanges( element )
{
    var form = element.form;
    if ( validateForm( form ) )
    {
        submitForm( form );
        return( true );
    }
    return( false );
}

function drawZonePoints()
{
    $('imageFrame').getElements( 'div.zonePoint' ).each( function( element ) { element.destroy(); } );
    for ( var i = 0; i < zone['Points'].length; i++ )
    {
        var div = new Element( 'div', { 'id': 'point'+i, 'class': 'zonePoint', 'title': 'Point '+(i+1), 'styles': { 'left': zone['Points'][i].x, 'top': zone['Points'][i].y } } );
        div.addEvent( 'mouseover', highlightOn.pass( i ) );
        div.addEvent( 'mouseout', highlightOff.pass( i ) );
        div.injectInside( $('imageFrame') );
        div.makeDraggable( { 'container': $('imageFrame'), 'onStart': setActivePoint.pass( i ), 'onComplete': fixActivePoint.pass( i ), 'onDrag': updateActivePoint.pass( i ) } );
    }

    var tables = $('zonePoints').getElements( 'table' );
    tables.each( function( table ) { table.getElement( 'tbody' ).empty(); } );
    for ( var i = 0; i < zone['Points'].length; i++ )
    {
        var row = new Element( 'tr', { 'id': 'row'+i } );
        row.addEvents( { 'mouseover': highlightOn.pass( i ), 'mouseout': highlightOff.pass( i ) } );
        var cell = new Element( 'td' );
        cell.set( 'text', i+1 );
        cell.injectInside( row );

        cell = new Element( 'td' );
        var input = new Element( 'input', { 'id': 'newZone[Points]['+i+'][x]', 'name': 'newZone[Points]['+i+'][x]', 'value': zone['Points'][i].x, 'size': 5 } );
        input.addEvent( 'change', updateX.pass( i ) );
        input.injectInside( cell );
        cell.injectInside( row );

        cell = new Element( 'td' );
        input = new Element( 'input', { 'id': 'newZone[Points]['+i+'][y]', 'name': 'newZone[Points]['+i+'][y]', 'value': zone['Points'][i].y, 'size': 5 } );
        input.addEvent( 'change', updateY.pass( i ) );
        input.injectInside( cell );
        cell.injectInside( row );

        cell = new Element( 'td' );
        new Element( 'a', { 'href': '#', 'events': { 'click': addPoint.pass( i ) } } ).set( 'text', '+' ).injectInside( cell );
        if ( zone['Points'].length > 3 )
            new Element( 'a', { 'id': 'delete'+i, 'href': '#', 'events': { 'click': delPoint.pass( i ) } } ).set( 'text', '-' ).injectInside( cell );
        cell.injectInside( row );

        row.injectInside( tables[i%tables.length].getElement( 'tbody' ) );
    }
}

function initPage()
{
    var form = document.zoneForm;

    //form.elements['newZone[Name]'].disabled = true;
    //form.elements['newZone[Type]'].disabled = true;
    form.presetSelector.disabled = true;
    //form.elements['newZone[Units]'].disabled = true;
    form.newAlarmRgbR.disabled = true;
    form.newAlarmRgbG.disabled = true;
    form.newAlarmRgbB.disabled = true;
    form.elements['newZone[CheckMethod]'].disabled = true;
    form.elements['newZone[MinPixelThreshold]'].disabled = true;
    form.elements['newZone[MaxPixelThreshold]'].disabled = true;
    form.elements['newZone[MinAlarmPixels]'].disabled = true;
    form.elements['newZone[MaxAlarmPixels]'].disabled = true;
    form.elements['newZone[FilterX]'].disabled = true;
    form.elements['newZone[FilterY]'].disabled = true;
    form.elements['newZone[MinFilterPixels]'].disabled = true;
    form.elements['newZone[MaxFilterPixels]'].disabled = true;
    form.elements['newZone[MinBlobPixels]'].disabled = true;
    form.elements['newZone[MaxBlobPixels]'].disabled = true;
    form.elements['newZone[MinBlobs]'].disabled = true;
    form.elements['newZone[MaxBlobs]'].disabled = true;
    form.elements['newZone[OverloadFrames]'].disabled = true;

    applyZoneType();

    if ( form.elements['newZone[Units]'].value == 'Percent' )
    {
        applyZoneUnits();
    }

    applyCheckMethod();
    drawZonePoints();
}

window.addEvent( 'domready', initPage );
