<?php
session_start(); 
include("config.inc.php");
include("functions.php");
include("adminfunctions.php");
include("../phrases/phrases.de.php");
include("../phrases/admin_phrases.de.php");

//////////////////////////////
///// Cookie
//////////////////////////////

if ($_POST[stayonline]==1)
{
    admin_set_cookie($_POST[username], $_POST[userpassword]);
}

if ($HTTP_COOKIE_VARS["login"])
{
    $userpassword = substr($HTTP_COOKIE_VARS["login"], 0, 32);
    $username = substr($HTTP_COOKIE_VARS["login"], 32, strlen($HTTP_COOKIE_VARS["login"]));
    admin_login($username, $userpassword, true);
}
else
{
    $session_url = "&amp;sid=" . session_id();
}

if ($_POST[login]==1)
{
    admin_login($_POST[username], $_POST[userpassword], false);
}

//////////////////////////////
///// detect subpage
//////////////////////////////

if ($_GET[go])
{
    $go = $_GET[go];
}
if ($_POST[go])
{
    $go = $_POST[go];
}

$index = mysql_query("SELECT * FROM fs_admin_cp", $db);

$page_created = false;
while ($acp_arr = mysql_fetch_assoc($index))
{
    //create page
    if ($go == $acp_arr['page_call'])
    {
        if ($acp_arr[permission]!=1)
        {
            $acp_arr[permission] = $_SESSION[$acp_arr[permission]];
        }

        createpage($acp_arr['page_title'], $acp_arr[permission], $acp_arr['file']);
        $page_created = true;
        break;
    }
}

    //logout
    if ($go == 'logout')
    {
        setcookie ("login", "", time() - 3600, "/");
        $_SESSION=array();
        $page_created = true;
    }
    //pseudo-else
    if ($page_created == false)
    {
        createpage('LOGIN', 1, 'admin_login.php');
        $go = "login";
    }

//////////////////////////////
///// display html header
//////////////////////////////

echo'
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title>Frogsystem 2 - '.$pagetitle.'</title>
    
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" type="text/css" href="../res/editor.css">
    <script src="functions.js" type="text/javascript"></script>
    <script src="../res/functions.js" type="text/javascript"></script>
</head>
<body>


<div id="head">
     Seitenname
     <div id="head_link">
         <a href="'.$global_config_arr[virtualhost].'" target="_self" class="head_link">� zur Hauptseite</a>
     </div>
</div>';



##############################
### START OF NAVI CREATION ###
##############################

//////////////////////////////
///// explanation of navi creation
//////////////////////////////
/*
$NAVI_ARR[title] = "title"; //title of navi
$NAVI_ARR[menu_id][] = "id1"; //id of first menu to be shown in
$NAVI_ARR[menu_id][] = "id2"; //id of second menu to be shown in
//etc...

$NAVI_ARR[link][] = "link_name1"; //first link in the navi
$NAVI_ARR[link][] = "link_name2"; //second link in the navi
//etc...

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi)); //store navi into $template
unset($NAVI_ARR); //deletes the variable
*/



unset($template_navi);
unset($menu_show_arr);

//////////////////////////////
///// general
//////////////////////////////

$NAVI_ARR[title] = "Allgemein";
$NAVI_ARR[menu_id] = "general";

$NAVI_ARR[link][] = "allconfig";
$NAVI_ARR[link][] = "allannouncement";
$NAVI_ARR[link][] = "allphpinfo";
$NAVI_ARR[link][] = "emailtemplate";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

//////////////////////////////
///// includes
//////////////////////////////

$NAVI_ARR[title] = "Includes";
$NAVI_ARR[menu_id] = "general";

$NAVI_ARR[link][] = "includes_edit";
$NAVI_ARR[link][] = "includes_new";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

//////////////////////////////
///// statistics
//////////////////////////////

$NAVI_ARR[title] = "Statistik";
$NAVI_ARR[menu_id] = "general";

$NAVI_ARR[link][] = "statview";
$NAVI_ARR[link][] = "statedit";
$NAVI_ARR[link][] = "statref";
$NAVI_ARR[link][] = "statspace";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

//////////////////////////////
///// news
//////////////////////////////

$NAVI_ARR[title] = "News";
$NAVI_ARR[menu_id] = "content";

$NAVI_ARR[link][] = "newsadd";
$NAVI_ARR[link][] = "newsedit";
$NAVI_ARR[link][] = "news_cat_create";
$NAVI_ARR[link][] = "news_cat_manage";
$NAVI_ARR[link][] = "newsconfig";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

//////////////////////////////
///// articles
//////////////////////////////

$NAVI_ARR[title] = "Artikel";
$NAVI_ARR[menu_id] = "content";

$NAVI_ARR[link][] = "artikeladd";
$NAVI_ARR[link][] = "artikeledit";
$NAVI_ARR[link][] = "cimgadd";
$NAVI_ARR[link][] = "cimgdel";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

//////////////////////////////
///// polls
//////////////////////////////

$NAVI_ARR[title] = "Umfrage";
$NAVI_ARR[menu_id] = "content";

$NAVI_ARR[link][] = "polladd";
$NAVI_ARR[link][] = "polledit";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

//////////////////////////////
///// press releases
//////////////////////////////

$NAVI_ARR[title] = "Presseberichte";
$NAVI_ARR[menu_id] = "content";

$NAVI_ARR[link][] = "press_add";
$NAVI_ARR[link][] = "press_edit";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

//////////////////////////////
///// gallery
//////////////////////////////

$NAVI_ARR[title] = "Galerie";
$NAVI_ARR[menu_id] = "media";

$NAVI_ARR[link][] = "screennewcat";
$NAVI_ARR[link][] = "screencat";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

//////////////////////////////
///// screenshots
//////////////////////////////

$NAVI_ARR[title] = "Screenshots";
$NAVI_ARR[menu_id] = "media";

$NAVI_ARR[link][] = "screenadd";
$NAVI_ARR[link][] = "screenedit";
$NAVI_ARR[link][] = "screenconfig";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

//////////////////////////////
///// wallpaper
//////////////////////////////

$NAVI_ARR[title] = "Wallpaper";
$NAVI_ARR[menu_id] = "media";

$NAVI_ARR[link][] = "wallpaperadd";
$NAVI_ARR[link][] = "wallpaperedit";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

//////////////////////////////
///// random pic
//////////////////////////////

$NAVI_ARR[title] = "Zufallsbild";
$NAVI_ARR[menu_id] = "media";

$NAVI_ARR[link][] = "randompic_cat";
$NAVI_ARR[link][] = "randompic_time_add";
$NAVI_ARR[link][] = "randompic_time";
$NAVI_ARR[link][] = "randompic_config";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

$ADMIN_ARR[title] = "Zufallsbild";
$ADMIN_ARR[id] = "randompic";

//////////////////////////////
///// downloads
//////////////////////////////

$NAVI_ARR[title] = "Downloads";
$NAVI_ARR[menu_id] = "media";

$NAVI_ARR[link][] = "dladd";
$NAVI_ARR[link][] = "dledit";
$NAVI_ARR[link][] = "dlcat";
$NAVI_ARR[link][] = "dlnewcat";
$NAVI_ARR[link][] = "dlconfig";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

//////////////////////////////
///// affiliates
//////////////////////////////

$NAVI_ARR[title] = "Partnerseiten";
$NAVI_ARR[menu_id] = "promo";

$NAVI_ARR[link][] = "partneradd";
$NAVI_ARR[link][] = "partneredit";
$NAVI_ARR[link][] = "partnerconfig";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

//////////////////////////////
///// shop
//////////////////////////////

$NAVI_ARR[title] = "Shop";
$NAVI_ARR[menu_id] = "promo";

$NAVI_ARR[link][] = "shopadd";
$NAVI_ARR[link][] = "shopedit";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

//////////////////////////////
///// designs
//////////////////////////////

$NAVI_ARR[title] = "Designs";
$NAVI_ARR[menu_id] = "styles";

$NAVI_ARR[link][] = "template_create";
$NAVI_ARR[link][] = "template_manage";
$NAVI_ARR[link][] = "csstemplate";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

//////////////////////////////
///// zones
//////////////////////////////

$NAVI_ARR[title] = "Zonen";
$NAVI_ARR[menu_id] = "styles";

$NAVI_ARR[link][] = "zone_create";
$NAVI_ARR[link][] = "zone_manage";
$NAVI_ARR[link][] = "zone_config";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

//////////////////////////////
///// templates
//////////////////////////////

$NAVI_ARR[title] = "Templates";
$NAVI_ARR[menu_id] = "styles";

$NAVI_ARR[link][] = "alltemplate";
$NAVI_ARR[link][] = "newstemplate";
$NAVI_ARR[link][] = "artikeltemplate";
$NAVI_ARR[link][] = "polltemplate";
$NAVI_ARR[link][] = "screenshottemplate";
//$NAVI_ARR[link][] = "wallpapertemplate";
$NAVI_ARR[link][] = "randompictemplate";
$NAVI_ARR[link][] = "dltemplate";
$NAVI_ARR[link][] = "shoptemplate";
$NAVI_ARR[link][] = "partnertemplate";
$NAVI_ARR[link][] = "usertemplate";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

//////////////////////////////
///// user
//////////////////////////////

$NAVI_ARR[title] = "Benutzer";
$NAVI_ARR[menu_id] = "user";

$NAVI_ARR[link][] = "useradd";
$NAVI_ARR[link][] = "useredit";
$NAVI_ARR[link][] = "userrights";
$NAVI_ARR[link][] = "userlist";
$NAVI_ARR[link][] = "userrights";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

//////////////////////////////
///// community map (german only!)
//////////////////////////////

$NAVI_ARR[title] = "Community Map";
$NAVI_ARR[menu_id] = "user";

$NAVI_ARR[link][] = "map&amp;landid=1";
$NAVI_ARR[link][] = "map&amp;landid=2";
$NAVI_ARR[link][] = "map&amp;landid=3";

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);

//////////////////////////////
///// profile/logout
//////////////////////////////

$NAVI_ARR[title] = "Profil";
$NAVI_ARR[menu_id] = "user";

$NAVI_ARR[link][] = "profil";

if ($_SESSION["user_level"] == "authorised") {
    $NAVI_ARR[link][] = "logout";
} else {
    $NAVI_ARR[link][] = "login";
}

$template_navi .= createnavi($NAVI_ARR, createnavi_first($template_navi));
$menu_show_arr[] = createmenu_show2arr($NAVI_ARR);
unset($NAVI_ARR);
############################
### END OF NAVI CREATION ###
############################





##############################
### START OF MENU CREATION ###
##############################

//////////////////////////////
///// explanation of menu creation
//////////////////////////////
/*
$tmp_arr[title] = "title"; //title of menu
$tmp_arr[id] = "id"; //id of menu, has to be unique
$tmp_arr[show] = createmenu_show($menu_show_arr,$tmp_arr[id]); //show menu?
$MENU_ARR[] = $tmp_arr;
unset($tmp_arr);

etc...

createmenu($MENU_ARR); //creates the menu-list
unset($MENU_ARR); //deletes the variable
*/

$tmp_arr[title] = "Allgemein"; //title of menu
$tmp_arr[id] = "general"; //id of menu, has to be unique
$tmp_arr[show] = createmenu_show($menu_show_arr,$tmp_arr[id]); //show menu?
$MENU_ARR[] = $tmp_arr;
unset($tmp_arr);

$tmp_arr[title] = "News & Content"; //title of menu
$tmp_arr[id] = "content"; //id of menu, has to be unique
$tmp_arr[show] = createmenu_show($menu_show_arr,$tmp_arr[id]); //show menu?
$MENU_ARR[] = $tmp_arr;
unset($tmp_arr);

$tmp_arr[title] = "Media"; //title of menu
$tmp_arr[id] = "media"; //id of menu, has to be unique
$tmp_arr[show] = createmenu_show($menu_show_arr,$tmp_arr[id]); //show menu?
$MENU_ARR[] = $tmp_arr;
unset($tmp_arr);

$tmp_arr[title] = "Promotion"; //title of menu
$tmp_arr[id] = "promo"; //id of menu, has to be unique
$tmp_arr[show] = createmenu_show($menu_show_arr,$tmp_arr[id]); //show menu?
$MENU_ARR[] = $tmp_arr;
unset($tmp_arr);

$tmp_arr[title] = "Styles"; //title of menu
$tmp_arr[id] = "styles"; //id of menu, has to be unique
$tmp_arr[show] = createmenu_show($menu_show_arr,$tmp_arr[id]); //show menu?
$MENU_ARR[] = $tmp_arr;
unset($tmp_arr);

$tmp_arr[title] = "User"; //title of menu
$tmp_arr[id] = "user"; //id of menu, has to be unique
$tmp_arr[show] = createmenu_show($menu_show_arr,$tmp_arr[id]); //show menu?
$MENU_ARR[] = $tmp_arr;
unset($tmp_arr);
############################
### END OF MENU CREATION ###
############################


##################################
### START OF MENU/NAVI DISPLAY ###
##################################
echo'<div id="menu_top_left"></div>
<div id="menu_top_loop">';

createmenu($MENU_ARR); //creates the menu-list
unset($MENU_ARR); //deletes the variable

echo '</div>
<div id="menu_top_right">';

if ($_SESSION["user_level"] == "authorised") {
    echo '<a href="'.$PHP_SELF.'?go=logout" target="_self" class="menu_link">Logout</a>';
} else {
    $menu_class = "menu_link";
    if ($go=="login") {
        $menu_class = "menu_link_selected";
    }
    echo '<a href="'.$PHP_SELF.'?go=login" target="_self" class="'.$menu_class.'">Login</a>';
}

echo '</div>

<div id="bg"><div id="bg_padding">

     <div id="navi_container">';

if ($template_navi == "") {
    $template_navi = '
        <div id="navi_top" style="height:43px;">
            <img src="img/pointer.png" alt="">&nbsp;&nbsp;<b>Hallo Admin!</b>
            <div id="navi_link">
               Herzlich Willkommen
               im Admin-CP des Frogsystem 2!
            </div>

    </div>';
}

echo $template_navi;
echo '</div>';
################################
### END OF MENU/NAVI DISPLAY ###
################################


echo'
     <div id="content_container">
         <div id="content_top"></div>
         <div id="content_padding">
             <img border="0" src="img/pointer.png" alt="" style="vertical-align:middle">
             <span style="font-size:8pt;"><b>'.$pagetitle.'</b></span>
             <br /><br />
             <div align="center">
';


//////////////////////////////
///// content includes
//////////////////////////////

include($filetoinc);

//////////////////////////////
////// footer
//////////////////////////////

echo'
             </div>
         </div>
         <div id="content_foot"></div>
     </div>

</div></div>

</body>
</html>
';

mysql_close($db);

?>