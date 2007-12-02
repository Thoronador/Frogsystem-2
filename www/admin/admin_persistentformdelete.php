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

/////////////////////////
//// Setting löschen ////
/////////////////////////

if ($_POST[delsetting] != NULL)
{
    settype($_POST[delsetting], 'integer');

	$index = mysql_query("DELETE FROM fsplus_persistent_setting WHERE setting_id = '$_POST[delsetting]'", $db);

	systext('Setting wurde gelöscht');
}
/*
else
{
    systext('Setting konnte nicht gelöscht werden');
}
*/
elseif ($_POST[delgenre] != NULL)
{
    settype($_POST[delgenre], 'integer');

	$index = mysql_query("DELETE FROM fsplus_persistent_genre WHERE genre_id = '$_POST[delgenre]'", $db);

	systext('Genre wurde gelöscht');
}

/////////////////////////
/// Setting auswählen ///
/////////////////////////

else
{
    echo'
                    <form action="'.$PHP_SELF.'" method="post">
                        <input type="hidden" value="persistentformdelete" name="go">
                        <input type="hidden" value="'.session_id().'" name="PHPSESSID">
                        <table border="0" cellpadding="2" cellspacing="0" width="600">
                            <tr>
                                <td class="config" width="50%">
                                    Setting
                                </td>
                                <td class="config" width="30%">
                                    erstellt am
                                </td>
                                <td class="config" width="20%">
                                    löschen
                                </td>
                            </tr>
    ';
    $index = mysql_query("select * from fsplus_persistent_setting order by setting_date desc", $db);
    while ($setting_arr = mysql_fetch_assoc($index))
    {
		$setting_arr[setting_date] = date("d.m.Y", $setting_arr[setting_date]);
        echo'
                            <tr>
                                <td class="configthin">
                                    '.$setting_arr[setting_name].'
                                </td>
                                <td class="configthin">
                                    '.$setting_arr[setting_date].'
                                </td>
                                <td class="config">
                                    <input type="radio" name="delsetting" value="'.$setting_arr[setting_id].'">
                                </td>
                            </tr>
        ';
    }
    echo'
                            <tr>
                                <td colspan="3">
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" align="center">
                                    <input class="button" type="submit" value="Löschen">
                                </td>
                            </tr>
                        </table>
                    </form>
					<table border="0" cellpadding="2" cellspacing="0" width="600">
                    	<tr>
                        	<td class="config">
                                <div align="center">&nbsp;<br>- oder -<br>&nbsp;</div>
							</td>
						</tr>
					</table>
                    <form action="'.$PHP_SELF.'" method="post">
                        <input type="hidden" value="persistentformdelete" name="go">
                        <input type="hidden" value="'.session_id().'" name="PHPSESSID">
                        <table border="0" cellpadding="2" cellspacing="0" width="600">
                            <tr>
                                <td class="config" width="50%">
                                    Genre
                                </td>
                                <td class="config" width="30%">
                                    erstellt am
                                </td>
                                <td class="config" width="20%">
                                    löschen
                                </td>
                            </tr>
    ';
    $index = mysql_query("select * from fsplus_persistent_genre order by genre_date desc", $db);
    while ($genre_arr = mysql_fetch_assoc($index))
    {
		$genre_arr[genre_date] = date("d.m.Y", $genre_arr[genre_date]);
        echo'
                            <tr>
                                <td class="configthin">
                                    '.$genre_arr[genre_name].'
                                </td>
                                <td class="configthin">
                                    '.$genre_arr[genre_date].'
                                </td>
                                <td class="config">
                                    <input type="radio" name="delgenre" value="'.$genre_arr[genre_id].'">
                                </td>
                            </tr>
        ';
    }
    echo'
                            <tr>
                                <td colspan="3">
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" align="center">
                                    <input class="button" type="submit" value="Löschen">
                                </td>
                            </tr>
                        </table>
                    </form>
    ';
}
?>