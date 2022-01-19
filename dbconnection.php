<?php

session_start();

$server ="localhost";
$dbName ="online_bookshop";
$dbUser ="root";
$dbPassword = "";



$con = mysqli_connect($server,$dbUser,$dbPassword,$dbName);



if($con)
{
echo "connected";
}
else{
    die('error'. mysqli_connect_error());
}




?>