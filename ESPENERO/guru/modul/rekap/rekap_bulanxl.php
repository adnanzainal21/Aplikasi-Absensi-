<?php 
include '../../../config/db.php';
$time = time();
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=REKAP_ABSEN-$time.xls");?>

 ?>

<?php 
$bulan = $_GET['bulan'];
// tampilkan data mengajar
$kelasMengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 
	INNER JOIN tb_guru ON tb_mengajar.id_guru=tb_guru.id_guru

INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
WHERE tb_mengajar.id_mengajar='$_GET[pelajaran]'  AND tb_thajaran.status=1  ");

foreach ($kelasMengajar as $d) 




	// tampilkan data absen

	$qry = mysqli_query($con,"SELECT * FROM _logabsensi INNER JOIN tb_siswa ON _logabsensi.id_siswa=tb_siswa.id_siswa
		WHERE MONTH(tgl_absen)='$bulan'
	 GROUP BY _logabsensi.id_siswa  ORDER BY _logabsensi.id_siswa ASC ");
foreach ($qry as $db)

	// tampilkan data walikelas
$walikelas = mysqli_query($con,"SELECT * FROM tb_walikelas INNER JOIN tb_guru ON tb_walikelas.id_guru=tb_guru.id_guru WHERE tb_walikelas.id_mkelas='$d[id_mkelas]' ");
foreach ($walikelas as $walas) 

$tglBulan = $db['tgl_absen'];
$tglTerakhir = date('t',strtotime($tglBulan));


 ?>
 <style>
 	body{
 		font-family: arial;
 	}
 </style>
 <table width="100%">
 	<tr>
 		<td>
 			<center>
 				
 				<h1>
 					ABSESNSI SISWA <br>
 					<small> MTs NEGERI 1 AGAM</small>
 				</h1>
 				<hr>
 				<em>
 					Jl.Bukit Bunian Jorong Bukareh Kenagarian Koto Tangah Kecamatan Tilatang,<br> Kamang Kabupaten Agam, Provinsi Sumatera Barat, Kode Pos (26152) <br>
 				<b>Email : mtsnbukitbunianbukareh@yahoo.com Telp.081266005679</b> 
 				</em>
 	
 			</center>
 		</td>
 		<td>

 			<table width="100%">
  <tr>
    <td colspan="2"><b style="border: 2px solid;padding: 7px;">
    	KELAS ( <?=strtoupper($d['nama_kelas']) ?> )
    </b> </td>
    <td>
    	<b style="border: 2px solid;padding: 7px;">
    		<?=$d['semester'] ?> |
      <?=$d['tahun_ajaran'] ?>
  </b>
  </td>
    <td rowspan="5"><p>H= Hadir</p>
    <p>I = Izin</p>
    <p>S = Sakit</p>
    <p>A = Absesn    </p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Nama Guru </td>
    <td>:</td>
    <td><?=$d['nama_guru'] ?></td>
  </tr>
  <tr>
    <td>Bidang Studi </td>
    <td>:</td>
    <td><?=$d['mapel'] ?></td>
  </tr>
  <tr>
    <td>Wali Kelas </td>
    <td>:</td>
    <td><?=$walas['nama_guru'] ?></td>
  </tr>
</table>
 		</td>
 	</tr>
 </table>

<hr style="height: 3px;border: 1px solid;">


<table width="100%" border="1" cellpadding="2" style="border-collapse: collapse;">
  <tr>
    <td rowspan="2" bgcolor="#EFEBE9" align="center">NO</td>
    <td rowspan="2" bgcolor="#EFEBE9">NAMA SISWA</td>
    <td rowspan="2" bgcolor="#EFEBE9" align="center">L/P</td>
    <td colspan="<?=$tglTerakhir;?>" style="padding: 8px;">PERTEMUAN KE- DAN BULAN : <b style="text-transform: uppercase;"><?php echo namaBulan($bulan);?> <?= date('Y',strtotime($tglBulan)); ?></b></td>
    <td colspan="3" align="center" bgcolor="#EFEBE9">JUMLAH</td>
  </tr>
  <tr>
	<?php 
	for ($i = 1; $i <=$tglTerakhir ; $i++) {
	echo "<td bgcolor='#EFEBE9' align='center'>".$i."</td>";
	}


	?> 
	<td bgcolor="#FFC107" align="center">S</td>
	<td bgcolor="#4CAF50" align="center">I</td>
	<td bgcolor="#D50000" align="center">A</td>
 
  </tr>
  	<?php 
			// tampilkan absen siswa
			$no=1;
			foreach ($qry as $d) {
				 $warna = ($no % 2 == 1) ? "#ffffff" : "#f0f0f0";

				?>
			<tr>

  <tr bgcolor="<?=$warna; ?>">
    <td align="center"><?=$no++; ?></td>
    <td><?=$d['nama_siswa'];?></td>
    <td align="center"><?=$d['jk'];?></td>
		<?php 
		for ($i = 1; $i <=$tglTerakhir ; $i++) {


		?>
		<td align="center" bgcolor="white">
		<?php 
					$ket = mysqli_query($con,"SELECT * FROM _logabsensi WHERE DAY(tgl_absen)='$i' AND id_siswa='$d[id_siswa]' AND id_mengajar='$_GET[pelajaran]' AND MONTH(tgl_absen)='$bulan' GROUP BY DAY(tgl_absen) ");
		foreach ($ket as $h)
			
			// echo $h['ket'];
			if ($h['ket']=='H') {
				echo "<b style='color:#2196F3;'>H</b>";				
			}elseif ($h['ket']=='I') {
				echo "<b style='color:#4CAF50;'>I</b>";
			}elseif ($h['ket']=='S') {
				echo "<b style='color:#FFC107;'>S</b>";
			}elseif($h['ket']=='A'){
				echo "<b style='color:#D50000;'>A</b>";
			}else{
				echo "<b style='color:#D50000;'>L</b>";
			}
			
		

		 ?>
</td>
		
		<?php


		}

		?>
<td align="center" style="font-weight: bold;">
<?php 
$sakit = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ket) AS sakit FROM _logabsensi WHERE id_siswa='$d[id_siswa]' and ket='S' and MONTH(tgl_absen)='$bulan' and id_mengajar='$_GET[pelajaran]' "));
echo $sakit['sakit'];

?>
</td>
<td align="center" style="font-weight: bold;">
<?php 
$izin = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ket) AS izin FROM _logabsensi WHERE id_siswa='$d[id_siswa]' and ket='I' and MONTH(tgl_absen)='$bulan' and id_mengajar='$_GET[pelajaran]' "));
echo $izin['izin'];

?>
</td align="center" style="font-weight: bold;">
<td align="center" style="font-weight: bold;">
	<?php 
$alfa = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ket) AS alfa FROM _logabsensi WHERE id_siswa='$d[id_siswa]' and ket='A' and MONTH(tgl_absen)='$bulan' and id_mengajar='$_GET[pelajaran]' "));
echo $alfa['alfa'];

?>
</td>
   
  </tr>
<?php } ?>
</table>

<p></p>
<table width="100%">
	<tr>
	<!-- 	<td align="left">
			<p>
				Mengetahui
			</p>
			<p>
				Kepala Sekolah
				<br>
				<br>
				<br>
				<br>
				<br>
				-----------------------------
			</p>
		</td> -->
		<td align="right">
			<p>
				Agam, <?php echo date('d-F-Y'); ?>
			</p>
			<p>
				Kepala Sekolah
				<br>
				<br>
				<br>
				<br>
				<br>
				NURMIZA,MA <br>
				----------------------<br>
				NIP.197411092002102003
			</p>
		</td>
	</tr>
</table>

