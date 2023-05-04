<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/navbar.css?<?= time() ?>">
</head>

<body>
    <nav class="nav">
        <div>
        <a href="../pages/home.php"> <?php echo " <img src='$logoPath' alt='logo'>" ?> </a>
        </div>
        <div>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="books.php">Books</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="aboutUs.php">About Us</a></li>

            </ul>
        </div>
        <div id='srch-ic'>
            <!-- search svg code -->
           
          
            <div>

        
                <!-- image profile -->
                <div class="circle_profile">
                <a href="../pages/profile.php"> <img src=<?php echo $_SESSION["userdata"]['profile_image'] ?> alt="profile-image"></a>
                </div>

            </div>

    </nav>


    <!--   navbar for small screen   -->


    <div class="topBar">

        <div class="logoM">
            <a href="home.php"><img src="../assets/logoW.svg" alt="logo"></a>
        </div>


        <div class="pfpM">
            <img src="../assets/profile-pic.png" alt="php picture">
        </div>

    </div>


    <div class="mobNav">



        <ul>
            <li>
                <a class="a-nav__con" href="../pages/home.php">

                    <img src="../assets/homeM.svg" alt="">
                    <span>Home</span></a>

            </li>

            <li>
                <a class="a-nav__con" href="../pages/books.php">

                    <img src="../assets/bookM.svg" alt="">
                    <span>Books</span></a>

            </li>

            <li>
                <a class="a-nav__con" href="../pages/profile.php">

                    <img src="../assets/pfpM.svg" alt="">
                    <span>
                        Profile
                    </span></a>

            </li>
        </ul>




    </div>


</body>

</html>
