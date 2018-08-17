<?php

class Orders {

    public function getNumber() {
        $app = new AppModel();
        $a = $app->setGet();
        $b = $app->setGetCluster();

        return $a . $b;
    }
}