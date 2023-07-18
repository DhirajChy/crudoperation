<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    
</head>
<body>
    <?php include 'connect.php';
    $username = $email = $password = $valemail = $phoneno = '';
    $usernameErr = $emailErr = $passwordErr = $phonenoErr= '';
    if (isset($_POST['submit'])) {
        // Validate Username
        if (empty($_POST['username'])) {
            $usernameErr = 'Username is required';
        } else {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        // Validate email
        $valemail = $_POST['email'];
        $sql = "SELECT * FROM `form` WHERE email = '" . $valemail . "'";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            echo '<div class="alert alert-danger text-center" role="alert">
            Email Already Exists! Choose another Email!!
            </div>';
        } else {
            if (empty($_POST['email'])) {
                $emailErr = 'Email is required';
            } else {
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            }
            // Validate password
            if (empty($_POST['password'])) {
                $passwordErr = 'password is required';
            } else {
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            }
            $phoneno = $_POST ["phoneno"];  
if (!preg_match ("/^[0-9]*$/", $phoneno) ){  
    $phonenoErr = "Only numeric value is allowed.";  
    echo $phonenoErr;  
} else {  
    echo $phoneno;  
}  
    
            if (empty($usernameErr) && empty($emailErr) && empty($passwordErr) && empty($phoneErr)) {
                $sql = "INSERT INTO form (username, email, password,phoneno) VALUES ('$username', '$email', '$password','$phoneno' )";
                if (mysqli_query($conn, $sql)) {
                    header('location: index.php');
                } else {
                    echo "Error:";
                }
                mysqli_close($conn);
            } else {
                echo '<div class="alert alert-danger text-center" role="alert">
                Email or Password cannot be empty!
                </div>';
            }
        }
    }
    ?>
    <center>
    <h2>Create an account</h2>
    <form class="form-container" method="POST">
        <div class="form-group">
            <label for="username"><b>Username</b></label>
            <br>
            <input type="username" class="form-control <?php echo $usernameErr ? 'is-invalid' : null; ?>" id="username" name="username" placeholder="username">
            <div class="invalid-feedback">
                <?php echo $usernameErr; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <br>
            <input type="email" class="form-control <?php echo $emailErr ? 'is-invalid' : null; ?>" name="email" id="email" placeholder="example@gmail.com">
            <small id="emailHelp" class="form-text text-muted"></small>
            <div class="invalid-feedback">
                <?php echo $emailErr; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <br>
            <input type="password" class="form-control <?php echo $passwordErr ? 'is-invalid' : null; ?>" name="password" id="password" placeholder="Password">
            <div class="invalid-feedback">
                <?php echo $passwordErr; ?>
            </div>
</div>
            <div class="form-group">
            <label for="phoneno">phoneno</label>
            <br>
            <input type="phoneno" class="form-control <?php echo $phonenoErr ? 'is-invalid' : null; ?>" name="phoneno" id="phoneno" placeholder="Phoneno" required>
            <div class="invalid-feedback">
                <?php echo $phonenoErr; ?>
            </div>
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
        <br>
        Already have an account? <a href="index.php">Click here</a>
    </form>
</center>
</body>
</html>