<?
$database = file("database.txt");
unset($database[$_POST['delete_id']]);
$file = fopen("database.txt","w");
fwrite($file,implode($database));
header("Location: http://localhost:8000/users_table.php");