<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sign Up</title>
    
</head>

<body>
    <?php include 'connection.php';
   include 'sessionstart.php';
   // include 'navbar.php';
    //include 'search.php';


    $firstName = $lastName = $gender =$age= $bloodgrp = $qualification = $address = '';
    $firstNameErr = $lastNameErr = $genderErr =$ageErr= $bloodgrpErr = $qualificationErr = $addressErr = '';




    if (isset($_POST['submit'])) {


        // Validate firstName
        if (empty($_POST['firstName'])) {
            $firstNameErr = 'firstName is required';
        } else {
            $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        // Validate lastName
        if (empty($_POST['lastName'])) {
            $lastNameErr = 'lastName is required';
        } else {
            $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        // Validate email
        // if (empty($_POST['email'])) {
        //     $emailErr = 'Email is required';
        // } else {
        //     $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        // }

        // Validate gender
        if (empty($_POST['gender'])) {
            $genderErr = 'gender is required';
        } else {
            $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (empty($_POST['age'])) {
            $ageErr = 'age is required';
        } else {
            $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        // Validate bloodgrp
        if (empty($_POST['bloodgrp'])) {
            $bloodgrpErr = 'bloodgrp is required';
        } else {
            $bloodgrp = filter_input(INPUT_POST, 'bloodgrp', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        // Validate qualification
        if (empty($_POST['qualification'])) {
            $qualificationErr = 'qualification is required';
        } else {
            $qualification = filter_input(INPUT_POST, 'qualification', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        // Validate address
        if (empty($_POST['address'])) {
            $addressErr = 'address is required';
        } else {
            $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if (empty($firstNameErr) && empty($lastNameErr) && empty($genderErr) && empty($ageErr) && empty($bloodgrpErr) && empty($qualificationErr) && empty($addressErr)) {
            $sql = "INSERT INTO test2 (firstName, lastName, gender, age, bloodgrp, qualification, address)  VALUES ('$firstName', '$lastName','$gender','$age', '$bloodgrp', '$qualification', '$address')";

            if (mysqli_query($conn, $sql)) {
               header("location: view.php");
            } else {
                echo "Error: cannot insert";
            }
            mysqli_close($conn);
        } else {
            echo '<div class="alert alert-danger text-center" role="alert">
                Some fields are empty!
                </div>';
        }
    }


    ?>

    <center>
    <div class="container">
        

          <h2>User's Detail Form </h2>
            <form id="form-all" class="form-container" method="POST">
                <div class="form-group">
                    <label for="firstName"><b>First Name</b></label><br>

                    <input type="firstName"  <?php echo $firstNameErr ? 'is-invalid' : null; ?> id="firstName" name="firstName" >
                        <?php echo $firstNameErr; ?>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="lastName"><b>Last Name</b></label>
                    <br>
                    <input type="lastName"  <?php echo $lastNameErr ? 'is-invalid' : null; ?> id="lastName" name="lastName" >
                    <div class="invalid-feedback">
                        <?php echo $lastNameErr; ?>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="gender"><b>Gender</b></label>
                    <input type="radio" name="gender" value="female" class="ms-1"  > Female
                    <input type="radio" name="gender" value="male" class="ms-5" > Male
                    <div class="invalid-feedback">
                        <?php echo $genderErr; ?>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="age"><b>Age</b></label>
                    <input type="age" <?php echo $ageErr ? 'is-invalid' : null; ?> id="age" name="age">
                    <div class="invalid-feedback">
                        <?php echo $ageErr; ?>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="bloodgrp"><b>Blood Group</b></label>
                    <select id="bloodgrp" name="bloodgrp" class="ms-1">
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                    <div class="invalid-feedback">
                        <?php echo $bloodgrpErr; ?>
                    </div>
                    <br>
                    <br
                    <div class="form-group">
                        <label for="qualification"><b>Qualification</b></label>
                        <select id="qualification" name="qualification" class="ms-1">
                            <option value=">below SEE">below SEE</option>
                            <option value="SEE passed">SEE passed</option>
                            <option value="+2 running">+2 running</option>
                            <option value="+2 completed">+2 completed</option>
                            <option value="Bachelors running">Bachelors running</option>
                            <option value="Bachelors completed">Bachelors completed</option>
                            <option value="Masters running">Masters running</option>
                            <option value="Masters completed">Masters completed</option>
                        </select>
                        <div class="invalid-feedback">
                            <?php echo $qualificationErr; ?>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="address"><b>Address</b></label>
                        <br>
                        <input type="address" <?php echo $addressErr ? 'is-invalid' : null; ?> name="address" id="address">
                        <div class="invalid-feedback">
                            <?php echo $addressErr; ?>
                        </div>
                    </div>
<br>
                    <button type="submit" name="submit" class="btn btn-success">Save</button>
            </form>
        </div>


  </center>
</body>

</html>
