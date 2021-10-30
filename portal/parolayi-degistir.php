<?php include 'header.php'; 

$uye_id =  $veri_cek['id'];

$connect->set_charset("utf8");








if(isset($_SESSION['parola-basariyla-degistirildi'])){
    ?>
    <script type="text/javascript">
alert("Parola başarıyla değiştirildi! Artık bir sonraki giriş işlemlerinizde yeni parolanızı kullanabilirsiniz.");
</script>
<?php 
    unset($_SESSION['parola-basariyla-degistirildi']);
}

if(isset( $_SESSION['yeni-parola-tekrar-ile-uyusmuyor'] )){
    ?>
    <script type="text/javascript">
    alert("Girdiğiniz yeni parola tekrarı ile uyuşmuyor. Lütfen tekrar deneyin.");
    </script>
<?php 
    unset( $_SESSION['yeni-parola-tekrar-ile-uyusmuyor']);
}

if(isset($_SESSION['parola-veritabani-ile-uyusmuyor'])){
    ?>
    <script type="text/javascript">
    alert("Girmiş olduğunuz mevcut parola, veritabanımızda bulunan parola ile uyuşmuyor. Lütfen tekrar deneyiniz.");
    </script>
<?php 
    unset($_SESSION['parola-veritabani-ile-uyusmuyor']);
}
?>

<style>
    #siyah
    {
        color: black;
    }
    turuncu
    {
        color: orangered;
    }
    mavi 
    {
        color: orangered;
    }
    .deneme 
    {
        margin: 15px;
    }
    beyaz
    {
        color: white;
    }
</style>

<div class="main-panel">
				<div class="content">
					<div class="page-inner">
						<div class="page-header">
							<h4 class="page-title"><?php echo $dil['parolayi-degistir-title'] ?></h4>
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
									<a href="#"><?php echo $dil['parola-degistirme-islemi-title-aciklama'] ?></a>
								</li>
								<li class="separator">
									<i class="flaticon-right-arrow"></i>
								</li>
								<li class="nav-item">
									<a href="#"></a>
								</li>
							</ul>
						</div>
						<div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    
                            <div class="row">
                                
                                
                        <div class="col-md-12 col-lg-12">
                        <h2><b><?php echo $dil['parolayi-degistir-title'] ?></b></h2>
                        </div>
                        
                        <div class="col-md-12 col-lg-12">
                        <form action="islemler/islem.php" method="POST">
                            <br>
                            <div class="row">
                            <div class="col-md-4 col-lg-4">
                            <label class="from cuzdanAdi"><?php echo $dil['mevcut-parolaniz'] ?></label>
                                <input type="password" class="form-control form-control" name="mevcut_parola" placeholder="<?php echo $dil['mevcut-parolaniz-aciklama'] ?>">
                                                               

                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label class="from cuzdanAdi"><?php echo $dil['yeni-parolaniz'] ?></label>
                                <input type="password" class="form-control form-control" name="yeni_parola" placeholder="<?php echo $dil['yeni-parolaniz-aciklama'] ?> ">

                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label class="from cuzdanAdi"><?php echo $dil['yeni-parola-onayi'] ?></label>
                                <input type="password" class="form-control form-control" name="yeni_parola_onay" placeholder="<?php echo $dil['yeni-parolaniz-onayi-aciklama'] ?>" >

                            </div>
                            <div class="col-md-2 col-lg-2">
                                <br>
                            <button class="btn btn-warning" name="parolayi-guncelle" type="submit"><?php echo $dil['parolayi-guncelle']  ?></button>

                            </div>
                            <div class="col-md-2 col-lg-2">
                                <br>
                            <button class="btn btn-danger" name="anasayfaya-don" type="submit"><?php echo $dil['anasayfaya-don'] ?></button>

                            </div>
                            </div>
                        </form>
                        </div>
                        
										
                            </div>
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>