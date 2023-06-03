<?php include "../koneksi.php";  ?>
<?php  
	include "menu_bar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Laporan SPP Multistudi High School</title>
	
	<style >
		body{
			font-family: arial;
		}
		.print{
			margin-top: 10px;
		}
		@media print{
			.print{
				display: none;
			}
		}
		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<form method="get">
			<label>PILIH TANGGAL</label>
			<input type="date" name="tgl_bayar">
			<input  type="submit" class="btn btn-success" value="Cari">
		</form>
	<h3>Hasil<b><br/>LAPORAN Pembayaran SPP</b></h3>
	<br/>
	<hr/>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>Nama Siswa</th>
		<th>Tanggal Bayar</th>
		<th>Keterangan</th>
	</tr>
	<?php 
		$no = 1;

		if(isset($_GET['tgl_bayar'])){
			$tgl_bayar = $_GET['tgl_bayar'];
			$sql = mysqli_query($koneksi,"select * from pembayaran,siswa where pembayaran.nisn = siswa.nisn and tgl_bayar='$tgl_bayar'");
		
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['tgl_bayar']; ?></td>
			<td><?php echo $data['ket']; ?></td>
		</tr>
		<?php 
		}
	?>

	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p>Admin, <?= date('d/m/y') ?> <br/>
				Operator,
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
</table>


	<a  href="#" onclick="window.print();"><button class="print">CETAK</button></a>
</body>
</html>
<?php } ?>