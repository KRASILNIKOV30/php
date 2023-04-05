<?php

namespace App\Controller;
require_once __DIR__ . '/src/Controller/UserController.php';
use App\Controller\UserController;

$controller = new UserController();
$controller->saveUser();


