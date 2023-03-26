<?php
$errors = [];
try {
    $dsn = 'mysql:dbname=php_lab04;host=127.0.0.1;port=3306;';
    $user = 'root';
    $password = '';
    $db = new PDO($dsn, $user, $password);
    $query = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$_POST['email'], $_POST['password']]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    unset($db);
    if (!empty($result)) {
        session_start();
        $_SESSION['loggedin_user'] = $result;
        header("Location: ../index.php");
    } else {
        $errors['invalid_login'] = "Email or password are incorrect";
        session_start();
        $_SESSION['errors'] = json_encode($errors);
        header("Location: ../views/login.php");
    }
    exit();
} catch (PDOException $e) {
    unset($db);
    echo 'Connection failed: ' . $e->getMessage();
}
