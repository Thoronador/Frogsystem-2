<?php
header("Content-type: text/javascript");

include("login.inc.php");

@$db = mysql_connect($host, $user, $pass);
if ($db)
{
    mysql_select_db($data,$db);

    $global_config_arr[pref] = $pref;

    $index = mysql_query("SELECT js_userfunctions FROM ".$global_config_arr[pref]."template WHERE id = (SELECT design FROM ".$global_config_arr[pref]."global_config WHERE id=1)",$db);
    $template = mysql_result($index, 0, "js_userfunctions");
    echo $template;
}
?>