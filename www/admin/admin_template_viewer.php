<?php
$TEMPLATE_GO = 'tpl_viewer';
$TEMPLATE_FILE = '0_viewer.tpl';
$TEMPLATE_EDIT = array();


$TEMPLATE_EDIT[] = array (
    'name' => 'VIEWER',
    'title' => $TEXT['template']->get('general_popupviewer_title'),
    'description' => $TEXT['template']->get('general_popupviewer_desc'),
    'rows' => 30,
    'cols' => 66,
    'help' => array (
        array ( 'tag' => 'image', 'text' => $TEXT['template']->get('general_popupviewer_image') ),
        array ( 'tag' => 'image_url', 'text' => $TEXT['template']->get('general_popupviewer_image_url') ),
        array ( 'tag' => 'caption', 'text' => $TEXT['template']->get('general_popupviewer_caption') ),
        array ( 'tag' => 'prev_url', 'text' => $TEXT['template']->get('general_popupviewer_prev_url') ),
        array ( 'tag' => 'prev_link', 'text' => $TEXT['template']->get('general_popupviewer_prev_link') ),
        array ( 'tag' => 'prev_image_link', 'text' => $TEXT['template']->get('general_popupviewer_prev_image_link') ),
        array ( 'tag' => 'next_url', 'text' => $TEXT['template']->get('general_popupviewer_next_url') ),
        array ( 'tag' => 'next_link', 'text' => $TEXT['template']->get('general_popupviewer_next_link') ),
        array ( 'tag' => 'next_image_link', 'text' => $TEXT['template']->get('general_popupviewer_next_image_link') ),
    )
);

// Init Template-Page
echo templatepage_init ( $TEMPLATE_EDIT, $TEMPLATE_GO, $TEMPLATE_FILE );
?>
