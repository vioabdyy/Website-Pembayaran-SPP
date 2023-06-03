<?php  
	include "menu_bar.php";
?>
<?php
 include "../koneksi.php"; 
 ?>
<div class="container mt-3">
	<div class="row">
		<h1 class="text-info">Data Siswa</h1>
		
		<table class="table">
			<thead class="thead bg-info">
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
					
				</tr>
			</thead>
			<tbody class="bg-warning">
<?php
	$sql	= "SELECT * FROM siswa,kelas,spp where siswa.id_kelas = kelas.id_kelas AND siswa.id_spp = spp.id_spp ";
	$query  = mysqli_query($koneksi, $sql);
	$no=1;
	while ($data = mysqli_fetch_array($query)){
?>
	<tr class="odd gradeX">
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
		
<?php
$no++;  
	}
?>
			</tbody>
		</table>
	</div>
</div>