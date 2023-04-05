<?php

require_once './src/Database/UserTable.php';
require_once './src/Common/Database/ConnectionProvider.php';

$userId = (int)$_GET['user_id'];
if (!$userId) {
    throw new RuntimeException("User id expected. Usage: show_user?user_id=(id)");
}

$userTable = new UserTable(ConnectionProvider::getConnection());
$user = $userTable->findOne($userId);

require __DIR__ . '/src/View/user.php';

