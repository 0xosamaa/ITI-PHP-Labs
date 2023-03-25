<? session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="my-4">
            <h1>Register</h1>
        </div>
        <?
        if (!empty($_SESSION['errors'])) {
            $errors = (array)json_decode($_SESSION['errors']);
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger' role='alert'>\n$error\n</div>";
            }
        }
        session_destroy();
        ?>
        <form action="../controllers/register.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="" placeholder="">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="" placeholder="">

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="" placeholder="">
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" id="" placeholder="">
            </div>
            <div class="mb-3">
                <label for="room_no" class="form-label">Room No.</label>
                <select class="form-control" name="room_no" id="">
                    <option value="room_1">Room 1</option>
                    <option value="room_2">Room 2</option>
                    <option value="room_3">Room 3</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="ext" class="form-label">Ext.</label>
                <input type="text" class="form-control" name="ext" id="" placeholder="">
            </div>
            <div class="mb-3">
                <label for="profile_pic" class="form-label">Profile Picture</label>
                <input name="profile_pic" class="form-control" type="file" src="" alt="">
            </div>
            <div class="mb-3">
                <button class="form-control btn btn-primary" type="submit">Register</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>