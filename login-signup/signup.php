<?php
//TODO: getting usernames and emails to check that if that username and email is used or not
//TODO: validation for email field
//TODO: sending data to databse to store
$flag = 0;
$nameError = "";
$usernameError = "";
$emailError = "";
$passwordError = "";
$confirmPasswordError = "";
$signupData = array('name' => "", 'username' => "", 'email' => "", 'password' => "", 'type' => "");

if (isset($_POST["submit"])) {
    if (empty($_POST["name"])) {
        $flag = 1;
        $nameError = "please enter your name";
    } else $signupData['name'] = $_POST["name"];
    if (empty($_POST["username"])) {
        $flag = 1;
        $usernameError = "please enter your username";
    } else $signupData['username'] = $_POST["username"];
    if (empty($_POST["email"])) {
        $flag = 1;
        $emailError = "please enter your email";
    } else $signupData['name'] = $_POST["name"];
    if (empty($_POST["password"])) {
        $flag = 1;
        $passwordError = "please enter your password";
    } else $signupData['name'] = $_POST["name"];
    if (empty($_POST["confirm-password"])) {
        $flag = 1;
        $confirmPasswordError = "please enter your password";
    } else {
        if (hash_equals($_POST["confirm-password"], $_POST["password"]))
            $signupData["password"] = $_POST['password'];

        else {
            $flag = 1;

            $confirmPasswordError = "please enter the same password";
        }
    }

    if ($flag == 0) header('location: login.php');
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
        *{
            /* padding: 0;
            margin: 0; */
          
        }
        body {
            background-color: #EBEBEB;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            height: 100vh;
           display: flex;
           flex-direction: row;
           align-items: center;
           justify-content: center;
           justify-items: center;
           align-content: center;
           gap: 50px;
        }


        .leftSide {

            display: flex;
flex-direction: column;
align-items: center;
justify-content: center;
            color: white;
           
            background: linear-gradient(157.31deg, #414CAB 5.83%, #2E3467 95.62%);
            border-radius: 25px;
            text-align: center;
            width: 500px;
            height: 550px;
            
            
        }

        .leftSide p {
            padding: 20px;
            margin-bottom: 40px;
        }

        .leftSide h2 {
            margin-top: 0px;
        }

        .leftSide img {
            height: 100px;
        }

        .leftSide .signupBtnn {
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

        .leftSide .signupBtnn:hover {
            color: #2E3467;
            background-color: white;
        }



        .rightSide {
            padding: 150px 0px 0px 0px;
            transform: translateY(-75px);
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

        .rightSide input[type="radio"] {
            width: 20px;
        }

        .nm {
            display: flex;
            
            
        }


        .nm input {
            width: 137px;
            margin-right: 10px;
        }





        .rightSide input[type="submit"] {
            transition: 0.2s;
            font-weight: bolder;
            color: white;
            background-color: #414CAB;
            font-size: 18px;
            width: 317px;
        }

        .remember {
            vertical-align: 20px;
            margin-left: 7px;
            color: #414CAB;
            font-weight: bold;
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

            .nm {
                margin-left: 15px;
            }

            .container {
                margin: unset;
                margin-right: 90px;
            }

            .rightSide {
                margin-right: 30px;
            }

            .leftSide {
                display: none;
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
                width: 293px;
                text-decoration: none;
                margin-left: 14px;
                transform: translateY(15px);
            }

            .btnM:hover {
                background-color: #414CAB;
                color: white;
                box-shadow: 0 0 8px 0 #414CAB;

            }




        }
        .error-input-signup{
            font-size: 12px;
        }
    </style>
















</head>

<body>


    <div class="container">



        <div class="leftSide">
            <h2>Welcome to</h2>
            <img src="../assets/logoW.svg" alt="aaaaaaaaa">
            <p>Welcome to our website, your one stop
                destination for books and information about
                books. With our user-friendly interface, you can
                easily read post reviews. Join our community of
                book lovers today and immerse yourself in the
                wonderful world of literature!</p>
            <div>
                <a href="../index.php" class="signupBtnn">Login</a>
            </div>
        </div>


        <div class="rightSide">
            <h2>Sign Up</h2>

            <form action="signup.php" method="POST">

                <div class="nm">
                    <div>
                        <input type="text" id="name" name="name" placeholder="Enter your name">
                        <br>
                        
                        
                            <?php
                             if (!empty($nameError)) echo "<span class='error-input-signup'>$nameError</span>";
                        
                            ?>
                    </div>

                    <div> <input type="text" id="username" name="username" placeholder="Choose a username"><br>
                        <?php
                        if (!empty($usernameError)) echo "<span class='error-input-signup'>$usernameError</span>";

                        ?> </div>

                </div>


                <br>

                <input type="email" id="email" name="email" placeholder="Enter your email"><br>
                <?php
                if (!empty($emailError)) echo "<span class='error-input-signup'>$emailError</span>";

                ?><br>

                <input type="password" id="password" name="password" placeholder="Enter a password"><br>
                <?php
                if (!empty($passwordError)) echo "<span class='error-input-signup'>$passwordError</span>";

                ?><br>

                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password"><br>
                <?php
                if (!empty($confirmPasswordError)) echo "<span class='error-input-signup'>$confirmPasswordError</span>";

                ?><br>

                <input type="radio" id="writer" name="role" value="writer">
                <span class="remember">Writer</span>

                <input type="radio" id="reader" name="role" value="reader" checked>
                <span class="remember">Reader</span><br><br>

                <input type="submit" value="SignUp" name="submit">
                <a href="../index.php" class="btnM">Login</a>

            </form>

        </div>








    </div>




</body>

</html>