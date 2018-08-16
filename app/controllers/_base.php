<?php
class _BaseController extends \Yaf\Controller_Abstract {

    protected $_config;

    public function init() {
        $this->_config = Yaf\Application::app()->getConfig();

        if (!$this->getRequest()->isPost()) {
            $this->responeBAD();
        }
    }

    public function getRawData($reArr = false) {
        return $reArr == true ? json_decode(file_get_contents("php://input"), 1) : file_get_contents("php://input");
    }

    public function responeJSON($data) {
        if (!isset($data['data']) || trim($data['data']) == '') {
            $data['data'] = new StdClass();
        }

        $data = json_encode($data);
        $response = $this->getResponse();
        $response->setHeader(
            'Content-Type', 'application/json; charset=' . $this->_config->application->common->charset
        );

        $response->response();
        echo $data;
        exit;
    }

    public function responeJSONP($data) {
        if (!isset($data['data']) || trim($data['data']) == '') {
            $data['data'] = new StdClass();
        }

        $data = json_encode($data);
        $response = $this->getResponse();
        $response->setHeader(
            'Content-Type', 'application/json; charset=' . $this->_config->application->common->charset
        );

        $callback = $this->getRequest()->getQuery('callback');
        if (!empty($callback)) {
            $data = $callback . '(' . $data . ')';
        }

        $response->response();
        echo $data;
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