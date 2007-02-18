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

$index = mysql_query("SELECT * FROM fsplus_persisinterview ORDER BY persisinterview_name", $db);
while ($persisinterview_arr = mysql_fetch_assoc($index))
{
    // Username auslesen

    $index3 = mysql_query("select user_name from fs_user where user_id = $persisinterview_arr[persisinterview_posterid]", $db);
    $persisinterview_arr[user_name] = mysql_result($index3, 0, "user_name");

	// FrogCode-Ersetzungen anwenden (nicht in der Übersichtsliste notwendig)
//    $persisinterview_arr[persisinterview_antwort01] = fscode($persisinterview_arr[persisinterview_antwort01], 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

	switch ($persisinterview_arr[persisinterview_spiel])
	{
		case 1:
		$persisinterview_arr[persisinterview_spiel] = "Neverwinter Nights";
		break;
		case 2:
		$persisinterview_arr[persisinterview_spiel] = "Neverwinter Nights 2";
		break;
	}

    $index2 = mysql_query("select template_code from fs_template where template_name = 'persisinterview_eintrag'", $db);
    $persisinterview = stripslashes(mysql_result($index2, 0, "template_code"));
    $persisinterview = str_replace("{spiel}", $persisinterview_arr[persisinterview_spiel], $persisinterview);
    $persisinterview = str_replace("{link}", $persisinterview_arr[persisinterview_link], $persisinterview);
    $persisinterview = str_replace("{name}", $persisinterview_arr[persisinterview_name], $persisinterview);
    $persisinterview = str_replace("{username}", $persisinterview_arr[user_name], $persisinterview);

    $persisinterview_list .= $persisinterview;
}
unset($persistent_arr);

$index = mysql_query("select template_code from fs_template where template_name = 'persisinterview_main_body'", $db);
$template = stripslashes(mysql_result($index, 0, "template_code"));
$template = str_replace("{text}", $persisinterview_list, $template);

unset($persisinterview_list);

echo $template;

?>