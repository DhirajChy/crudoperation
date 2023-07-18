 <?php 

include "connect.php"; 

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM `form` WHERE `id`='$id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 
header('location: view.php');
?>
