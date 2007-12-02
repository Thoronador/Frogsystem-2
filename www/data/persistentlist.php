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

switch ($sort)
{
	case 'setting':
	$orderrule = 'persistent_setting';
	break;
	case 'genre':
	$orderrule = 'persistent_genre';
	break;
	case 'spiel':
	$orderrule = 'persistent_spiel';
	break;
	case 'anmeldung':
	$orderrule = 'persistent_anmeldung';
	break;
	case 'spieler':
	$orderrule = 'persistent_maxzahl';
	break;
	case 'level':
	$orderrule = 'persistent_maxlevel';
	break;
	default:
	$orderrule = 'persistent_name';
	break;
}
$index = mysql_query("select * from fsplus_persistent order by $orderrule", $db);
while ($persistent_arr = mysql_fetch_assoc($index))
{
    $persistent_arr['persistent_text'] = fscode($persistent_arr['persistent_text'], 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

	switch ($persistent_arr['persistent_spiel'])
	{
		case 1:
		$persistent_arr['persistent_spiel'] = 'NwN';
		break;
		case 2:
		$persistent_arr['persistent_spiel'] = 'NwN 2';
		break;
	}
/*
	echo'
		<form action="'.$PHP_SELF.'" enctype="multipart/form-data" method="post">
        	<input type="hidden" value="'.$persistent_arr[persistent_link].'" name="go">
		</form>
		';
*/
    $index2 = mysql_query("select template_code from fs_template where template_name = 'persistent_eintrag'", $db);
    $persistent = stripslashes(mysql_result($index2, 0, 'template_code'));
    $persistent = str_replace('{link}', $persistent_arr['persistent_link'], $persistent);
    $persistent = str_replace('{name}', $persistent_arr['persistent_name'], $persistent);
    $persistent = str_replace('{setting}', $persistent_arr['persistent_setting'], $persistent);
    $persistent = str_replace('{genre}', $persistent_arr['persistent_genre'], $persistent);
    $persistent = str_replace('{spiel}', $persistent_arr['persistent_spiel'], $persistent);
    $persistent = str_replace('{dlsvu}', $persistent_arr['persistent_dlsvu'], $persistent);
    $persistent = str_replace('{dlhdu}', $persistent_arr['persistent_dlhdu'], $persistent);
    $persistent = str_replace('{dlcep}', $persistent_arr['persistent_dlcep'], $persistent);
    $persistent = str_replace('{anmeldung}', $persistent_arr['persistent_anmeldung'], $persistent);
    $persistent = str_replace('{maxplayer}', $persistent_arr['persistent_maxzahl'], $persistent);
    $persistent = str_replace('{maxlevel}', $persistent_arr['persistent_maxlevel'], $persistent);

    $persistent_list .= $persistent;
}
unset($persistent_arr);

$index = mysql_query("select template_code from fs_template where template_name = 'persistent_main_body'", $db);
$template = stripslashes(mysql_result($index, 0, 'template_code'));
$template = str_replace('{text}', $persistent_list, $template);

unset($persistent_list);

echo $template;

?>
<br><br>
