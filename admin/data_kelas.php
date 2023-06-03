<?php  
	include "menu_bar.php";
?>
<?php
 include "../koneksi.php"; 
 ?>
 
<div class="container mt-3">
	<div class="row">
		<h1>Data Kelas</h1>
		<a href="kelas_tambah.php" class="btn btn-success btn-block">Tambah</a>
		<table class="table">
			<thead class="thead-light">
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama Kelas</th>
					<th scope="col">Kompetensi Keahlian</th>
					<th scope="col">Tools</th>
				</tr>
			</thead>
			<tbody>
<?php
	$sql	= "SELECT * FROM kelas";
	$query  = mysqli_query($koneksi, $sql);
	$no=1;
	while ($data = mysqli_fetch_array($query)){
?>
	<tr class="odd gradeX">
		<td><?php echo $no; ?></td>
		<td><?php echo $data['nama_kelas']; ?></td>
		<td><?php echo $data['kompetensi_keahlian']; ?></td>
		<td><a href="kelas_edit.php?id_kelas=<?php echo $data['id_kelas']; ?>" class="btn btn-warning">Edit</a>
		<a href="kelas_hapus.php?id_kelas=<?php echo $data['id_kelas']; ?>" class="btn btn-danger">Hapus</a>

<?php  
$no++;
	}
?>
			</tbody>
		</table>
	</div>
</div>