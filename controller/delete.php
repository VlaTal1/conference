<?php
require '../model/Conference.php';

delConference($_GET);

header('Location: /controller');