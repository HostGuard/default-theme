<?php
unlink('/opt/hostguard/codeigniter/application/views');
mkdir('/opt/hostguard/public_html/themes/bootstrap');
symlink('/opt/hostguard/codeigniter/application/themes/bootstrap', '/opt/hostguard/codeigniter/application/views');
symlink('/opt/hostguard/codeigniter/application/themes/bootstrap/css', '/opt/hostguard/public_html/themes/bootstrap/css');
symlink('/opt/hostguard/codeigniter/application/themes/bootstrap/javascript', '/opt/hostguard/public_html/themes/bootstrap/javascript');
symlink('/opt/hostguard/codeigniter/application/themes/bootstrap/img', '/opt/hostguard/public_html/themes/bootstrap/img');
symlink('/opt/hostguard/codeigniter/application/themes/bootstrap/fonts', '/opt/hostguard/public_html/themes/bootstrap/fonts');
?>