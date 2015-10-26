<?php

$files = array(
        'bootstrap.css',
        'bootstrap-theme.min.css',
        'bootstrap-switch.min.css',
        'hostguard.css',
        'theme.bootstrap.css',
        'bootstrap-select.min.css'
);

$path = '/opt/hostguard/codeigniter/application/themes/bootstrap/css/';
$cache_path = '/opt/hostguard/cache/';
$cache_filename = 'bootstrap.minified.css';
$cache_time = filectime($path.$cache_filename);

function rebuildCache($files, $path, $cache_filename) {
        $buffer = '';
        foreach ($files as $file) {
                $buffer .= file_get_contents($path.$file);
        }
        
        $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
        $buffer = str_replace(': ', ':', $buffer);
        $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
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
