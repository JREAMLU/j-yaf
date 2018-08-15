<?php
if (empty($lang) || !is_array($lang)) {
    $lang = [];
}

$lang = array_merge($lang, [
    "YAF_ERR_STARTUP_FAILED" => "启动失败",
    "YAF_ERR_ROUTE_FAILED" => "路由失败",
    "YAF_ERR_DISPATCH_FAILED" => "分发失败",
    "YAF_ERR_NOTFOUND_MODULE" => "找不到指定的模块",
    "YAF_ERR_NOTFOUND_CONTROLLER" => "找不到指定的Controller",
    "YAF_ERR_NOTFOUND_ACTION" => "找不到指定的Action",
    "YAF_ERR_NOTFOUND_VIEW" => "找不到指定的视图文件",
    "YAF_ERR_CALL_FAILED" => "调用失败",
    "YAF_ERR_AUTOLOAD_FAILED" => "自动加载类失败",
    "YAF_ERR_TYPE_ERROR" => "关键逻辑的参数错误",
]);
