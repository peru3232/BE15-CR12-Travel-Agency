<?php
require_once 'actions/db_usage.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM locations WHERE offer_id = $id";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);

        $locationName = $data['locationName'];
        $price = $data['price'];
        $description = $data['description'];
        $locationName = $data['locationName'];
        $longitude = $data['longitude'];
        $latitude = $data['latitude'];
        $picture = $data['picture'];
        (bool)$b_available = $data['available'];

    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <title>CR12 - Travel agency: Mount Everest - Offer Edit: <?= $title ?></title>
        <?php require_once 'components/styles.php'?>
    </head>
    <body>
        <fieldset>
            <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='pictures/<?=$picture?>' alt="<?=$locationName?>"></legend>
            <form action="actions/a_update.php"  method="post" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <th>Location Name:</th>
                        <td><input class='form-control' type="text" name= "locationName" value="<?=$locationName?>"  /></td>
                    </tr>
                    <tr>
                        <th>Description:</th>
                        <td><textarea  class="form-control"  name="description" rows="3" ><?=$description?></textarea></td>
                    </tr>
                    <tr>
                        <th>Price:</th>
                        <td><input class='form-control' type="text" name= "price" value="<?=$price?>"  /></td>
                    </tr>
                    <tr>
                        <th>Latitude:</th>
                        <td><input class='form-control' type="text" name= "latitude" value="<?=$latitude?>"  /></td>
                    </tr>
                    <tr>
                        <th>Longitude:</th>
                        <td><input class='form-control' type="text" name= "longitude" value="<?=$longitude?>"  /></td>
                    </tr>
                    <tr>
                        <th>Available:</th>
                        <td><input class="form-check-input" type="checkbox" name="available" <?php if ($b_available){echo "checked";}?> /></td>
                    </tr>
                    <tr>
                        <th>Picture</th>
                        <td><input class="form-control" type="file" name= "picture" /></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="id"  value="<?=$id?>" /></td>
                        <td><input type= "hidden" name= "picture" value= "<?=$picture?>" /></td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-success" type= "submit">Save Changes</button></td>
                        <td><a href= "index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
        <?php require_once 'components/scripts.php'?>
    </body>
</html>