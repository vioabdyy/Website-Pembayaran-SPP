<?php

include_once("../koneksi.php");
 
$id_petugas = $_GET['id_petugas'];
 
$result = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas=$id_petugas");
 
echo "<script>alert('Berhasil menghapus data')</script>";
			echo "<meta http-equiv='refresh' content='0;url=data_petugas.php'>";
?>