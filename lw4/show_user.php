<?php

use App\Controller\UserController;

require_once 'vendor/autoload.php';

$controller = new UserController();
$controller->showUser();


