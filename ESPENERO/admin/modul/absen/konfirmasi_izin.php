

<?php 
if ($_GET['persetujuan']=='Yes') {
	$setuju = mysqli_query($con,"UPDATE tb_izin SET ket_izin='1',persetujuan='Disetujui' WHERE id_izin='$_GET[id]' ");
	if ($setuju) {
		
		echo "
		<script type='text/javascript'>
		setTimeout(function () { 

		swal('OK', 'Permintaan telah di konfirmasi', {
		icon : 'success',
		buttons: {        			
		confirm: {
		className : 'btn btn-success'
		}
		},
		});    
		},10);  
		window.setTimeout(function(){ 
		window.location.replace('?page=absen&pelajaran=$_GET[pelajaran]');
		} ,3000);   
		</script>";
	}

}else{
	$tdaksetuju = mysqli_query($con,"UPDATE tb_izin SET persetujuan='Ditolak' WHERE id_izin='$_GET[id]' ");

		echo "
		<script type='text/javascript'>
		setTimeout(function () { 

		swal('OK', 'Permintaan Ditolak', {
		icon : 'success',
		buttons: {        			
		confirm: {
		className : 'btn btn-success'
		}
		},
		});    
		},10);  
		window.setTimeout(function(){ 
		window.location.replace('?page=absen&pelajaran=$_GET[pelajaran]');
		} ,3000);   
		</script>";
}

 ?>
