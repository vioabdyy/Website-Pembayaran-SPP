<?php  
	include "menu_bar.php";
?>
<?php  
	include "../koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Komite</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body>
 
 
	<div class="kotak_data">
		<p class="tulisan_data">Tambah Siswa </p>
 
		<form method="POST"  action="siswa_tambah.php">

			<label>Nisn</label>
			<input type="text" name="nisn" class="form-control" placeholder="Masukkan Nisn">
 
			<label>Nis</label>
			<input type="text" name="nis" class="form-control" placeholder="Masukkan Nis">

			<label>Username</label>
			<input type="text" name="username" class="form-control" placeholder="Masukkan Username">

			<label>Nama</label>
			<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Siswa">

			<label>Password</label>
			<input type="text" name="password" class="form-control" placeholder="Masukkan Password">

			<label>Kelas</label>
			  <select name="id_kelas" class="form-control">
			  	<option>Kelas</option>
			  	<?php  
			  		$data = mysqli_query($koneksi,"SELECT * FROM kelas");
			  		while ($panggil = mysqli_fetch_array($data)) {
			  	?>
			  	<option value="<?php echo $panggil['id_kelas'] ?>"><?php echo $panggil['nama_kelas']; ?></option>
			  <?php } ?>
			  </select>
			

			<label>Alamat</label>
			<input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat">

			<label>No Telepon</label>
			<input type="text" name="no_telp" class="form-control" placeholder="Masukkan Nomor Telepon">

			<label>Nominal</label>
			  <select name="id_spp" class="form-control">
			  	<option>Tahun</option>
			  	<?php  
			  		$data = mysqli_query($koneksi,"SELECT * FROM spp");
			  		while ($panggil = mysqli_fetch_array($data)) {
			  	?>
			  	<option value="<?php echo $panggil['id_spp'] ?>"><?php echo $panggil['tahun']; ?></option>
			  <?php } ?>
			  </select>
			



 
			<input type="submit" class="btn btn-success" value="Tambah" name="submit">

		<a class="btn btn-info" href="data_siswa.php">Kembali</a>

		</form>
		
	</div>
 
<?php
 
	
	if(isset($_POST['submit'])) {
		$nisn= $_POST['nisn'];
		$nis = $_POST['nis'];
		$username = $_POST['username'];
		$nama = $_POST['nama'];
		$password= $_POST['password'];
		$id_kelas = $_POST['id_kelas'];
		$alamat = $_POST['alamat'];
		$no_telp = $_POST['no_telp'];
		$id_spp = $_POST['id_spp'];
		
		$result = mysqli_query($koneksi, "INSERT INTO siswa(nisn,nis,username,nama,password,id_kelas,alamat,no_telp,id_spp) VALUES('$nisn','$nis','$username','$nama','$password','$id_kelas','$alamat','$no_telp','$id_spp')");
		
		echo "<script>alert('Berhasil Menambah Data')</script>";
		echo "<meta http-equiv='refresh' content='0;url=data_siswa.php'>";
	}
	?>

	</body>
</html>