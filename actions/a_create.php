<?php
require_once 'db_usage.php';
require_once 'file_upload.php';

if ($_POST) {
//    $id = $_POST['id'];
    $locationName= $_POST['locationName'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $long = $_POST['longitude'];
    $lat = $_POST['latitude'];
    (@$_POST['available'])?$b_available=true:$b_available=false;
    $picture = file_upload($_FILES['picture']);

    $uploadError = '';

    $sql = "INSERT INTO locations (`locationName`, `price`, `description`, `longitude`, `latitude`, `available`, `picture`) VALUES
    ('$locationName', $price, '$description', $long, $lat, '$b_available', '$picture->fileName')";

    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $locationName </td>
            <td> $price </td>
            </tr></table><hr>
             <br/> You will be redirected in 5 seconds...";
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error." <br/> You will be redirected in 5 seconds...";
    }
    $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    mysqli_close($connect);
    header("refresh:5 ; url=../index.php");
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
                <h1>Create request response</h1>
            </div>
            <div class="alert alert-<?= $class ?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
            </div>
        </div>
        <?php require_once '../components/scripts.php'?>
    </body>
</html>