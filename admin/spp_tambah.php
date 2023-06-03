<?php  
	include "menu_bar.php";
?>
<?php  
	include "../koneksi.php";
?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<div class="kotak_data">
		<p class="tulisan_data">Tambah SPP </p>
 
		<form method="POST"  action="spp_tambah.php">


	<div class="row col-lg-12">
			<label>Tahun</label>
			<input type="text" name="tahun" class="form-control" placeholder="Masukkan Tahun">

			<label>Nominal</label>
			<input type="text" name="nominal" class="form-control" placeholder="Masukkan Nominal">
</div>

	      <input type="submit" class="btn btn-success" value="Tambah" name="submit">

		<a class="btn btn-info" href="data_spp.php">Kembali</a>
      </form>
		</div>
	</div>
</div>
<?php
 
	
	if(isset($_POST['submit'])) {
		$tahun = $_POST['tahun'];
		$nominal = $_POST['nominal'];
		
		$result = mysqli_query($koneksi, "INSERT INTO spp(tahun,nominal) VALUES('$tahun','$nominal')");
		
		echo "<script>alert('Berhasil Menambah Data!')</script>";
		echo "<meta http-equiv='refresh' content='0;url=data_spp.php'>";
	}
	?>