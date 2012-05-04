<?php
  //news comment configuration - we use that until we have a separate feedback config
  $index = mysql_query('SELECT * FROM '.$global_config_arr['pref'].'news_config', $db);
  $config_arr = mysql_fetch_assoc($index);
  //editor configuration
  $index = mysql_query('SELECT * FROM '.$global_config_arr['pref'].'editor_config', $db);
  $editor_config = mysql_fetch_assoc($index);


  /***************************
   * adding new issue / note *
   ***************************/

  if (isset($_POST['add_note']))
  {

    // Anti-Spam-Captcha
    if ($config_arr['com_antispam']==1 && $_SESSION['user_id'])
    {
      $anti_spam = check_captcha ($_POST['spam'], 0);
    }
    else
    {
      $anti_spam = check_captcha ($_POST['spam'], $config_arr['com_antispam']);
    }

    //content check
    if ((trim($_POST['name']) != '' || $_SESSION['user_id'])
         && trim($_POST['title']) != ''
         && trim($_POST['text']) != ''
         && trim($_POST['content_type']) != ''
         && trim($_POST['content_id']) != ''
         && $anti_spam == true)
    {

      // security functions
      $_POST['text'] = savesql(trim($_POST['text']));
      $_POST['name'] = savesql(trim($_POST['name']));
      $_POST['title'] = savesql(trim($_POST['title']));
      $_POST['content_type'] = savesql(trim($_POST['content_type']));
      $_POST['content_id'] = intval($_POST['content_id']);
      settype ($_SESSION['user_id'], 'integer');
      //get current time and IP
      $note_date = time();
      $ip = savesql($_SERVER['REMOTE_ADDR']);

      //create new issue
      mysql_query('INSERT INTO `'.$global_config_arr['pref'].'feedback_issues` '
                 .'SET content_type=\''.$_POST['content_type']
                 ."', content_id='".$_POST['content_id']."', status='0'", $db);
      $issue_id = intval(mysql_insert_id($db));

      //save note
      mysql_query('INSERT INTO `'.$global_config_arr['pref'].'feedback_notes` '
                 .'SET issue_id='.$issue_id.", note_poster='".$_POST['name']
                 ."', note_poster_id='".$_SESSION['user_id'] ."', note_poster_ip='".$ip
                 ."', note_date='".$note_date."', note_title='".$_POST['title']
                 ."', note_text='".$_POST['text']."', is_starter=1", $db);

      //check if we have a user related to the reported content
      require_once(FS2_ROOT_PATH.'includes/feedbackfunctions.php');
      $user_id = getFeedbackRelatedUserID($_POST['content_type'], $_POST['content_id']);
      if ($user_id!=0 && is_in_staff($user_id))
      {
        //now get the mail adress of that staff member
        $result = mysql_query('SELECT user_id, user_name, user_mail FROM '.$global_config_arr['pref'].'user '
                             .'WHERE user_id = \''.$user_id."' LIMIT 1", $db );
        if($row = mysql_fetch_assoc($result))
        {
          $to = stripslashes($row['user_mail']);
          $site = $global_config_arr['virtualhost'];
          $subject = 'Neue Meldung auf '.$site;
          $text = 'Hallo '.$row['user_name']."!\n\n"
                 .'Ein Benutzer hat eine neue Meldung zu ';
          switch ($_POST['content_type'])
          {
            case 'article':
                 $text .= 'einem von dir verfassten Artikel';
                 break;
            case 'dl':
            case 'download':
                 $text .= 'einem von dir eingestellten Download';
                 break;
            default:
                 //just in case... should not really get here
                 $text .= 'einem deiner Inhalte';
                 break;
          }//swi
          $text .= ' auf '.$site.' abgegeben.'."\n"
                  .'Bitte logge dich dort ein und sieh dir die Details dazu an.'."\n\n"
                  .'Viele Gruesse,'."\n"
                  .'Das Feedbacksystem';
          $did_mail = send_mail($to, $subject, $text, 'plain');
        }
        else
        {
          $did_mail = false;
        }
      }//if user should get mail
      else
      {
        $did_mail = false;
      }


      //generate forward message
      if ($did_mail)
      {
        $template = forward_message('R&uuml;ckmeldungen', 'Vielen Dank!<br>Deine Notiz wurde gespeichert und der Staff benachrichtigt.', 'index.php');
      }
      else
      {
        $template = forward_message('R&uuml;ckmeldungen', 'Vielen Dank!<br>Deine Notiz wurde gespeichert.', 'index.php');
      }

    }//if required fields are set
    else
    {
      if ($anti_spam!==true)
      {
        $template = sys_message('R&uuml;ckmeldung wurde nicht hinzugef&uuml;gt', $phrases['comment_spam']);
      }
      else
      {
        $template = sys_message('R&uuml;ckmeldung wurde nicht hinzugef&uuml;gt', 'Es sind nicht alle notwendigen Felder ausgef&uuml;llt!');
      }
    }//else (not all required fields are set)


  } //if add_note

  /************************************
   * form for adding new issues/notes *
   ************************************/

  else if (true)  //yes, "nice" condition - we'll change it later
  {
    // Text formatieren
    switch ($config_arr['html_code'])
    {
      case 1:
      case 2:
           $html = false;
           break;
      case 3:
      case 4:
           $html = true;
           break;
    }
    switch ($config_arr['fs_code'])
    {
      case 1:
      case 2:
           $fs = false;
           break;
      case 3:
      case 4:
           $fs = true;
           break;
    }
    switch ($config_arr['para_handling'])
    {
      case 1:
      case 2:
           $para = false;
           break;
      case 3:
      case 4:
           $para = true;
           break;
    }

    //FScode-Html Anzeige
    $fs_active = ($fs) ? 'an' : 'aus';
    $html_active = ($html) ? 'an' : 'aus';

    // Get Comments Form Name Template - will temporarily use the news comments form
    $form_name = new template();
    $form_name->setFile('0_feedback.tpl');
    $form_name->load('COMMENT_FORM_NAME');
    $form_name = $form_name->display ();

    if ( isset ( $_SESSION['user_name'] ) ) {
        $form_name = kill_replacements ( $_SESSION['user_name'], TRUE );
        $form_name .= '<input type="hidden" name="name" id="name" value="1">';
    }

    // Get Comments Captcha Template
    $form_spam = new template();
    $form_spam->setFile('0_feedback.tpl');
    $form_spam->load('COMMENT_CAPTCHA');
    $form_spam->tag('captcha_url', FS2_ROOT_PATH . 'resources/captcha/captcha.php?i='.generate_pwd(8) );
    $form_spam = $form_spam->display ();

    // Get Comments Form Name Template
    $form_spam_text = new template();
    $form_spam_text->setFile('0_feedback.tpl');
    $form_spam_text->load('COMMENT_CAPTCHA_TEXT');
    $form_spam_text = $form_spam_text->display ();

    if (
                    $config_arr['com_antispam'] == 0 ||
                    ( $config_arr['com_antispam'] == 1 && $_SESSION['user_id'] ) ||
                    ( $config_arr['com_antispam'] == 3 && is_in_staff ( $_SESSION['user_id'] ) )
            )
    {
        $form_spam = '';
        $form_spam_text ='';
    }

    //Textarea
    $template_textarea = create_textarea('text', '', $editor_config['textarea_width'], $editor_config['textarea_height'],
                                         'text', false, $editor_config['smilies'], $editor_config['bold'], $editor_config['italic'],
                                         $editor_config['underline'], $editor_config['strike'], $editor_config['center'],
                                         $editor_config['font'], $editor_config['color'], $editor_config['size'], $editor_config['img'],
                                         $editor_config['cimg'], $editor_config['url'], $editor_config['home'], $editor_config['email'],
                                         $editor_config['code'], $editor_config['quote'], $editor_config['noparse']);

    //check GET parameters
    if (!isset($_GET['id']))
    {
      $_GET['id'] = 0;
      $_GET['type'] = 'general';
    }
    $_GET['id'] = intval($_GET['id']);

    if (!isset($_GET['type']))
    {
      $_GET['type'] = 'general';
    }
    if (($_GET['type']!=='article') && ($_GET['type']!=='dl') && ($_GET['type']!=='download'))
    {
      $_GET['type'] = 'general';
    }


    // Get Comment Form Template
    $template = new template();
    $template->setFile('0_feedback.tpl');
    $template->load('COMMENT_FORM');

    $template->tag('content_id', $_GET['id']);
    $template->tag('content_type', $_GET['type']);
    $template->tag('name_input', $form_name);
    $template->tag('textarea', $template_textarea);
    $template->tag('html', $html_active);
    $template->tag('fs_code', $fs_active);
    $template->tag('captcha', $form_spam);
    $template->tag('captcha_text',$form_spam_text);

    $template = $template->display ();
    $comment_form_template = $template;


    if ( true )
    {
      // Get Comments Body Template
      $template = new template();
      $template->setFile('0_feedback.tpl');
      $template->load('COMMENT_BODY');

      $template->tag('news', '' );
      $template->tag('comments', '');
      $template->tag('comment_form', $comment_form_template );

      $template = $template->display ();
      //$template = $message_template . $template;
    }

  }//if note form

?>
