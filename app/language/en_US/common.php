<?php
if (empty($lang) || !is_array($lang)) {
    $lang = [];
}

$lang = array_merge($lang, [
    'HOUSE_NAME' => 'this is my house',
]);