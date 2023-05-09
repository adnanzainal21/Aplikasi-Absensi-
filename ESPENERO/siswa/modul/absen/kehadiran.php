
<div class="card">
	<div class="card-body">

		<h4 class="card-title">Kehadiran | <b style="text-transform: uppercase;"><code> <?=$data['nama_siswa'] ?> </code></b></h4>
		<hr>
		<div class="row">
			<?php 
			// tampilkan data absen setiap bulan, berdasarkan tahun ajaran yg aktif
			$qry = mysqli_query($con,"SELECT * FROM _logabsensi
				INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
				INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
				INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
				WHERE _logabsensi.id_siswa='$data[id_siswa]' and tb_thajaran.status=1 and tb_semester.status=1
				GROUP BY MONTH(tgl_absen) ORDER BY MONTH(tgl_absen) DESC
			 ");

			// foreach ($qry as $bulan) {
			// 	echo date('m',strtotime($bulan['tgl_absen']));
			// }


			 foreach ($qry as $bulan) { ?>
			 	<?php 
			 	$bulan = date('m',strtotime($bulan['tgl_absen']));


			 	 ?>


			 	<div class="col-xl-12">
				<div class="card text-left">
					<div class="card-body">
						<!-- Senin, 10-01-2019 <b>Hadir</b> -->
						<b class="text-primary" style="text-transform: uppercase;">BULAN <?=namaBulan($bulan); ?> <?= date('Y') ?></b>
									<!-- <hr> -->
						<table cellpadding="5" width="100%">
							<tr>
								<td>Hadir</td>
								<td>:</td>
								<td>
									<?php 
								$hadir = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ket) AS hadir FROM _logabsensi WHERE id_siswa='$data[id_siswa]' and ket='H' and MONTH(tgl_absen)='$bulan' "));
								echo $hadir['hadir'];
								?>
								</td>
							</tr>
							<tr>
								<td>Sakit</td>
								<td>:</td>
								<td>
								<?php 
								$sakit = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ket) AS sakit FROM _logabsensi WHERE id_siswa='$data[id_siswa]' and ket='S' and MONTH(tgl_absen)='$bulan' "));
								echo $sakit['sakit'];
								?>
								</td>
							</tr>
							<tr>
								<td>Izin</td>
								<td>:</td>
								<td>
									<?php 
								$izin = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ket) AS izin FROM _logabsensi WHERE id_siswa='$data[id_siswa]' and ket='I' and MONTH(tgl_absen)='$bulan' "));
								echo $izin['izin'];
								?>
								</td>
							</tr>
							<tr>
								<td>Absen</td>
								<td>:</td>
								<td>
									<?php 
								$alfa = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ket) AS alfa FROM _logabsensi WHERE id_siswa='$data[id_siswa]' and ket='A' and MONTH(tgl_absen)='$bulan' "));
								echo $alfa['alfa'];
								?>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>




			 <?php } ?>


			








	

		</div>
	</div>
</div>

	<a href="javascript:history.back()" class="btn btn-default btn-block"><i class="fas fa-arrow-circle-left"></i> Kembali</a>