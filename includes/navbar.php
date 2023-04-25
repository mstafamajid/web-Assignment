<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="../styles/navbar.css">
</head>

<body>
    <nav>
            <div>
                <?php echo " <img src='$logoPath' alt='logo'>" ?>
            </div>
            <div>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="books.php">Books</a></li>
                    <li><a href="profile.php">Profile</a></li>
                </ul>
            </div>
            <div id='srch-ic'>
                <!-- search svg code -->
                <div class="srch" >
                
                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 svg">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
</svg>

                </div>
                <input type="search"  name="search" id="search-field">
                <div>


                <!-- image profile --> 
                <div>

                </div>

            </div>
        
    </nav>


<!--   navbar for small screen   -->


<div class="topBar" >

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
            <a href="../pages/home.php"><img src="../assets/homeM.svg" alt=""></a>
            Home
       </li>
        
        <li>
            <a href="../pages/books.php"><img src="../assets/bookM.svg" alt=""></a>
            Books
        </li>
        
        <li>
            <a href="../pages/profile.php"><img src="../assets/pfpM.svg" alt=""></a>
            Profile
        </li>
     </ul> 
    



    </div>


</body>

</html>