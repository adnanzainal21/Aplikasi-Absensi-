<?php
session_start();
include 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Presensi Siswa</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
    WebFont.load({
        google: {
            "families": ["Lato:300,400,700,900"]
        },
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                "simple-line-icons"
            ],
            urls: ['assets/css/fonts.min.css']
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
</head>

<body>

    <div class="wrapper overlay-sidebar">
        <div class="main-header" style="background-color: #1269DB;">
            <!-- Logo Header -->
            <div class="container">
                <div class="logo-header" data-background-color="blue2">

                    <a href="index.php">
                        <img src="assets/img/mts.png" alt="navbar brand" class="navbar-brand" width="40">
                        <b class="text-white">Aplikasi Siswa</b>
                    </a>
                </div>
            </div>
            <!-- End Logo Header -->
        </div>


        <div class="main-panel">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="container">
                        <div class="page-inner py-5">
                            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                                <div>
                                    <h2 class="text-white pb-2 fw-bold">SMP NEGERI 2 JATIROTO</h2>
                                    <h5 class="text-white op-7 mb-2">Absen Lebih mudah gunakan Aplikasi Absensi</h5> 
                                </div>
                                <div class="ml-md-auto py-2 py-md-0">
                                    <a href="#" class="btn btn-white btn-border btn-round mr-2">446G+35V, Cangkring, Kec. Jatiroto, Kabupaten Wonogiri, Jawa Tengah 57692</a>
                                    <a href="view/siswa.php" class="btn btn-secondary btn-round">Ajukan Izin</a> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">

                    <div class="row">
                        <!-- Row -->
                        <div class="col-md-4 ml-auto mr-auto col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <center>
                                        <h4 class="card-title"><b>Admin Login</b></h4>
                                    </center>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="form-group form-floating-label">
                                            <input name="username" type="email" class="form-control input-border-bottom"
                                                required autocomplete="off">
                                            <label class="placeholder">Email</label>
                                        </div>

                                        <div class="form-group form-floating-label">
                                            <input name="password" type="password"
                                                class="form-control input-border-bottom" required>
                                            <label class="placeholder">Password</label>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" type="submit"><i
                                                    class="flaticon-up-arrow-2"></i> Login</button>
                                            <a href="../index.php" class="btn btn-danger btn-block"><i
                                                    class="flaticon-back"></i> Back</a>
                                        </div>
                                    </form>

                                    <?php 
									if ($_SERVER['REQUEST_METHOD']=='POST') {
									$pass= sha1($_POST['password']);
									$sqlCek = mysqli_query($con,"SELECT * FROM tb_admin WHERE username='$_POST[username]' AND password='$pass' AND aktif='Y'");
									$jml = mysqli_num_rows($sqlCek);
									$d = mysqli_fetch_array($sqlCek);
									
									if ($jml > 0) {
									$_SESSION['admin']= $d['id_admin'];								
									
									echo "
									<script type='text/javascript'>
									setTimeout(function () { 
									
									swal('(Administrator) ', 'Login berhasil', {
									icon : 'success',
									buttons: {        			
									confirm: {
									className : 'btn btn-success'
									}
									},
									});    
									},10);  
									window.setTimeout(function(){ 
									window.location.replace('./admin/dashboard.php');
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
									window.location.replace('./log.php');
                                    } ,3000);
                                    </script>";
                                    }
                                    }
                                    ?>


                                </div>
                            </div>
                        </div>



                    </div> <!-- end row-->


                </div>
            </div>

            <footer class="footer">
                <div class="container">
                    <div class="copyright ml-auto">
                        &copy; <?php echo date('Y');?> Absensi Siswa.<a href="index.php">YULIA </a> | 2023
                    </div>
                </div>
            </footer>

        </div>



        <!--   Core JS Files   -->
        <script src="assets/js/core/jquery.3.2.1.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>

        <!-- jQuery UI -->
        <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

        <!-- jQuery Scrollbar -->
        <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


        <!-- Sweet Alert -->
        <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

        <!-- Atlantis JS -->
        <script src="assets/js/atlantis.min.js"></script>



</body>

</html>