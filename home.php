<?php
session_start();
$logoPath = "assets\logo.svg";
if (isset($_SESSION["userdata"])) {
    //echo "welcome".$_SESSION['userdata']['name'];
}
include "includes\\navbar.php";
?>
