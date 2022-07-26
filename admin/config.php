<?php
// HTTP
define('HTTP_SERVER', 'http://makemy.ua/admin/');
define('HTTP_CATALOG', 'http://makemy.ua/');

// HTTPS
define('HTTPS_SERVER', 'https://makemy.ua/admin/');
define('HTTPS_CATALOG', 'https://makemy.ua/');

// DIR
define('DIR_APPLICATION', '/var/www/www-root/data/www/makemy.ua/admin/');
define('DIR_SYSTEM', '/var/www/www-root/data/www/makemy.ua/system/');
define('DIR_IMAGE', '/var/www/www-root/data/www/makemy.ua/image/');
define('DIR_STORAGE', '/var/www/www-root/data/www/storage/');
define('DIR_CATALOG', '/var/www/www-root/data/www/makemy.ua/catalog/');
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/template/');
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

// OpenCart API
define('OPENCART_SERVER', 'https://www.opencart.com/');
define('OPENCARTFORUM_SERVER', 'https://opencartforum.com/');

setlocale(LC_ALL, "ru_RU.UTF-8");
ini_set("display_errors", 1);
