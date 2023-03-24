<?
$errors=[];
        if(empty($_POST['fname'])){
            $errors['fname_required'] = "First Name is required";
        }else{
            if(strlen($_POST['fname'])<2){
                $errors['fname_short'] = "First Name is too short";
            }
            if(strlen($_POST['fname'])>20){
                $errors['fname_long'] = "First Name is too long";
            }
        }
        if(empty($_POST['lname'])){
            $errors['lname_required'] = "Last Name is required";
        }else{
            if(strlen($_POST['lname'])<2){
                $errors['lname_short'] = "Last Name is too short";
            }
            if(strlen($_POST['lname'])>20){
                $errors['lname_long'] = "Last Name is too long";
            }
        }
        if(empty($_POST['username'])){
            $errors['username_required'] = "Username is required";
        }else{
            if(strlen($_POST['username'])<6){
                $errors['username_short'] = "Username is too short";
            }
            if(strlen($_POST['username'])>20){
                $errors['username_short'] = "Username is too long";
            }
        }

        $uppercase = preg_match('@[A-Z]@', $_POST['password']);
        $lowercase = preg_match('@[a-z]@', $_POST['password']);
        $number    = preg_match('@[0-9]@', $_POST['password']);
        $specialChars = preg_match('@[^\w]@', $_POST['password']);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['password']) < 8) {
            $errors['password'] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        }
        if(empty($_POST['department'])){
            $errors['department_required'] = "Department is required";
        }
        if(empty($_POST['code'])){
            $errors['code_required'] = "Code is required";
        }
        if(empty($_POST['gender'])){
            $errors['gender_required'] = "Gender is required";
        }
        if(empty($_POST['address'])){
            $errors['address_required'] = "Address is required";
        }
        if(empty($_POST['country'])){
            $errors['country_required'] = "Country is required";
        }
        if($errors){
            session_start();
            $_SESSION['form_data'] = json_encode($_POST);
            $_SESSION['errors'] = json_encode($errors);
            header("Location: http://localhost:8000");
            exit;
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Welcome</title>
</head>
<body>
    <div class="container text-center">
        <p>Thanks <? echo "{$_POST['fname']} {$_POST['lname']}"; ?> </p>
    <p>Please Review Your Information</p>
    <p>Name: <? echo "{$_POST['fname']} {$_POST['lname']}" ?></p>
    <p>Gender: <? echo "{$_POST['gender']}" ?></p>
    <p>Address: <? echo "{$_POST['address']}" ?></p>
    <p>Your Skills: <? 
    $skills = $_POST['skills'];
    foreach($skills as $skill){
        echo "$skill";
        echo '<br>';
    }
    ?>
    </p>
    <p>Department: <? echo "{$_POST['department']}" ?></p>
    </div>

    <?
        $database = fopen("database.txt","a");
        fwrite($database, "{$_POST['fname']}:{$_POST['lname']}:{$_POST['username']}:{$_POST['password']}:{$_POST['department']}:{$_POST['code']}:{$_POST['gender']}:{$_POST['address']}:{$_POST['country']}");
        if(!empty($_POST['skills'])){
            foreach ($_POST['skills'] as $skill) {
                fwrite($database, ":{$skill}");
            }
        }
        fwrite($database, "\n");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>