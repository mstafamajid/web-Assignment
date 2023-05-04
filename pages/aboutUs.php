<?php 

$logoPath = "../assets\logo.svg";
include '../includes/navbar.php';
if (!isset($_SESSION["userdata"])) {
    header("location:../index.php");
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../styles/aboutUs.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>About Us</h1>

<div class="container">


<div class="card">
    <img src="../assets/blnd.jpg" alt="blnd img">
    <h2>Blnd Zyad</h2>
    <p>Ui\Ux Designer</p>
</div>

<div class="card">
    <img src="../assets/mustafa.jpg" alt="Mustafa img">
    <h2>Mustafa Majid</h2>
    <p>Flutter Developer</p>
</div>


</div>


<footer>

<img src="../assets/logoW.svg" alt="">

<div class="links">
<a href="mailto:blnd.00482229@gmail.com">Email</a>
<a href="https://www.facebook.com/blnd.zyad.5">Facebook</a>
<a href="https://www.linkedin.com/in/mustafa-majid-dev/">Linked In</a>
</div>

<hr>

<div class="bot">
<p class="tell">0751 774 1789  -  0782 388 9415</p>
<p class="coppyR">© 2023 KoyaUniveristy. All rights reserved.</p>
</div>

</footer>




</body>
</html>
