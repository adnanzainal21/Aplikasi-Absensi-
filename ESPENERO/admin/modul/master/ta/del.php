<?php 
$del = mysqli_query($con,"DELETE FROM tb_thajaran WHERE id_thajaran=$_GET[id]");
if ($del) {
		echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=master&act=ta';
		</script>";	
}

 ?>