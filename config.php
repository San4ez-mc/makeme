<?php
// HTTP
define('HTTP_SERVER', 'https://makemy.ua/');

// HTTPS
define('HTTPS_SERVER', 'https://makemy.ua/');

// DIR
define('DIR_APPLICATION', '/var/www/www-root/data/www/makemy.ua/catalog/');
define('DIR_SYSTEM', '/var/www/www-root/data/www/makemy.ua/system/');
define('DIR_IMAGE', '/var/www/www-root/data/www/makemy.ua/image/');
define('DIR_STORAGE', '/var/www/www-root/data/www/storage/');
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/theme/');
define('DIR_CONFIG', DIR_SYSTEM . 'config/');
define('DIR_CACHE', DIR_STORAGE . 'cache/');
define('DIR_DOWNLOAD', DIR_STORAGE . 'download/');
define('DIR_LOGS', DIR_STORAGE . 'logs/');
define('DIR_MODIFICATION', DIR_STORAGE . 'modification/');
define('DIR_SESSION', DIR_STORAGE . 'session/');
define('DIR_UPLOAD', DIR_STORAGE . 'upload/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'jaracom');
define('DB_PASSWORD', 'Vjhjpjdrf1240');
define('DB_DATABASE', 'makemy');
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');

ini_set("display_errors", 1);
setlocale(LC_ALL, "ru_RU.UTF-8");

