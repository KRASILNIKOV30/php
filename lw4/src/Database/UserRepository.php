<?php

declare(strict_types=1);

require_once '../Common/Database/Connection.php';
require_once '../Model/User.php';

class UserRepository
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function save(User $user): int
    {
        $query = <<<SQL
        INSERT INTO user
           (user_id, first_name, last_name, middle_name, gender, birth_date, email, phone, avatar_path)
        VALUES
           (:user_id, :first_name, :last_name, :middle_name, :gender, :birth_date, :email, :phone, :avatar_path) 
        SQL;

        $params = [
            ':user_id' => $user->getUserId(),
            ':first_name' => $user->getFirstName(),
            ':lastName' => $user->getLastName(),
            ':middleName' => $user->getMiddleName(),
            ':gender' => $user->getGender(),
            ':birth_date' => $user->getBirthDate(),
            ':email' => $user->getEmail(),
            ':phone' => $user->getPhone(),
            ':avatar_path' => $user->getAvatarPath()
        ];

        $this->connection->execute($query, $params);

        return $this->connection->getLastInsertId();

    }
}