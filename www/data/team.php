<?php
  // get current team members
  $index = $FD->sql()->conn()->query( "SELECT *
                          FROM `".$FD->config('pref')."team` LEFT JOIN `".$FD->config('pref')."user`
                          ON `".$FD->config('pref')."team`.user_id=`".$FD->config('pref')."user`.user_id
                          WHERE is_ex_member = 0
                          ORDER BY `sort_order`");

  $current = '';

  while ($row = $index->fetch(PDO::FETCH_ASSOC))
  {
    $template = new template();
    $template->setFile('0_team.tpl');
    $template->load('CURRENT');

    $template->tag ( 'name', $row['user_name'] );
    $user_image = ( image_exists('media/user-images/', $row['user_id']) ? '<img src="'.image_url('media/user-images/', $row['user_id']).'" alt="'.$FD->text('frontend', 'user_image_of').' '.htmlentities($row['user_name']).'">' : '' );
    $template->tag ( 'user_image', $user_image);
    $template->tag ( 'position', htmlentities($row['position']));
    $tasks = fscode($row['tasks'], true /*fscode*/, false/*html*/, false /*para*/);
    $template->tag ( 'tasks', $tasks);

    $current .= $template->display();
  }//while

  $index = $FD->sql()->conn()->query( "SELECT *
                          FROM `".$FD->config('pref')."team`
                          WHERE is_ex_member = 1
                          ORDER BY `sort_order`");

  $ex = '';
  while ($row = $index->fetch(PDO::FETCH_ASSOC))
  {
    $template = new template();
    $template->setFile('0_team.tpl');
    $template->load('EX_MEMBER');

    $template->tag ( 'name', $row['user_name'] );
    $user_image = ( image_exists('media/user-images/', $row['user_id']) ? '<img src="'.image_url('media/user-images/', $row['user_id']).'" alt="'.$FD->text('frontend', 'user_image_of').' '.htmlentities($row['user_name']).'">' : '' );
    $template->tag ( 'user_image', $user_image);
    $template->tag ( 'profile_url', '?go=user&amp;id='.$row['user_id']);
    $template->tag ( 'position', htmlentities($row['position']));
    $tasks = fscode($row['tasks'], true /*fscode*/, false/*html*/, false /*para*/);
    $template->tag ( 'tasks', $tasks);

    $ex .= $template->display();
  }//while

  $template = new template();
  $template->setFile('0_team.tpl');
  $template->load('TEAM_BODY');

  $template->tag ( 'current_members', $current);
  $template->tag ( 'ex_members', $ex);

  $template = $template->display();

  $FD->setConfig('info', 'page_title', 'Team');
?>
