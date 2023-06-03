<?php  
	include "menu_bar.php";
?>
<?php  
	include "../koneksi.php";
?>
 <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="style.css" rel="stylesheet">
 <div class="kotak_data">
		<p class="tulisan_data">Edit spp</p>
<?php 
	$id_spp = $_GET['id_spp'];
	$row = mysqli_query($koneksi,"SELECT * FROM spp where id_spp='$id_spp'");
	while ($data = mysqli_fetch_array($row)) {
 ?>
 

 
		<form method="POST"  action="spp_edit.php?id_spp=<?php echo $id_spp; ?>">
			<input type="hidden" name="id_spp" class="form-control" value="<?php echo $data['id_spp']; ?>">
			<label>Tahun</label>
			<input type="text" name="tahun" class="form-control" value="<?php echo $data['tahun']; ?>">
 
			<label>Nominal</label>
			<input type="text" name="nominal" class="form-control" value="<?php echo $data['nominal']; ?>">

 
      
     <input type="submit" class="btn btn-success" value="Update" name="update">

    	<a class="btn btn-info" href="data_spp.php">Kembali</a>
    <?php 
        }
      ?>        



<?php
	if(isset($_POST['update']))
	{
		$id_spp  = $_POST['id_spp'];	
		$tahun   =$_POST['tahun'];
		$nominal =$_POST['nominal'];
			
		$result = mysqli_query($koneksi, "UPDATE spp SET tahun='$tahun',nominal='$nominal'WHERE id_spp=$id_spp");

			echo "<script>alert('Berhasil Mengubah Data!')</script>";
		echo "<meta http-equiv='refresh' content='0;url=data_spp.php'>";
			}
?>