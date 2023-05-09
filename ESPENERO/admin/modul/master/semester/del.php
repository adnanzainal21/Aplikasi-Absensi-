<?php 
$del = mysqli_query($con,"DELETE FROM tb_semester WHERE id_semester=$_GET[id]");
if ($del) {
		echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=master&act=semester';
		</script>";	
}

 ?>