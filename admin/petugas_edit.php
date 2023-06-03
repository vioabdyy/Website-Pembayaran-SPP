<?php  
	include "menu_bar.php";
?>
<?php  
	include "../koneksi.php";
?>
<?php 
	$id_petugas = $_GET['id_petugas'];
	$row = mysqli_query($koneksi,"select * from petugas where id_petugas='$id_petugas'");
	while ($data = mysqli_fetch_array($row)) {
 ?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<div class="kotak_data">
		<p class="tulisan_data">Edit Siswa </p>
		<form action="petugas_edit.php?id_petugas=<?php echo $id_petugas; ?>" method="POST">
	
			<input type="hidden" name="id_petugas" class="form-control" value="<?php echo $data['id_petugas']; ?>">
 
			<label>Username</label>
			<input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>">

			<label>Password</label>
			<input type="text" name="password" class="form-control" value="<?php echo $data['password']; ?>">

			<label>Nama</label>
			<input type="text" name="nama_petugas" class="form-control" value="<?php echo $data['nama_petugas']; ?>">
			
			<label>Level</label>
				<select class="form-control" name="level">
				<option value="<?php echo $data['level']; ?>"><?php echo $data['level']; ?></option>
				<option value="admin">Admin</option>
				<option value="petugas">Petugas</option>
				</select>
			
	      <div >
	       <input type="submit" class="btn btn-info" value="Update" name="update">

		<a class="btn btn-warning" href="data_petugas.php">Kembali</a>
	      </div>
      </form>
  </div>
	</div>
</div>
<?php  
	}
?>
<?php
	if(isset($_POST['update'])){	
		$id_petugas = $_POST['id_petugas'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$nama_petugas=$_POST['nama_petugas'];
		$level=$_POST['level'];
			
		$result = mysqli_query($koneksi, "UPDATE petugas SET  username='$username',password='$password',nama_petugas='$nama_petugas',level='$level'WHERE id_petugas=$id_petugas");
		
		echo "<script>alert('Berhasil Mengubah Data!')</script>";
		echo "<meta http-equiv='refresh' content='0;url=data_petugas.php'>";
	}
?>