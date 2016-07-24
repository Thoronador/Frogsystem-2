<?php
// get persistent worlds from DB
$index = mysql_query ( "SELECT `persistent_name`, `persistent_link`, `persistent_url`
                        FROM `".$global_config_arr['pref']."persistent`
                        ORDER BY `persistent_name`", $db );

// initialize items
$applet_items = "";

// create entry templates
while ( $pworld_arr = mysql_fetch_assoc($index) )
{
    $template_item = new template();
    $template_item->setFile("0_persistent_worlds.tpl");
    $template_item->load("applet_entry");

    $template_item->tag("name", htmlentities($pworld_arr['persistent_name']) );
    $template_item->tag("detail_url", $global_config_arr['virtualhost']
                      . '?go=persistentdetail&amp;pw=' . htmlentities($pworld_arr['persistent_link']) );

    $applet_items .= $template_item->display();
}

// body template
$template = new template();
$template->setFile("0_persistent_worlds.tpl");
$template->load("applet_body");
$template->tag("entries", $applet_items);

// display template
$template = $template->display();
?>
