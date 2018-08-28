<?php

use App\Lib\Requester;

class ApiController extends _BaseController {

    public function indexAction() {
        $a['name'] = 'LUj';
        $a['ot'] = $this->_config->application->title;

        $order = new Order();
        $a['number'] = $order->getNumber();

        $yac = new Yac();
        $yac->set('name', 'yac');

        $this->responeJSON($a);
    }

    public function jsonpAction() {
        $a['name'] = 'LUj';
        $a['ot'] = $this->_config->application->title;

        $order = new Orders();
        $a['number'] = $order->getNumber();

        $yac = new Yac();
        $a['yac'] = $yac->get('name');
        $yac->flush();

        list($ip, $status) = Requester::Curl([
            'url' => 'http://ip.taobao.com/service/getIpInfo.php?ip=114.86.192.154',
            'method' => 'GET',
        ]);

        $a['ip'] = $ip;

        $this->responeJSONP($a);
    }
}