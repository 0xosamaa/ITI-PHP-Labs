<? phpsession_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Lab 02</title>
</head>

<body>
    <div class="container my-5">
        <?php
        if (!empty($_SESSION['errors'])) {
            $errors = (array)json_decode($_SESSION['errors']);
        }
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger' role='alert'>\n$error\n</div>";
            }
        }
        if (empty($_SESSION['user_data'])) {
            $_SESSION['user_data'] = '';
        }
        ?>
        <form method="POST" action="update_user.php">
            <label class="form-label" for="fname">First Name</label>
            <input class="form-control" type="text" name="fname" value="<? phpecho((array)json_decode($_SESSION['user_data']))['fname'] ?? '' ?>">
            <label class="form-label" for="lname">Last Name</label>
            <input class="form-control" type="text" name="lname" value="<? phpecho((array)json_decode($_SESSION['user_data']))['lname'] ?? '' ?>">
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <label class="form-label">
                    Male
                    <input type="radio" name="gender" value="Male" <?php if (!empty(((array)json_decode($_SESSION['user_data']))['gender']) && ((array)json_decode($_SESSION['user_data']))['gender'] === 'Male') echo 'checked';
                                                                    else echo ''; ?>>
                </label>
                <label class="form-label">
                    Female
                    <input type="radio" name="gender" value="Female" <?php if (!empty(((array)json_decode($_SESSION['user_data']))['gender']) && ((array)json_decode($_SESSION['user_data']))['gender'] === 'Female') echo 'checked';
                                                                        else echo ''; ?>>
                </label>
            </div>
            <label class="form-label" for="address">Address</label>
            <div class="mb-3">
                <textarea class="form-control" name="address" cols="30" rows="10"><?php echo ((array)json_decode($_SESSION['user_data']))['address'] ?? '' ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="country">Country</label>
                <select name="country">
                    <option value="egypt" <?php if (((array)json_decode($_SESSION['user_data']))['country'] ?? '' === 'egypt') echo 'selected';
                                            else echo ''; ?>>Egypt</option>
                    <option value="usa" <?php if (((array)json_decode($_SESSION['user_data']))['country'] ?? '' === 'usa') echo 'selected';
                                        else echo ''; ?>>United States Of America</option>
                    <option value="germany" <?php if (((array)json_decode($_SESSION['user_data']))['country'] ?? '' === 'germany') echo 'selected';
                                            else echo ''; ?>>Germany</option>
                </select>
            </div>
            <label class="form-label">
                Nodejs
                <input type="checkbox" name="skills[]" value="Nodejs" <?php foreach (((array)json_decode($_SESSION['user_data']))['skills'] ?? [] as $skill) {
                                                                            if ($skill === 'Nodejs') echo 'checked';
                                                                        } ?>>
            </label>
            <label class="form-label">
                Mongodb
                <input type="checkbox" name="skills[]" value="Mongodb" <?php foreach (((array)json_decode($_SESSION['user_data']))['skills'] ?? [] as $skill) {
                                                                            if ($skill === 'Mongodb') echo 'checked';
                                                                        } ?>>
            </label>
            <label class="form-label">
                Expressjs
                <input type="checkbox" name="skills[]" value="Expressjs" <?php foreach (((array)json_decode($_SESSION['user_data']))['skills'] ?? [] as $skill) {
                                                                                if ($skill === 'Expressjs') echo 'checked';
                                                                            } ?>>
            </label>
            <label class="form-label">
                React
                <input type="checkbox" name="skills[]" value="React" <?php foreach (((array)json_decode($_SESSION['user_data']))['skills'] ?? [] as $skill) {
                                                                            if ($skill === 'React') echo 'checked';
                                                                        } ?>>
            </label>
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" type="text" name="username" value="<? phpecho((array)json_decode($_SESSION['user_data']))['username'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" name="password">
            </div>
            <div class="mb-3">
                <label class="form-label" for="department">Department</label>
                <input class="form-control" type="text" name="department" value="<? phpecho((array)json_decode($_SESSION['user_data']))['department'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="code">Code</label>
                <input class="form-control" type="text" name="code" value="<? phpecho((array)json_decode($_SESSION['user_data']))['code'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <input type="hidden" name="update_id" value="<?php echo "{$_GET['update_id']}" ?>">
                <button class="btn btn-primary" type="submit">Submit</button>
                <button class="btn btn-primary" type="reset">Reset</button>
            </div>
        </form>
    </div>
    <? phpsession_destroy() ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>