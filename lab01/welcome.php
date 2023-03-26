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
        <p>Thanks <?php echo "{$_POST['fname']} . {$_POST['lname']}"; ?> </p>
        <p>Please Review Your Information</p>
        <p>Name: <?php echo "{$_POST['fname']} . ' ' . {$_POST['lname']}" ?></p>
        <p>Gender: <?php echo "{$_POST['gender']}" ?></p>
        <p>Address: <?php echo "{$_POST['address']}" ?></p>
        <p>Your Skills: <?php
                        $skills = $_POST['skills'];
                        foreach ($skills as $skill) {
                            echo "$skill";
                            echo '<br>';
                        }
                        ?>
        </p>
        <p>Department: <?php echo "{$_POST['department']}" ?></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>