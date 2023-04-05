<?php

declare(strict_types=1);

require_once __DIR__ . '/../Common/Database/Connection.php';
require_once __DIR__ . '/../Model/User.php';

class UserTable
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
           (first_name, last_name, middle_name, gender, birth_date, email, phone, avatar_path)
        VALUES
           (:first_name, :last_name, :middle_name, :gender, :birth_date, :email, :phone, :avatar_path) 
        SQL;

        $params = [
            ':first_name' => $user->getFirstName(),
            ':last_name' => $user->getLastName(),
            ':middle_name' => $user->getMiddleName(),
            ':gender' => $user->getGender(),
            ':birth_date' => $user->getBirthDate(),
            ':email' => $user->getEmail(),
            ':phone' => $user->getPhone(),
            ':avatar_path' => $user->getAvatarPath()
        ];

        $this->connection->execute($query, $params);

        return $this->connection->getLastInsertId();
    }

    public function findOne(int $id): User
    {
        $query = <<<SQL
            SELECT
                user_id,
                first_name,
                last_name,
                middle_name,
                gender,
                birth_date,
                email,
                phone,
                avatar_path
            FROM user
            WHERE user_id = $id
            SQL;
        $stmt = $this->connection->execute($query);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            throw new RuntimeException("User with id $id not found");
        }
        return $this->hydrateUser($row);
    }

    private function hydrateUser(array $data): User
    {
        return new User(
            $data['user_id'],
            $data['first_name'],
            $data['last_name'],
            $data['middle_name'],
            $data['gender'],
            $data['birth_date'],
            $data['email'],
            $data['phone'],
            $data['avatar_path']
        );
    }
}