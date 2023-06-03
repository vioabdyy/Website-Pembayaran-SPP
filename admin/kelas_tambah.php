<?php  
	include "menu_bar.php";
?>
<?php  
	include "../koneksi.php";
?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<div class="container">

	<div class="kotak_data">
		<p class="tulisan_data">Tambah Kelas </p>
 
			
			<form action="kelas_tambah.php" method="POST">

			<div class="row col-lg-12">

	        <label>Nama Kelas</label>
			<input type="text" name="nama_kelas" class="form-control" placeholder="Masukkan Nama Kelas">

			<label>Kompetensi Keahlian</label>
			<input type="text" name="kompetensi_keahlian" class="form-control" placeholder="Masukkan Kompetensi Keahlian">

	     

	</div>
	<input type="submit" class="btn btn-success" value="Tambah" name="submit">

		<a class="btn btn-info" href="data_kelas.php">Kembali</a>
      </form>
		
	</div>
</div>
<?php
 
	
	if(isset($_POST['submit'])) {
		$nama_kelas = $_POST['nama_kelas'];
		$kompetensi_keahlian = $_POST['kompetensi_keahlian'];
		
		$result = mysqli_query($koneksi, "INSERT INTO kelas(nama_kelas,kompetensi_keahlian) VALUES('$nama_kelas','$kompetensi_keahlian')");
		
		echo "<script>alert('Berhasil Menambah Data!')</script>";
		echo "<meta http-equiv='refresh' content='0;url=data_kelas.php'>";
	}
	?>