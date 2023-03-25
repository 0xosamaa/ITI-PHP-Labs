<? session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Lab 03</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-column justify-content-center align-items-center vh-100 gap-5">
                <?
                if (isset($_SESSION['loggedin_user'])) {
                    $user = explode(":", $_SESSION['loggedin_user']);
                    echo "  <div class='row'>
                                <h1>Welcome {$user[1]}</h1>
                            </div>
                            <div class='row'>
                              <div class='col-12'>
                                  <a href='./controllers/logout.php' class='btn btn-primary mx-1'>Logout</a>
                              </div>
                            </div>
                          ";
                } else {
                    echo "  <div class='row'>
                                <h1>Welcome</h1>
                            </div>
                            <div class='row'>
                            <div class='col-12'>
                                <a href='./views/login.php' class='btn btn-primary mx-1'>Login</a>
                                <a href='./views/register.php' class='btn btn-primary mx-1'>Register</a>
                            </div>
                          </div>";
                }
                ?>



            </div>
        </div>
    </div>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>