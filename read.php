

<!DOCTYPE html>

<html>

<head>
    <style>
        
.topnav {
  background-color: #333;
  overflow: hidden;
}
.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
</style>

    <title>Read Page</title>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    
</head>

<body>

<?php 
include 'connection.php';
include 'searchdetails.php';
if(empty($_SESSION['email'])){
    header('location:index.php');
}
$sql = "SELECT * FROM test2";

$result = $conn->query($sql);

if(isset($_POST['search'])){
    if($_POST['age']){
        $_SESSION['searchbyagevalue']=$_POST['age'];
    }
if($_POST['gender']){
   $_SESSION['searchbygendervalue']=$_POST['gender'];
}

   if($_POST['bloodgroup']){
    $_SESSION['searchbybloodgroupvalue']=$_POST['bloodgroup'];
   }
   else{
    echo 'Please choose any field';
   }
} 
?>

    <div class="container">
        <div class="topnav">
        <a href="logout.php">Logout</a>
        <a href="view.php">Go back to add user's page</a>
        <a href="#dashboard">Dashboard</a>
    </div>
<br>
<br>
    <form method='POST'>
    <label>Age</label>
<select id="age" name="age">
    <option value="all">All</option>
    <option value="age Between 0 AND 20">0-20 </option>
    <option value="age Between 21 AND 30">21-30</option>
    <option value="age Between 31 AND 40">31-40</option>
    <option value="age > 40">above 40</option>
  </select>
  <label>Gender</label>
<select id="gender"  name="gender">
    <option value="all">All</option>
    <option value="gender = 'male'">Male </option>
    <option value="gender = 'female'">Female</option>
  </select>
  <label>Blood Group</label>
<select id="bloodgroup"  name="bloodgroup">
    <option value="all">All</option>
    <option value="bloodgroup = 'O+'">O+ </option>
    <option value="bloodgroup = 'O-'">O-</option>
    <option value="bloodgroup = 'A+'" >A+</option>
    <option value="bloodgroup = 'A-'">A-</option>
    <option value="bloodgroup ='B+'">B+</option>
    <option value="bloodgroup = 'B-'">B-</option>
    <option value="bloodgroup = 'AB+'">AB+</option>
    <option value="bloodgroup = 'AB-'">AB-</option>
  </select>
        <button type="submit" class="btn btn-dark" name="search">Search</button>
</form>
<br>
<br>
<br>
<div class="container">
<table class="table">


    <thead>

        <tr>

        <th>ID</th>

        <th>First Name</th>

        <th>Last Name</th>

        <th>Age</th>

        <th>Address</th>

        <th>Qualification</th>

        <th>Blood Group</th>
     
        <th>Gender</th>

    </tr>

    </thead>

    <tbody> 
        
        <?php

if (!empty($result) && $result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['firstname']; ?></td>

                    <td><?php echo $row['lastname']; ?></td>

                    <td><?php echo $row['age']; ?></td>

                    <td><?php echo $row['address']; ?></td>

                    <td><?php echo $row['qualification']; ?></td>

                    <td><?php echo $row['bloodgroup']; ?></td>

                    <td><?php echo $row['gender']; ?></td>


                

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>
