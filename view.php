<?php 

include "sessionstart.php";
include "connect.php";
include "navbar.php";
if (!isset($_SESSION['email'])){
    header('location:index.php');
} 
$sql = "SELECT * FROM form";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    
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

    <title>View Page</title>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    
</head>

<body>

<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>User Name</th>

        <th>Email Address</th>

        <th>Password</th>

        <th>Phoneno</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 
        
        <?php
 
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['username']; ?></td>

                    <td><?php echo $row['email']; ?></td>

                    <td><?php echo $row['password']; ?></td>

                    <td><?php echo $row['phoneno']; ?></td>

                    <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>

