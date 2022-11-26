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
    <title>Добавление</title>
</head>
<body>
<!-- adding header -->
    <?php require '../blocks/header.php' ?>

    <div class="container text-center">
        <h1 class="mb-3">Создание</h1>
        <form action="../controller/create.php" method="post" class="col-sm-5 ml-auto mr-auto">
            <!--            name choose-->
            <div class="form-group">
                <label for="title" id="label">Название</label>
                <input type="text" class="form-control" name="title" placeholder="Название конференции" minlength="2" maxlength="255" required>
            </div>
            <!--            date choose-->
            <div class="form-group">
                <label for="date" id="label label-date">Дата</label>
                <input type="text" id="date" name="date" class="form-control" placeholder="Дата конференции" required oninput="dateHandler(this)">
            </div>
            <!--            map-->
            <div class="form-group">
                <label for="latitude">Широта</label>
                <input type="text" id="latitude" name="latitude" class="form-control" placeholder="Широта" oninput="numHandler(this)" onchange="setMarker()" min="-90" max="90">
            </div>
            <div class="form-group">
                <label for="longitude">Долгота</label>
                <input type="text" id="longitude" name="longitude" class="form-control" placeholder="Долгота" oninput="numHandler(this)" onchange="setMarker()" min="-180" max="180">
            </div>
            <div class="form-group">
                <div id="map" class="form-control"></div>
            </div>
            <!--            country choose-->
            <div class="form-group">
                <?php //require "blocks/countries.html"?>
                <label for="country" id="label label-country">Страна</label>
                <select class="form-control" id="country" name="country">
                    <option selected value="">Выберите страну</option>
                    <option value="">None</option>
                    <?php foreach ($c as $item): ?>
                        <option value="<?= $item ?>"><?= $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
<!--            <input type="submit" class="btn btn-lg btn-success w-100 mb-1" value="Добавить конференцию" onclick="validation()"><br>-->
            <button type="submit" class="btn btn-lg btn-success w-100 mb-1">Добавить конференцию</button>
            <a href="../controller/index.php" class=""><button class="btn btn-lg btn-primary w-100 mb-1" type="button">Назад</button></a>
        </form>
    </div>

<!--    changing active button in navbar-->
    <script>document.getElementById('add').classList.add('active');</script>
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


