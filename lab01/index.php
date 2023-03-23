<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Lab 01</title>
</head>
<body>
    <div class="container my-5">
    <form method="POST" action="./welcome.php">
        <label class="form-label" for="fname">First Name</label>
        <input class="form-control" type="text" name="fname" id="">
        <label class="form-label" for="lname">Last Name</label>
        <input class="form-control" type="text" name="lname" id="">
        <label class="form-label" for="address">Address</label>
        <div class="mb-3">
          <textarea class="form-control" name="address" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="country">Country</label>
            <select name="country" id="">
                <option value="egypt">Egypt</option>
                <option value="usa">United States Of America</option>
                <option value="germany">Germany</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Gender</label>
            <label class="form-label">
                Male
                <input type="radio" name="gender" value="Male" id="">
            </label>
            <label class="form-label">
                Female
                <input type="radio" name="gender" value="Female" id="">
            </label>
        </div>
        <label class="form-label">
            Nodejs
            <input type="checkbox" name="skills[]" value="Nodejs" id="">
        </label>
        <label class="form-label">
            Mongodb
            <input type="checkbox" name="skills[]" value="Mongodb" id="">
        </label>
        <label class="form-label">
            Expressjs
            <input type="checkbox" name="skills[]" value="Expressjs" id="">
        </label>
        <label class="form-label">
            React
            <input type="checkbox" name="skills[]" value="React" id="">
        </label>
        <div class="mb-3">
            <label class="form-label" for="username">Username</label>
            <input class="form-control" type="text" name="username" id="">
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input class="form-control" type="password" name="password" id="">
        </div>
        <div class="mb-3">
            <label class="form-label" for="department">Department</label>
            <input class="form-control" type="text" name="department" id="">
        </div>
        <div class="mb-3">
            <label class="form-label" for="code">Code</label>
            <input class="form-control" type="text" name="code" id="">
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