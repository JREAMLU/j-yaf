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

        $this->responeJSON($a);
    }

    public function jsonpAction() {
        if (!$this->getRequest()->isGet()) {
            $this->responeBAD();
        }

        $a['name'] = 'LUj';
        $a['ot'] = $this->_config->application->title;

        $com = new Common();
        $a['at'] = $com->dealImg();

        $order = new Order();
        $a['number'] = $order->getNumber();

        $this->responeJSONP($a);
    }
}