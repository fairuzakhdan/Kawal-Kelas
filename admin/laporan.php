        <div class="row">
        	<div class="col s12 m9">
        		<h3 class="black-text">Laporan</h3>
        	</div>
        	<div class="col s12 m3">
        		<div class="section"></div>
        		<a class="waves-effect waves-light btn blue" href="cetak.php"><i class="material-icons">print</i></a>
        	</div>
        </div>

        <table id="example" class="display responsive-table" style="width:100%">
        	<thead>
        		<tr>
        			<th>No</th>
        			<th>NIM Pelapor</th>
        			<th>Nama Pelapor</th>
        			<th>Nama Penanggap</th>
        			<th>Tanggal Masuk</th>
        			<th>Tanggal Ditanggapi</th>
        			<th>Status</th>
        			<th>Opsi</th>
        		</tr>
        	</thead>
        	<tbody>

        		<?php
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
        				<td><a class="btn blue modal-trigger" href="#laporan?id_tanggapan=<?php echo $r['id_tanggapan'] ?>">More</a></td>

        				<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
        				<!-- Modal Structure -->
        				<div id="laporan?id_tanggapan=<?php echo $r['id_tanggapan'] ?>" class="modal">
        					<div class="modal-content">
        						<h4 class="black-text">Detail</h4>
        						<div class="col s12 m6">
        							<p>NIM : <?php echo $r['nim']; ?></p>
        							<p>Dari : <?php echo $r['nama']; ?></p>
        							<p>Dosen : <?php echo $r['nama_dosen']; ?></p>
        							<p>Tanggal Masuk : <?php echo $r['tgl_pengaduan']; ?></p>
        							<p>Tanggal Ditanggapi : <?php echo $r['tgl_tanggapan']; ?></p>
        							<?php
									if ($r['foto'] == "kosong") { ?>
        								<img src="../img/noImage.png" width="100">
        							<?php	} else { ?>
        								<img width="100" src="../img/<?php echo $r['foto']; ?>">
        							<?php }
									?>
        							<br><b>Pesan</b>
        							<p><?php echo $r['isi_laporan']; ?></p>
        							<br><b>Respon</b>
        							<p><?php echo $r['tanggapan']; ?></p>
        						</div>
        					</div>
        					<div class="modal-footer col s12">
        						<a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
        					</div>
        				</div>
        				<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->

        			</tr>
        		<?php  }
				?>

        	</tbody>
        </table>