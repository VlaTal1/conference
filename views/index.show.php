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
    <title>Конференции</title>
</head>
<body>

    <?php require '../blocks/header.php'?>

    <div class="container">
        <h1 class="mb-3 text-center">Ваши конференции</h1>
        <div class="d-flex flex-wrap">
            <?php foreach($conferences as $conf): ?>
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal text-center"><?php echo $conf['title'] ?></h4>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title pricing-card-title">Дата: <small><?php echo $conf['date'] ?></small></h3>
                            <a href="../controller/details.php?id=<?=$conf['id_conference']?>"><button type="button" class="col-sm-5 btn btn-lg btn-primary float-left mb-2">Детали</button></a>
                            <a href="../controller/edit.php?id=<?=$conf['id_conference']?>"><button type="button" class="col-sm-5 btn btn-lg btn-success float-right mb-2">Изменить</button></a>
                            <a href="../controller/delete.php?id=<?=$conf['id_conference']?>"<button type="button" class="w-100 btn btn-lg btn-outline-danger">Удалить</button></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <script>
        document.getElementById('index').classList.add('active');
    </script>
</body>
</html>