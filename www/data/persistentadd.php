<?php
/*
    Frogsystem Persistent Worlds script
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

if (($_SESSION['user_level'] == 'loggedin') && $_POST['name'] && $_POST['url'] && $_POST['text'] && $_POST['spiel'])
{
	$datum = time();

	$seitenlink = preg_replace("/\\W/", '', strtolower(str_replace( ' ', '', $_POST['name'])));
	$_POST['text'] = strip_tags($_POST['text']);

    $_POST['name'] = savesql($_POST['name']);
    $_POST['url'] = savesql($_POST['url']);
    $_POST['text'] = savesql($_POST['text']);
    $_POST['spiel'] = savesql($_POST['spiel']);
    $_POST['setting'] = savesql($_POST['setting']);
    $_POST['genre'] = savesql($_POST['genre']);
    $_POST['termine'] = savesql($_POST['termine']);
    $_POST['dlsize'] = savesql($_POST['dlsize']);
    $_POST['dlsvu'] = savesql($_POST['dlsvu']);
    $_POST['dlhdu'] = savesql($_POST['dlhdu']);
    $_POST['dlcep'] = savesql($_POST['dlcep']);
    $_POST['dlmotb'] = savesql($_POST['dlmotb']);
    $_POST['anmeldung'] = savesql($_POST['anmeldung']);
    $_POST['handycap'] = savesql($_POST['handycap']);
    $_POST['dm'] = savesql($_POST['dm']);
    $_POST['maxzahl'] = savesql($_POST['maxzahl']);
    $_POST['maxlevel'] = savesql($_POST['maxlevel']);
    $_POST['expcap'] = savesql($_POST['expcap']);
    $_POST['fights'] = savesql($_POST['fights']);
    $_POST['traps'] = savesql($_POST['traps']);
    $_POST['items'] = savesql($_POST['items']);
    $_POST['pvp'] = savesql($_POST['pvp']);
    $_POST['interview'] = savesql($_POST['interview']);
	settype($_POST['posterid'], 'integer');

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
                 VALUES ('".$_POST['name']."',
                         '".$_POST['url']."',
                         '".$_POST['text']."',
                         '".$_POST['spiel']."',
                         '".$_POST['setting']."',
                         '".$_POST['genre']."',
                         '".$_POST['termine']."',
                         '".$_POST['dlsize']."',
                         '".$_POST['dlsvu']."',
                         '".$_POST['dlhdu']."',
                         '".$_POST['dlcep']."',
                         '".$_POST['dlmotb']."',
                         '".$_POST['anmeldung']."',
                         '".$_POST['handycap']."',
                         '".$_POST['dm']."',
                         '".$_POST['maxzahl']."',
                         '".$_POST['maxlevel']."',
                         '".$_POST['expcap']."',
                         '".$_POST['fights']."',
                         '".$_POST['traps']."',
                         '".$_POST['items']."',
                         '".$_POST['pvp']."',
                         '".$datum."',
                         '".$_POST['interview']."',
                         '".$_POST['posterid']."',
                         '".$seitenlink."');", $db);

	echo'
	<div align="center"><img src="images/design/headline_pwadd.gif" width="400" height="40"></div>
<p>
<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
    <td>
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        	<tr>
          		<td width="4" height="24"><img src="../images/design/news_head_l.gif" width="4" height="24"></td>
          		<td width="100%" height="24" style="background-image:url(../images/design/news_head_m.gif); height:24px"></td>
          		<td width="4" height="24"><img src="../images/design/news_head_r.gif" width="4" height="24"></td>
        	</tr>
      	</table>
	</td>
</tr>
<tr>
    <td style="background-image:url(../images/design/bg.gif); height:80px" valign="top" align="left">
      	<table width="100%" cellpadding="0" cellspacing="10" border="0">
        	<tr>
		  		<td>
					Vielen Dank für den Eintrag. Die persistente Welt wurde gespeichert. Alle eingetragenen
					Details können in der Liste aufgerufen werden. Änderungen an diesem Eintrag können nur
					durch dich oder die Seitenadministration vorgenommen werden.
				<td>
			</tr>
		</table>
	</td>
 </tr>
  <tr>
    <td>
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        	<tr>
          		<td width="13" height="13" align="left"><img src="../images/design/block_unten_l.gif" width="13" height="13"></td>
          		<td width="100%" style="background-image:url(../images/design/block_unten_m.gif); height:13px"></td>
          		<td width="13" height="13" align="right"><img src="../images/design/block_unten_r.gif" width="13" height="13"></td>
        	</tr>
      	</table>
    </td>
</tr>
</table>
	';

	$email_betreff = $phrases['newpersistentworld'] . ' @ ' . $global_config_arr['virtualhost'];
	$header = 'From: '.$phrases['newpersistentworld'].' @ '.$global_config_arr['virtualhost']."\n";
	$header .= 'Reply-To: '.$phrases['newpersistentworld'].' @ '.$global_config_arr['virtualhost']."\n";
	$header .= "Bcc: \n";
	$header .= 'X-Mailer: PHP/' . phpversion(). "\n";
	$header .= "X-Sender-IP: $REMOTE_ADDR\n";
	$header .= 'Content-Type: text/html';

	switch ($_POST['spiel']){
	case 1:
		$inhalt = 'Bei Planet Neverwinter wurde eine neue Persistente Welt namens <b>'.$_POST['name'].'</b>
				   für das Spiel Neverwinter Nights vorgestellt. Du findest den Artikel unter folgendem Link:<br>
				   <a href="http://www.planetneverwinter.de/nwn/?go=persistentdetail2&pw='.$seitenlink.'">
				   http://www.planetneverwinter.de/nwn/?go=persistentdetail2&pw='.$seitenlink.'</a><br>
				   Bitte schreibe eine News dazu.<br><br>Vielen Dank';
		break;
	case 2:
		$inhalt = 'Bei Planet Neverwinter wurde eine neue Persistente Welt namens <b>'.$_POST['name'].'</b>
				   für das Spiel Neverwinter Nights 2 vorgestellt. Du findest den Artikel unter folgendem Link:<br>
				   <a href="http://www.planetneverwinter.de/nwn2/?go=persistentdetail3&pw='.$seitenlink.'">
				   http://www.planetneverwinter.de/nwn2/?go=persistentdetail3&pw='.$seitenlink.'</a><br>
				   Bitte schreibe eine News dazu.<br><br>Vielen Dank';
		break;
	}
	mail($global_config_arr['admin_mail'], $email_betreff, $inhalt, $header);

	}
	else
    {
	echo'
	<div align="center"><img src="images/design/headline_pwadd.gif" width="400" height="40"></div>
<p>
<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
    <td>
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        	<tr>
          		<td width="4" height="24"><img src="../images/design/news_head_l.gif" width="4" height="24"></td>
          		<td width="100%" height="24" style="background-image:url(../images/design/news_head_m.gif); height:24px"></td>
          		<td width="4" height="24"><img src="../images/design/news_head_r.gif" width="4" height="24"></td>
        	</tr>
      	</table>
	</td>
</tr>
<tr>
    <td style="background-image:url(../images/design/bg.gif); height:80px" valign="top" align="left">
      	<table width="100%" cellpadding="0" cellspacing="10" border="0">
        	<tr>
		  		<td>
					Dieser Eintrag existiert bereits.
				<td>
			</tr>
		</table>
	</td>
 </tr>
  <tr>
    <td>
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        	<tr>
          		<td width="13" height="13" align="left"><img src="../images/design/block_unten_l.gif" width="13" height="13"></td>
          		<td width="100%" style="background-image:url(../images/design/block_unten_m.gif); height:13px"></td>
          		<td width="13" height="13" align="right"><img src="../images/design/block_unten_r.gif" width="13" height="13"></td>
        	</tr>
      	</table>
    </td>
</tr>
</table>
	';
    }
}

elseif (($_SESSION['user_level'] != 'loggedin') && $_POST['name'] && $_POST['url'] && $_POST['text'] && $_POST['spiel'])
{
echo'
	<div align="center"><img src="images/design/headline_pwadd.gif" width="400" height="40"></div>
<p>
<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
    <td>
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        	<tr>
          		<td width="4" height="24"><img src="../images/design/news_head_l.gif" width="4" height="24"></td>
          		<td width="100%" height="24" style="background-image:url(../images/design/news_head_m.gif); height:24px"></td>
          		<td width="4" height="24"><img src="../images/design/news_head_r.gif" width="4" height="24"></td>
        	</tr>
      	</table>
	</td>
</tr>
<tr>
    <td style="background-image:url(../images/design/bg.gif); height:80px" valign="top" align="left">
      	<table width="100%" cellpadding="0" cellspacing="10" border="0">
        	<tr>
		  		<td>
					Du bist nicht eingeloggt. Bitte logg dich ein oder registriere dich.
				<td>
			</tr>
		</table>
	</td>
 </tr>
  <tr>
    <td>
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        	<tr>
          		<td width="13" height="13" align="left"><img src="../images/design/block_unten_l.gif" width="13" height="13"></td>
          		<td width="100%" style="background-image:url(../images/design/block_unten_m.gif); height:13px"></td>
          		<td width="13" height="13" align="right"><img src="../images/design/block_unten_r.gif" width="13" height="13"></td>
        	</tr>
      	</table>
    </td>
</tr>
</table>
	';
}

///////////////////////////////////////
///// Persistente Welten Formular /////
///////////////////////////////////////

else
{
    echo'
<style type="text/css">
<!--
.Stil1 {color: #FF0000}
-->
</style>
<div align="center"><img src="images/design/headline_pwadd.gif" width="400" height="40"></div>
<p>
<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
    <td>
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        	<tr>
          		<td width="4" height="24"><img src="../images/design/news_head_l.gif" width="4" height="24"></td>
          		<td width="100%" height="24" style="background-image:url(../images/design/news_head_m.gif); height:24px"></td>
          		<td width="4" height="24"><img src="../images/design/news_head_r.gif" width="4" height="24"></td>
        	</tr>
      	</table>
	</td>
</tr>
<tr>
    <td style="background-image:url(../images/design/bg.gif); height:80px" valign="top" align="left">
      	<table width="100%" cellpadding="0" cellspacing="10" border="0">
        	<tr>
		  		<td>
                    <form action="?go=persistentadd" enctype="multipart/form-data" method="post">
                        <input type="hidden" value="persistentadd" name="go">
                        <input type="hidden" value="'.session_id().'" name="PHPSESSID">
                        <input type="hidden" value="'.$_SESSION['user_id'].'" name="posterid">
                        <table border="0" cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td valign="top">
                                    Server-Name:<span class="Stil1">*</span><br>
                                    <font class="font-10">Name der persistenten Welt.</font>
                                </td>
                                <td valign="top">
                                    <input class="text" name="name" size="51" maxlength="150">
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    URL:<span class="Stil1">*</span><br>
                                    <font class="font-10">Link zur persistenten Welt.</font>
                                </td>
                                <td valign="top">
                                    <input class="text" name="url" value="http://" size="51" maxlength="255">
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Weltenbeschreibung:<span class="Stil1">*</span><br>
                                    <font class="font-10">Kurze Weltenbeschreibung. Was ist das Besondere
									an dieser Welt, was unterscheidet sie von anderen? Bei eigenem Setting
									bitte hier auch dessen Grundlagen kurz aufführen. Irgendwelche Handwerker-,
									Gilden-, Sterbesysteme etc.?<br>
									Bitte keine Romane.<br>
									Kein HTML erlaubt! Bitte <a href="?go=fs-code" target="_blank">FS-Code</a> benutzen.</font>
                                </td>
                                <td valign="top">
                                    <textarea class="text" name="text" rows="15" cols="40"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Für welches Spiel:<span class="Stil1">*</span><br>
                                    <font class="font-10">NwN oder NwN2.</font>
                                </td>
                                <td valign="top">
                                    <table width="100%">
										<tr>
											<td width="50%"><input type="radio" name="spiel" value="1"> NWN</td>
											<td width="50%"><input type="radio" name="spiel" value="2"> NWN 2</td>
										</tr>
									</table>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Setting:<span class="Stil1">*</span><br>
                                    <font class="font-10">In welches Setting ist die persistente Welt eingebettet?</font>
                                </td>
                                <td valign="top">
                                	<select name="setting" size="1">
		';
	$index = mysql_query('SELECT * FROM fsplus_persistent_setting ORDER BY setting_name', $db);
	while ($setting_arr = mysql_fetch_assoc($index))
	{
	echo'
                                        <option>'.$setting_arr['setting_name'].'</option>
        ';
	}
	echo'
									</select>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Genre:<span class="Stil1">*</span><br>
                                    <font class="font-10">In welches Spiel-Genre ist die Welt einzuordnen?</font>
                                </td>
                                <td valign="top">
                                	<select name="genre" size="1">
		';
	$index = mysql_query('SELECT * FROM fsplus_persistent_genre ORDER BY genre_name', $db);
	while ($genre_arr = mysql_fetch_assoc($index))
	{
	echo'
                                        <option>'.$genre_arr['genre_name'].'</option>
        ';
	}
	echo'
									</select>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    PvP:<br>
                                    <font class="font-10">Sind Kämpfe Player vs. Player möglich?</font>
                                </td>
                                <td valign="top">
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
                                <td valign="top">
                                    Online-Zeiten:<br>
                                    <font class="font-10">Wie oft ist der Server online?</font>
                                </td>
                                <td valign="top">
                                	<select name="termine" size="1">
										<option>ständig</option>
										<option>regelmäßig</option>
										<option>unregelmäßig</option>
										<option>k. A.</option>
									</select>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Downloads:<br>
                                    <font class="font-10">Größe der für den Server notwendigen Downloads. (HakPaks, Portraits, Musik, etc.)</font>
                                </td>
                                <td valign="top">
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
                                <td valign="top">
                                    Notwendige Erweiterungen:<br>
                                    <font class="font-10">Was werden für Erweiterungen benötigt?</font>
                                </td>
                                <td valign="top">
                                    <table width="100%">
										<tr>
											<td width="50%"><input type="checkbox" name="dloadsvu" value="Schatten von Undernzit"> SvU</td>
											<td width="50%"><input type="checkbox" name="dloadhdu" value="Horden des Unterreichs"> HdU</td>
										</tr>
										<tr>
											<td width="50%"><input type="checkbox" name="dloadcep" value="Community Expansion Pack"> CEP</td>
											<td width="50%"><input type="checkbox" name="dloadmotb" value="Mask of the Betrayer"> MotB</td>
										</tr>
									</table>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Anmeldung ab:<br>
                                    <font class="font-10">Ab welchem Level ist eine Charakter-Anmeldung erforderlich?</font>
                                </td>
                                <td valign="top">
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
                                <td valign="top">
                                    Einschränkungen:<br>
                                    <font class="font-10">Rassen, Klassen, Gesinnungen etc., die nicht möglich sind.</font>
                                </td>
                                <td valign="top">
                                    <textarea name="handycap" rows="3" cols="40"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Anzahl der Spielleiter:<br>
                                    <font class="font-10">Maximale Anzahl der die Spieler betreuenden Spielleiter.</font>
                                </td>
                                <td valign="top">
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
                                <td valign="top">
                                    Maximale Spieleranzahl:<br>
                                    <font class="font-10">Anzahl der maximalen gleichzeitig auf dem Server Spielenden.</font>
                                </td>
                                <td valign="top">
                                    <input class="text" name="maxzahl" size="4" maxlength="4">
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Höchstes erreichbares Level:<br>
                                    <font class="font-10">Welches maximale Level kann ein Spieler erreichen?</font>
                                </td>
                                <td valign="top">
                                    <input class="text" name="maxlevel" size="2" maxlength="50">
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Erfahrungspunkte- Begrenzung:<br>
                                    <font class="font-10">Gibt es eine Begrenzung der pro Woche (Tag, Monat...) zu bekommenden Erfahrungspunkte?</font>
                                </td>
                                <td valign="top">
                                	<select name="expcap" size="1">
										<option>ja</option>
										<option>nein</option>
										<option>speziell</option>
										<option>k. A.</option>
									</select>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Kämpfe:<br>
                                    <font class="font-10">Schwierigkeitsgrad der Kämpfe.</font>
                                </td>
                                <td valign="top">
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
                                <td valign="top">
                                    Fallen:<br>
                                    <font class="font-10">Schwierigkeitsgrad der Fallen.</font>
                                </td>
                                <td valign="top">
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
                                <td valign="top">
                                    Items:<br>
                                    <font class="font-10">Häufigkeit besonderer, hochwertiger oder magischer Items.</font>
                                </td>
                                <td valign="top">
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
								<td valign="top" colspan="2">
									<span class="Stil1">*</span>Pflichtfelder
								</td>
							</tr>
                            <tr>
                                <td align="center" colspan="2">
                                    <input class="button" type="submit" value="Hinzufügen">
                                </td>
                            </tr>
                        </table>
                    </form>
					</td>
				</tr>
			</table>
		</td>
 	</tr>
  	<tr>
    	<td>
      		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        		<tr>
          			<td width="13" height="13" align="left"><img src="../images/design/block_unten_l.gif" width="13" height="13"></td>
          			<td width="100%" style="background-image:url(../images/design/block_unten_m.gif); height:13px"></td>
          			<td width="13" height="13" align="right"><img src="../images/design/block_unten_r.gif" width="13" height="13"></td>
        		</tr>
      		</table>
    	</td>
  	</tr>
</table>
    ';
}
?>