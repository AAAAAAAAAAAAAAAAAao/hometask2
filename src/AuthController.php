<?php
function sanitizeString(?string $s): string{
    $s = (string) $s;
    $s = trim($s);
    return $s;
}

function register(array $post, Datapase $db){
    $email = filter_var($post['email'], FILTER_VALIDATE_EMAIL);
    $name = sanitizeString($post['name'] ?? '');
    $password = $post['password'] ?? '';

    if ($email === false){
        throw new \InvalidArgumentException("невірна пошта");
    }
    if (strlen($password) < 8){
        throw new \InvalidArgumentException("пароль занадто короткий");
    }

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    $userId = $db->createUser($email, $passwordHash, $name);
    return $userId;
}

function login(array $post, Database $db){
    $email = filter_var($post['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $password = $post['password'] ?? '';

    if ($email === false){
        throw new \InvalidArgumentException("невірна пошта");
    }

    $user = $db->getUserByEmail($email);
    if (!$user){
        return false;
    }

    if (password_verify($password, $user['password_hash'])){
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        return true;
    } else {
        return false;
    }
}