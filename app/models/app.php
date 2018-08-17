<?php

class AppModel extends _RedisModel {

    public function setGet() {
        $redis = $this->redis('app');
        $redis->set('arrr2', 'aef', 10);
        return $redis->get('arrr2');
    }

    public function setGetCluster() {
        $redis = $this->redisCluster('app');
        $redis->set('arrr3', 'edf', 10);
        return $redis->get('arrr3');
    }
}