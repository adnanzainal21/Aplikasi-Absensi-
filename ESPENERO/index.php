<?php
session_start();
include 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Absensi PKL/PSG/PPL</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/_login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/_login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/_login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/_login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/_login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/_login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/_login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/_login/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/_login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="post" action="" class="login100-form validate-form">
                    <span class="login100-form-title p-b-48">
                        <!-- <i class="zmdi zmdi-font"></i> -->
                        <img src="./assets/img/espenero.png" width="100">
                    </span>
                    <span class="login100-form-title p-b-26">
                        Espenero 
                    </span>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="username">
                        <span class="focus-input100" data-placeholder="Username"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>
                    <div class="form-group mb-3">
                        <!-- <input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span> -->
                        <select class="form-control" name="level">
                            <option>Level</option>
                            <option value="1">Guru</option>
                            <option value="2">Siswa</option>
                            <option value="3">Kepala Sekolah</option>
                            <option value="4">Wali Kelas</option>
                        </select>
                    </div>
                    <br>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>


                </form>

                <?php 
				if ($_SERVER['REQUEST_METHOD']=='POST') {
					$level = $_POST['level'];
					$pass= sha1($_POST['password']);
					if ($level==1) {
						// Guru
						$sqlCek = mysqli_query($con,"SELECT * FROM tb_guru WHERE nip='$_POST[username]' AND password='$pass' AND status='Y'");
						$jml = mysqli_num_rows($sqlCek);
						$d = mysqli_fetch_array($sqlCek);
						
						if ($jml > 0) {
						$_SESSION['guru']= $d['id_guru'];
						echo "
						<script type='text/javascript'>
						setTimeout(function () { 
						
						swal('($d[nama_guru]) ', 'Login berhasil', {
						icon : 'success',
						buttons: {        			
						confirm: {
						className : 'btn btn-success'
						}
						},
						});    
						},10);  
						window.setTimeout(function(){ 
						window.location.replace('./guru/');
						} ,3000);   
						</script>";					
						
						}else{
						echo "
						<script type='text/javascript'>
						setTimeout(function () { 
						
						swal('Sorry!', 'Username / Password Salah', {
						icon : 'error',
						buttons: {        			
						confirm: {
						className : 'btn btn-danger'
						}
						},
						});    
						},10);  
						window.setTimeout(function(){ 
						window.location.replace('./');
						} ,3000);   
						</script>";
						}
						
					}elseif ($level==2) {
						// Siswa
								$sqlCek = mysqli_query($con,"SELECT * FROM tb_siswa WHERE nis='$_POST[username]' AND password='$pass' AND status='1'");
								$jml = mysqli_num_rows($sqlCek);
								$d = mysqli_fetch_array($sqlCek);
								
								if ($jml > 0) {
								$_SESSION['siswa']= $d['id_siswa'];
								
								
								echo "
								<script type='text/javascript'>
								setTimeout(function () { 
								
								swal('($d[nama_siswa]) ', 'Login berhasil', {
								icon : 'success',
								buttons: {        			
								confirm: {
								className : 'btn btn-success'
								}
								},
								});    
								},10);  
								window.setTimeout(function(){ 
								window.location.replace('./siswa/');
								} ,3000);   
								</script>";
								
								}else{
								echo "
								<script type='text/javascript'>
								setTimeout(function () { 
								
								swal('Sorry!', 'Username / Password Salah', {
								icon : 'error',
								buttons: {        			
								confirm: {
								className : 'btn btn-danger'
								}
								},
								});    
								},10);  
								window.setTimeout(function(){ 
								window.location.replace('./');
								} ,3000);   
								</script>";
								}

								
								}elseif ($level==3) {
						// Kepsek
								$sqlCek = mysqli_query($con,"SELECT * FROM tb_kepsek WHERE nip='$_POST[username]' AND password='$pass' AND status='Y'");
								$jml = mysqli_num_rows($sqlCek);
								$d = mysqli_fetch_array($sqlCek);
								
								if ($jml > 0) {
								$_SESSION['kepsek']= $d['id_kepsek'];
								
								
								echo "
								<script type='text/javascript'>
								setTimeout(function () { 
								
								swal('($d[nama_kepsek]) ', 'Login berhasil', {
								icon : 'success',
								buttons: {        			
								confirm: {
								className : 'btn btn-success'
								}
								},
								});    
								},10);  
								window.setTimeout(function(){ 
								window.location.replace('./kepsek/');
								} ,3000);   
								</script>";
								
								}else{
								echo "
								<script type='text/javascript'>
								setTimeout(function () { 
								
								swal('Sorry!', 'Username / Password Salah', {
								icon : 'error',
								buttons: {        			
								confirm: {
								className : 'btn btn-danger'
								}
								},
								});    
								},10);  
								window.setTimeout(function(){ 
								window.location.replace('./');
								} ,3000);   
								</script>";
								}

					}else{
						echo "Tidak ada level yg dipilih";
					}

				}
				?>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="assets/_login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/_login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/_login/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/_login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/_login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/_login/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets/_login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="assets/_login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    <script src="assets/_login/js/main.js"></script>


</body>

</html>