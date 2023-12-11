<h2 style="text-align: center;">Laporan Layanan Pengaduan Mahasiswa</h2>
<table border="2" style="width: 100%; height: 10%;">
	<tr style="text-align: center;">
		<td>No</td>
		<td>NIM Pelapor</td>
		<td>Nama Pelapor</td>
		<td>Nama dosen</td>
		<td>Tanggal Masuk</td>
		<td>Tanggal Ditanggapi</td>
		<td>Status</td>
	</tr>
	<?php
	include '../conn/koneksi.php';
	$no = 1;
	$query = mysqli_query($koneksi, "SELECT * FROM pengaduan INNER JOIN mahasiswa ON pengaduan.nim=mahasiswa.nim INNER JOIN tanggapan ON tanggapan.id_pengaduan=pengaduan.id_pengaduan INNER JOIN dosen ON tanggapan.id_dosen=dosen.id_dosen ORDER BY tgl_pengaduan DESC");
	while ($r = mysqli_fetch_assoc($query)) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $r['nim']; ?></td>
			<td><?php echo $r['nama']; ?></td>
			<td><?php echo $r['nama_dosen']; ?></td>
			<td><?php echo $r['tgl_pengaduan']; ?></td>
			<td><?php echo $r['tgl_tanggapan']; ?></td>
			<td><?php echo $r['status']; ?></td>
		</tr>
	<?php	}
	?>
</table>
<script type="text/javascript">
	window.print();
</script>