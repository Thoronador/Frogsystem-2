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

$index = mysql_query("select * from fsplus_persistent where persistent_link = '$pw'", $db);
$persistent_arr = mysql_fetch_assoc($index);

/////   NEU ANFANG   /////

	// Kommentare
	$pw_arr['comment_url'] = "?go=pwcomments&amp;pw=$pw";

	// Kommentare lesen
    $index_pwcomms = mysql_query("select persistent_comment_id from fsplus_persistent_comments where persistent_link = '$persistent_arr[persistent_link]'", $db);
	$pw_arr['kommentare'] = mysql_num_rows($index_pwcomms);

	// User auslesen
    $index2 = mysql_query("select user_name from fs_user where user_id = $persistent_arr[persistent_posterid]", $db);
    $news_arr['user_name'] = mysql_result($index2, 0, 'user_name');
    $news_arr['user_url'] = "?go=profil&amp;userid=$persistent_arr[persistent_posterid]";

/////   NEU ENDE   /////


    $persistent_arr['persistent_text'] = fscode($persistent_arr['persistent_text'], 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1);
	$persistent_arr['persistent_handycap'] = fscode($persistent_arr['persistent_handycap'], 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1);

	switch ($persistent_arr['persistent_spiel'])
	{
		case 1:
		$persistent_arr['persistent_spiel'] = 'NwN';
		break;
		case 2:
		$persistent_arr['persistent_spiel'] = 'NwN 2';
		break;
	}

    $index2 = mysql_query("select template_code from fs_template where template_name = 'persistent_detail_body'", $db);
    $persistent = stripslashes(mysql_result($index2, 0, 'template_code'));
    $persistent = str_replace('{name}', $persistent_arr['persistent_name'], $persistent);
    $persistent = str_replace('{url}', $persistent_arr['persistent_url'], $persistent);
    $persistent = str_replace('{text}', $persistent_arr['persistent_text'], $persistent);
    $persistent = str_replace('{spiel}', $persistent_arr['persistent_spiel'], $persistent);
    $persistent = str_replace('{setting}', $persistent_arr['persistent_setting'], $persistent);
    $persistent = str_replace('{genre}', $persistent_arr['persistent_genre'], $persistent);
    $persistent = str_replace('{pvp}', $persistent_arr['persistent_pvp'], $persistent);
    $persistent = str_replace('{termine}', $persistent_arr['persistent_termine'], $persistent);
    $persistent = str_replace('{dlsize}', $persistent_arr['persistent_dlsize'], $persistent);
    $persistent = str_replace('{dlsvu}', $persistent_arr['persistent_dlsvu'], $persistent);
    $persistent = str_replace('{dlhdu}', $persistent_arr['persistent_dlhdu'], $persistent);
    $persistent = str_replace('{dlcep}', $persistent_arr['persistent_dlcep'], $persistent);
    $persistent = str_replace('{anmeldung}', $persistent_arr['persistent_anmeldung'], $persistent);
    $persistent = str_replace('{handycap}', $persistent_arr['persistent_handycap'], $persistent);
    $persistent = str_replace('{dungeonmaster}', $persistent_arr['persistent_dm'], $persistent);
    $persistent = str_replace('{maxplayer}', $persistent_arr['persistent_maxzahl'], $persistent);
    $persistent = str_replace('{maxlevel}', $persistent_arr['persistent_maxlevel'], $persistent);
    $persistent = str_replace('{expcap}', $persistent_arr['persistent_expcap'], $persistent);
    $persistent = str_replace('{fights}', $persistent_arr['persistent_fights'], $persistent);
    $persistent = str_replace('{traps}', $persistent_arr['persistent_traps'], $persistent);
    $persistent = str_replace('{items}', $persistent_arr['persistent_items'], $persistent);
	if ($persistent_arr['persistent_interview'] != NULL)
    	$persistent = str_replace('{interview}', '<a href='.$persistent_arr['persistent_interview'].'>zum Interview</a>', $persistent);
	else
		$persistent = str_replace('{interview}', '', $persistent);
    $persistent = str_replace('{link}', $persistent_arr['persistent_link'], $persistent);
    $persistent = str_replace('{kommentar_url}', $pw_arr['comment_url'], $persistent);
    $persistent = str_replace('{kommentar_anzahl}', $pw_arr['kommentare'], $persistent);
    $persistent = str_replace('{autor}', $news_arr['user_name'], $persistent);
    $persistent = str_replace('{autor_profilurl}', $news_arr['user_url'], $persistent);

    $persistent_list .= $persistent;

$pwid = $persistent_arr['persistent_id'];
unset($persistent_arr);

echo $persistent;

?>
<br><br>