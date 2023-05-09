<?php 
$del = mysqli_query($con,"DELETE FROM tb_mengajar WHERE id_mengajar='$_GET[id]' ");
if ($del) {
		echo " <script>
		window.location='?page=jadwal';
		</script>";	
}

 ?>