<?php

$errors = [];

if (empty($_POST['name'])) {
    $errors['fname_required'] = "Name is required";
} else {
    if (strlen($_POST['name']) < 2) {
        $errors['name_short'] = "Name is too short";
    }
    if (strlen($_POST['name']) > 20) {
        $errors['name_long'] = "Name is too long";
    }
}
if (empty($_POST['email'])) {
    $errors['email_required'] = "Email is required";
} else {
    // FILTER_VALIDATE_EMAIL Start
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors['email_invalid'] = "Invalid email";
    }
    // FILTER_VALIDATE_EMAIL End

    // Regex Start
    $pattern = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";

    if (!preg_match($pattern, $_POST["email"])) {
        $errors['email_invalid'] = "Invalid email";
    }
    // Regex End
}
if (!empty($_POST['password']) && !empty($_POST['confirm_password'])) {
    if ($_POST['password'] === $_POST['confirm_password']) {
        $uppercase = preg_match('@[A-Z]@', $_POST['password']);
        $lowercase = preg_match('@[a-z]@', $_POST['password']);
        $number    = preg_match('@[0-9]@', $_POST['password']);
        $specialChars = preg_match('@[^\w]@', $_POST['password']);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['password']) < 8) {
            $errors['password_invalid'] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character';
        }
    } else {
        $errors['passwords_unmatch'] = 'Passwords are not matching';
    }
} else {
    $errors['passwords_required'] = 'Password is required';
}

if (!empty($_FILES['profile_pic']['name'])) {
    $file_name = $_FILES['profile_pic']['name'];
    $file_tmp = $_FILES['profile_pic']['tmp_name'];
    $file_size = $_FILES['profile_pic']['size'];
    $file_extension = pathinfo($file_name)['extension'];
    $allowed_extensions = array("jpeg", "jpg", "png");
    if (!in_array($file_extension, $allowed_extensions)) {
        $errors['file_extension'] = "Extension not allowed, please choose a JPEG or PNG file";
    }
    if ($file_size > 2_097_152) {
        $errors['file_size'] = "File size must be less than 2 MB";
    }
    if (empty($errors['file_extension']) && empty($errors['file_size'])) {
        move_uploaded_file($file_tmp, __dir__ . "/../public/images/" . $file_name);
    }
} else {
    $errors['file_required'] = "Image is required";
}

if (!empty($errors)) {
    session_start();
    $_SESSION['errors'] = json_encode($errors);
    header("Location: ../views/register.php");
    exit();
} else {
    $auto_increment_file = fopen("../database/auto_increment.txt", "r");
    $id = fread($auto_increment_file, filesize("../database/auto_increment.txt"));
    $id = (int)$id;
    fclose($auto_increment_file);
    $user = "$id:{$_POST['name']}:{$_POST['email']}:{$_POST['password']}:{$_POST['room_no']}:{$_POST['ext']}:{$_FILES['profile_pic']['name']}";
    $id++;
    $auto_increment_file = fopen("../database/auto_increment.txt", "w");
    fwrite($auto_increment_file, $id);
    $users_file = fopen("../database/users.txt", "a");
    fwrite($users_file, $user . PHP_EOL);
    fclose($users_file);
    header("Location: ../index.php");
    exit();
}
