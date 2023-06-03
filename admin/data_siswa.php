<?php  
	include "menu_bar.php";
?>
<?php
 include "../koneksi.php"; 
 ?>

 <link href="style.css" rel="stylesheet">
 <body>
<div class="container-fluid mt-5">
	<div class="row">
		<div class="col-lg-12">
		<h2 class="tulisan_tengah ">Data Siswa</h2>
		<br>
		</div>
		<table style="margin: auto; margin-top: 30px">
			<a href="siswa_tambah.php" class="btn btn-info  " style="margin: auto; width:70% ;">Tambah</a>
			<thead>
				
				<tr>
					<th scope="col">No</th>
					<th scope="col">NISN</th>
					<th scope="col">NIS</th>
					<th scope="col">Username</th>
					<th scope="col">Nama</th>
					<th scope="col">Password</th>
					<th scope="col">Kelas</th>
					<th scope="col">Alamat</th>
					<th scope="col">No Telepon</th>
					<th scope="col">Nominal</th>
					<th align="center" scope="col">Tools</th>
				</tr>
			</thead>
<tbody>
<?php
	$sql	= "SELECT * FROM siswa,kelas,spp where siswa.id_kelas = kelas.id_kelas AND siswa.id_spp = spp.id_spp ";
	$query  = mysqli_query($koneksi, $sql);
	$no=1;
	while ($data = mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $data['nisn']; ?></td>
		<td><?php echo $data['nis']; ?></td>
		<td><?php echo $data['username']; ?></td>
		<td><?php echo $data['nama']; ?></td>
		<td><?php echo $data['password']; ?></td>

		<td><?php echo $data['nama_kelas']; ?></td>
		<td><?php echo $data['alamat']; ?></td>
		<td><?php echo $data['no_telp']; ?></td>
		<td><?php echo $data['nominal']; ?></td>
		<td><a href="siswa_edit.php?nisn=<?php echo $data['nisn']; ?>" class="btn btn-warning">Edit</a>
		<a href="siswa_hapus.php?nisn=<?php echo $data['nisn']; ?>" class="btn btn-danger">Hapus</a>
</td>
</tr>
<?php
$no++;  
	}
?>
</body>
			</tbody>
		</table>
	</div>
</div>