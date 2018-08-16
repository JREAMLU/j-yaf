<?php

class Bootstrap extends \Yaf\Bootstrap_Abstract {

    private $_config;

    // 初始化配置文件
    public function _initConfig() {
        // 把配置保存起来
        $this->_config = Yaf\Application::app()->getConfig();
    }

    // 报错设置
    public function _initErrors() {
        if ($this->_config->application->showErrors) {
            ini_set("display_errors", "On");
            error_reporting(E_ALL);
        } else {
            ini_set("display_errors", "Off");
            error_reporting(0);
        }
    }

    public function _initNamespaces() {
        $loader = Yaf\Loader::getInstance(APP_SERVICE);
        // 自动注册service
        $services = scandir(APP_SERVICE);
        $names = [];
        foreach ($services as $service) {
            if ($service == '.' || $service == '..') {
                continue;
            }

            $names[] = basename($service, ".php");
        }

        $loader->registerLocalNameSpace($names);

        foreach ($names as $name) {
            $loader->autoload($name);
        }
    }

    public function _initRoute(Yaf\Dispatcher $dispatcher) {
        $router = $dispatcher->getRouter();
        Yaf\Loader::import(APP_ROUTER . '/router.php');
        $router->addConfig($routeConfigs);
    }

    public function _initVaild() {
        Yaf\Loader::import(APP_VAILD . '/vaild.php');
        Yaf\Registry::set('vaild', $vaildConfigs);
    }

    public function _initRender(Yaf\Dispatcher $dispatcher) {
        $dispatcher->autoRender(FALSE);
    }

    public function _initErrorHandler() {
        Yaf\Dispatcher::getInstance()->setErrorHandler("appErrorHandler");
    }

}

function appErrorHandler($errno, $errstr, $errfile, $errline) {
    switch ($errno) {
    case YAF\ERR\NOTFOUND\MODULE:
        $message = Constant::YAF_ERR_NOTFOUND_MODULE; //515
        break;
    case YAF\ERR\NOTFOUND\CONTROLLER:
        $message = Constant::YAF_ERR_NOTFOUND_CONTROLLER; //516
        break;
    case YAF\ERR\NOTFOUND\ACTION:
        $message = Constant::YAF_ERR_NOTFOUND_ACTION; //517
        break;
    case YAF\ERR\NOTFOUND\VIEW:
        $message = Constant::YAF_ERR_NOTFOUND_VIEW; //518
        break;
    default:
        $message = $errstr;
        break;
    }

    // @TODO log message
    // echo $message;

    return true;
}
