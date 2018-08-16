<?php
class Lang {

    private $_config;
    private static $goLang = array();

    public function __construct($package = array()) {
        $this->_config = Yaf\Application::app()->getConfig();

        $package = array(
            'common',
            'show',
            'error',
        );
        $this->set_goLang($package);
    }

    /**
     * 对外获取语言的方法
     * @param unknown_type $key
     */
    public static function out($key = '') {
        if ($key == '') {
            return false;
        }

        return self::get_goLang($key);
    }

    /**
     * 获取语言
     * @param unknown_type $key
     */
    private static function get_goLang($key) {
        if (!empty(self::$goLang[$key])) {
            return self::$goLang[$key];
        } else {
            return $key;
        }

    }

    /**
     * 批量加载语言包
     * @param array $package
     */
    private function set_goLang($package = array()) {
        if (!is_array($package)) {
            return false;
        }
        foreach ($package as $pack) {
            $this->loadLang($pack);
        }
    }

    /**
     * 加载语言包
     * 合并语言数组放到self::$golang
     * @param unknown_type $name
     */
    private function loadLang($name = '') {
        if (isset($name) && $name != '') {
            if (file_exists($this->lang_url($name))) {
                // @TODO yaf import
                include $this->lang_url($name);
                self::$goLang = array_merge(self::$goLang, $lang);
            }
        }
    }

    private function lang_url($name = '') {
        return $this->_config->application->language->path . $this->_config->application->language->lang . $name . '.' . $this->_config->application->ext;
    }
}