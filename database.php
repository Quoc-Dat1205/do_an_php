<?php
const HOST = "localhost";
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'banhang';

function QuerySql($sql){
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');  

    mysqli_query($conn, $sql);

    // close
    mysqli_close($conn);

}

function createDatabase(){
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');  
    $sql = 'create table if not exists SinhVien (
            id int primary key auto_increment,
            ten varchar(255) not null,
            tuoi varchar(255) not null,
            mssv int
        )';
    mysqli_query($conn, $sql);
    // close 
    mysqli_close($conn);
}

function insertData(){
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');

    for($i=0; $i<20; $i++){
        $sql = '
        insert into sinhvien (ten, tuoi, mssv) values ("ten '.$i.'","'.($i +1).'","'.($i + 10).'");
        ';
        mysqli_query($conn, $sql);
    }

    // close 
    mysqli_close($conn);
}

function getData($sql){
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');

    // query
    $result = mysqli_query($conn, $sql);
    $data = [];

    while($row = mysqli_fetch_array($result,1)){
        $data[] = $row;
    }

    // close
    mysqli_close($conn);

    return $data;

}

createDatabase();

// insertData();