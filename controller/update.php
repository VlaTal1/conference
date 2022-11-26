<?php
require '../model/Conference.php';

update($_GET['id'], $_POST);

header('Location: index.php');