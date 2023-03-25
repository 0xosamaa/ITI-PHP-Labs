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
        }else{
            header("Location: http://localhost:8000/show_users.php");
        }

        $database = fopen("database.txt","a");
        fwrite($database, "{$_POST['fname']}:{$_POST['lname']}:{$_POST['username']}:{$_POST['password']}:{$_POST['department']}:{$_POST['code']}:{$_POST['gender']}:{$_POST['address']}:{$_POST['country']}");
        if(!empty($_POST['skills'])){
            foreach ($_POST['skills'] as $skill) {
                fwrite($database, ":{$skill}");
            }
        }
        fwrite($database, "\n");
