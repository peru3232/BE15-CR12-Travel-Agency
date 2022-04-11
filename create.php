<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once 'components/styles.php'?>
        <title>CR12 - Travel agency: Mount Everest - Create...</title>
        <style>
            .ownFieldset {
                margin: 100px auto auto;
                width: 60% ;
            }
        </style>
    </head>
    <body>
        <fieldset class="ownFieldset">
            <legend class='h2'>Adding Offers</legend>
            <form action="actions/a_create.php" method= "post" enctype="multipart/form-data">
                <table class='table'>
                    <tr>
                        <th>Location:</th>
                        <td><input class='form-control' type="text" name="locationName"  placeholder="somewhere" />
                        </td>
                    </tr>    
                    <tr>
                        <th>Description:</th>
                        <td><textarea  class="form-control"  name="description" rows="3" placeholder="details to this place"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Price:</th>
                        <td><input class='form-control' type="text" name= "price" />
<!--                            <span class="text-danger"> --><?//= $priceError ?><!-- </span>-->
                        </td>
                    </tr>
                    <tr>
                        <th>Picture</th>
                        <td><input class='form-control' type="file" name="picture" />
                        </td>
                    </tr>
                    <tr>
                        <th>Longitude:</th>
                        <td><input class='form-control' type="text" name= "longitude" />
<!--                            <span class="text-danger"> --><?//= $longError ?><!-- </span>-->
                        </td>
                    </tr>
                    <tr>
                        <th>Latitude:</th>
                        <td><input class='form-control' type="text" name= "latitude" />
<!--                            <span class="text-danger"> --><?//= $latError ?><!-- </span>-->
                        </td>
                    </tr>
                    <tr>
                        <th>Available:</th>
                        <td><input class="form-check-input" type="checkbox" name="available" /></td>
                    </tr>
                    <tr>
                        <td><button class='btn btn-success' type="submit">Insert this Item</button></td>
                        <td><a href="index.php"><button class='btn btn-secondary' type="button">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
        <?php require_once 'components/scripts.php'?>
    </body>
</html>