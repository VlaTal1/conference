<?php
require '../model/Conference.php';

addConference($_POST);

header("Location: ../views/addConference.view.php");