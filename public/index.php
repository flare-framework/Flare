<?php
const CONFIG = __DIR__ . "/../Flare/app/";
const PUPATH = __DIR__ . DIRECTORY_SEPARATOR;
$config_p = CONFIG . 'config.php';
$app = require_once $config_p;
unset($config_p);
