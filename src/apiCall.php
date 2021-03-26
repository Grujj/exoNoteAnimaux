<?php

$pdo = new PDO('mysql:host=localhost; dbname=animaux', 'visiteur', 'root');

function selectAnimaux(){
    global $pdo;

    $select = $pdo->query('SELECT nom, type FROM `chien`
        INNER JOIN `race` ON chien.id_race = race.id;');
    return $select->fetchAll(PDO::FETCH_OBJ);
}

function selectRace(){
    global $pdo;

    $select = $pdo->query('SELECT id, type FROM `race`;');
    return $select->fetchAll(PDO::FETCH_OBJ);
}

function add(){
    global $pdo;

    $insert = $pdo->prepare("INSERT INTO chien (nom, id_race)
        VALUE(?,?);");

    $insert->bindParam(1, $_REQUEST['nom']);
    $insert->bindParam(2, $_REQUEST['race']);
    
    $insert->execute();
}

function addRace(){
    global $pdo;

    $insert = $pdo->prepare("INSERT INTO race (type)
        VALUE(?);");

    $insert->bindParam(1, $_REQUEST['newRace']);
    
    $insert->execute();
}

if(isset($_REQUEST['nom']) && isset($_REQUEST['race'])){
    add();
}
else if(isset($_REQUEST['newRace'])){
    addRace();
}

$animaux = selectAnimaux();
$race = selectRace();