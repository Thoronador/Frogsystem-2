<?php
// Initialise Time Variables
$stats_year = date ( "Y" );
$stats_month = date ( "m" );
$stats_day = date ( "d" );


// Overall Data
$index = mysql_query ( "SELECT * FROM ".$global_config_arr['pref']."counter", $db );
$counter_arr = mysql_fetch_assoc ( $index ) ;


// Visitors today
$index = mysql_query ( "
                        SELECT
                            `s_hits`, `s_visits`
                        FROM
                            `".$global_config_arr['pref']."counter_stat`
                        WHERE
                            `s_year` = '".$stats_year."'
                        AND
                            `s_month` = '".$stats_month."'
                        AND
                            `s_day` = '".$stats_day."'
", $db);
$today_arr = mysql_fetch_assoc ( $index );


// Visitors online
$index = mysql_query ( "
                        SELECT
                            count(`ip`) AS 'total'
                        FROM
                            `".$global_config_arr['pref']."useronline`
", $db);
$useronline_arr['total'] = mysql_result ( $index, 0, "total" );

// Registered online
$index = mysql_query ( "
                        SELECT
                            count(`ip`) AS 'registered'
                        FROM
                            `".$global_config_arr['pref']."useronline`
                        WHERE
                            `user_id` != 0
", $db);
$useronline_arr['registered'] = mysql_result ( $index, 0, "registered" );

// Guests online
$index = mysql_query ( "
                        SELECT
                            count(`ip`) AS 'guests'
                        FROM
                            `".$global_config_arr['pref']."useronline`
                        WHERE
                            `user_id` = 0
", $db);
$useronline_arr['guests'] = mysql_result ( $index, 0, "guests" );


//Number of available files
$index = mysql_query('SELECT COUNT(file_id) AS files FROM `'.$global_config_arr['pref'].'dl_files`', $db);
$files = mysql_fetch_assoc($index);
$files = $files['files'];

//total size of all downloads
$index = mysql_query('SELECT SUM(file_size) AS totalsize FROM `'.$global_config_arr['pref'].'dl_files`', $db);
$totalsize = mysql_fetch_assoc($index);
if (is_null($totalsize['totalsize'])) //might be null, if no downloads exist
{
  $totalsize['totalsize'] = 0;
}
$totalsize = getsize($totalsize['totalsize']);

//Number of downloaded files
$index = mysql_query('SELECT SUM(file_count) AS totalloads FROM `'.$global_config_arr['pref'].'dl_files`', $db);
$loads = mysql_fetch_assoc($index);
$loads = $loads['totalloads'];
if (is_null($loads)) //might be null, if there are no downloads yet
{
  $loads = 0;
}

//traffic
$index = mysql_query('SELECT SUM(file_count*file_size) AS traffic FROM `'.$global_config_arr['pref'].'dl_files`', $db);
$traffic = mysql_fetch_assoc($index);
if (is_null($traffic['traffic'])) //can be null, if no downloads exist yet
{
  $traffic['traffic'] = 0;
}
$traffic = getsize($traffic['traffic']);


// Create Template
$template = new template();

$template->setFile("0_general.tpl");
$template->load("STATISTICS");

$template->tag("visits", point_number ( $counter_arr['visits'] ) );
$template->tag("visits_today", point_number ( $today_arr['s_visits'] ) );
$template->tag("hits", point_number ( $counter_arr['hits'] ) );
$template->tag("hits_today", point_number ( $today_arr['s_hits'] ) );
$template->tag("visitors_online", point_number ( $useronline_arr['total'] ) );
$template->tag("registered_online", point_number ( $useronline_arr['registered'] ) );
$template->tag("guests_online", point_number ( $useronline_arr['guests'] ) );

$template->tag("num_users", point_number ( $counter_arr['user'] ) );
$template->tag("num_news", point_number ( $counter_arr['news'] ) );
$template->tag("num_comments", point_number ( $counter_arr['comments'] ) );
$template->tag("num_articles", point_number ( $counter_arr['artikel'] ) );

$template->tag('files', $files);
$template->tag('filesize', $totalsize);
$template->tag('loads', $loads);
$template->tag('traffic', $traffic);


$template = $template->display();
?>
