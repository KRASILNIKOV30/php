<?php

require_once './UserController.php';
require_once '../Model/User.php';
require_once '../Database/UserRepository.php';
require_once '../Common/Database/ConnectionProvider.php';

$userData = [
    'firstName' => htmlentities($_POST['first_name']),
    'lastName' => htmlentities($_POST['last_name']),
    'middleName' => htmlentities($_POST['middle_name']) ?? '',
    'gender' => htmlentities($_POST['gender']),
    'birthDate' => htmlentities($_POST['birth_date']),
    'email' => htmlentities($_POST['email']),
    'phone' => htmlentities($_POST['phone']) ?? '',
    'avatar' => htmlentities($_POST['avatar']) ?? ''
];

$user = new User(
    null,
    $userData['firstName'],
    $userData['lastName'],
    $userData['middleName'],
    $userData['gender'],
    $userData['birthDate'],
    $userData['email'],
    $userData['phone'],
    $userData['avatar']
);

$userRepository = new UserRepository(ConnectionProvider::getConnection());
$userId = $userRepository->save($user);

echo "<h3>User saved successfully (id: {$userId})</h3>";