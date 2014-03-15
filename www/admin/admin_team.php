<?php

echo '<table class="configtable" cellpadding="4" cellspacing="0">
  <tr><td class="line" colspan="3">Aktive Teammitglieder</td></tr>
  <tr><td class="space"></td></tr>
</table>

<form action="" method="post">
  <input type="hidden" value="editor_smilies" name="go">
  <table class="configtable" cellpadding="2" cellspacing="0">
    <tr>
      <td width="175"></td>
      <td class="config" width="100">
        Name
      </td>
      <td class="config" style="padding-right:30px;">
        Sortierung
      </td>
      <td class="config" style="text-align:center;" width="70">
        L&ouml;schen
      </td>
      <td width="175"></td>
    </tr>
';

$index = mysql_query("SELECT *
                        FROM `".$global_config_arr['pref']."team` LEFT JOIN `".$global_config_arr['pref']."user`
                        ON `".$global_config_arr['pref']."team`.user_id=`".$global_config_arr['pref']."user`.user_id
                        WHERE is_ex_member = 0
                        ORDER BY `sort_order`", $db);
  $cur_members = mysql_num_rows($index);

  if ($cur_members>0)
  {
    while ($row = mysql_fetch_assoc($index))
    {
      echo '<td></td>
            <td>'.$row['user_name'].'</td>
            
    }//while
  }//if


echo '<table class="configtable" cellpadding="4" cellspacing="0">
  <tr><td class="line" colspan="3">Ehemalige Teammitglieder</td></tr>
  <tr><td class="space"></td></tr>
</table>

<form action="" method="post">
  <input type="hidden" value="editor_smilies" name="go">
  <table class="configtable" cellpadding="2" cellspacing="0">
    <tr>
      <td width="175"></td>
      <td class="config" width="100">
        Name
      </td>
      <td class="config" style="padding-right:30px;">
        Sortierung
      </td>
      <td class="config" style="text-align:center;" width="70">
        L&ouml;schen
      </td>
      <td width="175"></td>
    </tr>
';



?>
