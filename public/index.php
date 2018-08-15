<?php
define("DS", '/');
define("APP_PATH", realpath(dirname(__FILE__) . DS . '..' . DS . 'app' . DS));
define("BASE_PATH", realpath(dirname(__FILE__) . DS . '..' . DS));
define("APP_ROUTER", realpath(dirname(__FILE__) . DS . '..' . DS . 'app' . DS . 'router' . DS));
define("APP_SERVICE", realpath(dirname(__FILE__) . DS . '..' . DS . 'app' . DS . 'service' . DS));
define("HTTPS", 'https://');
define("HTTP", 'http://');
define("DOMAIN", $_SERVER['SERVER_NAME']);
define("BASEURL", HTTP . DOMAIN);

date_default_timezone_set("Asia/Shanghai");

$app = new \Yaf\Application(APP_PATH . "/conf/app.ini");
$app->bootstrap()->run();
