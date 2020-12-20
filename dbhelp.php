<?php
require_once('config.php');
function execute($sql){
    // tao connection mysql
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');

    // query
    mysqli_query($conn, $sql);

    // dong connect
    mysqli_close($conn);
}


// su dung cho ham select
function executeResult($sql){
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');

    // query
    $result = mysqli_query($conn, $sql);
    $list = [];
    while($row = mysqli_fetch_array($result, 1)){
        $list[] = $row;
    }

    // dong connect
    mysqli_close($conn);
    return $list;
}