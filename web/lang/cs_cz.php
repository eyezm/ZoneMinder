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

// ZoneMinder Czech Translation by Lukas Pokorny/Mlada Boleslav

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
//require_once( 'zm_lang_en_gb.php' );

// You may need to change the character set here, if your web server does not already
// do this by default, uncomment this if required.
//
// Example
//header( "Content-Type: text/html; charset=iso-8859-2" );

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
//setlocale( 'LC_ALL', 'cs_CZ' ); All locale settings pre-4.3.0
// setlocale( LC_ALL, 'en_GB' ); All locale settings 4.3.0 and after
// setlocale( LC_CTYPE, 'en_GB' ); Character class settings 4.3.0 and after
// setlocale( LC_TIME, 'en_GB' ); Date and time formatting 4.3.0 and after

// Simple String Replacements
$SLANG = array(
    '24BitColour'          => '24 bit barevn�',
    '8BitGrey'             => '8 bit �ed� �k�la',
    'Action'               => 'Akce',
    'Actual'               => 'Skute�n�',
    'AddNewControl'        => 'P�idat nov� ��zen�',
    'AddNewMonitor'        => 'P�idat kameru',
    'AddNewUser'           => 'P�idat u�ivatele',
    'AddNewZone'           => 'P�idat z�nu',
    'Alarm'                => 'Alarm',
    'AlarmBrFrames'        => 'Alarm<br/>Sn�mky',
    'AlarmFrame'           => 'Alarm sn�mek',
    'AlarmFrameCount'      => 'Po�et alarm sn�mk�',
    'AlarmLimits'          => 'Limity alarmu',
    'AlarmMaximumFPS'      => 'Alarm Maximum FPS',
    'AlarmPx'              => 'Alarm Px',
    'AlarmRGBUnset'        => 'You must set an alarm RGB colour',
    'Alert'                => 'Pozor',
    'All'                  => 'V�echny',
    'Apply'                => 'Pou��t',
    'ApplyingStateChange'  => 'Aplikuji zm�nu stavu',
    'ArchArchived'         => 'Pouze archivovan�',
    'ArchUnarchived'       => 'Pouze nearchivovan�',
    'Archive'              => 'Archiv',
    'Archived'             => 'Archivov�n',
    'Area'                 => 'Area',
    'AreaUnits'            => 'Area (px/%)',
    'AttrAlarmFrames'      => 'Alarm sn�mky',
    'AttrArchiveStatus'    => 'Archiv status',
    'AttrAvgScore'         => 'Pr�m. sk�re',
    'AttrCause'            => 'P���ina',
    'AttrDate'             => 'Datum',
    'AttrDateTime'         => 'Datum/�as',
    'AttrDiskBlocks'       => 'Bloky disku',
    'AttrDiskPercent'      => 'Zapln�n� disku',
    'AttrDuration'         => 'Pr�b�h',
    'AttrFrames'           => 'Sn�mky',
    'AttrId'               => 'Id',
    'AttrMaxScore'         => 'Max. sk�re',
    'AttrMonitorId'        => 'Kamera Id',
    'AttrMonitorName'      => 'Jm�no kamery',
    'AttrName'             => 'Jm�no',
    'AttrNotes'            => 'Notes',
    'AttrSystemLoad'       => 'System Load',
    'AttrTime'             => '�as',
    'AttrTotalScore'       => 'Celkov� sk�re',
    'AttrWeekday'          => 'Den v t�dnu',
    'Auto'                 => 'Auto',
    'AutoStopTimeout'      => '�asov� limit pro vypr�en�',
    'Available'            => 'Available',              // Added - 2009-03-31
    'AvgBrScore'           => 'Pr�m.<br/>Sk�re',
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
    'BadNameChars'         => 'Jm�na moho obsahovat pouze alfanumerick� znaky a podtr��tko �i poml�ku',
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
    'Bandwidth'            => 'Rychlost s�t�',
    'BlobPx'               => 'Zna�ka Px',
    'BlobSizes'            => 'Velikost zna�ky',
    'Blobs'                => 'Zna�ky',
    'Brightness'           => 'Sv�tlost',
    'Buffers'              => 'Bufery',
    'CanAutoFocus'         => 'Um� automaticky zaost�it',
    'CanAutoGain'          => 'Um� automatick� zisk',
    'CanAutoIris'          => 'Um� auto iris',
    'CanAutoWhite'         => 'Um� automaticky vyv�it b�lou',
    'CanAutoZoom'          => 'Um� automaticky zoomovat',
    'CanFocus'             => 'Um� zaost�it',
    'CanFocusAbs'          => 'Um� zaost�it absolutn�',
    'CanFocusCon'          => 'Um� pr�b�n� zaost�it',
    'CanFocusRel'          => 'Um� relativn� zaost�it',
    'CanGain'              => 'Um� zisk',
    'CanGainAbs'           => 'Um� absolutn� zisk',
    'CanGainCon'           => 'Um� pr�b�n� zisk',
    'CanGainRel'           => 'Um� relativn� zisk',
    'CanIris'              => 'Um� iris',
    'CanIrisAbs'           => 'Um� absolutn� iris',
    'CanIrisCon'           => 'Um� pr�b�n� iris',
    'CanIrisRel'           => 'Um� relativn� iris',
    'CanMove'              => 'Um� pohyb',
    'CanMoveAbs'           => 'Um� absoultn� pohyb',
    'CanMoveCon'           => 'Um� pr�b�n� pohyb',
    'CanMoveDiag'          => 'Um� diagon�ln� pohyb',
    'CanMoveMap'           => 'Um� mapovan� pohyb',
    'CanMoveRel'           => 'Um� relativn� pohyb',
    'CanPan'               => 'Um� ot��en�',
    'CanReset'             => 'Um� reset',
    'CanSetPresets'        => 'Um� navolit p�edvolby',
    'CanSleep'             => 'M��e sp�t',
    'CanTilt'              => 'Um� n�klon',
    'CanWake'              => 'Lze vzbudit',
    'CanWhite'             => 'Um� vyv�en� b�l�',
    'CanWhiteAbs'          => 'Um� absolutn� vyv�en� b�l�',
    'CanWhiteBal'          => 'Um� vyv�en� b�l�',
    'CanWhiteCon'          => 'Um� pr�b�n� vyv�en� b�l�',
    'CanWhiteRel'          => 'Um� relativn� vyv�en� b�l�',
    'CanZoom'              => 'Um� zoom',
    'CanZoomAbs'           => 'Um� absolutn� zoom',
    'CanZoomCon'           => 'Um� pr�b�n� zoom',
    'CanZoomRel'           => 'Um� relativn� zoom',
    'Cancel'               => 'Zru�it',
    'CancelForcedAlarm'    => 'Zastavit spu�t�n� alarm',
    'CaptureHeight'        => 'V��ka zdrojov�ho sn�mku',
    'CaptureMethod'        => 'Capture Method',         // Added - 2009-02-08
    'CapturePalette'       => 'Paleta zdrojov�ho sn�mku',
    'CaptureWidth'         => '���ka zdrojov�ho sn�mku',
    'Cause'                => 'P���ina',
    'CheckMethod'          => 'Metoda zna�kov�n� alarmem',
    'ChooseDetectedCamera' => 'Choose Detected Camera', // Added - 2009-03-31
    'ChooseFilter'         => 'Vybrat filtr',
    'ChoosePreset'         => 'Choose Preset',
    'Close'                => 'Zav��t',
    'Colour'               => 'Barva',
    'Command'              => 'P��kaz',
    'Config'               => 'Nastaven�',
    'ConfiguredFor'        => 'Nastaveno pro',
    'ConfirmDeleteEvents'  => 'Are you sure you wish to delete the selected events?',
    'ConfirmPassword'      => 'Potvrdit heslo',
    'ConjAnd'              => 'a',
    'ConjOr'               => 'nebo',
    'Console'              => 'Konzola',
    'ContactAdmin'         => 'Pro detailn� info kontaktujte Va�eho administr�tora.',
    'Continue'             => 'Pokra�ovat',
    'Contrast'             => 'Kontrast',
    'Control'              => '��zen�',
    'ControlAddress'       => 'Adresa ��zen�',
    'ControlCap'           => 'Schopnosti ��zen�',
    'ControlCaps'          => 'Typy ��zen�',
    'ControlDevice'        => 'Za��zen� ��zen�',
    'ControlType'          => 'Typ ��zen�',
    'Controllable'         => '��diteln�',
    'Cycle'                => 'Cyklus',
    'CycleWatch'           => 'Cyklick� prohl�en�',
    'Day'                  => 'Den',
    'Debug'                => 'Debug',
    'DefaultRate'          => 'Default Rate',
    'DefaultScale'         => 'P�ednastaven� velikost',
    'DefaultView'          => 'Default View',
    'Delete'               => 'Smazat',
    'DeleteAndNext'        => 'Smazat &amp; Dal��',
    'DeleteAndPrev'        => 'Smazat &amp; P�edchoz�',
    'DeleteSavedFilter'    => 'Smazat filtr',
    'Description'          => 'Popis',
    'DetectedCameras'      => 'Detected Cameras',       // Added - 2009-03-31
    'Device'               => 'Device',                 // Added - 2009-02-08
    'DeviceChannel'        => 'Kan�l za��zen�',
    'DeviceFormat'         => 'Form�t za��zen�',
    'DeviceNumber'         => '��slo zar�zen�',
    'DevicePath'           => 'Cesta k za��zen�',
    'Devices'              => 'Devices',
    'Dimensions'           => 'Rozm�ry',
    'DisableAlarms'        => 'Zak�zat alarmy',
    'Disk'                 => 'Disk',
    'Display'              => 'Display',                // Added - 2011-01-30
    'Donate'               => 'Pros�m podpo�te',
    'DonateAlready'        => 'Ne, u� jsem podpo�il',
    'DonateEnticement'     => 'Ji� n�jakou dobu pou��v�te software ZoneMinder k ochran� sv�ho majetku a p�edpokl�d�m, �e jej shled�v�te u�ite�n�m. P�esto�e je ZoneMinder, znovu p�ipom�n�m, zdarma a voln� ���en� software, stoj� jeho v�voj a podpora n�jak� pen�ze. Pokud byste cht�l/a podpo�it budouc� v�voj a nov� mo�nosti softwaru, pros�m zva�te darov�n� finan�n� pomoci. Darov�n� je, samoz�ejm�, dobrovoln�, ale zato velmi cen�n� m��ete p�isp�t jakou ��stkou chcete.<br><br>Pokud m�te z�jem podpo�it n� t�m, pros�m, vyberte n�e uvedenou mo�nost, nebo nav�tivte http://www.zoneminder.com/donate.html.<br><br>D�kuji V�m �e jste si vybral/a software ZoneMinder a nezapome�te nav�t�vit f�rum na ZoneMinder.com pro podporu a n�vrhy jak ud�lat ZoneMinder je�t� lep��m ne� je dnes.',
    'DonateRemindDay'      => 'Nyn� ne, p�ipomenout za 1 den',
    'DonateRemindHour'     => 'Nyn� ne, p�ipomenout za hodinu',
    'DonateRemindMonth'    => 'Nyn� ne, p�ipomenout za m�s�c',
    'DonateRemindNever'    => 'Ne, nechci podpo�it ZoneMinder, nep�ipom�nat',
    'DonateRemindWeek'     => 'Nyn� ne, p�ipomenout za t�den',
    'DonateYes'            => 'Ano, chcit podpo�it ZoneMinder nyn�',
    'Download'             => 'St�hnout',
    'DuplicateMonitorName' => 'Duplicate Monitor Name', // Added - 2009-03-31
    'Duration'             => 'Pr�b�h',
    'Edit'                 => 'Editovat',
    'Email'                => 'Email',
    'EnableAlarms'         => 'Povolit alarmy',
    'Enabled'              => 'Povoleno',
    'EnterNewFilterName'   => 'Zadejte nov� jm�no filtru',
    'Error'                => 'Chyba',
    'ErrorBrackets'        => 'Chyba, zkontrolujte pros�m z�vorky',
    'ErrorValidValue'      => 'Chyba, zkontrolujte �e podm�nky maj� spr�vn� hodnoty',
    'Etc'                  => 'atd',
    'Event'                => 'Z�znam',
    'EventFilter'          => 'Filtr z�znam�',
    'EventId'              => 'Id z�znamu',
    'EventName'            => 'Jm�no z�znamu',
    'EventPrefix'          => 'Prefix z�znamu',
    'Events'               => 'Z�znamy',
    'Exclude'              => 'Vyjmout',
    'Execute'              => 'Execute',
    'Export'               => 'Exportovat',
    'ExportDetails'        => 'Exportovat detaily z�znamu',
    'ExportFailed'         => 'Chyba p�i exportu',
    'ExportFormat'         => 'Form�t exportovan�ho souboru',
    'ExportFormatTar'      => 'Tar',
    'ExportFormatZip'      => 'Zip',
    'ExportFrames'         => 'Exportovat detaily sn�mku',
    'ExportImageFiles'     => 'Exportovat obrazov� soubory',
    'ExportMiscFiles'      => 'Exportovat ostatn� soubory (jestli existuj�)',
    'ExportOptions'        => 'Mo�nosti exportu',
    'ExportSucceeded'      => 'Export Succeeded',       // Added - 2009-02-08
    'ExportVideoFiles'     => 'Exportovat video soubory (jestli existuj�)',
    'Exporting'            => 'Exportuji',
    'FPS'                  => 'fps',
    'FPSReportInterval'    => 'FPS Interval pro report',
    'FTP'                  => 'FTP',
    'Far'                  => 'Daleko',
    'FastForward'          => 'Fast Forward',
    'Feed'                 => 'Nasytit',
    'Ffmpeg'               => 'Ffmpeg',                 // Added - 2009-02-08
    'File'                 => 'Soubor',
    'FilterArchiveEvents'  => 'Archivovat v�echny nalezen�',
    'FilterDeleteEvents'   => 'Smazat v�echny nalezen�',
    'FilterEmailEvents'    => 'Poslat email s detaily nalezen�ch',
    'FilterExecuteEvents'  => 'Spustit p��kaz na v�ech nalezen�ch',
    'FilterMessageEvents'  => 'Podat zpr�vu o v�ech nalezen�ch',
    'FilterPx'             => 'Filtr Px',
    'FilterUnset'          => 'You must specify a filter width and height',
    'FilterUploadEvents'   => 'Uploadovat nalezen�',
    'FilterVideoEvents'    => 'Create video for all matches',
    'Filters'              => 'Filtry',
    'First'                => 'Prvn�',
    'FlippedHori'          => 'P�eklopen� vodorovn�',
    'FlippedVert'          => 'P�eklopen� svisle',
    'Focus'                => 'Zaost�en�',
    'ForceAlarm'           => 'Spustit alarm',
    'Format'               => 'Form�t',
    'Frame'                => 'Sn�mek',
    'FrameId'              => 'Sn�mek Id',
    'FrameRate'            => 'Rychlost sn�mk�',
    'FrameSkip'            => 'Vynechat sn�mek',
    'Frames'               => 'Sn�mky',
    'Func'                 => 'Funkce',
    'Function'             => 'Funkce',
    'Gain'                 => 'Zisk',
    'General'              => 'General',
    'GenerateVideo'        => 'Generovat video',
    'GeneratingVideo'      => 'Generuji video',
    'GoToZoneMinder'       => 'J�t na ZoneMinder.com',
    'Grey'                 => '�ed�',
    'Group'                => 'Group',
    'Groups'               => 'Skupiny',
    'HasFocusSpeed'        => 'M� rychlost zaost�en�',
    'HasGainSpeed'         => 'M� rychlost zisku',
    'HasHomePreset'        => 'M� Home volbu',
    'HasIrisSpeed'         => 'M� rychlost irisu',
    'HasPanSpeed'          => 'M� rychlost ot��en�',
    'HasPresets'           => 'M� p�edvolby',
    'HasTiltSpeed'         => 'M� rychlost n�klonu',
    'HasTurboPan'          => 'M� Turbo ot��en�',
    'HasTurboTilt'         => 'M� Turbo n�klon',
    'HasWhiteSpeed'        => 'M� rychlost vyv�en� b�l�',
    'HasZoomSpeed'         => 'M� rychlost zoomu',
    'High'                 => 'Rychl�',
    'HighBW'               => 'Rychl�&nbsp;B/W',
    'Home'                 => 'Dom�',
    'Hour'                 => 'Hodina',
    'Hue'                  => 'Odst�n',
    'Id'                   => 'Id',
    'Idle'                 => 'P�ipraven',
    'Ignore'               => 'Ignorovat',
    'Image'                => 'Obraz',
    'ImageBufferSize'      => 'Velikost buferu sn�mk�',
    'Images'               => 'Images',
    'In'                   => 'Dovnit�',
    'Include'              => 'Vlo�it',
    'Inverted'             => 'P�evr�cen�',
    'Iris'                 => 'Iris',
    'KeyString'            => 'Key String',
    'Label'                => 'Label',
    'Language'             => 'Jazyk',
    'Last'                 => 'Posledn�',
    'Layout'               => 'Layout',                 // Added - 2009-02-08
    'LimitResultsPost'     => 'v�sledk�', // This is used at the end of the phrase 'Limit to first N results only'
    'LimitResultsPre'      => 'Zobrazit pouze prvn�ch', // This is used at the beginning of the phrase 'Limit to first N results only'
    'LinkedMonitors'       => 'Linked Monitors',
    'List'                 => 'Seznam',
    'Load'                 => 'Load',
    'Local'                => 'Lok�ln�',
    'LoggedInAs'           => 'P�ihl�en jako',
    'LoggingIn'            => 'P�ihla�uji',
    'Login'                => 'P�ihl�sit',
    'Logout'               => 'Odhl�sit',
    'Low'                  => 'Pomal�',
    'LowBW'                => 'Pomal�&nbsp;B/W',
    'Main'                 => 'Hlavn�',
    'Man'                  => 'Man',
    'Manual'               => 'Manu�l',
    'Mark'                 => 'Ozna�it',
    'Max'                  => 'Max',
    'MaxBandwidth'         => 'Max bandwidth',
    'MaxBrScore'           => 'Max.<br/>sk�re',
    'MaxFocusRange'        => 'Max rozsah zaost�en�',
    'MaxFocusSpeed'        => 'Max rychlost zaost�en�',
    'MaxFocusStep'         => 'Max krok zaost�en�',
    'MaxGainRange'         => 'Max rozsah zisku',
    'MaxGainSpeed'         => 'Max rychlost zisku',
    'MaxGainStep'          => 'Max krok zisku',
    'MaxIrisRange'         => 'Max rozsah iris',
    'MaxIrisSpeed'         => 'Max rychlost iris',
    'MaxIrisStep'          => 'Max krok iris',
    'MaxPanRange'          => 'Max rozsah ot��en�',
    'MaxPanSpeed'          => 'Max rychlost ot��en�',
    'MaxPanStep'           => 'Max krok ot��en�',
    'MaxTiltRange'         => 'Max rozsah n�klonu',
    'MaxTiltSpeed'         => 'Max rychlost n�klonu',
    'MaxTiltStep'          => 'Max krok n�klonu',
    'MaxWhiteRange'        => 'Max rozsah vyv�en� b�l�',
    'MaxWhiteSpeed'        => 'Max rychlost vyv�en� b�l�',
    'MaxWhiteStep'         => 'Max krok vyv�en� b�l�',
    'MaxZoomRange'         => 'Max rozsah zoomu',
    'MaxZoomSpeed'         => 'Max rychlost zoomu',
    'MaxZoomStep'          => 'Max krok zoomu',
    'MaximumFPS'           => 'Maximum FPS',
    'Medium'               => 'St�edn�',
    'MediumBW'             => 'St�edn�&nbsp;B/W',
    'MinAlarmAreaLtMax'    => 'Minimum alarm area should be less than maximum',
    'MinAlarmAreaUnset'    => 'You must specify the minimum alarm pixel count',
    'MinBlobAreaLtMax'     => 'Minimum zna�kovan� oblasti by m�lo b�t men�� ne� maximum',
    'MinBlobAreaUnset'     => 'You must specify the minimum blob pixel count',
    'MinBlobLtMinFilter'   => 'Minimum blob area should be less than or equal to minimum filter area',
    'MinBlobsLtMax'        => 'Minimum zna�ek by m�lo b�t men�� ne� maximum',
    'MinBlobsUnset'        => 'You must specify the minimum blob count',
    'MinFilterAreaLtMax'   => 'Minimum filter area should be less than maximum',
    'MinFilterAreaUnset'   => 'You must specify the minimum filter pixel count',
    'MinFilterLtMinAlarm'  => 'Minimum filter area should be less than or equal to minimum alarm area',
    'MinFocusRange'        => 'Min rozsah zaost�en�',
    'MinFocusSpeed'        => 'Min rychlost zaost�en�',
    'MinFocusStep'         => 'Min krok zaost�en�',
    'MinGainRange'         => 'Min rozsah zisku',
    'MinGainSpeed'         => 'Min rychlost zisku',
    'MinGainStep'          => 'Min krok zisku',
    'MinIrisRange'         => 'Min rozsah iris',
    'MinIrisSpeed'         => 'Min rychlost iris',
    'MinIrisStep'          => 'Min krok iris',
    'MinPanRange'          => 'Min rozsah ot��en�',
    'MinPanSpeed'          => 'Min rychlost ot��en�',
    'MinPanStep'           => 'Min krok ot��en�',
    'MinPixelThresLtMax'   => 'Minim�ln� pr�h pixelu by m�l b�t men�� ne�  maximum�ln�',
    'MinPixelThresUnset'   => 'You must specify a minimum pixel threshold',
    'MinTiltRange'         => 'Min rozsah n�klonu',
    'MinTiltSpeed'         => 'Min rychlost n�klonu',
    'MinTiltStep'          => 'Min krok n�klonu',
    'MinWhiteRange'        => 'Min rozsah vyv�en� b�l�',
    'MinWhiteSpeed'        => 'Min rychlost vyv�en� b�l�',
    'MinWhiteStep'         => 'Min krok vyv�en� b�l�',
    'MinZoomRange'         => 'Min rozsah zoomu',
    'MinZoomSpeed'         => 'Min rychlost zoomu',
    'MinZoomStep'          => 'Min krok zoomu',
    'Misc'                 => 'Ostatn�',
    'Monitor'              => 'Kamera',
    'MonitorIds'           => 'Id&nbsp;kamer',
    'MonitorPreset'        => 'Monitor Preset',
    'MonitorPresetIntro'   => 'Select an appropriate preset from the list below.<br><br>Please note that this may overwrite any values you already have configured for this monitor.<br><br>',
    'MonitorProbe'         => 'Monitor Probe',          // Added - 2009-03-31
    'MonitorProbeIntro'    => 'The list below shows detected analog and network cameras and whether they are already being used or available for selection.<br/><br/>Select the desired entry from the list below.<br/><br/>Please note that not all cameras may be detected and that choosing a camera here may overwrite any values you already have configured for the current monitor.<br/><br/>', // Added - 2009-03-31
    'Monitors'             => 'Kamery',
    'Montage'              => 'Sest�ih',
    'Month'                => 'M�s�c',
    'Move'                 => 'Pohyb',
    'MustBeGe'             => 'mus� b�t v�t�� nebo rovno ne�',
    'MustBeLe'             => 'mus� b�t men�� nebo rovno ne�',
    'MustConfirmPassword'  => 'Mus�te potvrdit heslo',
    'MustSupplyPassword'   => 'Mus�te zadat heslo',
    'MustSupplyUsername'   => 'Mus�te zadat u�ivatelsk� jm�no',
    'Name'                 => 'Jm�no',
    'Near'                 => 'Bl�zko',
    'Network'              => 'S�',
    'New'                  => 'Nov�',
    'NewGroup'             => 'Nov� skupina',
    'NewLabel'             => 'New Label',
    'NewPassword'          => 'Nov� heslo',
    'NewState'             => 'Nov� stav',
    'NewUser'              => 'Nov� u�ivatel',
    'Next'                 => 'Dal��',
    'No'                   => 'Ne',
    'NoDetectedCameras'    => 'No Detected Cameras',    // Added - 2009-03-31
    'NoFramesRecorded'     => 'Pro tento sn�mek nejsou ��dn� z�znamy',
    'NoGroup'              => 'No Group',
    'NoSavedFilters'       => '��dn� ulo�en� filtry',
    'NoStatisticsRecorded' => 'Pro tento z�znam/sn�mek nejsou zaznamen�ny ��dn� statistiky',
    'None'                 => 'Zak�zat',
    'NoneAvailable'        => '��dn� nen� dostupn�',
    'Normal'               => 'Normaln�',
    'Notes'                => 'Pozn�mky',
    'NumPresets'           => 'Po�et p�edvoleb',
    'Off'                  => 'Off',
    'On'                   => 'On',
    'OpEq'                 => 'rovno',
    'OpGt'                 => 'v�t��',
    'OpGtEq'               => 'v�t�� nebo rovno',
    'OpIn'                 => 'nin set',
    'OpLt'                 => 'men��',
    'OpLtEq'               => 'men�� nebo rovno',
    'OpMatches'            => 'obsahuje',
    'OpNe'                 => 'nerovn� se',
    'OpNotIn'              => 'nnot in set',
    'OpNotMatches'         => 'neobsahuje',
    'Open'                 => 'Otev��t',
    'OptionHelp'           => 'Mo�nostHelp',
    'OptionRestartWarning' => 'Tyto zm�ny se neprojev�\ndokud syst�m b��. Jakmile\ndokon��te prov�d�n� zm�n pros�m\nrestartujte ZoneMinder.',
    'Options'              => 'Mo�nosti',
    'OrEnterNewName'       => 'nebo vlo�te nov� jm�no',
    'Order'                => 'Po�ad�',
    'Orientation'          => 'Orientace',
    'Out'                  => 'Ven',
    'OverwriteExisting'    => 'P�epsat existuj�c�',
    'Paged'                => 'Str�kov�',
    'Pan'                  => 'Ot��en�',
    'PanLeft'              => 'Posunout vlevo',
    'PanRight'             => 'Posunout vpravo',
    'PanTilt'              => 'Ot��en�/N�klon',
    'Parameter'            => 'Parametr',
    'Password'             => 'Heslo',
    'PasswordsDifferent'   => 'Hesla se neshoduj�',
    'Paths'                => 'Cesty',
    'Pause'                => 'Pause',
    'Phone'                => 'Modem',
    'PhoneBW'              => 'Modem&nbsp;B/W',
    'PixelDiff'            => 'Pixel Diff',
    'Pixels'               => 'pixely',
    'Play'                 => 'Play',
    'PlayAll'              => 'P�ehr�t v�e',
    'PleaseWait'           => 'Pros�m �ekejte',
    'Point'                => 'Point',
    'PostEventImageBuffer' => 'Poz�znamov� bufer',
    'PreEventImageBuffer'  => 'P�edz�znamov� bufer',
    'PreserveAspect'       => 'Preserve Aspect Ratio',
    'Preset'               => 'P�edvolba',
    'Presets'              => 'P�edvolby',
    'Prev'                 => 'Zp�t',
    'Probe'                => 'Probe',                  // Added - 2009-03-31
    'Protocol'             => 'Protocol',
    'Rate'                 => 'Rychlost',
    'Real'                 => 'Skute�n�',
    'Record'               => 'Nahr�vat',
    'RefImageBlendPct'     => 'Reference Image Blend %ge',
    'Refresh'              => 'Obnovit',
    'Remote'               => 'S�ov�',
    'RemoteHostName'       => 'Adresa',
    'RemoteHostPath'       => 'Cesta',
    'RemoteHostPort'       => 'Port',
    'RemoteHostSubPath'    => 'Remote Host SubPath',    // Added - 2009-02-08
    'RemoteImageColours'   => 'Barvy',
    'RemoteMethod'         => 'Remote Method',          // Added - 2009-02-08
    'RemoteProtocol'       => 'Remote Protocol',        // Added - 2009-02-08
    'Rename'               => 'P�ejmenovat',
    'Replay'               => 'Replay',
    'ReplayAll'            => 'All Events',
    'ReplayGapless'        => 'Gapless Events',
    'ReplaySingle'         => 'Single Event',
    'Reset'                => 'Reset',
    'ResetEventCounts'     => 'Resetovat po�ty z�znam�',
    'Restart'              => 'Restartovat',
    'Restarting'           => 'Restartuji',
    'RestrictedCameraIds'  => 'Povolen� id kamer',
    'RestrictedMonitors'   => 'Restricted Monitors',
    'ReturnDelay'          => 'Prodleva vracen�',
    'ReturnLocation'       => 'Lokace vr�cen�',
    'Rewind'               => 'Rewind',
    'RotateLeft'           => 'Oto�it vlevo',
    'RotateRight'          => 'Oto�it vpravo',
    'RunLocalUpdate'       => 'Please run zmupdate.pl to update', // Added - 2011-05-25
    'RunMode'              => 'Re�im',
    'RunState'             => 'Stav',
    'Running'              => 'B��',
    'Save'                 => 'Ulo�it',
    'SaveAs'               => 'Ulo�it jako',
    'SaveFilter'           => 'Ulo�it filtr',
    'Scale'                => 'Velikost',
    'Score'                => 'Sk�re',
    'Secs'                 => 'D�lka(s)',
    'Sectionlength'        => 'D�lka sekce',
    'Select'               => 'Vybrat',
    'SelectMonitors'       => 'Select Monitors',
    'SelfIntersecting'     => 'Polygon edges must not intersect',
    'Set'                  => 'Nastavit',
    'SetNewBandwidth'      => 'Nastavit novou rychlost s�t�',
    'SetPreset'            => 'Nastavit p�edvolbu',
    'Settings'             => 'Nastaven�',
    'ShowFilterWindow'     => 'Zobrazit filtr',
    'ShowTimeline'         => 'Zobrazit �asovou linii ',
    'SignalCheckColour'    => 'Signal Check Colour',
    'Size'                 => 'Velikost',
    'SkinDescription'      => 'Change the default skin for this computer', // Added - 2011-01-30
    'Sleep'                => 'Sp�t',
    'SortAsc'              => 'Vzestupn�',
    'SortBy'               => '�adit dle',
    'SortDesc'             => 'Sestupn�',
    'Source'               => 'Zdroj',
    'SourceColours'        => 'Source Colours',         // Added - 2009-02-08
    'SourcePath'           => 'Source Path',            // Added - 2009-02-08
    'SourceType'           => 'Typ zdroje',
    'Speed'                => 'Rychlost',
    'SpeedHigh'            => 'Vysok� rychlost',
    'SpeedLow'             => 'N�zk� rychlost',
    'SpeedMedium'          => 'St�edn� rychlost',
    'SpeedTurbo'           => 'Turbo rychlost',
    'Start'                => 'Start',
    'State'                => 'Stav',
    'Stats'                => 'Statistiky',
    'Status'               => 'Status',
    'Step'                 => 'Krok',
    'StepBack'             => 'Step Back',
    'StepForward'          => 'Step Forward',
    'StepLarge'            => 'Velk� krok',
    'StepMedium'           => 'St�edn� krok',
    'StepNone'             => '��dn� krok',
    'StepSmall'            => 'Mal� krok',
    'Stills'               => 'Sn�mky',
    'Stop'                 => 'Zastavit',
    'Stopped'              => 'Zastaven',
    'Stream'               => 'Stream',
    'StreamReplayBuffer'   => 'Stream Replay Image Buffer',
    'Submit'               => 'Potvrdit',
    'System'               => 'System',
    'Tele'                 => 'P�ibl�it',
    'Thumbnail'            => 'Miniatura',
    'Tilt'                 => 'N�klon',
    'Time'                 => '�as',
    'TimeDelta'            => 'Delta �asu',
    'TimeStamp'            => '�asov� raz�tko',
    'Timeline'             => '�asov� linie',
    'Timestamp'            => 'Raz�tko',
    'TimestampLabelFormat' => 'Form�t �asov�ho raz�tka',
    'TimestampLabelX'      => '�asov� raz�tko X',
    'TimestampLabelY'      => '�asov� raz�tko Y',
    'Today'                => 'Dnes',
    'Tools'                => 'N�stroje',
    'TotalBrScore'         => 'Celkov�<br/>sk�re',
    'TrackDelay'           => 'Prodleva dr�hy',
    'TrackMotion'          => 'Pohyb po dr�ze',
    'Triggers'             => 'Trigery',
    'TurboPanSpeed'        => 'Rychlost Turbo ot��en�',
    'TurboTiltSpeed'       => 'Rychlost Turbo n�klonu',
    'Type'                 => 'Typ',
    'Unarchive'            => 'Vyjmout z archivu',
    'Undefined'            => 'Undefined',              // Added - 2009-02-08
    'Units'                => 'Jednotky',
    'Unknown'              => 'Nezn�m�',
    'Update'               => 'Update',
    'UpdateAvailable'      => 'Je dostupn� nov� update ZoneMinder.',
    'UpdateNotNecessary'   => 'Update nen� pot�eba.',
    'UseFilter'            => 'Pou��t filtr',
    'UseFilterExprsPost'   => '&nbsp;v�raz�', // This is used at the end of the phrase 'use N filter expressions'
    'UseFilterExprsPre'    => 'Pou��t&nbsp;', // This is used at the beginning of the phrase 'use N filter expressions'
    'User'                 => 'U�ivatel',
    'Username'             => 'U�ivatelsk� jm�no',
    'Users'                => 'U�ivatel�',
    'Value'                => 'Hodnota',
    'Version'              => 'Verze',
    'VersionIgnore'        => 'Ignorovat tuto verzi',
    'VersionRemindDay'     => 'P�ipomenout za 1 den',
    'VersionRemindHour'    => 'P�ipomenout za hodinu',
    'VersionRemindNever'   => 'Nep�ipom�nat nov� veze',
    'VersionRemindWeek'    => 'P�ipomenout za t�den',
    'Video'                => 'Video',
    'VideoFormat'          => 'Video form�t',
    'VideoGenFailed'       => 'Chyba p�i generov�n� videa!',
    'VideoGenFiles'        => 'Existuj�c� video soubory',
    'VideoGenNoFiles'      => '��dn� video soubory nenalezeny',
    'VideoGenParms'        => 'Parametry generov�n� videa',
    'VideoGenSucceeded'    => 'Video vygenerov�no �sp�n�!',
    'VideoSize'            => 'Velikost videa',
    'View'                 => 'Zobrazit',
    'ViewAll'              => 'Zobrazit v�echny',
    'ViewEvent'            => 'Zobrazit z�znam',
    'ViewPaged'            => 'Zobrazit str�kov�',
    'Wake'                 => 'Vzbudit',
    'WarmupFrames'         => 'Zah��vac� sn�mky',
    'Watch'                => 'Sledovat',
    'Web'                  => 'Web',
    'WebColour'            => 'Webov� barva',
    'Week'                 => 'T�den',
    'White'                => 'B�l�',
    'WhiteBalance'         => 'Vyv�en� b�l�',
    'Wide'                 => 'Odd�lit',
    'X'                    => 'X',
    'X10'                  => 'X10',
    'X10ActivationString'  => 'X10 aktiva�n� �et�zec',
    'X10InputAlarmString'  => 'X10 input alarm �et�zec',
    'X10OutputAlarmString' => 'X10 output alarm �et�zec',
    'Y'                    => 'Y',
    'Yes'                  => 'Ano',
    'YouNoPerms'           => 'K tomuto zdroji nem�te opr�vn�n�.',
    'Zone'                 => 'Z�na',
    'ZoneAlarmColour'      => 'Barva alarmu (Red/Green/Blue)',
    'ZoneArea'             => 'Zone Area',
    'ZoneFilterSize'       => 'Filter Width/Height (pixels)',
    'ZoneMinMaxAlarmArea'  => 'Min/Max Alarmed Area',
    'ZoneMinMaxBlobArea'   => 'Min/Max Blob Area',
    'ZoneMinMaxBlobs'      => 'Min/Max Blobs',
    'ZoneMinMaxFiltArea'   => 'Min/Max Filtered Area',
    'ZoneMinMaxPixelThres' => 'Min/Max Pixel Threshold (0-255)',
    'ZoneOverloadFrames'   => 'Overload Frame Ignore Count',
    'Zones'                => 'Z�ny',
    'Zoom'                 => 'Zoom',
    'ZoomIn'               => 'Zv�t�it',
    'ZoomOut'              => 'Zmen�it',
);

// Complex replacements with formatting and/or placements, must be passed through sprintf
$CLANG = array(
    'CurrentLogin'         => 'Pr�v� je p�ihl�en \'%1$s\'',
    'EventCount'           => '%1$s %2$s', // For example '37 Events' (from Vlang below)
    'LastEvents'           => 'Posledn�ch %1$s %2$s', // For example 'Last 37 Events' (from Vlang below)
    'LatestRelease'        => 'Posledn� verze je v%1$s, vy m�te v%2$s.',
    'MonitorCount'         => '%1$s %2$s', // For example '4 Monitors' (from Vlang below)
    'MonitorFunction'      => 'Funkce %1$s kamery',
    'RunningRecentVer'     => 'Pou��v�te posledn� verzi ZoneMinder, v%s.',
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
    'Event'                => array( 0=>'Z�znam�', 1=>'Z�znam', 2=>'Z�znamy', 5=>'Z�znam�' ),
    'Monitor'              => array( 0=>'Kamer', 1=>'Kamera', 2=>'Kamery', 5=>'Kamer' ),
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
//echo sprintf( $zmClangMonitorCount, count($monitors), zmVlang( $zmVlangMonitor, count($monitors) ) );

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
