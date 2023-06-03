<?php

	$db_host	=	"localhost";
	$db_user	=	"root";
	$db_pass	=	"";
	$db_nama	=	"db_abdi";

	$koneksi		=	mysqli_connect($db_host, $db_user, $db_pass, $db_nama);
	if (mysqli_connect_error()) {
		echo "Koneksi ke database gagal!";
	} else {
		//echo "berhasil";
	}

?>