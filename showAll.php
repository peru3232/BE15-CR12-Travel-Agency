<?php
$header = 'Our Destinations:';
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>CR12 - Travel agency: Mount Everest - Show All</title>
    <?php require_once 'components/styles.php'?>
</head>
<body>
<main>
    <div class='row justify-content-center '>
        <div class="hero text-center p-5" style="background-image: url(https://cdn.pixabay.com/photo/2017/12/16/22/22/bora-bora-3023437_960_720.jpg)"><button type="button" id="loadContent" class='btn btn-primary fs-4 p-3'>Click to show our offers</button><a href='index.php'><button class='btn btn-success fs-4 p-3 ms-2'>Back</button></a></div>
        <!-- header with generated text from php-->
        <h1 class='py-3 text-center bg-primary bg-opacity-75  display-2'><?= $header ?></h1>
        <!-- Card Container -->
        <div id='content' class='row justify-content-center pt-5 content-container'>

        </div>
    </div>
    <div class="p-5"> </div>
</main>
<!--footer-->
<?php require_once 'components/footer.html'?>
<!--scripts-->
<?php require_once 'components/scripts.php'?>
<script>
    //AJAX function here
    document.getElementById('loadContent').addEventListener('click', loadApiContent);
    let content = document.getElementById('content');
    function loadApiContent() {
        let apiReq = new XMLHttpRequest();
        apiReq.open("GET", "displayAll.php");
        apiReq.onload = function () {
            // console.log(apiReq.responseText, apiReq.status)
            let avColor = "primary";
            if (apiReq.status === 200) {
                const offers = JSON.parse(apiReq.responseText);
                content.innerHTML = "";
                for (const offer of offers) {
                    // if (offer.available == true) {
                    //     avColor = "success"
                    // }
                    content.innerHTML += `
                        <a class='card col-lg-3 col-md-5 col-sm-10 col-11 p-0 m-2 bg-${avColor} bg-opacity-10 border-${avColor} border-3' href='details.php?showId=${offer.offer_id}'>
                    <img src='images/${offer.picture}' class='img-fluid rounded-start m-3' alt='${offer.locationName}'>
                    <div class='card-body pb-2'>
                        <h5 class='card-title'>${offer.locationName}</h5>
                <p class='card-text'>Price: ${offer.price}</p>
                </div>
                </a>
                `;
                }
            }
        };
        apiReq.send();
    }
</script>
</body>
</html>