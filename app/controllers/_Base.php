<?php

use App\Lib\Constant;
use Yunhack\PHPValidator\Validator;

class _BaseController extends \Yaf\Controller_Abstract {

    protected $_config;
    protected $_vaild;

    public function init() {
        $this->_config = Yaf\Application::app()->getConfig();
        $this->_vaild = Yaf\Registry::get('vaild');

        // error不执行
        if (strtolower($this->getRequest()->getControllerName()) == 'error') {
            return;
        }

        if (!$this->getRequest()->isPost()) {
            $this->responeBAD();
        }

        $this->vaild();
    }

    public function vaild() {
        $rawData = $this->getRawData(true);
        $route = $this->getRequest()->getControllerName() . '/' . $this->getRequest()->getActionName();

        $data = $rawData == null ? [] : $rawData;
        Validator::make(
            $data,
            $this->_vaild[strtolower($route)] == null ? [] : $this->_vaild[strtolower($route)]
        );

        if (Validator::has_fails()) {
            $this->responeJSON('', Constant::PARAMS_ERROR_CODE, Validator::error_msg());
        }
    }

    public function getRawData($reArr = false) {
        return $reArr == true ? json_decode(file_get_contents("php://input"), 1) : file_get_contents("php://input");
    }

    public function responeJSON($data = '', $code = 0, $msg = '') {
        if (!is_array($data) && trim($data) == '') {
            $data = new StdClass();
        }

        $resp = [
            'status' => $code,
            'data' => $data,
            'message' => $msg == '' ? Constant::$text[$code] : $msg,
        ];

        $resp = json_encode($resp);
        $response = $this->getResponse();
        $response->setHeader(
            'Content-Type', 'application/json; charset=' . $this->_config->application->common->charset
        );

        $response->response();
        echo $resp;
        exit;
    }

    public function responeJSONP($data = '', $code = 0, $msg = '') {
        if (!is_array($data) && trim($data) == '') {
            $data = new StdClass();
        }

        $resp = [
            'status' => $code,
            'data' => $data,
            'message' => $msg == '' ? Constant::$text[$code] : $msg,
        ];

        $resp = json_encode($resp);
        $response = $this->getResponse();
        $response->setHeader(
            'Content-Type', 'application/json; charset=' . $this->_config->application->common->charset
        );

        $callback = $this->getRequest()->getQuery('callback');
        if (!empty($callback)) {
            $resp = $callback . '(' . $resp . ')';
        }

        $response->response();
        echo $resp;
        exit;
    }

    public function responeBAD() {
        $response = $this->getResponse();
        $response->setHeader(
            'Content-Type', 'application/json; charset=' . $this->_config->application->common->charset
        );

        $response->setHeader($this->getRequest()->getServer('SERVER_PROTOCOL'), '404');
        $response->response();
        exit;
    }
}