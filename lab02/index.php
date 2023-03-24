<?session_start();?>
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
        <?
            $errors=(array)json_decode($_SESSION['errors']);
                if(!empty($errors)){
                foreach($errors as $error){
                    echo "<div class='alert alert-danger' role='alert'>\n$error\n</div>";
                }
                if(!empty($_SESSION)){
                    $form_data=(array)json_decode($_SESSION['form_data']);
                }else {
                    $form_data=[];
                }
            }
        ?>
    <form method="POST" action="./welcome.php">
        <label class="form-label" for="fname">First Name</label>
        <input class="form-control" type="text" name="fname" id="" value="<?echo ((array)json_decode($_SESSION['form_data']))['fname']??''?>">
        <label class="form-label" for="lname">Last Name</label>
        <input class="form-control" type="text" name="lname" id="" value="<?echo ((array)json_decode($_SESSION['form_data']))['lname']??''?>">
        <div class="mb-3">
            <label class="form-label">Gender</label>
            <label class="form-label">
                Male
                <input type="radio" name="gender" value="Male" id="" <? if(!empty(((array)json_decode($_SESSION['form_data']))['gender'])&&((array)json_decode($_SESSION['form_data']))['gender'] === 'Male') echo 'checked'; else echo ''; ?>>
            </label>
            <label class="form-label">
                Female
                <input type="radio" name="gender" value="Female" id="" <? if(!empty(((array)json_decode($_SESSION['form_data']))['gender'])&&((array)json_decode($_SESSION['form_data']))['gender'] === 'Female') echo 'checked'; else echo ''; ?>>
            </label>
        </div>
        <label class="form-label" for="address">Address</label>
        <div class="mb-3">
          <textarea class="form-control" name="address" id="" cols="30" rows="10"><? echo((array)json_decode($_SESSION['form_data']))['address']??'' ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="country">Country</label>
            <select name="country" id="">
                <option value="egypt" <? if(((array)json_decode($_SESSION['form_data']))['country']??'' === 'egypt') echo 'selected'; else echo ''; ?>>Egypt</option>
                <option value="usa" <? if(((array)json_decode($_SESSION['form_data']))['country']??'' === 'usa') echo 'selected'; else echo ''; ?>>United States Of America</option>
                <option value="germany" <? if(((array)json_decode($_SESSION['form_data']))['country']??'' === 'germany') echo 'selected'; else echo ''; ?>>Germany</option>
            </select>
        </div>
        <label class="form-label">
            Nodejs
            <input type="checkbox" name="skills[]" value="Nodejs" id="" <? foreach(((array)json_decode($_SESSION['form_data']))['skills']??[] as $skill){if ($skill === 'Nodejs') echo 'checked';}?>>
        </label>
        <label class="form-label">
            Mongodb
            <input type="checkbox" name="skills[]" value="Mongodb" id="" <? foreach(((array)json_decode($_SESSION['form_data']))['skills']??[] as $skill){if ($skill === 'Mongodb') echo 'checked';}?>>
        </label>
        <label class="form-label">
            Expressjs
            <input type="checkbox" name="skills[]" value="Expressjs" id="" <? foreach(((array)json_decode($_SESSION['form_data']))['skills']??[] as $skill){if ($skill === 'Expressjs') echo 'checked';}?>>
        </label>
        <label class="form-label">
            React
            <input type="checkbox" name="skills[]" value="React" id="" <? foreach(((array)json_decode($_SESSION['form_data']))['skills']??[] as $skill){if ($skill === 'React') echo 'checked';}?>>
        </label>
        <div class="mb-3">
            <label class="form-label" for="username">Username</label>
            <input class="form-control" type="text" name="username" id="" value="<?echo ((array)json_decode($_SESSION['form_data']))['username']??''?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input class="form-control" type="password" name="password" id="">
        </div>
        <div class="mb-3">
            <label class="form-label" for="department">Department</label>
            <input class="form-control" type="text" name="department" id="" value="<?echo ((array)json_decode($_SESSION['form_data']))['department']??''?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="code">Code</label>
            <input class="form-control" type="text" name="code" id="" value="<?echo ((array)json_decode($_SESSION['form_data']))['code']??''?>">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-primary" type="reset">Reset</button>
        </div>
    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>