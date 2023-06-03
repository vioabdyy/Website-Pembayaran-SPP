<?php

include_once("../koneksi.php");
 
$id_kelas = $_GET['id_kelas'];
 
$result = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas=$id_kelas");
 
echo "<script>alert('Berhasil menghapus data')</script>";
			echo "<meta http-equiv='refresh' content='0;url=data_kelas.php'>";
?>