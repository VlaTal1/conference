<?php
require '..\database\db.php';
use Conference\Database\DB;

//adding conference in db
function addConference($params = []){
    $db = new DB();
    //checking if lat and lng are null and numeric (remove from params if they are null or not numeric)
    if($params['latitude'] == "" || $params['longitude'] == "" || !is_numeric($params['latitude']) || !is_numeric($params['longitude'])){
        unset($params['latitude']);
        unset($params['longitude']);
        //checking if country is null (remove from params if it is null)
        if($params['country'] == ""){
            unset($params['country']);
            // adding to db
            $sql = 'INSERT INTO `conferences` (title, date) VALUES (:title, :date)';
            $db->query($sql, $params);
        }
        else{
            // adding to db
            $sql = 'INSERT INTO `conferences` (title, date, country) VALUES (:title, :date, :country)';
            $db->query($sql, $params);
        }
    }
    else{
        // adding to db
        $sql = 'INSERT INTO `conferences` (title, date, latitude, longitude, country) VALUES (:title, :date, :latitude, :longitude, :country)';
        $db->query($sql, $params);
    }
}

//updating conference
function update ($id, $params = []){
       $db = new DB();
//    $sql = 'UPDATE conferences SET title = :title, date = :date, latitude = :latitude, longitude = :longitude, country = :country WHERE id_conference = ' . $id;
//    echo $sql;
//    $db->query($sql, $params);

    if($params['latitude'] == "" || $params['longitude'] == "" || !is_numeric($params['latitude']) || !is_numeric($params['longitude'])) {
        $params['latitude'] = null;
        $params['longitude'] = null;
        if($params['country'] == ""){
            $params['country'] = null;
        }
    }
    $sql = 'UPDATE conferences SET title = :title, date = :date, latitude = :latitude, longitude = :longitude, country = :country WHERE id_conference = ' . $id;
    $db->query($sql, $params);


//    //checking if lat and lng are null and numeric (remove from params if they are null or not numeric)
//    if($params['latitude'] == "" || $params['longitude'] == "" || !is_numeric($params['latitude']) || !is_numeric($params['longitude'])) {
//        $params['latitude'] = null;
//        $params['longitude'] = null;
//        //checking if country is null (remove from params if it is null)
//        if($params['country'] == ""){
//            $params['country'] = null;
//            // updating
//            $sql = 'UPDATE conferences SET title = :title, date = :date WHERE id_conference = ' . $id;
//            $db->query($sql, $params);
//        }
//        else{
//            // updating
//            $sql = 'UPDATE conferences SET title = :title, date = :date, country = :country WHERE id_conference = ' . $id;
//            $db->query($sql, $params);
//        }
//    }
//    else{
//        // updating
//        $sql = 'UPDATE conferences SET title = :title, date = :date, latitude = :latitude, longitude = :longitude, country = :country WHERE id_conference = ' . $id;
//        $db->query($sql, $params);
//    }


//    //checking if lat and lng are null and numeric (remove from params if they are null or not numeric)
//    if($params['latitude'] == "" || $params['longitude'] == "" || !is_numeric($params['latitude']) || !is_numeric($params['longitude'])) {
//        unset($params['latitude']);
//        unset($params['longitude']);
//        //checking if country is null (remove from params if it is null)
//        if($params['country'] == ""){
//            unset($params['country']);
//            // updating
//            $sql = 'UPDATE conferences SET title = :title, date = :date WHERE id_conference = ' . $id;
//            $db->query($sql, $params);
//        }
//        else{
//            // updating
//            $sql = 'UPDATE conferences SET title = :title, date = :date, country = :country WHERE id_conference = ' . $id;
//            $db->query($sql, $params);
//        }
//    }
//    else{
//        // updating
//        $sql = 'UPDATE conferences SET title = :title, date = :date, latitude = :latitude, longitude = :longitude, country = :country WHERE id_conference = ' . $id;
//        $db->query($sql, $params);
//    }
}

//deleting conference from db by id
function delConference($params = []){
    $db = new DB();
    $sql = 'DELETE FROM conferences WHERE id_conference = :id';
    $db->query($sql, $params);
}

//get all conferences
function getAll(){
    $db = new DB();
    return $db->getAll('conferences');
}

//get one conference by id
function getOneById($id){
    $db = new DB();
    return $db->getOneById('conferences', $id);
}