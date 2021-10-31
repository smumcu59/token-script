<?php include 'header.php'; 

$yonetici_id = $_SESSION['duzenlenecek-yonetici-id'];

$veriyi_alll = $db->prepare("SELECT * from paketler WHERE id=1");
$veriyi_alll->execute(array($yonetici_id));
$veri_cekk = $veriyi_alll->fetch(PDO::FETCH_ASSOC);

$paket_adi_1 = $veri_cekk['paket_adi'];
$paket_fiyati_1 = $veri_cekk['paket_fiyati'];
$paket_kazanci_1 = $veri_cekk['paket_kazanci'];
$token_1 = $veri_cekk['token_degeri'];


$veriyi_alll = $db->prepare("SELECT * from paketler WHERE id=2");
$veriyi_alll->execute(array($yonetici_id));
$veri_cekk = $veriyi_alll->fetch(PDO::FETCH_ASSOC);

$paket_adi_2 = $veri_cekk['paket_adi'];
$paket_fiyati_2 = $veri_cekk['paket_fiyati'];
$paket_kazanci_2 = $veri_cekk['paket_kazanci'];
$token_2 = $veri_cekk['token_degeri'];


$veriyi_alll = $db->prepare("SELECT * from paketler WHERE id=3");
$veriyi_alll->execute(array($yonetici_id));
$veri_cekk = $veriyi_alll->fetch(PDO::FETCH_ASSOC);

$paket_adi_3 = $veri_cekk['paket_adi'];
$paket_fiyati_3 = $veri_cekk['paket_fiyati'];
$paket_kazanci_3 = $veri_cekk['paket_kazanci'];
$token_3 = $veri_cekk['token_degeri'];

$connect->set_charset("utf8");



if(isset($_SESSION['paketler-basariyla-guncellendi'])){
    ?>
    <script type="text/javascript">
alert("Paket Başarıyla Güncellendi!");
</script>
<?php 
    unset($_SESSION['paketler-basariyla-guncellendi']);
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
							<h4 class="page-title"><?php echo $dil['paket-yoneticisi-metin'] ?></h4>
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
									<a href="#"><?php echo $dil['yonetim-islemi-metin'] ?></a>
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
                        <h2><b><?php echo $dil['paket-yoneticisi-metin'] ?></b></h2>
                        </div>

                        <div class="col-md-12 col-lg-12">

                        <div class="row">
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat"><?php echo $dil['paket-1-adi'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="paket1_isim" required value="<?php echo strip_tags($paket_adi_1) ?>">
                        <br>
                        <label class="from tarih_saat"><?php echo $dil['paket-1-fiyati'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="fiyat1" required value="<?php echo strip_tags($paket_fiyati_1) ?>">
                        <br>
                        <label class="from tarih_saat"><?php echo $dil['paket-1-token-degeri'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="token1" required value="<?php echo strip_tags($token_1) ?>">
                        <br>
                        <label class="from tarih_saat"><?php echo $dil['paket-1-kazanc-orani'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="kazanc1" required value="<?php echo strip_tags($paket_kazanci_1) ?>">
                        </div>
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat"><?php echo $dil['paket-2-adi'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="paket2_isim" required value="<?php echo strip_tags($paket_adi_2) ?>">
                        <br>
                        <label class="from tarih_saat"><?php echo $dil['paket-2-fiyati'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="fiyat2" required value="<?php echo strip_tags($paket_fiyati_2) ?>">
                        <br>
                        <label class="from tarih_saat"><?php echo $dil['paket-2-token-degeri'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="token2" required value="<?php echo strip_tags($token_2) ?>">
                        <br>
                        <label class="from tarih_saat"><?php echo $dil['paket-2-kazanc-orani'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="kazanc2" required value="<?php echo strip_tags($paket_kazanci_2) ?>">
                        </div>
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat"><?php echo $dil['paket-3-adi'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="paket3_isim" required value="<?php echo strip_tags($paket_adi_3) ?>">
                        <br>
                        <label class="from tarih_saat"><?php echo $dil['paket-3-fiyati'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="fiyat3" required value="<?php echo strip_tags($paket_fiyati_3) ?>">
                        <br>
                        <label class="from tarih_saat"><?php echo $dil['paket-3-token-degeri'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="token3" required value="<?php echo strip_tags($token_3) ?>">
                        <br>
                        <label class="from tarih_saat"><?php echo $dil['paket-3-kazanc-orani'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="kazanc3" required value="<?php echo strip_tags($paket_kazanci_3) ?>">
                        </div>
                        
                        <div class="col-md-2 col-lg-2">
                        <br> <br>
                            <button type="submit" class="btn btn-secondary btn-warning  btn-stiped" type="button" name="paketleri-guncelle"><?php echo $dil['paketleri-guncelle-buton'] ?></button>
                                                


                        </div>
                        <div class="col-md-3 col-lg-3">
                                                <br> <br>
                                                <button type="submit" class="btn btn-secondary btn-danger  btn-stiped" type="button" name="anasayfaya-don"><?php echo $dil['geri-don-buton'] ?></button>
                                                


                                            </div>
                        </form>
                       
                        
                        </div>
                        </div>
                        
                        
                        
										
                            </div>
                            
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>