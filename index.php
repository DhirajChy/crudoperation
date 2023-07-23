<!DOCTYPE html>
<html>
    <head>
    <style>
    </style>
  
        <title>Login page</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
    <?php
    include 'connect.php';
    session_start();
    if (isset($_POST['submit'])) {
        
        $email = $_POST['email'];
       // Created Session
        $_SESSION['email'] = $email;
        $password = $_POST['password'];
        // $_SESSION['password'] = $password;
        $sql = "SELECT * FROM `form` WHERE email = '" . $email . "' AND password = '" . $password . "'";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
           
            header('location: view.php');
        } else {
            echo 'error';
        }
    }
    ?>

    <center>
     <div class="container mt-5">
            
            <h2><b>Welcome to Login</b></h2>
        <form class="form-container"  method="POST">
       
        <div class="mb-3">
          <label for="email"><b>Email address</b></label>
            <br>
            <input type="email"  name="email" id="email" placeholder="example@gmail.com" required>
            <small id="emailHelp" class="form-text text-muted"></small>
            
</div>

       <div class="mb-3">
            <label for="password"><b>Password</b></label>
            <br>
            <input type="password"  name="password" id="password" placeholder="Password" required>
            
</div>

               <b> Forgot Password?</b> <a href="forget_pass.php">Click Here</a><br>  
                
            
                    <button type="submit" class="btn btn-success" name="submit">Sign In</button>
                    <br>
        
                    <b>Don't have any account?</b><a href="register.php">Clicke Here</a>
    
</form>
</div>
</center>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<html>