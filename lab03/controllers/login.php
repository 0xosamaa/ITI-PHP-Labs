<?
$errors = [];

$users = file("../database/users.txt");
foreach ($users as $user) {
    $user_email = explode(":", $user)[2];
    $user_password = explode(":", $user)[3];
    if ($_POST['email'] === $user_email) {
        if ($_POST['password'] === $user_password) {
            session_start();
            $_SESSION['loggedin_user'] = $user;
            header("Location: ../index.php");
            exit();
        }
    }
}
$errors['invalid_login'] = "Email or password are incorrect";
session_start();

$_SESSION['errors'] = json_encode($errors);
header("Location: ../views/login.php");
