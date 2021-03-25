<?php
	include ("../koneksi/koneksi.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>nilaionline.com || Tambah Data Mahasiswa</title>
</head>
<body>
	<div align="center">
		<h3>TAMBAH DATA MAHASISWA</h3>
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
							<td width="69%"><input type="text" name="nim" size="30" placeholder="NIM"></td>
						</tr>
						<tr>
							<td>NAMA</td>
							<td>:</td>
							<td><input type="text" name="nama" size="30" placeholder="NAMA"></td>
						</tr>
						<tr>
							<td>JENIS KELAMIN</td>
							<td>:</td>
							<td>
								<label>
									<input type="radio" name="jk" value="Laki-laki">Laki-laki
								</label>
								<label>
									<input type="radio" name="jk" value="Perempuan">Perempuan
								</label>
							</td>
						</tr>
						<tr>
							<td height="50">JURUSAN</td>
							<td>:</td>
							<td>
								<label>
									<select name="jurusan">
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
							<td><input type="password" name="password" size="30" placeholder="PASSWORD"></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><br>
								<input type="submit" name="submit" id="submit" value="TAMBAH"></td>
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

				// input Data Mahasiswa
				$insertMhs	= "INSERT INTO mahasiswa VALUES ('$nim','$nama','$jk','$jurusan','$password')";
				echo $insertMhs;
				$queryMhs	= mysqli_query($koneksi, $insertMhs);
					if ($queryMhs) {
						echo "<script>alert('Data Mahasiswa Berhasil Disimpan!')</script>";
						echo "<script>window.location = 'mahasiswaView.php'</script>";
					} else {
						echo "<script>alert('Data Mahasiswa Gagal Disimpan!')</script>";
						echo "<script>window.location = 'mahasiswaView.php'</script>";
					}
					
			}
		?>
		</p>
	</div>
	<a href="mahasiswaView.php">&raquo;KEMBALI</a>
</body>
</html>