<?php
require_once('dbhelp.php');
if(isset($_POST['id'])){
    $id = $_POST['id'];

    $sql = 'DELETE FROM `sinhvien` WHERE id = '.$id;
    execute($sql);
    echo 'Xoa sinh vien thanh cong';
}
