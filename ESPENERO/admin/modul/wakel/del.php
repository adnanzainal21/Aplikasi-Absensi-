<?php 
$del = mysqli_query($con,"DELETE FROM tb_walikelas WHERE id_walikelas=$_GET[id]");
if ($del) {
		echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=master&act=wakel';
		</script>";	
}

 ?>