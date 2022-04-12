<?php
//connect to database
require_once 'actions/db_usage.php';

//select list of items
$header = 'Our Destinations:';
$output = '';
$sql = 'SELECT * FROM locations';
$result = mysqli_query($connect ,$sql);
if (!(mysqli_num_rows($result)))  {
    $output .=  "<h1 class='text-center'>No Data Available </h1>";
    return;
}

//generate whole list
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $row['available']?$avColor="success":$avColor="danger";
    $output .= "
        <a class='card col-lg-3 col-md-5 col-sm-10 col-11 p-0 m-2 bg-$avColor bg-opacity-10 border-$avColor border-3' href='details.php?id={$row['offer_id']}'>
            <img src='images/{$row['picture']}' class='img-fluid rounded-start m-3' alt='{$row['locationName']}'>
            <div class='card-body pb-2'>
                <h5 class='card-title'>{$row['locationName']}</h5>
                <p class='card-text'>Price: {$row['price']}</p>
            </div>
        </a> 
    ";
}
//close connection
mysqli_close($connect);

?>


<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>CR12 - Travel agency: Mount Everest - INDEX</title>
    <?php require_once 'components/styles.php'?>
</head>
<body>
<main>
    <div class='row justify-content-center '>
        <div class="hero text-center p-5" style="background-image: url(https://cdn.pixabay.com/photo/2017/12/16/22/22/bora-bora-3023437_960_720.jpg)"><a href='create.php'><button class='btn btn-success fs-4 p-3 me-2'>Adding Offers</button></a><a href='showAll.php'><button class='btn btn-primary fs-4 p-3'>Show all offers side</button></a><a href='displayAll.php'><button class='btn btn-success fs-4 p-3 ms-2'>API Link</button></a></div>
        <!-- header with generated text from php-->
        <h1 class='py-3 text-center bg-primary bg-opacity-75  display-2'><?= $header ?></h1>
        <!-- Card Container -->
        <div class='row justify-content-center pt-5 content-container'>
            <!-- items list from php-->
            <?= $output ?>
        </div>
    </div>
    <div class="p-5"> </div>
</main>
<!--footer-->
<?php require_once 'components/footer.html'?>
<!--scripts-->
<?php require_once 'components/scripts.php'?>
</body>
</html>