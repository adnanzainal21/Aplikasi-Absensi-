<?php 
$del = mysqli_query($con,"DELETE FROM tb_master_mapel WHERE id_mapel=$_GET[id]");
if ($del) {
		echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=master&act=mapel';
		</script>";	
}

 ?>