<?php
$x=$_REQUEST['t3'];
$y=$_REQUEST['t4'];
$conn=mysqli_connect('localhost','root','password','mydb');
$rows = mysqli_query($conn,"select count(*) from user where username='$x' and password='$y' ");
$row=mysqli_fetch_row($rows);
$count=$row[0];
if($count==0)
{
    echo "
    <body>
    <div>
    <style>
   body{
        background-image: url(1.png);
    }
  div {
    position: fixed;
    top: 40%;
    left: 39%;
    color:black;
  }</style>
  <h1 style='
  width: 1000px;'>Wrong Credentials</h1>
  </div>
  </body>";

}
else
{
  
    echo "<div>
    <style>
  div {
    position: fixed;
    top: 30%;
    left: 30%;
    color:green;
  }</style>
  <h1>Welcome $x you are authenticated</h1>
  </div>";

    header("Location: api.php");
    exit();
}
?>

