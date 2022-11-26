<?php
require '../model/Conference.php';

$conferences = getAll();

include '../views/index.show.php';