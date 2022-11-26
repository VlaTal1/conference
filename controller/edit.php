<?php
require '../model/Conference.php';

$conference = getOneById($_GET['id']);

include '../views/edit.view.php';
