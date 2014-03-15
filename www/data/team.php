<?php
  // get current team members
  $index = mysql_query ( "SELECT *
                          FROM `".$global_config_arr['pref']."team` LEFT JOIN `".$global_config_arr['pref']."user`
                          ON `".$global_config_arr['pref']."team`.user_id=`".$global_config_arr['pref']."user`.user_id
                          WHERE is_ex_member = 0
                          ORDER BY `sort_order`", $db);
  $cur_members = mysql_num_rows($index);

  $current = '';

  while ($row = mysql_fetch_assoc($index))
  {
    $template = new template();
    $template->setFile('0_team.tpl');
    $template->load('CURRENT');

    $template->tag ( 'name', $row['user_name'] );
    $user_image = ( image_exists('media/user-images/', $row['user_id']) ? '<img src="'.image_url('media/user-images/', $row['user_id']).'" alt="'.$TEXT->get("user_image_of")." ".htmlentities($row['user_name']).'">' : '' );
    $template->tag ( 'user_image', $user_image);
    $template->tag ( 'position', htmlentities($row['position']));
    $tasks = fscode($row['tasks'], true /*fscode*/, false/*html*/, false /*para*/);
    $template->tag ( 'tasks', $tasks);

    $current .= $template->display ();
  }//while

  $index = mysql_query ( "SELECT *
                          FROM `".$global_config_arr['pref']."team`
                          WHERE is_ex_member = 1
                          ORDER BY `sort_order`", $db);
  $ex_members = mysql_num_rows($index);

  $ex = '';
  while ($row = mysql_fetch_assoc($index))
  {
    $template = new template();
    $template->setFile('0_team.tpl');
    $template->load('EX_MEMBER');

    $template->tag ( 'name', $row['user_name'] );
    $user_image = ( image_exists('media/user-images/', $row['user_id']) ? '<img src="'.image_url('media/user-images/', $row['user_id']).'" alt="'.$TEXT->get("user_image_of")." ".htmlentities($row['user_name']).'">' : '' );
    $template->tag ( 'user_image', $user_image);
    $template->tag ( 'profile_url', '?go=user&amp;id='.$row['user_id']);
    $template->tag ( 'position', htmlentities($row['position']));
    $tasks = fscode($row['tasks'], true /*fscode*/, false/*html*/, false /*para*/);
    $template->tag ( 'tasks', $tasks);

    $ex .= $template->display ();
  }//while

  $template = new template();
  $template->setFile('0_team.tpl');
  $template->load('TEAM_BODY');
  
  $template->tag ( 'current_members', $current);
  $template->tag ( 'ex_members', $ex);

  $template = $template->display();

  $global_config_arr['dyn_title_page'] = 'Team';
?>
