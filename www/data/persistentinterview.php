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

$index = mysql_query("select * from fsplus_persisinterview where persisinterview_link = '$pw'", $db);
$persisinterview_arr = mysql_fetch_assoc($index);

// User auslesen
$index2 = mysql_query("select user_name from fs_user where user_id = $persisinterview_arr[persisinterview_posterid]", $db);
$news_arr['user_name'] = mysql_result($index2, 0, 'user_name');
$news_arr['user_url'] = "?go=profil&amp;userid=$persisinterview_arr[persisinterview_posterid]";

    $persisinterview_arr['persisinterview_antwort01'] = fscode($persisinterview_arr['persisinterview_antwort01'], 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0);
    $persisinterview_arr['persisinterview_antwort02'] = fscode($persisinterview_arr['persisinterview_antwort02'], 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0);
    $persisinterview_arr['persisinterview_antwort03'] = fscode($persisinterview_arr['persisinterview_antwort03'], 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0);
    $persisinterview_arr['persisinterview_antwort04'] = fscode($persisinterview_arr['persisinterview_antwort04'], 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0);
    $persisinterview_arr['persisinterview_antwort05'] = fscode($persisinterview_arr['persisinterview_antwort05'], 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0);
    $persisinterview_arr['persisinterview_antwort06'] = fscode($persisinterview_arr['persisinterview_antwort06'], 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0);
    $persisinterview_arr['persisinterview_antwort07'] = fscode($persisinterview_arr['persisinterview_antwort07'], 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0);
    $persisinterview_arr['persisinterview_antwort08'] = fscode($persisinterview_arr['persisinterview_antwort08'], 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0);
    $persisinterview_arr['persisinterview_antwort09'] = fscode($persisinterview_arr['persisinterview_antwort09'], 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0);
    $persisinterview_arr['persisinterview_antwort10'] = fscode($persisinterview_arr['persisinterview_antwort10'], 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0);
    $persisinterview_arr['persisinterview_antwort11'] = fscode($persisinterview_arr['persisinterview_antwort11'], 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0);
    $persisinterview_arr['persisinterview_antwort12'] = fscode($persisinterview_arr['persisinterview_antwort12'], 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0);
    $persisinterview_arr['persisinterview_antwort13'] = fscode($persisinterview_arr['persisinterview_antwort13'], 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0);

	switch ($persisinterview_arr['persisinterview_spiel'])
	{
		case 1:
		$persisinterview_arr['persisinterview_spiel'] = 'Neverwinter Nights';
		break;
		case 2:
		$persisinterview_arr['persisinterview_spiel'] = 'Neverwinter Nights 2';
		break;
	}

    $index2 = mysql_query("select template_code from fs_template where template_name = 'persisinterview_detail_body'", $db);
    $persisinterview = stripslashes(mysql_result($index2, 0, 'template_code'));
    $persisinterview = str_replace('{name}', $persisinterview_arr['persisinterview_name'], $persisinterview);
    $persisinterview = str_replace('{url}', $persisinterview_arr['persisinterview_url'], $persisinterview);
    $persisinterview = str_replace('{spiel}', $persisinterview_arr['persisinterview_spiel'], $persisinterview);
    $persisinterview = str_replace('{antwort01}', $persisinterview_arr['persisinterview_antwort01'], $persisinterview);
    $persisinterview = str_replace('{antwort02}', $persisinterview_arr['persisinterview_antwort02'], $persisinterview);
    $persisinterview = str_replace('{antwort03}', $persisinterview_arr['persisinterview_antwort03'], $persisinterview);
    $persisinterview = str_replace('{antwort04}', $persisinterview_arr['persisinterview_antwort04'], $persisinterview);
    $persisinterview = str_replace('{antwort05}', $persisinterview_arr['persisinterview_antwort05'], $persisinterview);
    $persisinterview = str_replace('{antwort06}', $persisinterview_arr['persisinterview_antwort06'], $persisinterview);
    $persisinterview = str_replace('{antwort07}', $persisinterview_arr['persisinterview_antwort07'], $persisinterview);
    $persisinterview = str_replace('{antwort08}', $persisinterview_arr['persisinterview_antwort08'], $persisinterview);
    $persisinterview = str_replace('{antwort09}', $persisinterview_arr['persisinterview_antwort09'], $persisinterview);
    $persisinterview = str_replace('{antwort10}', $persisinterview_arr['persisinterview_antwort10'], $persisinterview);
    $persisinterview = str_replace('{antwort11}', $persisinterview_arr['persisinterview_antwort11'], $persisinterview);
    $persisinterview = str_replace('{antwort12}', $persisinterview_arr['persisinterview_antwort12'], $persisinterview);
    $persisinterview = str_replace('{antwort13}', $persisinterview_arr['persisinterview_antwort13'], $persisinterview);
    $persisinterview = str_replace('{link}', $persisinterview_arr['persisinterview_link'], $persisinterview);
    $persisinterview = str_replace('{autor}', $news_arr['user_name'], $persisinterview);
    $persisinterview = str_replace('{autor_profilurl}', $news_arr['user_url'], $persisinterview);

    $persisinterview_list .= $persisinterview;

$pwid = $persisinterview_arr['persisinterview_id'];
unset($persisinterview_arr);

echo $persisinterview;

?>