<?php 
include 'koneksi.php';
    if (isset($_GET['status'])){
        $status = $_GET['status'];
        if ($status == 'ON1' || $status == 'OFF1') {
            $id_led = '1001';
        }elseif ($status == 'ON2' || $status == 'OFF2') {
            $id_led = '1002';
        }elseif ($status == 'ON3' || $status == 'OFF3') {
            $id_led = '1003';
        }elseif ($status == 'ON4' || $status == 'OFF4') {
            $id_led = '1004';
        }

        $updt = "UPDATE `test_led` SET `status` = '$status' WHERE `test_led`.`id_led` = '$id_led'";
        $query_sql = mysqli_query($conn, $updt);
    
            //Data berhasil ditambahkan
            if ($query_sql) {
                header('Location: index.php');
            } else {
                header('Location: index.php');
            }            
        $conn-> close();
    }
    
?>