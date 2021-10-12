<?php

session_start();

date_default_timezone_set('Asia/Novosibirsk');

require_once 'config/params.php';

require_once 'module/autoload.php';

$param = explode('/', $_SERVER['REQUEST_URI']);

$action = strlen($param[1]) ? htmlspecialchars($param[1]) : 'index';

$db_handle = new blog\module\DbConnect(DB);

$fullname = 'controllers/' . $action . '.php';

require_once file_exists($fullname) ? $fullname : 'views/404.html';

