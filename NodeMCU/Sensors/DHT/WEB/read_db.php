<!DOCTYPE html>
<html>
	<head>
		<style>
			table {
				border-collapse: collapse;
				width: 100%;
				color: #1f5380;
				font-family: monospace;
				font-size: 20px;
				text-align: left;
			} 
			th {
				background-color: #1f5380;
				color: white;
			}
			tr:nth-child(even) {background-color: #f2f2f2}
		</style>
	</head>
	<body>
		<table>
			<tr>
				<th>No</th> 
				<th>Sensors</th>
				<th>Humidity %</th> 
				<th>Temperature C</th>
				<th>Time</th>
			</tr>	
			<?php
				include ('koneksi_sql.php');
				$table = mysqli_query($conn, "SELECT * FROM suhu"); //nodemcu_ldr_table = Youre_table_name
				while($row = mysqli_fetch_array($table))
				{
			?>
			<tr>
				<td><?php echo $row["No"]; ?></td>
				<td><?php echo $row["Nama_Sensor"]; ?></td>
				<td><?php echo $row["Temperatur"]; ?></td>
				<td><?php echo $row["Kelembapan"]; ?></td>
				<td><?php echo $row["Tgl_Record"]; ?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>