<?php
/*
    This file is part of the Frogsystem Feedback list.
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



  /* returns the ID of the user that created the specified content, if any.
     If no user is found, the function returns zero.

     parameters:
         content_type - specifies the content's type (either 'article' or 'dl')
         content_id   - internal ID of the related content
  */
  function getFeedbackRelatedUserID($content_type, $content_id)
  {
    global $global_config_arr;
    global $db;

    $content_id = intval($content_id);
    if ($content_type==='article')
    {
      $result = mysql_query('SELECT article_id, article_user FROM '.$global_config_arr['pref'].'articles '
                           .'WHERE article_id='.$content_id, $db);
      if ($row = mysql_fetch_assoc($result))
      {
        return $row['article_user'];
      }
      return 0;
    }
    else if (($content_type==='dl') || ($content_type==='download'))
    {
      $result = mysql_query('SELECT dl_id, user_id FROM '.$global_config_arr['pref'].'dl '
                           .'WHERE dl_id='.$content_id, $db);
      if ($row = mysql_fetch_assoc($result))
      {
        return $row['user_id'];
      }
      return 0;
    }
    //must be general stuff or something like that
    return 0;
  }//func

  //constants for status code limits
  define('feedbackStatusMin', 0);
  define('feedbackStatusMax', 3);

  /* returns a string indicating the meaning of the status value

     parameters:
         status     - (int)  the status code
         withColour - (bool) if true, the string is enclosed in HTML tags to
                             get a appropriate colour for the status
  */
  function feedbackStatusToString($status, $withColour = false)
  {
    switch ($status)
    {
      case 0:
           if ($withColour) return '<font color="#ff0000">Offen</font>';
           return 'Offen';
           break;
      case 1:
           if ($withColour) return '<font color="#ff8000">Wird nicht behoben</font>';
           return 'Wird nicht behoben'; //"won't fix", that is
           break;
      case 2:
           if ($withColour) return '<font color="#70A010">In Bearbeitung</font>';
           return 'In Bearbeitung';
           break;
      case 3:
           if ($withColour) return '<font color="#008000">Erledigt</font>';
           return 'Erledigt';
           break;
      default:
           if ($withColour) return '<font color="#c000c0">unbekannt</font>';
           return 'unbekannt';
           break;
    }//swi
  }//func
?>