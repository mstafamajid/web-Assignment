<?php 
session_start();
if(isset($_SESSION["userdata"])){
    echo "welcome".$_SESSION['userdata']['name'];
}
