<?php
    $TEMPLATE_GO = 'tpl_feedback';
    $TEMPLATE_FILE = '0_feedback.tpl';
    $TEMPLATE_EDIT = null;


    $tmp['name'] = 'COMMENT_CAPTCHA';
    $tmp['title'] = $FD->text("template", "news_comment_form_spam_title");
    $tmp['description'] = $FD->text("template", "news_comment_form_spam_description");
    $tmp['rows'] = '15';
    $tmp['cols'] = '66';
        $tmp['help'][0]['tag'] = 'captcha_url';
        $tmp['help'][0]['text'] = $FD->text("template", "news_comment_form_spam_help_1");
    $TEMPLATE_EDIT[] = $tmp;
    unset($tmp);


    $tmp['name'] = 'COMMENT_CAPTCHA_TEXT';
    $tmp['title'] = $FD->text("template", "news_comment_form_spamtext_title");
    $tmp['description'] = $FD->text("template", "news_comment_form_spam_description");
    $tmp['rows'] = '15';
    $tmp['cols'] = '66';
    $TEMPLATE_EDIT[] = $tmp;
    unset($tmp);


    $tmp['name'] = 'COMMENT_FORM_NAME';
    $tmp['title'] = $FD->text("template", "news_comment_form_name_title");
    $tmp['description'] = $FD->text("template", "news_comment_form_name_description");
    $tmp['rows'] = '10';
    $tmp['cols'] = '66';
    $TEMPLATE_EDIT[] = $tmp;
    unset($tmp);


$TEMPLATE_EDIT[] = array (
    'name' => 'COMMENT_FORM',
    'title' => $FD->text("template", "news_comment_form_title"),
    'description' => $FD->text("template", "news_comment_form_name_description"),
    'rows' => 20,
    'cols' => 66,
    'help' => array (
        array ( 'tag' => 'feedback_title', 'text' => 'Titel zum Kommentarformular' ),
        array ( 'tag' => 'content_id', 'text' => 'Datenbank-ID des zugeh&ouml;rigen Inhalts' ),
        array ( 'tag' => 'content_type', 'text' => 'Art des zugeh&ouml;rigen Inhalts' ),
        array ( 'tag' => 'name_input', 'text' => $FD->text('template', 'news_comment_form_name_input') ),
        array ( 'tag' => 'textarea', 'text' => $FD->text('template', 'news_comment_form_textarea') ),
        array ( 'tag' => 'html', 'text' => $FD->text('template', 'news_comment_form_html') ),
        array ( 'tag' => 'fs_code', 'text' => $FD->text('template', 'news_comment_form_fs_code') ),
        array ( 'tag' => 'captcha', 'text' => $FD->text('template', 'news_comment_form_captcha') ),
        array ( 'tag' => 'captcha_text', 'text' => $FD->text('template', 'news_comment_form_captcha_text') ),
    )
);


    $tmp['name'] = 'COMMENT_BODY';
    $tmp['title'] = $FD->text("template", "news_comment_container_title");
    $tmp['description'] = $FD->text("template", "news_comment_container_description");
    $tmp['rows'] = '15';
    $tmp['cols'] = '66';
        $tmp['help'][0]['tag'] = 'comments';
        $tmp['help'][0]['text'] = $FD->text("template", "news_comment_container_help_2");
        $tmp['help'][1]['tag'] = 'comment_form';
        $tmp['help'][1]['text'] = $FD->text("template", "news_comment_container_help_3");
    $TEMPLATE_EDIT[] = $tmp;
    unset($tmp);

  echo templatepage_init($TEMPLATE_EDIT, $TEMPLATE_GO, $TEMPLATE_FILE);
?>
