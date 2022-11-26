<?php
require_once "../countries.php";
?>

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
<!-- air-datepicker-->
    <link rel="stylesheet" href="../css/air-datepicker.css">
    <title>Редактирование</title>
</head>
<body>
<!-- adding header -->
    <?php require '../blocks/header.php' ?>

    <div class="container text-center">
        <h1 class="mb-3">Редактирование</h1>
        <form action="../controller/update.php?id=<?= $conference['id_conference'] ?>" method="post" class="col-sm-5 ml-auto mr-auto">
            <!--            name choose-->
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" class="form-control" name="title" placeholder="Название конференции" minlength="2" maxlength="255" required value="<?= $conference['title'] ?>">
            </div>
            <!--            date choose-->
            <div class="form-group">
                <label for="date">Дата</label>
                <input type="text" id="date" name="date" class="form-control" placeholder="Дата конференции" required value="<?= $conference['date'] ?>" oninput="dateHandler(this)">
            </div>
            <!--            map-->
            <div class="form-group">
                <label for="latitude">Широта</label>
                <input type="text" id="latitude" name="latitude" class="form-control" placeholder="Широта" oninput="numHandler(this)" onchange="setMarker()" min="-90" max="90" value="<?= $conference['latitude'] ?>">
            </div>
            <div class="form-group">
                <label for="longitude">Долгота</label>
                <input type="text" id="longitude" name="longitude" class="form-control" placeholder="Долгота" oninput="numHandler(this)" onchange="setMarker()" min="-180" max="180" value="<?= $conference['longitude'] ?>">
            </div>
            <div class="form-group">
                <div id="map"></div>
            </div>
            <!--            country choose-->
            <div class="form-group">
                <label for="country">Страна</label>
                <select class="form-control" id="country" name="country">
                    <option selected value="">Выберите страну</option>
                    <option value="">None</option>
                    <?php foreach ($c as $item): ?>
                        <?php if ($item == $conference['country']): ?>
                            <option selected value="<?= $item ?>"><?= $item ?></option>
                        <?php else: ?>
                            <option value="<?= $item ?>"><?= $item ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="row mb-1">
                <input type="submit" class="btn btn-lg btn-success col mr-1 ml-3" value="Сохранить">
                <a href="../controller/delete.php?id=<?=$conference['id_conference']?>" class="mr-3"><button type="button" class="col btn btn-outline-danger btn-lg">Удалить</button></a>
            </div>
            <a href="../controller/index.php" class=""><button class="col btn btn-primary btn-lg" type="button">Назад</button></a>
        </form>
    </div>

<!--    adding google maps-->
    <script src="../js/add.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCadbOf9ieaSLlPk_7hunJRigIfXFrD3f4&callback=initMap"></script>
<!--    date picker -->
    <script src="../js/air-datepicker.js"></script>
<!--    create date picker and add properties-->
    <script>
        new AirDatepicker('#date', {
            dateFormat: 'yyyy-MM-dd',
            position: 'right center',
            buttons: ['today', 'clear']
        })
    </script>
</body>
</html>


