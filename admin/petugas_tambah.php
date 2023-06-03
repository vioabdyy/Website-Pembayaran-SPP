<?php  
	include "menu_bar.php";
?>
<?php  
	include "../koneksi.php";
?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<div class="kotak_data">
		<p class="tulisan_data">Tambah Petugas </p>
 
		<form method="POST"  action="petugas_tambah.php">

			<label>Username</label>
			<input type="text" name="username" class="form-control" placeholder="Masukkan Username">

			<label>Password</label>
			<input type="text" name="password" class="form-control" placeholder="Masukkan Password">

			<label>Nama</label>
			<input type="text" name="nama_petugas" class="form-control" placeholder="Masukkan Nama">

			<label>Level</label>
			<select name="level" class="form-control">
								<option >Pilih</option>
								<option value="admin">Admin</option>
								<option value="petugas">Petugas</option>
			</select>


			<input type="submit" class="btn btn-info" value="Tambah" name="submit">

		<a class="btn btn-success" href="data_petugas.php">Kembali</a>

		</form>
		
	</div>
 
		
	   
 <?php
	
	if(isset($_POST['submit'])) {
		$username= $_POST['username'];
		$password = $_POST['password'];
		$nama_petugas = $_POST['nama_petugas'];
		$level = $_POST['level'];
		
		$result = mysqli_query($koneksi, "INSERT INTO petugas(username,password,nama_petugas,level) VALUES('$username','$password','$nama_petugas','$level')");
		
		echo "<script>alert('Berhasil Menambah Data!')</script>";
		echo "<meta http-equiv='refresh' content='0;url=data_petugas.php'>";
	}
	?>