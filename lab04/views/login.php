<?php session_start(); ?>
<?php
if (isset($_SESSION['loggedin_user'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center vh-100 gap-5">
                <h1>Login</h1>
                <div class="col-3"></div>
                <div class="col-6">
                    <?php
                    if (!empty($_SESSION['errors'])) {
                        $errors = (array)json_decode($_SESSION['errors']);
                        foreach ($errors as $error) {
                            echo "<div class='alert alert-danger' role='alert'>\n$error\n</div>";
                        }
                        session_destroy();
                    }
                    ?>
                    <form action="../controllers/login.php" method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="" placeholder="">
                        </div>
                        <button class="form-control btn btn-primary" type="submit">Login</button>
                    </form>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
</body>

</html>