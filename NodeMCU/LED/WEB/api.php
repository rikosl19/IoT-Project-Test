<?php 
    include 'koneksi.php';

    $command = "SELECT * FROM test_led";
    $query_sql = mysqli_query($conn, $command) or die(mysqli_error($conn));
            
            while ($data = mysqli_fetch_array($query_sql)) {
                $dataContainer[] = 
                    array(             
                            'id_led' => $data['id_led'],
                            'name_led' => $data['name_led'],
                            'status' => $data['status']
                        );
                }

            $strJsonFormat_with_space = json_encode(array("result" => $dataContainer));
            print $strJsonFormat_with_space;
?>