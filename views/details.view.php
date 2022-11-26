<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    own styles-->
    <link rel="stylesheet" href="../css/style.css">
    <!--    bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Детали</title>
</head>
<body>
<!-- adding header -->
<?php require '../blocks/header.php' ?>

<div class="container col-5 ml-auto mr-auto">
    <h1 class="mb-3 text-center">Детали</h1>
    <div class="row mb-3">
        <h3 class="col text-right"><b>Название:</b></h3>
        <h3 class="col text-left"><?= $conference['title'] ?></h3>
    </div>
    <div class="row mb-3"">
        <h3 class="col text-right"><b>Дата:</b></h3>
        <h3 class="col text-left"><?= $conference['date'] ?></h3>
    </div>

    <?php if ($conference['country'] != null): ?>
        <div class="row mb-3">
            <h3 class="col text-right"><b>Страна:</b></h3>
            <h3 class="col text-left"><?= $conference['country'] ?></h3>
        </div>
    <?php endif; ?>
    <?php if ($conference['latitude'] != null && $conference['longitude'] != null): ?>
        <div id="map" class="mb-3"></div>
    <?php endif; ?>
    <div class="row mb-3 ">
        <a href="../controller/edit.php?id=<?=$conference['id_conference']?>"<button type="button" class="btn btn-lg btn-success col mr-1 ml-3">Изменить</button></a>
        <a href="../controller/delete.php?id=<?=$conference['id_conference']?>"<button type="button" class="btn btn-lg btn-outline-danger col mr-3 ml-1">Удалить</button></a>
    </div>
</div>

<?php if ($conference['latitude'] != null && $conference['longitude'] != null): ?>
<script>
    function initMap() {
        let params = (new URL(document.location)).searchParams;
        let lat = params.get("latitude");
        let lng = params.get("longitude");
        console.log(params.get("data"));

        var myLatlng = new google.maps.LatLng(<?= $conference['latitude'] ?>, <?= $conference['longitude'] ?>);
        var mapOptions = {
            zoom: 12,
            center: myLatlng
        }
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng
        });

        marker.setMap(map);
    }
</script>
<?php endif; ?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCadbOf9ieaSLlPk_7hunJRigIfXFrD3f4&callback=initMap"></script>
</body>
</html>
