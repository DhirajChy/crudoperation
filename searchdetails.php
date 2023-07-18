<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
</head>
    <body>
        <?php
        include 'connection.php';
        session_start();
        $searchbyagevalue = $_SESSION['searchbyagevalue'];
        $searchbygendervalue = $_SESSION['searchbygendervalue'];
        $searchbybloodgroupvalue = $_SESSION['searchbybloodgroupvalue'];


if ($searchbyagevalue && $searchbygendervalue && $searchbybloodgroupvalue) {

        switch ([$searchbyagevalue, $searchbygendervalue, $searchbybloodgroupvalue]) {
            case ['all', 'all', 'all']:
                echo 'no input: default search';
                $sql = "SELECT * FROM test2";
                $result = mysqli_query($conn, $sql);
                $details = mysqli_fetch_all($result, MYSQLI_ASSOC);
                break;

            case [$searchbyagevalue, 'all', 'all']:
                echo 'input: ' . $searchbyagevalue;
                $sql = "SELECT * FROM test2 WHERE $searchbyagevalue";
                $result = mysqli_query($conn, $sql);
                $details = mysqli_fetch_all($result, MYSQLI_ASSOC);
                break;

            case [$searchbyagevalue != 'all', $searchbygendervalue, 'all']:
                echo 'input1: ' . $searchbyagevalue . ' & input2: ' . $searchbygendervalue;
                $sql = "SELECT * FROM test2 WHERE $searchbyagevalue AND $searchbygendervalue";
                $result = mysqli_query($conn, $sql);
                $details = mysqli_fetch_all($result, MYSQLI_ASSOC);
                break;

            case [$searchbyagevalue != 'all', $searchbygendervalue != 'all', $searchbybloodgroupvalue]:
                echo 'input1: ' . $searchbyagevalue . ' & input2: ' . $searchbygendervalue . ' & input3: ' . $searchbybloodgroupvalue;
                $sql = "SELECT * FROM test2 WHERE $searchbyagevalue AND $searchbygendervalue AND $searchbybloodgroupvalue";
                $result = mysqli_query($conn, $sql);
                $details = mysqli_fetch_all($result, MYSQLI_ASSOC);
                break;

            case ['all', $searchbygendervalue != 'all', $searchbybloodgroupvalue != 'all']:
                echo 'input2: ' . $searchbygendervalue . ' & input3: ' . $searchbybloodgroupvalue;
                $sql = "SELECT * FROM test2 WHERE $searchbygendervalue AND $searchbybloodgroupvalue";
                $result = mysqli_query($conn, $sql);
                $details = mysqli_fetch_all($result, MYSQLI_ASSOC);
                break;

            case ['all', 'all', $searchbybloodgroupvalue]:
                echo 'input3: ' . $searchbybloodgroupvalue;
                $sql = "SELECT * FROM test2 WHERE $searchbybloodgroupvalue";
                $result = mysqli_query($conn, $sql);
                $details = mysqli_fetch_all($result, MYSQLI_ASSOC);
                break;

            case ['all', $searchbygendervalue, 'all']:
                echo 'input2: ' . $searchbygendervalue;
                $sql = "SELECT * FROM test2 WHERE $searchbygendervalue";
                $result = mysqli_query($conn, $sql);
                $details = mysqli_fetch_all($result, MYSQLI_ASSOC);
                break;

            case [$searchbyagevalue, 'all', $searchbybloodgrpvalue]:
                echo 'input1: ' . $searchbyagevalue . ' & input3: ' . $searchbybloodgrpvalue;
                $sql = "SELECT * FROM test2 WHERE $searchbyagevalue AND $searchbybloodgroupvalue";
                $result = mysqli_query($conn, $sql);
                $details = mysqli_fetch_all($result, MYSQLI_ASSOC);
                break;
        }
    } else {
        echo 'Please input any value!';
    }

?>
</body>
</html>
