<?php

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
        // $c = AppModel::setGet();
        // var_dump($c);die;

        // $d = AppModel::setGetCluster();
        // var_dump($d);die;

        $a['name'] = 'LUj';
        $a['ot'] = $this->_config->application->title;

        $com = new Common();
        $a['at'] = $com->dealImg();

        $order = new Order();
        $a['number'] = $order->getNumber();

        $yac = new Yac();
        $a['yac'] = $yac->get('name');
        $yac->flush();

        $this->responeJSONP($a);
    }
}