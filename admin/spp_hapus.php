<?php

include_once("../koneksi.php");
 
$id_spp = $_GET['id_spp'];
 
$result = mysqli_query($koneksi, "DELETE FROM spp WHERE id_spp=$id_spp");
 
echo "<script>alert('Berhasil menghapus data')</script>";
			echo "<meta http-equiv='refresh' content='0;url=data_spp.php'>";
?>