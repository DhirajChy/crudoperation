<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Updates</title>
    
</head>
<body>
    <?php 
    include 'sessionstart.php';
    include 'connection.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM `test2` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $resultData = mysqli_fetch_assoc($result);
    $firstName = $resultData['firstName'];
    $lastName = $resultData['lastName'];
    $gender= $resultData['gender'];
    $age = $resultData['age'];
    $bloodgrp = $resultData['bloodgrp'];
    $qualification = $resultData['qualification'];
    $address = $resultData['address'];
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
        if (empty($_POST['age'])) {
            $ageErr = 'age is required';
        } else {
            $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        // Validate gender
        if (empty($_POST['gender'])) {
            $genderErr = 'gender is required';
        } else {
            $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_SPECIAL_CHARS);
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
            $sql = "UPDATE test2 SET firstName='$firstName', lastName = '$lastName',  gender='$gender', age='$age', bloodgrp='$bloodgrp', qualification='$qualification', address='$address' WHERE id='$id'";

            if (mysqli_query($conn, $sql)) {
               header("Location: userdetailstable.php");
            } else {
                echo "Error:";
            }
            mysqli_close($conn);
        
        }
    }


    ?>
    <center>
    <div class="container">
        

          <h2>User's Update Form </h2>
            <form id="form-all" class="form-container" method="POST">
                <div class="form-group">
                    <label for="firstName"><b>First Name</b></label><br>
                    
                    <input type="firstName"  <?php echo $firstNameErr ? 'is-invalid' : null; ?> id="firstName" name="firstName" value="<?php echo $firstName; ?>"selected>
                        <?php echo $firstNameErr; ?>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="lastName"><b>Last Name</b></label>
                    <br>
                    <input type="lastName"  <?php echo $lastNameErr ? 'is-invalid' : null; ?> id="lastName" name="lastName" value="<?php echo $lastName; ?>"selected>
                    <div class="invalid-feedback">
                        <?php echo $lastNameErr; ?>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="gender"><b>Gender</b></label>
                    
                    <input type="radio" name="gender"
              <?php if (isset($gender) && $gender=="female") echo "checked";?>
               value="female">Female
                     <input type="radio" name="gender"
                  <?php if (isset($gender) && $gender=="male") echo "checked";?>
                   value="male">Male
                    <div class="invalid-feedback">
                        <?php echo $genderErr; ?>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="age"><b>Age</b></label>
                    <input type="age" <?php echo $ageErr ? 'is-invalid' : null; ?> id="age" name="age" value="<?php echo $age; ?>" selected>
                    <div class="invalid-feedback">
                        <?php echo $ageErr; ?>
                    </div>
                </div>
                <br>
                <div class="form-group">
                <label for="bloodgrp"><b>Blood Group</b></label>
<select id="bloodgrp" name="bloodgrp" class="<?php echo $bloodgrpErr ? 'is-invalid' : ''; ?>">
    <option value="A+" <?php echo ($bloodgrp === 'A+') ? 'selected' : ''; ?>>A+</option>
    <option value="B+" <?php echo ($bloodgrp === 'B+') ? 'selected' : ''; ?>>B+</option>
    <option value="B-" <?php echo ($bloodgrp === 'B-') ? 'selected' : ''; ?>>B-</option>
    <option value="O+" <?php echo ($bloodgrp === 'O+') ? 'selected' : ''; ?>>O+</option>
    <option value="O-" <?php echo ($bloodgrp === 'O-') ? 'selected' : ''; ?>>O-</option>
    <option value="AB+" <?php echo ($bloodgrp === 'AB+') ? 'selected' : ''; ?>>AB+</option>
    <option value="AB-" <?php echo ($bloodgrp === 'AB-') ? 'selected' : ''; ?>>AB-</option>
</select>

<div class="invalid-feedback">
    <?php echo $bloodgrpErr; ?>
</div>
            </div>
                    <br>
                    
                    <div class="form-group">
                      <label for="qualification"><b>Qualification</b></label>
                      <br>
<select id="qualification" name="qualification" class="<?php echo $qualificationErr ? 'is-invalid' : null; ?>">
    <option value="all" <?php echo ($qualification === 'all') ? 'selected' : ''; ?>>ALL</option>
    <option value=">below SEE" <?php echo ($qualification === '>below SEE') ? 'selected' : ''; ?>>below SEE</option>
    <option value="SEE passed" <?php echo ($qualification === 'SEE passed') ? 'selected' : ''; ?>>SEE passed</option>
    <option value="+2 running" <?php echo ($qualification === '+2 running') ? 'selected' : ''; ?>>+2 running</option>
    <option value="+2 completed" <?php echo ($qualification === '+2 completed') ? 'selected' : ''; ?>>+2 completed</option>
    <option value="Bachelors running" <?php echo ($qualification === 'Bachelors running') ? 'selected' : ''; ?>>Bachelors running</option>
    <option value="Bachelors completed" <?php echo ($qualification === 'Bachelors completed') ? 'selected' : ''; ?>>Bachelors completed</option>
    <option value="Masters running" <?php echo ($qualification === 'Masters running') ? 'selected' : ''; ?>>Masters running</option>
    <option value="Masters completed" <?php echo ($qualification === 'Masters completed') ? 'selected' : ''; ?>>Masters completed</option>
</select>
<div class="invalid-feedback">
    <?php echo $qualificationErr; ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="address"><b>Address</b></label>
                        <br>
                        <input type="address" <?php echo $addressErr ? 'is-invalid' : null; ?> name="address" id="address"value="<?php echo $address; ?>" required>
                        
                        <div class="invalid-feedback">
                            <?php echo $addressErr; ?>
                        </div>
                    </div>
<br>
                    <button type="submit" name="submit" class="btn btn-success">Update</button>
            </form>
        </div>


  </center>
</body>

</html>
