<?php

use App\Lib\Redisc;

class _RedisModel {

    protected $redis_config;

    public function __construct() {
        $this->redis_config = Yaf\Application::app()->getConfig();
        $this->db = Redisc::instance($this->redis_config);
    }

    public function redis($name) {
        return Redisc::client($name);
    }

    public function redisCluster($name) {
        return Redisc::clientCluster($name);
    }
}