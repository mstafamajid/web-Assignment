<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        nav{
            background-color: red;
            display: flex;
            flex-direction: row;
        }
nav div ul{
    margin-left: 300px;
    gap: 70px;
    display: flex;
    flex-direction: row;
}
nav div ul li a{
    text-decoration: none;
}
li{
    list-style: none;
}
#srch-ic{

margin-left: 400px;
    padding: 10px;
display: flex;
flex-direction: row;
gap: 30px;
}
#srch-ic div{
   
    height: 40px;
    width: 40px;
    border-radius: 50%;
    background-color: grey;
}
    </style>
</head>

<body>
    <nav>
        
            <div>

                <?php echo " <img src='$logoPath' alt='logo'>" ?>
            </div>
            <div>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="">Books</a></li>
                    <li><a href="profile.php">Profile</a></li>
                </ul>
            </div>
            <div id='srch-ic'>
                <input type="search" name="search" id="search-field">
                <div>

                </div>
            </div>
        
    </nav>
</body>

</html>