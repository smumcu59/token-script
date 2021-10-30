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
							<h4 class="page-title">Parolayı Değiştir</h4>
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
									<a href="#">Parola Değiştirme İşlemi</a>
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
                        <h2><b>Parola Değiştir</b></h2>
                        </div>
                        
                        <div class="col-md-12 col-lg-12">
                        <form action="islemler/islem.php" method="POST">
                            <br>
                            <div class="row">
                            <div class="col-md-4 col-lg-4">
                            <label class="from cuzdanAdi">Mevcut Parolanız</label>
                                <input type="password" class="form-control form-control" name="mevcut_parola" placeholder="Mevcut parolanızı giriniz.">
                                                               

                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label class="from cuzdanAdi">Yeni Parolanız</label>
                                <input type="password" class="form-control form-control" name="yeni_parola" placeholder="Yeni parolanızı giriniz. ">

                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label class="from cuzdanAdi">Yeni Parola Onayı</label>
                                <input type="password" class="form-control form-control" name="yeni_parola_onay" placeholder="Yeni parolanızı tekrar giriniz. " >

                            </div>
                            <div class="col-md-2 col-lg-2">
                                <br>
                            <button class="btn btn-warning" name="parolayi-guncelle" type="submit">Parolayı Güncelle</button>

                            </div>
                            <div class="col-md-2 col-lg-2">
                                <br>
                            <button class="btn btn-danger" name="anasayfaya-don" type="submit">Anasayfaya Dön</button>

                            </div>
                            </div>
                        </form>
                        </div>
                        
										
                            </div>
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>