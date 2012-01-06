<?php
require_once ( FS2_ROOT_PATH . 'libs/class_stringparser_bbcode.php' );

// Parse all possible FSCodes to HTML
function parse_all_fscodes($TEXT, $flags = array()) {
    return parse_fscode($TEXT, $flags, get_all_fscodes());
}

// Parse all possible FSCodes to HTML except the given ones
function parse_all_fscodes_except($TEXT, $flags = array(), $dont_parse = array()) {
    $fscodes = array_diff(get_all_fscodes(), $dont_parse);
    return parse_fscode($TEXT, $flags, $fscodes);
}

// Return an array of all available fscodes (incl. smilies)
function get_all_fscodes() {
    return array(
        'b', 'i', 'u', 's', 'font', 'color', 'size',
        'center',
        'url', 'home', 'email', 
        'img', 'cimg',
        'list', 'numlist',
        'code', 'quote', 'video',
        'noparse', 'smilies'
    );
}

// Parse the given text from FSCode
// converting some tags to html, others to text and maybe some to bbcode
// not given tags wont be touched at all
// there are also some flags to affect the entire text
function parse_fscode($TEXT, $flags = array(), $to_html = array(), $to_text = array(), $to_bbcode = array() ) {
    
    /* TODO: to_bbcode
     * Convert "special" frogsystem tags to default bbcode
     * e.g. home, cimg, numlist, size, 
     * may not exists for all types
     * */    
    
    /* Flags:
     * html => false // Decides wheter html is allowed
     * washtml => false // Should HTML washed from dangerous content?
     * paragraph => true // (De-)Activates paragraph handling
     * paragraph_to_text => false // Set true to not convert paragraphs into html
     * tab => oneof(false, nbsp, space) // convert tabs (\t) to &nbsp; \040 or do nothing
     * tabsize => oneof(false, nbsp, space) // convert tabs (\t) to &nbsp; \040 or \t
     * */
    $default_flags = array(
        'html' => false,
        'washtml' => false,
        'paragraph' => true,
        'paragraph_to_text' => false,
        'tab' => false,
        'tabsize' => 8,
    );
    $flags = array_merge($default_flags, $flags);
    
    // Create Parser Object
    $fscode = new StringParser_BBCode ();
    
    // Flags
    if (!$flags['html'])
        $fscode->addParser (array ('block', 'inline', 'link', 'listitem'), 'killhtml');
    if ($flags['washtml']) {
        //TODO: washtml http://www.ubixis.com/washtml/
        // $bbcode->addParser (array ('block', 'inline', 'link', 'listitem'), 'washtml');
    }
    if ($flags['paragraph'])
        $fscode->setRootParagraphHandling (true);
    if ($flags['paragraph_to_text'])
        $fscode->setParagraphHandlingParameters ("\n\n", "\n", "\n");
    
    
    if ($flags['tab'] !== false) {
        // get tab replacement
        switch ($flags['tab']) {
            case "nbsp":    $tab = "&nbsp;";    break;
            case "space":   $tab = " ";         break;
        }
        // create local tab function
        $tab_func = function ($text) use ($flags, $tab) {
            return tab2space($text, $flags['tabsize'], $tab);
        };
        // add the filter
        $fscode->addFilter (STRINGPARSER_FILTER_POST, $tab_func);
    }

    
    // Global Parser Flags
    $fscode->setGlobalCaseSensitive (false);
    $fscode->setMixedAttributeTypes (true);

    // Add some default parsers and filter
    $fscode->addFilter (STRINGPARSER_FILTER_PRE, 'convertlinebreaks');
    $fscode->addParser ('code', 'killhtml');
    $fscode->addParser (array ('block', 'inline', 'link', 'listitem'), 'html_nl2br');
    
    // smilies
    if (in_array('smilies', $to_html))
        $fscode->addParser (array ('block', 'inline', 'link', 'listitem'), 'do_fscode_smilies');

    // b
    if (in_array('b', $to_html))
        $fscode->addCode ('b', 'simple_replace', null, array ('start_tag' => '<b>', 'end_tag' => '</b>'),
            'inline', array ('listitem', 'block', 'inline', 'link'), array ());
    elseif  (in_array('b', $to_text))
        $fscode->addCode ('b', 'simple_replace', null, array ('start_tag' => '', 'end_tag' => ''),
            'inline', array ('listitem', 'block', 'inline', 'link'), array ());
                      
    // i
    if (in_array('i', $to_html))
        $fscode->addCode ('i', 'simple_replace', null, array ('start_tag' => '<i>', 'end_tag' => '</i>'),
            'inline', array ('listitem', 'block', 'inline', 'link'), array ());
    elseif  (in_array('i', $to_text))
        $fscode->addCode ('i', 'simple_replace', null, array ('start_tag' => '', 'end_tag' => ''),
            'inline', array ('listitem', 'block', 'inline', 'link'), array ());
                      
    // u
    if (in_array('u', $to_html))
        $fscode->addCode ('u', 'simple_replace', null, array ('start_tag' => '<span style="text-decoration:underline">', 'end_tag' => '</span>'),
            'inline', array ('listitem', 'block', 'inline', 'link'), array ());
    elseif  (in_array('u', $to_text))
        $fscode->addCode ('u', 'simple_replace', null, array ('start_tag' => '', 'end_tag' => ''),
            'inline', array ('listitem', 'block', 'inline', 'link'), array ());

    // s
    if (in_array('s', $to_html))
        $fscode->addCode ('s', 'simple_replace', null, array ('start_tag' => '<span style="text-decoration:line-through">', 'end_tag' => '</span>'),
            'inline', array ('listitem', 'block', 'inline', 'link'), array ());
    elseif  (in_array('s', $to_text))
        $fscode->addCode ('s', 'simple_replace', null, array ('start_tag' => '', 'end_tag' => ''),
            'inline', array ('listitem', 'block', 'inline', 'link'), array ());
                      
    // center
    if (in_array('center', $to_html)) {
        $fscode->addCode ('center', 'simple_replace', null, array ('start_tag' => '<p align="center">', 'end_tag' => '</p>'),
            'inline', array ('listitem', 'block', 'inline', 'link'), array ());
        $fscode->setCodeFlag ('center', 'paragraph_type', BBCODE_PARAGRAPH_BLOCK_ELEMENT);
    } elseif  (in_array('center', $to_text))
        $fscode->addCode ('center', 'simple_replace', null, array ('start_tag' => '', 'end_tag' => ''),
            'inline', array ('listitem', 'block', 'inline', 'link'), array ());

    // url
    if (in_array('url', $to_html))
        $fscode->addCode ('url', 'usecontent?', 'do_fscode_url', array ('usecontent_param' => 'default'),
            'link', array ('listitem', 'block', 'inline'), array ('link'));
    elseif  (in_array('url', $to_text))
        $fscode->addCode ('url', 'usecontent?', 'do_fscode_url', array ('usecontent_param' => 'default', 'text' => true),
            'link', array ('listitem', 'block', 'inline'), array ('link'));   

    // home
    if (in_array('home', $to_html))
        $fscode->addCode ('home', 'usecontent?', 'do_fscode_homelink', array ('usecontent_param' => 'default'),
            'link', array ('listitem', 'block', 'inline'), array ('link'));
    elseif  (in_array('home', $to_text))
        $fscode->addCode ('home', 'usecontent?', 'do_fscode_homelink', array ('usecontent_param' => 'default', 'text' => true),
            'link', array ('listitem', 'block', 'inline'), array ('link'));

    // email
    if (in_array('email', $to_html))
        $fscode->addCode ('email', 'usecontent?', 'do_fscode_email', array ('usecontent_param' => 'default'),
            'link', array ('listitem', 'block', 'inline'), array ('link'));
    elseif  (in_array('email', $to_text))
        $fscode->addCode ('email', 'usecontent?', 'do_fscode_email', array ('usecontent_param' => 'default', 'text' => true),
            'link', array ('listitem', 'block', 'inline'), array ('link'));
            
    // font
    if (in_array('font', $to_html))
        $fscode->addCode ('font', 'callback_replace', 'do_fscode_fcs', array ('type' => "font"),
            'inline', array ('listitem', 'block', 'inline', 'link'), array ());
    elseif  (in_array('font', $to_text)) {
        $fscode->addCode ('font', 'callback_replace', 'simple_replace_ignore_attributs', array ('start_tag' => '', 'end_tag' => ''),
            'inline', array ('listitem', 'block', 'inline', 'link'), array ());
    }

    // color
    if (in_array('color', $to_html))
        $fscode->addCode ('color', 'callback_replace', 'do_fscode_fcs', array ('type' => "color"),
            'inline', array ('listitem', 'block', 'inline', 'link'), array ());
    elseif  (in_array('color', $to_text))
        $fscode->addCode ('color', 'callback_replace', 'simple_replace_ignore_attributs', array ('start_tag' => '', 'end_tag' => ''),
            'inline', array ('listitem', 'block', 'inline', 'link'), array ());     

    // size
    if (in_array('size', $to_html))
        $fscode->addCode ('size', 'callback_replace', 'do_fscode_fcs', array ('type' => "size"),
            'inline', array ('listitem', 'block', 'inline', 'link'), array ());
    elseif  (in_array('size', $to_text))
        $fscode->addCode ('size', 'callback_replace', 'simple_replace_ignore_attributs', array ('start_tag' => '', 'end_tag' => ''),
            'inline', array ('listitem', 'block', 'inline', 'link'), array ());     


    // img
    if (in_array('img', $to_html))
        $fscode->addCode ('img', 'usecontent?', 'do_fscode_img', array ('usecontent_param' => 'default'),
            'image', array ('listitem', 'block', 'inline', 'link'), array ());
    elseif  (in_array('img', $to_text))
        $fscode->addCode ('img', 'usecontent?', 'do_fscode_img', array ('usecontent_param' => 'default', 'text' => true),
            'image', array ('listitem', 'block', 'inline', 'link'), array ());
            
    // cimg
    if (in_array('cimg', $to_html))
        $fscode->addCode ('cimg', 'usecontent?', 'do_fscode_cimg', array ('usecontent_param' => 'default'),
            'image', array ('listitem', 'block', 'inline', 'link'), array ());
    elseif  (in_array('cimg', $to_text))
        $fscode->addCode ('cimg', 'usecontent?', 'do_fscode_cimg', array ('usecontent_param' => 'default', 'text' => true),
            'image', array ('listitem', 'block', 'inline', 'link'), array ());        


    // noparse
    if (!in_array('noparse', $to_html) && !in_array('noparse', $to_text)) {
        $fscode->addCode ('noparse', 'usecontent', 'simple_usecontent_replace', array ('start_tag' => '[noparse]', 'end_tag' => '[/noparse]'),
            'inline', array ('listitem', 'block', 'inline', 'link'), array ());     
    } else {
        $fscode->addCode ('noparse', 'usecontent', 'simple_usecontent_replace', array ('start_tag' => '', 'end_tag' => ''),
            'inline', array ('listitem', 'block', 'inline', 'link'), array ()); 
    }

    // list
    if (in_array('list', $to_html))
        $fscode->addCode ('list', 'simple_replace', null, array ('start_tag' => '<ul>', 'end_tag' => '</ul>'),
            'list', array ('block', 'listitem'), array ('link'));
    elseif  (in_array('list', $to_text))
        $fscode->addCode ('list', 'callback_replace', 'do_fscode_textlists', array (),
            'list', array ('block', 'listitem'), array ('link'));

    if (in_array('list', $to_html) || in_array('list', $to_text)) {
        $fscode->setCodeFlag ('list', 'paragraph_type', BBCODE_PARAGRAPH_BLOCK_ELEMENT);
    }
    if (in_array('list', $to_html) && $flags['paragraph']) {
        $fscode->setCodeFlag ('list', 'opentag.before.newline', BBCODE_NEWLINE_DROP);
        $fscode->setCodeFlag ('list', 'closetag.before.newline', BBCODE_NEWLINE_DROP);
    } 

    // numlist
    if (in_array('numlist', $to_html))
        $fscode->addCode ('numlist', 'simple_replace', null, array ('start_tag' => '<ol>', 'end_tag' => '</ol>'),
            'list', array ('block', 'listitem'), array ('link'));
    elseif  (in_array('numlist', $to_text))
        $fscode->addCode ('numlist', 'callback_replace', 'do_fscode_textlists', array (),
            'list', array ('block', 'listitem'), array ('link'));
            
    if (in_array('numlist', $to_html) || in_array('numlist', $to_text)) {
        $fscode->setCodeFlag ('numlist', 'paragraph_type', BBCODE_PARAGRAPH_BLOCK_ELEMENT);
    }
    if (in_array('numlist', $to_html) && $flags['paragraph']) {
        $fscode->setCodeFlag ('numlist', 'opentag.before.newline', BBCODE_NEWLINE_DROP);
        $fscode->setCodeFlag ('numlist', 'closetag.before.newline', BBCODE_NEWLINE_DROP);
    }


    // *
    if (in_array('list', $to_html) || in_array('numlist', $to_html))
        $fscode->addCode ('*', 'simple_replace', null, array ('start_tag' => '<li>', 'end_tag' => '</li>'),
            'listitem', array ('list'), array ());
    elseif (in_array('list', $to_text) || in_array('numlist', $to_text))
        $fscode->addCode ('*', 'callback_replace', 'do_fscode_textlistitems', array ('start_tag' => "\n", 'end_tag' => "<br>", 'list_item' => "- ", 'numlist_item' => "%d. "),
            'listitem', array ('list'), array ());
            
    if (in_array('numlist', $to_html) || in_array('numlist', $to_text)
        || in_array('list', $to_html) || in_array('numlist', $list)) {
        $fscode->addParser ('list', 'fscode_stripcontents');            
        $fscode->setCodeFlag ('*', 'closetag', BBCODE_CLOSETAG_OPTIONAL);
        $fscode->setCodeFlag ('*', 'paragraphs', false);
    }   
    if (in_array('list', $to_text) || in_array('numlist', $to_text)) {
            $fscode->setCodeFlag ('list', 'opentag.after.newline', BBCODE_NEWLINE_DROP);
            $fscode->setCodeFlag ('numlist', 'opentag.after.newline', BBCODE_NEWLINE_DROP);
            $fscode->setCodeFlag ('list', 'closetag.after.newline', BBCODE_NEWLINE_DROP);
            $fscode->setCodeFlag ('numlist', 'closetag.after.newline', BBCODE_NEWLINE_DROP);
            $fscode->setCodeFlag ('*', 'opentag.before.newline', BBCODE_NEWLINE_DROP);
            $fscode->setCodeFlag ('*', 'opentag.after.newline', BBCODE_NEWLINE_DROP);
            $fscode->setCodeFlag ('*', 'closetag.before.newline', BBCODE_NEWLINE_DROP);
            $fscode->setCodeFlag ('*', 'closetag.after.newline', BBCODE_NEWLINE_DROP);
    }   
         

            
    // code
    if (in_array('code', $to_html))
        $fscode->addCode ('code', 'usecontent', 'do_fscode_code', array (),
            'code', array ('listitem', 'block', 'inline'), array ('link'));        
    elseif  (in_array('code', $to_text))
        $fscode->addCode ('code', 'usecontent', 'do_fscode_code', array ('text' => true),
            'code', array ('listitem', 'block', 'inline'), array ('link'));

    if (in_array('code', $to_html) || in_array('code', $to_text)) {
        $fscode->setCodeFlag ('code', 'paragraph_type', BBCODE_PARAGRAPH_BLOCK_ELEMENT);
        $fscode->setCodeFlag ('code', 'paragraph_type', BBCODE_PARAGRAPH_ALLOW_INSIDE);
        $fscode->setCodeFlag ('code', 'paragraphs', false);
    }

       
    // quote
    if (in_array('quote', $to_html))
        $fscode->addCode ('quote', 'callback_replace', 'do_fscode_quote', array (),
            'block', array ('listitem', 'block', 'inline'), array ('link'));
    elseif  (in_array('quote', $to_text))
        $fscode->addCode ('quote', 'callback_replace', 'do_fscode_quote', array ('text' => true),
            'block', array ('listitem', 'block', 'inline'), array ('link'));
            
    if (in_array('quote', $to_html) || in_array('quote', $to_text)) {
        #$fscode->setCodeFlag ('quote', 'paragraph_type', BBCODE_PARAGRAPH_BLOCK_ELEMENT);
        $fscode->setCodeFlag ('quote', 'paragraphs', false);
    }
                      
                      
    // video (old: player)
    if (in_array('video', $to_html)) {
        $fscode->addCode ('video', 'usecontent', 'do_fscode_video', array (),
            'block', array ('block'), array ('link', 'listitem'));        
        $fscode->addCode ('player', 'usecontent', 'do_fscode_video', array (),
            'block', array ('block'), array ('link', 'listitem')); 
    }
    elseif  (in_array('video', $to_text)) {
        $fscode->addCode ('video', 'usecontent', 'do_fscode_video', array ('text' => true),
            'block', array ('block'), array ('link', 'listitem'));                    
        $fscode->addCode ('player', 'usecontent', 'do_fscode_video', array ('text' => true),
            'block', array ('block'), array ('link', 'listitem'));                    
    }
    if (in_array('video', $to_html) || in_array('video', $to_text)) {
        $fscode->setCodeFlag ('video', 'paragraph_type', BBCODE_PARAGRAPH_BLOCK_ELEMENT);
        $fscode->setCodeFlag ('player', 'paragraph_type', BBCODE_PARAGRAPH_BLOCK_ELEMENT);
    }

    // Parse FSCode
    $parsedtext = $fscode->parse($TEXT);
    unset($fscode);
    
    return $parsedtext;
}

// Delete all content except linebreaks
function fscode_stripcontents ($text) {
    return preg_replace ("/[^\n]/", '', $text);
}

// Simple Replace:
// Just replacing start and endtag while not touching the content
function simple_usecontent_replace ($action, $attributes, $content, $params, $node_object) {
    if ($action == 'validate') {
        return isset($params['start_tag']) && isset($params['end_tag']);
    }
    return $params['start_tag'].$content.$params['end_tag'];
}

function simple_replace_ignore_attributs ($action, $attributes, $content, $params, $node_object) {
    if ($action == 'validate') {
        return isset($params['start_tag']) && isset($params['end_tag']);
    }
    return $params['start_tag'].$content.$params['end_tag'];
}

// Parser to convert smilies into images
function do_fscode_smilies ($text) {
    global $FD;
    
    $smilies = $FD->sql()->getData("smilies", "*");
    foreach ($smilies as $smiley) {
        $url = image_url("images/smilies/", $smiley['id']);
        $text = str_replace ($smiley['replace_string'], '<img src="'.$url.'" alt="'.$smiley['replace_string'].'" align="top">', $text);
    }
    
    return $text;
}

// Create Links
function do_fscode_url ($action, $attributes, $content, $params, $node_object) {
    if ($action == 'validate') {
        return true;
    }
    
    // create html/text
    if (!isset ($attributes['default'])) {
        $url = $text = htmlspecialchars ($content);
    } else {
        $url = htmlspecialchars ($attributes['default']);
        $text = $content;
    }
    
    // Return html or text
    if ($params['text'] === true)
        return ($url == $text) ? $url : $text . " (".$url.")";
    else
        return '<a href="'.$url.'" target="_blank">'.$text.'</a>';
}

// Create URL from Homelink and then create Link
function do_fscode_homelink ($action, $attributes, $content, $params, $node_object) {

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
        #$url = url($go, $attributes);
        $url = url($go, $attributes, true);
        
        
    // URL in Content => Use "go[key1=val1 key2=val2]" or oldschool style
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
            #$url = url($go, $query);
            $content = $url = url($go, $query, true);
        }
    }
    
    // Return html or text
    if ($params['text'] === true)
        return ($url == $content) ? $url : $content . " (".$url.")";
    else
        return '<a href="'.$url.'" target="_self">'.$content.'</a>';   
}

// Create an email link
function do_fscode_email ($action, $attributes, $content, $params, $node_object) {
    if ($action == 'validate') {
        return true;
    }
    
    // create html/text
    if (!isset ($attributes['default'])) {
        $url = $text = htmlspecialchars ($content);
    } else {
        $url = htmlspecialchars ($attributes['default']);
        $text = $content;
    }
    
    // Return html or text
    if ($params['text'] === true)
        return ($url == $text) ? $text : $text . " (".$url.")";
    else
        return '<a href="mailto:'.$url.'" target="_blank">'.$text.'</a>';    
}

// create simple inline styles for html elements
// for now: font, color, size
function do_fscode_fcs ($action, $attributes, $content, $params, $node_object) {
    
    // validation
    if ($action == 'validate') {
        if (!isset ($attributes['default'])) { return false; }
        elseif ($params['type'] == "size") {
            $font_sizes = array(0,1,2,3,4,5,6,7);
            if (!in_array($attributes['default'], $font_sizes)) { return false; }
        }
        return true;
    }
    
    // create html/text
    if (isset ($attributes['default'])) {
        
        switch ($params['type']) {
            case "font":
                $style = "font-family:".$attributes['default'].";";
                break;
            
            case "color":
                $style = "color:".$attributes['default'].";";
                break;
            
            case "size":
                $font_sizes_values = array("70%","85%","100%","125%","155%","195%","225%","300%");  
                $style = "font-size:".$font_sizes_values[$attributes['default']].";";  
                break;
            
            default:
                $style = "";        
                break;
        }
        
        return '<span style="'.$style.'">'.$content.'</span>';
        
    } else {
        return false;
    }
}

// Create an image
function do_fscode_img ($action, $attributes, $content, $params, $node_object) {
    global $FD;
    
    if ($action == 'validate') {
        return true;
    }

    // Get alt and title text
    $content_arr = array_map ( "htmlspecialchars", explode ( "|", $content, 3 ) );

    // Always provide alt-text
    if (count($content_arr) == 1) {
        $content_arr[1] = $content_arr[0];
    }
     // title shall be same like alt
    if (count($content_arr) == 3 && strlen($content_arr[2]) == 0) {
        $content_arr[2] = $content_arr[1];
    }
    $title_full = isset ($content_arr[2]) ? ' title="'.$content_arr[2].'"' : "";

    // Return html or text
    if ($params['text'] === true)
        return (isset($content_arr[2])) ? $FD->text('frontend', 'image').": ".$content_arr[2]. " (".$content_arr[0].")" : $FD->text('frontend', 'image').": ".$content_arr[0];
    else
        if (!isset ($attributes['default']))
            return '<img src="'.$content_arr[0].'" alt="'.$content_arr[1].'"'.$title_full.'>';
        else
            return '<img src="'.$content_arr[0].'" align="'.htmlspecialchars($attributes['default']).'" alt="'.$content_arr[1].'"'.$title_full.'>';
}

// Create an image from local database
function do_fscode_cimg ($action, $attributes, $content, $params, $node_object) {
    global $FD;

    // Extend Content Image Url
    $content .= $FD->cfg('virtualhost')."media/content/";
    
    // Call function for img fscode
    return do_fscode_img($action, $attributes, $content, $params, $node_object);
    
}

// create text lists
function do_fscode_textlists ($action, $attributes, $content, $params, $node_object) {
    if ($action == 'validate') {
        return (count($attributes) == 0);
    }
    $content = preg_replace ("/<br><br>/", "<br>", $content);    
    $content = preg_replace ("/\n\n/", "\n", $content);    
    $content = preg_replace ("/\n\n/", "\n", $content);    
    return preg_replace ("/\n/", "\n\t", $content);
}

// create text lists
function do_fscode_textlistitems ($action, $attributes, $content, $params, $node_object) {
    if ($action == 'validate') {
        return (count($attributes) == 0);
    }
    
    $sublist = false;
        
    // Insert Item only before text child
    if (is_a($node_object->firstChild(), "StringParser_BBCode_Node_Element")
        && oneof($node_object->firstChild()->name(), 'list', 'numlist')) {
        $sublist = true;
    // If first child is text node but with no content => hide number
    } elseif ($node_object->firstChild()->type() == STRINGPARSER_NODE_TEXT) {
        if (is_empty(trim($node_object->firstChild()->content, "\n\r\0\x0B"))) {
            $sublist = true;
        }
    }
    
    // Numlist is a counter
    if (is_a($node_object->_parent, "StringParser_BBCode_Node_Element")
        && $node_object->_parent->name() == 'numlist') {
        
        $counter = 1;
        if (!is_null($node_object->_parent->attribute("counter")))
            $counter = $node_object->_parent->attribute("counter");
        
        if (!$sublist) {
            $node_object->_parent->setAttribute("counter", $counter+1);
            $params['list_item'] = sprintf($params['numlist_item'], $counter);
        }
    }    
    
    return $params['start_tag'].($sublist ? "" : $params['list_item']).$content.$params['end_tag'];
}


// Create a code block
function do_fscode_code ($action, $attributes, $content, $params, $node_object) {
    global $FD;

    if ($action == 'validate') {
            return true;
    }
    
    // allowed types
    $types = array ("html", "php", "css", "javascript", "c", "c++", "c#", "sql", "xml", "java", "python", "scheme");
    if (isset($attributes['default']) && !in_array($attributes['default'], $types))
        unset($attributes['default']);
    
    
    // Get HTMl or text
    if ($params['text'] === true) {
        if (!isset ($attributes['default'])) {
            $parsed = $FD->text('frontend', 'code').": ".$content;
        } else {
            $parsed = $FD->text('frontend', 'code')." (".$attributes['default']."): ".$content;
        } 
    } else {
        // Format Code
        // TODO: Codemirror styling
        
        // Get Template
        $template = new template();
        $template->setFile("0_fscodes.tpl");
        $template->load("CODE");
        $template->tag("text", $content);
        $parsed = $template->display ();
    }        
    
    return $parsed;
}

// Create a quote block
function do_fscode_quote ($action, $attributes, $content, $params, $node_object) {
    global $FD;

    if ($action == 'validate') {
            return true;
    }

    // Get HTMl or text
    if ($params['text'] === true) {
        if (!isset ($attributes['default'])) {
            $parsed = $FD->text('frontend', 'quote').": ".$content;
        } else {
            $parsed = $FD->text('frontend', 'quote_by')." ".$attributes['default'].": ".$content;
        } 
    } else {
        $template = new template();
        $template->setFile("0_fscodes.tpl");
            
        if (!isset ($attributes['default'])) {
            $template->load("QUOTE");
            $template->tag("text", $content );
            $parsed = $template->display ();
        } else {
            $template->load("QUOTE_SOURCE");
            $template->tag("text", $content );
            $template->tag("author", $attributes['default'] );
            $parsed = $template->display ();
        }
    }        
    
    return $parsed;
}

// Create a videoplayer
function do_fscode_video ($action, $attributes, $content, $params, $node_object) {
    require_once ( FS2_ROOT_PATH . 'resources/player/player_flv_include.php' );
    
    global $FD;

    if ($action == 'validate') {
        return true;
    }

    // Get HTMl or text
    if ($params['text'] === true) {
        return get_player($content, true, true, true);
    } else {
        if (!isset ($attributes['default'])) {
            return get_player ( $content );
        }
        $res = explode ( ",", $attributes['default'], 2 );
        settype ( $res[0], "integer" );
        settype ( $res[1], "integer" );
        return get_player ( $content, $res[0], $res[1] ); 
    }
}

?>
