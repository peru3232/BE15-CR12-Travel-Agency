<?php

function normalize ($value): string {
    $val = trim($value);
    $val = strip_tags($val);
    return htmlspecialchars($val);
}

//
//$hostname = "173.212.235.205";
//$username = "wochinge_admin";
//$password = "";
//$dbname =   "wochinge_be15_cr12_mount_everest_peter";
//

//for local usage:
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "be15_cr12_mount_everest_peter";

// create connection
$connect = new  mysqli($hostname, $username, $password, $dbname);

// check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
// } else {
//     echo "Successfully Connected";
}


