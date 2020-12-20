<?php
require_once('dbhelp.php');
$fullname = $age = $mssv = $id = '';

    if(!empty($_POST)){

        if(isset($_POST['fullname'])){
            $fullname = $_POST['fullname'];
        }
        if(isset($_POST['age'])){
            $age = $_POST['age'];
        }
        if(isset($_POST['mssv'])){
            $mssv = $_POST['mssv'];
        }
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }

        // kiem tra dang update hay insert
        if($id != '' && $id != null){
            // update
            $sql = 'update sinhvien set ten = "'.$fullname.'", tuoi = '.$age.', mssv = '.$mssv.' where id = '.$id.'';
            // echo $sql;
        }
        else{
            // insert
            $sql = 'insert into sinhvien (ten, tuoi, mssv) values ("'.$fullname.'","'.$age.'", "'.$mssv.'")';
        }
        // echo $sql;
        execute($sql);
        header('Location: student.php');
        die();
    }

    $id = '';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = 'select * from sinhvien where id = '.$id;
        $student = executeResult($sql);
        $student1 = $student[0];
        // var_dump($student1);
        // die();
        if($student != null && count($student) > 0){
            $info = $student[0];
            $fullname = $info['ten'];
            $age = $info['tuoi'];
            $mssv = $info['mssv'];
        }
        else{
            $id = '';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them sinh vien</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
        <div class="row">
            
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Fullname</label>
                                <input type="text" name="fullname" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?=$fullname?>">
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?=$id?>" style="display:none" name="id">
                            </div>
                            <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" name="age" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?=$age?>">
                            </div>
                            <div class="form-group">
                                <label for="">MSSV</label>
                                <input type="text" name="mssv" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?=$mssv?>">
                            </div>
                            <button class="btn btn-success" type='submit'>
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>