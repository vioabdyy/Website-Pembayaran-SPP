<?php  
	include "menu_bar.php";
?>
<?php  
	include "../koneksi.php";
?>
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <div class="kotak_data">
		<p class="tulisan_data">Edit Kelas</p>
<?php 
	$id_kelas = $_GET['id_kelas'];
	$row = mysqli_query($koneksi,"select * from kelas where id_kelas='$id_kelas'");
	while ($data = mysqli_fetch_array($row)) {
 ?>
 

 
		<form method="POST"  action="kelas_edit.php?id_kelas=<?php echo $id_kelas; ?>">
			<input type="hidden" name="id_kelas" class="form-control" value="<?php echo $data['id_kelas']; ?>">
			<label>Nama Kelas</label>
			<input type="text" name="nama_kelas" class="form-control" value="<?php echo $data['nama_kelas']; ?>">
 
			<label>Kompetensi Keahlian</label>
			<input type="text" name="kompetensi_keahlian" class="form-control" value="<?php echo $data['kompetensi_keahlian']; ?>">

 
      
     <input type="submit" class="btn btn-success" value="Update" name="update">

    	<a class="btn btn-info" href="data_kelas.php">Kembali</a>
    <?php 
        }
      ?>        



<?php
	if(isset($_POST['update']))
	{
		$id_kelas = $_POST['id_kelas'];	
		$nama_kelas=$_POST['nama_kelas'];
		$kompetensi_keahlian=$_POST['kompetensi_keahlian'];
			
		$result = mysqli_query($koneksi, "UPDATE kelas SET nama_kelas='$nama_kelas',kompetensi_keahlian='$kompetensi_keahlian'WHERE id_kelas=$id_kelas");

			echo "<script>alert('Berhasil Mengubah Data!')</script>";
		echo "<meta http-equiv='refresh' content='0;url=data_kelas.php'>";
			}
?>