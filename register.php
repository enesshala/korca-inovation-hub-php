<?php 
require_once 'admin/dbconfig/dbconfig.php';
include 'inc/head.php';
include 'inc/navbar.php';

if(isset($_POST['submit_register'])){
    $username = $_POST['username'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $image = $_FILES['image'] ?? null;

    

    if (!file_exists('img/profile/' . $_POST['username'])) {
        mkdir('img/profile/' . $_POST['username']);
    }

    $imagePath = '';
    if ($image && file_exists($_FILES['image']['tmp_name'])) {
        $imagePath = 'img/profile/' . $_POST["username"] . "/" . randomString(8) . strrchr($image['name'], ".");
        if (!is_dir(dirname($imagePath)))
            mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'], $imagePath);
    }

    $sql = "INSERT INTO users (username, user_name, user_surname, user_email, user_pic, password) VALUES (:username, :name, :surname, :email, :pic, :password)";
    $query = $conn->prepare($sql);
    $query -> bindParam("username", $username);
    $query -> bindParam("name", $name);
    $query -> bindParam("surname", $surname);
    $query -> bindParam("email", $email);
    $query -> bindParam("pic", $pic);
    $query -> bindParam(":password", password_hash($password, PASSWORD_DEFAULT));
    $query ->execute();

    header('location: login.php');
}

?>

<form method="POST">
    <input type="text" name="username" placeholder="Username..."> <br><br>
    <input type="text" name="name" placeholder="Name..."> <br><br>
    <input type="text" name="surname" placeholder="Surname..."> <br><br>
    <input type="file"
       name="image"> <br><br>
    <input type="email" name="email" placeholder="Email..."> <br><br>
    <input type="password" name="password" placeholder="Password..."> <br><br>
    <input type="submit" name="submit_register" value="Register">
</form>
<a href="login.php">You already have an account!</a>




<?php include 'inc/footer.php' ?>