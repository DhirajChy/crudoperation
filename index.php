<!DOCTYPE html>
<html>
    <head>
        <title>Login page</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
</head>
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
     
            <h2>Sign In</h2>
            <p><b>Welcome to Login</b></p>
        <form class="form-container"  method="POST">
       
        <div class="form-group">
          <label for="email">Email address</label>
            <br>
            <input type="email"  name="email" id="email" placeholder="example@gmail.com" required>
            <small id="emailHelp" class="form-text text-muted"></small>
            
</div>
<br>
     <div class="form-group">
            <label for="password">Password</label>
            <br>
            <input type="password"  name="password" id="password" placeholder="Password" required>
            
</div>
<br>
                Forgot Password? <a href="forget_pass.php">Click Here</a><br>
                <br>
            
                    <button type="submit" class="btn btn-primary" name="submit">Sign In</button>
                    <br>
        <br>
                    Don't have any account?<a href="register.php">Clicke Here</a>
</form>
</center>
</body>
<html>