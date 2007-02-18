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

if (($_SESSION[user_level] == "loggedin") && $_POST[name] && $_POST[url] && $_POST[antwort01] && $_POST[antwort02] && $_POST[antwort03] && $_POST[antwort04] && $_POST[antwort05] && $_POST[antwort06] && $_POST[antwort07] && $_POST[antwort08] && $_POST[antwort09] && $_POST[antwort10] && $_POST[antwort11] && $_POST[antwort12] && $_POST[antwort13])
{
	$datum = time();
	$seitenlink = preg_replace("/\\W/", "", strtolower(str_replace( " ", "", $_POST[name])));
	$_POST[antwort01] = strip_tags($_POST[antwort01]);
	$_POST[antwort02] = strip_tags($_POST[antwort02]);
	$_POST[antwort03] = strip_tags($_POST[antwort03]);
	$_POST[antwort04] = strip_tags($_POST[antwort04]);
	$_POST[antwort05] = strip_tags($_POST[antwort05]);
	$_POST[antwort06] = strip_tags($_POST[antwort06]);
	$_POST[antwort07] = strip_tags($_POST[antwort07]);
	$_POST[antwort08] = strip_tags($_POST[antwort08]);
	$_POST[antwort09] = strip_tags($_POST[antwort09]);
	$_POST[antwort10] = strip_tags($_POST[antwort10]);
	$_POST[antwort11] = strip_tags($_POST[antwort11]);
	$_POST[antwort12] = strip_tags($_POST[antwort12]);
	$_POST[antwort13] = strip_tags($_POST[antwort13]);

    $_POST[name] = savesql($_POST[name]);
    $_POST[url] = savesql($_POST[url]);
    $_POST[spiel] = savesql($_POST[spiel]);
    $_POST[antwort01] = savesql($_POST[antwort01]);
    $_POST[antwort02] = savesql($_POST[antwort02]);
    $_POST[antwort03] = savesql($_POST[antwort03]);
    $_POST[antwort04] = savesql($_POST[antwort04]);
    $_POST[antwort05] = savesql($_POST[antwort05]);
    $_POST[antwort06] = savesql($_POST[antwort06]);
    $_POST[antwort07] = savesql($_POST[antwort07]);
    $_POST[antwort08] = savesql($_POST[antwort08]);
    $_POST[antwort09] = savesql($_POST[antwort09]);
    $_POST[antwort10] = savesql($_POST[antwort10]);
    $_POST[antwort11] = savesql($_POST[antwort11]);
    $_POST[antwort12] = savesql($_POST[antwort12]);
    $_POST[antwort13] = savesql($_POST[antwort13]);
	settype($_POST[posterid], 'integer');

	$index = mysql_query("SELECT persisinterview_name FROM fsplus_persisinterview WHERE persisinterview_name = '$_POST[name]'");
    if (mysql_num_rows($index) == 0)
	{

    mysql_query("INSERT INTO fsplus_persisinterview (persisinterview_name,
													 persisinterview_url,
													 persisinterview_spiel,
													 persisinterview_antwort01,
													 persisinterview_antwort02,
													 persisinterview_antwort03,
													 persisinterview_antwort04,
													 persisinterview_antwort05,
													 persisinterview_antwort06,
													 persisinterview_antwort07,
													 persisinterview_antwort08,
													 persisinterview_antwort09,
													 persisinterview_antwort10,
													 persisinterview_antwort11,
													 persisinterview_antwort12,
													 persisinterview_antwort13,
													 persisinterview_datum,
													 persisinterview_posterid,
													 persisinterview_link)
                 VALUES ('".$_POST[name]."',
                         '".$_POST[url]."',
                         '".$_POST[spiel]."',
                         '".$_POST[antwort01]."',
                         '".$_POST[antwort02]."',
                         '".$_POST[antwort03]."',
                         '".$_POST[antwort04]."',
                         '".$_POST[antwort05]."',
                         '".$_POST[antwort06]."',
                         '".$_POST[antwort07]."',
                         '".$_POST[antwort08]."',
                         '".$_POST[antwort09]."',
                         '".$_POST[antwort10]."',
                         '".$_POST[antwort11]."',
                         '".$_POST[antwort12]."',
                         '".$_POST[antwort13]."',
                         '".$datum."',
                         '".$_POST[posterid]."',
                         '".$seitenlink."');", $db);

	echo'
	<div align="center"><img src="images/design/headline_interviewhinzufueg.gif" width="300" height="40"></div>
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
							Vielen Dank für den Eintrag. Das Interview wurde gespeichert. Alle eingetragenen
							Details können in der Liste aufgerufen werden. Änderungen an diesem Eintrag können nur
							durch die Seitenadministration vorgenommen werden.
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

	$email_betreff = $phrases[newinterview] . " @ " . $global_config_arr[virtualhost];
	$header = "From: ".$phrases[newinterview]." @ ".$global_config_arr[virtualhost]."\n";
	$header .= "Reply-To: ".$phrases[newinterview]." @ ".$global_config_arr[virtualhost]."\n";
	$header .= "Bcc: \n";
	$header .= "X-Mailer: PHP/" . phpversion(). "\n";
	$header .= "X-Sender-IP: $REMOTE_ADDR\n";
	$header .= "Content-Type: text/html";

	switch ($_POST[spiel]){
	case 1:
		$inhalt = 'Bei Planet Neverwinter wurde ein neues Interview über die Persistente Welt <b>'.$_POST[name].'</b>
				   für das Spiel Neverwinter Nights erstellt. Du findest den Artikel unter folgendem Link:<br>
				   <a href="http://www.planetneverwinter.de/nwn/?go=persistentinterview2&pw='.$seitenlink.'">
				   http://www.planetneverwinter.de/nwn/?go=persistentinterview2&pw='.$seitenlink.'</a><br>
				   Bitte schreibe eine News dazu.<br><br>Vielen Dank';
		break;
	case 2:
		$inhalt = 'Bei Planet Neverwinter wurde eine neues Interview über die Persistente Welt <b>'.$_POST[name].'</b>
				   für das Spiel Neverwinter Nights 2 erstellt. Du findest den Artikel unter folgendem Link:<br>
				   <a href="http://www.planetneverwinter.de/nwn2/?go=persistentinterview3&pw='.$seitenlink.'">
				   http://www.planetneverwinter.de/nwn2/?go=persistentinterview3&pw='.$seitenlink.'</a><br>
				   Bitte schreibe eine News dazu.<br><br>Vielen Dank';
		break;
	}
	mail($global_config_arr[admin_mail], $email_betreff, $inhalt, $header);

	}
	else
    {
	echo'
	<div align="center"><img src="images/design/headlineinterview_hinzufueg.gif" width="300" height="40"></div>
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

elseif (($_SESSION[user_level] != "loggedin") && $_POST[name] && $_POST[url] && $_POST[antwort01] && $_POST[antwort02])
{
echo'
	<div align="center"><img src="images/design/headlineinterview_hinzufueg.gif" width="300" height="40"></div>
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
<div align="center"><img src="images/design/headline_interviewhinzufueg.gif" width="300" height="40"></div>
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
                    <form action="?go=persistentinterviewadd" enctype="multipart/form-data" method="post">
                        <input type="hidden" value="persistentinterviewadd" name="go">
                        <input type="hidden" value="'.session_id().'" name="PHPSESSID">
                        <input type="hidden" value="'.$_SESSION[user_id].'" name="posterid">
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
                                    Auf welchem Spiel baut euer Projekt auf?<span class="Stil1">*</span>
                                </td>
                                <td valign="top">
                                    <table width="100%">
										<tr>
											<td width="50%"><input type="radio" name="spiel" value="1"> Neverwinter Nights</td>
											<td width="50%"><input type="radio" name="spiel" value="2"> Neverwinter Nights 2</td>
										</tr>
									</table>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Wie lange gibt es schon euren Server oder wann geht er online und zu welchen Zeiten ist er
									erreichbar?<span class="Stil1">*</span>
                                </td>
                                <td valign="top">
                                    <textarea class="text" name="antwort01" rows="15" cols="40"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Braucht man eine Anmeldung oder Bewerbung, um auf eurem Server zu spielen und warum?
									<span class="Stil1">*</span>
                                </td>
                                <td valign="top">
                                    <textarea class="text" name="antwort02" rows="15" cols="40"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Welche Zielgruppe wollt ihr ansprechen und welche Vorraussetzungen muss der Spieler
									mitbringen? (z.B.: Altergruppe, Anfänger, Profis, Rollenspieler, Powergamer,
									Gelegenheits- und/oder Dauerspieler)<span class="Stil1">*</span>
                                </td>
                                <td valign="top">
                                    <textarea class="text" name="antwort03" rows="15" cols="40"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Welches Setting benutzt ihr und warum grade dieses? (z.B.: Forgotten Realms,
									Planescape, Eberron, Wheel of Time, Vampire, World of Warkraft, Das Schwarze Auge,
									Eigenes Setting)<span class="Stil1">*</span>
                                </td>
                                <td valign="top">
                                    <textarea class="text" name="antwort04" rows="15" cols="40"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Beschreibt in einigen Sätzen das Konzept eures Servers.<span class="Stil1">*</span>
                                </td>
                                <td valign="top">
                                    <textarea class="text" name="antwort05" rows="15" cols="40"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Welche besondere Features sind auf eurem Server zu finden. (z.B.: Handwerk,
									PvP-System)<span class="Stil1">*</span>
                                </td>
                                <td valign="top">
                                    <textarea class="text" name="antwort06" rows="15" cols="40"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Was sind für euch die drei wichtigsten Aspekte eine Persistenten Welt?<span class="Stil1">
									*</span>
                                </td>
                                <td valign="top">
                                    <textarea class="text" name="antwort07" rows="15" cols="40"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Gibt es schon Zukunftspläne für euren Server und wie sehen sie aus?<span class="Stil1">*</span>
                                </td>
                                <td valign="top">
                                    <textarea class="text" name="antwort08" rows="15" cols="40"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Wie ist euer Server entstanden?<span class="Stil1">*</span>
                                </td>
                                <td valign="top">
                                    <textarea class="text" name="antwort09" rows="15" cols="40"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Wie groß ist euer Staff und sucht ihr weitere bestimmte Mitarbeiter?<span class="Stil1">*</span>
                                </td>
                                <td valign="top">
                                    <textarea class="text" name="antwort10" rows="15" cols="40"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Was gefällt euch so besonders an Neverwinter Nights 1 oder 2?<span class="Stil1">*</span>
                                </td>
                                <td valign="top">
                                    <textarea class="text" name="antwort11" rows="15" cols="40"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Wie seht ihr NWN zum Vergleich von MMORPGs wie z.B: WoW, Everquest ect. Welche Vor- und
									Nachteile gibt es?<span class="Stil1">*</span>
                                </td>
                                <td valign="top">
                                    <textarea class="text" name="antwort12" rows="15" cols="40"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Was würdet ihr machen, wenn ihr bei den Obsidianentwicklern einen Wunsch frei hättet?
									<span class="Stil1">*</span>
                                </td>
                                <td valign="top">
                                    <textarea class="text" name="antwort13" rows="15" cols="40"></textarea>
                                </td>
                            </tr>
							<tr>
								<td valign="top" colspan="2">
									Denke bitte daran, dass das Interview nach dem Abschicken nicht mehr bearbeitet werden kann.<br>
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