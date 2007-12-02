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


///////////////////
//// Anti-Spam ////
///////////////////
session_start();
function encrypt($string, $key) {
$result = '';
for($i=0; $i<strlen($string); $i++) {
   $char = substr($string, $i, 1);
   $keychar = substr($key, ($i % strlen($key))-1, 1);
   $char = chr(ord($char)+ord($keychar));
   $result.=$char;
}
return base64_encode($result);
}
$sicherheits_eingabe = encrypt($_POST['spam'], '3g9sp3hr45');
$sicherheits_eingabe = str_replace('=', '', $sicherheits_eingabe);

//////////////////////////////
//// Kommentar hinzufügen ////
//////////////////////////////

if (isset($_POST['addcomment']))
{
    if ($pw && ($_POST[name] != "" || $_SESSION["user_id"]) && $_POST[title] != "" && $_POST[text] != ""
        && (($sicherheits_eingabe == $_SESSION['rechen_captcha_spam'] AND is_numeric($_POST['spam']) == true AND $sicherheits_eingabe == true) OR $_SESSION['user_id']))
    {
        // $_POST[pw] = savesql($_POST[pw]);
        $_POST['name'] = savesql($_POST['name']);
        $_POST['title'] = savesql($_POST['title']);
        $_POST['text'] = savesql($_POST['text']);
        $commentdate = date('U');

        if ($_SESSION['user_id'])
        {
            $userid = $_SESSION['user_id'];
            $name = '';
        }
        else
        {
            $userid = 0;
        }

        mysql_query("INSERT INTO fsplus_persistent_comments (persistent_link, comment_poster, comment_poster_id, comment_date, comment_title, comment_text)
                     VALUES ('$pw',
                             '".$_POST['name']."',
                             '$userid',
                             '$commentdate',
                             '".$_POST['title']."',
                             '".$_POST['text']."');", $db);

        mysql_query('update fs_counter set comments=comments+1', $db);
    }
    else
    {
        $reason = '';
        if ( !($_POST[name] != '' || $_SESSION['user_id'])
            || $_POST[title] == ''
            || $_POST[text] == '')
        {
            $reason = $phrases['comment_empty'];
        }
        if ((!($sicherheits_eingabe == $_SESSION['rechen_captcha_spam'] AND is_numeric($_POST['spam']) == true AND $sicherheits_eingabe == true)) AND !($_SESSION['user_id']))
        {
            $reason .= $phrases['comment_spam'];
        }
        sys_message($phrases['comment_not_added'], $reason);

    }
}

unset($_SESSION['rechen_captcha_spam']);

//////////////////////////////
//// Kommentare ausgeben /////
//////////////////////////////


$index = mysql_query('select * from fs_news_config', $db);
$config_arr = mysql_fetch_assoc($index);
$time = time();
//////////////////////////////////////////////////////// AB HIER PERSISTENTDETAIL-CODE EINFÜGEN //////////////////////////////////////////////////////////////
//Persistente Welt anzeigen
$index = mysql_query("select * from fsplus_persistent where persistent_link = '$pw'", $db);
$persistent_arr = mysql_fetch_assoc($index);

/////   NEU ANFANG   /////

	// Kommentare
	$pw_arr[comment_url] = "nwn2/?go=pwcomments3&amp;pw=$pw";

	// Kommentare lesen
    $index_pwcomms = mysql_query("select persistent_comment_id from fsplus_persistent_comments where persistent_link = '$persistent_arr[persistent_link]'", $db);
	$pw_arr[kommentare] = mysql_num_rows($index_pwcomms);

	// User auslesen
    $index2 = mysql_query("select user_name from fs_user where user_id = $persistent_arr[persistent_posterid]", $db);
    $news_arr[user_name] = mysql_result($index2, 0, 'user_name');
    $news_arr[user_url] = "?go=profil&amp;userid=$persistent_arr[persistent_posterid]";

/////   NEU ENDE   /////

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

    $index2 = mysql_query("select template_code from fs_template where template_name = 'persistent_detail_body'", $db);
    $persistent = stripslashes(mysql_result($index2, 0, "template_code"));
    $persistent = str_replace("{name}", $persistent_arr[persistent_name], $persistent);
    $persistent = str_replace("{url}", $persistent_arr[persistent_url], $persistent);
    $persistent = str_replace("{text}", $persistent_arr[persistent_text], $persistent);
    $persistent = str_replace("{spiel}", $persistent_arr[persistent_spiel], $persistent);
    $persistent = str_replace("{setting}", $persistent_arr[persistent_setting], $persistent);
    $persistent = str_replace("{genre}", $persistent_arr[persistent_genre], $persistent);
    $persistent = str_replace("{pvp}", $persistent_arr[persistent_pvp], $persistent);
    $persistent = str_replace("{termine}", $persistent_arr[persistent_termine], $persistent);
    $persistent = str_replace("{dlsize}", $persistent_arr[persistent_dlsize], $persistent);
    $persistent = str_replace("{dlsvu}", $persistent_arr[persistent_dlsvu], $persistent);
    $persistent = str_replace("{dlhdu}", $persistent_arr[persistent_dlhdu], $persistent);
    $persistent = str_replace("{dlcep}", $persistent_arr[persistent_dlcep], $persistent);
    $persistent = str_replace("{anmeldung}", $persistent_arr[persistent_anmeldung], $persistent);
    $persistent = str_replace("{handycap}", $persistent_arr[persistent_handycap], $persistent);
    $persistent = str_replace("{dungeonmaster}", $persistent_arr[persistent_dm], $persistent);
    $persistent = str_replace("{maxplayer}", $persistent_arr[persistent_maxzahl], $persistent);
    $persistent = str_replace("{maxlevel}", $persistent_arr[persistent_maxlevel], $persistent);
    $persistent = str_replace("{expcap}", $persistent_arr[persistent_expcap], $persistent);
    $persistent = str_replace("{fights}", $persistent_arr[persistent_fights], $persistent);
    $persistent = str_replace("{traps}", $persistent_arr[persistent_traps], $persistent);
    $persistent = str_replace("{items}", $persistent_arr[persistent_items], $persistent);
	if ($persistent_arr[persistent_interview] != NULL)
    $persistent = str_replace("{interview}", $persistent_arr[persistent_interview], $persistent);
	else
	$persistent = str_replace("{interview}", "Noch kein Interview vorhanden", $persistent);
    $persistent = str_replace("{link}", $persistent_arr[persistent_link], $persistent);
    $persistent = str_replace("{kommentar_url}", $pw_arr[comment_url], $persistent);
    $persistent = str_replace("{kommentar_anzahl}", $pw_arr[kommentare], $persistent);
    $persistent = str_replace("{autor}", $news_arr[user_name], $persistent);
    $persistent = str_replace("{autor_profilurl}", $news_arr[user_url], $persistent);

    $persistent_list .= $persistent;

unset($persistent_arr);

echo $persistent;
////////////////////////////////////////////////// ENDE PERSISTENTDETAIL-CODE EINFÜGEN //////////////////////////////////////////////////////////////
// Kommentare erzeugen
$index = mysql_query("select * from fsplus_persistent_comments where persistent_link = '$pw' order by comment_date asc", $db);
echo mysql_error();
while ($comment_arr = mysql_fetch_assoc($index))
{
    // User auslesen
    if ($comment_arr[comment_poster_id] != 0)
    {
        $index2 = mysql_query("select user_name, is_admin from fs_user where user_id = $comment_arr[comment_poster_id]", $db);
        $comment_arr[comment_poster] = killhtml(mysql_result($index2, 0, "user_name"));
        $comment_arr[is_admin] = mysql_result($index2, 0, "is_admin");
        if (file_exists("images/avatare/".$comment_arr[comment_poster_id].".gif"))
        {
            $comment_arr[comment_avatar] = '<div style="width:120px;"><img align="left" src="images/avatare/'.$comment_arr[comment_poster_id].'.gif" alt="'.$comment_arr[comment_poster].'"></div>';
        }
        if ($comment_arr[is_admin] == 1)
        {
            $comment_arr[comment_poster] = "<b>" . $comment_arr[comment_poster] . "</b>";
        }
        $index2 = mysql_query("select template_code from fs_template where template_name = 'news_comment_autor'", $db);
        $comment_autor = stripslashes(mysql_result($index2, 0, "template_code"));
        $comment_autor = str_replace("{url}", "?go=profil&amp;userid=".$comment_arr[comment_poster_id], $comment_autor);
        $comment_autor = str_replace("{name}", $comment_arr[comment_poster], $comment_autor);
        $comment_arr[comment_poster] = $comment_autor;
    }
    else
    {
        $comment_arr[comment_avatar] = "";
        $comment_arr[comment_poster] = killhtml($comment_arr[comment_poster]);
    }

    // Text formatieren
    if ($config_arr[html_code] < 3)
    {
        $comment_arr[comment_text] = killhtml($comment_arr[comment_text]);
    }
    if ($config_arr[fs_code] == 3)
    {
        $comment_arr[comment_text] = fscode($comment_arr[comment_text], 1, 1, 1, 1, 1, 0, 1, 1, 0, 1, 0, 0);
    }
    else
    {
        $comment_arr[comment_text] = fscode($comment_arr[comment_text], 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    }

    $comment_arr[comment_date] = date("d.m.Y" , $comment_arr[comment_date]) . " um " . date("H:i" , $comment_arr[comment_date]);

    // Template auslesen und füllen
    $index2 = mysql_query("select template_code from fs_template where template_name = 'news_comment_body'", $db);
    $template = stripslashes(mysql_result($index2, 0, "template_code"));
    $template = str_replace("{titel}", killhtml($comment_arr[comment_title]), $template);
    $template = str_replace("{datum}", $comment_arr[comment_date], $template);
    $template = str_replace("{text}", $comment_arr[comment_text], $template);
    $template = str_replace("{autor}", $comment_arr[comment_poster], $template);
    $template = str_replace("{autor_avatar}", $comment_arr[comment_avatar], $template);

    echo $template;
}
unset($comment_arr);

// Eingabeformular generieren
$index = mysql_query("select template_code from fs_template where template_name = 'news_comment_form_name'", $db);
$form_name = stripslashes(mysql_result($index, 0, "template_code"));

$index = mysql_query("select template_code from fs_template where template_name = 'news_comment_form_spam'", $db);
$form_spam = stripslashes(mysql_result($index, 0, "template_code"));

$form_spam_text ='<br /><br />
 <table border="0" cellspacing="5" cellpadding="0" width="100%">
  <tr>
   <td valign="top" align="left">
<div id="antispam"><font size="1">* Auf dieser Seite kann jeder einen Kommentar zu einer News abgeben. Leider ist sie dadurch ein beliebtes Ziel von sog. Spam-Bots - speziellen Programmen, die automatisiert und zum Teil massenhaft Links zu anderen Internetseiten platzieren. Um das zu verhindern, müssen nicht registrierte User eine einfache Rechenaufgabe lösen, die für die meisten Spam-Bots aber nicht lösbar ist. Wenn du nicht jedesmal eine solche Aufgabe lösen möchtest, kannst du dich einfach bei uns <a href="?go=register">registrieren</a>.</font></div>
   </td>
  </tr>
 </table>';

if (isset($_SESSION[user_name]))
{
    $form_name = $_SESSION[user_name];
    $form_name .= '<input type="hidden" name="name" id="name" value="1">';
    $form_spam = "";
    $form_spam_text ="";
}

$index = mysql_query("select template_code from fs_template where template_name = 'news_comment_form'", $db);
$template = stripslashes(mysql_result($index, 0, "template_code"));
$template = str_replace("{newsid}", $pw, $template);
$template = str_replace("{name_input}", $form_name, $template);
$template = str_replace("{antispam}", $form_spam, $template);
$template = str_replace("{antispamtext}", $form_spam_text, $template);

echo $template;
unset($template);

$pw = $_GET[pw];

?>