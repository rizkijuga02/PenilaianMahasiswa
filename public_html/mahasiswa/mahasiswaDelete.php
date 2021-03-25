<?php
	include ("../koneksi/koneksi.php");

	$getNim	= $_GET["NIM"];
	$delMhs	= "DELETE FROM mahasiswa WHERE NIM = '$getNim'";
	$resultMhs	= mysqli_query($koneksi,$delMhs);

	if ($resultMhs) {
		echo "<script>alert('Data Berhasil Dihapus!')</script>";
		echo "<script>window.location = 'mahasiswaView.php'</script>";
	} else {
		echo "<script>alert('Data Gagal Dihapus!')</script>";
		echo "<script>window.location = 'mahasiswaView.php'</script>";
	}
	
?>