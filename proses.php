<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "db_air";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}


// cek apakah tombol sudah diklik atau blum?
if(isset($_POST['kontrol'])){

    // ambil data dari formulir
    $data = $_POST['kontrol'];
   if($data == "BUKA"){
     $sql = "UPDATE kontrol SET valve = 1";
}
  if($data == "TUTUP"){
     $sql = "UPDATE kontrol SET valve = 0";
}
     
    // buat query 
    }
$query_input = mysqli_query($db, $sql);
    
  // apakah query simpan berhasil?
    if( $query_input ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
header('Location: index.php?button=sukses');
} else {
    die(header('Location: index.php?button=gagal'));
}
?>
