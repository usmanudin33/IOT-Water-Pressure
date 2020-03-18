<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$db = mysqli_connect("localhost","root","","db_air");
if ($db->connect_error){
  die("koneksi_gagal: " . $db->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.btn {
  border: 1px solid black;
  background-color: white;
  color: black;
  padding: 12px 24px;
  font-size: 16px;
  cursor: pointer;
}

/* Blue */
.btn {
  border-color: #2196F3;
  color: dodgerblue;
}

.btn:hover {
  background: #2196F3;
  color: white;
}


</style>
</head>
<body>
<div align="center">
<h1>Kontrol Valve</h1>
<form action="proses.php" Method="POST">
<input type="submit" value="BUKA" class="btn btn" name="kontrol"></button>
<input type="submit" value="TUTUP" class="btn btn" name="kontrol"></button>
</form>

<?php if(isset($_GET['submit'])): ?>
    <p>
        <?php
            if($_GET['submit'] == 'sukses'){
                echo "berhasil";
            } else {
                echo "coba lagi";
            }
        ?>
        
    </p>

<script>
<?php endif; ?>
  <?php 
$show = "SELECT valve FROM kontrol";
$result = $db->query ($show);
$row = $result->fetch_assoc();
$row = $row["valve"];
if ($row == 1) {
  echo "<h3> VALVE TERBUKA </h3>";
}else {
  echo "<h3> VALVE TERTUTUP </h3>";
}
  ?>
</script>
</div>
</body>
</html>
