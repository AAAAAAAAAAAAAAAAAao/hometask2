<?php
class Database {
    private \PDO $pdo;

    public function __construct(string $pathToSqliteFile){
        $dsn = "sqlite:" . $pathToSqliteFile;
        $opts = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ];
        $this->pdo = new \PDO($dsn, null, null, $opts);
    }
    public function exec(string $sql): int{
        return $this->pdo->exec($sql);
    }


    // Для людей
    public function getUserByEmail(string $email): ?array{
        $sql = "SELECT id, email, password_hash, name FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();
        return $user ?: null;
    }

    public function createUser(string $name, string $email, string $password): int{
        $sql = "INSERT INTO users (name, email, password_hash, created_at) VALUES (:name, :email, :password_hash, :created_at)";
        $stmt = $this->pdo->prepare($sql);
        $stmt -> execute([
            'name' => $name,
            'email' => $email,
            'password_hash' => $password,
            'created_at' => (new \dateTime())->format('Y-m-d H:i:s')
        ]);
        return (int)$this->pdo->lastInsertId();
    }

    public function updateUserPassword(int $userId, string $newPassword): bool{
        $sql = "UPDATE users SET password_hash = :password_hash WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'id' => $userId
        ]);
    }

    //авторизація
    public function checkUser($email, $password) {

        $user = $this->getUserByEmail($email);

        if (!$user) {
            return null;
        }

        if(password_verify($password, $user['password_hash'])){
            return $user;
        }
        return null;
    }
}