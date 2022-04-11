<?php
require_once 'db_usage.php';
require_once 'file_upload.php';

if ($_POST) {
    $id = $_POST['id'];
    $locationName = $_POST['locationName'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    (@$_POST['available'])?$b_available=1:$b_available=0;
    //variable for upload pictures errors is initialised
    $uploadError = $pictureInsert = '';

    $picture = file_upload($_FILES['picture']);//file_upload() called
    if($picture->error===0){
        $_POST["picture"] == "leer.png" || unlink("../images/$_POST[picture]");
        $pictureInsert = ", picture = '$picture->fileName'";
    }
    $sql = "UPDATE locations SET locationName = '$locationName', price = $price, description = '$description', longitude = '$longitude', latitude = '$latitude', available = '$b_available'$pictureInsert WHERE offer_id = '$id'";

    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated <br/> You will be redirected in 5 seconds...";
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_connect_error()."<br/> You will be redirected in 15 seconds... $sql";
    }
    $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    mysqli_close($connect);
    header("refresh:15 ; url=../index.php");
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once '../components/styles.php'?>
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Update request response</h1>
            </div>
            <div class="alert alert-<?=$class?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
        <?php require_once '../components/scripts.php'?>
    </body>
</html>