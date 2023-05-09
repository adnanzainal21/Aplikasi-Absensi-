<?php 
$del = mysqli_query($con,"DELETE FROM tb_siswa WHERE id_siswa=$_GET[id]");
if ($del) {
		echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=siswa';
		</script>";	
}

 ?>