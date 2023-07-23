<?php 
     include 'sessionstart.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    
</head>

<body>

    <?php 
    if (!isset($_SESSION['email'])){
        header('location:index.php');
    } 
     include 'connection.php';
     include 'navbar.php';
     include 'search.php';
     
        $searchbyagevalue = $_SESSION['searchbyagevalue'];
        $searchbygendervalue = $_SESSION['searchbygendervalue'];
        $searchbybloodgrpvalue = $_SESSION['searchbybloodgrpvalue'];

        if(!isset($detail)){
            $sql = "SELECT * FROM test2";
                $result = mysqli_query($conn, $sql);
                $detail = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

    if ($searchbyagevalue && $searchbygendervalue && $searchbybloodgrpvalue) {

        
        switch ([$searchbyagevalue, $searchbygendervalue, $searchbybloodgrpvalue]) {
            case ['', '', '']:
                echo 'no input: default search';
                $sql = "SELECT * FROM test2";
                $result = mysqli_query($conn, $sql);
                $detail = mysqli_fetch_all($result, MYSQLI_ASSOC);
                break;

            case ['all', 'all', 'all']:
                echo 'no input: default search';
                $sql = "SELECT * FROM test2";
                $result = mysqli_query($conn, $sql);
                $detail = mysqli_fetch_all($result, MYSQLI_ASSOC);
                break;

            case [$searchbyagevalue, 'all', 'all']:
                echo 'input: ' . $searchbyagevalue;
                $sql = "SELECT * FROM test2 WHERE $searchbyagevalue";
                $result = mysqli_query($conn, $sql);
                $detail = mysqli_fetch_all($result, MYSQLI_ASSOC);
                break;

            case [$searchbyagevalue != 'all', $searchbygendervalue, 'all']:
                echo 'input1: ' . $searchbyagevalue . ' & input2: ' . $searchbygendervalue;
                $sql = "SELECT * FROM test2 WHERE $searchbyagevalue AND $searchbygendervalue";
                $result = mysqli_query($conn, $sql);
                $detail = mysqli_fetch_all($result, MYSQLI_ASSOC);
                break;

            case [$searchbyagevalue != 'all', $searchbygendervalue != 'all', $searchbybloodgrpvalue]:
                echo 'input1: ' . $searchbyagevalue . ' & input2: ' . $searchbygendervalue . ' & input3: ' . $searchbybloodgrpvalue;
                $sql = "SELECT * FROM test2 WHERE $searchbyagevalue AND $searchbygendervalue AND $searchbybloodgrpvalue";
                $result = mysqli_query($conn, $sql);
                $detail = mysqli_fetch_all($result, MYSQLI_ASSOC);
                break;

            case ['all', $searchbygendervalue != 'all', $searchbybloodgrpvalue != 'all']:
                echo 'input2: ' . $searchbygendervalue . ' & input3: ' . $searchbybloodgrpvalue;
                $sql = "SELECT * FROM test2 WHERE $searchbygendervalue AND $searchbybloodgrpvalue";
                $result = mysqli_query($conn, $sql);
                $detail = mysqli_fetch_all($result, MYSQLI_ASSOC);
                break;

            case ['all', 'all', $searchbybloodgrpvalue]:
                echo 'input3: ' . $searchbybloodgrpvalue;
                $sql = "SELECT * FROM test2 WHERE $searchbybloodgrpvalue";
                $result = mysqli_query($conn, $sql);
                $detail = mysqli_fetch_all($result, MYSQLI_ASSOC);
                break;

            case ['all', $searchbygendervalue, 'all']:
                echo 'input2: ' . $searchbygendervalue;
                $sql = "SELECT * FROM test2 WHERE $searchbygendervalue";
                $result = mysqli_query($conn, $sql);
                $detail= mysqli_fetch_all($result, MYSQLI_ASSOC);
                break;

            case [$searchbyagevalue, 'all', $searchbybloodgrpvalue]:
                echo 'input1: ' . $searchbyagevalue . ' & input3: ' . $searchbybloodgrpvalue;
                $sql = "SELECT * FROM test2 WHERE $searchbyagevalue AND $searchbybloodgrpvalue";
                $result = mysqli_query($conn, $sql);
                $detail = mysqli_fetch_all($result, MYSQLI_ASSOC);
                break;
        }
    } else {
        echo 'Please input any value!';
    }



    ?>



    <table class="table">
        <thead class="table-dark">
            <tr>
              <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <!-- <th scope="col">Email</th> -->
                <th scope="col">Gender</th>
                <th scope="col">Age</th>
                <th scope="col">Blood Group</th>
                <th scope="col">Qualification</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
            </tr>
        </thead>


        <?php foreach ($detail as $items) : ?>
            <tbody>
                <tr>
                     <td><?php echo $items['id']; ?></td>
                    <td><?php echo $items['firstName']; ?></td>
                    <td><?php echo $items['lastName']; ?></td>
                    <td><?php echo $items['gender']; ?></td>
                    <td><?php echo $items['age']; ?></td>
                    <td><?php echo $items['bloodgrp']; ?></td>
                    <td><?php echo $items['qualification']; ?></td>
                    <td><?php echo $items['address']; ?></td>
                    <td><a class="btn btn-info" href="updates.php?id=<?php echo $items['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delates.php?id=<?php echo $items['id']; ?>">Delete</a></td>

                </tr>
            </tbody>


        <?php endforeach; ?>




    </table>



</body>

</html>
