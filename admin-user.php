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
	include "koneksi.php" ;
    error_reporting(0);
	session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:login.php?pesan=gagal");
	}
	// membuat session Username
	$email = $_SESSION['email'];
	$query = "SELECT * FROM tb_user WHERE email='$email'";
	$hasil = mysqli_query($koneksi,$query);
	
?>
<?php
if(mysqli_num_rows($hasil)>0){
    $data_user = mysqli_fetch_array($hasil);
    $_SESSION["id_user"] = $data_user["id_user"];
	$_SESSION["nama"] = $data_user["nama"];
    $_SESSION["email"] = $data_user["email"];
    $_SESSION["username"] = $data_user["username"];
    $_SESSION["level"] = $data_user["level"];
}
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
                    <p class="panggilUsername"> <?php echo $_SESSION['username']; ?></p>
                    <a class="txtLogout" href="logout.php">Logout</a>
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
                            <li class="nav-item active mt-3 ml-4">
                                <a class="nav-link link-menu" href="admin-user.php"><i class="fas fa-user mr-2"></i>Data User</a>
                            </li>
                            <li class="nav-item mt-3 ml-4">
                                <a class="nav-link link-menu" href="admin-peserta.php"><i class="fas fa-users mr-2"></i>Data Peserta</a>
                            </li>
                            <li class="nav-item mt-3 ml-4">
                                <a class="nav-link link-menu" href="admin-webinar.php"><i class="fas fa-laptop mr-2"></i>Data Webinar</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10" style="background-color: #F0F2F5;">
                    <div class="isi-admin">
                        <div class="card judul-tabel">
                            <div class="card-body">
                                <h2 class="card-title">Data User</h2>
                                <p class="card-text" style="font-size: 18px;">Menampilkan data user yang login</p>
                            </div>
                        </div>
                        <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 100%; border: none; border-radius: 6px; ">
                            <div class="card-body">
                                <!-- Search -->
                                <div class="navbar">
                                    <div class="container d-flex justify-content-end mb-3 ">
                                        <form class="d-flex" action="" method="post" style=" ">
                                            <input class="form-control" style="width: 300px;" name="inputCari" type="search" placeholder="Cari username atau email" aria-label="Search">
                                            <button class="btn" name="cari" type="submit" style="background-color: #0E1B3A; color: white;"><i class="fas fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <!-- Akhir Search -->
                                <table class="table table-bordered" style="border:none;">
                                    <thead>
                                        <tr style="background-color: #FFC224;border: none;">
                                            <th scope="col" style="border-top-left-radius: 10px; border: none;">No</th>
                                            <th scope="col" style="border: none;">Tanggal Pembuatan</th>
                                            <th scope="col" style="border: none;">Nama Webinar</th>
                                            <th scope="col" style="border: none;">Kategori</th>
                                            <th scope="col" style="border-top-right-radius: 10px; border: none;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
										include "koneksi.php"; //panggil file koneksi
										$no=1;
										$cari = $_POST['inputCari'];
										if($cari != ''){
											$select= mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user AND username LIKE '%".$cari."%' OR email LIKE '%".$cari."%' ");
										}else{
											$select= mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user ");
										}
										if(mysqli_num_rows($select)){
											// perulangan untuk nampilkan data dari database
											while ($data=mysqli_fetch_array ($select)){ 
									?> 
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['email']; ?></td>
                                            <td><?php echo $data['username']; ?></td>
                                            <td><?php echo $data['level']; ?></td>
                                            <td>
                                                <a href="admin-delete-user.php?id_user=<?php echo $data['id_user'];?>"
                                                    onclick="return confirm ('Apakah anda yakin?')" >
                                                    <button type="button" class="btn btn-dark btn-admin">Hapus</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?> 			
                                    </tbody>
                                    <?php } else{
										echo '<tr class="text-center"><td colspan="5">Tidak ada data</td></tr>';
									}?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end isi admin -->
        <!-- copyright -->
        <div class="copyright" style="background-color: #0E1B3A">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p>Copyrights &copy; 2021 - <a href="https://imransdesign.com/">Wmind</a>,  All Rights Reserved.</p>
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