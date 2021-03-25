<?php
	include ("../koneksi/koneksi.php");
	
	$getNim 	= $_GET["NIM"];
	$editMhs	= "SELECT *FROM mahasiswa WHERE NIM = '$getNim'";
	$resultMhs	= mysqli_query($koneksi, $editMhs);
	$dataMhs	= mysqli_fetch_array($resultMhs);
?>

<!DOCTYPE html>
<html>
<head>
	<title>nilaionline.com || Edit Mahasiswa</title>
</head>
<body>
	<div align="center">
		<h3>EDIT DATA MAHASISWA</h3>
		<br><hr>
		<p>
			<?php
			if (!isset($_POST['submit'])) {
				?>
				<form enctype="multipart/form-data" method="post">
					<table width="100%" border="0">
						<tr>
							<td width="27%">NIM</td>
							<td width="4%">:</td>
							<td width="69%"><input type="text" name="nim" size="30" value="<?php echo $dataMhs[0]; ?>"></td>
						</tr>
						<tr>
							<td>NAMA</td>
							<td>:</td>
							<td><input type="text" name="nama" size="30" value="<?php echo $dataMhs[1]; ?>"></td>
						</tr>
						<tr>
							<td>JENIS KELAMIN</td>
							<td>:</td>
							<td>
								<label>
									<input type="radio" name="jk" value="Laki-laki" <?php if($dataMhs['2']=='Laki-laki') echo 'checked'?>>Laki-laki
								</label>
								<label>
									<input type="radio" name="jk" value="Perempuan" <?php if($dataMhs['2']=='Perempuan') echo 'checked'?>>Perempuan
								</label>
							</td>
						</tr>
						<tr>
							<td height="50">JURUSAN</td>
							<td>:</td>
							<td>
								<label>
									<select name="jurusan">
										<option value="<?php echo $dataMhs[3]; ?>"><?php echo $dataMhs[3]; ?></option>
										<option value="">--PILIH--</option>
										<option value="Sistem Informasi">SISTEM INFORMASI</option>
										<option value="Teknik Informatika">TEKNIK INFORMATIKA</option>
										<option value="Teknik Komputer">TEKNIK KOMPUTER</option>
									</select>
								</label><br>
							</td>
						</tr>
						<tr>
							<td>PASSWORD</td>
							<td>:</td>
							<td><input type="password" name="password" size="30" value="<?php echo $dataMhs[4]; ?>"></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><br>
								<input type="submit" name="submit" id="submit" value="UBAH"></td>
						</tr>
					</table>
				</form>
			<?php
			} else {
				$nim 		= $_POST["nim"];
				$nama 		= $_POST["nama"];
				$jk 		= $_POST["jk"];
				$jurusan 	= $_POST["jurusan"];
				$password 	= $_POST["password"];

				// Update Data Mahasiswa
				$updateMhs	= "UPDATE mahasiswa SET Nama='$nama',jenis_Kelamin='$jk',Jurusan='$jurusan',Password='$password' WHERE NIM='$nim'";
				$queryMhs	= mysqli_query($koneksi, $updateMhs);
				if ($queryMhs) {
					echo "<script>alert('Data Mahasiswa Berhasil Diubah!')</script>";
					echo "<script>window.location = 'mahasiswaView.php'</script>";
				} else {
					echo "<script>alert('Data Mahasiswa Gagal Diubah!')</script>";
					echo "<script>window.location = 'mahasiswaView.php'</script>";
				}
			}
		?>	
		</p>
	</div>
	<a href="mahasiswaView.php">&raquo;KEMBALI</a>
</body>
</html>