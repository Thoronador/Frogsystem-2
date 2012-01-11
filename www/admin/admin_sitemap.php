<?php
/*
    This file is part of the Frogsystem Sitemap.
    Copyright (C) 2012  Thoronador

    The Frogsystem Sitemap is free software: you can redistribute it
    and/or modify it under the terms of the GNU General Public License as
    published by the Free Software Foundation, either version 3 of the License,
    or (at your option) any later version.

    The Frogsystem Sitemap is distributed in the hope that it will be
    useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
    
    Additional permission under GNU GPL version 3 section 7

    If you modify this Program, or any covered work, by linking or combining it
    with Frogsystem 2 (or a modified version of Frogsystem 2), containing parts
    covered by the terms of Creative Commons Attribution-ShareAlike 3.0, the
    licensors of this Program grant you additional permission to convey the
    resulting work. Corresponding Source for a non-source form of such a
    combination shall include the source code for the parts of Frogsystem used
    as well as that of the covered work.
*/


// TODO: - current design/layout is terrible, change it (but keep it simple
//         and straightforward)
//       - localization needed

  require_once(FS2_ROOT_PATH . "includes/sitemap.php");

  //path to sitemap (maybe make that adjustable later on)
  $sitemap_location = FS2_ROOT_PATH.'sitemap.xml';
  //status
  $has_sitemap = file_exists($sitemap_location);


  echo '
  <table class="configtable" cellpadding="4" cellspacing="0">
    <tr>
      <td class="line">Sitemap</td>
    </tr>';

  if (isset($_GET['action']))
  {
    if ($_GET['action']=='update')
    { 
      //copy old sitemap (just in case)
      $copy_success = true;
      if ($has_sitemap)
      {
        if (!copy($sitemap_location, $sitemap_location.'.old'))
        {
          echo '    <tr><td class="config"><strong>Fehler</strong> beim Sichern der alten Sitemap.</td></tr>'."\n";
          $copy_success = false;
        }
      }
      if ($copy_success)
      {
        //get new sitemap
        $sitemap_content = sitemapXML();
        //write content to sitemap file
        $res = fopen($sitemap_location, 'wb');
        if ($res===false)
        {
          echo '    <tr><td class="config"><strong>Fehler</strong> beim Versuch, die Sitemapdatei zu &ouml;ffnen!</td></tr>'."\n";
        }
        else
        {
          //write contents to file
          $status = fwrite($res, $sitemap_content);
          if ($status===false)
          {
            echo '    <tr><td class="config"><strong>Fehler</strong> beim Versuch, die Sitemapdatei zu schreiben!</td></tr>'."\n";
          }
          else
          {
            echo '    <tr><td class="config"><strong>Sitemap aktualisiert</strong>, '.$status.' Bytes geschrieben!</td></tr>'."\n";
          }
          fclose($res);
          clearstatcache(); //we need that, because otherwise PHP would use the cached value for file_exists() in the next line
          $has_sitemap = file_exists($sitemap_location);
        }
      }
    }
    else
    {
      echo '    <tr><td class="config"><strong>Ung&uuml;tige Aktion!</strong></td></tr>'."\n";
    }
  }//if

  if ($has_sitemap)
  {
    echo '    <tr><td class="config">Sitemap vorhanden.</td></tr>'."\n";
    //get time of last modification
    $modified = filemtime($sitemap_location);
    if ($modified===false)
    {
      $modified = 'unbekannt';
    }
    else
    {
      $modified = date('d.m.Y, H:i:s', $modified);
    }
    echo '    <tr><td class="config">Letzte Aktualisierung: '.$modified.'</td></tr>'."\n";
  }
  else
  {
    echo '    <tr><td class="config"><strong>Keine</strong> Sitemap vorhanden.</td></tr>'."\n";
  }
  echo '    <tr>'."\n"
      .'      <td class="config" style="height: 20px;"> &nbsp; </td>'."\n"
      .'    </tr>'."\n";
  //update?
  echo '    <tr>'."\n"
      .'      <td class="config">'."\n"
      .'        <a href="?go=sitemap&amp;action=update">Sitemap ';
  if ($has_sitemap)
  {
    echo 'aktualisieren';
  }
  else
  {
    echo 'erstellen';
  }
  echo '</a>'."\n"
      .'      </td>'."\n"
      .'    </tr>'."\n"
      .'  </table>';
?>
