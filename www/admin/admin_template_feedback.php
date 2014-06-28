<?php
    $TEMPLATE_GO = 'tpl_feedback';
    $TEMPLATE_FILE = '0_feedback.tpl';
    $TEMPLATE_EDIT = null;


    $tmp['name'] = 'COMMENT_CAPTCHA';
    $tmp['title'] = $admin_phrases['template']['news_comment_form_spam']['title'];
    $tmp['description'] = $admin_phrases['template']['news_comment_form_spam']['description'];
    $tmp['rows'] = '15';
    $tmp['cols'] = '66';
        $tmp['help'][0]['tag'] = 'captcha_url';
        $tmp['help'][0]['text'] = $admin_phrases['template']['news_comment_form_spam']['help_1'];
    $TEMPLATE_EDIT[] = $tmp;
    unset($tmp);


    $tmp['name'] = 'COMMENT_CAPTCHA_TEXT';
    $tmp['title'] = $admin_phrases['template']['news_comment_form_spamtext']['title'];
    $tmp['description'] = $admin_phrases['template']['news_comment_form_spamtext']['description'];
    $tmp['rows'] = '15';
    $tmp['cols'] = '66';
    $TEMPLATE_EDIT[] = $tmp;
    unset($tmp);


    $tmp['name'] = 'COMMENT_FORM_NAME';
    $tmp['title'] = $admin_phrases['template']['news_comment_form_name']['title'];
    $tmp['description'] = $admin_phrases['template']['news_comment_form_name']['description'];
    $tmp['rows'] = '10';
    $tmp['cols'] = '66';
    $TEMPLATE_EDIT[] = $tmp;
    unset($tmp);


$TEMPLATE_EDIT[] = array (
    'name' => 'COMMENT_FORM',
    'title' => $TEXT['template']->get('news_comment_form_title'),
    'description' => $TEXT['template']->get('news_comment_form_desc'),
    'rows' => 20,
    'cols' => 66,
    'help' => array (
        array ( 'tag' => 'feedback_title', 'text' => 'Titel zum Kommentarformular' ),
        array ( 'tag' => 'content_id', 'text' => 'Datenbank-ID des zugeh&ouml;rigen Inhalts' ),
        array ( 'tag' => 'content_type', 'text' => 'Art des zugeh&ouml;rigen Inhalts' ),
        array ( 'tag' => 'name_input', 'text' => $TEXT['template']->get('news_comment_form_name_input') ),
        array ( 'tag' => 'textarea', 'text' => $TEXT['template']->get('news_comment_form_textarea') ),
        array ( 'tag' => 'html', 'text' => $TEXT['template']->get('news_comment_form_html') ),
        array ( 'tag' => 'fs_code', 'text' => $TEXT['template']->get('news_comment_form_fs_code') ),
        array ( 'tag' => 'captcha', 'text' => $TEXT['template']->get('news_comment_form_captcha') ),
        array ( 'tag' => 'captcha_text', 'text' => $TEXT['template']->get('news_comment_form_captcha_text') ),
    )
);


    $tmp['name'] = 'COMMENT_BODY';
    $tmp['title'] = $admin_phrases['template']['news_comment_container']['title'];
    $tmp['description'] = $admin_phrases['template']['news_comment_container']['description'];
    $tmp['rows'] = '15';
    $tmp['cols'] = '66';
        $tmp['help'][0]['tag'] = 'comments';
        $tmp['help'][0]['text'] = $admin_phrases['template']['news_comment_container']['help_2'];
        $tmp['help'][1]['tag'] = 'comment_form';
        $tmp['help'][1]['text'] = $admin_phrases['template']['news_comment_container']['help_3'];
    $TEMPLATE_EDIT[] = $tmp;
    unset($tmp);

  echo templatepage_init($TEMPLATE_EDIT, $TEMPLATE_GO, $TEMPLATE_FILE);
?>
