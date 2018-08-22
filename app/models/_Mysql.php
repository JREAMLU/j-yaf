<?php

use App\Lib\Mysql;

class _MysqlModel {

    protected $db_config;
    protected $db;

    public function __construct() {
        $this->db_config = Yaf\Application::app()->getConfig()->database->toArray();
        $this->db = Mysql::instance($this->db_config);
    }
}