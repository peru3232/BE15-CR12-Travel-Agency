<?php
//connect to database
require_once("actions/db_usage.php");

$sql = "SELECT * FROM locations";
$result = mysqli_query($connect, $sql);

// Close the DB connection
mysqli_close($connect);

//Fetch Data from database
$data=mysqli_fetch_all($result, MYSQLI_ASSOC);

// Set Content-Type header to application/json
header("Content-Type:application/json");

if (!(mysqli_num_rows($result))) {
    echo "Null";
} else {
    echo json_encode($data);
}
