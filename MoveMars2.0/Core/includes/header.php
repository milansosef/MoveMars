<?php
/**
 * Created by PhpStorm.
 * User: Milan
 * Date: 12-10-2016
 * Time: 15:01
 * Edit: Haris, 26-10-2016 12:
 */
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mars Move</title>
    <link rel="stylesheet" type="text/css" href="MoveMars.css">
</head>
<body>
<ul class="navigatiebalk">
      <li class="titel"><h1>Mars Move</h1></li>
      <li class="left"><a href="index.php">Home</a></li>
      <li class="left"><a href="store.php">Store</a></li>
      <li class="left"><a href="partners.php">Partners</a></li>
      <li class="left"><a href="contact.php">Contact</a></li>
      <li class="middle"></li>
       ';
session_start();
if(isset($_SESSION['username'])){

    echo '<li class ="right"><a href="myaccount.php">'.$_SESSION['username'].'</a></li>
                   <li class ="right"><a href="logout.php">Logout</a></li>';

}else{
    echo '<li class="right"><a href="login.php">Login</a></li>';
}
echo '<li class="right"><a href="register.php">Register</a></li>
              </ul class="navigatiebalk">';
?>

