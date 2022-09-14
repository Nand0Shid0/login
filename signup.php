<?php
$message = '';
$conn = mysqli_connect("localhost", "root", "2pacshaq", "users");

if($conn === false){
  die("ERROR: Could not connect. "
      . mysqli_connect_error($conn));
}

if (!empty($_POST['email']) && !empty($_POST['gender'])){

  $email = $_POST['email'];
  $user = $_POST['username'];
  $pass = md5($_POST['password']);
  $full_name = $_POST['name'];
  $phonenum = $_POST['phone'];
  $gender = $_REQUEST['gender'];
  $privileges = $_REQUEST['privilege'];
  $date_birth = $_REQUEST['birthday'];  
  
  date_default_timezone_set('America/Mexico_City');
  $dateexact = date("'Y-m-d G:i:s'");
      
  $sql = "INSERT INTO users2 (email, username, password, privileges, name, phone, gender, birthday, created) VALUES ('$email', '$user', '$pass', '$privileges', '$full_name','$phonenum', '$gender', '$date_birth', $dateexact)";
  
  if(mysqli_query($conn, $sql)){
        $message = 'Successfully created new user';
        
  } else {
        $message = 'Sorry there was an issue creating your account. Try it Again!';
  
  }
  mysqli_close($conn);
   }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" href="./descarga.png">
    <title>SignUp</title>
</head>
<body>

<?php if(!empty($message)): ?>
  <p> <?= $message ?></p>
<?php endif; ?>


<div class="main">
<h1>SignUp</h1>
  <div class="logn-page">
    <span>or <a href="login.php">Login</a></span>
  </div>


  <form action="signup.php" method="POST">
    <input class="email" name="email" type="email" placeholder="Enter your email">
    <input name="password" type="password" placeholder="Enter your Password">
    <input name="username" type="text" placeholder="Username">
    <input name="name" type="text" placeholder="Name">
    <input name="phone" type="number" placeholder="Phone">
    <input name="birthday" type="date" placeholder="Birth Day">
    <select class="" name="privilege" id="">
        <option value="A">Admin</option>
        <option value="M">Mortal</option>
    </select>
    
    <select class="" name="gender" id="">
        <option value="M">Men</option>
        <option value="W">Women</option>
    </select>
    
    
    <input type="submit" value="SignUp">
  </form>
  <a href="./index.php">Return</a>
</div>

</body>
</html>