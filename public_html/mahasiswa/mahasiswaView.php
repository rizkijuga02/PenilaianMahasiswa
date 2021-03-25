<?php
	include ("../koneksi/koneksi.php");

	$queryMhs	= "SELECT * FROM mahasiswa";
	$resultMhs	= mysqli_query($koneksi, $queryMhs);
	$countMhs	= mysqli_num_rows($resultMhs);
?>

<!DOCTYPE html>
<html>
<head>
	<title>nilaionline.com || Data Mahasiswa</title>
</head>
<body>
	<div align="center">
	<h3>DATA MAHASISWA</h3>
	<hr><br>
	<a href="mahasiswaAdd.php"><input type="submit" name="add" class="buttonadm" value="TAMBAH DATA MAHASISWA"></a><br><br>
	<table border="1">
		<!-- Table Master Mahasiswa -->
		<tr>
			<th>NIM</th>
			<th>NAMA</th>
			<th>JENIS KELAMIN</th>
			<th>JURUSAN</th>
			<th>PASSWORD</th>
			<th>AKSI</th>
		</tr>
		<?php
			if ($countMhs>0) {
				while ($dataMhs = mysqli_fetch_array($resultMhs)) {
					?>
					<tr class="add">
						<td class="value"><?php echo "$dataMhs[0]";?></td>
						<td class="value"><?php echo "$dataMhs[1]";?></td>
						<td class="value"><?php echo "$dataMhs[2]";?></td>
						<td class="value"><?php echo "$dataMhs[3]";?></td>
						<td class="value"><?php echo "$dataMhs[4]";?></td>
						<td class="value">
							<a href="mahasiswaEdit.php?NIM=<?php echo "$dataMhs[0]";?>">Edit</a>
							<a href="mahasiswaDelete.php?NIM=<?php echo "$dataMhs[0]";?>">Delete</a>
						</td>				
					</tr>
					<?php
				}
			} else {
				echo "<tr>
						<td colspan='9' align='center' height='20'>
						<div>Belum Ada Data Mahasiswa</div></td>
					</tr>";
			}
		echo "</table>";
		?>
	</div>
</body>
</html>