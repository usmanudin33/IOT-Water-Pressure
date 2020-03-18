<?php 

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			table {
				border-collapse: collapse;
				width: 100%;
				color: #1f5380;
				font-family: monospace;
				font-size: 16px;
				text-align: center;
			} 
			th {
				background-color: #1f5380;
				color: white;
			}
			tr:nth-child(even) {background-color: #f2f2f2}
			.rata-tengah{
				float: center;
				align-content: center;
				vertical-align: center;
			}
		</style>
	</head>
	<?php

		//Creates new record as per request
		//Connect to database
		$hostname = "localhost";		//example = localhost or 192.168.0.0
		$username = "root";		//example = root
		$password = "";	
		$dbname = "db_air";
		// Create connection
		$conn = mysqli_connect($hostname, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed !!!");
		} 
	?>
	<body>
		<div class="rata-tengah">
		<table>
			<tr>
				
				<th>Tekanan</th> 
				<th>Waktu</th> 
			
			</tr>	
			</div>
			<?php
				$table = mysqli_query($conn, "SELECT tekanan, waktu FROM monitor ORDER BY waktu ASC" ); //nodemcu_ldr_table = Youre_table_name
				while($row = mysqli_fetch_array($table))
				{
			?>
			
				<?php echo $row["tekanan"].$row["waktu"]; ?>
			
			<?php
				}
			?>
		</table>
	</body>
</html>