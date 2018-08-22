<?php

class IndexController extends _BaseController {

    public function indexAction() {
        if (!$this->getRequest()->isPost()) {
            $this->responeBAD();
        }

        $a['name'] = 'LUj';
        $a['ot'] = $this->_config->application->title;

        $com = new Common();
        $a['at'] = $com->dealImg();

        $order = new Order();
        $a['number'] = $order->getNumber();

        list($ip, $status) = Requester::Curl([
            'url' => 'http://ip.taobao.com/service/getIpInfo.php?ip=114.86.192.154',
            'method' => 'GET',
        ]);

        $a['ip'] = $ip;

        $this->responeJSON($a);
    }
}