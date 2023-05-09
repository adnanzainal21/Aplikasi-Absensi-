<?php 
$del = mysqli_query($con,"DELETE FROM tb_mkelas WHERE id_mkelas=$_GET[id]");
if ($del) {
		echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=master&act=kelas';
		</script>";	
}

 ?>