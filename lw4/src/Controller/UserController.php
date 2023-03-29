<?php

declare(strict_types=1);

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
    }
}