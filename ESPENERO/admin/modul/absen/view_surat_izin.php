<?php 
$izin = mysqli_query($con,"SELECT * FROM tb_izin
	INNER JOIN tb_siswa ON tb_izin.id_siswa=tb_siswa.id_siswa
	-- INNER JOIN tb_mengajar ON tb_izin.id_mengajar=tb_mengajar.id_mengajar
	WHERE tb_izin.id_izin='$_GET[izin]'");
foreach ($izin as $d)


 ?>



 <div class="col-md-12 mt-3">

<div class="alert alert-warning alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	
	<center>
		<div class="avatar">
		<img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded">
		</div>
		<hr>
	</center>
	
	<table cellpadding="3" class="text-warning">
		<tr>
		<td>Nama</td>
		<td>:</td>
		<td><strong> <?=$d['nama_siswa'];?> </strong></td>
		</tr>
		<tr>
			<td>Nis</td>
			<td>:</td>
			<td><?=$d['nis'];?></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td>:</td>
			<td><?=$d['jk'];?></td>
		</tr>

	</table>
	<hr>

	<table cellpadding="4">
		<tr>
			<td>Hari/Tanggal</td>
			<td>:</td>
			<td><?=namahari($d['tgl_izin']); ?>/<?= tglIndonesia($d['tgl_izin']);?></td>
		</tr>
		<tr>
			<td>Alasan/Isi Surat</td>
			<td>:</td>
			<td>
				<?php 
				echo $d['alasan_izin'];

				 ?>
			</td>
		</tr>
		<tr>
			<td>Penanggung Jawab</td>
			<td>:</td>
			<td>
				<?php 
				echo $d['pj'];

				 ?>
			</td>
		</tr>
		<tr>
			<td>Nama PJ</td>
			<td>:</td>
			<td>
				<?php 
				echo $d['nama_pj'];

				 ?>
			</td>
		</tr>
		<tr>
			<td>Kontak PJ</td>
			<td>:</td>
			<td>
				<?php 
				echo $d['hp_pj'];

				 ?>
			</td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>:</td>
			<td>
				<?php
				if ($d['ket_izin']=='0') {
					echo "<span class='badge badge-warning'> Belum disetujui !</span>";
				}else{
					echo "<span class='badge badge-success'> Telah disetujui !</span>";
				}

				 ?>
			</td>
		</tr>
		<tr>
			<td>Bukti</td>
			<td colspan="2">
			
				<a href="../assets/img/bukti_izin/<?=$d['file_bukti'];?>" target="_blank">
				<img src="../assets/img/bukti_izin/<?=$d['file_bukti'];?>" class="img-thumbnail">
				</a>
			</td>
		</tr>
	</table>

	<hr>
	<p>
		<!-- <center> -->
			<a href="?page=absen&act=konfirmasi&id=<?=$d['id_izin'];?>&persetujuan=Yes" class="btn btn-info btn-sm"><i class="fa fa-check"></i> Konfirmasi</a>

			<a target="_blank" href="https://api.whatsapp.com/send?phone=<?=$d['hp_pj'];?>&text=Permohonan Izin Ananda (<?=$d['nama_siswa']; ?>) <?php
				if ($d['ket_izin']=='0') {
					echo "Belum disetujui !";
				}else{
					echo "Telah disetujui !";
				}

				 ?> " class="btn btn-success btn-sm"><i class="fab fa-whatsapp"></i> Hubungi Pj</a>

			<a onclick="return confirm('Yakin akan menolak permohonan ?')" href="?page=absen&act=konfirmasi&id=<?=$d['id_izin'];?>&persetujuan=No" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Tolak</a>
		<!-- </center> -->
	</p>



</div>


</div>