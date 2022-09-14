<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "2pacshaq";
$dbname = "users";
$message = '';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn){

    die("No hay conexión: ".mysqli_connect_error($conn));
}
$email = $_COOKIE['emailcok'];
$passw = md5($_COOKIE['passcok']);
date_default_timezone_set('America/Mexico_City');
$dateexact = date("'Y-m-d G:i:s'");

$sql = ("UPDATE users2 SET online = '0', last_login = $dateexact WHERE email = '$email' and password = '$passw'");

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header("Location: index.php");
mysqli_close($conn);
?>