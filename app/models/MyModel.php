<?php
namespace app\models;
use PDO;
class MyModel {
    private PDO $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function getAllRecords(): array {
        $stmt = $this->db->query("SELECT * FROM posts");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createRecord(string $data): bool {
        $stmt = $this->db->prepare("INSERT INTO posts (title, body) VALUES (?, ?)");
        return $stmt->execute([$title, $body]);
    }

    public function deleteRecotd(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM posts WHERE id = ?");
        return $stmt->execute([$id]);
    }
}