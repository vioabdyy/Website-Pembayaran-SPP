<?php  
	include "menu_bar.php";
?>
<?php
 include "../koneksi.php"; 
 ?>
 <body>
 	<link href="style.css" rel="stylesheet">
<div class="container mt-3">
	<div class="row">
		<h1>Data Petugas</h1>
		<a href="petugas_tambah.php" class="btn btn-primary btn-block">Tambah</a>
		<table class="table">
			<thead class="thead-light">
				<tr>
					<th scope="col">No</th>
					<th scope="col">Username</th>
					<th scope="col">Password</th>
					<th scope="col">Nama Petugas</th>
					<th scope="col">Level</th>
					<th scope="col">Tools</th>
				</tr>
			</thead>
			<tbody>
<?php
	$sql	= "SELECT * FROM petugas";
	$query  = mysqli_query($koneksi, $sql);
	$no=1;
	while ($data = mysqli_fetch_array($query)){
?>
	<tr class="odd gradeX">
		<td><?php echo $no; ?></td>
		<td><?php echo $data['username']; ?></td>
		<td><?php echo $data['password']; ?></td>
		<td><?php echo $data['nama_petugas']; ?></td>
		<td><?php echo $data['level']; ?></td>
		<td><a href="petugas_edit.php?id_petugas=<?php echo $data['id_petugas']; ?>" class="btn btn-warning">Edit</a>
		<a href="petugas_hapus.php?id_petugas=<?php echo $data['id_petugas']; ?>" class="btn btn-danger">Hapus</a>

<?php  
$no++;
	}
?>
</body>
			</tbody>
		</table>
	</div>
</div>