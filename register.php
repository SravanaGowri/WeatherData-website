<?php
$x=$_REQUEST['t1'];
$y=$_REQUEST['t2'];
$conn=mysqli_connect('localhost','root','password','mydb');
mysqli_query($conn,"insert into user (username,password) values ('$x','$y')");

echo "<html>
<body>
<style>
    body{
        background-image: url(1.png);
    }
  div {
    position: fixed;
    top: 30%;
    left: 35%;
  }
  button {
    position: fixed;
    top: 50%;
    left: 45%; 
    border: none;
    padding: 12px 12px;
    width: 100;
    border: none;
    font-size: 16px;
    cursor: pointer;
    text-align: center;
    color:black;

    }</style>
  <div>
<h1 align='center'>User Registered with Username:$x</h1>
 <a href=sqlsignin.html>
 <h1><button>SIGNIN</button></h1>
</a> 
</div>"
?>
