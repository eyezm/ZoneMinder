<?php
//
// ZoneMinder web Swedish language file, $Date$, $Revision$
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

// ZoneMinder Swedish Translation by Mikael Carlsson
// Updated 2008-12 by Mikael Carlsson

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
    '24BitColour'          => '24 bitars f�rg',
    '8BitGrey'             => '8 bit gr�skala',
    'Action'               => 'Action',
    'Actual'               => 'Verklig',
    'AddNewControl'        => 'Ny kontroll',
    'AddNewMonitor'        => 'Ny bevakare',
    'AddNewUser'           => 'Ny anv�ndare',
    'AddNewZone'           => 'Ny zon',
    'Alarm'                => 'Larm',
    'AlarmBrFrames'        => 'Larm<br/>ramar',
    'AlarmFrame'           => 'Larmram',
    'AlarmFrameCount'      => 'Larmramsr�knare',
    'AlarmLimits'          => 'Larmgr�nser',
    'AlarmMaximumFPS'      => 'Max. ramar/s f�r larm',
    'AlarmPx'              => 'Larmpunkter',
    'AlarmRGBUnset'        => 'Du m�ste s�tta en f�rg f�r RGB-larm',
    'Alert'                => 'Varning',
    'All'                  => 'Alla',
    'Apply'                => 'L�gg till',
    'ApplyingStateChange'  => 'Aktivera status�ndring',
    'ArchArchived'         => 'Arkivera endast',
    'ArchUnarchived'       => 'Endast ej arkiverade',
    'Archive'              => 'Arkiv',
    'Archived'             => 'Arkiverad',
    'Area'                 => 'Omr�de',
    'AreaUnits'            => 'Omr�de (px/%)',
    'AttrAlarmFrames'      => 'Larmramar',
    'AttrArchiveStatus'    => 'Arkivstatus',
    'AttrAvgScore'         => 'Ung. v�rde',
    'AttrCause'            => 'Orsak',
    'AttrDate'             => 'Datum',
    'AttrDateTime'         => 'Datum/Tid',
    'AttrDiskBlocks'       => 'Diskblock',
    'AttrDiskPercent'      => 'Diskprocent',
    'AttrDuration'         => 'L�ngd',
    'AttrFrames'           => 'Ramar',
    'AttrId'               => 'Id',
    'AttrMaxScore'         => 'Max. v�rde',
    'AttrMonitorId'        => 'Bevakningsid',
    'AttrMonitorName'      => 'Bevakningsnamn',
    'AttrName'             => 'Namn',
    'AttrNotes'            => 'Notering',
    'AttrSystemLoad'       => 'Systemlast',
    'AttrTime'             => 'Tid',
    'AttrTotalScore'       => 'Totalv�rde',
    'AttrWeekday'          => 'Veckodag',
    'Auto'                 => 'Automatik',
    'AutoStopTimeout'      => 'Tidsutl�sning f�r automatstop',
    'Available'            => 'Available',              // Added - 2009-03-31
    'AvgBrScore'           => 'Ung.<br/>tr�ff',
    'Background'           => 'Bakgrund',
    'BackgroundFilter'     => 'K�r filter i bakgrunden',
    'BadAlarmFrameCount'   => 'Ramantalet f�r larm m�ste vara ett heltal, minsta v�rdet �r 1',
    'BadAlarmMaxFPS'       => 'Larm f�r bilder/s m�ste vara ett positivt heltal eller ett flyttal',
    'BadChannel'           => 'Kanalen m�ste vara ett heltal, noll eller h�gre',
    'BadDevice'            => 'Enheten m�ste s�ttas till ett giltigt v�rde',
    'BadFPSReportInterval' => 'Buffern f�r ramintervallrapporten m�ste vara ett heltal p� minst 100 eller h�gre',
    'BadFormat'            => 'Formatet m�ste vara ett heltal, noll eller h�gre',
    'BadFrameSkip'         => 'V�rdet f�r ram�verhopp m�ste vara ett heltal p� 0 eller h�gre',
    'BadHeight'            => 'H�jden m�ste s�ttas till ett giltigt v�rde',
    'BadHost'              => 'Detta f�lt ska inneh�lla en giltig ip-adress eller v�rdnamn, inkludera inte http://',
    'BadImageBufferCount'  => 'Bufferstorleken f�r avbilden m�ste vara ett heltal p� minst 10 eller h�gre',
    'BadLabelX'            => 'Etiketten f�r X koordinaten m�ste s�ttas till ett heltal, 0 eller h�gre',
    'BadLabelY'            => 'Etiketten f�r Y koordinaten m�ste s�ttas till ett heltal, 0 eller h�gre',
    'BadMaxFPS'            => 'Max. ramar/s m�ste vara ett positivt heltal eller ett flyttal',
    'BadNameChars'         => 'Namn kan endast inneh�lla alfanumeriska tecken, bindestreck och understreck',
    'BadPalette'           => 'Palette must be set to a valid value', // Added - 2009-03-31
    'BadPath'              => 'S�kv�gen m�ste inneh�lla ett giltigt v�rde',
    'BadPort'              => 'Porten m�ste inneh�lla ett giltigt nummer',
    'BadPostEventCount'    => 'R�knaren f�r efterh�ndelsen m�ste vara ett heltal p� 0 eller h�gre',
    'BadPreEventCount'     => 'R�knaren f�r f�r-h�ndelsen m�ste vara ett heltal p� 0 eller h�gre, och mindre �n bufferstorleken p� avbilden',
    'BadRefBlendPerc'      => 'Mixprocenten f�r referensen m�ste hara ett positivt heltal',
    'BadSectionLength'     => 'Sektionsl�ngden m�ste vara ett heltal p� minst 30 eller h�gre',
    'BadSignalCheckColour' => 'Kontrollf�rgen p� signalen m�ste vara en giltig RGB f�rgstr�ng',
    'BadStreamReplayBuffer'=> 'Buffern f�r str�mmande uppspelning m�ste vara ett heltal p� 0 eller h�gre',
    'BadWarmupCount'       => 'Uppv�rmingsramen m�ste vara ett heltal p� 0 eller h�gre',
    'BadWebColour'         => 'Webbf�rgen m�ste vara en giltig str�ng f�r webbf�rg',
    'BadWidth'             => 'Bredden m�ste s�ttas til ett giltigt v�rde',
    'Bandwidth'            => 'Bandbredd',
    'BlobPx'               => 'Blob Px',
    'BlobSizes'            => 'Blobstorlek',
    'Blobs'                => 'Blobbar',
    'Brightness'           => 'Ljusstyrka',
    'Buffers'              => 'Buffrar',
    'CanAutoFocus'         => 'Har autofokus',
    'CanAutoGain'          => 'Har autoniv�',
    'CanAutoIris'          => 'Har autoiris',
    'CanAutoWhite'         => 'Har autovitbalans.',
    'CanAutoZoom'          => 'Har autozoom',
    'CanFocus'             => 'Har fokus',
    'CanFocusAbs'          => 'Har absolut fokus',
    'CanFocusCon'          => 'Har kontinuerlig fokus',
    'CanFocusRel'          => 'Har relativ fokus',
    'CanGain'              => 'Har niv�',
    'CanGainAbs'           => 'Har absolut niv�',
    'CanGainCon'           => 'Har kontinuerlig niv�',
    'CanGainRel'           => 'Har relativ niv�',
    'CanIris'              => 'Har iris',
    'CanIrisAbs'           => 'Har absolut iris',
    'CanIrisCon'           => 'Har kontinuerlig iris',
    'CanIrisRel'           => 'Har relativ iris',
    'CanMove'              => 'Har f�rflyttning',
    'CanMoveAbs'           => 'Har absolut f�rflyttning',
    'CanMoveCon'           => 'Har kontinuerlig f�rflyttning',
    'CanMoveDiag'          => 'Har diagonal f�rflyttning',
    'CanMoveMap'           => 'Har mappad f�rflyttning',
    'CanMoveRel'           => 'Har relativ f�rflyttning',
    'CanPan'               => 'Har panorering',
    'CanReset'             => 'Har �terst�llning',
    'CanSetPresets'        => 'Har f�rinst�llningar',
    'CanSleep'             => 'Kan vila',
    'CanTilt'              => 'Kan tilta',
    'CanWake'              => 'Kan vakna',
    'CanWhite'             => 'Kan vitbalansera',
    'CanWhiteAbs'          => 'Har absolut vitbalans',
    'CanWhiteBal'          => 'Kan vitbalans',
    'CanWhiteCon'          => 'Kan kontinuerligt vitbalansera',
    'CanWhiteRel'          => 'Kan relativt vitbalansera',
    'CanZoom'              => 'Kan zooma',
    'CanZoomAbs'           => 'Kan zooma absolut',
    'CanZoomCon'           => 'Kan zooma kontinuerligt',
    'CanZoomRel'           => 'Kan zooma realativt',
    'Cancel'               => '�ngra',
    'CancelForcedAlarm'    => '�ngra tvingande larm',
    'CaptureHeight'        => 'F�ngsth�jd',
    'CaptureMethod'        => 'Capture Method',         // Added - 2009-02-08
    'CapturePalette'       => 'F�ngstpalett',
    'CaptureWidth'         => 'F�ngstbredd',
    'Cause'                => 'Orsak',
    'CheckMethod'          => 'Larmkontrollmetod',
    'ChooseDetectedCamera' => 'Choose Detected Camera', // Added - 2009-03-31
    'ChooseFilter'         => 'V�lj filter',
    'ChoosePreset'         => 'V�lj standard',
    'Close'                => 'St�ng',
    'Colour'               => 'F�rg',
    'Command'              => 'Kommando',
    'Config'               => 'Konfigurera',
    'ConfiguredFor'        => 'Konfigurerad f�r',
    'ConfirmDeleteEvents'  => '�r du s�ker p� att du vill ta bort dom valda h�ndelserna?',
    'ConfirmPassword'      => 'Bekr�fta l�senord',
    'ConjAnd'              => 'och',
    'ConjOr'               => 'eller',
    'Console'              => 'Konsoll',
    'ContactAdmin'         => 'Kontakta din administrat�r f�r detaljer.',
    'Continue'             => 'Forts�tt',
    'Contrast'             => 'Kontrast',
    'Control'              => 'Kontroll',
    'ControlAddress'       => 'Kontrolladress',
    'ControlCap'           => 'Kontrollf�rm�ga',
    'ControlCaps'          => 'Kontrollf�rm�gor',
    'ControlDevice'        => 'Kontrollenhet',
    'ControlType'          => 'Kontrolltyp',
    'Controllable'         => 'Kontrollerbar',
    'Cycle'                => 'Period',
    'CycleWatch'           => 'Cycle Watch',
    'Day'                  => 'Dag',
    'Debug'                => 'Avlusa',
    'DefaultRate'          => 'Standardhastighet',
    'DefaultScale'         => 'Standardskala',
    'DefaultView'          => 'Standardvy',
    'Delete'               => 'Radera',
    'DeleteAndNext'        => 'Radera &amp; N�sta',
    'DeleteAndPrev'        => 'Radera &amp; F�reg.',
    'DeleteSavedFilter'    => 'Radera sparade filter',
    'Description'          => 'Beskrivning',
    'DetectedCameras'      => 'Detected Cameras',       // Added - 2009-03-31
    'Device'               => 'Device',                 // Added - 2009-02-08
    'DeviceChannel'        => 'Enhetskanal',
    'DeviceFormat'         => 'Enhetsformat',
    'DeviceNumber'         => 'Enhetsnummer',
    'DevicePath'           => 'Enhetss�kv�g',
    'Devices'              => 'Enheter',
    'Dimensions'           => 'Dimensioner',
    'DisableAlarms'        => 'Avaktivera larm',
    'Disk'                 => 'Disk',
    'Donate'               => 'Var v�nlig och donera',
    'DonateAlready'        => 'Nej, Jag har redan donerat',
    'DonateEnticement'     => 'Du har k�rt ZoneMinder ett tag nu och f�rhoppningsvis har du sett att det fungerar bra hemma eller p� ditt f�retag. �ven om ZoneMinder �r, och kommer att vara, fri programvara och �ppen kallkod, s� kostar det pengar att utveckla och underh�lla. Om du vill hj�lpa till med framtida utveckling och nya funktioner s� var vanlig och bidrag med en slant. Bidragen �r naturligtvis en option men mycket uppskattade och du kan bidra med precis hur mycket du vill.<br><br>Om du vill ge ett bidrag v�ljer du nedan eller surfar till http://www.zoneminder.com/donate.html.<br><br>Tack f�r att du anv�nder ZoneMinder, gl�m inte att bes�ka forumen p� ZoneMinder.com f�r support och f�rslag om hur du f�r din ZoneMinder att fungera lite b�ttre.',
    'DonateRemindDay'      => 'Inte �n, p�minn om 1 dag',
    'DonateRemindHour'     => 'Inte �n, p�minn om en 1 timme',
    'DonateRemindMonth'    => 'Inte �n, p�minn om 1 m�nad',
    'DonateRemindNever'    => 'Nej, Jag vill inte donera, p�minn mig inte mer',
    'DonateRemindWeek'     => 'Inte �n, p�minn om 1 vecka',
    'DonateYes'            => 'Ja, jag vill g�rna donera nu',
    'Download'             => 'Ladda ner',
    'DuplicateMonitorName' => 'Duplicate Monitor Name', // Added - 2009-03-31
    'Duration'             => 'L�ngd',
    'Edit'                 => 'Redigera',
    'Email'                => 'E-post',
    'EnableAlarms'         => 'Aktivera larm',
    'Enabled'              => 'Aktiverad',
    'EnterNewFilterName'   => 'Mata in nytt filternamn',
    'Error'                => 'Fel',
    'ErrorBrackets'        => 'Fel, kontrollera att du har samma antal v�nster som h�ger-hakar',
    'ErrorValidValue'      => 'Fel, kontrollera att alla parametrar har giltligt v�rde',
    'Etc'                  => 'etc',
    'Event'                => 'H�ndelse',
    'EventFilter'          => 'H�ndelsefilter',
    'EventId'              => 'H�ndelse nr',
    'EventName'            => 'H�ndelsenamn',
    'EventPrefix'          => 'H�ndelseprefix',
    'Events'               => 'H�ndelser',
    'Exclude'              => 'Exkludera',
    'Execute'              => 'Utf�r',
    'Export'               => 'Exportera',
    'ExportDetails'        => 'Exportera h�ndelsedetaljer',
    'ExportFailed'         => 'Exporten misslyckades',
    'ExportFormat'         => 'Filformat f�r exporter',
    'ExportFormatTar'      => 'Tar',
    'ExportFormatZip'      => 'Zip',
    'ExportFrames'         => 'Exportera ramdetaljer',
    'ExportImageFiles'     => 'Exportera bildfiler',
    'ExportMiscFiles'      => 'Exportera andra filer (om dom finns)',
    'ExportOptions'        => 'Konfiguera export',
    'ExportSucceeded'      => 'Export Succeeded',       // Added - 2009-02-08
    'ExportVideoFiles'     => 'Exportera videofiler (om dom finns)',
    'Exporting'            => 'Exporterar',
    'FPS'                  => 'fps',
    'FPSReportInterval'    => 'FPS rapportintervall',
    'FTP'                  => 'FTP',
    'Far'                  => 'Far',
    'FastForward'          => 'Fast Forward',
    'Feed'                 => 'Matning',
    'Ffmpeg'               => 'Ffmpeg',                 // Added - 2009-02-08
    'File'                 => 'Fil',
    'FilterArchiveEvents'  => 'Arkivera alla tr�ffar',
    'FilterDeleteEvents'   => 'Radera alla tr�ffar',
    'FilterEmailEvents'    => 'Skicka e-post med detaljer om alla tr�ffar',
    'FilterExecuteEvents'  => 'Utf�r kommando p� alla tr�ffar',
    'FilterMessageEvents'  => 'Meddela detaljer om alla tr�ffar',
    'FilterPx'             => 'Filter Px',
    'FilterUnset'          => 'Du m�ste specificera filtrets bredd och h�jd',
    'FilterUploadEvents'   => 'Ladda upp alla tr�ffar',
    'FilterVideoEvents'    => 'Skapa video f�r alla tr�ffar',
    'Filters'              => 'Filter',
    'First'                => 'F�rst',
    'FlippedHori'          => 'V�nd horisontellt',
    'FlippedVert'          => 'V�nd vertikalt',
    'Focus'                => 'Fokus',
    'ForceAlarm'           => 'Tvinga larm',
    'Format'               => 'Format',
    'Frame'                => 'Ram',
    'FrameId'              => 'Ram id',
    'FrameRate'            => 'Ram hastighet',
    'FrameSkip'            => 'Hoppa �ver ram',
    'Frames'               => 'Ramar',
    'Func'                 => 'Funk',
    'Function'             => 'Funktion',
    'Gain'                 => 'Niv�',
    'General'              => 'Generell',
    'GenerateVideo'        => 'Skapa video',
    'GeneratingVideo'      => 'Skapar video',
    'GoToZoneMinder'       => 'G� till ZoneMinder.com',
    'Grey'                 => 'Gr�',
    'Group'                => 'Grupp',
    'Groups'               => 'Grupper',
    'HasFocusSpeed'        => 'Har focushastighet',
    'HasGainSpeed'         => 'Har niv�hastighet',
    'HasHomePreset'        => 'Har normalinst�llning',
    'HasIrisSpeed'         => 'Har irishastighet',
    'HasPanSpeed'          => 'Har panoramahastighet',
    'HasPresets'           => 'Har f�rinst�llningar',
    'HasTiltSpeed'         => 'Har tilthastighet',
    'HasTurboPan'          => 'Har turbopanorering',
    'HasTurboTilt'         => 'Har turbotilt',
    'HasWhiteSpeed'        => 'Har vitbalanshastighet',
    'HasZoomSpeed'         => 'Har Zoomhastighet',
    'High'                 => 'H�g',
    'HighBW'               => 'H�g bandbredd',
    'Home'                 => 'Hem',
    'Hour'                 => 'Timme',
    'Hue'                  => 'Hue',
    'Id'                   => 'nr',
    'Idle'                 => 'Vila',
    'Ignore'               => 'Ignorera',
    'Image'                => 'Bild',
    'ImageBufferSize'      => 'Bildbufferstorlek (ramar)',
    'Images'               => 'Images',
    'In'                   => 'I',
    'Include'              => 'Inkludera',
    'Inverted'             => 'Inverterad',
    'Iris'                 => 'Iris',
    'KeyString'            => 'Nyckelstr�ng',
    'Label'                => 'Etikett',
    'Language'             => 'Spr�k',
    'Last'                 => 'Sist',
    'Layout'               => 'Layout',                 // Added - 2009-02-08
    'LimitResultsPost'     => 'resultaten;', // This is used at the end of the phrase 'Limit to first N results only'
    'LimitResultsPre'      => 'Begr�nsa till f�rsta', // This is used at the beginning of the phrase 'Limit to first N results only'
    'LinkedMonitors'       => 'L�nkade �vervakare',
    'List'                 => 'Lista',
    'Load'                 => 'Belastning',
    'Local'                => 'Lokal',
    'LoggedInAs'           => 'Inloggad som',
    'LoggingIn'            => 'Loggar in',
    'Login'                => 'Logga in',
    'Logout'               => 'Logga ut',
    'Low'                  => 'L�g',
    'LowBW'                => 'L�g bandbredd',
    'Main'                 => 'Huvudmeny',
    'Man'                  => 'Man',
    'Manual'               => 'Manuell',
    'Mark'                 => 'Markera',
    'Max'                  => 'Max',
    'MaxBandwidth'         => 'Max bandbredd',
    'MaxBrScore'           => 'Max.<br/>Score',
    'MaxFocusRange'        => 'Max fokusomr�de',
    'MaxFocusSpeed'        => 'Max fokushastighet',
    'MaxFocusStep'         => 'Max fokussteg',
    'MaxGainRange'         => 'Max niv�omr�de',
    'MaxGainSpeed'         => 'Max niv�hastighet',
    'MaxGainStep'          => 'Max niv�steg',
    'MaxIrisRange'         => 'Max irsiomr�de',
    'MaxIrisSpeed'         => 'Max irishastighet',
    'MaxIrisStep'          => 'Max irissteg',
    'MaxPanRange'          => 'Max panoramaomr�de',
    'MaxPanSpeed'          => 'Max panoramahastighet',
    'MaxPanStep'           => 'Max panoramasteg',
    'MaxTiltRange'         => 'Max tiltomr�de',
    'MaxTiltSpeed'         => 'Max tilthastighet',
    'MaxTiltStep'          => 'Max tiltsteg',
    'MaxWhiteRange'        => 'Max vitbalansomr�de',
    'MaxWhiteSpeed'        => 'Max vitbalanshastighet',
    'MaxWhiteStep'         => 'Max vitbalanssteg',
    'MaxZoomRange'         => 'Max zoomomr�de',
    'MaxZoomSpeed'         => 'Max zoomhastighet',
    'MaxZoomStep'          => 'Max zoomsteg',
    'MaximumFPS'           => 'Max ramar/s',
    'Medium'               => 'Mellan',
    'MediumBW'             => 'Mellan bandbredd',
    'MinAlarmAreaLtMax'    => 'Minsta larmarean skall vara mindre �n st�rsta',
    'MinAlarmAreaUnset'    => 'Du m�ste ange minsta antal larmbildpunkter',
    'MinBlobAreaLtMax'     => 'Minsta blobarean skall vara mindre �n h�gsta',
    'MinBlobAreaUnset'     => 'Du m�ste ange minsta antalet blobpixlar',
    'MinBlobLtMinFilter'   => 'Minsta blobarean skall vara mindre �n eller lika med minsta filterarean',
    'MinBlobsLtMax'        => 'Minsta antalet blobbar skall vara mindre �n st�rsta',
    'MinBlobsUnset'        => 'Du m�ste ange minsta antalet blobbar',
    'MinFilterAreaLtMax'   => 'Minsta filterarean skall vara mindre �n h�gsta',
    'MinFilterAreaUnset'   => 'Du m�ste ange minsta antal filterbildpunkter',
    'MinFilterLtMinAlarm'  => 'Minsta filterarean skall vara mindre �n eller lika med minsta larmarean',
    'MinFocusRange'        => 'Min fokusomr�de',
    'MinFocusSpeed'        => 'Min fokushastighet',
    'MinFocusStep'         => 'Min fokussteg',
    'MinGainRange'         => 'Min niv�omr�de',
    'MinGainSpeed'         => 'Min niv�hastighet',
    'MinGainStep'          => 'Min niv�steg',
    'MinIrisRange'         => 'Min irisomr�de',
    'MinIrisSpeed'         => 'Min irishastighet',
    'MinIrisStep'          => 'Min irissteg',
    'MinPanRange'          => 'Min panoramaomr�de',
    'MinPanSpeed'          => 'Min panoramahastighet',
    'MinPanStep'           => 'Min panoramasteg',
    'MinPixelThresLtMax'   => 'Minsta tr�skelv�rde f�r bildpunkter ska vara mindre �n h�gsta',
    'MinPixelThresUnset'   => 'Du m�ste ange minsta tr�skelv�rde f�r bildpunkter',
    'MinTiltRange'         => 'Min tiltomr�de',
    'MinTiltSpeed'         => 'Min tilthastighet',
    'MinTiltStep'          => 'Min tiltsteg',
    'MinWhiteRange'        => 'Min vitbalansomr�de',
    'MinWhiteSpeed'        => 'Min vitbalanshastighet',
    'MinWhiteStep'         => 'Min vitbalanssteg',
    'MinZoomRange'         => 'Min zoomomr�de',
    'MinZoomSpeed'         => 'Min zoomhastighet',
    'MinZoomStep'          => 'Min zoomsteg',
    'Misc'                 => '�vrigt',
    'Monitor'              => 'Bevakning',
    'MonitorIds'           => 'Bevakningsnr',
    'MonitorPreset'        => 'F�rinst�lld bevakning',
    'MonitorPresetIntro'   => 'V�lj en f�rinst�llning fr�n listan.<br><br>Var medveten om att detta kan skriva �ver inst�llningar du redan gjort f�r denna bevakare.<br><br>',
    'MonitorProbe'         => 'Monitor Probe',          // Added - 2009-03-31
    'MonitorProbeIntro'    => 'The list below shows detected analog and network cameras and whether they are already being used or available for selection.<br/><br/>Select the desired entry from the list below.<br/><br/>Please note that not all cameras may be detected and that choosing a camera here may overwrite any values you already have configured for the current monitor.<br/><br/>', // Added - 2009-03-31
    'Monitors'             => 'Bevakare',
    'Montage'              => 'Montera',
    'Month'                => 'M�nad',
    'Move'                 => 'Flytta',
    'MustBeGe'             => 'm�ste vara st�rre �n eller lika med',
    'MustBeLe'             => 'm�ste vara mindre �n eller lika med',
    'MustConfirmPassword'  => 'Du m�ste bekr�fta l�senordet',
    'MustSupplyPassword'   => 'Du m�ste ange ett l�senord',
    'MustSupplyUsername'   => 'Du m�ste ange ett anv�ndarnamn',
    'Name'                 => 'Namn',
    'Near'                 => 'N�ra',
    'Network'              => 'N�tverk',
    'New'                  => 'Ny',
    'NewGroup'             => 'Ny grupp',
    'NewLabel'             => 'Ny etikett',
    'NewPassword'          => 'Nytt l�senord',
    'NewState'             => 'Nytt l�ge',
    'NewUser'              => 'Ny anv�ndare',
    'Next'                 => 'N�sta',
    'No'                   => 'Nej',
    'NoDetectedCameras'    => 'No Detected Cameras',    // Added - 2009-03-31
    'NoFramesRecorded'     => 'Det finns inga ramar inspelade f�r denna h�ndelse',
    'NoGroup'              => 'Ingen grupp',
    'NoSavedFilters'       => 'Inga sparade filter',
    'NoStatisticsRecorded' => 'Det finns ingen statistik inspelad f�r denna h�ndelse/ram',
    'None'                 => 'Ingen',
    'NoneAvailable'        => 'Ingen tillg�nglig',
    'Normal'               => 'Normal',
    'Notes'                => 'Not.',
    'NumPresets'           => 'Antal f�rinst�llningar',
    'Off'                  => 'Av',
    'On'                   => 'P�',
    'OpEq'                 => 'lika med',
    'OpGt'                 => 'st�rre �n',
    'OpGtEq'               => 'st�rre �n eller lika med',
    'OpIn'                 => 'in set',
    'OpLt'                 => 'mindre �n',
    'OpLtEq'               => 'mindre �n eller lika med',
    'OpMatches'            => 'matchar',
    'OpNe'                 => 'inte lika med',
    'OpNotIn'              => 'inte i set',
    'OpNotMatches'         => 'matchar inte',
    'Open'                 => '�ppna',
    'OptionHelp'           => 'Optionhj�lp',
    'OptionRestartWarning' => 'Dessa �ndringar kommer inte att vara implementerade\nn�r systemet k�rs. N�r du �r klar starta om\n ZoneMinder.',
    'Options'              => 'Alternativ',
    'OrEnterNewName'       => 'eller skriv in nytt namn',
    'Order'                => 'Sortera',
    'Orientation'          => 'Orientation',
    'Out'                  => 'Ut',
    'OverwriteExisting'    => 'Skriv �ver',
    'Paged'                => 'Paged',
    'Pan'                  => 'Panorera',
    'PanLeft'              => 'Panorera v�nster',
    'PanRight'             => 'Panorera h�ger',
    'PanTilt'              => 'Pan/Tilt',
    'Parameter'            => 'Parameter',
    'Password'             => 'L�senord',
    'PasswordsDifferent'   => 'L�senorden skiljer sig �t',
    'Paths'                => 'S�kv�gar',
    'Pause'                => 'Paus',
    'Phone'                => 'Mobil',
    'PhoneBW'              => 'Mobil bandbredd',
    'PixelDiff'            => 'Skillnad i bildpunkter',
    'Pixels'               => 'bildpunkter',
    'Play'                 => 'Spela',
    'PlayAll'              => 'Visa alla',
    'PleaseWait'           => 'V�nta...',
    'Point'                => 'Punkt',
    'PostEventImageBuffer' => 'Post Event Image Count',
    'PreEventImageBuffer'  => 'Pre Event Image Count',
    'PreserveAspect'       => 'Bevara l�gesf�rh�llande',
    'Preset'               => 'F�rinst�llning',
    'Presets'              => 'F�rinst�llningar',
    'Prev'                 => 'F�reg.',
    'Probe'                => 'Probe',                  // Added - 2009-03-31
    'Protocol'             => 'Protokol',
    'Rate'                 => 'Hastighet',
    'Real'                 => 'Verklig',
    'Record'               => 'Spela in',
    'RefImageBlendPct'     => 'Reference Image Blend %ge',
    'Refresh'              => 'Uppdatera',
    'Remote'               => 'Fj�rr',
    'RemoteHostName'       => 'Fj�rrnamn',
    'RemoteHostPath'       => 'Fj�rrs�kv�g',
    'RemoteHostPort'       => 'Fj�rrport',
    'RemoteHostSubPath'    => 'Remote Host SubPath',    // Added - 2009-02-08
    'RemoteImageColours'   => 'Fj�rrbildf�rger',
    'RemoteMethod'         => 'Remote Method',          // Added - 2009-02-08
    'RemoteProtocol'       => 'Remote Protocol',        // Added - 2009-02-08
    'Rename'               => 'Byt namn',
    'Replay'               => 'Repris',
    'ReplayAll'            => 'Alla h�ndelser',
    'ReplayGapless'        => 'Gapless Events',
    'ReplaySingle'         => 'Ensam h�ndelse',
    'Reset'                => '�terst�ll',
    'ResetEventCounts'     => '�terst�ll h�ndelser�knare',
    'Restart'              => '�terstart',
    'Restarting'           => '�terstartar',
    'RestrictedCameraIds'  => 'Begr�nsade kameranr.',
    'RestrictedMonitors'   => 'Begr�nsade bevakare',
    'ReturnDelay'          => 'F�rdr�jd retur',
    'ReturnLocation'       => '�terv�nd till position',
    'Rewind'               => 'Backa',
    'RotateLeft'           => 'Rotera v�nster',
    'RotateRight'          => 'Rotera h�ger',
    'RunMode'              => 'K�rl�ge',
    'RunState'             => 'K�rl�ge',
    'Running'              => 'K�rs',
    'Save'                 => 'Spara',
    'SaveAs'               => 'Spara som',
    'SaveFilter'           => 'Spara filter',
    'Scale'                => 'Skala',
    'Score'                => 'Resultat',
    'Secs'                 => 'Sek',
    'Sectionlength'        => 'Sektionsl�ngd',
    'Select'               => 'V�lj',
    'SelectMonitors'       => 'V�lj bevakare',
    'SelfIntersecting'     => 'Polygon�ndarna f�r inte �verlappa',
    'Set'                  => 'St�ll in',
    'SetNewBandwidth'      => 'St�ll in ny bandbredd',
    'SetPreset'            => 'St�ll in f�rinst�llning',
    'Settings'             => 'Inst�llningar',
    'ShowFilterWindow'     => 'Visa f�nsterfilter',
    'ShowTimeline'         => 'Visa tidslinje',
    'SignalCheckColour'    => 'Signal Check Colour',
    'Size'                 => 'Storlek',
    'Sleep'                => 'Vila',
    'SortAsc'              => 'Stigande',
    'SortBy'               => 'Sortera',
    'SortDesc'             => 'Fallande',
    'Source'               => 'K�lla',
    'SourceColours'        => 'Source Colours',         // Added - 2009-02-08
    'SourcePath'           => 'Source Path',            // Added - 2009-02-08
    'SourceType'           => 'K�lltyp',
    'Speed'                => 'Hastighet',
    'SpeedHigh'            => 'H�ghastighet',
    'SpeedLow'             => 'L�ghastighet',
    'SpeedMedium'          => 'Normalhastighet',
    'SpeedTurbo'           => 'Turbohastighet',
    'Start'                => 'Start',
    'State'                => 'L�ge',
    'Stats'                => 'Statistik',
    'Status'               => 'Status',
    'Step'                 => 'Steg',
    'StepBack'             => 'Stepga bak�t',
    'StepForward'          => 'Stega fram�t',
    'StepLarge'            => 'Stora steg',
    'StepMedium'           => 'Normalsteg',
    'StepNone'             => 'Inga steg',
    'StepSmall'            => 'Sm� steg',
    'Stills'               => 'Stillbilder',
    'Stop'                 => 'Stopp',
    'Stopped'              => 'Stoppad',
    'Stream'               => 'Str�mmande',
    'StreamReplayBuffer'   => 'Buffert f�r str�mmande uppspelning',
    'Submit'               => 'Skicka',
    'System'               => 'System',
    'Tele'                 => 'Tele',
    'Thumbnail'            => 'Miniatyrer',
    'Tilt'                 => 'Tilt',
    'Time'                 => 'Tid',
    'TimeDelta'            => 'tidsdelta',
    'TimeStamp'            => 'Tidsst�mpel',
    'Timeline'             => 'Tidslinje',
    'Timestamp'            => 'Tidsst�mpel',
    'TimestampLabelFormat' => 'Format p� tidsst�mpel',
    'TimestampLabelX'      => 'V�rde p� tidsst�mpel X',
    'TimestampLabelY'      => 'V�rde p� tidsst�mpel Y',
    'Today'                => 'Idag',
    'Tools'                => 'Verktyg',
    'TotalBrScore'         => 'Total<br/>Score',
    'TrackDelay'           => 'Sp�rf�rdr�jning',
    'TrackMotion'          => 'Sp�ra r�relse',
    'Triggers'             => 'Triggers',
    'TurboPanSpeed'        => 'Turbo panoramahastighet',
    'TurboTiltSpeed'       => 'Turbo tilthastighet',
    'Type'                 => 'Typ',
    'Unarchive'            => 'Packa upp',
    'Undefined'            => 'Undefined',              // Added - 2009-02-08
    'Units'                => 'Enheter',
    'Unknown'              => 'Ok�nd',
    'Update'               => 'Uppdatera',
    'UpdateAvailable'      => 'En uppdatering till ZoneMinder finns tillg�nglig.',
    'UpdateNotNecessary'   => 'Ingen uppdatering beh�vs.',
    'UseFilter'            => 'Anv�nd filter',
    'UseFilterExprsPost'   => '&nbsp;filter&nbsp;expressions', // This is used at the end of the phrase 'use N filter expressions'
    'UseFilterExprsPre'    => 'Anv�nd&nbsp;', // This is used at the beginning of the phrase 'use N filter expressions'
    'User'                 => 'Anv�ndare',
    'Username'             => 'Anv�ndarnamn',
    'Users'                => 'Anv�ndare',
    'Value'                => 'V�rde',
    'Version'              => 'Version',
    'VersionIgnore'        => 'Ignorera denna version',
    'VersionRemindDay'     => 'P�minn om 1 dag',
    'VersionRemindHour'    => 'P�minn om 1 timme',
    'VersionRemindNever'   => 'P�minn inte om nya versioner',
    'VersionRemindWeek'    => 'P�minn om en 1 vecka',
    'Video'                => 'Video',
    'VideoFormat'          => 'Videoformat',
    'VideoGenFailed'       => 'Videogenereringen misslyckades!',
    'VideoGenFiles'        => 'Befintliga videofiler',
    'VideoGenNoFiles'      => 'Inga videofiler',
    'VideoGenParms'        => 'Inst�llningar f�r videogenerering',
    'VideoGenSucceeded'    => 'Videogenereringen lyckades!',
    'VideoSize'            => 'Videostorlek',
    'View'                 => 'Visa',
    'ViewAll'              => 'Visa alla',
    'ViewEvent'            => 'Visa h�ndelse',
    'ViewPaged'            => 'Visa Paged',
    'Wake'                 => 'Vakna',
    'WarmupFrames'         => 'V�rm upp ramar',
    'Watch'                => 'Se',
    'Web'                  => 'Webb',
    'WebColour'            => 'Webbf�rg',
    'Week'                 => 'Vecka',
    'White'                => 'Vit',
    'WhiteBalance'         => 'Vitbalans',
    'Wide'                 => 'Vid',
    'X'                    => 'X',
    'X10'                  => 'X10',
    'X10ActivationString'  => 'X10 aktiveringsstr�ng',
    'X10InputAlarmString'  => 'X10 larming�ngsstr�ng',
    'X10OutputAlarmString' => 'X10 larmutg�ngsstr�ng',
    'Y'                    => 'J',
    'Yes'                  => 'Ja',
    'YouNoPerms'           => 'Du har inte tillst�nd till denna resurs.',
    'Zone'                 => 'Zon',
    'ZoneAlarmColour'      => 'Larmf�rg (R�d/Gr�n/Bl�)',
    'ZoneArea'             => 'Zonarea',
    'ZoneFilterSize'       => 'Filterbredd/h�jd (pixlar)',
    'ZoneMinMaxAlarmArea'  => 'Min/Max larmarea',
    'ZoneMinMaxBlobArea'   => 'Min/Max blobbarea',
    'ZoneMinMaxBlobs'      => 'Min/Max blobbar',
    'ZoneMinMaxFiltArea'   => 'Min/Max filterarea',
    'ZoneMinMaxPixelThres' => 'Min/Max pixel Threshold (0-255)',
    'ZoneOverloadFrames'   => 'Overload Frame Ignore Count',
    'Zones'                => 'Zoner',
    'Zoom'                 => 'Zoom',
    'ZoomIn'               => 'Zooma in',
    'ZoomOut'              => 'Zooma ut',
);

// Complex replacements with formatting and/or placements, must be passed through sprintf
$CLANG = array(
    'CurrentLogin'         => 'Aktuell inloggning �r \'%1$s\'',
    'EventCount'           => '%1$s %2$s', // For example '37 Events' (from Vlang below)
    'LastEvents'           => 'Senaste %1$s %2$s', // For example 'Last 37 Events' (from Vlang below)
    'LatestRelease'        => 'Aktuell version �r v%1$s, du har v%2$s.',
    'MonitorCount'         => '%1$s %2$s', // For example '4 Monitors' (from Vlang below)
    'MonitorFunction'      => 'Bevakare %1$s funktion',
    'RunningRecentVer'     => 'Du anv�nder den senaste versionen av ZoneMinder, v%s.',
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
    'Event'                => array( 0=>'H�ndelser', 1=>'H�ndelsen', 2=>'H�ndelserna' ),
    'Monitor'              => array( 0=>'Bevakare', 1=>'Bevakare', 2=>'Bevakare' ),
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
    die( 'Fel, kan inte relatera variabel spr�kstr�ng' );
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
$OLANG = array(
    'LANG_DEFAULT' => array(
        'Prompt' => "V�lj spr�k f�r ZoneMinder",
        'Help' => "ZoneMinder kan anv�nda annat spr�k �n engelska i menyer och texter. V�lj h�r det spr�k du vill anv�nda till ZoneMinder."
    ),
);

?>
