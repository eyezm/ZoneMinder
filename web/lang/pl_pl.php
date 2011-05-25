<?php
//
// ZoneMinder web Polish language file, $Date$, $Revision$
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

// ZoneMinder Polish Translation by Robert Krysztof

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
header( "Content-Type: text/html; charset=iso-8859-2" );

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
// setlocale( 'LC_ALL', 'pl_PL' ); // All locale settings pre-4.3.0
setlocale( LC_ALL, 'pl_PL' );   // All locale settings 4.3.0 and after
// setlocale( LC_CTYPE, 'pl_PL' ); // Character class settings 4.3.0 and after
// setlocale( LC_TIME, 'pl_PL' );  // Date and time formatting 4.3.0 and after

// Simple String Replacements
$SLANG = array(
    '24BitColour'          => 'Kolor (24 bity)',
    '8BitGrey'             => 'Cz/b (8 bit�w)',
    'Action'               => 'Action',
    'Actual'               => 'Aktualny',
    'AddNewControl'        => 'Add New Control',
    'AddNewMonitor'        => 'Dodaj nowy monitor',
    'AddNewUser'           => 'Dodaj u�ytkownika',
    'AddNewZone'           => 'Dodaj now� stref�',
    'Alarm'                => 'Alarm',
    'AlarmBrFrames'        => 'Ramki<br/>alarmowe',
    'AlarmFrame'           => 'Ramka alarmowa',
    'AlarmFrameCount'      => 'Alarm Frame Count',
    'AlarmLimits'          => 'Ograniczenia alarmu',
    'AlarmMaximumFPS'      => 'Alarm Maximum FPS',
    'AlarmPx'              => 'Alarm Px',
    'AlarmRGBUnset'        => 'You must set an alarm RGB colour',
    'Alert'                => 'Gotowosc',
    'All'                  => 'Wszystko',
    'Apply'                => 'Zastosuj',
    'ApplyingStateChange'  => 'Zmieniam stan pracy',
    'ArchArchived'         => 'Tylko zarchiwizowane',
    'ArchUnarchived'       => 'Tylko niezarchiwizowane',
    'Archive'              => 'Archiwum',
    'Archived'             => 'Archived',
    'Area'                 => 'Area',
    'AreaUnits'            => 'Area (px/%)',
    'AttrAlarmFrames'      => 'Ramki alarmowe',
    'AttrArchiveStatus'    => 'Status archiwum',
    'AttrAvgScore'         => '�red. wynik',
    'AttrCause'            => 'Cause',
    'AttrDate'             => 'Data',
    'AttrDateTime'         => 'Data/Czas',
    'AttrDiskBlocks'       => 'Dysk Bloki',
    'AttrDiskPercent'      => 'Dysk Procent',
    'AttrDuration'         => 'Czas trwania',
    'AttrFrames'           => 'Ramek',
    'AttrId'               => 'Id',
    'AttrMaxScore'         => 'Maks. wynik',
    'AttrMonitorId'        => 'Nr monitora',
    'AttrMonitorName'      => 'Nazwa monitora',
    'AttrName'             => 'Nazwa',
    'AttrNotes'            => 'Notes',
    'AttrSystemLoad'       => 'System Load',
    'AttrTime'             => 'Czas',
    'AttrTotalScore'       => 'Ca�kowity wynik',
    'AttrWeekday'          => 'Dzie� roboczy',
    'Auto'                 => 'Auto',
    'AutoStopTimeout'      => 'Auto Stop Timeout',
    'Available'            => 'Available',              // Added - 2009-03-31
    'AvgBrScore'           => '�red.<br/>wynik',
    'Background'           => 'Background',
    'BackgroundFilter'     => 'Run filter in background',
    'BadAlarmFrameCount'   => 'Alarm frame count must be an integer of one or more',
    'BadAlarmMaxFPS'       => 'Alarm Maximum FPS must be a positive integer or floating point value',
    'BadChannel'           => 'Channel must be set to an integer of zero or more',
    'BadDevice'            => 'Device must be set to a valid value',
    'BadFPSReportInterval' => 'FPS report interval buffer count must be an integer of 0 or more',
    'BadFormat'            => 'Format must be set to an integer of zero or more',
    'BadFrameSkip'         => 'Frame skip count must be an integer of zero or more',
    'BadHeight'            => 'Height must be set to a valid value',
    'BadHost'              => 'Host must be set to a valid ip address or hostname, do not include http://',
    'BadImageBufferCount'  => 'Image buffer size must be an integer of 10 or more',
    'BadLabelX'            => 'Label X co-ordinate must be set to an integer of zero or more',
    'BadLabelY'            => 'Label Y co-ordinate must be set to an integer of zero or more',
    'BadMaxFPS'            => 'Maximum FPS must be a positive integer or floating point value',
    'BadNameChars'         => 'Nazwy mog� zawiera� tylko litery, cyfry oraz my�lnik i podkre�lenie',
    'BadPalette'           => 'Palette must be set to a valid value', // Added - 2009-03-31
    'BadPath'              => 'Path must be set to a valid value',
    'BadPort'              => 'Port must be set to a valid number',
    'BadPostEventCount'    => 'Post event image count must be an integer of zero or more',
    'BadPreEventCount'     => 'Pre event image count must be at least zero, and less than image buffer size',
    'BadRefBlendPerc'      => 'Reference blend percentage must be a positive integer',
    'BadSectionLength'     => 'Section length must be an integer of 30 or more',
    'BadSignalCheckColour' => 'Signal check colour must be a valid RGB colour string',
    'BadStreamReplayBuffer'=> 'Stream replay buffer must be an integer of zero or more',
    'BadWarmupCount'       => 'Warmup frames must be an integer of zero or more',
    'BadWebColour'         => 'Web colour must be a valid web colour string',
    'BadWidth'             => 'Width must be set to a valid value',
    'Bandwidth'            => 'przepustowo��',
    'BlobPx'               => 'Plamka Px',
    'BlobSizes'            => 'Rozmiary plamek',
    'Blobs'                => 'Plamki',
    'Brightness'           => 'Jaskrawo��',
    'Buffers'              => 'Bufory',
    'CanAutoFocus'         => 'Can Auto Focus',
    'CanAutoGain'          => 'Can Auto Gain',
    'CanAutoIris'          => 'Can Auto Iris',
    'CanAutoWhite'         => 'Can Auto White Bal.',
    'CanAutoZoom'          => 'Can Auto Zoom',
    'CanFocus'             => 'Can Focus',
    'CanFocusAbs'          => 'Can Focus Absolute',
    'CanFocusCon'          => 'Can Focus Continuous',
    'CanFocusRel'          => 'Can Focus Relative',
    'CanGain'              => 'Can Gain ',
    'CanGainAbs'           => 'Can Gain Absolute',
    'CanGainCon'           => 'Can Gain Continuous',
    'CanGainRel'           => 'Can Gain Relative',
    'CanIris'              => 'Can Iris',
    'CanIrisAbs'           => 'Can Iris Absolute',
    'CanIrisCon'           => 'Can Iris Continuous',
    'CanIrisRel'           => 'Can Iris Relative',
    'CanMove'              => 'Can Move',
    'CanMoveAbs'           => 'Can Move Absolute',
    'CanMoveCon'           => 'Can Move Continuous',
    'CanMoveDiag'          => 'Can Move Diagonally',
    'CanMoveMap'           => 'Can Move Mapped',
    'CanMoveRel'           => 'Can Move Relative',
    'CanPan'               => 'Can Pan' ,
    'CanReset'             => 'Can Reset',
    'CanSetPresets'        => 'Can Set Presets',
    'CanSleep'             => 'Can Sleep',
    'CanTilt'              => 'Can Tilt',
    'CanWake'              => 'Can Wake',
    'CanWhite'             => 'Can White Balance',
    'CanWhiteAbs'          => 'Can White Bal. Absolute',
    'CanWhiteBal'          => 'Can White Bal.',
    'CanWhiteCon'          => 'Can White Bal. Continuous',
    'CanWhiteRel'          => 'Can White Bal. Relative',
    'CanZoom'              => 'Can Zoom',
    'CanZoomAbs'           => 'Can Zoom Absolute',
    'CanZoomCon'           => 'Can Zoom Continuous',
    'CanZoomRel'           => 'Can Zoom Relative',
    'Cancel'               => 'Anuluj',
    'CancelForcedAlarm'    => 'Anuluj wymuszony alarm',
    'CaptureHeight'        => 'Wysoko�� obrazu',
    'CaptureMethod'        => 'Capture Method',         // Added - 2009-02-08
    'CapturePalette'       => 'Paleta kolor�w obrazu',
    'CaptureWidth'         => 'Szeroko�� obrazu',
    'Cause'                => 'Cause',
    'CheckMethod'          => 'Metoda sprawdzenia alarmu',
    'ChooseDetectedCamera' => 'Choose Detected Camera', // Added - 2009-03-31
    'ChooseFilter'         => 'Wybierz filtr',
    'ChoosePreset'         => 'Choose Preset',
    'Close'                => 'Zamknij',
    'Colour'               => 'Nasycenie',
    'Command'              => 'Command',
    'Config'               => 'Konfiguracja',
    'ConfiguredFor'        => 'Ustawiona',
    'ConfirmDeleteEvents'  => 'Are you sure you wish to delete the selected events?',
    'ConfirmPassword'      => 'Potwierd� has�o',
    'ConjAnd'              => 'i',
    'ConjOr'               => 'lub',
    'Console'              => 'Konsola',
    'ContactAdmin'         => 'Skontaktuj si� z Twoim adminstratorem w sprawie szczeg��w.',
    'Continue'             => 'Continue',
    'Contrast'             => 'Kontrast',
    'Control'              => 'Control',
    'ControlAddress'       => 'Control Address',
    'ControlCap'           => 'Control Capability',
    'ControlCaps'          => 'Control Capabilities',
    'ControlDevice'        => 'Control Device',
    'ControlType'          => 'Control Type',
    'Controllable'         => 'Controllable',
    'Cycle'                => 'Cycle',
    'CycleWatch'           => 'Cykl podgl�du',
    'Day'                  => 'Dzie�',
    'Debug'                => 'Debug',
    'DefaultRate'          => 'Default Rate',
    'DefaultScale'         => 'Default Scale',
    'DefaultView'          => 'Default View',
    'Delete'               => 'Usu�',
    'DeleteAndNext'        => 'Usu� &amp; nast�pny',
    'DeleteAndPrev'        => 'Usu� &amp; poprzedni',
    'DeleteSavedFilter'    => 'Usu� zapisany filtr',
    'Description'          => 'Opis',
    'DetectedCameras'      => 'Detected Cameras',       // Added - 2009-03-31
    'Device'               => 'Device',                 // Added - 2009-02-08
    'DeviceChannel'        => 'Numer wej�cia w urz�dzeniu',
    'DeviceFormat'         => 'System TV',
    'DeviceNumber'         => 'Numer urz�dzenia',
    'DevicePath'           => 'Device Path',
    'Devices'              => 'Devices',
    'Dimensions'           => 'Rozmiary',
    'DisableAlarms'        => 'Disable Alarms',
    'Disk'                 => 'Dysk',
    'Display'              => 'Display',                // Added - 2011-01-30
    'Donate'               => 'Please Donate',
    'DonateAlready'        => 'No, I\'ve already donated',
    'DonateEnticement'     => 'You\'ve been running ZoneMinder for a while now and hopefully are finding it a useful addition to your home or workplace security. Although ZoneMinder is, and will remain, free and open source, it costs money to develop and support. If you would like to help support future development and new features then please consider donating. Donating is, of course, optional but very much appreciated and you can donate as much or as little as you like.<br><br>If you would like to donate please select the option below or go to http://www.zoneminder.com/donate.html in your browser.<br><br>Thank you for using ZoneMinder and don\'t forget to visit the forums on ZoneMinder.com for support or suggestions about how to make your ZoneMinder experience even better.',
    'DonateRemindDay'      => 'Not yet, remind again in 1 day',
    'DonateRemindHour'     => 'Not yet, remind again in 1 hour',
    'DonateRemindMonth'    => 'Not yet, remind again in 1 month',
    'DonateRemindNever'    => 'No, I don\'t want to donate, never remind',
    'DonateRemindWeek'     => 'Not yet, remind again in 1 week',
    'DonateYes'            => 'Yes, I\'d like to donate now',
    'Download'             => 'Download',
    'DuplicateMonitorName' => 'Duplicate Monitor Name', // Added - 2009-03-31
    'Duration'             => 'Czas trwania',
    'Edit'                 => 'Edycja',
    'Email'                => 'Email',
    'EnableAlarms'         => 'Enable Alarms',
    'Enabled'              => 'Zezwolono',
    'EnterNewFilterName'   => 'Wpisz now� nazw� filtra',
    'Error'                => 'B��d',
    'ErrorBrackets'        => 'B��d, prosz� sprawdzi� ilo�� nawias�w otwieraj�cych i zamykaj�cych',
    'ErrorValidValue'      => 'B��d, prosz� sprawdzi� czy wszystkie warunki maj� poprawne warto�ci',
    'Etc'                  => 'itp',
    'Event'                => 'Zdarzenie',
    'EventFilter'          => 'Filtr zdarze�',
    'EventId'              => 'Id zdarzenia',
    'EventName'            => 'Event Name',
    'EventPrefix'          => 'Event Prefix',
    'Events'               => 'Zdarzenia',
    'Exclude'              => 'Wyklucz',
    'Execute'              => 'Execute',
    'Export'               => 'Export',
    'ExportDetails'        => 'Export Event Details',
    'ExportFailed'         => 'Export Failed',
    'ExportFormat'         => 'Export File Format',
    'ExportFormatTar'      => 'Tar',
    'ExportFormatZip'      => 'Zip',
    'ExportFrames'         => 'Export Frame Details',
    'ExportImageFiles'     => 'Export Image Files',
    'ExportMiscFiles'      => 'Export Other Files (if present)',
    'ExportOptions'        => 'Export Options',
    'ExportSucceeded'      => 'Export Succeeded',       // Added - 2009-02-08
    'ExportVideoFiles'     => 'Export Video Files (if present)',
    'Exporting'            => 'Exporting',
    'FPS'                  => 'fps',
    'FPSReportInterval'    => 'Raport (ramek/s)',
    'FTP'                  => 'FTP',
    'Far'                  => 'Far',
    'FastForward'          => 'Fast Forward',
    'Feed'                 => 'Dostarcz',
    'Ffmpeg'               => 'Ffmpeg',                 // Added - 2009-02-08
    'File'                 => 'File',
    'FilterArchiveEvents'  => 'Archiwizuj wszystkie pasuj�ce',
    'FilterDeleteEvents'   => 'Usuwaj wszystkie pasuj�ce',
    'FilterEmailEvents'    => 'Wysy�aj poczt� wszystkie pasuj�ce',
    'FilterExecuteEvents'  => 'Wywo�uj komend� na wszystkie pasuj�ce',
    'FilterMessageEvents'  => 'Wy�wietlaj komunikat na wszystkie pasuj�ce',
    'FilterPx'             => 'Filtr Px',
    'FilterUnset'          => 'You must specify a filter width and height',
    'FilterUploadEvents'   => 'Wysy�aj wszystkie pasuj�ce',
    'FilterVideoEvents'    => 'Create video for all matches',
    'Filters'              => 'Filters',
    'First'                => 'Pierwszy',
    'FlippedHori'          => 'Flipped Horizontally',
    'FlippedVert'          => 'Flipped Vertically',
    'Focus'                => 'Focus',
    'ForceAlarm'           => 'Wymu� alarm',
    'Format'               => 'Format',
    'Frame'                => 'Ramka',
    'FrameId'              => 'Nr ramki',
    'FrameRate'            => 'Tempo ramek',
    'FrameSkip'            => 'Pomi� ramk�',
    'Frames'               => 'Ramek',
    'Func'                 => 'Funkcja',
    'Function'             => 'Funkcja',
    'Gain'                 => 'Gain',
    'General'              => 'General',
    'GenerateVideo'        => 'Generowanie Video',
    'GeneratingVideo'      => 'Generuj� Video',
    'GoToZoneMinder'       => 'Przejd� na ZoneMinder.com',
    'Grey'                 => 'Cz/b',
    'Group'                => 'Group',
    'Groups'               => 'Groups',
    'HasFocusSpeed'        => 'Has Focus Speed',
    'HasGainSpeed'         => 'Has Gain Speed',
    'HasHomePreset'        => 'Has Home Preset',
    'HasIrisSpeed'         => 'Has Iris Speed',
    'HasPanSpeed'          => 'Has Pan Speed',
    'HasPresets'           => 'Has Presets',
    'HasTiltSpeed'         => 'Has Tilt Speed',
    'HasTurboPan'          => 'Has Turbo Pan',
    'HasTurboTilt'         => 'Has Turbo Tilt',
    'HasWhiteSpeed'        => 'Has White Bal. Speed',
    'HasZoomSpeed'         => 'Has Zoom Speed',
    'High'                 => 'wysoka',
    'HighBW'               => 'Wys.&nbsp;prz.',
    'Home'                 => 'Home',
    'Hour'                 => 'Godzina',
    'Hue'                  => 'Odcie�',
    'Id'                   => 'Nr',
    'Idle'                 => 'Bezczynny',
    'Ignore'               => 'Ignoruj',
    'Image'                => 'Obraz',
    'ImageBufferSize'      => 'Rozmiar bufora obrazu (ramek)',
    'Images'               => 'Images',
    'In'                   => 'In',
    'Include'              => 'Do��cz',
    'Inverted'             => 'Odwr�cony',
    'Iris'                 => 'Iris',
    'KeyString'            => 'Key String',
    'Label'                => 'Label',
    'Language'             => 'J�zyk',
    'Last'                 => 'Ostatni',
    'Layout'               => 'Layout',                 // Added - 2009-02-08
    'LimitResultsPost'     => 'wynik�w;', // This is used at the end of the phrase 'Limit to first N results only'
    'LimitResultsPre'      => 'Ogranicz do pocz�tkowych', // This is used at the beginning of the phrase 'Limit to first N results only'
    'LinkedMonitors'       => 'Linked Monitors',
    'List'                 => 'List',
    'Load'                 => 'Obc.',
    'Local'                => 'Lokalny',
    'LoggedInAs'           => 'Zalogowany jako',
    'LoggingIn'            => 'Logowanie',
    'Login'                => 'Login',
    'Logout'               => 'Wyloguj',
    'Low'                  => 'niska',
    'LowBW'                => 'Nis.&nbsp;prz.',
    'Main'                 => 'Main',
    'Man'                  => 'Man',
    'Manual'               => 'Manual',
    'Mark'                 => 'Znacznik',
    'Max'                  => 'Maks.',
    'MaxBandwidth'         => 'Max Bandwidth',
    'MaxBrScore'           => 'Maks.<br/>wynik',
    'MaxFocusRange'        => 'Max Focus Range',
    'MaxFocusSpeed'        => 'Max Focus Speed',
    'MaxFocusStep'         => 'Max Focus Step',
    'MaxGainRange'         => 'Max Gain Range',
    'MaxGainSpeed'         => 'Max Gain Speed',
    'MaxGainStep'          => 'Max Gain Step',
    'MaxIrisRange'         => 'Max Iris Range',
    'MaxIrisSpeed'         => 'Max Iris Speed',
    'MaxIrisStep'          => 'Max Iris Step',
    'MaxPanRange'          => 'Max Pan Range',
    'MaxPanSpeed'          => 'Max Pan Speed',
    'MaxPanStep'           => 'Max Pan Step',
    'MaxTiltRange'         => 'Max Tilt Range',
    'MaxTiltSpeed'         => 'Max Tilt Speed',
    'MaxTiltStep'          => 'Max Tilt Step',
    'MaxWhiteRange'        => 'Max White Bal. Range',
    'MaxWhiteSpeed'        => 'Max White Bal. Speed',
    'MaxWhiteStep'         => 'Max White Bal. Step',
    'MaxZoomRange'         => 'Max Zoom Range',
    'MaxZoomSpeed'         => 'Max Zoom Speed',
    'MaxZoomStep'          => 'Max Zoom Step',
    'MaximumFPS'           => 'Maks. FPS',
    'Medium'               => '�rednia',
    'MediumBW'             => '�red.&nbsp;prz.',
    'MinAlarmAreaLtMax'    => 'Minimum alarm area should be less than maximum',
    'MinAlarmAreaUnset'    => 'You must specify the minimum alarm pixel count',
    'MinBlobAreaLtMax'     => 'Minimalny obszar plamki powinien by� mniejszy od maksymalnego obszaru plamki',
    'MinBlobAreaUnset'     => 'You must specify the minimum blob pixel count',
    'MinBlobLtMinFilter'   => 'Minimum blob area should be less than or equal to minimum filter area',
    'MinBlobsLtMax'        => 'Najmniejsze plamki powinny by� mniejsze od najwi�kszych plamek' ,
    'MinBlobsUnset'        => 'You must specify the minimum blob count',
    'MinFilterAreaLtMax'   => 'Minimum filter area should be less than maximum',
    'MinFilterAreaUnset'   => 'You must specify the minimum filter pixel count',
    'MinFilterLtMinAlarm'  => 'Minimum filter area should be less than or equal to minimum alarm area',
    'MinFocusRange'        => 'Min Focus Range',
    'MinFocusSpeed'        => 'Min Focus Speed',
    'MinFocusStep'         => 'Min Focus Step',
    'MinGainRange'         => 'Min Gain Range',
    'MinGainSpeed'         => 'Min Gain Speed',
    'MinGainStep'          => 'Min Gain Step',
    'MinIrisRange'         => 'Min Iris Range',
    'MinIrisSpeed'         => 'Min Iris Speed',
    'MinIrisStep'          => 'Min Iris Step',
    'MinPanRange'          => 'Min Pan Range',
    'MinPanSpeed'          => 'Min Pan Speed',
    'MinPanStep'           => 'Min Pan Step',
    'MinPixelThresLtMax'   => 'Najmniejsze progi pikseli powinny by� mniejsze od najwi�kszych prog�w pikseli',
    'MinPixelThresUnset'   => 'You must specify a minimum pixel threshold',
    'MinTiltRange'         => 'Min Tilt Range',
    'MinTiltSpeed'         => 'Min Tilt Speed',
    'MinTiltStep'          => 'Min Tilt Step',
    'MinWhiteRange'        => 'Min White Bal. Range',
    'MinWhiteSpeed'        => 'Min White Bal. Speed',
    'MinWhiteStep'         => 'Min White Bal. Step',
    'MinZoomRange'         => 'Min Zoom Range',
    'MinZoomSpeed'         => 'Min Zoom Speed',
    'MinZoomStep'          => 'Min Zoom Step',
    'Misc'                 => 'Inne',
    'Monitor'              => 'Monitor',
    'MonitorIds'           => 'Numery&nbsp;monitor�w',
    'MonitorPreset'        => 'Monitor Preset',
    'MonitorPresetIntro'   => 'Select an appropriate preset from the list below.<br><br>Please note that this may overwrite any values you already have configured for this monitor.<br><br>',
    'MonitorProbe'         => 'Monitor Probe',          // Added - 2009-03-31
    'MonitorProbeIntro'    => 'The list below shows detected analog and network cameras and whether they are already being used or available for selection.<br/><br/>Select the desired entry from the list below.<br/><br/>Please note that not all cameras may be detected and that choosing a camera here may overwrite any values you already have configured for the current monitor.<br/><br/>', // Added - 2009-03-31
    'Monitors'             => 'Monitory',
    'Montage'              => 'Monta�',
    'Month'                => 'Miesi�c',
    'Move'                 => 'Move',
    'MustBeGe'             => 'musi by� wi�ksze lub r�wne od',
    'MustBeLe'             => 'musi by� mniejsze lub r�wne od',
    'MustConfirmPassword'  => 'Musisz potwierdzi� has�o',
    'MustSupplyPassword'   => 'Musisz poda� has�o',
    'MustSupplyUsername'   => 'Musisz poda� nazw� u�ytkownika',
    'Name'                 => 'Nazwa',
    'Near'                 => 'Near',
    'Network'              => 'Sie�',
    'New'                  => 'Nowy',
    'NewGroup'             => 'New Group',
    'NewLabel'             => 'New Label',
    'NewPassword'          => 'Nowe has�o',
    'NewState'             => 'Nowy stan',
    'NewUser'              => 'nowy',
    'Next'                 => 'Nast�pny',
    'No'                   => 'Nie',
    'NoDetectedCameras'    => 'No Detected Cameras',    // Added - 2009-03-31
    'NoFramesRecorded'     => 'Brak zapisanych ramek dla tego zdarzenia',
    'NoGroup'              => 'No Group',
    'NoSavedFilters'       => 'BrakZapisanychFiltr�w',
    'NoStatisticsRecorded' => 'Brak zapisanych statystyk dla tego zdarzenia/ramki',
    'None'                 => 'Brak',
    'NoneAvailable'        => 'Niedost�pne',
    'Normal'               => 'Normalny',
    'Notes'                => 'Notes',
    'NumPresets'           => 'Num Presets',
    'Off'                  => 'Off',
    'On'                   => 'On',
    'OpEq'                 => 'r�wny',
    'OpGt'                 => 'wi�ksze od',
    'OpGtEq'               => 'wi�ksze lub r�wne od',
    'OpIn'                 => 'w zestawie',
    'OpLt'                 => 'mniejsze od',
    'OpLtEq'               => 'mniejsze lub r�wne od',
    'OpMatches'            => 'pasuj�ce',
    'OpNe'                 => 'r�ne od',
    'OpNotIn'              => 'brak w zestawie',
    'OpNotMatches'         => 'nie pasuj�ce',
    'Open'                 => 'Open',
    'OptionHelp'           => 'OpcjePomoc',
    'OptionRestartWarning' => 'Te zmiany nie przynios� natychmiastowego efektu\ndop�ki system pracuje. Kiedy zako�czysz robi� zmiany\nprosz� koniecznie zrestartowa� ZoneMinder.',
    'Options'              => 'Opcje',
    'OrEnterNewName'       => 'lub wpisz now� nazw�',
    'Order'                => 'Order',
    'Orientation'          => 'Orientacja',
    'Out'                  => 'Out',
    'OverwriteExisting'    => 'Nadpisz istniej�ce',
    'Paged'                => 'Stronicowane',
    'Pan'                  => 'Pan',
    'PanLeft'              => 'Pan Left',
    'PanRight'             => 'Pan Right',
    'PanTilt'              => 'Pan/Tilt',
    'Parameter'            => 'Parametr',
    'Password'             => 'Has�o',
    'PasswordsDifferent'   => 'Has�a: nowe i potwierdzone s� r�ne!',
    'Paths'                => '�cie�ki',
    'Pause'                => 'Pause',
    'Phone'                => 'Phone',
    'PhoneBW'              => 'Tel.&nbsp;prz.',
    'PixelDiff'            => 'Pixel Diff',
    'Pixels'               => 'pikseli',
    'Play'                 => 'Play',
    'PlayAll'              => 'Play All',
    'PleaseWait'           => 'Prosz� czeka�',
    'Point'                => 'Point',
    'PostEventImageBuffer' => 'Bufor obraz�w po zdarzeniu',
    'PreEventImageBuffer'  => 'Bufor obraz�w przed zdarzeniem',
    'PreserveAspect'       => 'Preserve Aspect Ratio',
    'Preset'               => 'Preset',
    'Presets'              => 'Presets',
    'Prev'                 => 'Poprzedni',
    'Probe'                => 'Probe',                  // Added - 2009-03-31
    'Protocol'             => 'Protocol',
    'Rate'                 => 'Tempo',
    'Real'                 => 'Rzeczywiste',
    'Record'               => 'Zapis',
    'RefImageBlendPct'     => 'Miks z obrazem odniesienia',
    'Refresh'              => 'Od�wie�',
    'Remote'               => 'Zdalny',
    'RemoteHostName'       => 'Nazwa zdalnego hosta',
    'RemoteHostPath'       => 'Scie�ka zdalnego hosta',
    'RemoteHostPort'       => 'Port zdalnego hosta',
    'RemoteHostSubPath'    => 'Remote Host SubPath',    // Added - 2009-02-08
    'RemoteImageColours'   => 'Kolory zdalnego obrazu',
    'RemoteMethod'         => 'Remote Method',          // Added - 2009-02-08
    'RemoteProtocol'       => 'Remote Protocol',        // Added - 2009-02-08
    'Rename'               => 'Zmie� nazw�',
    'Replay'               => 'Replay',
    'ReplayAll'            => 'All Events',
    'ReplayGapless'        => 'Gapless Events',
    'ReplaySingle'         => 'Single Event',
    'Reset'                => 'Reset',
    'ResetEventCounts'     => 'Kasuj licznik zdarze�',
    'Restart'              => 'Restart',
    'Restarting'           => 'Restartuj�',
    'RestrictedCameraIds'  => 'Numery kamer',
    'RestrictedMonitors'   => 'Restricted Monitors',
    'ReturnDelay'          => 'Return Delay',
    'ReturnLocation'       => 'Return Location',
    'Rewind'               => 'Rewind',
    'RotateLeft'           => 'Obr�� w lewo',
    'RotateRight'          => 'Obr�� w prawo',
    'RunLocalUpdate'       => 'Please run zmupdate.pl to update', // Added - 2011-05-25
    'RunMode'              => 'Tryb pracy',
    'RunState'             => 'Stan pracy',
    'Running'              => 'Pracuje',
    'Save'                 => 'Zapisz',
    'SaveAs'               => 'Zapisz jako',
    'SaveFilter'           => 'Zapisz filtr',
    'Scale'                => 'Skala',
    'Score'                => 'Wynik',
    'Secs'                 => 'Sekund',
    'Sectionlength'        => 'D�ugo�� sekcji',
    'Select'               => 'Select',
    'SelectMonitors'       => 'Select Monitors',
    'SelfIntersecting'     => 'Polygon edges must not intersect',
    'Set'                  => 'Set',
    'SetNewBandwidth'      => 'Ustaw now� przepustowo��',
    'SetPreset'            => 'Set Preset',
    'Settings'             => 'Ustawienia',
    'ShowFilterWindow'     => 'Poka�OknoFiltru',
    'ShowTimeline'         => 'Show Timeline',
    'SignalCheckColour'    => 'Signal Check Colour',
    'Size'                 => 'Size',
    'SkinDescription'      => 'Change the default skin for this computer', // Added - 2011-01-30
    'Sleep'                => 'Sleep',
    'SortAsc'              => 'Nara.',
    'SortBy'               => 'Sortuj',
    'SortDesc'             => 'Opad.',
    'Source'               => '�r�d�o',
    'SourceColours'        => 'Source Colours',         // Added - 2009-02-08
    'SourcePath'           => 'Source Path',            // Added - 2009-02-08
    'SourceType'           => 'Typ �r�d�a',
    'Speed'                => 'Speed',
    'SpeedHigh'            => 'High Speed',
    'SpeedLow'             => 'Low Speed',
    'SpeedMedium'          => 'Medium Speed',
    'SpeedTurbo'           => 'Turbo Speed',
    'Start'                => 'Start',
    'State'                => 'Stan',
    'Stats'                => 'Statystyki',
    'Status'               => 'Status',
    'Step'                 => 'Step',
    'StepBack'             => 'Step Back',
    'StepForward'          => 'Step Forward',
    'StepLarge'            => 'Large Step',
    'StepMedium'           => 'Medium Step',
    'StepNone'             => 'No Step',
    'StepSmall'            => 'Small Step',
    'Stills'               => 'Nieruchome',
    'Stop'                 => 'Stop',
    'Stopped'              => 'Zatrzymany',
    'Stream'               => 'Ruchomy',
    'StreamReplayBuffer'   => 'Stream Replay Image Buffer',
    'Submit'               => 'Submit',
    'System'               => 'System',
    'Tele'                 => 'Tele',
    'Thumbnail'            => 'Thumbnail',
    'Tilt'                 => 'Tilt',
    'Time'                 => 'Czas',
    'TimeDelta'            => 'R�nica czasu',
    'TimeStamp'            => 'Piecz�� czasu',
    'Timeline'             => 'Timeline',
    'Timestamp'            => 'Czas',
    'TimestampLabelFormat' => 'Format etykiety czasu',
    'TimestampLabelX'      => 'Wsp. X etykiety czasu',
    'TimestampLabelY'      => 'Wsp. Y etykiety czasu',
    'Today'                => 'Today',
    'Tools'                => 'Narz�dzia',
    'TotalBrScore'         => 'Ca�kowity<br/>wynik',
    'TrackDelay'           => 'Track Delay',
    'TrackMotion'          => 'Track Motion',
    'Triggers'             => 'Wyzwalacze',
    'TurboPanSpeed'        => 'Turbo Pan Speed',
    'TurboTiltSpeed'       => 'Turbo Tilt Speed',
    'Type'                 => 'Typ',
    'Unarchive'            => 'Nie archiwizuj',
    'Undefined'            => 'Undefined',              // Added - 2009-02-08
    'Units'                => 'Jednostki',
    'Unknown'              => 'Nieznany',
    'Update'               => 'Update',
    'UpdateAvailable'      => 'Jest dost�pne uaktualnienie ZoneMinder ',
    'UpdateNotNecessary'   => 'Nie jest wymagane uaktualnienie',
    'UseFilter'            => 'U�yj filtru',
    'UseFilterExprsPost'   => '&nbsp;wyra�enie&nbsp;filtru', // This is used at the end of the phrase 'use N filter expressions'
    'UseFilterExprsPre'    => 'U�yj&nbsp;', // This is used at the beginning of the phrase 'use N filter expressions'
    'User'                 => 'U�ytkownik',
    'Username'             => 'Nazwa u�ytkownika',
    'Users'                => 'U�ytkownicy',
    'Value'                => 'Warto��',
    'Version'              => 'Wersja',
    'VersionIgnore'        => 'Zignoruj t� wersj�',
    'VersionRemindDay'     => 'Przypomnij po 1 dniu',
    'VersionRemindHour'    => 'Przypomnij po 1 godzinie',
    'VersionRemindNever'   => 'Nie przypominaj o nowych wersjach',
    'VersionRemindWeek'    => 'Przypomnij po 1 tygodniu',
    'Video'                => 'Video',
    'VideoFormat'          => 'Video Format',
    'VideoGenFailed'       => 'Generowanie filmu Video nie powiod�o si�!',
    'VideoGenFiles'        => 'Existing Video Files',
    'VideoGenNoFiles'      => 'No Video Files Found',
    'VideoGenParms'        => 'Parametery generowania filmu Video',
    'VideoGenSucceeded'    => 'Video Generation Succeeded!',
    'VideoSize'            => 'Rozmiar filmu Video',
    'View'                 => 'Podgl�d',
    'ViewAll'              => 'Poka� wszystko',
    'ViewEvent'            => 'View Event',
    'ViewPaged'            => 'Poka� stronami',
    'Wake'                 => 'Wake',
    'WarmupFrames'         => 'Ignorowane ramki',
    'Watch'                => 'podgl�d',
    'Web'                  => 'Web',
    'WebColour'            => 'Web Colour',
    'Week'                 => 'Tydzie�',
    'White'                => 'White',
    'WhiteBalance'         => 'White Balance',
    'Wide'                 => 'Wide',
    'X'                    => 'X',
    'X10'                  => 'X10',
    'X10ActivationString'  => 'X10: �a�cuch aktywuj�cy',
    'X10InputAlarmString'  => 'X10: �a�cuch wej�cia alarmu',
    'X10OutputAlarmString' => 'X10: �a�cuch wyj�cia alarmu',
    'Y'                    => 'Y',
    'Yes'                  => 'Tak',
    'YouNoPerms'           => 'Nie masz uprawnie� na dost�p do tego zasobu.',
    'Zone'                 => 'Strefa',
    'ZoneAlarmColour'      => 'Kolor alarmu (Red/Green/Blue)',
    'ZoneArea'             => 'Zone Area',
    'ZoneFilterSize'       => 'Filter Width/Height (pixels)',
    'ZoneMinMaxAlarmArea'  => 'Min/Max Alarmed Area',
    'ZoneMinMaxBlobArea'   => 'Min/Max Blob Area',
    'ZoneMinMaxBlobs'      => 'Min/Max Blobs',
    'ZoneMinMaxFiltArea'   => 'Min/Max Filtered Area',
    'ZoneMinMaxPixelThres' => 'Min/Max Pixel Threshold (0-255)',
    'ZoneOverloadFrames'   => 'Overload Frame Ignore Count',
    'Zones'                => 'Strefy',
    'Zoom'                 => 'Zoom',
    'ZoomIn'               => 'Zoom In',
    'ZoomOut'              => 'Zoom Out',
);

// Complex replacements with formatting and/or placements, must be passed through sprintf
$CLANG = array(
    'CurrentLogin'         => 'Aktualny login \'%1$s\'',
    'EventCount'           => '%1$s %2$s',
    'LastEvents'           => 'Ostatnie %1$s %2$s',
    'LatestRelease'        => 'Najnowsza wersja to v%1$s, Ty posiadasz v%2$s.',
    'MonitorCount'         => '%1$s %2$s',
    'MonitorFunction'      => 'Monitor %1$s Funkcja',
    'RunningRecentVer'     => 'Uruchomi�e� najnowsz� wersj� ZoneMinder, v%s.',
    'VersionMismatch'      => 'Version mismatch, system is version %1$s, database is %2$s.', // Added - 2011-05-25
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
// $zmVlangPotato = array( 1=>'Potati', 2=>'Potaton', 3=>'Potaten' );
//
// and the zmVlang function decides that the first form is used for counts ending in
// 0, 5-9 or 11-19 and the second form when ending in 1 etc.
//

// Variable arrays expressing plurality, see the zmVlang description above
$VLANG = array(
    'Event'                => array( 0=>'Zdarze�', 1=>'Zdarzenie', 2=>'Zdarzenia'),
    'Monitor'              => array( 0=>'Monitor�w', 1=>'Monitor', 2=>'Monitory'),
);

// You will need to choose or write a function that can correlate the plurality string arrays
// with variable counts. This is used to conjugate the Vlang arrays above with a number passed
// in to generate the correct noun form.

// This is an version that could be used in the Polish language
// 
function zmVlang( $langVarArray, $count )
{
    $secondlastdigit = substr( $count, -2, 1 );
    $lastdigit = substr( $count, -1, 1 );
    if ( $count == 1 )
    {
        return( $langVarArray[1] );
    }
    if (($secondlastdigit == 0)|( $secondlastdigit == 1))
    {
        return( $langVarArray[0] );
    }
    if ( $secondlastdigit >= 2)
    {
        switch ( $lastdigit )
        {
            case 0 :
            case 1 :
            case 5 :
            case 6 :
            case 7 :
            case 8 :
            case 9 :
            {
                return( $langVarArray[0] );
                break;
            }
            case 2 :
            case 3 :
            case 4 :
            {
                return( $langVarArray[2] );
                break;
            }
        }
    }
    die( 'B��D! zmVlang nie mo�e skorelowac �a�cucha!' );
}

// This is an example of how the function is used in the code which you can uncomment and 
// use to test your custom function.
// $monitors = 12; // Choose any number
// echo $monitors." ";
// echo zmVlang( $zmVlangMonitor, $monitors);

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
