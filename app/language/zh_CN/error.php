<?php

if (empty($lang) || !is_array($lang)) {
    $lang = [];
}

$lang = array_merge($lang, [
    "YAF_ERR_NOTFOUND_MODULE" => "找不到指定的模块",
    "YAF_ERR_NOTFOUND_CONTROLLER" => "找不到指定的Controller",
    "YAF_ERR_NOTFOUND_ACTION" => "找不到指定的Action",
    "YAF_ERR_NOTFOUND_VIEW" => "找不到指定的视图文件",
]);
