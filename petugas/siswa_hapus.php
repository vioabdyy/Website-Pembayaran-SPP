<?php

include_once("../koneksi.php");
 
$nisn = $_GET['nisn'];
 
$result = mysqli_query($koneksi, "DELETE FROM siswa WHERE nisn=$nisn");
 
echo "<script>alert('Berhasil menghapus data')</script>";
			echo "<meta http-equiv='refresh' content='0;url=data_siswa.php'>";
?>