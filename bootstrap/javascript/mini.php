<?php

$files = array(
        'jquery-1.11.0.min.js',
        'bootstrap.min.js',
        'bootstrap-switch.min.js',
        'jquery.tablesorter.min.js',
        'jquery.tablesorter.widgets.min.js',
        'widget-scroller.js',
        'bootstrap-select.min.js',
        'hostguard.js',

);

$path = '/opt/hostguard/codeigniter/application/themes/bootstrap/javascript/';
$cache_path = '/opt/hostguard/cache/';
$cache_filename = 'bootstrap.minified.js';
$cache_time = filectime($cache_path.$cache_filename);

function rebuildCache($files, $path, $cache_filename) {
        $buffer = '';
        foreach ($files as $file) {
                $buffer .= file_get_contents($path.$file);
        }
        file_put_contents($cache_filename, $buffer);
}

foreach ($files as $file) {
        if (filectime($path.$file) > $cache_time) {
                rebuildCache($files, $path, $cache_path.$cache_filename);
                break;
        }
}

header('Cache-Control: public');
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');
header('Content-Type: text/css');
header('X-Accel-Redirect: /cache/'.$cache_filename);