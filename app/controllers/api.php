<?php

class ApiController extends _BaseController {

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

        $re = [
            'status' => 0,
            'data' => $a,
            'message' => lang::out('SUCCESS'),
        ];

        $yac = new Yac();
        $yac->set('name', 'yac');

        $this->responeJSON($re);
    }

    public function jsonpAction() {
        if (!$this->getRequest()->isGet()) {
            $this->responeBAD();
        }

        // $c = AppModel::setGet();
        // var_dump($c);die;
        
        $d = AppModel::setGetCluster();
        var_dump($d);die;
        

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