	<?php 

$edit = mysqli_query($con,"SELECT * FROM tb_siswa WHERE id_siswa='$_GET[id]' ");
foreach ($edit as $d)?>
<div class="page-inner">
          <div class="page-header">
            <h4 class="page-title">Siswa</h4>
            <ul class="breadcrumbs">
              <li class="nav-home">
                <a href="#">
                  <i class="flaticon-home"></i>
                </a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#">Data Siswa</a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#">Edit Siswa</a>
              </li>
            </ul>
          </div>
          <div class="row">
                <div class="col-lg-8">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Form Edit Siswa</h3>
                    </div>
                    <div class="card-body">

								
	<form action="?page=siswa&act=proses" method="post" enctype="multipart/form-data">
		<input name="id" type="hidden" value="<?=$d['id_siswa'] ?>">	

<table cellpadding="3" style="font-weight: bold;">
  <tr>
    <td>Nama Peserta Didik </td>
    <td>:</td>
    <td><input type="text" class="form-control" name="nama" value="<?=$d['nama_siswa'] ?>"></td>
  </tr>
  <tr>
    <td>NIS/NISN</td>
    <td>:</td>
    <td><input name="nis" type="text" class="form-control" value="<?=$d['nis'] ?>" readonly>	</td>
  </tr>
  <tr>
    <td>Tempat,Tanggal Lahir </td>
    <td>:</td>
    <td><input type="text" class="form-control" name="tempat" value="<?=$d['tempat_lahir'] ?>"></td>
    <td>/</td>
    <td><input type="date" class="form-control" name="tgl" value="<?=$d['tgl_lahir'] ?>"></td>
  </tr>
  <tr>
    <td>Jenis Kelamin </td>
    <td>:</td>
    <td>
    	<select name="jk" class="form-control">
    		<option value="L">Laki-laki</option>
    		<option value="P">Perempuan</option>
    	</select>
    </td>
  </tr>


  <tr>
    <td>Alamat Peserta Didik </td>
    <td>:</td>
    <td><textarea name="alamat" class="form-control"><?=$d['alamat'] ?></textarea></td>
  </tr>

 
  <tr>
    <td>Kelas Siswa</td>
    <td>:</td>
	<td>
    <select class="form-control" name="kelas">
    <option>Pilih Kelas</option>
    <?php
    $sqlKelas=mysqli_query($con, "SELECT * FROM tb_Mkelas
    ORDER BY id_mkelas ASC");
    while($kelas=mysqli_fetch_array($sqlKelas)){

    	if ($kelas['id_mkelas']==$d['id_mkelas']) {
    		$selected= "selected";
    		
    	}else{
    		$selected='';
    	}
    echo "<option value='$kelas[id_mkelas]' $selected>$kelas[nama_kelas]</option>";
    }
    ?>
    </select>
	</td>
  </tr>

   <tr>
    <td>Tahun Masuk</td>
    <td>:</td>
    <td><input name="th_masuk" type="number" class="form-control" value="<?=$d['th_angkatan'] ?>"></td>
  </tr>
  <tr>
    <td>Pas Foto</td>
    <td>:</td>
    <td><input type="file" class="form-control" name="foto"></td>
  </tr>
  <tr>
    <td colspan="3">
		<button name="editSiswa" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
		<a href="javascript:history.back()" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Batal</a>
    </td>
  </tr>
</table>
</form>							

			
					

</div>
</div>
</div>
</div>
</div>

