<?php


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "2pacshaq";
$dbname = "users";
$message = '';
date_default_timezone_set('America/Mexico_City');
  $dateexact = date("'Y-m-d G:i:s'");

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn){

    die("NO Conection: ".mysqli_connect_error($conn));
}
 if (!empty($_POST['email']) && !empty($_POST['password'])) {
$email = $_POST["email"];
$password = md5($_POST["password"]);
$query = mysqli_query($conn,"SELECT * FROM users2 WHERE email = '$email' and password = '$password' and deleted = '0'");
$sql = ("UPDATE users2 SET online = '1', last_login = $dateexact WHERE email = '$email' and password = '$password'");
$nr = mysqli_num_rows($query);

if($nr == 1 && mysqli_query($conn, $sql)) {
    header("Location: ./welcome.html");
} else {
    $message = 'Sorry. Try again!';
}
if (isset($_POST['postt'])) {
    $emailcok = htmlentities($_POST['email']);
    setcookie('emailcok', $emailcok, time()+18000);

    $passcok = htmlentities($_POST['password']);
    md5(setcookie('passcok', $passcok, time()+18000));

}
}

 
      
?>




<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="./assets/css/style.css">
   <link rel="shortcut icon" href="./descarga.png">
    <title>Login</title>
</head>
<body>

<?php require './partials/header.php' ?>

<div class="main">
<h1>Login</h1>

<span>or <a href="signup.php">SignUp</a></span>

<?php if(!empty($message)): ?>
  <p> <?= $message ?></p>
<?php endif; ?>
<form action="login.php" method="post">

<form action="login.php" method="POST">
  <input name="email" type="text" placeholder="Enter your email">
  <input name="password" type="password" placeholder="Enter your Password">
  <input type="submit" value="Submit" name="postt">
</form>

</form>

<a href="./index.php">Return</a>

</div>


</body>
</html>