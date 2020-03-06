<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IoT-Connection</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
<body>
    <div class="container">
        <div class="container-fluid">
            <table class="table" border="0" align="center" widht="40%">
            <thead>
                <tr align="center">
                    <th colspan="4">LED Controlling</th>
                </tr>
            </thead>
            <thead>
                <tr align="center">
                    <th scope="col">LED MERAH</th>
                    <th scope="col">LED HIJAU</th>
                    <th scope="col">LED KUNING</th>
                    <th scope="col">LED BIRU</th>
                </tr>
            </thead>
            <thead>
                <tr align="center">
                    <td>
                        <button type="button" onclick="location.href='proses_update.php?status=ON1'" class="btn btn-primary">ON</button>
                        <button type="button" onclick="location.href='proses_update.php?status=OFF1'" class="btn btn-danger">OFF</button>
                    </td>
                    <td>
                        <button type="button" onclick="location.href='proses_update.php?status=ON2'" class="btn btn-primary">ON</button>
                        <button type="button" onclick="location.href='proses_update.php?status=OFF2'" class="btn btn-danger">OFF</button>
                    </td>
                    <td>
                        <button type="button" onclick="location.href='proses_update.php?status=ON3'" class="btn btn-primary">ON</button>
                        <button type="button" onclick="location.href='proses_update.php?status=OFF3'" class="btn btn-danger">OFF</button>
                    </td>
                    <td>
                        <button type="button" onclick="location.href='proses_update.php?status=ON4'" class="btn btn-primary">ON</button>
                        <button type="button" onclick="location.href='proses_update.php?status=OFF4'" class="btn btn-danger">OFF</button>
                    </td>
                </tr>
            </thead>
            <thead>
                <tr align="center">
                    
                    <!--Show Status Device-->
                    <?php     
                        include 'koneksi.php';

                        $commandLED1 = "SELECT `status` FROM test_led WHERE `id_led` = '1001'";
                        $commandLED2 = "SELECT `status` FROM test_led WHERE `id_led` = '1002'";
                        $commandLED3 = "SELECT `status` FROM test_led WHERE `id_led` = '1003'";
                        $commandLED4 = "SELECT `status` FROM test_led WHERE `id_led` = '1004'";    
                    ?>
                    <th scope="col"><?php $query_sql = mysqli_query($conn, $commandLED1) or die(mysqli_error($conn)); while ($data = mysqli_fetch_assoc($query_sql)) {$data['status'];  if($data['status'] == 'ON1'){ echo "Menyala";} else { echo "Mati";} } ?></th>
                    <th scope="col"><?php $query_sql = mysqli_query($conn, $commandLED2) or die(mysqli_error($conn)); while ($data = mysqli_fetch_assoc($query_sql)) {$data['status'];  if($data['status'] == 'ON2'){ echo "Menyala";} else { echo "Mati";} } ?></th>
                    <th scope="col"><?php $query_sql = mysqli_query($conn, $commandLED3) or die(mysqli_error($conn)); while ($data = mysqli_fetch_assoc($query_sql)) {$data['status'];  if($data['status'] == 'ON3'){ echo "Menyala";} else { echo "Mati";} } ?></th>
                    <th scope="col"><?php $query_sql = mysqli_query($conn, $commandLED4) or die(mysqli_error($conn)); while ($data = mysqli_fetch_assoc($query_sql)) {$data['status'];  if($data['status'] == 'ON4'){ echo "Menyala";} else { echo "Mati";} } ?></th>
                </tr>
            </thead>
            </table>
        </div>
    </div>
                <!-- Refresh Page-->
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>