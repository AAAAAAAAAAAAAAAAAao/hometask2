<?php
require_once "src/AuthController.php";
require_once "src/Database.php";
require_once "src/Student.php";
require_once "src/Teacher.php";

$config = [
    'driver' => 'sqlite',
    'database' => __DIR__ . '/database.sqlite'
];

$db = new Database($config['database']);

$db->exec("
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT NOT NULL UNIQUE,
        password_hash TEXT NOT NULL,
        name TEXT,
        created_at TEXT NOT NULL
    );
");

//$db->createUser('Віктор Корнєплод', 'barabola@gmail.com', 'assword');

$user = $db->checkUser('barabola@gmail.com', 'assword');

echo "<pre>";
print_r($user);
echo "</pre>";

$student = new Student("Анастасія Зємлєройка", "krot@gmail.com", "СМ-85");
$teacher = new Teacher ("Віктор Корнєплод", "baraboola@gmail.com", "Садівництво");

echo "Ім’я: " . $student->getName() . "<br>";
echo "Email: " . $student->getEmail() . "<br>";
echo "Роль: " . $student->getRole() . "<br>";
echo "Група: " . $student->getGroup() . "<br><br>";

echo "Ім’я: " . $teacher->getName() . "<br>";
echo "Email: " . $teacher->getEmail() . "<br>";
echo "Роль: " . $teacher->getRole() . "<br>";
echo "Предмет: " . $teacher->getSubject() . "<br>";