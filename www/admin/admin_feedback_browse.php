<?php
/*
    This file is part of the Frogsystem Feedback List.
    Copyright (C) 2012, 2013  Thoronador

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


  //feedback-related functions
  require_once(FS2_ROOT_PATH.'includes/feedbackfunctions.php');

/******************************
 * add note via admin CP page *
 ******************************/

  if (isset($_POST['add_note']) && isset($_POST['issue_id'])
      && isset($_POST['note_title']) && isset($_POST['note_text']))
  {
    //security stuff
    $_POST['issue_id'] = intval($_POST['issue_id']);
    $_POST['note_title'] = savesql(trim($_POST['note_title']));
    $_POST['note_text'] = savesql(trim($_POST['note_text']));
    if ($_POST['note_text']!='')
    {
      //get additional data
      $ip = savesql($_SERVER['REMOTE_ADDR']);
      $note_date = time();
      //save note
      mysql_query('INSERT INTO `'.$global_config_arr['pref'].'feedback_notes` '
                 .'SET issue_id='.$_POST['issue_id'].", note_poster='".savesql($_SESSION['user_name'])
                 ."', note_poster_id='".intval($_SESSION['user_id'])."', note_poster_ip='".$ip
                 ."', note_date='".$note_date."', note_title='".$_POST['note_title']
                 ."', note_text='".$_POST['note_text']."', is_starter=0", $db);
      //put system message
      systext('Deine Notiz wurde gespeichert.', $TEXT['admin']->get('info'),
              false, $TEXT['admin']->get('icon_save_add'));
    }//if text is not empty
    else
    {
      //not all required fields filled
      systext('Du musst auch einen Text eingeben, wenn er gespeichert werden soll!');
    }
  }//if add note


/*******************************
 * status change for one issue *
 *******************************/

  if (isset($_POST['change_status']) && isset($_POST['issue_id'])
      && isset($_POST['new_status']))
  {
    //security stuff
    $_POST['issue_id'] = intval($_POST['issue_id']);
    $_POST['new_status'] = intval($_POST['new_status']);
    if ($_POST['new_status']>=feedbackStatusMin && $_POST['new_status']<=feedbackStatusMax)
    {
      //get additional data
      $ip = savesql($_SERVER['REMOTE_ADDR']);
      //update status
      mysql_query('UPDATE `'.$global_config_arr['pref'].'feedback_issues` '
                 .'SET status='.$_POST['new_status'].' WHERE issue_id='.$_POST['issue_id']
                 .' LIMIT 1', $db);
      //insert system-generated note about status change
      $note_text = savesql('*** Neuer Status: '.feedbackStatusToString($_POST['new_status']).' ***');
      mysql_query('INSERT INTO `'.$global_config_arr['pref'].'feedback_notes` '
                 .'SET issue_id='.$_POST['issue_id'].", note_poster='".savesql($_SESSION['user_name'])
                 ."', note_poster_id='".intval($_SESSION['user_id'])."', note_poster_ip='".$ip
                 ."', note_date='".time()."', note_title='Status aktualisiert', note_text='".$note_text
                 ."', is_starter=0", $db);
      //put system message
      systext('Der Status wurde aktualisiert.', $TEXT['admin']->get('info'),
              false, $TEXT['admin']->get('icon_save_add'));
    }//if acceptable status value
    else
    {
      //not an allowed status value
      systext('Der ausgew&auml;hlte Statuswert ist nicht zul&auml;ssig und wurde deshalb nicht gespeichert!',
              $TEXT['admin']->get('error'), true, $TEXT['admin']->get('icon_save_error'));
    }
  }//if add note

/**********************
 * list of all issues *
 **********************/

  if (!isset($_GET['details']))
  {
    // list all issues
    if (isset($_GET['status']))
    {
      $where_clause = ' WHERE status='.intval($_GET['status']);
    }
    else
    {
      $where_clause = '';
    }

    $query = mysql_query('SELECT * FROM '.$global_config_arr['pref'].'feedback_issues'.$where_clause.' ORDER BY issue_id DESC', $db);

    if (mysql_num_rows($query)<=0)
    {
      if ($where_clause==='')
      {
        echo 'Es sind keine R&uuml;ckmeldungen verf&uuml;gbar!';
      }
      else
      {
        echo 'Es sind keine R&uuml;ckmeldungen mit den entsprechenden Kriterien verf&uuml;gbar!<br>'
            .'<br><a href="?go=feedback_browse"><b>&rArr;</b> Alle verf&uuml;gbaren R&uuml;ckmeldungen anzeigen</a>';
      }
    }
    else
    {
      $stat_array = array(0 => 0, 1 => 0, 2 => 0, 3 => 0);
      echo '<table border="0" cellpadding="2" cellspacing="2" width="600">
              <tr>
                <td class="config"><b>#</b></td>
                <td class="config"><b>betrifft</b></td>
                <td class="config"><b>Details</b></td>
                <td class="config"><b>Status</b></td>
              </tr>';
      while ($row = mysql_fetch_assoc($query))
      {
        echo '<tr>
                <td class="configthin" style="border: 1px solid #000000;"><b>'.$row['issue_id'].'</b></td>
                <td class="configthin" style="border: 1px solid #000000;">';
        echo getFeedbackTitle($row['content_type'], $row['content_id'], true);
        echo '</td>
                <td class="configthin" style="border: 1px solid #000000;"><a href="?go=feedback_browse&amp;details='.$row['issue_id'].'">Details ansehen</a></td>
                <td class="configthin" style="border: 1px solid #000000;">'.feedbackStatusToString($row['status'], true).'</td>
              </tr>';
        //count status
        $stat_array[$row['status']] = $stat_array[$row['status']]+1;
      }//while
      echo '</table>';

      //status summary - only when no specific status is requested
      if (!isset($_GET['status']))
      {
        //Status "list"
        echo '<br><br><table border="0" cellpadding="2" cellspacing="2" width="600">
               <tr>
                 <td colspan="4" align="center" class="config"><b>Anzahl der R&uuml;ckmeldungen nach Status</b></td>
               </tr>
               <tr>';
        for ($i = 0; $i<4; $i = $i+1)
        {
          echo '<td class="configthin"><a href="?go=feedback_browse&amp;status='.$i.'">'.feedbackStatusToString($i)
               .': '.$stat_array[$i].'</a></td>';
        } //foreach
        echo "</tr>\n</table>";
      } //if not status-specific
      else
      {
        echo '<br><br><a href="?go=feedback_browse"><b>&rArr;</b> Alle verf&uuml;gbaren R&uuml;ckmeldungen anzeigen</a>';
      } //else branch (status-specific list)
    }//else branch (more than zero rows in result)
  }//if get->details not set

/***************************************
 * list of details for a certain issue *
 ***************************************/

  else
  {
    //show detailed list for one issue
    $_GET['details'] = intval($_GET['details']);

    $result = mysql_query('SELECT * FROM '.$global_config_arr['pref'].'feedback_issues WHERE issue_id='.$_GET['details'], $db);
    if (mysql_num_rows($result)<=0)
    {
      echo '<b>Es ist keine R&uuml;ckmeldung mit der angegebenen ID verf&uuml;gbar!</b>'
          .'<br><br><a href="?go=feedback_browse">Zur&uuml;ck zur &Uuml;bersicht</a>';
    }
    else
    {
      $issue = mysql_fetch_assoc($result);
      //now get all the notes/comments for that issue
      $result = mysql_query('SELECT *, IF(note_poster_id <>0, '.$global_config_arr['pref'].'user.user_name, note_poster) AS real_name '
                           .'FROM '.$global_config_arr['pref'].'feedback_notes '
                           .'LEFT JOIN '.$global_config_arr['pref'].'user ON note_poster_id=user_id WHERE issue_id='.$_GET['details'], $db);
      if (mysql_num_rows($result)<=0)
      {
        //should never happen, usually
        echo '<b>Zu dieser R&uuml;ckmeldung sind keine Eintr&auml;ge verf&uuml;gbar.</b>'
            .'<br><a href="?go=feedback_browse">Zur&uuml;ck zur &Uuml;bersicht</a>';
      }
      else
      {
        //list issue data itself
        echo '<table border="0" cellpadding="2" cellspacing="0" width="600">
              <tr>
                <td class="config">R&uuml;ckmeldung #'.$_GET['details'].'</td>
                <td class="config">Betrifft: ';
        //check type
        if ($issue['content_type']=='article')
        {
          echo 'Artikel #'.$issue['content_id'];
          $sub_query = mysql_query('SELECT article_id, article_url, article_title '
                                  .'FROM '.$global_config_arr['pref'].'articles WHERE article_id='.$issue['content_id'], $db);
          if ($sub = mysql_fetch_assoc($sub_query))
          {
            echo ' <a href="../?go='.$sub['article_url'].'" target=_blank">&quot;'.$sub['article_title'].'&quot;</a>';
          }
          else
          {
            echo '(unbekannt/gel&ouml;scht)';
          }
        }
        else if ($issue['content_type']=='download' || $issue['content_type']=='dl')
        {
          echo 'Download #'.$issue['content_id'];
          $sub_query = mysql_query('SELECT dl_id, dl_name '
                                  .'FROM '.$global_config_arr['pref'].'dl WHERE dl_id='.$issue['content_id'], $db);
          if ($sub = mysql_fetch_assoc($sub_query))
          {
            echo ' <a href="../?go=dlfile&amp;id='.$sub['dl_id'].'" target=_blank">&quot;'.$sub['dl_name'].'&quot;</a>';
          }
          else
          {
            echo '(unbekannt/gel&ouml;scht)';
          }
        }
        else
        {
          //general site feedback
          echo 'Allgemeines';
        }
        echo '</td>
                <td class="config">Status: '.feedbackStatusToString($issue['status'], true).'</td>
              </tr>
            </table>';

        //list notes
        echo '<table border="0" cellpadding="2" cellspacing="0" width="600">
              <tr>
                <td class="config"><b>Autor</b></td>
                <td class="config"><b>Nachricht</b></td>
              </tr>
              <tr><td colspan="2"><hr></td></tr>';
        while ($row = mysql_fetch_assoc($result))
        {
          echo '<tr>
                  <td class="configthin">'.$row['real_name'];
          if ($row['note_poster_id']==0)
          {
            echo '<br><small>(unregistriert)</small>';
          }
          else
          {
            echo '<br><small><a href="../?go=user&amp;id='.$row['note_poster_id'].'" target="_blank">(Profil)</a></small>';
          }
          $row['note_text'] = fscode( $row['note_text'], false /*all fs*/, false /*html*/, false /*para*/, 1 /*bold*/, 1 /*italic*/, 1 /*do_underline*/, 1 /*do_strike*/, 1 /*center*/, 1 /*url*/, 1 /*home*/, 1 /*email*/, 0 /*img*/, 0 /*cimg*/, 1 /*list*/, 1 /*numlist*/, 1 /*font*/, 1 /*color*/, 1 /*size*/, 1 /*code*/, 1 /*quote*/, 1 /*noparse*/, 1 /*smilies*/);
          echo '<br><br>'.date('d.m.Y, H:i \U\h\r', $row['note_date']).'</td>
                <td class ="configthin"><b>'.killhtml($row['note_title']).'</b><br><br>'.$row['note_text'].'</td>
              </tr>
              <tr><td colspan="2"><hr width="80%"></td></tr>';
        }//while
        echo '</table><br><br>';

        //form to add notes
        echo '<form method="post" action="?go=feedback_browse&amp;details='.$_GET['details'].'">
                <input type="hidden" name="issue_id" value="'.$_GET['details'].'">
                <input type="hidden" name="add_note" value="1">
                <table>
                  <tr>
                    <td class="config" colspan="2"><b>Notiz hinzuf&uuml;gen</b></td>
                  </tr>
                  <tr>
                    <td class="config"><b>Titel:</b></td>
                    <td class="config">
                      <input class="text" type="text" maxlength="100" size="30" name="note_title">
                    </td>
                  </tr>
                  <tr>
                    <td class="config"><b>Text:</b></td>
                    <td class="config">
                      <textarea class="nomonospace" style="width:355px; height:120px" name="note_text" cols="50" rows="7"></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td class="config">
                      <input class="button" type="submit" value="Abschicken">
                    </td>
                  </tr>
                </table>
              </form>';

        //status selection/change form
        echo '<form method="post" action="?go=feedback_browse&amp;details='.$_GET['details'].'">
                <input type="hidden" name="issue_id" value="'.$_GET['details'].'">
                <input type="hidden" name="change_status" value="1">
                <b>Status &auml;ndern:</b><br>
                <select name="new_status">
                  ';
        for ($i=feedbackStatusMin; $i<=feedbackStatusMax; $i=$i+1)
        {
          echo '  <option value="'.$i.'"';
          if ($i == $issue['status']) echo ' selected';
          echo '>'.feedbackStatusToString($i).'</option>';
        }//for
                  echo '
                </select>
                <input class="button" type="submit" value="&Auml;ndern">
              </form>';

        //link back to list
        echo '<br><br><a href="?go=feedback_browse">Zur&uuml;ck zur &Uuml;bersicht</a>';
      }//else
    }//else
  }//else branch (show details)
?>
