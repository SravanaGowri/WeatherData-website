<?php
$conn=mysqli_connect('localhost','root','password','mydb');
mysqli_query($conn,"create table user(username varchar(50),password varchar(50))");
echo("table created");
?>