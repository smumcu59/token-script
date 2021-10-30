<?php include 'header.php'; 

$yonetici_id = $_SESSION['duzenlenecek-yonetici-id'];

$veriyi_alll = $db->prepare("SELECT * from token_ayarlari");
$veriyi_alll->execute(array($yonetici_id));
$veri_cekk = $veriyi_alll->fetch(PDO::FETCH_ASSOC);

$on_satis_siniri = $veri_cekk['on_satis_siniri'];
$cuzdan_kimligi = $veri_cekk['cuzdan_kimligi'];
$referans_orani = $veri_cekk['referans_kazanci'];



$connect->set_charset("utf8");



if(isset($_SESSION['ayarlar-basariyla-guncellendi'])){
    ?>
    <script type="text/javascript">
alert("Token Ayarları Başarıyla Güncellendi!");
</script>
<?php 
    unset($_SESSION['ayarlar-basariyla-guncellendi']);
}

?>

<style>
   
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
							<h4 class="page-title">Token Ayarları</h4>
							<ul class="breadcrumbs">
                            <form action="islemler/islem.php" method="POST">
								<li class="nav-home">
									<a href="#">
										<i class="flaticon-home"></i>
									</a>
								</li>
								<li class="separator">
									<i class="flaticon-right-arrow"></i>
								</li>
								<li class="nav-item">
									<a href="#">Yönetim İşlemi</a>
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
                        <h2><b>Token Ayarları</b></h2>
                        </div>

                        <div class="col-md-12 col-lg-12">

                        <div class="row">
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat">Güncel Token Ön Satış Sınırı (ARH)</label>
                        <input type="text" class="form-control form-control" id="siyah" name="sinir" required value="<?php echo strip_tags($on_satis_siniri) ?>">
                        <br>
                        
                        </div>
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat">Cüzdan Kimliği</label>
                        <input type="text" class="form-control form-control" id="siyah" name="cuzdan_kimligi" required value="<?php echo strip_tags($cuzdan_kimligi) ?>">
                        
                        </div>
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat">Referans Kazanç Oranı (%)</label>
                        <input type="text" class="form-control form-control" id="siyah" name="kazanc_orani" required value="<?php echo strip_tags($referans_orani) ?>">
                        <br>
                        
                        </div>
                        
                        <div class="col-md-2 col-lg-2">
                        <br> <br>
                            <button type="submit" class="btn btn-secondary btn-warning  btn-stiped" type="button" name="ayarlari-guncelle">Ayarları Güncelle</button>
                                                

                        

                        </div>
                        
                        <div class="col-md-3 col-lg-3">
                                                <br> <br>
                                                <button type="submit" class="btn btn-secondary btn-danger  btn-stiped" type="button" name="anasayfaya-don">Geri Dön</button>
                                                


                                            </div>
                        </form>
                        <div class="col-md-12 col-lg-12">
                        <br>
                        <h2><label><turuncu>BİLGİ: </turuncu> Gösterimi yapılan güncel token satış sınırı, sizin token ayarları sayfasına girdiğiniz andan itibaren geçerli olan token sınırıdır. Token ayarlarını güncellerken token ile ilgili devam eden bir işlem yapmamanız tavsiye edilir.</label></h2>
                        </div>
                        
                        </div>
                        </div>
                        
                        
                        
										
                            </div>
                            
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>