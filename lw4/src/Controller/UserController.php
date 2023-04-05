<?php

declare(strict_types=1);

namespace App\Controller;

use App\Common\Database\ConnectionProvider;
use App\Database\UserTable;

use App\Model\User;
use RuntimeException;

class UserController
{
    public function saveUser(): void
    {
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

        $userRepository = new UserTable(ConnectionProvider::getConnection());
        $userId = $userRepository->save($user);
        header("Location: http://localhost:8000/show_user.php?user_id=$userId");
    }

    public function showUser(): void
    {
        $userId = (int)$_GET['user_id'];
        if (!$userId) {
            throw new RuntimeException("User id expected. Usage: show_user?user_id=(id)");
        }

        $userTable = new UserTable(ConnectionProvider::getConnection());
        $user = $userTable->findOne($userId);

        require __DIR__ . '/../View/user.php';
    }
}