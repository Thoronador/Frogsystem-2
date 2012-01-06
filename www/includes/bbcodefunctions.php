<?php
require_once ( FS2_ROOT_PATH . 'libs/class_stringparser_bbcode.php' );
require_once ( FS2_ROOT_PATH . 'resources/player/player_flv_include.php' );


function bbcode_stripcontents ($text) {
    return preg_replace ("/[^\n]/", '', $text);
}

function do_bbcode_smilies ($text) {

    global $global_config_arr;
    global $FD;
    $global_config_arr['virtualhost'];
    $index = mysql_query("SELECT virtualhost FROM ".$global_config_arr['pref']."global_config WHERE id = 1", $FD->sql()->conn() );
    $page_url = stripslashes(mysql_result($index, 0, "virtualhost"));
    
    $index = mysql_query("SELECT * FROM ".$global_config_arr['pref']."smilies", $FD->sql()->conn() );
    while ($smilie_arr = mysql_fetch_assoc($index))
    {
        $url = image_url("images/smilies/", $smilie_arr['id']);
        $text = str_replace ($smilie_arr['replace_string'], '<img src="'.$url.'" alt="'.$smilie_arr['replace_string'].'" align="top">', $text);
    }
    return $text;
}

function do_bbcode_url ($action, $attributes, $content, $params, $node_object) {
    if ($action == 'validate') {
        return true;
    }
    if (!isset ($attributes['default'])) {
        return '<a href="'.htmlspecialchars ($content).'" target="_blank">'.htmlspecialchars ($content).'</a>';
    }
    return '<a href="'.htmlspecialchars ($attributes['default']).'" target="_blank">'.$content.'</a>';
}

function do_bbcode_homelink ($action, $attributes, $content, $params, $node_object) {

    global $FD;

    if ($action == 'validate') {
        return true;
    }
    
    // Using Attributs as URL, with default for go
    if (!empty($attributes)) {
        $go = htmlspecialchars_decode($attributes['default'], ENT_NOQUOTES);
        if (isset($attributes['go'])) {
            $go = $attributes['go'];
        }
        unset($attributes['default'], $attributes['go']);
        
        //check $go for oldstyled urls: page&key1=val1$key2=val2 or page&amp;key1=val1
        if (strpos($go, "&") !== false) {
            $url = $FD->cfg('virtualhost')."?go=".$go;
            $query = parse_url_query(parse_url($url, PHP_URL_QUERY));
            $go = $query['go'];
            unset($query['go']);
            $attributes = $attributes+$query;
        }
        
        //build url
        $url = url($go, $attributes);
        
        
    // Conent=URL => Use "go[key1=val1 key2=val2]" or oldschool style
    } else {
        $url = $content;
        
        //check for [ or ] => yes: new style; no: oldstyle
        if (strpos($url, "[") !== false || strpos($url, "]") !== false) {
            //create pseudeo template-var
            $url = '$URL('.$url.')';
            $url = tpl_functions($url, 0, array("URL"));
            $content = $FD->cfg('virtualhost').$url;
            
        // oldschool url style
        } else {
            $url = $FD->cfg('virtualhost')."?go=".htmlspecialchars_decode($url,ENT_NOQUOTES);
            $query = parse_url_query(parse_url($url, PHP_URL_QUERY));
            $go = $query['go'];
            unset($query['go']);
            $url = url($go, $query);
            $content = url($go, $query, true);
        }
    }
    
    return '<a href="'.$url.'" target="_self">'.$content.'</a>';
}

function do_bbcode_email ($action, $attributes, $content, $params, $node_object) {
    if ($action == 'validate') {
        return true;
    }
    if (!isset ($attributes['default'])) {
        return '<a href="mailto:'.htmlspecialchars ($content).'">'.htmlspecialchars ($content).'</a>';
    }
    return '<a href="mailto:'.htmlspecialchars ($attributes['default']).'">'.$content.'</a>';
}


function do_bbcode_img ($action, $attributes, $content, $params, $node_object) {
    if ($action == 'validate') {
        return true;
    }

    // Get alt and title text
    $content_arr = array_map ( "htmlspecialchars", explode ( "|", $content, 3 ) );

    // Always provide alt-text
    if ( count ( $content_arr ) == 1 ) {
        $content_arr[1] = $content_arr[0];
    }
     // title should be same like alt
    if ( count ( $content_arr ) == 3 && strlen ( $content_arr[2] ) == 0 ) {
        $content_arr[2] = $content_arr[1];
    }
    $content_arr[2] = isset ( $content_arr[2] ) ? ' title="'.$content_arr[2].'"' : '';

    if (!isset ($attributes['default'])) {
            return '<img src="'.$content_arr[0].'" alt="'.$content_arr[1].'"'.$content_arr[2].'>';
    }

    return '<img src="'.$content_arr[0].'" align="'.htmlspecialchars($attributes['default']).'" alt="'.$content_arr[1].'"'.$content_arr[2].'>';
}

function do_bbcode_cimg ($action, $attributes, $content, $params, $node_object) {

    global $global_config_arr;
    global $FD;

    if ($action == 'validate') {
        return true;
    }

    // Get alt and title text
    $content_arr = array_map ( "htmlspecialchars", explode ( "|", $content, 3 ) );

    // Always provide alt-text
    if ( count ( $content_arr ) == 1 ) {
        $content_arr[1] = $content_arr[0];
    }
     // title should be same like alt
    if ( count ( $content_arr ) == 3 && strlen ( $content_arr[2] ) == 0 ) {
        $content_arr[2] = $content_arr[1];
    }
    $content_arr[2] = isset ( $content_arr[2] ) ? ' title="'.$content_arr[2].'"' : '';

    if (!isset ($attributes['default'])) {
        return '<img src="'.$global_config_arr['virtualhost']."media/content/".$content_arr[0].'" alt="'.$content_arr[1].'"'.$content_arr[2].'>';
    }
    return '<img src="'.$global_config_arr['virtualhost']."media/content/".$content_arr[0].'" align="'.htmlspecialchars($attributes['default']).'" alt="'.$content_arr[1].'"'.$content_arr[2].'>';
}

function do_bbcode_player ($action, $attributes, $content, $params, $node_object) {

    global $global_config_arr;
    global $FD;

    if ($action == 'validate') {
        return true;
    }

    if (!isset ($attributes['default'])) {
        return get_player ( $content );
    }
    $res = explode ( ",", $attributes['default'], 2 );
    settype ( $res[0], "integer" );
    settype ( $res[1], "integer" );
    return get_player ( $content, $res[0], $res[1] );
}

function do_bbcode_font ($action, $attributes, $content, $params, $node_object) {

    if ($action == 'validate') {
        if (!isset ($attributes['default'])) { return false; }
        else { return true; }
    }

    if (isset ($attributes['default'])) {
        return '<span style="font-family:'.$attributes['default'].';">'.$content.'</span>';
    }
}

function do_bbcode_color ($action, $attributes, $content, $params, $node_object) {

    if ($action == 'validate') {
        if (!isset ($attributes['default'])) { return false; }
        else { return true; }
    }

    if (isset ($attributes['default'])) {
        return '<span style="color:'.$attributes['default'].';">'.$content.'</span>';
    }
}

function do_bbcode_size ($action, $attributes, $content, $params, $node_object) {

    if ($action == 'validate') {
        if (!isset ($attributes['default'])) { return false; }
        else {
            $font_sizes = array(0,1,2,3,4,5,6,7);
            if (!in_array($attributes['default'], $font_sizes)) { return false; }
            else { return true; }
        }
    }

    if (isset ($attributes['default'])) {
        $arr_num = $attributes['default'];
        #$font_sizes_values = array("6pt","7pt","8pt","10pt","12pt","14pt","18pt","24pt");
        $font_sizes_values = array("70%","85%","100%","125%","155%","195%","225%","300%");
        return '<span style="font-size:'.$font_sizes_values[$arr_num].';">'.$content.'</span>';
    }
}

function do_bbcode_code ($action, $attributes, $content, $params, $node_object) {

        global $global_config_arr;
        global $FD;

        if ($action == 'validate') {
                return true;
        }

        // Get Template
        $template = new template();
        $template->setFile("0_fscodes.tpl");
        $template->load("CODE");
        $template->tag("text", $content );
        $template = $template->display ();
        
        return $template;
}

function do_bbcode_quote ($action, $attributes, $content, $params, $node_object) {
        global $global_config_arr;
        global $FD;
        
        if ($action == 'validate') {
                return true;
        }

        // Get Template
        $template = new template();
        $template->setFile("0_fscodes.tpl");
            
        if (!isset ($attributes['default'])) {
            $template->load("QUOTE");
            $template->tag("text", $content );
            $parsed = $template->display ();

            return $parsed;
        } else {
            $template->load("QUOTE_SOURCE");
            $template->tag("text", $content );
            $template->tag("author", $attributes['default'] );
            $parsed = $template->display ();

            return $parsed;
        }
        
        return $parsed;
}

function do_bbcode_noparse ($action, $attributes, $content, $params, $node_object) {
    if ($action == 'validate') {
        return true;
    }
    return $content;
}

?>
