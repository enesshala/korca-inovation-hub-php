<?php 
session_start();
include "./admin/dbconfig/dbconfig.php";

include 'inc/head.php';
include 'inc/navbar.php';

$errors = [];
$userEmail = "";
$userPassword = "";

if(isset($_POST['submit_login'])){
   
    $email = $_POST['email'];
    $password = $_POST['password'];


    $query = $conn->prepare("SELECT * FROM users WHERE user_email=?");
    $query->execute([$email]); 
    $user = $query->fetch();



  if (trim($email) === "" || trim($password) === "")
    $errors[] = "Fields must be filled!";
  else {
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $_POST['email'];

    header('location: ./admin/index.php');    
  }    
}

?>

<form method="POST">
    <?php foreach($errors as $error): ?>
        <p><?php echo $error; ?></p>
    <?php endforeach; ?>
    <input type="email" name="email" placeholder="Email..."> <br><br>
    <input type="password" name="password" placeholder="Password..."> <br><br>
    <input type="submit" name="submit_login" value="Login">
</form>
<a href="register.php">Don't have an account yet!</a>




<?php include 'inc/footer.php' ?>