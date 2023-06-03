<?php  
	include "menu_bar.php";
?>
<?php  
	include "../koneksi.php";
?>
<?php 
	$nisn = $_GET['nisn'];
	$row = mysqli_query($koneksi,"select * from siswa where nisn='$nisn'");
	while ($data = mysqli_fetch_array($row)) {
 ?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<div class="kotak_data">
		<p class="tulisan_data">Edit Siswa </p>
 
		<form method="POST"  action="siswa_edit.php?nisn=<?php echo $nisn; ?>">

			
			<input type="hidden" name="nisn" class="form-control" value="<?php echo $data['nisn']; ?>">
 
			<label>Nis</label>
			<input type="text" name="nis" class="form-control" value="<?php echo $data['nis']; ?>">

			<label>Username</label>
			<input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>">

			<label>Nama</label>
			<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">

			<label>Password</label>
			<input type="text" name="password" class="form-control" value="<?php echo $data['password']; ?>">

			<label>Kelas</label>
			<select name="id_kelas" class="form-control">
			  
			  	<?php  
			  		$data_kelas = mysqli_query($koneksi,"SELECT * FROM kelas");
			  		while ($panggil = mysqli_fetch_array($data_kelas)) {
			  	?>
			  	<option value="<?php echo $panggil['id_kelas'] ?>"><?php echo $panggil['nama_kelas']; ?></option>
			  <?php } ?>
			  </select>

			<label>Alamat</label>
			<input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>">

			<label>No Telepon</label>
			<input type="text" name="no_telp" class="form-control" value="<?php echo $data['no_telp']; ?>">

			<label>Nominal</label>
			  <select name="id_spp" class="form-control">
			  
			  	<?php  
			  		$data_spp = mysqli_query($koneksi,"SELECT * FROM spp");
			  		while ($panggil = mysqli_fetch_array($data_spp)) {
			  	?>
			  	<option value="<?php echo $panggil['id_spp'] ?>"><?php echo $panggil['tahun']; ?></option>
			  <?php } ?>
			  </select>



 
			<input type="submit" class="btn btn-success" value="Update" name="update">

		<a class="btn btn-info" href="data_siswa.php">Kembali</a>

		</form>
		
	</div>
<?php  
	}
?>
<?php
	if(isset($_POST['update']))
	{	
		
		$nisn=$_POST['nisn'];
		$nis=$_POST['nis'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$nama=$_POST['nama'];

		$id_kelas=$_POST['id_kelas'];
		$alamat=$_POST['alamat'];
		$no_telp=$_POST['no_telp'];
		$id_spp=$_POST['id_spp'];
			
		$result = mysqli_query($koneksi, "UPDATE siswa SET username='$username',password='$password', nisn='$nisn',nis='$nis',nama='$nama',id_kelas='$id_kelas',alamat='$alamat',no_telp='$no_telp',id_spp='$id_spp'WHERE nisn=$nisn");
		
		echo "<script>alert('Berhasil Mengubah Data!')</script>";
		echo "<meta http-equiv='refresh' content='0;url=data_siswa.php'>";
	}
?>