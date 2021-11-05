<?php
session_start();
ob_start();
include 'islemler/baglan.php';





if(isset($_SESSION['dil'])){
    $dil = $_SESSION['dil'];
    if($dil == 1){
        include 'diller/turkish.php';;
    }
    else if($dil == 2){
        include 'diller/turkish.php';
    }
    else{
        include 'diller/turkish.php';
    }
}




if($_SESSION["uye-oturumu"]=="1") {

    //echo "Kullanıcı giriş yapmış.";
    $kullanici_adi = $_SESSION['kullanici_adi'];

	$veriyi_alsinss = $db->prepare("SELECT * FROM uyeler WHERE elektronik_posta_adresi=:eposta");
    $veriyi_alsinss->execute(array(':eposta' =>$kullanici_adi));
    $veri_cek = $veriyi_alsinss->fetch(PDO::FETCH_ASSOC);
	$uye_adi_soyadi = $veri_cek['isim_soyisim'];
	
    
    
    

    
   





} else {
    //echo "Kullanıcı giriş yapmamış.";
    header("location:/giris-yap");


}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Archive Token - <?php echo $dil['gecmisini-gelecegin-ile-koru-title'] ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
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
<body data-background-color="dark">
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="dark2">
				
				<a href="index.php" class="logo">
					<img width="110" height="65" src="assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">
				
				<div class="container-fluid">
					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						
						
						
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?php echo $veri_cek['isim_soyisim']; ?></h4>
												<p class="text-muted"><?php echo $veri_cek['elektronik_posta_adresi']; ?></p><a href="parolayi-degistir" class="btn btn-xs btn-secondary btn-sm"><?php echo $dil['parolami-degistir'] ?></a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										
										
										<a class="dropdown-item" href="cikis-yap"><?php echo $dil['cikis-yap'] ?></a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
        <!-- Sidebar -->
		<div class="sidebar sidebar-style-2" data-background-color="dark2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $veri_cek['isim_soyisim']; ?>
									<span class="user-level"><?php echo $dil['token-bakiyesi-profil']  ?>  <?php echo $veri_cek['bakiye']; ?> ARH</span>
									
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>
                            

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="parolayi-degistir">
											<span class="link-collapse"><?php echo $dil['parolami-degistir'] ?></span>
										</a>
									</li>
									
									
								</ul>
							</div>
						</div>
					</div>
                    
					<ul class="nav nav-primary">
                    <li class="nav-item">
							<a href="index">
								<i class="fas fa-home"></i>
								<p><?php echo $dil['anasayfa-header'] ?></p>
								
							</a>
						</li>
                       
						
                    

                        <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section"><?php echo $dil['on-siparis-islemleri-header']  ?></h4>
						</li>
						
						<li class="nav-item">
							<a href="cuzdanim">
								<i class="fas fa-wallet"></i>
								<p><?php echo $dil['cuzdanim-header'] ?></p>
								
							</a>
						</li>
						<li class="nav-item">
							<a href="islem-gecmisim">
								<i class="fas fa-tasks"></i>
								<p><?php echo $dil['islem-gecmisim-header']  ?></p>
								
							</a>
						</li>
						
						<li class="nav-item">
							<a href="iade-talepleri">
								<i class="fas fa-money-bill-wave-alt"></i>
								<p><?php echo $dil['iade-talepleri-header'] ?></p>
								
							</a>
						</li>
						
                       
					
						
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->