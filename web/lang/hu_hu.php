<?php
//
// ZoneMinder web HU Hungarian language file, $Date$, $Revision$
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

// ZoneMinder Hungarian Translation by szimszon at oregpreshaz dot eu, robi
// version: 0.6 - 2009.06.21. - friss�t�s 1.24.2-h�z (robi)
// version: 0.5 - 2007.12.30. - friss�t�s 1.23.1-hez (robi)
// version: 0.4 - 2007.12.30. - friss�t�s 1.23.0-hoz (robi)
// version: 0.3 - 2006.04.27. - ford�t�s befejez�se, elrendez�se elf�r�shez (robi)
// version: 0.2 - 2006.12.05. - par javitas
// version: 0.1 - 2006.11.27. - sok typoval es par leforditatlan resszel

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
header( "Content-Type: text/html; charset=iso8859-2" );

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
// setlocale( LC_ALL, 'hu_HU' ); //All locale settings 4.3.0 and after
//setlocale( LC_CTYPE, 'hu_HU'); //Character class settings 4.3.0 and after
//setlocale( LC_TIME, 'hu_HU'); //Date and time formatting 4.3.0 and after

setlocale( LC_TIME, 'hu_HU' );
setlocale( LC_ALL, 'hu_HU' );

// Simple String Replacements
$SLANG = array(
    '24BitColour'          => '24 bites sz�n',
    '8BitGrey'             => '8 bit sz�rke�rnyalat',
    'Action'               => 'M�velet',
    'Actual'               => 'Val�s',
    'AddNewControl'        => '�j vez�rl�s',
    'AddNewMonitor'        => '�j monitor',
    'AddNewUser'           => '�j felhaszn�l�',
    'AddNewZone'           => '�j z�na',
    'Alarm'                => 'Riad�',
    'AlarmBrFrames'        => 'Riad�<br/>k�pek',
    'AlarmFrame'           => 'Riad� k�p',
    'AlarmFrameCount'      => 'Riad� k�pek sz�ma',
    'AlarmLimits'          => 'Riaszt�si hat�rok',
    'AlarmMaximumFPS'      => 'Maxim�lis FPS riaszt�sn�l',
    'AlarmPx'              => 'Riad� k�ppont',
    'AlarmRGBUnset'        => 'Be kell �ll�tani egy RGB sz�nt a riaszt�shoz',
    'Alert'                => 'Riaszt�s',
    'All'                  => 'Mind',
    'Apply'                => 'Alkalmaz',
    'ApplyingStateChange'  => '�llapot v�lt�s...',
    'ArchArchived'         => 'Csak archiv�lt',
    'ArchUnarchived'       => 'Csak archiv�latlan',
    'Archive'              => 'Archiv�l�s',
    'Archived'             => 'Arch�vum',
    'Area'                 => 'Ter�let',
    'AreaUnits'            => 'Ter�let (k�ppont / %)',
    'AttrAlarmFrames'      => 'Riad� k�pkock�k',
    'AttrArchiveStatus'    => 'Archiv�lt �llapot',
    'AttrAvgScore'         => '�tlagos �rt�k',
    'AttrCause'            => 'Okoz�',
    'AttrDate'             => 'D�tum',
    'AttrDateTime'         => 'D�tum/Id�',
    'AttrDiskBlocks'       => 'Lemez blokkok',
    'AttrDiskPercent'      => 'Lemez sz�zal�k',
    'AttrDuration'         => 'Id�tartam',
    'AttrFrames'           => 'K�pkock�k',
    'AttrId'               => 'Azonos�t�',
    'AttrMaxScore'         => 'Max. �rt�k',
    'AttrMonitorId'        => 'Monitor azon.',
    'AttrMonitorName'      => 'Monitor n�v',
    'AttrName'             => 'N�v',
    'AttrNotes'            => 'Megjegyz�s',
    'AttrSystemLoad'       => 'Rendszer terhel�s',
    'AttrTime'             => 'Id�',
    'AttrTotalScore'       => '�ssz. �rt�k',
    'AttrWeekday'          => 'H�tk�znap',
    'Auto'                 => 'Auto',
    'AutoStopTimeout'      => 'Auto meg�ll�si id� t�ll�p�s',
    'Available'            => 'El�rhet�',
    'AvgBrScore'           => '�tlag<br/>�rt�k',
    'Background'           => 'H�tt�r',
    'BackgroundFilter'     => 'Sz�r� futtat�sa a h�tt�rben',
    'BadAlarmFrameCount'   => 'Riad� k�pek sz�ma 1 vagy nagyobb eg�sz sz�m legyen',
    'BadAlarmMaxFPS'       => 'A riad� maxim�lis FPS sz�ma pozit�v sz�m legyen',
    'BadChannel'           => 'A csatorna sz�ma 0 vagy nagyobb eg�sz sz�m legyen',
    'BadDevice'            => 'Az eszk�z �rt�k val�s legyen',
    'BadFPSReportInterval' => 'FPS inform�ci�s id�k�z puffer sz�ml�l�ja 100 vagy nagyobb eg�sz legyen',
    'BadFormat'            => 'A t�pus 0 vagy nagyobb eg�sz sz�m legyen',
    'BadFrameSkip'         => 'K�pkocka eldob�sok sz�ma 0 vagy nagyobb eg�sz sz�m legyen',
    'BadHeight'            => 'A k�pmagass�g �rv�nyes �rt�k legyen k�ppontban',
    'BadHost'              => 'A hoszt val�s IP c�m vagy hosztn�v legyen, http:// n�lk�l',
    'BadImageBufferCount'  => 'K�p puffer m�rete legyen 10 vagy nagyobb sz�m',
    'BadLabelX'            => 'A cimke X koordin�t�ja legyen 0 vagy nagyobb eg�sz sz�m',
    'BadLabelY'            => 'A cimke Y koordin�t�ja legyen 0 vagy nagyobb eg�sz sz�m',
    'BadMaxFPS'            => 'A maxim�lis FPS null�n�l nagyobb sz�m legyen',
    'BadNameChars'         => 'A n�v csak alfanumerikus karaktereket, plusz-, k�t�-, �s al�h�z�sjelet tartalmazhat',
    'BadPalette'           => 'A palett�nak egy helyes �rt�ket kell megadni',
    'BadPath'              => 'A k�p el�r�si �tvonala val�s legyen',
    'BadPort'              => 'A portsz�m val�s legyen',
    'BadPostEventCount'    => 'Az esem�ny ut�ni k�pek puffere 0 vagy nagyobb eg�sz sz�m legyen',
    'BadPreEventCount'     => 'Az esem�ny el�tti k�pek puffere 0 vagy nagyobb eg�sz sz�m legyen',
    'BadRefBlendPerc'      => 'A referencia k�pkever�k-sz�zal�k pozit�v eg�sz sz�m legyen',
    'BadSectionLength'     => 'Egy egys�g hossza 30 vagy hosszabb legyen',
    'BadSignalCheckColour' => 'A jel ellen�rz�si sz�n egy �rv�nyes RGP k�d kell legyen',
    'BadStreamReplayBuffer'=> 'Folyam visszaj�tsz� puffer 0 vagy nagyobb eg�sz sz�m legyen',
    'BadWarmupCount'       => 'Bemeleg�t� k�pek sz�ma 0 vagy nagyobb eg�sz sz�m legyen',
    'BadWebColour'         => 'A web sz�n �rv�nyes web sz�n k�d legyen',
    'BadWidth'             => 'A k�psz�less�g �rv�nyes �rt�k legyen k�ppontban',
    'Bandwidth'            => 's�vsz�less�gre',
    'BlobPx'               => 'Blob k�ppont',
    'BlobSizes'            => 'Blob m�rete',
    'Blobs'                => 'Blob-ok',
    'Brightness'           => 'F�nyer�',
    'Buffers'              => 'Pufferek',
    'CanAutoFocus'         => 'Auto f�kusz van',
    'CanAutoGain'          => 'Auto gain van',
    'CanAutoIris'          => 'Auto �risz van',
    'CanAutoWhite'         => 'Van aut�mata feh�r egyens�ly',
    'CanAutoZoom'          => 'Auto zoom van',
    'CanFocus'             => 'Tud f�kusz�lni',
    'CanFocusAbs'          => 'Tud abszol�t f�kuszt',
    'CanFocusCon'          => 'Tud folyamatos f�kuszt',
    'CanFocusRel'          => 'Tud relat�v f�kuszt',
    'CanGain'              => 'Tud er�s�teni',
    'CanGainAbs'           => 'Tud abszol�t er�s�t�st',
    'CanGainCon'           => 'Tud folyamatos er�s�t�st',
    'CanGainRel'           => 'Tud relat�v er�s�t�st',
    'CanIris'              => 'Tud �riszt v�ltoztatni',
    'CanIrisAbs'           => 'Tud abszolut �riszt',
    'CanIrisCon'           => 'Folyamatosan tud �riszt v�ltoztatni',
    'CanIrisRel'           => 'Relat�ven tud �riszt v�ltoztatni',
    'CanMove'              => 'Tud mozogni',
    'CanMoveAbs'           => 'Tud abszolult mozg�st',
    'CanMoveCon'           => 'Folyamatosan tud mozogni',
    'CanMoveDiag'          => 'Diagon�lban tud mozogni',
    'CanMoveMap'           => '�tvonalon tud mozogni',
    'CanMoveRel'           => 'Relat�ven tud mozogni',
    'CanPan'               => 'Tud jobb-bal mozg�st' ,
    'CanReset'             => 'Tud alaphelyzetbe j�nni',
    'CanSetPresets'        => 'Tud menteni profilokat',
    'CanSleep'             => 'Tud phihen� �zemm�dot',
    'CanTilt'              => 'Tud fel-le mozg�st',
    'CanWake'              => 'Tud fel�ledni',
    'CanWhite'             => 'Tud feh�r egyens�lyt',
    'CanWhiteAbs'          => 'Tud abszolut feh�r egyens�lyt',
    'CanWhiteBal'          => 'Tud feh�r egyens�lyt',
    'CanWhiteCon'          => 'Tud folyamatos feh�r egyens�lyt',
    'CanWhiteRel'          => 'Tud relat�v feh�r egyens�lyt',
    'CanZoom'              => 'Tud zoom-olni',
    'CanZoomAbs'           => 'Tud abszolut zoom-ot',
    'CanZoomCon'           => 'Tud folyamatos zoom-ot',
    'CanZoomRel'           => 'Tud relat�v zoom-ot',
    'Cancel'               => 'M�gsem',
    'CancelForcedAlarm'    => 'K�zi riaszt�s le�ll�t�sa',
    'CaptureHeight'        => 'K�pmagass�g',
    'CaptureMethod'        => 'Digitaliz�l�s m�dszere',
    'CapturePalette'       => 'Digitaliz�l�s sz�n-palett�ja',
    'CaptureWidth'         => 'K�psz�less�g',
    'Cause'                => 'Okoz�',
    'CheckMethod'          => 'A riaszt�s figyel�s�nek m�dja',
    'ChooseDetectedCamera' => 'V�lasszon �rz�kelt kamer�t',
    'ChooseFilter'         => 'V�lassz sz�r�t',
    'ChoosePreset'         => 'V�lassz profilt',
    'Close'                => 'Bez�r',
    'Colour'               => 'Sz�n',
    'Command'              => 'Parancs',
    'Config'               => 'Be�ll�t�s',
    'ConfiguredFor'        => 'Be�ll�tva',
    'ConfirmDeleteEvents'  => 'Biztos benne, hogy t�rli a kiv�lasztott esem�nyeket?',
    'ConfirmPassword'      => 'Jelsz� meger�s�t�s',
    'ConjAnd'              => '�s',
    'ConjOr'               => 'vagy',
    'Console'              => 'Konzol',
    'ContactAdmin'         => 'K�rem vegye fel a kapcsolatot a rendszergazd�val a r�szletek�rt.',
    'Continue'             => 'Folytat�s',
    'Contrast'             => 'Kontraszt',
    'Control'              => 'Vez�rl�s',
    'ControlAddress'       => 'Vez�rl�si jogok',
    'ControlCap'           => 'Vez�rl�si lehet�s�g',
    'ControlCaps'          => 'Vez�rl�si lehet�s�gek',
    'ControlDevice'        => 'Vez�rl� eszk�z',
    'ControlType'          => 'Vez�rl�s t�pusa',
    'Controllable'         => 'Vez�relhet�',
    'Cycle'                => 'K�rbekapcsol�s',
    'CycleWatch'           => 'K�rbekapcsol�s',
    'Day'                  => 'Napon',
    'Debug'                => 'Nyomon<br>k�vet�s',
    'DefaultRate'          => 'Alap�rtelmezett sebess�g',
    'DefaultScale'         => 'Alap�rtelmezett m�ret',
    'DefaultView'          => 'Alap�rtelmezett n�zet',
    'Delete'               => 'T�r�l',
    'DeleteAndNext'        => 'T�r�l &amp;<br>k�vetkez�',
    'DeleteAndPrev'        => 'T�r�l &amp;<br>el�z�',
    'DeleteSavedFilter'    => 'Mentett sz�r� t�rl�se',
    'Description'          => 'Le�r�s',
    'DetectedCameras'      => '�rz�kelt kamer�k',
    'Device'               => 'Eszk�z',
    'DeviceChannel'        => 'Eszk�z csatorn�ja',
    'DeviceFormat'         => 'Eszk�z form�tuma',
    'DeviceNumber'         => 'Eszk�z sz�m',
    'DevicePath'           => 'Eszk�z el�r�si �tvonala',
    'Devices'              => 'Eszk�z�k',
    'Dimensions'           => 'Dimenzi�k',
    'DisableAlarms'        => 'Riaszt�s tilt�sa',
    'Disk'                 => 'T�rhely',
    'Display'               => 'Megjelen�s',
    'Donate'               => 'K�rem t�mogasson',
    'DonateAlready'        => 'Nem, �n m�r t�mogattam',
    'DonateEnticement'     => '�n m�r j� ideje haszn�lja a ZoneMindert rem�lhet�leg hasznos kieg�sz�t�snek tartja h�za vagy munkahelye biztos�t�s�ban. B�r ZoneMinder szabad, ny�lt forr�sk�d�, �s az is marad; a fejleszt�se p�nzbe ker�l. Ha t�mogatni szeretn� a j�v�beni fejleszt�seket �s az �j funkci�kat k�rem t�mogasson. A t�mogat�s teljesen �nk�ntes, de nagyon megbecs�lt �s annyival tud t�mogatni amennyivel k�v�n.<br><br>Ha t�mogatni szertne k�rem v�lasszon az al�bbi lehet�s�gekb�l vagy l�togassa meg a http://www.zoneminder.com/donate.html oldalt.<br><br>K�sz�n�m, hogy haszn�lja a ZoneMinder-t �s ne felejtse el megl�togatni a f�rumokat a ZoneMinder.com oldalon t�mogat�s�rt �s �tletek�rt, hogy tudja m�g jobban haszn�lni a ZoneMinder-t.',
    'DonateRemindDay'      => 'Nem most, figyelmeztess 1 nap m�lva',
    'DonateRemindHour'     => 'Nem most, figyelmeztess 1 �ra m�lva',
    'DonateRemindMonth'    => 'Nem most, figyelmeztess 1 h�nap m�lva',
    'DonateRemindNever'    => 'Nem akarom t�mogatni, ne is eml�keztess',
    'DonateRemindWeek'     => 'Nem most, figyelmeztess 1 h�t m�lva',
    'DonateYes'            => 'Igen, most szeretn�m t�mogatni',
    'Download'             => 'Let�lt',
    'DuplicateMonitorName' => 'Monitor nev�nek duplik�l�sa',
    'Duration'             => 'Id�tartam',
    'Edit'                 => 'Szerkeszt',
    'Email'                => 'Email',
    'EnableAlarms'         => 'Riaszt�s felold�sa',
    'Enabled'              => 'Enged�lyezve',
    'EnterNewFilterName'   => '�rd be az �j sz�r� nev�t',
    'Error'                => 'Hiba',
    'ErrorBrackets'        => 'Hiba, ellen�rizd, hogy ugyanannyi nyit� �s z�r� z�r�jel van',
    'ErrorValidValue'      => 'Hiba, ellen�rizd, hogy minden be�ll�t�snak �rv�nyes �rt�ke van',
    'Etc'                  => 'stb',
    'Event'                => 'Esem�ny',
    'EventFilter'          => 'Esem�ny sz�r�',
    'EventId'              => 'Esem�ny azonos�t�',
    'EventName'            => 'Esem�ny n�v',
    'EventPrefix'          => 'Esem�ny el�tag',
    'Events'               => 'Esem�nyek',
    'Exclude'              => 'Kiz�r',
    'Execute'              => 'Futtat',
    'Export'               => 'Export�l',
    'ExportDetails'        => 'Esem�ny adatainak export�l�sa',
    'ExportFailed'         => 'Hib�s export�l�s',
    'ExportFormat'         => 'Export�lt f�jl form�tuma',
    'ExportFormatTar'      => 'TAR',
    'ExportFormatZip'      => 'ZIP',
    'ExportFrames'         => 'K�pek adatainak export�l�sa',
    'ExportImageFiles'     => 'K�pek export�l�sa',
    'ExportMiscFiles'      => 'Egy�b f�jlok export�l�sa (ha vannak)',
    'ExportOptions'        => 'Export�l�s be�ll�t�sai',
    'ExportSucceeded'      => 'Az export�l�s siker�lt',
    'ExportVideoFiles'     => 'Vide� f�jlok export�l�sa (ha vannak)',
    'Exporting'            => 'Export�l�s...',
    'FPS'                  => 'fps',
    'FPSReportInterval'    => 'FPS megjelen�t�s id�k�ze',
    'FTP'                  => 'FTP',
    'Far'                  => 'T�vol',
    'FastForward'          => 'El�re teker�s',
    'Feed'                 => 'Folyam',
    'Ffmpeg'               => 'Ffmpeg',
    'File'                 => 'F�jl',
    'FilterArchiveEvents'  => 'Minden tal�lat archiv�l�sa',
    'FilterDeleteEvents'   => 'Minden tal�lat t�rl�se',
    'FilterEmailEvents'    => 'Minden tal�lat adatainak elk�ld�se E-mailben',
    'FilterExecuteEvents'  => 'Parancs futtat�sa minden tal�laton',
    'FilterMessageEvents'  => 'Minden tal�lat adatainak �zen�se',
    'FilterPx'             => 'Sz�rt k�pkock�k',
    'FilterUnset'          => 'Meg kell adnod a sz�r� sz�less�g�t �s magass�g�t',
    'FilterUploadEvents'   => 'Minden tal�lat felt�lt�se',
    'FilterVideoEvents'    => 'Vide� k�sz�t�se minden tal�latr�l',
    'Filters'              => 'Sz�r�k',
    'First'                => 'Els�',
    'FlippedHori'          => 'V�zszintes t�kr�z�s',
    'FlippedVert'          => 'F�gg�leges t�kr�z�s',
    'Focus'                => 'F�kusz',
    'ForceAlarm'           => 'K�zi riaszt�s',
    'Format'               => 'Form�tum',
    'Frame'                => 'K�pkocka',
    'FrameId'              => 'K�pkocka azonos�t�',
    'FrameRate'            => 'FPS',
    'FrameSkip'            => 'K�pkocka kihagy�s',
    'Frames'               => 'K�pkocka',
    'Func'                 => 'Funk.',
    'Function'             => 'Funkci�',
    'Gain'                 => 'Er�s�t�s',
    'General'              => '�ltal�nos',
    'GenerateVideo'        => 'Vide� k�sz�t�s',
    'GeneratingVideo'      => 'Vide� k�sz�t�se...',
    'GoToZoneMinder'       => 'L�togat�s a ZoneMinder.com-ra',
    'Grey'                 => 'Sz�rke',
    'Group'                => 'Csoport',
    'Groups'               => 'Csoportok',
    'HasFocusSpeed'        => 'Van f�kusz sebess�g',
    'HasGainSpeed'         => 'Van er�s�t�s sebess�g',
    'HasHomePreset'        => 'Van kedvenc profilja',
    'HasIrisSpeed'         => 'Van �risz sebess�g',
    'HasPanSpeed'          => 'Van jobb-bal sebess�g',
    'HasPresets'           => 'Vannak profiljai',
    'HasTiltSpeed'         => 'Van le-fel sebess�g',
    'HasTurboPan'          => 'Van turb� jobb-bal',
    'HasTurboTilt'         => 'Van turb� le-fel',
    'HasWhiteSpeed'        => 'Van feh�r egyens�ly sebess�g',
    'HasZoomSpeed'         => 'Van zoom sebess�g',
    'High'                 => 'Magas',
    'HighBW'               => 'Magas<br>s�vsz.',
    'Home'                 => 'Home',
    'Hour'                 => '�r�ban',
    'Hue'                  => 'Sz�n�rnyalat',
    'Id'                   => 'Az.',
    'Idle'                 => 'Nyugalom',
    'Ignore'               => 'Figyelmen k�v�l hagy',
    'Image'                => 'K�p',
    'ImageBufferSize'      => 'K�ppuffer m�rete (k�pkock�k)',
    'Images'               => 'K�p',
    'In'                   => 'In',
    'Include'              => 'Be�gyaz',
    'Inverted'             => 'Invert�lva',
    'Iris'                 => '�risz',
    'KeyString'            => 'Kulcs karaktersor',
    'Label'                => 'Cimke',
    'Language'             => 'Nyelv',
    'Last'                 => 'Utols�',
    'Layout'               => 'Elrendez�s',
    'LimitResultsPost'     => 'tal�latig korl�toz', // This is used at the end of the phrase 'Limit to first N results only'
    'LimitResultsPre'      => 'Az els�', // This is used at the beginning of the phrase 'Limit to first N results only'
    'LinkedMonitors'       => '�sszef�gg� monitorok',
    'List'                 => 'Lista',
    'Load'                 => 'Terhel�s',
    'Local'                => 'Helyi',
    'LoggedInAs'           => 'Bejelentkezve mint',
    'LoggingIn'            => 'Bejelentkez�s folyamatban',
    'Login'                => 'Bejelentkez�s',
    'Logout'               => 'Kil�p�s',
    'Low'                  => 'Alacsony',
    'LowBW'                => 'Alacsony<br>s�vsz.',
    'Main'                 => 'F�',
    'Man'                  => 'Man',
    'Manual'               => 'K�zik�nyv',
    'Mark'                 => 'Jel�l�s',
    'Max'                  => 'Max.',
    'MaxBandwidth'         => 'Max. s�vsz�less�g',
    'MaxBrScore'           => 'Max.<br/>�rt�k',
    'MaxFocusRange'        => 'Max. f�kusz tartom�ny',
    'MaxFocusSpeed'        => 'Max. f�kusz sebess�g',
    'MaxFocusStep'         => 'Max. f�kusz l�p�s',
    'MaxGainRange'         => 'Max Gain Range',
    'MaxGainSpeed'         => 'Max Gain Speed',
    'MaxGainStep'          => 'Max Gain Step',
    'MaxIrisRange'         => 'Max. �risz tartom�ny',
    'MaxIrisSpeed'         => 'Max. �risz sebess�g',
    'MaxIrisStep'          => 'Max. �risz l�p�s',
    'MaxPanRange'          => 'Max. jobb-bal tartom�ny',
    'MaxPanSpeed'          => 'Max. jobb-bal sebess�g',
    'MaxPanStep'           => 'Max. jobb-bal l�p�s',
    'MaxTiltRange'         => 'Max. fel-le tartom�ny',
    'MaxTiltSpeed'         => 'Max. fel-le sebess�g',
    'MaxTiltStep'          => 'Max. fel-le l�p�s',
    'MaxWhiteRange'        => 'Max. feh�r egyens�ly tartom�ny',
    'MaxWhiteSpeed'        => 'Max. feh�r egyens�ly sebess�g',
    'MaxWhiteStep'         => 'Max. feh�r egyens�ly l�p�s',
    'MaxZoomRange'         => 'Max. zoom tartom�ny',
    'MaxZoomSpeed'         => 'Max. zoom sebess�g',
    'MaxZoomStep'          => 'Max. zoom l�p�s',
    'MaximumFPS'           => 'Maximum FPS',
    'Medium'               => 'K�zepes',
    'MediumBW'             => 'K�zepes<br>s�vsz.',
    'MinAlarmAreaLtMax'    => 'A minimum riasztott ter�letnek kisebbnek kell lennie mint a maximumnak',
    'MinAlarmAreaUnset'    => 'Meg kell adnod a minimum riasztott k�ppontok sz�m�t',
    'MinBlobAreaLtMax'     => 'A minimum blob ter�letnek kisebbnek kell lennie mint a maximumnak',
    'MinBlobAreaUnset'     => 'Meg kell adnod a minimum blob k�ppontok sz�m�t',
    'MinBlobLtMinFilter'   => 'A minimum blob ter�letnek kisebbnek vagy egyenl�nek kell lennie a megsz�rt ter�lettel',
    'MinBlobsLtMax'        => 'A minimum bloboknak kisebbeknek kell lenni�k, mint a maximum',
    'MinBlobsUnset'        => 'Meg kell adnod a blobok sz�m�t',
    'MinFilterAreaLtMax'   => 'A minimum megsz�rt ter�letnek kisebbnek kell lennie mint a maximum',
    'MinFilterAreaUnset'   => 'Meg kell adnod a megsz�rt ter�let k�ppontjainak sz�m�t',
    'MinFilterLtMinAlarm'  => 'A megsz�rt ter�letnek kisebbnek vagy ugyanakkor�nak kell lennie mint a riasztott ter�let',
    'MinFocusRange'        => 'Min. f�kusz ter�let',
    'MinFocusSpeed'        => 'Min. f�kusz sebess�g',
    'MinFocusStep'         => 'Min. f�kusz l�p�s',
    'MinGainRange'         => 'Min Gain Range',
    'MinGainSpeed'         => 'Min Gain Speed',
    'MinGainStep'          => 'Min Gain Step',
    'MinIrisRange'         => 'Min. �risz ter�let',
    'MinIrisSpeed'         => 'Min. �risz sebess�g',
    'MinIrisStep'          => 'Min. �risz l�p�s',
    'MinPanRange'          => 'Min. jobb-bal tartom�ny',
    'MinPanSpeed'          => 'Min. jobb-bal sebess�g',
    'MinPanStep'           => 'Min. jobb-bal l�p�s',
    'MinPixelThresLtMax'   => 'A k�ppont minimum elt�r�si k�sz�b�nek kisebbnek kell lennie, mint a maximum',
    'MinPixelThresUnset'   => 'Meg kell adnod a k�ppont minimum elt�r�si k�sz�b�t',
    'MinTiltRange'         => 'Min. fel-le tartom�ny',
    'MinTiltSpeed'         => 'Min. fel-le sebess�g',
    'MinTiltStep'          => 'Min. fel-le l�p�s',
    'MinWhiteRange'        => 'Min. feh�r egyens�ly ter�let',
    'MinWhiteSpeed'        => 'Min. feh�r egyens�ly sebess�g',
    'MinWhiteStep'         => 'Min. feh�r egyens�ly l�p�s',
    'MinZoomRange'         => 'Min. zoom ter�let',
    'MinZoomSpeed'         => 'Min. zoom sebess�g',
    'MinZoomStep'          => 'Min. zoom l�p�s',
    'Misc'                 => 'Egy�b',
    'Monitor'              => 'Monitor',
    'MonitorIds'           => 'Monitor&nbsp;azonos�t�k',
    'MonitorPreset'        => 'El�re be�ll�tott monitorprofilok',
    'MonitorPresetIntro'   => 'V�lassz egy, az el�re meghat�rozott<br> �rt�kprofilt az al�bbiak k�z�l.<br><br>Vedd figyelembe, hogy ez fel�l�rhatja <br>az �ltalad m�r be�ll�tott �rt�keket.<br><br>',
    'MonitorProbe'         => 'Monitor �szlel�s',
    'MonitorProbeIntro'    => 'Az al�bbi list�ban tal�lhat�k az automatikusan �rz�kelt anal�g �s h�l�zati kamer�kat, illetve azt, hogy k�z�l�k melyik van haszn�latban, vagy kiv�laszthat�.<br/><br/>V�lasszon egyet az al�bbi list�b�l.<br/><br/>Figyelem! Nem biztos, hogy minden kamer�t lehet automatikusan �rz�kelni. Az itt kiv�lasztott kamara adatai fel�l�rhatj�k azokat, amelyeket m�r ehhez a monitorhoz be�ll�tott.<br/><br/>',
    'Monitors'             => 'Monitorok',
    'Montage'              => 'T�bbkamer�s n�zet',
    'Month'                => 'H�napban',
    'Move'                 => 'Mozg�s',
    'MustBeGe'             => 'nagyobbnak vagy egyenl�nek kell lennie',
    'MustBeLe'             => 'kisebbnek vagy egyenl�nek kell lennie',
    'MustConfirmPassword'  => 'Meg kell er�s�tened a jelsz�t',
    'MustSupplyPassword'   => 'Meg kell adnod a jelsz�t',
    'MustSupplyUsername'   => 'Meg kell adnod felhaszn�l�i nevet',
    'Name'                 => 'N�v',
    'Near'                 => 'K�zel',
    'Network'              => 'H�l�zat',
    'New'                  => 'Uj',
    'NewGroup'             => '�j csoport',
    'NewLabel'             => '�j cimke',
    'NewPassword'          => '�j jelsz�',
    'NewState'             => '�j �llapot neve',
    'NewUser'              => '�j felhaszn�l�',
    'Next'                 => 'K�vetkez�',
    'No'                   => 'Nem',
    'NoDetectedCameras'    => 'Nincsenek �rz�kelt kamer�k',
    'NoFramesRecorded'     => 'Nincs felvett k�pkocka ehhez az esem�nyhez',
    'NoGroup'              => 'Nincs csoport',
    'NoSavedFilters'       => 'Nincs mentett sz�r�',
    'NoStatisticsRecorded' => 'Nincs mentett statisztika ehhez az esem�nyhez/k�pkock�hoz',
    'None'                 => 'Nincs kiv�lasztva',
    'NoneAvailable'        => 'Nem el�rhet�',
    'Normal'               => 'Norm�l',
    'Notes'                => 'Megjegyz�sek',
    'NumPresets'           => 'Profilok sz�ma',
    'Off'                  => 'Ki',
    'On'                   => 'Be',
    'OpEq'                 => 'egyenl�',
    'OpGt'                 => 'nagyobb mint',
    'OpGtEq'               => 'nagyobb van egyenl�',
    'OpIn'                 => 'be�ll�tva',
    'OpLt'                 => 'kisebb mint',
    'OpLtEq'               => 'kisebb vagy egyenl�',
    'OpMatches'            => 'tal�latok',
    'OpNe'                 => 'nem egyenl�',
    'OpNotIn'              => 'nincs be�ll�tva',
    'OpNotMatches'         => 'nincs tal�lat',
    'Open'                 => 'Megnyit�s',
    'OptionHelp'           => 'Be�ll�t�si seg�ts�g',
    'OptionRestartWarning' => 'Ez a be�ll�t�s nem jut teljesen �rv�nyre\nam�g a rendszer fut. Ha megtett�l minden\nbe�ll�t�st, ind�tsd �jra a ZoneMinder szolg�ltat�st.',
    'Options'              => 'Be�ll�t�sok',
    'OrEnterNewName'       => 'vagy adj meg �j nevet',
    'Order'                => 'Sorrend',
    'Orientation'          => 'Orient�ci�',
    'Out'                  => 'Kifel�',
    'OverwriteExisting'    => 'Megl�v� fel�l�r�sa',
    'Paged'                => 'Lapozva',
    'Pan'                  => 'Jobb-bal mozg�s',
    'PanLeft'              => 'Mozg�s balra',
    'PanRight'             => 'Mozg�s jobbra',
    'PanTilt'              => 'Mozgat',
    'Parameter'            => 'Param�ter',
    'Password'             => 'Jelsz�',
    'PasswordsDifferent'   => 'Az �j �s a meger�s�tett jelsz� k�l�nb�zik!',
    'Paths'                => '�tvonalak',
    'Pause'                => 'Sz�net',
    'Phone'                => 'Telefonon bet�rcs�zva',
    'PhoneBW'              => 'Bet�rcs�z�<br>s�vsz.',
    'PixelDiff'            => 'K�ppont elt�r�s',
    'Pixels'               => 'k�ppont',
    'Play'                 => 'Lej�tsz�s',
    'PlayAll'              => 'Mind lej�tsz�sa',
    'PleaseWait'           => 'K�rlek v�rj...',
    'Point'                => 'Pont',
    'PostEventImageBuffer' => 'Esem�ny ut�ni k�ppuffer',
    'PreEventImageBuffer'  => 'Esem�ny el�tti k�ppuffer',
    'PreserveAspect'       => 'K�par�ny megtart�sa',
    'Preset'               => 'El�re be�ll�tott profil',
    'Presets'              => 'El�re be�ll�tott profilok',
    'Prev'                 => 'El�z�',
    'Probe'                => '�rz�kel�s',
    'Protocol'             => 'Protocol',
    'Rate'                 => 'FPS',
    'Real'                 => 'Val�s',
    'Record'               => 'Felv�tel',
    'RefImageBlendPct'     => 'V�ltoz�s a referenciak�pt�l %-ban',
    'Refresh'              => 'Friss�t',
    'Remote'               => 'H�l�zati',
    'RemoteHostName'       => 'H�l�zati IP c�m/hosztn�v',
    'RemoteHostPath'       => 'A k�p el�r�si �tvonala',
    'RemoteHostPort'       => 'H�l�zati portsz�m',
    'RemoteHostSubPath'    => 'A k�p el�r�si al-�tvonala',
    'RemoteImageColours'   => 'A k�p sz�ne',
    'RemoteMethod'         => 'H�l�zati met�dus',
    'RemoteProtocol'       => 'H�l�zati protokoll',
    'Rename'               => '�tnevez�s',
    'Replay'               => 'Visszaj�tsz�s',
    'ReplayAll'            => 'Minden esem�nyt',
    'ReplayGapless'        => 'Folyamatos esem�nyeket',
    'ReplaySingle'         => 'Egy�ni esem�ny',
    'Reset'                => 'Alap�rt�kre �ll�t',
    'ResetEventCounts'     => 'Esem�ny sz�ml�l� null�z�sa',
    'Restart'              => 'A szolg�ltat�s �jraind�t�sa',
    'Restarting'           => '�jraind�t�s',
    'RestrictedCameraIds'  => 'Korl�tozott kamer�k azonos�t�i',
    'RestrictedMonitors'   => 'Korl�tozott kamer�k',
    'ReturnDelay'          => 'Vissza�rkez�s k�sleltet�se',
    'ReturnLocation'       => 'Vissza�rkez�s helye',
    'Rewind'               => 'Visszateker�s',
    'RotateLeft'           => 'Balra forgat�s',
    'RotateRight'          => 'Jobbra forgat�s',
    'RunMode'              => 'Fut�si m�d',
    'RunState'             => 'A ZoneMinder �llapota',
    'Running'              => '�les',
    'Save'                 => 'Ment�s',
    'SaveAs'               => 'Ment�s mint',
    'SaveFilter'           => 'Sz�r� ment�se',
    'Scale'                => 'M�ret',
    'Score'                => 'Pontsz�m',
    'Secs'                 => 'mp.',
    'Sectionlength'        => 'R�sz hossz',
    'Select'               => 'Kiv�laszt�s',
    'SelectMonitors'       => 'Monitorok kiv�laszt�sa',
    'SelfIntersecting'     => 'A soksz�g sz�lei nem keresztez�dhetnek',
    'Set'                  => 'Be�ll�t',
    'SetNewBandwidth'      => '�j s�vsz�less�g be�ll�t�s',
    'SetPreset'            => 'Alap�rtelmezett be�ll�t�sa',
    'Settings'             => 'Be�ll�t�sok',
    'ShowFilterWindow'     => 'Sz�r�ablak megjelen�t�s',
    'ShowTimeline'         => 'Id�vonal megjelen�t�s',
    'SignalCheckColour'    => 'Sz�n a jel kimarad�sakor',
    'Size'                 => 'F�jlm�ret',
    'SkinDescription'      => 'Change the default skin for this computer', // Added - 2011-01-30
    'Sleep'                => 'Alv�s',
    'SortAsc'              => 'N�vekv�',
    'SortBy'               => 'Sorbarendez�s:',
    'SortDesc'             => 'Cs�kken�',
    'Source'               => 'Forr�s',
    'SourceColours'        => 'A k�p sz�ne',
    'SourcePath'           => 'A k�p el�r�si �tvonala',
    'SourceType'           => 'K�p-forr�s t�pusa',
    'Speed'                => 'Sebess�g',
    'SpeedHigh'            => 'Nagy sebss�g',
    'SpeedLow'             => 'Alacsony sebess�g',
    'SpeedMedium'          => 'K�zepes sebess�g',
    'SpeedTurbo'           => 'Turb� sebess�g',
    'Start'                => 'Ind�t',
    'State'                => '�llapot',
    'Stats'                => 'Statisztik�k',
    'Status'               => 'St�tusz',
    'Step'                 => 'Ugr�s',
    'StepBack'             => 'Visszal�p�s',
    'StepForward'          => 'El�rel�p�s',
    'StepLarge'            => 'Nagy ugr�s',
    'StepMedium'           => 'K�zepes ugr�s',
    'StepNone'             => 'Nincs ugr�s',
    'StepSmall'            => 'Kis ugr�s',
    'Stills'               => '�ll�k�pek',
    'Stop'                 => 'A szolg�ltat�s le�ll�t�sa',
    'Stopped'              => 'Le�ll�tva',
    'Stream'               => '�l� folyam',
    'StreamReplayBuffer'   => 'Folyam visszaj�tsz� k�ppuffer',
    'Submit'               => 'Elk�ld',
    'System'               => 'Rendszer',
    'Tele'                 => 'T�v',
    'Thumbnail'            => 'El�n�zet',
    'Tilt'                 => 'Fel-le mozg�s',
    'Time'                 => 'Id�pont',
    'TimeDelta'            => 'Id� v�ltoz�s',
    'TimeStamp'            => 'Id�b�lyeg',
    'Timeline'             => 'Id�vonal',
    'Timestamp'            => 'Id�b�lyeg',
    'TimestampLabelFormat' => 'Id�b�lyeg form�tum',
    'TimestampLabelX'      => 'Elhelyez�s X pozici�',
    'TimestampLabelY'      => 'Elhelyez�s Y pozici�',
    'Today'                => 'Ma',
    'Tools'                => 'Eszk�z�k',
    'TotalBrScore'         => '�ssz.<br/>pontsz�m',
    'TrackDelay'           => 'K�sleltet�s k�vet�se',
    'TrackMotion'          => 'Mozg�s k�vet�se',
    'Triggers'             => 'El�id�z�k',
    'TurboPanSpeed'        => 'Turb� jobb-bal sebess�g',
    'TurboTiltSpeed'       => 'Turbo fel-le sebess�g',
    'Type'                 => 'T�pus',
    'Unarchive'            => 'Arch�vumb�l ki',
    'Undefined'            => 'Nincs megadva',
    'Units'                => 'Egys�g',
    'Unknown'              => 'Ismeretlen',
    'Update'               => 'Friss�t�s',
    'UpdateAvailable'      => 'El�rhet� ZoneMinder friss�t�s.',
    'UpdateNotNecessary'   => 'Nem sz�ks�ges a friss�t�s.',
    'UseFilter'            => 'Sz�r�t haszn�l',
    'UseFilterExprsPost'   => '&nbsp;sz�r�&nbsp;kifejez�s haszn�lata', // This is used at the end of the phrase 'use N filter expressions'
    'UseFilterExprsPre'    => '&nbsp;', // This is used at the beginning of the phrase 'use N filter expressions'
    'User'                 => 'Felhaszn�l�',
    'Username'             => 'Felhaszn�l�n�v',
    'Users'                => 'Felhaszn�l�k',
    'Value'                => '�rt�k',
    'Version'              => 'Verzi�',
    'VersionIgnore'        => 'Ennek a verzi�nak a figyelmen k�v�l hagy�sa',
    'VersionRemindDay'     => '1 nap m�lva eml�keztess',
    'VersionRemindHour'    => '1 �ra m�lva eml�keztess',
    'VersionRemindNever'   => 'Ne eml�keztess az �j verzi�r�l',
    'VersionRemindWeek'    => '1 h�t m�lva eml�keztess',
    'Video'                => 'Vide�',
    'VideoFormat'          => 'Vide� form�tum',
    'VideoGenFailed'       => 'Hiba a vide� k�sz�t�sekor!',
    'VideoGenFiles'        => 'L�tez� vide�k',
    'VideoGenNoFiles'      => 'Nem tal�lhat�k vide�k',
    'VideoGenParms'        => 'Vide� k�sz�t�si param�terek',
    'VideoGenSucceeded'    => 'A vide� elk�sz�lt!',
    'VideoSize'            => 'K�p m�rete',
    'View'                 => 'Megtekint',
    'ViewAll'              => 'Az �sszes list�z�sa',
    'ViewEvent'            => 'Esem�nyek n�zet',
    'ViewPaged'            => 'Oldal n�zet',
    'Wake'                 => '�breszt',
    'WarmupFrames'         => 'Bemeleg�t� k�pkock�k',
    'Watch'                => 'Figyel',
    'Web'                  => 'Web',
    'WebColour'            => 'Sz�n az id�vonal ablakban',
    'Week'                 => 'H�ten',
    'White'                => 'Feh�r',
    'WhiteBalance'         => 'Feh�r egyens�ly',
    'Wide'                 => 'Sz�les',
    'X'                    => 'X',
    'X10'                  => 'X10',
    'X10ActivationString'  => 'X10 �les�t� karaktersor',
    'X10InputAlarmString'  => 'X10 bemeneti riad� karaktersor',
    'X10OutputAlarmString' => 'X10 kimeneti riad� karaktersor',
    'Y'                    => 'Y',
    'Yes'                  => 'Igen',
    'YouNoPerms'           => 'Nincs jogod az er�forr�s el�r�s�hez.',
    'Zone'                 => 'Z�na:',
    'ZoneAlarmColour'      => 'Riad� sz�nez�s (R/G/B)',
    'ZoneArea'             => 'Z�na lefedetts�ge',
    'ZoneFilterSize'       => 'Sz�rt sz�less�g/magass�g<br>(k�ppont)',
    'ZoneMinMaxAlarmArea'  => 'Min/Max riad� ter�let',
    'ZoneMinMaxBlobArea'   => 'Min/Max Blob ter�let',
    'ZoneMinMaxBlobs'      => 'Min/Max Blobok',
    'ZoneMinMaxFiltArea'   => 'Min/Max sz�rt ter�let',
    'ZoneMinMaxPixelThres' => 'Min/Max k�ppont elt�r�si<br>k�sz�b (0-255)',
    'ZoneOverloadFrames'   => 'T�lterhel�s eset�n<br>ennyi k�pkocka hagyhat� ki',
    'Zones'                => 'Z�n�k',
    'Zoom'                 => 'Zoom',
    'ZoomIn'               => 'Zoom be',
    'ZoomOut'              => 'Zoom ki',
);

// Complex replacements with formatting and/or placements, must be passed through sprintf
$CLANG = array(
    'CurrentLogin'         => 'Jelenleg bel�pve mint \'%1$s\'',
    'EventCount'           => '%1$s %2$s', // For example '37 Events' (from Vlang below)
    'LastEvents'           => 'Utols� %1$s %2$s', // For example 'Last 37 Events' (from Vlang below)
    'LatestRelease'        => 'Az utols� kiad�s v%1$s, ami neked van v%2$s.',
    'MonitorCount'         => '%1$s %2$s', // For example '4 Monitors' (from Vlang below)
    'MonitorFunction'      => 'Megfigyel�s funkci�: %1$s',
    'RunningRecentVer'     => 'A legfrissebb ZoneMinder verzi�t haszn�lod, v%s.',
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
    'Event'                => array( 0=>'Esem�ny', 1=>'Esem�ny', 2=>'Esem�ny' ),
    'Monitor'              => array( 0=>'Monitor', 1=>'Monitor', 2=>'Monitor' ),
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
