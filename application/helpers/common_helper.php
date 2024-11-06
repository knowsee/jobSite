<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function getControlName() {
    return get_instance()->router->class;
}
function getMethodName() {
    return get_instance()->router->method;
}
function subtext($text, $length = 100) {
    if(mb_strlen($text, 'utf8') > $length) {
        return mb_substr($text, 0, $length, 'utf8').'...';
    } else {
        return $text;
    }
}
function getConfigValue($name, $key) {
    $config = get_instance()->config->item($name);
    return $config[$key];
}
function sendJsMsg($channel, $message) {
	$data = array('AK' => 'qqcB8u', 'AT'=> 'SomeToken', 'C' => $channel, 'M' => $message);
	$response = file_get_contents_post('http://ortc-developers-useast1-s0001.realtime.co/send', $data);
}

function file_get_contents_post($url, $post) {
    $options = array(  
        'http' => array(  
            'method' => 'POST',
            'content' => http_build_query($post),  
        ),  
    );
    $result = file_get_contents($url, false, stream_context_create($options));  
    return $result;  
}  

function dayToNow($dayTime) {
    $diffTime = $dayTime - time();
    if($diffTime < 0) {
        return ['status' => -1, 'time' => (abs($diffTime)/(60*60*24)), 'format' => 'd'];
    } else {
        if($diffTime >= 60*60*24) {
            return ['status' => 1, 'time' => ceil($diffTime/(60*60*24)), 'format' => 'd'];
        } else {
            return ['status' => 1, 'time' => intval($diffTime/(60*60)), 'format' => 't'];
        }
    }
}
function getDirName() {
    $dir = get_instance()->router->directory;
    $realDir = substr($dir, 0, strpos($dir, '/'));
    return $realDir == false ? '' : $realDir;
}

function getStyleMethodCall(callable $callback, $style = 'active') {
    $check = call_user_func($callback, getDirName(), getControlName(), getMethodName());
    if($check == true) {
        echo 'class="'.$style.'"';
    }
}

function getStyleMethod($setAction, $style = 'active', $useClass = true) {
    if(empty(getDirName()) && $setAction[0]) {
        array_unshift($setAction, '');
    } else {
        $useDp[] = getDirName();
    }
    $useDp[] = getDirName();
    if (isset($setAction[1])) {
        $useDp[] = getControlName();
    }
    if (isset($setAction[2])) {
        $useDp[] = getMethodName();
    }
    if (implode('_', $useDp) == implode('_', $setAction)) {
        echo $useClass == true ? 'class="' . $style . '"' : $style;
    }
}

function formHelerForChecked($source, $value) {
    if ($source == $value) {
        return true;
    } else {
        return false;
    }
}
function setIfNot($value, $search) {
    if(isset($search[$value])) {
        return $search[$value];
    } else {
        return null;
    }
}
function showMessage($message, $url = 'javascript:history.go(-1);', $code = 500) {
    $_error = & load_class('Exceptions', 'core');
    if(strchr($url, 'javascript:') == false) {
        $url = site_url($url);
    }
    echo $_error->showMessage($message, $url, $code);
    exit($code);
}
