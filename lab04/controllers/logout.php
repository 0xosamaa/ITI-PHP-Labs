<?php
session_start();
if (isset($_SESSION['loggedin_user'])) {
    session_destroy();
    header("Location: ../index.php");
}
