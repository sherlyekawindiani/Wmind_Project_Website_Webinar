<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Dashborad Admin</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- css saya -->
    <link rel="stylesheet" href="assets/css/css_tirja.css">

</head>
<?php
error_reporting(0);
?>
<body>
    <div class="wadah">
        <!--PreLoader-->
        <div class="loader">
            <div class="loader-inner">
                <div class="circle"></div>
            </div>
        </div>
        <!--PreLoader Ends-->

        <!-- header -->
        <nav class="navbar navBarEo">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/logo_transparan.png" style="width: 70%" alt="">
                </a>
                <div class="navBarUsername">
                    <p class="panggilUsername">Sherly eka windiani</p>
                    <a class="txtLogout" href="#">Logout</a>
                </div>
            </div>
        </nav>
        <!-- end header -->

        <!-- isi admin -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 samping-kiri">
                    <div class="menu-samping">
                        <ul class="nav flex-column">
                            <li class="nav-item ml-4">
                                <a class="nav-link link-menu" href="admin-dashboard.php"><i class="fas fa-home mr-2"></i>Dashboard</a>
                            </li>
                            <li class="nav-item mt-3 ml-4">
                                <a class="nav-link link-menu" href="admin-user.php"><i class="fas fa-user mr-2"></i>Data User</a>
                            </li>
                            <li class="nav-item mt-3 ml-4">
                                <a class="nav-link link-menu" href="admin-peserta.php"><i class="fas fa-users mr-2"></i>Data Peserta</a>
                            </li>
                            <li class="nav-item active mt-3 ml-4">
                                <a class="nav-link link-menu" href="admin-webinar.php"><i class="fas fa-laptop mr-2"></i>Data Webinar</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10" style="background-color: #F0F2F5;">
                    <div class="isi-admin">
                        <div class="card judul-tabel">
                            <div class="card-body">
                                <h2 class="card-title">Detail Webinar</h2>
                            </div>
                        </div>
                        <?php
                            include "koneksi.php";
                            $id_webinar = $_GET['id_webinar'];
                            $query = "SELECT * FROM tb_buat_webinar WHERE id_webinar='$id_webinar'";
                            $hasil = mysqli_query($koneksi, $query);
                            $data = mysqli_fetch_array($hasil);
                        ?>
                        <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 100%; border: none; border-radius: 6px; ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="cardGambarPoster">
                                            <div style="width:320px;">
                                                <img  class="gambarPoster" src="assets/img/gambar-poster/<?php echo $data['gambar_poster']; ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" style="margin-left:-100px;">
                                        <h5 class="card-title mb-3">Informasi Umum</h5>
                                        <div class="form-group">
                                            <label for="judul_webinar"><b>Judul Webinar</b></label>
                                            <p id="judul_webinar"><?php echo $data['judul_webinar']; ?></p>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <label for="pilihKategori"><b>Kategori Webinar</b></label>
                                                <p id="pilihKategori"><?php echo $data['kategori_webinar']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="namaEo"><b>Nama Organizer</b></label>
                                                <p id="namaEo"><?php echo $data['nama_eo']; ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="emailEo"><b>Email Organizer</b></label>
                                                <p id="emailEo"><?php echo $data['email_eo']; ?></p>
                                            </div>
                                        </div>
                                        <hr style="width: 530px;">
                                        <h5 class="card-title mt-4 mb-3">Jadwal</h5>	
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <label for="tanggal mulai"><b>Tanggal dimulai</b></label>
                                                <p id="tanggal mulai"><?php echo $data['tanggal_mulai']; ?></p>
                                            </div>
                                            <div class="col-md-6 ">
                                                <label for="waktuMulai"><b>Waktu dimulai</b></label>
                                                <p id="waktuMulai"><?php echo $data['waktu_mulai']; ?></p>
                                            </div>
                                        </div>
                                        <hr style="width: 530px;">
                                        <h5 class="card-title  mt-4 mb-3 ">Lokasi</h5>
                                        <div id="input_online">
                                            <label for="link"><b>Link Streaming</b></label>
                                            <p id="link"><?php echo $data['link_streaming']; ?></p>
                                        </div>
                                        <!-- <div class="form-group" id="input_offline" >
                                            <label for="offline" style="margin-top: 10px;">Alamat Offline</label>
                                            <input type="text" name="offline_alamat" style="height: 53px; width: 350px; border-radius: 10px;"  class="form-control" required="The field is required.">
                                        </div> -->
                                        <hr style="width: 530px;">
                                        <h5 class="card-title" style="margin-top: 20px;">Detail Webinar</h5>
                                        <div class="form-group ">
                                            <label for="deskripsiEvent">Deskripsi Webinar</label>
                                            <textarea type="text" style="height: 270px; width: 460px; border-radius: 10px;" class="form-control" id="deskripsiEvent"><?php echo $data['deskripsi_webinar']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end isi admin -->

        <!-- copyright -->
        <div class="copyright" style="background-color: #0E1B3A;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p>Copyrights &copy; 2021 - <a href="https://imransdesign.com/">Wmind</a>,  All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-6 text-right col-md-12">
                        <div class="social-icons">
                            <ul>
                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end copyright -->
    </div>


    <!-- jquery -->
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- count down -->
    <script src="assets/js/jquery.countdown.js"></script>
    <!-- isotope -->
    <script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
    <!-- waypoints -->
    <script src="assets/js/waypoints.js"></script>
    <!-- owl carousel -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- mean menu -->
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <!-- sticker js -->
    <script src="assets/js/sticker.js"></script>
    <!-- main js -->
    <script src="assets/js/main.js"></script>

</body>

</html>