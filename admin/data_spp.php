<?php  
	include "menu_bar.php";
?>
<?php
 include "../koneksi.php"; 
 ?>
<div class="container mt-3">
	<div class="row">
		<h1>Data SPP</h1>
		<a href="spp_tambah.php" class="btn btn-primary btn-block">Tambah</a>
		<table class="table">
			<thead class="thead-light">
				<tr>
					<th scope="col">No</th>
					<th scope="col">Tahun</th>
					<th scope="col">Nominal</th>
					<th scope="col">Tools</th>
				</tr>
			</thead>
			<tbody>
<?php
	$sql	= "SELECT * FROM spp";
	$query  = mysqli_query($koneksi, $sql);
	$no=1;
	while ($data = mysqli_fetch_array($query)){
?>
	<tr class="odd gradeX">
		<td><?php echo $no; ?></td>
		<td><?php echo $data['tahun']; ?></td>
		<td><?php echo $data['nominal']; ?></td>
		<td><a href="spp_edit.php?id_spp=<?php echo $data['id_spp']; ?>" class="btn btn-warning">Edit</a>
		<a href="spp_hapus.php?id_spp=<?php echo $data['id_spp']; ?>" class="btn btn-danger">Hapus</a>

<?php  
$no++;
	}
?>
			</tbody>
		</table>
	</div>
</div>