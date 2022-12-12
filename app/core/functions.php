<?php
function show($stuff) {
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function esc($str) {
    return htmlspecialchars($str);
}

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}