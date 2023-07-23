<?php

$email = "";
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}
$location = basename($_SERVER['PHP_SELF']);

?>

<nav class="navbar navbar-dark bg-dark">
    <div class="rounded-circle px-2 py-2 bg-success ms-3"></div>
    <h5 class="text-white text-center"> <?php echo $email; ?>
    </h5>
    <div>
        <a href="view.php" class="text-<?php echo ($location == 'view.php') ? 'warning' : 'white' ?> me-5 text-uppercase text-decoration-none pe-auto">Dashboard</a>
        <a href="userdetails.php" class="text-<?php echo ($location == 'userdetailstable.php') ? 'warning' : 'white' ?> me-5 text-uppercase text-decoration-none pe-auto">Add Users Details</a>
        <a href="userdetailstable.php" class="text-<?php echo ($location == 'userdetailstable.php') ? 'warning' : 'white' ?> me-5 text-uppercase text-decoration-none pe-auto">Users Information</a>
        <a href="logout.php" class="text-white me-5 text-uppercase text-decoration-none pe-auto">Logout</a>
    </div>



</nav>
