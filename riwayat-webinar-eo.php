<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>WMIND</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/logo2.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
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
	<!-- Css kita  -->
	<link rel="stylesheet" href="assets/css/css_sherly.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@200;400&display=swap" rel="stylesheet">
</head>

<?php
error_reporting(0);
?>



<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

	<!-- header -->
    <nav class="navbar navBarEo">
        <div class="container-fluid navBarEo">
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
	<!-- body -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2 colKiri">
				<div class="sidebarEo">
				    <ul style='list-style-type: none;'> 	
						<li class="listMenu" >
							<a class="pilihanMenu" href="dashboard-eo.php"><i class="fas fa-home"></i> Dashboard</a>
						</li>
						<div class="batas"></div>
						<li class="listMenu">
							<a class="pilihanMenu" href="buat-webinar-eo
							.php"><i class="fas fa-plus-square"></i> Buat Webinar</a>
						</li>
						<div class="batas"></div>
						<li class="listMenu active ">
							<a class="pilihanMenu" href="riwayat-webinar-eo.php"><i class="fas fa-history" ></i> Riwayat</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-10" style="background-color: #F0F2F5;">
				<div class="cardDashboard">
					<div class="card cardBuatWebinar">
						<div class="card-body">
							<h2 class="card-title">Riwayat Webinar</h2>
							<p class="card-text" style="font-size: 18px;">Menampilkan webinar yang pernah di upload beserta data peserta yang mendaftarkan webinar </p>
						</div>
					</div>
					<div class="card shadow p-3 mb-5 bg-white rounded" style="width: 100%; border: none; border-radius: 6px;">
						<div class="card-body" style="padding: 15px">
							<!-- Search -->
							<div class="navbar">
								<div class="container d-flex justify-content-end mb-3 ">
									<form class="d-flex" action="" method="post" style=" ">
										<input class="form-control" style="width: 300px;" name="inputCari" type="search" placeholder="Cari nama webinar atau kategori" aria-label="Search">
										<button class="btn" name="cari" type="submit" style="background-color: #0E1B3A; color: white;"><i class="fas fa-search"></i></button>
									</form>
								</div>
							</div>
							<!-- Akhir Search -->
							
							<table class="table table-bordered tabelRiwayat" >
								<thead>
									<tr class="tabelThead">
										<th scope="col" style="border-top-left-radius: 10px; border: none; width: 50px">No</th>
										<th scope="col" style="border: none; width: 160px">Tanggal Pembuatan</th>
										<th scope="col" style="border: none; width: 450px">Nama Webinar</th>
										<th scope="col" style="border: none;">Kategori</th>
										<th scope="col" style="border-top-right-radius: 10px; border: none; width: 150px;">Aksi</th>
									</tr>
								</thead>
									<?php
										include "koneksi.php"; //panggil file koneksi
										$no=1;
										$cari = $_POST['inputCari'];
										if($cari != ''){
											$select= mysqli_query($koneksi, "SELECT * FROM tb_buat_webinar WHERE id_webinar AND judul_webinar LIKE '%".$cari."%' OR kategori_webinar LIKE '%".$cari."%' ");
										}else{
											$select= mysqli_query($koneksi, "SELECT * FROM tb_buat_webinar WHERE id_webinar ");
										}
										if(mysqli_num_rows($select)){
											// perulangan untuk nampilkan data dari database
											while ($data=mysqli_fetch_array ($select)){ 
									?> 
								<tbody>
									<tr>
										<th><?php echo $no++;?></th>
										<td style="text-transform: capitalize;"><?php echo $data['tgl_buat'];?> </td>
										<td>
											<a href="detail-webinar-eo.php?id_webinar=<?php echo $data['id_webinar'];?>" >
												<button type="button" class="btn btn-link" style="text-transform: capitalize;  text-align: left;"><?php echo $data['judul_webinar'];?></button>
											</a>
										</td>
										<td><?php echo $data['kategori_webinar'];?> </td>
										<td>
											<a href="delete-webinar-eo.php?id_webinar=<?php echo $data['id_webinar'];?>"
												onclick="return confirm ('Apakah anda yakin?')" >
												<button type="button" class="btn btn-dark btnAksi">Hapus</button>
											</a>
											
										</td>
									</tr>			
								</tbody>
								<?php } } else{
										echo '<tr class="align-middle"><td colspan="5">Tidak ada data</td></tr>';
									}?>
							</table>

						</div>
					</div>
					

				</div>

			</div>
		
		</div>

	</div>
	<!-- end body -->

	<!-- copyright -->
	<div class="copyright" style="background-color: #0E1B3A">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>,  All Rights Reserved.</p>
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

	<!-- Javascript ini -->

	<!-- Akhir javascript -->
	
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