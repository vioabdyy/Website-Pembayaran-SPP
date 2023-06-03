<?php include 'menu_bar.php'; ?>
<?php include '../koneksi.php'; ?>

<h4 class="text-center font-weight-bold m-4"><i>History</i></h4>
<div class="container">
	<form action="" method="GET">
	 	<table class="table table-borderless">
	 		<tr>
	 			<td> Masukkan NIS</td>
	 			<td>:</td>
	 			<td>
	 				<input class="form-control" type="text" name="nis">
	 			</td>
	 			<td>
	 				<button class="btn btn-success" type="submit" name="cari">Cari</button>
	 			</td>
	 		</tr>
	 	</table>
	 </form>

<?php 
if (isset($_GET['nis']) && $_GET['nis'] != ''){
	$data = $koneksi->query("SELECT * FROM siswa,kelas,spp WHERE siswa.id_kelas = kelas.id_kelas AND siswa.id_spp = spp.id_spp AND nis = '$_GET[nis]'");
	$dta = mysqli_fetch_assoc($data);
	$nis = $dta['nis'];

?>
	<div class="panel panel-info">
		<div class="panel-heading">
	<h4 class="text-center font-weight-bold m-4"><i>Biodata Siswa</i></h4>
		</div>
	<div class="panel panel-body">
		<table class="table table-bordered table-striped">
			<tr>
				<td>NIS</td>
				<td><?= $dta['nis'] ?></td>
			</tr>
			<tr>
				<td>Nama Siswa</td>
				<td><?= $dta['nama'] ?></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td><?= $dta['nama_kelas'] ?></td>
			</tr>
			<tr>
				<td>Tahun Ajaran</td>
				<td><?= $dta['tahun'] ?></td>
			</tr>
		</table>
	</div>
	</div>
	<table class="table table-borderless">
				  <thead>
				    <tr class="table-primary">
				      <th scope="col">No</th>
				      <th scope="col">Bulan</th>
				      <th scope="col">Jatuh Tempo</th>
				      <th scope="col">Tanggal Bayar</th>
				      <th scope="col">Nominal</th>
				      <th scope="col">Keterangan</th>
				      <th scope="col">Bayar</th>
				    </tr>
				  </thead>
				  <tbody>
			<?php
				$sql	= "SELECT * FROM pembayaran,spp WHERE nisn = '$dta[nisn]' AND pembayaran.id_spp = spp.id_spp ORDER BY jatuhtempo";
				$query  = mysqli_query($koneksi, $sql);
				$no=1;
				while ($data = mysqli_fetch_array($query)){
			?>
				<tr class="odd gradeX">
					<td><?php echo $no; ?></td>
					<td><?php echo $data['bulan']; ?></td>
					<td><?php echo $data['jatuhtempo']; ?></td>
					<td><?php echo $data['tgl_bayar']; ?></td>
					<td><?php echo $data['nominal']; ?></td>
					<td><?php echo $data['ket']; ?></td>
					<td>
						<form action="transaksi.php" method="POST">
				<input type="hidden" name="id_pembayaran" value="<?php echo $data['id_pembayaran']; ?>">
				<input type="hidden" name="tgl_bayar" value="<?php echo date('Y-m-d'); ?>">
				<input type="hidden" name="ket" value="Lunas">
					<?php 
						if ($data['ket'] == '') {
							echo "<input type='submit' name='submit' class='btn btn-primary' value='Bayar' /> ";
						}else{
							echo "<input type='submit' name='update' class='btn btn-danger' value='Batal' /> ";
							echo "<a class='btn btn-success' href='cetak_transaksi.php?nis=$nis&id=$data[id_pembayaran]' >Cetak</a> ";
						}

					?>
					</form>
					</td>
				</tr>
					<?php
				$no++; 
				}
			 ?>
				  </tbody>
	</table>
</div>
<?php 
	}
 ?>

 <?php
	
	if(isset($_POST['submit'])) {

		$id_pembayaran 	= $_POST['id_pembayaran'];
		$tgl_bayar 		= $_POST['tgl_bayar'];
		$ket 			= $_POST['ket'];

		
		$result = mysqli_query($koneksi, "UPDATE pembayaran SET tgl_bayar='$tgl_bayar',ket='$ket' WHERE id_pembayaran=$id_pembayaran");
		
		echo "<meta http-equiv='refresh' content='0;url=transaksi.php'>";
	}
?>
 <?php
	
	if(isset($_POST['update'])) {

		$id_pembayaran 	= $_POST['id_pembayaran'];
		
		$result = mysqli_query($koneksi, "UPDATE pembayaran SET 
			tgl_bayar = null,
			ket= null 
			WHERE id_pembayaran=$id_pembayaran");
		
		echo "<meta http-equiv='refresh' content='0;url=transaksi.php'>";
	}
?>