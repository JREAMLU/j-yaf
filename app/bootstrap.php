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

    public function _initRender(Yaf\Dispatcher $dispatcher) {
        $dispatcher->autoRender(FALSE);
    }

    // 加载i18n
    public function _initLanguage() {
        new Lang();
    }

    public function _initRedis() {
        new Redisc();
    }
}