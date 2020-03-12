<!DOCTYPE html>
<html>
	<head>
		<title>Realtime Sensor DHT11 - Using PHP</title>
		<meta charset="utf-8">
		<!-- Script for updating pages without refreshing the page -->
		<script src="jquery.min.js"></script>
		<script>
			$(document).ready(function() {
				setInterval(function(){get_data()},5000);
				function get_data()
				{
					jQuery.ajax({
						type:"GET",
						url: "read_db.php",
						data:"",
						beforeSend: function() {
						},
						complete: function() {
						},
						success:function(data) {
							$("table").html(data);
						}
					});
				}
			});
		</script>
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
		<h1 align="center" style="color:#1f5380;">Tugas Realtime Sensor Suhu dan Kelembapan Menggunakan PHP</h1>
		<table>
		<tr>
				<th>No</th> 
				<th>Sensors</th>
				<th>Humidity %</th> 
				<th>Temperature C</th>
				<th>Time</th>
			</tr>
		</table>
	</body>
</html>