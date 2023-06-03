<?php 

session_start();

include 'koneksi.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

if($level == 'siswa'){
	$siswa = mysqli_query($koneksi,"select * from siswa where username='$username' and password='$password'");
	$row = mysqli_num_rows($siswa);
	 if (mysqli_fetch_assoc($siswa)) {
	 	$_SESSION['username'] = $username;
		$_SESSION['level'] = "siswa";
	 	echo "<script>alert('Berhasil Login Sebagai Siswa')</script>";
		echo "<meta http-equiv='refresh' content='0;url=siswa/laporan.php'>";
	 
	 }else{
	 	echo "gagal";
	 }
	

}else if($level== 'admin' || $level== 'petugas'){
	$login = mysqli_query($koneksi,"select * from petugas where username='$username' and password='$password'");
	$cek = mysqli_num_rows($login);
	 
	if($cek > 0){
	 
		$data = mysqli_fetch_assoc($login);
	 
		if($data['level']=="admin"){
	 

			$_SESSION['username'] = $username;
			$_SESSION['level'] = "admin";

			echo "<script>alert('Berhasil Login Sebagai Admin')</script>";
		echo "<meta http-equiv='refresh' content='0;url=admin/admin.php'>";
	 
		}else if($data['level']=="petugas"){

			$_SESSION['username'] = $username;
			$_SESSION['level'] = "petugas";

			echo "<script>alert('Berhasil Login Sebagai Petugas')</script>";
		echo "<meta http-equiv='refresh' content='0;url=petugas/data_siswa.php'>";
	 
		}else{
	 
			header("location:index.php?pesan=gagal");
		}	
	}else{
		header("location:index.php?pesan=gagal");
	}
}


 
?>