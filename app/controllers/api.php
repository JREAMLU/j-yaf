<?php

use App\Lib\Common;
use App\Lib\Constant;
use App\Lib\Requester;

class ApiController extends _BaseController {

    public function indexAction() {
        $a['name'] = 'LUj';
        $a['ot'] = $this->_config->application->title;

        $com = new Common();
        $a['at'] = $com->dealImg();

        $order = new Order();
        $a['number'] = $order->getNumber();

        $re = [
            'status' => Constant::SUCCESS_CODE,
            'data' => $a,
            'message' => Constant::SUCCESS_DESC,
        ];

        $yac = new Yac();
        $yac->set('name', 'yac');

        $this->responeJSON($re);
    }

    public function jsonpAction() {
        $a['name'] = 'LUj';
        $a['ot'] = $this->_config->application->title;

        $com = new Common();
        $a['at'] = $com->dealImg();

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

        $re = [
            'status' => Constant::SUCCESS_CODE,
            'data' => $a,
            'message' => Constant::SUCCESS_DESC,
        ];

        $this->responeJSONP($re);
    }
}