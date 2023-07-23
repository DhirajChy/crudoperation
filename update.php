<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update</title>
    
</head>
<body>
    <?php include 'connect.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM form WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $resultData = mysqli_fetch_assoc($result);
    $username = $resultData['username'];
    $email = $resultData['email'];
    $password = $resultData['password'];
    $phoneno = $resultData['phoneno'];
    $usernameErr = $emailErr = $passwordErr = $phonenoErr='';
    session_start();
    if (isset($_POST['update'])) {
        // Validate Username
        if (empty($_POST['username'])) {
            $usernameErr = 'Username is required';
        } else {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        // Validate email
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
       
        if (empty($usernameErr) && empty($emailErr) && empty($passwordErr)  && empty($phoneErr)){
            $sql = "UPDATE form SET username = '$username', email = '$email', password = '$password', phoneno='$phoneno' WHERE id = '$id'";
            if (mysqli_query($conn, $sql)) { 
                header('location: view.php');
            } else {
                echo "Error:";
            }
            mysqli_close($conn);
        }
    }
    ?>
    <center>
    <form class="form-container" method="POST">
        <div class="form-group">
            <label for="username"><b>Username</b></label>
            <br>
            <input type="username"  <?php echo $usernameErr ? 'is-invalid' : null; ?>" id="username" name="username" placeholder="username" value="<?php echo $username; ?>">
            <div class="invalid-feedback">
                <?php echo $usernameErr; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="email"><b>Email Address</b></label>
            <br>
            <input type="email"  <?php echo $emailErr ? 'is-invalid' : null; ?> name="email" id="email" placeholder="example@gmail.com" value="<?php echo $email; ?>">
            <small id="emailHelp" class="form-text text-muted"></small>
            <div class="invalid-feedback">
                <?php echo $emailErr; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="password"></b>Password</b></label>
            <br>
            <input type="password"  <?php echo $passwordErr ? 'is-invalid' : null; ?> name="password" id="password" placeholder="Password" value="<?php echo $password; ?>">
            <div class="invalid-feedback">
                <?php echo $passwordErr; ?>
            </div>
            <div class="form-group">
            <label for="phoneno"><b>phoneno</b></label>
            <br>
            <input type="phoneno"  <?php echo $phonenoErr ? 'is-invalid' : null; ?> name="phoneno" id="phoneno" placeholder="Phoneno" value="<?php echo $phoneno; ?>">
            <div class="invalid-feedback">
                <?php echo $phonenoErr; ?>
            </div>
</div>
<br>

        <button type="submit" name="update" class="btn btn-warning update">Update</button>
        <a href="view.php">
    </form>
</center>
</body>
</html>