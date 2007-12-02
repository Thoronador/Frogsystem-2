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

////////////////////////////////////
//// Formulareintrag hinzufügen ////
////////////////////////////////////

if ($_POST[settingname] != NULL)
{
    $_POST[settingname] = savesql($_POST[settingname]);
    $index = mysql_query("SELECT setting_name FROM fsplus_persistent_setting WHERE setting_name = '$_POST[settingname]'", $db);
    $rows = mysql_num_rows($index);
    if ($rows === 0)
    {
        $time = time();
        mysql_query("INSERT INTO fsplus_persistent_setting (setting_name, setting_date)
                     VALUES ('".$_POST[settingname]."',
                             '$time');", $db);
        systext("Setting wurde hinzugefügt");
    }
    else systext("Setting existiert bereits");
}
elseif ($_POST[genrename] != NULL)
{
    $_POST[genrename] = savesql($_POST[genrename]);
    $index = mysql_query("SELECT genre_name FROM fsplus_persistent_genre WHERE genre_name = '$_POST[genrename]'", $db);
    $rows = mysql_num_rows($index);
    if ($rows === 0)
    {
        $time = time();
        mysql_query("INSERT INTO fsplus_persistent_genre (genre_name, genre_date)
                     VALUES ('".$_POST[genrename]."',
                             '$time');", $db);
        systext("Genre wurde hinzugefügt");
    }
    else systext("Genre existiert bereits");
}

////////////////////
///// Formular /////
////////////////////

else
{
    echo'
                    <form action="'.$PHP_SELF.'" method="post">
                        <input type="hidden" value="persistentformadd" name="go">
                        <input type="hidden" value="'.session_id().'" name="PHPSESSID">
                        <table border="0" cellpadding="4" cellspacing="0" width="600">
                            <tr>
                                <td class="config" valign="top">
                                    Setting:<br>
                                    <font class="small">Setting hinzufügen</font>
                                </td>
                                <td class="config" valign="top">
                                    <input class="text" name="settingname" size="33" maxlength="100">
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top" colspan="2">
                                    <div align="center">- oder -</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Genre:<br>
                                    <font class="small">Genre hinzufügen</font>
                                </td>
                                <td class="config" valign="top">
                                    <input class="text" name="genrename" size="33" maxlength="100">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input class="button" type="submit" value="Hinzufügen">
                                </td>
                            </tr>
                        </table>
                    </form>
    ';
}
?>