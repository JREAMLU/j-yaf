<?php

class Bootstrap extends \Yaf\Bootstrap_Abstract {

    private $_config;

    /**
     * 初始化配置文件
     **/
    public function _initConfig() {
        // 把配置保存起来
        $this->_config = Yaf\Application::app()->getConfig();
        // $charset = $this->_config->application->common->charset;
        // header("Content-Type: application/json; charset=$charset");
    }

    /**
     * 报错设置
     */
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
        $loader = Yaf\Loader::getInstance(APP_PATH . DS . 'service');
        // @TODO 自动注册
        $loader->registerLocalNameSpace([
            'order',
        ]);

        $loader->autoload("order");
    }

    public function _initRoute(Yaf\Dispatcher $dispatcher) {
        // $router = Yaf\Dispatcher::getInstance()->getRouter();
        $router = $dispatcher->getRouter();

        Yaf\Loader::import(APP_ROUTER . '/router.php');
        $router->addConfig($routeConfigs);

        // // @TODO router
        // $route = new Yaf\Route\Rewrite(
        //     '/',
        //     [
        //         'controller' => 'index',
        //         'action' => 'index',
        //         'method' => 'post',
        //     ]
        // );
        // 
        // $router->addRoute('default', $route);
    }

    public function _initRender(Yaf\Dispatcher $dispatcher) {
        Yaf\Dispatcher::getInstance()->autoRender(FALSE);
    }

    /**
     * 加载i18n
     */
    public function _initLanguage(Yaf\Dispatcher $dispatcher) {
        $lang = new Lang();
    }

}