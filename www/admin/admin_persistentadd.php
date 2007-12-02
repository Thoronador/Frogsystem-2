<?php
/*
    Frogsystem Persistent Worlds Scripts
    Copyright (C) 2005-2007  Stefan Bollmann

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
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

/////////////////////////////////////
//// Persistente Welt einstellen ////
/////////////////////////////////////

if ($_POST[name] && $_POST[url] && $_POST[text] && $_POST[spiel])
{
	$datum = mktime(0, 0, 0, $_POST[monat], $_POST[tag], $_POST[jahr]);

    $_POST[name] = savesql($_POST[name]);
    $_POST[url] = savesql($_POST[url]);
    $_POST[text] = savesql($_POST[text]);
    $_POST[spiel] = savesql($_POST[spiel]);
    $_POST[setting] = savesql($_POST[setting]);
    $_POST[genre] = savesql($_POST[genre]);
    $_POST[termine] = savesql($_POST[termine]);
    $_POST[dlsize] = savesql($_POST[dlsize]);
    $_POST[dlsvu] = savesql($_POST[dlsvu]);
    $_POST[dlhdu] = savesql($_POST[dlhdu]);
    $_POST[dlcep] = savesql($_POST[dlcep]);
    $_POST[dlmotb] = savesql($_POST[dlmotb]);
    $_POST[anmeldung] = savesql($_POST[anmeldung]);
    $_POST[handycap] = savesql($_POST[handycap]);
    $_POST[dm] = savesql($_POST[dm]);
    $_POST[maxzahl] = savesql($_POST[maxzahl]);
    $_POST[maxlevel] = savesql($_POST[maxlevel]);
    $_POST[expcap] = savesql($_POST[expcap]);
    $_POST[fights] = savesql($_POST[fights]);
    $_POST[traps] = savesql($_POST[traps]);
    $_POST[items] = savesql($_POST[items]);
    $_POST[pvp] = savesql($_POST[pvp]);
    $_POST[datum] = savesql($_POST[datum]);
    $_POST[interview] = savesql($_POST[interview]);
	settype($_POST[posterid], 'integer');
    $_POST[seitenlink] = savesql($_POST[seitenlink]);

	$index = mysql_query("SELECT persistent_name FROM fsplus_persistent WHERE persistent_name = '$_POST[name]'");
    if (mysql_num_rows($index) == 0)
	{
    mysql_query("INSERT INTO fsplus_persistent (persistent_name,
												persistent_url,
												persistent_text,
												persistent_spiel,
												persistent_setting,
												persistent_genre,
												persistent_termine,
												persistent_dlsize,
												persistent_dlsvu,
												persistent_dlhdu,
												persistent_dlcep,
												persistent_dlmotb,
												persistent_anmeldung,
												persistent_handycap,
												persistent_dm,
												persistent_maxzahl,
												persistent_maxlevel,
												persistent_expcap,
												persistent_fights,
												persistent_traps,
												persistent_items,
												persistent_pvp,
												persistent_datum,
												persistent_interview,
												persistent_posterid,
												persistent_link)
                 VALUES ('".$_POST[name]."',
                         '".$_POST[url]."',
                         '".$_POST[text]."',
                         '".$_POST[spiel]."',
                         '".$_POST[setting]."',
                         '".$_POST[genre]."',
                         '".$_POST[termine]."',
                         '".$_POST[dlsize]."',
                         '".$_POST[dlsvu]."',
                         '".$_POST[dlhdu]."',
                         '".$_POST[dlcep]."',
                         '".$_POST[dlmotb]."',
                         '".$_POST[anmeldung]."',
                         '".$_POST[handycap]."',
                         '".$_POST[dm]."',
                         '".$_POST[maxzahl]."',
                         '".$_POST[maxlevel]."',
                         '".$_POST[expcap]."',
                         '".$_POST[fights]."',
                         '".$_POST[traps]."',
                         '".$_POST[items]."',
                         '".$_POST[pvp]."',
                         '".$datum."',
                         '".$_POST[interview]."',
                         '".$_POST[posterid]."',
                         '".$_POST[seitenlink]."');", $db);
	echo mysql_error();

	systext("Persistente Welt wurde gespeichert.");
	}
	else
    {
        systext("Diese persistente Welt exitiert bereits.");
    }
}

///////////////////////////////////////
///// Persistente Welten Formular /////
///////////////////////////////////////

else
{
    echo'
                    <form action="'.$PHP_SELF.'" enctype="multipart/form-data" method="post">
                        <input type="hidden" value="persistentadd" name="go">
                        <input type="hidden" value="'.session_id().'" name="PHPSESSID">
                        <table border="0" cellpadding="4" cellspacing="0" width="600">
                            <tr>
                                <td class="config" valign="top">
                                    Welten-Name:<br>
                                    <font class="small">Name der persistenten Welt. Kommt auch in den Hotlink.</font>
                                </td>
                                <td class="config" valign="top">
                                    <input class="text" name="name" size="51" maxlength="150">
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    URL:<br>
                                    <font class="small">Link zur persistenten Welt.</font>
                                </td>
                                <td class="config" valign="top">
                                    <input class="text" name="url" size="51" maxlength="255" value="http://">
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Autor:<br>
                                    <font class="small">Eintrag erstellt von.</font>
                                </td>
                                <td class="config" valign="top">
                                    <input class="text" size="30" id="username" name="poster" maxlength="100" disabled>
                                    <input type="hidden" id="userid" name="posterid">
                                    <input onClick=\'open("admin_finduser.php","Poster","width=360,height=300,screenX=50,screenY=50,scrollbars=YES")\' class="button" type="button" value="Suchen">
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Weltenbeschreibung:<br>
                                    <font class="small">Kurze Weltenbeschreibung</font>
                                </td>
                                <td class="config" valign="top">
                                    <textarea class="text" name="text" rows="15" cols="51"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Für welches Spiel:<br>
                                    <font class="small">NWN oder NWN 2</font>
                                </td>
                                <td class="config" valign="top">
                                    <table width="100%">
										<tr>
											<td width="50%"><input type="radio" name="spiel" value="1"> NWN</td>
											<td width="50%"><input type="radio" name="spiel" value="2"> NWN 2</td>
										</tr>
									</table>
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Setting:<br>
                                    <font class="small">In welches Setting ist die persistente Welt eingebettet:</font>
                                </td>
                                <td class="config" valign="top">
                                	<select name="setting" size="1">
		';
	$index = mysql_query("SELECT * FROM fsplus_persistent_setting ORDER BY setting_name", $db);
	while ($setting_arr = mysql_fetch_assoc($index))
	{
	echo'
                                        <option>'.$setting_arr[setting_name].'</option>
        ';
	}
	echo'
									</select>
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Genre:<br>
                                    <font class="small">In welchem Spiel-Genre ist die Welt einzuordnen.</font>
                                </td>
                                <td class="config" valign="top">
                                	<select name="genre" size="1">
		';
	$index = mysql_query("SELECT * FROM fsplus_persistent_genre ORDER BY genre_name", $db);
	while ($genre_arr = mysql_fetch_assoc($index))
	{
	echo'
                                        <option>'.$genre_arr[genre_name].'</option>
        ';
	}
	echo'
									</select>
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    PvP:<br>
                                    <font class="small">Sind Kämpfe Player vs. Player möglich?</font>
                                </td>
                                <td class="config" valign="top">
                                	<select name="pvp" size="1">
										<option>ja</option>
										<option>nach Absprache</option>
										<option>nein</option>
										<option>speziell</option>
										<option>k.A.</option>
									</select>
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Online-Zeiten:<br>
                                    <font class="small">Wann bzw. wie oft ist der Server online.</font>
                                </td>
                                <td class="config" valign="top">
                                	<select name="termine" size="1">
										<option>ständig</option>
										<option>regelmäßig</option>
										<option>unregelmäßig</option>
										<option>k. A.</option>
									</select>
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Downloads:<br>
                                    <font class="small">Größe der für den Server notwendigen Downloads. (HakPaks, Portraits, Musik, etc.)</font>
                                </td>
                                <td class="config" valign="top">
                                    <table width="100%">
										<tr>
											<td width="50%"><input type="radio" name="dlsize" value="0 bis 25 MB"> 0 bis 25 MB</td>
											<td width="50%"><input type="radio" name="dlsize" value="26 bis 50 MB"> 26 bis 50 MB</td>
										</tr>
										<tr>
											<td width="50%"><input type="radio" name="dlsize" value="51 bis 100 MB"> 51 bis 100 MB</td>
											<td width="50%"><input type="radio" name="dlsize" value="100 bis 250 MB"> 100 bis 250 MB</td>
										</tr>
										<tr>
											<td width="50%"><input type="radio" name="dlsize" value="251 bis 500 MB"> 251 bis 500 MB</td>
											<td width="50%"><input type="radio" name="dlsize" value="mehr als 500 MB"> mehr als 500 MB</td>
										</tr>
									</table>
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Notwendige Erweiterungen:<br>
                                    <font class="small">Was wird an Programmen benötigt?</font>
                                </td>
                                <td class="config" valign="top">
                                    <table width="100%">
										<tr>
											<td width="50%"><input type="checkbox" name="dlsvu" value="Schatten von Undernzit"> SvU</td>
											<td width="50%"><input type="checkbox" name="dlhdu" value="Horden des Unterreichs"> HdU</td>
										</tr>
										<tr>
											<td width="50%"><input type="checkbox" name="dlcep" value="Community Expansion Pack"> CEP</td>
											<td width="50%"><input type="checkbox" name="dloadmotb" value="Mask of the Betrayer"> MotB</td>
										</tr>
									</table>
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Anmeldung ab:<br>
                                    <font class="small">Ab welchem Level ist eine Anmeldung erforderlich.</font>
                                </td>
                                <td class="config" valign="top">
                                	<select name="anmeldung" size="1">
										<option>von Anfang an</option>
										<option>Level 1</option>
										<option>Level 2</option>
										<option>Level 3</option>
										<option>Level 4</option>
										<option>Level 5</option>
										<option>&gt; Level 5</option>
										<option>speziell</option>
										<option>nie</option>
										<option>k. A.</option>
									</select>
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Einschränkungen:<br>
                                    <font class="small">Rassen, Klassen, Gesinnungen etc., die nicht möglich sind.</font>
                                </td>
                                <td class="config" valign="top">
                                    <textarea class="text" name="handycap" rows="3" cols="51"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Anzahl der Spielleiter:<br>
                                    <font class="small">Maximale Anzahl der die Spieler betreuenden Spielleiter.</font>
                                </td>
                                <td class="config" valign="top">
                                	<select name="dm" size="1">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>7</option>
										<option>8</option>
										<option>9</option>
										<option>10</option>
										<option>&gt; 10</option>
										<option>k. A.</option>
									</select>
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Maximale Spieleranzahl:<br>
                                    <font class="small">Anzahl der möglichen maximalen Spieleranzahl auf dem Server.</font>
                                </td>
                                <td class="config" valign="top">
                                    <input class="text" name="maxzahl" size="4" maxlength="4">
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Höchstes erreichbares Level:<br>
                                    <font class="small">Welches maximale Level kann ein Spieler erreichen?</font>
                                </td>
                                <td class="config" valign="top">
                                    <input class="text" name="maxlevel" size="2" maxlength="50">
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Erfahrungspunkte-Begrenzung:<br>
                                    <font class="small">Gibt es eine Begrenzung der zu bekommenden Erfahrungspunkte.</font>
                                </td>
                                <td class="config" valign="top">
                                	<select name="expcap" size="1">
										<option>ja</option>
										<option>nein</option>
										<option>speziell</option>
										<option>k. A.</option>
									</select>
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Kämpfe:<br>
                                    <font class="small">Schwierigkeitsgrad der Kämpfe.</font>
                                </td>
                                <td class="config" valign="top">
                                	<select name="fights" size="1">
										<option>keine</option>
										<option>leicht</option>
										<option>mittel</option>
										<option>schwer</option>
										<option>uneinheitlich</option>
										<option>k.A.</option>
									</select>
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Fallen:<br>
                                    <font class="small">Schwierigkeitsgrad der Fallen.</font>
                                </td>
                                <td class="config" valign="top">
                                	<select name="traps" size="1">
										<option>keine</option>
										<option>leicht</option>
										<option>mittel</option>
										<option>schwer</option>
										<option>uneinheitlich</option>
										<option>k.A.</option>
									</select>
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Items:<br>
                                    <font class="small">Häufigkeit besonderer/hochwertiger Items.</font>
                                </td>
                                <td class="config" valign="top">
                                	<select name="items" size="1">
										<option>keine</option>
										<option>selten</option>
										<option>normal</option>
										<option>oft</option>
										<option>uneinheitlich</option>
										<option>k.A.</option>
									</select>
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Datum:<br>
                                    <font class="small">Wann wurde diese persistente Welt eingetragen? (TT MM JJJJ)</font>
                                </td>
                                <td class="config" valign="top">
                                    <input class="text" size="2" name="tag" maxlength="2">
                                    <input class="text" size="2" name="monat" maxlength="2">
                                    <input class="text" size="4" name="jahr" maxlength="4">
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Interview:<br>
                                    <font class="small">Falls ein Interview von Planet Neverwinter mit den Serverbetreibern geführt wurde, bitte die Artikel-URL angeben.</font>
                                </td>
                                <td class="config" valign="top">
                                    <input class="text" name="interview" size="51" maxlength="150">
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Interner Link:<br>
                                    <font class="small">Link zum Profilblatt innerhalb von PNW. Wird an das ?go= angehangen.</font>
                                </td>
                                <td class="config" valign="top">
                                    <input class="text" name="seitenlink" size="51" maxlength="255">
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2">
                                    <input class="button" type="submit" value="Hinzufügen">
                                </td>
                            </tr>
                        </table>
                    </form>
    ';
}
?>