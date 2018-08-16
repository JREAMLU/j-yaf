<?php
class ErrorController extends _BaseController {

    public function errorAction($exception) {
        error_reporting(E_ERROR);

        //定义错误信息
        switch ($exception->getCode()) {
        case YAF\ERR\NOTFOUND\MODULE:
            $message = Lang::out('YAF_ERR_NOTFOUND_MODULE'); //515
            break;
        case YAF\ERR\NOTFOUND\CONTROLLER:
            $message = Lang::out('YAF_ERR_NOTFOUND_CONTROLLER'); //516
            break;
        case YAF\ERR\NOTFOUND\ACTION:
            $message = Lang::out('YAF_ERR_NOTFOUND_ACTION'); //517
            break;
        case YAF\ERR\NOTFOUND\VIEW:
            $message = Lang::out('YAF_ERR_NOTFOUND_VIEW'); //518
            break;
        default:
            $message = $exception;
            break;
        }
        echo $message;
    }
}