<?php

$dbh = mysqli_connect("localhost","root","","ecommerce");

if(!$dbh)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>