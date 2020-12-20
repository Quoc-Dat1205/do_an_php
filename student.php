<?php
    require_once('dbhelp.php');

    // if(isset($_GET['delete_id'])){
    //     $delete = $_GET['delete_id'];
    //     // echo $delete;
    //     $sql = 'delete from sinhvien where id = '.$delete;
    //     QuerySql($sql);
    // }

    // $hoten = $tuoi = $mssv = '';

    // if(isset($_POST['fullname'])){
    //     $hoten = $_POST['fullname'];
    // }
    // if(isset($_POST['tuoi'])){
    //     $tuoi = $_POST['tuoi'];
    // }
    // if(isset($_POST['mssv'])){
    //     $mssv = $_POST['mssv'];
    // }

    // if($hoten != '' && $tuoi != '' && $mssv != ''){
    //     $sql = 'insert into sinhvien (ten, tuoi, mssv) values ("'.$hoten.'", "'.$tuoi.'", "'.$mssv.'")';
    //     QuerySql($sql);
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan ly sinh vien</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Manager Student
                
                <form action="" method="GET" role="form">
                    <input type="text" class="form-control" placeholder="Tim kiem theo ten" name='find'>
                </form>
                
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>fullname</th>
                            <th>Age</th>
                            <th>MSSV</th>
                            <th width="60px"></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = '';
                        if( isset($_GET['find']) && $_GET['find'] != ''){
                            $sql = 'select * from sinhvien where ten like "%'.$_GET['find'].'%" ';
                        }else{
                            $sql = 'select * from sinhvien';
                        }
                            $result = executeResult($sql);
                            $no = 1;
                            foreach($result as $row){
                                echo '
                                    <tr>
                                        <td>'.$no++.'</td>
                                        <td>'.$row['ten'].'</td>
                                        <td>'.$row['tuoi'].'</td>
                                        <td>'.$row['mssv'].'</td>
                                        <td>
                                            <a href="input.php?id='.$row['id'].'"><button type="button" class="btn btn-danger">Update</button></a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" onClick="DeleteStudent('.$row['id'].')">Delete</button>
                                        </td>
                                    </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
                <button type="button" onclick="window.open('input.php','_self')" class="btn btn-outline-primary">Add</button>

                <script type="text/javascript">
                    function DeleteStudent(id){
                        // console.log(id);
                        $option = confirm('Do you want delete product???');
                        if(!$option){
                            return;
                        }
                        $.post('delete.php',{
                            'id':id
                        }, function(data){
                            alert(data);
                            location.reload();
                        })
                    }
                </script>
            </div>
        </div>
    </div>

    
</body>
</html>