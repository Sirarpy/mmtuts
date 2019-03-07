<?php

$connect = "";

//--------------------connection to data base-----------------------
function dataBase()
{
    $server = "localhost";
    $user = "root";
    $pass = "root";
    $base = "sys";
    $con = mysqli_connect($server, $user, $pass, $base);

    if (!$con) {
        echo mysqli_connect_error($con);
    }
    return $con;
}

$connect = dataBase();

//-----------------------data base query------------------

function queryDb($queryDb){
    global $connect;
    $result =  mysqli_query($connect, $queryDb);
    if(!$result){
        die(mysqli_error($connect));
    }
    return $result;
}

//----------------------create assoc array---------------

function assocDb($data){
    return mysqli_fetch_all($data,MYSQLI_ASSOC);
}

