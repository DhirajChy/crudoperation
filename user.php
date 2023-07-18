<!DOCTYPE html>
<html>
    <head>
        <title>Add User</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
</head>
<body>
<?php 

include "connection.php";

  if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];

    $lastname = $_POST['lastname'];

    $age = $_POST['age'];

    $address = $_POST['address'];

    $qualification = $_POST['qualification'];

    $bloodgroup = $_POST['bloodgroup'];

    $gender = $_POST['gender'];

    $sql = "INSERT INTO `test2`(`firstname`, `lastname`, `age`, `address`, `qualification`,`bloodgroup`,`gender`) VALUES ('$firstname','$lastname','$age','$address', '$qualification', '$bloodgroup','$gender')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo '<script>alert(""New record created successfully.")</script>';
      header('location: view.php');

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }

?>
<center>
     
     <h2>Add Users Details</h2>
 <form class="form-container"  method="POST">

 <div class="form-group">
   <label for="firstname">First Name</label>
     <br>
     <input type="firstname"  name="firstname" id="firstname" required>
    
</div>
<br>
<div class="form-group">
   <label for="lastname">Last Name</label>
     <br>
     <input type="lastname"  name="lastname"  required>
    
</div>
<br>
<div class="form-group">
     <label for="age">Age</label>
     <br>
     <input type="age"  name="age"   required>
     
</div>
<br>
<div class="form-group">
     <label for="address">Address</label>
     <br>
     <input type="address"  name="address"  required>
     
</div>
<br>

<div class="form-group">
<label>Select Qualification</label>
<br>
<select classs="form-control" name="qualification" required>
 <option>select</option>
    <option value="Slc Running">Slc Running</option>
    <option value="Slc completed">Slc Completed</option>
    <option value="+2 Running">+2 Running</option>
    <option value="Slc Completed">+2 Completed</option>
    <option value="Bachelors Running">Bachelors Running</option>
    <option value="Bachelors Completed">Bachelors Completed</option>
  </select>
  <br><br>
  <div class="form-group">
<label>Blood Group</label>
     <select classs="form-control" name="bloodgroup" required>
        <option>select</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
  </select>
  <br>
  <br>
  Gender<br>

<input type="radio" name="gender" value="Male">Male

<input type="radio" name="gender" value="Female">Female
<input type="radio" name="gender" value="Female">Others


<br><br>
             <button type="submit" class="btn btn-primary" name="submit">Save</button>
             <br>
</form>
</center>
</body>
<html>