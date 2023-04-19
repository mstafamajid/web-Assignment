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
</head>

<body>
    <form action="signup.php" method="POST">
        <input type="text" id="name" name="name" placeholder="Enter your name\"><br>

        <?php
        if (!empty($nameError)) echo "<span class='error-input-signup'>$nameError</span>";

        ?>
        <br>
        <input type="text" id="username" name="username" placeholder="Choose a username"><br>
        <?php
        if (!empty($usernameError)) echo "<span class='error-input-signup'>$usernameError</span>";

        ?><br>

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
        <span>Writer</span>

        <input type="radio" id="reader" name="role" value="reader" checked>
        <span>Reader</span><br><br>

        <input type="submit" value="Create Account" name="submit">
    </form>

</body>

</html>