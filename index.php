<?php
//TODO: getting username/email and passwords to auth
//TODO: getting data if the user that have account
ini_set("session.cookie_lifetime", 86400);
session_start();



if(isset($_SESSION['userdata'])){
   
header('location: pages/home.php');
}

$signInDataAsWriter = array('name' => "mustafa majid", 'username' => "mustafa", 'email' => "mstafa@gmail.com", 'password' => "mustafa123", 'type' => "writer");
$signInDataAsReader = array('name' => "blnd zyad", 'username' => "blnd", 'email' => "blnd@gmail.com", 'password' => "blnd123", 'type' => "reader");
$error = "";

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username == $signInDataAsWriter['username'] && $password == $signInDataAsWriter['password']) {
            if(isset($_POST["remember_me"])){
                setcookie("userdata",json_encode($signInDataAsWriter), time()+60); // Set a cookie named "name" with the value "John" that expires in 1 hour

               }
               $_SESSION["userdata"] = $signInDataAsWriter;
                header('location:pages/home.php');

    } else if ($username == $signInDataAsReader['username'] && $password == $signInDataAsReader['password']) {

        if(isset($_POST["remember_me"])){
            setcookie("userdata",json_encode($signInDataAsReader), time()+60); // Set a
           }

           $_SESSION["userdata"] = $signInDataAsReader;
           header('location:pages/home.php');
    } else {
        $error = "Incorrect username or password.";
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <h2>Login Page</h2>
        <form action="#" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username"><br><br>
            <label for="password">Password:</label>
            <input type="password" name="password"><br><br>
            <input type="checkbox" name="remember_me" value="checked"> Remember Me<br><br>
            <input type="submit" value="Login"><br><br>
    </div>
    <div>
        <a href="login-signup/signup.php">Sign up now</a>
    </div>

    <?php
    if (!empty($error))
        echo " <span >$error</span>"
    ?>
    </form>
</body>

</html>