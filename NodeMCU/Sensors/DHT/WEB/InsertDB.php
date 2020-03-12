<?php
//Creates new record as per request
    //Connect to database
    include ("koneksi_sql.php");
    //Get current date and time
    date_default_timezone_set('Asia/Jakarta');
    $d = date("Y-m-d");
    $t = date("H:i:s");

    if((isset($_POST['humiditySend'])) && (isset($_POST['tempSend'])) && (isset($_POST['statusDevice'])))
    {
        $humidityValue = $_POST['humiditySend'];
        $tempValue = $_POST['tempSend'];
        $statusDevice = $_POST['statusDevice'];
	    $sql = "INSERT INTO suhu (Nama_Sensor, Temperatur, Kelembapan, Tgl_Record) VALUES ('DHT11',' ".$humidityValue."', '".$tempValue."', '".$t."')"; //nodemcu_ldr_table = Youre_table_name

		if ($conn->query($sql) === TRUE) {
		    echo "OK";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	$conn->close();
?>