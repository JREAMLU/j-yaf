<?php
define("DS", '/');
define("APP", 'app');
define("APP_PATH", realpath(dirname(__FILE__) . DS . '..' . DS . APP . DS));
define("APP_CONFIG", realpath(dirname(__FILE__) . DS . '..' . DS . 'conf' . DS));
define("BASE_PATH", realpath(dirname(__FILE__) . DS . '..' . DS));
define("APP_ROUTER", realpath(dirname(__FILE__) . DS . '..' . DS . APP . DS . 'router' . DS));
define("APP_VAILD", realpath(dirname(__FILE__) . DS . '..' . DS . APP . DS . 'vaild' . DS));
define("APP_SERVICE", realpath(dirname(__FILE__) . DS . '..' . DS . APP . DS . 'service' . DS));
define("HTTPS", 'https://');
define("HTTP", 'http://');
define("DOMAIN", $_SERVER['SERVER_NAME']);
define("BASEURL", HTTP . DOMAIN);

date_default_timezone_set("Asia/Shanghai");

Yaf\Loader::import(BASE_PATH . '/vendor/autoload.php');

$app = new \Yaf\Application(APP_CONFIG . DS . "app.ini");
$app->bootstrap()->run();
