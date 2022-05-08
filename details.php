<?php
require_once 'actions/db_usage.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $b_buttons = true;
} elseif (isset($_GET['showId'])) {
    $id = $_GET['showId'];
    $b_buttons = false;
}

$sql = "SELECT * FROM locations where offer_id = $id";
$result = mysqli_query($connect ,$sql);
$output = $avText = '';

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$row['available']?$avColor="success":$avColor="danger";
$row['available']?:$avText="Sorry, not available at the moment!";
$b_buttons?$buttons="            <a href='index.php'><button class='btn btn-primary mx-3'>Back</button></a>
            <a href='update.php?id={$row['offer_id']}'><button class='btn btn-secondary me-3'>Edit</button></a> 
            <a href='delete.php?id={$row['offer_id']}'><button class='btn btn-danger me-3'>Delete</button></a> 
":$buttons = "            <a href='showAll.php'><button class='btn btn-primary mx-3'>Back</button></a>
";

$output =  "
<h1 class='py-3 text-center bg-primary bg-opacity-75 display-2'>Details:</h1>
<div class='row justify-content-center pt-5'>
<!-- Content Container -->
  <div class='row justify-content-center content-container'>
    <div class='card mb-3 col-11 bg-$avColor bg-opacity-10'>
      <div class='row justify-content-around g-0'>
        <div class='col-sm-4'>
          <img src='images/{$row['picture']}' class='img-fluid rounded-start my-3' alt='{$row['locationName']}'>
        </div>
        <div class='col-sm-7'>
          <div class='card-body'>
            <h2 class='card-title'>{$row['locationName']}</h2>
            <h6> Price: {$row['price']}</h6>
            <p class='card-text'>{$row['description']}</p>
                <div id='map'></div>
            <h6 class='text-$avColor'>$avText</h6>
        </div>
      </div>
    </div>
        <div class='py-2 text-center'>
            $buttons
        </div>
  </div>
</div>


";

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CR12 - Travel agency: Mount Everest - Details to: <?= $row['title'] ?></title>
    <?php require_once 'components/styles.php'?>
</head>
<body>
    <?= $output ?>
    <div class="p-5"> </div>

    <?php require_once 'components/footer.html'?>
    <?php require_once 'components/scripts.php'?>

    <script>
        function initMap() {
            const destination = {
                lng: parseFloat(<?=$row['longitude']?>),
                lat: parseFloat(<?=$row['latitude']?>)
            };

            let map = new google.maps.Map(document.getElementById('map'), {
                center: destination,
                zoom: 12
            });

            new google.maps.Marker({
                position: destination,
                map: map
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>
</body>
</html>