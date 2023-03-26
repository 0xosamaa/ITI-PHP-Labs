<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Users Table</title>
</head>

<body>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Department</th>
                    <th scope="col">Code</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Address</th>
                    <th scope="col">Country</th>
                    <th scope="col">Skills</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $database = file("database.txt");
                function users_table($user)
                {
                    static $id = 0;
                    $user_data = explode(":", $user);
                    echo "<tr id='$id'>";
                    if (count($user_data) <= 10) {
                        foreach ($user_data as $i => $field) {
                            echo "<td>$field</td>";
                        }
                    } else {
                        foreach ($user_data as $i => $field) {
                            if ($i === 9) {
                                echo "<td>$field";
                            } elseif ($i > 9 && $i < count($user_data)) {
                                echo "<br>$field";
                            } elseif ($i === count($user_data) - 1) {
                                echo "</td>";
                            } else {
                                echo "<td>$field</td>";
                            }
                        }
                    }
                    echo "<td><form method='GET'action='edit_user.php'><input type='hidden' name='update_id' value='$id'><button class='btn btn-primary update'>Update</button></form></td>
                    <td><form action='delete_user.php' method='POST'><input type='hidden' name='delete_id' value='$id'><button type='submit' class='btn btn-danger'>Delete</button></form></td>";
                    echo "</tr>";
                    $id++;
                }
                array_map("users_table", $database);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>