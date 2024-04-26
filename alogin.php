<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){

    $username = $_POST["username"];
    $password = $_POST["pass"];
    $cpassword = $_POST["cpass"];
    if($password == $cpassword){
        //checking user exists or not
        $query = "SELECT * FROM admin  WHERE username='$username'&& password='$password'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
          $_SESSION['admin']=$username;
           
            
            header('Location: admin.php');
            exit();
            
        }
        else{
          echo "<script>alert('Password doesnot match')</script>";

        } 
        
    }else{
        echo "<script>alert('Password doesnot match')</script>";
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f0f0f0;
    }
    .login-container {
      max-width: 500px;
      margin: 100px auto;
      padding: 30px;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
    }
    .login-container h2 {
      text-align: center;
      color: #6c5ce7;
      margin-bottom: 30px;
    }
    .login-container .form-group {
      margin-bottom: 20px;
    }
    .login-container label {
      color: #6c5ce7;
      font-weight: bold;
    }
    .login-container .form-control {
      border: 2px solid #d1d1d1;
      border-radius: 5px;
    }
    .login-container .form-control:focus {
      border-color: #6c5ce7;
      box-shadow: none;
    }
    .login-container .btn-primary {
      background-color: #ff7675;
      border-color: #ff7675;
    }
    .login-container .btn-primary:hover {
      background-color: #d63031;
      border-color: #d63031;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="login-container">
    <h2><i class="fas fa-user"></i> Admin Login</h2>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="pass" class="form-control" id="password" placeholder="Enter your password">
      </div>
      <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <input type="password" name="cpass" class="form-control" id="confirmPassword" placeholder="Confirm your password">
      </div>
      <button type="submit" name="login" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</button>
    </form>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
