<?php

class AppModel {

    public static function setGet() {
        $redis = Redisc::client('app');
        $redis->set('arrr2', 'aef', 10);
        return $redis->get('arrr2');
    }
    
    public static function setGetCluster() {
        $redis = Redisc::clientCluster('app');
        $redis->set('arrr3', 'edf', 10);
        return $redis->get('arrr3');
    }
}