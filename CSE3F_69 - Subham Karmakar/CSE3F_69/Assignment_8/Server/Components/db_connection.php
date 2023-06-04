<?php
    $connection = mysqli_connect("localhost", "root", "", "Assignment_8");

    @session_start();
    if ($_SESSION["NAME"] == "")
    {
        header("location: login.php");
    }
?>