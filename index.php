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

    <style>
        body {
            background-color: #EBEBEB;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            margin: 0 15%;
        }


        .leftSide {

            color: white;
            float: left;
            background: linear-gradient(157.31deg, #414CAB 5.83%, #2E3467 95.62%);
            border-radius: 25px;
            text-align: center;
            width: 500px;
            height: 550px;
            margin-left: 60px;
            margin-top: 30px;
            padding-top: 60px;
            display: table-cell;
            vertical-align: middle;
        }

        .leftSide p {
            padding: 20px;
            margin-bottom: 40px;
        }

        .leftSide h2 {
            margin-top: 0px;
        }

        .leftSide img {
            margin-top: 25px;
        }

        .leftSide .signupBtn {
            text-decoration: none;
            background: none;
            border: none;
            border-radius: 10px;
            outline: 2px white solid;
            color: white;
            font-weight: bolder;
            padding: 15px 40px 15px 40px;
            transition: 0.2s;
        }

        .leftSide .signupBtn:hover {
            color: #2E3467;
            background-color: white;
        }



        .rightSide {
            padding: 150px 0px 0 0px;
            transform: translateX(50px);
        }

        .rightSide h2 {
            color: #414CAB;
        }

        .rightSide input {
            color: #51557E;
            border-radius: 5px;
            width: 300px;
            height: 50px;
            color: #51557E;
            background-color: white;
            border: none;
            padding-left: 15px;
        }

        .rightSide input[type="checkbox"] {
            width: 20px;
            margin-top: 10px;
            color: #414CAB;
        }

        .remember {
            vertical-align: 20px;
            margin-left: 7px;
            color: #414CAB;
            font-weight: bold;

        }



        .rightSide input[type="submit"] {
            transition: 0.2s;
            font-weight: bolder;
            color: white;
            background-color: #414CAB;
            font-size: 18px;
            width: 317px;
        }


        .rightSide input[type="submit"]:hover {
            box-shadow: 0 0 8px 0 #414CAB;
            cursor: pointer;
        }

        .btnM {
            display: none;
        }

        /*responsive */
        @media screen and (max-width: 500px) {

            body {
                text-align: center;
            }


            .container {
                margin: 0;
                margin-right: 100px;
            }

            .leftSide {
                display: none;
            }

            .check {
                transform: translateX(-86px)
            }

            .btnM {
                padding: 11px;
                border-radius: 5px;
                display: block;
                transition: 0.2s;
                font-weight: bolder;
                color: #414CAB;
                border: 2px #414CAB solid;
                font-size: 16px;
                min-width: 293px;
                text-decoration: none;
                ;
                transform: translateY(-10px);
            }

            .btnM:hover {
                background-color: #414CAB;
                color: white;
                box-shadow: 0 0 8px 0 #414CAB;

            }



        }
    </style>


</head>

<body>

    <div class="container">



        <div class="leftSide">
            <h2>Welcome back to</h2>
            <img src="logo.png" alt="">
            <p>Welcome to our website, your one stop
                destination for books and information about
                books. With our user-friendly interface, you can
                easily read post reviews. Join our community of
                book lovers today and immerse yourself in the
                wonderful world of literature!</p>
            <div>
                <a href="signup.php" class="signupBtn">Sign Up</a>
            </div>
        </div>


        <div class="rightSide">
            <h2>Login Page</h2>
            <form action="index.php" method="POST">
                <input type="text" name="username" placeholder="Email or Username"><br><br>
                <input type="password" name="password" placeholder="Password"><br>
                <div class="check"> <input type="checkbox" name="remember_me" value="checked"><span class="remember">Remember Me</span> <br><br>
                </div>
                <input type="submit" value="Login"><br><br>
                <div>
                    <a href="signup.php" class="btnM">Sign Up</a>
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