<?php

$conn = new mysqli ("localhost","root","","db_air");
if ($conn->connect_error){
	die("koneksi_gagal: ".$conn->connect_error);
}

$show = "SELECT valve FROM kontrol";
$result = $conn->query ($show);

$row = $result->fetch_assoc();
$row = $row["valve"];
echo $row;

?>