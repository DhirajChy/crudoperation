<?php 

include "connection.php"; 

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM `test2` WHERE `id`='$id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 
header('location: userdetailstable.php');
?>
