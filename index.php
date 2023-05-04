<?php
// Check if user is already logged in
include "includes/connection_to_sql.php";
session_start();
if (isset($_SESSION['userdata'])) {
    header('location: pages/home.php');
}

// TODO: Validate user input and check if user exists in the database
$errors = [];

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password are not empty
    if (empty($username)) {
        $errors['username'] = "Username/email is required.";
    }
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    }
$username_escaped=$conn->real_escape_string($username);

    // Check if there are no errors
    if (empty($errors)) {
        // Check if the user exists in the database
        $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username` = ? or `email` = ?" );
        $stmt->bind_param("ss", $username_escaped,$username_escaped);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        if ($result) {
            // Verify password
            if ((($password) ==$result['password'])) {
                // Store user data in session
                $_SESSION['userdata'] = $result;
                header('location:pages/home.php');
            } else {
                $errors['password'] = "Incorrect password.";
            }
        } else {
            $errors['username'] = "Account not found.";
        }
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
<link rel="stylesheet" href="styles/index.css?<?=time()?>">


</head>

<body>

    <div class="container">



        <div class="leftSide">
            <h2>Welcome back to</h2>
            <img src="assets/logoW.svg" alt="">
            <p>Welcome to our website, your one stop
                destination for books and information about
                books. With our user-friendly interface, you can
                easily read post reviews. Join our community of
                book lovers today and immerse yourself in the
                wonderful world of literature!</p>
            <div>
                <a href="login-signup/signup.php" class="signupBtn">Sign Up</a>
            </div>
        </div>


        <div class="rightSide">
            <h2>Login Page</h2>
            <form action="index.php" method="POST">
                <input type="text" name="username" placeholder="Email or Username"><br>
                <?php
                             if (!empty($errors['username'])) echo "<span class='error-input-signin'>".$errors['username']."</span>";
                        
                            ?>
                <br>
                <input type="password" name="password" placeholder="Password"><br>
                <?php
                             if (!empty($errors['password'])) echo "<span class='error-input-signin'>".$errors['password']."</span>";
                        
                            ?>
                <br>
                <div class="check"> <input type="checkbox" name="remember_me" value="checked"><span class="remember">Remember Me</span> <br><br>
                </div>
                <input type="submit" value="Login"><br><br>
                <div>
                    <a href="login-signup/signup.php" class="btnM">Sign Up</a>
                </div>

                <?php
                
                if (!empty($error))
                    echo " <span >$error</span>"
                ?>
            </form>

        </div>



    </div>

</body>

</html>