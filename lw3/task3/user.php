<?php

$file = fopen('users.json', 'r');
$usersJSON = file_get_contents('users.json');
$users = !empty($usersJSON) ? json_decode($usersJSON, true) : [];
$file = fopen('users.json', 'w');
$newUser = array(
    'lastName' => htmlentities($_POST['last_name']),
    'firstName' => htmlentities($_POST['first_name']),
    'patronymic' => htmlentities($_POST['patronymic']) ?? '',
    'gender' => htmlentities($_POST['gender']),
    'birthDate' => htmlentities($_POST['birth_date']),
    'email' => htmlentities($_POST['email']),
    'phone' => htmlentities($_POST['phone']) ?? '',
    'avatar' => htmlentities($_POST['avatar']) ?? ''
);
$isEmailUnique = true;
$isPhoneUnique = true;
if (!empty($users))
{
    foreach ($users as $user)
    {
        if ($newUser['email'] === $user['email'])
        {
            $isEmailUnique = false;
            break;
        }
        if (!empty($newUser['phone']) && $newUser['phone'] === $user['phone'])
        {
            $isPhoneUnique = false;
            break;
        }
    }
}
if ($isEmailUnique && $isPhoneUnique)
{
    $users[] = $newUser;
    echo "<h3>Пользователь добавлен</h3>";
}
elseif (!$isEmailUnique)
{
    echo "<h3 style='color: red'>Пользователь с таким email уже существует</h3>";
}
else
{
    echo "<h3 style='color: red'>Пользователь с таким телефоном уже существует</h3>";
}

$json = json_encode($users, JSON_UNESCAPED_UNICODE);
fwrite($file, $json);
fclose($file);


