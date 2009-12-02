<?php
//
// ZoneMinder web status view file, $Date$, $Revision$
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

if ( !canView( 'System' ) )
{
    $view = "error";
    return;
}

$zmuCommand = getZmuCommand( " --list" );
$result = exec( escapeshellcmd( $zmuCommand ), $output );

$refresh = ZM_WEB_REFRESH_STATUS;
$url = '?view='.$view;
noCacheHeaders();

xhtmlHeaders(__FILE__, $SLANG['Status'] );
?>
<body>
  <div id="page">
    <div id="header">
      <h2><?= $SLANG['Status'] ?></h2>
    </div>
    <div id="content">
      <table id="contentTable" class="major" cellspacing="0">
<?php
if ( $row = array_shift( $output ) )
{
?>
        <thead>
          <tr>
<?php
    foreach ( preg_split( "/\s+/", $row ) as $col )
    {
?>
            <th><?= $col ?></th>
<?php
    }
?>
          </tr>
        </thead>
<?php
}
?>
        <tbody>
<?php
foreach ( $output as $row )
{
?>
          <tr>
<?php
    foreach ( preg_split( "/\s+/", $row ) as $col )
    {
?>
            <td><?= $col ?></td>
<?php
    }
?>
          </tr>
<?php
}
?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
