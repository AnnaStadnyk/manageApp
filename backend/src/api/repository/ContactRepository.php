<?php

namespace App\api\repository;

//use App\model\TaskModel;
use PDO;

class ContactRepository
{
    public function __construct(private \PDO $pdo) {}

    public function create(array $data): string | null
    {
        $stmt = $this->pdo->prepare('INSERT into contacts (name, surname, phone, email, department, privacy) values (:name, :surname, :phone, :email, :department, :privacy)');

        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':surname', $data['surname']);
        $stmt->bindValue(':phone', $data['phone']);
        $stmt->bindValue(':email', $data['email']);
        $stmt->bindValue(':department', $data['department'], PDO::PARAM_INT);
        $stmt->bindValue(':privacy', $data['privacy'], PDO::PARAM_BOOL);

        $stmt->execute();

        return $this->pdo->lastInsertId();
    }
}