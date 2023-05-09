<div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Wali Kelas</h4>
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
                                <a href="#">Wali Kelas</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Daftar Wali Kelas</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                         <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</a>
                                    </div>
                                </div>
                                <div class="card-body">




                 <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kelas</th>
                            <th>Nama Wali Kelas</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        $no=1;
			$kelas = mysqli_query($con,"SELECT * FROM tb_walikelas
                INNER JOIN tb_guru ON tb_walikelas.id_guru=tb_guru.id_guru
                INNER JOIN tb_mkelas ON tb_walikelas.id_mkelas=tb_mkelas.id_mkelas

                ORDER BY tb_walikelas.id_mkelas DESC");
                        foreach ($kelas as $k) {?>
                        <tr>
                            <td><?=$no++;?>.</td>
                            
                            <td><?=$k['nama_kelas'];?></td>
                            <td><?=$k['nama_guru'];?></td>
                            <td>
                                
                            <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?=$k['id_walikelas'] ?>"><i class="far fa-edit"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delwakel&id=<?=$k['id_walikelas'] ?>"><i class="fas fa-trash"></i> Del</a>

                            <!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?=$k['id_walikelas'] ?>" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
                 <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Edit Wali Kelas</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                       <form action="" method="post" class="form-horizontal">
                        <input type="hidden" name="id" value="<?=$k['id_walikelas'] ?>">
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <select name="wakel" class="form-control">
                            <?php 
                            $wkel = mysqli_query($con,"SELECT * FROM tb_guru");
                            foreach ($wkel as $wk) {
                                if ($wk['id_guru']==$k['id_guru']) {
                                    $selected="selected";
                                }else{
                                    $selected='';
                                }
                                echo "<option value='$wk[id_guru]' $selected>$wk[nama_guru]</option>";
                            }

                             ?>
                        </select>
                    </div>
               <div class="form-group">
                        <label>Nama Kelas</label>
                        <select name="kelas" class="form-control">
                            <option value="">Pilih Kelas</option>
                            <?php 
                            $kel = mysqli_query($con,"SELECT * FROM tb_mkelas ORDER BY id_mkelas ASC ");
                            foreach ($kel as $kl) {

                                 if ($kl['id_mkelas']==$k['id_mkelas']) {
                                    $selected="selected";
                                }else{
                                    $selected='';
                                }

                                echo "<option value='$kl[id_mkelas]' $selected>$kl[nama_kelas]</option>";
                            }

                             ?>
                        </select>
                    </div>

           


                   
                    <div class="row form-group">
                        <div class="col-lg-2 col-lg-10">                       
                            <button name="edit" class="btn btn-info" type="submit">Edit</button>
                        </div>
                    </div>
                </form>
                <?php 
                if (isset($_POST['edit'])) {
                    $save= mysqli_query($con,"UPDATE tb_walikelas SET id_guru='$_POST[wakel]',id_mkelas='$_POST[kelas]' WHERE id_walikelas='$_POST[id]' ");
                    if ($save) {
                        echo "<script>
                        alert('Data diubah !');
                        window.location='?page=walas';
                        </script>";                        
                    }
                }

                 ?>


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>                        
                </table>





</div>
</div>
</div>
</div>
</div>


<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
              <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah Wali Kelas</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <select name="wakel" class="form-control">
                            <option value="">Pilih Guru</option>
                            <?php 
                            $wkel = mysqli_query($con,"SELECT * FROM tb_guru");
                            foreach ($wkel as $wk) {
                                echo "<option value='$wk[id_guru]'>$wk[nama_guru]</option>";
                            }

                             ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <select name="kelas" class="form-control">
                            <option value="">Pilih Kelas</option>
                            <?php 
                            $kel = mysqli_query($con,"SELECT * FROM tb_mkelas ORDER BY id_mkelas ASC ");
                            foreach ($kel as $k) {
                                echo "<option value='$k[id_mkelas]'>$k[nama_kelas]</option>";
                            }

                             ?>
                        </select>
                    </div>

   


                   
                    <div class="row form-group">
                        <div class="col-lg-2 col-lg-10">                       
                            <button name="save" class="btn btn-info" type="submit">Save</button>
                        </div>
                    </div>
                </form>
                <?php 
                if (isset($_POST['save'])) {
                    $save= mysqli_query($con,"INSERT INTO tb_walikelas VALUES(NULL,'$_POST[wakel]','$_POST[kelas]') ");
                    if ($save) {
                        echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=walas';
                        </script>";                        
                    }
                }

                 ?>


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



