<?php

  if (isset($_GET['uid']) && isset($_GET['action']))
  {
    $_GET['uid'] = intval($_GET['uid']);
    $index = $FD->sql()->conn()->query('SELECT COUNT(*) FROM '.$FD->config('pref')."team WHERE user_id='".$_GET['uid']."' LIMIT 1");
    $found = $index->fetchColumn();
    $found = ($found > 0);

    if ($_GET['action'] == 'up')
    {
      //TODO
    }
    else if ($_GET['action'] == 'down')
    {
      //TODO
    }
    else if ($_GET['action'] == 'del')
    {
      //TODO
    }
  }


  echo '<table class="configtable" cellpadding="4" cellspacing="0">
  <tr><td class="line" colspan="3">Aktive Teammitglieder</td></tr>
  <tr><td class="space"></td></tr>
</table>
';

  $index = $FD->sql()->conn()->query('SELECT COUNT(*) FROM '.$FD->config('pref').'team WHERE is_ex_member=0');
  $cur_members = $index->fetchColumn();
  if ($cur_members>0)
  {
    echo '<table class="configtable" cellpadding="2" cellspacing="0">
    <tr>
      <td width="175"></td>
      <td class="config" width="100">
        Name
      </td>
      <td class="config" style="padding-right:30px;">
        Sortierung
      </td>
      <td class="config" style="text-align:center;" width="70">
        Bearbeiten
      </td>
      <td class="config" style="text-align:center;" width="70">
        L&ouml;schen
      </td>
      <td width="175"></td>
    </tr>
';
    $index = $FD->sql()->conn()->query('SELECT *
                        FROM `'.$FD->config('pref').'team` LEFT JOIN `'.$FD->config('pref').'user`
                        ON `'.$FD->config('pref').'team`.user_id=`'.$FD->config('pref').'user`.user_id
                        WHERE is_ex_member = 0
                        ORDER BY `sort_order`');
    $i = 1;
    while ($row = $index->fetch(PDO::FETCH_ASSOC))
    {
      echo '<tr>
            <td></td>
            <td>'.htmlentities($row['user_name']).'</td>
            <td>';
      $arrow_up = '<a class="image_hover" style="margin-right:3px; float:right; width:24px; height:24px; background-image:url('.$FD->config('virtualhost').'admin/icons/arrow_up.png)" href="'.$_SERVER['PHP_SELF'].'?go='.$_GET['go'].'&amp;uid='.$row['user_id'].'&amp;action=up" title="'.$FD->text('page', 'user_up').'">
                <img border="0" src="img/null.gif" alt="'.$FD->text('page', 'user_up').'"></a>';
      $arrow_down = '<a class="image_hover" style="margin-right:36px; float:right; width:24px; height:24px; background-image:url('.$FD->config('virtualhost').'admin/icons/arrow_down.png)" href="'.$_SERVER['PHP_SELF'].'?go='.$_GET['go'].'&amp;uid='.$row['user_id'].'&amp;action=down" title="'.$FD->text('page', 'user_down').'">
                <img border="0" src="img/null.gif" alt="'.$FD->text('page', 'user_down').'"></a>';
      if ($i != 1)
      {
        echo $arrow_up;
      }
      if ($i != $cur_members)
      {
        echo $arrow_down;
      }
      echo '</td>';
      echo '<td><a href="'.$_SERVER['PHP_SELF'].'?go='.$_GET['go'].'&amp;uid='.$row['user_id'].'&amp;action=edit">'.$FD->text('page', 'team_edit').'</a></td>';
      echo '<td><a href="'.$_SERVER['PHP_SELF'].'?go='.$_GET['go'].'&amp;uid='.$row['user_id'].'&amp;action=del">'.$FD->text('page', 'team_del').'</a></td></tr>';
      ++$i;
    }//while
    echo "</table>\n";
  }//if
  else
  {
    echo "<table>\n"
        .'<tr><td align="center" colspan="5" width="600">'.$FD->text('page', 'no_current_members')."</td></tr>\n"
        .'<tr><td class="space" colspan="5"></td></tr>'
        ."\n</table>\n";
  }


  $index = $FD->sql()->conn()->query('SELECT COUNT(*) FROM '.$FD->config('pref').'team WHERE is_ex_member=1');
  $ex_members = $index->fetchColumn();

  //ex members
  echo '<table class="configtable" cellpadding="4" cellspacing="0">
  <tr><td class="line" colspan="3">Ehemalige Teammitglieder</td></tr>
  <tr><td class="space"></td></tr>
</table>
';

  if ($ex_members>0)
  {
    echo '<table class="configtable" cellpadding="2" cellspacing="0">
    <tr>
      <td width="175"></td>
      <td class="config" width="100">
        Name
      </td>
      <td class="config" style="padding-right:30px;">
        Sortierung
      </td>
      <td class="config" style="text-align:center;" width="70">
        Bearbeiten
      </td>
      <td class="config" style="text-align:center;" width="70">
        L&ouml;schen
      </td>
      <td width="175"></td>
    </tr>
';
      $index = $FD->sql()->conn()->query('SELECT *
                        FROM `'.$FD->config('pref').'team` LEFT JOIN `'.$FD->config('pref').'user`
                        ON `'.$FD->config('pref').'team`.user_id=`'.$FD->config('pref').'user`.user_id
                        WHERE is_ex_member = 1
                        ORDER BY `sort_order`');
    $i = 1;
    while ($row = $index->fetch(PDO::FETCH_ASSOC))
    {
      echo '<tr>
            <td></td>
            <td>'.htmlentities($row['user_name']).'</td>
            <td>';
      $arrow_up = '<a class="image_hover" style="margin-right:3px; float:right; width:24px; height:24px; background-image:url('.$FD->config('virtualhost').'admin/icons/arrow_up.png)" href="'.$_SERVER['PHP_SELF'].'?go='.$_GET['go'].'&amp;uid='.$row['user_id'].'&amp;action=up" title="'.$FD->text('page', 'user_up').'">
                <img border="0" src="img/null.gif" alt="'.$FD->text('page', 'user_up').'"></a>';
      $arrow_down = '<a class="image_hover" style="margin-right:36px; float:right; width:24px; height:24px; background-image:url('.$FD->config('virtualhost').'admin/icons/arrow_down.png)" href="'.$_SERVER['PHP_SELF'].'?go='.$_GET['go'].'&amp;uid='.$row['user_id'].'&amp;action=down" title="'.$FD->text('page', 'user_down').'">
                <img border="0" src="img/null.gif" alt="'.$FD->text('page', 'user_down').'"></a>';
      if ($i != 1)
      {
        echo $arrow_up;
      }
      if ($i != $ex_members)
      {
        echo $arrow_down;
      }
      echo '</td>';
      echo '<td><a href="'.$_SERVER['PHP_SELF'].'?go='.$_GET['go'].'&amp;uid='.$row['user_id'].'&amp;action=edit">'.$FD->text('page', 'team_edit').'</a></td>';
      echo '<td><a href="'.$_SERVER['PHP_SELF'].'?go='.$_GET['go'].'&amp;uid='.$row['user_id'].'&amp;action=del">'.$FD->text('page', 'team_del').'</a></td></tr>';
      ++$i;
    }//while
    echo "</table>\n";
  } //if
  else
  {
    echo "<table>\n"
        .'<tr><td align="center" colspan="5" width="600">'.$FD->text('page', 'no_ex_members')."</td></tr>\n"
        .'<tr><td class="space" colspan="5"></td></tr>'
        ."\n</table>\n";
  }


?>
