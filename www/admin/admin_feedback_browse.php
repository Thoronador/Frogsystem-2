<?php
/*
    This file is part of the Frogsystem Feedback List.
    Copyright (C) 2012  Thoronador

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



/**********************
 * list of all issues *
 **********************/

  if (!isset($_GET['details']))
  {
    // list all issues
    $query = mysql_query('SELECT * FROM '.$global_config_arr['pref'].'feedback_issues', $db);

    if (mysql_num_rows($query)<=0)
    {
      echo 'Es sind keine R&uuml;ckmeldungen verf&uuml;gbar!';
    }
    else
    {
      echo '<table border="0" cellpadding="2" cellspacing="0" width="600">
              <tr>
                <td class="config"><b>#</b></td>
                <td class="config"><b>betrifft</b></td>
                <td class="config"><b>Details</b></td>
                <td class="config"><b>Status</b></td>
              </tr>';
      while ($row = mysql_fetch_assoc($query))
      {
        echo '<tr>
                <td class="configthin">'.$row['issue_id'].'</td>
                <td class="configthin">';
        //check type
        if ($row['content_type']=='article')
        {
          echo 'Artikel #'.$row['content_id'];
          $sub_query = mysql_query('SELECT article_id, article_url, article_title '
                                  .'FROM '.$global_config_arr['pref'].'articles WHERE article_id='.$row['content_id'], $db);
          if ($sub = mysql_fetch_assoc($sub_query))
          {
            echo ' <a href="../?go='.$sub['article_url'].'" target=_blank">&quot;'.$sub['article_title'].'&quot;</a>';
          }
          else
          {
            echo '(unbekannt/gel&ouml;scht)';
          }
        }
        else if ($row['content_type']=='download' || $row['content_type']=='dl')
        {
          echo 'Download #'.$row['content_id'];
          $sub_query = mysql_query('SELECT dl_id, dl_name '
                                  .'FROM '.$global_config_arr['pref'].'dl WHERE dl_id=',$row['content_id'], $db);
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
                <td class="configthin"><a href="?go=feedback_browse&amp;details='.$row['issue_id'].'">Details ansehen</a></td>
                <td class="configthin">';
        switch ($row['status'])
        {
          case 0:
               echo 'Offen';
               break;
          case 1:
               echo 'Erledigt';
               break;
          case 2:
               echo 'Wird nicht behoben'; //"won't fix", that is
               break;
          default:
               echo 'unbekannt';
               break;
        }//swi
        echo '</td>
              </tr>';
      }//while
      echo '</table>';
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
                <td class="config">Status: ';
        switch ($row['status'])
        {
          case 0:
               echo 'Offen';
               break;
          case 1:
               echo 'Erledigt';
               break;
          case 2:
               echo 'Wird nicht behoben'; //"won't fix", that is
               break;
          default:
               echo 'unbekannt';
               break;
        }//swi
        echo '</td>
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
          echo '<br><br>'.date('d.m.Y, H:i \U\h\r', $row['note_date']).'</td>
                <td class ="configthin"><b>'.killhtml($row['note_title']).'</b><br><br>'.killhtml($row['note_text']).'</td>
              </tr>
              <tr><td colspan="2"><hr width="80%"></td></tr>';
        }//while
        echo '</table><br><br><a href="?go=feedback_browse">Zur&uuml;ck zur &Uuml;bersicht</a>';
      }//else

    }//else

  }//else branch (show details)

?>