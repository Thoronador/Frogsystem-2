<?php

////////////////////////////
//// User aktualisieren ////
////////////////////////////

if ($_POST[username] AND $_POST[usermail] AND $_POST[monat] AND $_POST[tag] AND $_POST[jahr] AND $_POST[userid] != 1 AND $_POST[userid] != $_SESSION[user_id])
{
    $_POST[username] = savesql($_POST[username]);
    $_POST[usermail] = savesql($_POST[usermail]);
    settype($_POST[userid], 'integer');
    settype($_POST[isadmin], 'integer');
    settype($_POST[showmail], 'integer');

    $regdate = mktime(0, 0, 0, $_POST[monat], $_POST[tag], $_POST[jahr]);
 
    // Username schon vorhanden?
    $index = mysql_query("SELECT user_id FROM ".$global_config_arr[pref]."user WHERE user_name = '$_POST[username]'", $db);
    $rows = mysql_num_rows($index);
    $dbexistid = mysql_result($index, 0, "user_id");

    // Neuer name noch nicht vorhanden, oder gleicher User
    if (($dbexistid == $_POST[userid]) || ($rows == 0))
    {
        if (!isset($_POST[deluser]))
        {
            $index = mysql_query("select is_admin from ".$global_config_arr[pref]."user where user_id = '$_POST[userid]'", $db);
            $dbisadmin = mysql_result($index, 0, "is_admin");

            // Wenn vorher kein Admin, jetzt aber wohl
            if (($_POST[isadmin] == 1) && ($dbisadmin == 0))
            {
                mysql_query("INSERT INTO ".$global_config_arr[pref]."permissions (user_id)
                             VALUES (".$_POST[userid].")", $db);
            }

            // Wenn vorher Admin, jetzt aber nicht mehr
            if (($_POST[isadmin] == 0) && ($dbisadmin == 1))
            {
                $dbaction = "delete from ".$global_config_arr[pref]."permissions where user_id = ".$_POST[userid];
                mysql_query($dbaction, $db);
            }

            // Neues Passwort?
            if ($_POST[newpass] != "")
            {
                $userpass = md5($_POST[newpass]);
            }
            else
            {
                $userpass = savesql($_POST[oldpass]);
            }

            $update = "UPDATE ".$global_config_arr[pref]."user
                       SET user_name     = '$_POST[username]',
                           user_mail     = '$_POST[usermail]',
                           user_password = '$userpass',
                           is_admin      = '$_POST[isadmin]',
                           reg_date      = '$regdate',
                           show_mail     = '$_POST[showmail]'
                       WHERE user_id = $_POST[userid]";
            mysql_query($update, $db);

            systext('User wurde ge�ndert');
        } 
        elseif($_POST[userid] != 1 AND $_POST[userid] != $_SESSION[user_id])  // User l�schen
        {
            $dbaction = "delete from ".$global_config_arr[pref]."permissions where user_id = ".$_POST[userid];
            @mysql_query($dbaction, $db);

            $dbaction = "delete from ".$global_config_arr[pref]."user where user_id = ".$_POST[userid];
            mysql_query($dbaction, $db);

            mysql_query("update ".$global_config_arr[pref]."counter set user=user-1", $db);
            systext('User wurde gel�scht');
        }
    }
    else
    {
        systext("Username existiert bereits");
    }
}

////////////////////////////
////// User editieren //////
////////////////////////////

elseif (isset($_POST[select_user]))
{
    settype($_POST[select_user], 'integer');
    $index = mysql_query("select * from ".$global_config_arr[pref]."user where user_id = $_POST[select_user]", $db);
    $user_arr = mysql_fetch_assoc($index);

    $user_arr[is_admin] = ($user_arr[is_admin] == 1) ? "checked" : "";
    $user_arr[show_mail] = ($user_arr[show_mail] == 1) ? "checked" : "";

    echo'
                    <form action="" method="post">
                        <input type="hidden" value="useredit" name="go">
                        <input type="hidden" value="'.session_id().'" name="PHPSESSID">
                        <input type="hidden" value="'.$user_arr[user_password].'" name="oldpass">
                        <input type="hidden" value="'.$_POST[select_user].'" name="userid">
                        <table border="0" cellpadding="4" cellspacing="0" width="600">
                            <tr>
                                <td class="config" valign="top" width="50%">
                                    Name:<br>
                                    <font class="small">Name des Users</font>
                                </td>
                                <td class="config" width="50%" valign="top">
                                    <input class="text" size="30" name="username" value="'.$user_arr[user_name].'" maxlength="100">
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    E-Mail:<br>
                                    <font class="small">E-Mail Adresse, an die das Passwort gesendet wird</font>
                                </td>
                                <td class="config" valign="top">
                                    <input class="text" size="30" name="usermail" value="'.$user_arr[user_mail].'" maxlength="100">
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Passwort:<br>
                                    <font class="small">Neus Passwort eingeben um das alte zu �ndern</font>
                                </td>
                                <td class="config" valign="top">
                                    <input class="text" type="password" size="30" name="newpass" maxlength="16">
                                </td>
                            </tr>
                            <tr>
                                <td class="config">
                                    Admin Account:<br>
                                    <font class="small">Erzeugt oder degradiert einen Admin Account</font>
                                </td>
                                <td class="config">
                                    <input type="checkbox" name="isadmin" value="1" '.$user_arr[is_admin].'>
                                </td>
                            </tr>
                            <tr>
                                <td class="config" valign="top">
                                    Datum:<br>
                                    <font class="small">Registriert seit</font>
                                </td>
                                <td class="config" valign="top">
                                    <input class="text" size="2" value="'.date("d",$user_arr[reg_date]).'" name="tag" maxlength="2">
                                    <input class="text" size="2" value="'.date("m",$user_arr[reg_date]).'" name="monat" maxlength="2">
                                    <input class="text" size="4" value="'.date("Y",$user_arr[reg_date]).'" name="jahr" maxlength="4">
                                </td>
                            </tr>
                            <tr>
                                <td class="config">
                                    Zeige Email:<br>
                                    <font class="small">Zeigt die Email Adresse �ffentlich</font>
                                </td>
                                <td class="config">
                                    <input type="checkbox" name="showmail" value="1" '.$user_arr[show_mail].'>
                                </td>
                            </tr>
                            <tr>
                                <td class="config">
                                    User l�schen:<br>
                                    <font class="status"><b>ACHTUNG!</b> kann nicht r�ckg�ngig gemacht werden</font>
                                </td>
                                <td class="config">
                                    <input onClick=\'delalert ("deluser","Soll der User wirklich gel�scht werden?")\' type="checkbox" name="deluser" id="deluser" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="button" value="Absenden">
                                </td>
                            </tr>
                        </table>
                    </form>
    ';
}

////////////////////////////
////// User ausw�hlen //////
////////////////////////////

else
{
    echo'
                    <form action="" method="post">
                        <input type="hidden" value="useredit" name="go">
                        <input type="hidden" value="'.session_id().'" name="PHPSESSID">
                        <table border="0" cellpadding="2" cellspacing="0" width="600">
                            <tr>
                                <td align="center" class="config" width="50%">
                                    User Suchen:
                                </td>
                                <td align="center" class="configthin" width="50%">
                                    <input class="text" name="filter" size="30">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input class="button" type="submit" value="Suchen">
                                </td>
                            </tr>
                        </table>
                    </form>
                    <p>
    ';

    if (isset($_POST[filter]))
    {
        echo'
                    <form action="" method="post">
                        <input type="hidden" value="useredit" name="go">
                        <input type="hidden" value="'.session_id().'" name="PHPSESSID">
                        <table border="0" cellpadding="2" cellspacing="0" width="600">
                            <tr>
                                <td align="center" class="config" width="50%">
                                    Username
                                </td>
                                <td align="center" class="config" width="50%">
                                    bearbeiten
                                </td>
                            </tr>
        ';

        $_POST[filter] = savesql($_POST[filter]);
        $index = mysql_query("SELECT * FROM ".$global_config_arr[pref]."user
                              WHERE user_name like '%$_POST[filter]%' AND user_id != 1 AND user_id != $_SESSION[user_id]
                              ORDER BY user_name", $db);
        while ($user_arr = mysql_fetch_assoc($index))
        {
            $user_arr[user_name] = killhtml($user_arr[user_name]);
            if ($user_arr[is_admin] == 1)
            {
                $user_arr[user_name] = '<b>' . $user_arr[user_name] . '</b>';
            }
            echo'
                            <tr>
                                <td class="configthin">
                                    '.$user_arr[user_name].'
                                </td>
                                <td class="config">
                                    <input type="radio" name="select_user" value="'.$user_arr[user_id].'">
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
                                <td colspan="2" align="center">
                                    <input class="button" type="submit" value="editieren">
                                </td>
                            </tr>
                        </table>
                    </form>
        ';
    }
}
?>