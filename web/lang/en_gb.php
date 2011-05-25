<?php
//
// ZoneMinder web UK English language file, $Date$, $Revision$
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

// ZoneMinder <your language> Translation by <your name>

// Notes for Translators
// 0. Get some credit, put your name in the line above (optional)
// 1. When composing the language tokens in your language you should try and keep to roughly the
//   same length text if possible. Abbreviate where necessary as spacing is quite close in a number of places.
// 2. There are four types of string replacement
//   a) Simple replacements are words or short phrases that are static and used directly. This type of
//     replacement can be used 'as is'.
//   b) Complex replacements involve some dynamic element being included and so may require substitution
//     or changing into a different order. The token listed in this file will be passed through sprintf as
//     a formatting string. If the dynamic element is a number you will usually need to use a variable
//     replacement also as described below.
//   c) Variable replacements are used in conjunction with complex replacements and involve the generation
//     of a singular or plural noun depending on the number passed into the zmVlang function. See the 
//     the zmVlang section below for a further description of this.
//   d) Optional strings which can be used to replace the prompts and/or help text for the Options section
//     of the web interface. These are not listed below as they are quite large and held in the database
//     so that they can also be used by the zmconfig.pl script. However you can build up your own list
//     quite easily from the Config table in the database if necessary.
// 3. The tokens listed below are not used to build up phrases or sentences from single words. Therefore
//   you can safely assume that a single word token will only be used in that context.
// 4. In new language files, or if you are changing only a few words or phrases it makes sense from a 
//   maintenance point of view to include the original language file and override the old definitions rather
//   than copy all the language tokens across. To do this change the line below to whatever your base language
//   is and uncomment it.
// require_once( 'zm_lang_en_gb.php' );

// You may need to change the character set here, if your web server does not already
// do this by default, uncomment this if required.
//
// Example
// header( "Content-Type: text/html; charset=iso-8859-1" );

// You may need to change your locale here if your default one is incorrect for the
// language described in this file, or if you have multiple languages supported.
// If you do need to change your locale, be aware that the format of this function
// is subtlely different in versions of PHP before and after 4.3.0, see
// http://uk2.php.net/manual/en/function.setlocale.php for details.
// Also be aware that changing the whole locale may affect some floating point or decimal 
// arithmetic in the database, if this is the case change only the individual locale areas
// that don't affect this rather than all at once. See the examples below.
// Finally, depending on your setup, PHP may not enjoy have multiple locales in a shared 
// threaded environment, if you get funny errors it may be this.
//
// Examples
// setlocale( 'LC_ALL', 'en_GB' ); All locale settings pre-4.3.0
// setlocale( LC_ALL, 'en_GB' ); All locale settings 4.3.0 and after
// setlocale( LC_CTYPE, 'en_GB' ); Character class settings 4.3.0 and after
// setlocale( LC_TIME, 'en_GB' ); Date and time formatting 4.3.0 and after

// Simple String Replacements
$SLANG = array(
    '24BitColour'           => '24 bit colour',
    '8BitGrey'              => '8 bit greyscale',
    'Action'                => 'Action',
    'Actual'                => 'Actual',
    'AddNewControl'         => 'Add New Control',
    'AddNewMonitor'         => 'Add New Monitor',
    'AddNewUser'            => 'Add New User',
    'AddNewZone'            => 'Add New Zone',
    'Alarm'                 => 'Alarm',
    'AlarmBrFrames'         => 'Alarm<br/>Frames',
    'AlarmFrame'            => 'Alarm Frame',
    'AlarmFrameCount'       => 'Alarm Frame Count',
    'AlarmLimits'           => 'Alarm Limits',
    'AlarmMaximumFPS'       => 'Alarm Maximum FPS',
    'AlarmPx'               => 'Alarm Px',
    'AlarmRGBUnset'         => 'You must set an alarm RGB colour',
    'Alert'                 => 'Alert',
    'All'                   => 'All',
    'Apply'                 => 'Apply',
    'ApplyingStateChange'   => 'Applying State Change',
    'ArchArchived'          => 'Archived Only',
    'Archive'               => 'Archive',
    'Archived'              => 'Archived',
    'ArchUnarchived'        => 'Unarchived Only',
    'Area'                  => 'Area',
    'AreaUnits'             => 'Area (px/%)',
    'AttrAlarmFrames'       => 'Alarm Frames',
    'AttrArchiveStatus'     => 'Archive Status',
    'AttrAvgScore'          => 'Avg. Score',
    'AttrCause'             => 'Cause',
    'AttrDate'              => 'Date',
    'AttrDateTime'          => 'Date/Time',
    'AttrDiskBlocks'        => 'Disk Blocks',
    'AttrDiskPercent'       => 'Disk Percent',
    'AttrDuration'          => 'Duration',
    'AttrFrames'            => 'Frames',
    'AttrId'                => 'Id',
    'AttrMaxScore'          => 'Max. Score',
    'AttrMonitorId'         => 'Monitor Id',
    'AttrMonitorName'       => 'Monitor Name',
    'AttrName'              => 'Name',
    'AttrNotes'             => 'Notes',
    'AttrSystemLoad'        => 'System Load',
    'AttrTime'              => 'Time',
    'AttrTotalScore'        => 'Total Score',
    'AttrWeekday'           => 'Weekday',
    'Auto'                  => 'Auto',
    'AutoStopTimeout'       => 'Auto Stop Timeout',
    'AvgBrScore'            => 'Avg.<br/>Score',
    'Available'             => 'Available',
    'Background'            => 'Background',
    'BackgroundFilter'      => 'Run filter in background',
    'BadAlarmFrameCount'    => 'Alarm frame count must be an integer of one or more',
    'BadAlarmMaxFPS'        => 'Alarm Maximum FPS must be a positive integer or floating point value',
    'BadChannel'            => 'Channel must be set to an integer of zero or more',
    'BadDevice'             => 'Device must be set to a valid value',
    'BadFormat'             => 'Format must be set to a valid value',
    'BadFPSReportInterval'  => 'FPS report interval buffer count must be an integer of 0 or more',
    'BadFrameSkip'          => 'Frame skip count must be an integer of zero or more',
    'BadHeight'             => 'Height must be set to a valid value',
    'BadHost'               => 'Host must be set to a valid ip address or hostname, do not include http://',
    'BadImageBufferCount'   => 'Image buffer size must be an integer of 10 or more',
    'BadLabelX'             => 'Label X co-ordinate must be set to an integer of zero or more',
    'BadLabelY'             => 'Label Y co-ordinate must be set to an integer of zero or more',
    'BadMaxFPS'             => 'Maximum FPS must be a positive integer or floating point value',
    'BadNameChars'          => 'Names may only contain alphanumeric characters plus hyphen and underscore',
    'BadPalette'            => 'Palette must be set to a valid value',
    'BadPath'               => 'Path must be set to a valid value',
    'BadPort'               => 'Port must be set to a valid number',
    'BadPostEventCount'     => 'Post event image count must be an integer of zero or more',
    'BadPreEventCount'      => 'Pre event image count must be at least zero, and less than image buffer size',
    'BadRefBlendPerc'       => 'Reference blend percentage must be a positive integer',
    'BadSectionLength'      => 'Section length must be an integer of 30 or more',
    'BadSignalCheckColour'  => 'Signal check colour must be a valid RGB colour string',
    'BadStreamReplayBuffer' => 'Stream replay buffer must be an integer of zero or more',
    'BadWarmupCount'        => 'Warmup frames must be an integer of zero or more',
    'BadWebColour'          => 'Web colour must be a valid web colour string',
    'BadWidth'              => 'Width must be set to a valid value',
    'Bandwidth'             => 'Bandwidth',
    'BlobPx'                => 'Blob Px',
    'Blobs'                 => 'Blobs',
    'BlobSizes'             => 'Blob Sizes',
    'Brightness'            => 'Brightness',
    'Buffers'               => 'Buffers',
    'CanAutoFocus'          => 'Can Auto Focus',
    'CanAutoGain'           => 'Can Auto Gain',
    'CanAutoIris'           => 'Can Auto Iris',
    'CanAutoWhite'          => 'Can Auto White Bal.',
    'CanAutoZoom'           => 'Can Auto Zoom',
    'Cancel'                => 'Cancel',
    'CancelForcedAlarm'     => 'Cancel Forced Alarm',
    'CanFocusAbs'           => 'Can Focus Absolute',
    'CanFocus'              => 'Can Focus',
    'CanFocusCon'           => 'Can Focus Continuous',
    'CanFocusRel'           => 'Can Focus Relative',
    'CanGainAbs'            => 'Can Gain Absolute',
    'CanGain'               => 'Can Gain ',
    'CanGainCon'            => 'Can Gain Continuous',
    'CanGainRel'            => 'Can Gain Relative',
    'CanIrisAbs'            => 'Can Iris Absolute',
    'CanIris'               => 'Can Iris',
    'CanIrisCon'            => 'Can Iris Continuous',
    'CanIrisRel'            => 'Can Iris Relative',
    'CanMoveAbs'            => 'Can Move Absolute',
    'CanMove'               => 'Can Move',
    'CanMoveCon'            => 'Can Move Continuous',
    'CanMoveDiag'           => 'Can Move Diagonally',
    'CanMoveMap'            => 'Can Move Mapped',
    'CanMoveRel'            => 'Can Move Relative',
    'CanPan'                => 'Can Pan' ,
    'CanReset'              => 'Can Reset',
    'CanSetPresets'         => 'Can Set Presets',
    'CanSleep'              => 'Can Sleep',
    'CanTilt'               => 'Can Tilt',
    'CanWake'               => 'Can Wake',
    'CanWhiteAbs'           => 'Can White Bal. Absolute',
    'CanWhiteBal'           => 'Can White Bal.',
    'CanWhite'              => 'Can White Balance',
    'CanWhiteCon'           => 'Can White Bal. Continuous',
    'CanWhiteRel'           => 'Can White Bal. Relative',
    'CanZoomAbs'            => 'Can Zoom Absolute',
    'CanZoom'               => 'Can Zoom',
    'CanZoomCon'            => 'Can Zoom Continuous',
    'CanZoomRel'            => 'Can Zoom Relative',
    'CaptureHeight'         => 'Capture Height',
    'CaptureMethod'         => 'Capture Method',
    'CapturePalette'        => 'Capture Palette',
    'CaptureWidth'          => 'Capture Width',
    'Cause'                 => 'Cause',
    'Layout'                => 'Layout',
    'CheckMethod'           => 'Alarm Check Method',
    'ChooseDetectedCamera'  => 'Choose Detected Camera',
    'ChooseFilter'          => 'Choose Filter',
    'ChoosePreset'          => 'Choose Preset',
    'Close'                 => 'Close',
    'Colour'                => 'Colour',
    'Command'               => 'Command',
    'Config'                => 'Config',
    'ConfiguredFor'         => 'Configured for',
    'ConfirmDeleteEvents'   => 'Are you sure you wish to delete the selected events?',
    'ConfirmPassword'       => 'Confirm Password',
    'ConjAnd'               => 'and',
    'ConjOr'                => 'or',
    'Console'               => 'Console',
    'ContactAdmin'          => 'Please contact your adminstrator for details.',
    'Continue'              => 'Continue',
    'Contrast'              => 'Contrast',
    'ControlAddress'        => 'Control Address',
    'ControlCap'            => 'Control Capability',
    'ControlCaps'           => 'Control Capabilities',
    'Control'               => 'Control',
    'ControlDevice'         => 'Control Device',
    'Controllable'          => 'Controllable',
    'ControlType'           => 'Control Type',
    'Cycle'                 => 'Cycle',
    'CycleWatch'            => 'Cycle Watch',
    'Day'                   => 'Day',
    'Debug'                 => 'Debug',
    'DefaultRate'           => 'Default Rate',
    'DefaultScale'          => 'Default Scale',
    'DefaultView'           => 'Default View',
    'DeleteAndNext'         => 'Delete &amp; Next',
    'DeleteAndPrev'         => 'Delete &amp; Prev',
    'Delete'                => 'Delete',
    'DeleteSavedFilter'     => 'Delete saved filter',
    'Description'           => 'Description',
    'DetectedCameras'       => 'Detected Cameras',
    'DeviceChannel'         => 'Device Channel',
    'DeviceFormat'          => 'Device Format',
    'DeviceNumber'          => 'Device Number',
    'DevicePath'            => 'Device Path',
    'Device'                => 'Device',
    'Devices'               => 'Devices',
    'Dimensions'            => 'Dimensions',
    'DisableAlarms'         => 'Disable Alarms',
    'Disk'                  => 'Disk',
    'Display'               => 'Display',
    'DonateAlready'         => 'No, I\'ve already donated',
    'DonateEnticement'      => 'You\'ve been running ZoneMinder for a while now and hopefully are finding it a useful addition to your home or workplace security. Although ZoneMinder is, and will remain, free and open source, it costs money to develop and support. If you would like to help support future development and new features then please consider donating. Donating is, of course, optional but very much appreciated and you can donate as much or as little as you like.<br/><br/>If you would like to donate please select the option below or go to http://www.zoneminder.com/donate.html in your browser.<br/><br/>Thank you for using ZoneMinder and don\'t forget to visit the forums on ZoneMinder.com for support or suggestions about how to make your ZoneMinder experience even better.',
    'Donate'                => 'Please Donate',
    'DonateRemindDay'       => 'Not yet, remind again in 1 day',
    'DonateRemindHour'      => 'Not yet, remind again in 1 hour',
    'DonateRemindMonth'     => 'Not yet, remind again in 1 month',
    'DonateRemindNever'     => 'No, I don\'t want to donate, never remind',
    'DonateRemindWeek'      => 'Not yet, remind again in 1 week',
    'DonateYes'             => 'Yes, I\'d like to donate now',
    'Download'              => 'Download',
    'DuplicateMonitorName'  => 'Duplicate Monitor Name',
    'Duration'              => 'Duration',
    'Edit'                  => 'Edit',
    'Email'                 => 'Email',
    'EnableAlarms'          => 'Enable Alarms',
    'Enabled'               => 'Enabled',
    'EnterNewFilterName'    => 'Enter new filter name',
    'ErrorBrackets'         => 'Error, please check you have an equal number of opening and closing brackets',
    'Error'                 => 'Error',
    'ErrorValidValue'       => 'Error, please check that all terms have a valid value',
    'Etc'                   => 'etc',
    'Event'                 => 'Event',
    'EventFilter'           => 'Event Filter',
    'EventId'               => 'Event Id',
    'EventName'             => 'Event Name',
    'EventPrefix'           => 'Event Prefix',
    'Events'                => 'Events',
    'Exclude'               => 'Exclude',
    'Execute'               => 'Execute',
    'ExportDetails'         => 'Export Event Details',
    'Export'                => 'Export',
    'ExportFailed'          => 'Export Failed',
    'ExportFormat'          => 'Export File Format',
    'ExportFormatTar'       => 'Tar',
    'ExportFormatZip'       => 'Zip',
    'ExportFrames'          => 'Export Frame Details',
    'ExportImageFiles'      => 'Export Image Files',
    'Exporting'             => 'Exporting',
    'ExportMiscFiles'       => 'Export Other Files (if present)',
    'ExportOptions'         => 'Export Options',
    'ExportSucceeded'       => 'Export Succeeded',
    'ExportVideoFiles'      => 'Export Video Files (if present)',
    'Far'                   => 'Far',
    'FastForward'           => 'Fast Forward',
    'Feed'                  => 'Feed',
    'Ffmpeg'                => 'Ffmpeg',
    'File'                  => 'File',
    'FilterArchiveEvents'   => 'Archive all matches',
    'FilterDeleteEvents'    => 'Delete all matches',
    'FilterEmailEvents'     => 'Email details of all matches',
    'FilterExecuteEvents'   => 'Execute command on all matches',
    'FilterMessageEvents'   => 'Message details of all matches',
    'FilterPx'              => 'Filter Px',
    'Filters'               => 'Filters',
    'FilterUnset'           => 'You must specify a filter width and height',
    'FilterUploadEvents'    => 'Upload all matches',
    'FilterVideoEvents'     => 'Create video for all matches',
    'First'                 => 'First',
    'FlippedHori'           => 'Flipped Horizontally',
    'FlippedVert'           => 'Flipped Vertically',
    'Focus'                 => 'Focus',
    'ForceAlarm'            => 'Force Alarm',
    'Format'                => 'Format',
    'FPS'                   => 'fps',
    'FPSReportInterval'     => 'FPS Report Interval',
    'Frame'                 => 'Frame',
    'FrameId'               => 'Frame Id',
    'FrameRate'             => 'Frame Rate',
    'Frames'                => 'Frames',
    'FrameSkip'             => 'Frame Skip',
    'FTP'                   => 'FTP',
    'Func'                  => 'Func',
    'Function'              => 'Function',
    'Gain'                  => 'Gain',
    'General'               => 'General',
    'GenerateVideo'         => 'Generate Video',
    'GeneratingVideo'       => 'Generating Video',
    'GoToZoneMinder'        => 'Go to ZoneMinder.com',
    'Grey'                  => 'Grey',
    'Group'                 => 'Group',
    'Groups'                => 'Groups',
    'HasFocusSpeed'         => 'Has Focus Speed',
    'HasGainSpeed'          => 'Has Gain Speed',
    'HasHomePreset'         => 'Has Home Preset',
    'HasIrisSpeed'          => 'Has Iris Speed',
    'HasPanSpeed'           => 'Has Pan Speed',
    'HasPresets'            => 'Has Presets',
    'HasTiltSpeed'          => 'Has Tilt Speed',
    'HasTurboPan'           => 'Has Turbo Pan',
    'HasTurboTilt'          => 'Has Turbo Tilt',
    'HasWhiteSpeed'         => 'Has White Bal. Speed',
    'HasZoomSpeed'          => 'Has Zoom Speed',
    'HighBW'                => 'High&nbsp;B/W',
    'High'                  => 'High',
    'Home'                  => 'Home',
    'Hour'                  => 'Hour',
    'Hue'                   => 'Hue',
    'Id'                    => 'Id',
    'Idle'                  => 'Idle',
    'Ignore'                => 'Ignore',
    'ImageBufferSize'       => 'Image Buffer Size (frames)',
    'Image'                 => 'Image',
    'Images'                => 'Images',
    'Include'               => 'Include',
    'In'                    => 'In',
    'Inverted'              => 'Inverted',
    'Iris'                  => 'Iris',
    'KeyString'             => 'Key String',
    'Label'                 => 'Label',
    'Language'              => 'Language',
    'Last'                  => 'Last',
    'LimitResultsPost'      => 'results only', // This is used at the end of the phrase 'Limit to first N results only'
    'LimitResultsPre'       => 'Limit to first', // This is used at the beginning of the phrase 'Limit to first N results only'
    'LinkedMonitors'        => 'Linked Monitors',
    'List'                  => 'List',
    'Load'                  => 'Load',
    'Local'                 => 'Local',
    'LoggedInAs'            => 'Logged in as',
    'LoggingIn'             => 'Logging In',
    'Login'                 => 'Login',
    'Logout'                => 'Logout',
    'LowBW'                 => 'Low&nbsp;B/W',
    'Low'                   => 'Low',
    'Main'                  => 'Main',
    'Man'                   => 'Man',
    'Manual'                => 'Manual',
    'Mark'                  => 'Mark',
    'MaxBandwidth'          => 'Max Bandwidth',
    'MaxBrScore'            => 'Max.<br/>Score',
    'MaxFocusRange'         => 'Max Focus Range',
    'MaxFocusSpeed'         => 'Max Focus Speed',
    'MaxFocusStep'          => 'Max Focus Step',
    'MaxGainRange'          => 'Max Gain Range',
    'MaxGainSpeed'          => 'Max Gain Speed',
    'MaxGainStep'           => 'Max Gain Step',
    'MaximumFPS'            => 'Maximum FPS',
    'MaxIrisRange'          => 'Max Iris Range',
    'MaxIrisSpeed'          => 'Max Iris Speed',
    'MaxIrisStep'           => 'Max Iris Step',
    'Max'                   => 'Max',
    'MaxPanRange'           => 'Max Pan Range',
    'MaxPanSpeed'           => 'Max Pan Speed',
    'MaxPanStep'            => 'Max Pan Step',
    'MaxTiltRange'          => 'Max Tilt Range',
    'MaxTiltSpeed'          => 'Max Tilt Speed',
    'MaxTiltStep'           => 'Max Tilt Step',
    'MaxWhiteRange'         => 'Max White Bal. Range',
    'MaxWhiteSpeed'         => 'Max White Bal. Speed',
    'MaxWhiteStep'          => 'Max White Bal. Step',
    'MaxZoomRange'          => 'Max Zoom Range',
    'MaxZoomSpeed'          => 'Max Zoom Speed',
    'MaxZoomStep'           => 'Max Zoom Step',
    'MediumBW'              => 'Medium&nbsp;B/W',
    'Medium'                => 'Medium',
    'MinAlarmAreaLtMax'     => 'Minimum alarm area should be less than maximum',
    'MinAlarmAreaUnset'     => 'You must specify the minimum alarm pixel count',
    'MinBlobAreaLtMax'      => 'Minimum blob area should be less than maximum',
    'MinBlobAreaUnset'      => 'You must specify the minimum blob pixel count',
    'MinBlobLtMinFilter'    => 'Minimum blob area should be less than or equal to minimum filter area',
    'MinBlobsLtMax'         => 'Minimum blobs should be less than maximum',
    'MinBlobsUnset'         => 'You must specify the minimum blob count',
    'MinFilterAreaLtMax'    => 'Minimum filter area should be less than maximum',
    'MinFilterAreaUnset'    => 'You must specify the minimum filter pixel count',
    'MinFilterLtMinAlarm'   => 'Minimum filter area should be less than or equal to minimum alarm area',
    'MinFocusRange'         => 'Min Focus Range',
    'MinFocusSpeed'         => 'Min Focus Speed',
    'MinFocusStep'          => 'Min Focus Step',
    'MinGainRange'          => 'Min Gain Range',
    'MinGainSpeed'          => 'Min Gain Speed',
    'MinGainStep'           => 'Min Gain Step',
    'MinIrisRange'          => 'Min Iris Range',
    'MinIrisSpeed'          => 'Min Iris Speed',
    'MinIrisStep'           => 'Min Iris Step',
    'MinPanRange'           => 'Min Pan Range',
    'MinPanSpeed'           => 'Min Pan Speed',
    'MinPanStep'            => 'Min Pan Step',
    'MinPixelThresLtMax'    => 'Minimum pixel threshold should be less than maximum',
    'MinPixelThresUnset'    => 'You must specify a minimum pixel threshold',
    'MinTiltRange'          => 'Min Tilt Range',
    'MinTiltSpeed'          => 'Min Tilt Speed',
    'MinTiltStep'           => 'Min Tilt Step',
    'MinWhiteRange'         => 'Min White Bal. Range',
    'MinWhiteSpeed'         => 'Min White Bal. Speed',
    'MinWhiteStep'          => 'Min White Bal. Step',
    'MinZoomRange'          => 'Min Zoom Range',
    'MinZoomSpeed'          => 'Min Zoom Speed',
    'MinZoomStep'           => 'Min Zoom Step',
    'Misc'                  => 'Misc',
    'MonitorIds'            => 'Monitor&nbsp;Ids',
    'Monitor'               => 'Monitor',
    'MonitorPresetIntro'    => 'Select an appropriate preset from the list below.<br/><br/>Please note that this may overwrite any values you already have configured for the current monitor.<br/><br/>',
    'MonitorPreset'         => 'Monitor Preset',
    'MonitorProbeIntro'     => 'The list below shows detected analog and network cameras and whether they are already being used or available for selection.<br/><br/>Select the desired entry from the list below.<br/><br/>Please note that not all cameras may be detected and that choosing a camera here may overwrite any values you already have configured for the current monitor.<br/><br/>',
    'MonitorProbe'          => 'Monitor Probe',
    'Monitors'              => 'Monitors',
    'Montage'               => 'Montage',
    'Month'                 => 'Month',
    'Move'                  => 'Move',
    'MustBeGe'              => 'must be greater than or equal to',
    'MustBeLe'              => 'must be less than or equal to',
    'MustConfirmPassword'   => 'You must confirm the password',
    'MustSupplyPassword'    => 'You must supply a password',
    'MustSupplyUsername'    => 'You must supply a username',
    'Name'                  => 'Name',
    'Near'                  => 'Near',
    'Network'               => 'Network',
    'NewGroup'              => 'New Group',
    'NewLabel'              => 'New Label',
    'New'                   => 'New',
    'NewPassword'           => 'New Password',
    'NewState'              => 'New State',
    'NewUser'               => 'New User',
    'Next'                  => 'Next',
    'NoDetectedCameras'     => 'No Detected Cameras',
    'NoFramesRecorded'      => 'There are no frames recorded for this event',
    'NoGroup'               => 'No Group',
    'NoneAvailable'         => 'None available',
    'None'                  => 'None',
    'No'                    => 'No',
    'Normal'                => 'Normal',
    'NoSavedFilters'        => 'NoSavedFilters',
    'NoStatisticsRecorded'  => 'There are no statistics recorded for this event/frame',
    'Notes'                 => 'Notes',
    'NumPresets'            => 'Num Presets',
    'Off'                   => 'Off',
    'On'                    => 'On',
    'Open'                  => 'Open',
    'OpEq'                  => 'equal to',
    'OpGtEq'                => 'greater than or equal to',
    'OpGt'                  => 'greater than',
    'OpIn'                  => 'in set',
    'OpLtEq'                => 'less than or equal to',
    'OpLt'                  => 'less than',
    'OpMatches'             => 'matches',
    'OpNe'                  => 'not equal to',
    'OpNotIn'               => 'not in set',
    'OpNotMatches'          => 'does not match',
    'OptionHelp'            => 'Option Help',
    'OptionRestartWarning'  => 'These changes may not come into effect fully\nwhile the system is running. When you have\nfinished making your changes please ensure that\nyou restart ZoneMinder.',
    'Options'               => 'Options',
    'Order'                 => 'Order',
    'OrEnterNewName'        => 'or enter new name',
    'Orientation'           => 'Orientation',
    'Out'                   => 'Out',
    'OverwriteExisting'     => 'Overwrite Existing',
    'Paged'                 => 'Paged',
    'PanLeft'               => 'Pan Left',
    'Pan'                   => 'Pan',
    'PanRight'              => 'Pan Right',
    'PanTilt'               => 'Pan/Tilt',
    'Parameter'             => 'Parameter',
    'Password'              => 'Password',
    'PasswordsDifferent'    => 'The new and confirm passwords are different',
    'Paths'                 => 'Paths',
    'Pause'                 => 'Pause',
    'PhoneBW'               => 'Phone&nbsp;B/W',
    'Phone'                 => 'Phone',
    'PixelDiff'             => 'Pixel Diff',
    'Pixels'                => 'pixels',
    'PlayAll'               => 'Play All',
    'Play'                  => 'Play',
    'PleaseWait'            => 'Please Wait',
    'Point'                 => 'Point',
    'PostEventImageBuffer'  => 'Post Event Image Count',
    'PreEventImageBuffer'   => 'Pre Event Image Count',
    'PreserveAspect'        => 'Preserve Aspect Ratio',
    'Preset'                => 'Preset',
    'Presets'               => 'Presets',
    'Prev'                  => 'Prev',
    'Probe'                 => 'Probe',
    'Protocol'              => 'Protocol',
    'Rate'                  => 'Rate',
    'Real'                  => 'Real',
    'Record'                => 'Record',
    'RefImageBlendPct'      => 'Reference Image Blend %ge',
    'Refresh'               => 'Refresh',
    'RemoteHostName'        => 'Remote Host Name',
    'RemoteHostPath'        => 'Remote Host Path',
    'RemoteHostSubPath'     => 'Remote Host SubPath',
    'RemoteHostPort'        => 'Remote Host Port',
    'RemoteImageColours'    => 'Remote Image Colours',
    'RemoteMethod'          => 'Remote Method',
    'RemoteProtocol'        => 'Remote Protocol',
    'Remote'                => 'Remote',
    'Rename'                => 'Rename',
    'ReplayAll'             => 'All Events',
    'ReplayGapless'         => 'Gapless Events',
    'Replay'                => 'Replay',
    'ReplaySingle'          => 'Single Event',
    'ResetEventCounts'      => 'Reset Event Counts',
    'Reset'                 => 'Reset',
    'Restarting'            => 'Restarting',
    'Restart'               => 'Restart',
    'RestrictedCameraIds'   => 'Restricted Camera Ids',
    'RestrictedMonitors'    => 'Restricted Monitors',
    'ReturnDelay'           => 'Return Delay',
    'ReturnLocation'        => 'Return Location',
    'Rewind'                => 'Rewind',
    'RotateLeft'            => 'Rotate Left',
    'RotateRight'           => 'Rotate Right',
    'RunLocalUpdate'        => 'Please run zmupdate.pl to update',
    'RunMode'               => 'Run Mode',
    'Running'               => 'Running',
    'RunState'              => 'Run State',
    'SaveAs'                => 'Save as',
    'SaveFilter'            => 'Save Filter',
    'Save'                  => 'Save',
    'Scale'                 => 'Scale',
    'Score'                 => 'Score',
    'Secs'                  => 'Secs',
    'Sectionlength'         => 'Section length',
    'SelectMonitors'        => 'Select Monitors',
    'Select'                => 'Select',
    'SelfIntersecting'      => 'Polygon edges must not intersect',
    'SetNewBandwidth'       => 'Set New Bandwidth',
    'SetPreset'             => 'Set Preset',
    'Set'                   => 'Set',
    'Settings'              => 'Settings',
    'ShowFilterWindow'      => 'Show Filter Window',
    'ShowTimeline'          => 'Show Timeline',
    'SignalCheckColour'     => 'Signal Check Colour',
    'Size'                  => 'Size',
    'SkinDescription'       => 'Change the default skin for this computer',
    'Sleep'                 => 'Sleep',
    'SortAsc'               => 'Asc',
    'SortBy'                => 'Sort by',
    'SortDesc'              => 'Desc',
    'Source'                => 'Source',
    'SourceColours'         => 'Source Colours',
    'SourcePath'            => 'Source Path',
    'SourceType'            => 'Source Type',
    'SpeedHigh'             => 'High Speed',
    'SpeedLow'              => 'Low Speed',
    'SpeedMedium'           => 'Medium Speed',
    'Speed'                 => 'Speed',
    'SpeedTurbo'            => 'Turbo Speed',
    'Start'                 => 'Start',
    'State'                 => 'State',
    'Stats'                 => 'Stats',
    'Status'                => 'Status',
    'StepBack'              => 'Step Back',
    'StepForward'           => 'Step Forward',
    'StepLarge'             => 'Large Step',
    'StepMedium'            => 'Medium Step',
    'StepNone'              => 'No Step',
    'StepSmall'             => 'Small Step',
    'Step'                  => 'Step',
    'Stills'                => 'Stills',
    'Stopped'               => 'Stopped',
    'Stop'                  => 'Stop',
    'StreamReplayBuffer'    => 'Stream Replay Image Buffer',
    'Stream'                => 'Stream',
    'Submit'                => 'Submit',
    'System'                => 'System',
    'Tele'                  => 'Tele',
    'Thumbnail'             => 'Thumbnail',
    'Tilt'                  => 'Tilt',
    'TimeDelta'             => 'Time Delta',
    'Timeline'              => 'Timeline',
    'TimestampLabelFormat'  => 'Timestamp Label Format',
    'TimestampLabelX'       => 'Timestamp Label X',
    'TimestampLabelY'       => 'Timestamp Label Y',
    'Timestamp'             => 'Timestamp',
    'TimeStamp'             => 'Time Stamp',
    'Time'                  => 'Time',
    'Today'                 => 'Today',
    'Tools'                 => 'Tools',
    'TotalBrScore'          => 'Total<br/>Score',
    'TrackDelay'            => 'Track Delay',
    'TrackMotion'           => 'Track Motion',
    'Triggers'              => 'Triggers',
    'TurboPanSpeed'         => 'Turbo Pan Speed',
    'TurboTiltSpeed'        => 'Turbo Tilt Speed',
    'Type'                  => 'Type',
    'Unarchive'             => 'Unarchive',
    'Undefined'             => 'Undefined',
    'Units'                 => 'Units',
    'Unknown'               => 'Unknown',
    'UpdateAvailable'       => 'An update to ZoneMinder is available.',
    'UpdateNotNecessary'    => 'No update is necessary.',
    'Update'                => 'Update',
    'UseFilterExprsPost'    => '&nbsp;filter&nbsp;expressions', // This is used at the end of the phrase 'use N filter expressions'
    'UseFilterExprsPre'     => 'Use&nbsp;', // This is used at the beginning of the phrase 'use N filter expressions'
    'UseFilter'             => 'Use Filter',
    'Username'              => 'Username',
    'Users'                 => 'Users',
    'User'                  => 'User',
    'Value'                 => 'Value',
    'VersionIgnore'         => 'Ignore this version',
    'VersionRemindDay'      => 'Remind again in 1 day',
    'VersionRemindHour'     => 'Remind again in 1 hour',
    'VersionRemindNever'    => 'Don\'t remind about new versions',
    'VersionRemindWeek'     => 'Remind again in 1 week',
    'Version'               => 'Version',
    'VideoFormat'           => 'Video Format',
    'VideoGenFailed'        => 'Video Generation Failed!',
    'VideoGenFiles'         => 'Existing Video Files',
    'VideoGenNoFiles'       => 'No Video Files Found',
    'VideoGenParms'         => 'Video Generation Parameters',
    'VideoGenSucceeded'     => 'Video Generation Succeeded!',
    'VideoSize'             => 'Video Size',
    'Video'                 => 'Video',
    'ViewAll'               => 'View All',
    'ViewEvent'             => 'View Event',
    'ViewPaged'             => 'View Paged',
    'View'                  => 'View',
    'Wake'                  => 'Wake',
    'WarmupFrames'          => 'Warmup Frames',
    'Watch'                 => 'Watch',
    'WebColour'             => 'Web Colour',
    'Web'                   => 'Web',
    'Week'                  => 'Week',
    'WhiteBalance'          => 'White Balance',
    'White'                 => 'White',
    'Wide'                  => 'Wide',
    'X10ActivationString'   => 'X10 Activation String',
    'X10InputAlarmString'   => 'X10 Input Alarm String',
    'X10OutputAlarmString'  => 'X10 Output Alarm String',
    'X10'                   => 'X10',
    'X'                     => 'X',
    'Yes'                   => 'Yes',
    'YouNoPerms'            => 'You do not have permissions to access this resource.',
    'Y'                     => 'Y',
    'ZoneAlarmColour'       => 'Alarm Colour (Red/Green/Blue)',
    'ZoneArea'              => 'Zone Area',
    'ZoneFilterSize'        => 'Filter Width/Height (pixels)',
    'ZoneMinMaxAlarmArea'   => 'Min/Max Alarmed Area',
    'ZoneMinMaxBlobArea'    => 'Min/Max Blob Area',
    'ZoneMinMaxBlobs'       => 'Min/Max Blobs',
    'ZoneMinMaxFiltArea'    => 'Min/Max Filtered Area',
    'ZoneMinMaxPixelThres'  => 'Min/Max Pixel Threshold (0-255)',
    'ZoneOverloadFrames'    => 'Overload Frame Ignore Count',
    'Zones'                 => 'Zones',
    'Zone'                  => 'Zone',
    'ZoomIn'                => 'Zoom In',
    'ZoomOut'               => 'Zoom Out',
    'Zoom'                  => 'Zoom',
);

// Complex replacements with formatting and/or placements, must be passed through sprintf
$CLANG = array(
    'CurrentLogin'          => 'Current login is \'%1$s\'',
    'EventCount'            => '%1$s %2$s', // For example '37 Events' (from Vlang below)
    'LastEvents'            => 'Last %1$s %2$s', // For example 'Last 37 Events' (from Vlang below)
    'LatestRelease'         => 'The latest release is v%1$s, you have v%2$s.',
    'MonitorCount'          => '%1$s %2$s', // For example '4 Monitors' (from Vlang below)
    'MonitorFunction'       => 'Monitor %1$s Function',
    'RunningRecentVer'      => 'You are running the most recent version of ZoneMinder, v%s.',
    'VersionMismatch'       => 'Version mismatch, system is version %1$s, database is %2$s.',
);

// The next section allows you to describe a series of word ending and counts used to 
// generate the correctly conjugated forms of words depending on a count that is associated
// with that word.
// This intended to allow phrases such a '0 potatoes', '1 potato', '2 potatoes' etc to
// conjugate correctly with the associated count.
// In some languages such as English this is fairly simple and can be expressed by assigning
// a count with a singular or plural form of a word and then finding the nearest (lower) value.
// So '0' of something generally ends in 's', 1 of something is singular and has no extra
// ending and 2 or more is a plural and ends in 's' also. So to find the ending for '187' of
// something you would find the nearest lower count (2) and use that ending.
//
// So examples of this would be
// $zmVlangPotato = array( 0=>'Potatoes', 1=>'Potato', 2=>'Potatoes' );
// $zmVlangSheep = array( 0=>'Sheep' );
//
// where you can have as few or as many entries in the array as necessary
// If your language is similar in form to this then use the same format and choose the
// appropriate zmVlang function below.
// If however you have a language with a different format of plural endings then another
// approach is required . For instance in Russian the word endings change continuously
// depending on the last digit (or digits) of the numerator. In this case then zmVlang
// arrays could be written so that the array index just represents an arbitrary 'type'
// and the zmVlang function does the calculation about which version is appropriate.
//
// So an example in Russian might be (using English words, and made up endings as I
// don't know any Russian!!)
// 'Potato' => array( 1=>'Potati', 2=>'Potaton', 3=>'Potaten' ),
//
// and the zmVlang function decides that the first form is used for counts ending in
// 0, 5-9 or 11-19 and the second form when ending in 1 etc.
//

// Variable arrays expressing plurality, see the zmVlang description above
$VLANG = array(
    'Event'                 => array( 0=>'Events', 1=>'Event', 2=>'Events' ),
    'Monitor'               => array( 0=>'Monitors', 1=>'Monitor', 2=>'Monitors' ),
);
// You will need to choose or write a function that can correlate the plurality string arrays
// with variable counts. This is used to conjugate the Vlang arrays above with a number passed
// in to generate the correct noun form.
//
// In languages such as English this is fairly simple 
// Note this still has to be used with printf etc to get the right formating
function zmVlang( $langVarArray, $count )
{
    krsort( $langVarArray );
    foreach ( $langVarArray as $key=>$value )
    {
        if ( abs($count) >= $key )
        {
            return( $value );
        }
    }
    die( 'Error, unable to correlate variable language string' );
}

// This is an version that could be used in the Russian example above
// The rules are that the first word form is used if the count ends in
// 0, 5-9 or 11-19. The second form is used then the count ends in 1
// (not including 11 as above) and the third form is used when the 
// count ends in 2-4, again excluding any values ending in 12-14.
// 
// function zmVlang( $langVarArray, $count )
// {
//  $secondlastdigit = substr( $count, -2, 1 );
//  $lastdigit = substr( $count, -1, 1 );
//  // or
//  // $secondlastdigit = ($count/10)%10;
//  // $lastdigit = $count%10;
// 
//  // Get rid of the special cases first, the teens
//  if ( $secondlastdigit == 1 && $lastdigit != 0 )
//  {
//      return( $langVarArray[1] );
//  }
//  switch ( $lastdigit )
//  {
//      case 0 :
//      case 5 :
//      case 6 :
//      case 7 :
//      case 8 :
//      case 9 :
//      {
//          return( $langVarArray[1] );
//          break;
//      }
//      case 1 :
//      {
//          return( $langVarArray[2] );
//          break;
//      }
//      case 2 :
//      case 3 :
//      case 4 :
//      {
//          return( $langVarArray[3] );
//          break;
//      }
//  }
//  die( 'Error, unable to correlate variable language string' );
// }

// This is an example of how the function is used in the code which you can uncomment and 
// use to test your custom function.
//$monitors = array();
//$monitors[] = 1; // Choose any number
//echo sprintf( $CLANG['MonitorCount'], count($monitors), zmVlang( $VLANG['VlangMonitor'], count($monitors) ) );

// In this section you can override the default prompt and help texts for the options area
// These overrides are in the form show below where the array key represents the option name minus the initial ZM_
// So for example, to override the help text for ZM_LANG_DEFAULT do
$OLANG = array(
//    'LANG_DEFAULT' => array(
//        'Prompt' => "This is a new prompt for this option",
//        'Help' => "This is some new help for this option which will be displayed in the popup window when the ? is clicked"
//    ),
);

?>
