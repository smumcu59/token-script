<?php include 'header.php'; 



$veriyi_alll = $db->prepare("SELECT * from token_ayarlari WHERE id=1");
$veriyi_alll->execute();
$veri_cekk = $veriyi_alll->fetch(PDO::FETCH_ASSOC);

$on_satis_siniri = $veri_cekk['on_satis_siniri'];
$cuzdan_kimligi = $veri_cekk['cuzdan_kimligi'];
$referans_orani = $veri_cekk['referans_kazanci'];
$token_birimi = $veri_cekk['token_birimi'];
$token_adi = $veri_cekk['token_adi'];
$varsayilan_dil_id = $veri_cekk['varsayilan_dil_id'];
$sozlesme_adresi = $veri_cekk['sozlesme_adresi'];

## Sayılar

$platform = $veri_cekk['platform'];
$danisman = $veri_cekk['danisman'];
$toplam_token = $veri_cekk['toplam_token'];
$borsa_isbirligi = $veri_cekk['borsa_isbirligi'];
$odul = $veri_cekk['odul'];
$on_satis_token_degeri = $veri_cekk['on_satis_token_degeri'];
$kurucular_ekip = $veri_cekk['kurucular_ekip'];


##




$connect->set_charset("utf8");


$queryy ="SELECT * FROM diller";  
$resultt = mysqli_query($connect, $queryy);



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
							<h4 class="page-title"><?php echo $dil['on-yuz-ayarlari-baslik'] ?></h4>
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
									<a href="#"><?php echo $dil['yapilandirma-ayarlari'] ?></a>
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
                        <h2><b><?php echo $dil['on-yuz-ayarlari-baslik'] ?></b></h2>
                        </div>

                        <div class="col-md-12 col-lg-12">

                        <div class="row">
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat">Platform</label>
                        <input type="text" class="form-control form-control" id="siyah" name="platform" required value="<?php echo strip_tags($platform) ?>">
                        
                        </div>
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat">Toplam Token</label>
                        <input type="text" class="form-control form-control" id="siyah" name="toplam_token" required value="<?php echo strip_tags($toplam_token) ?>">
                        
                        </div>
                        
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat">Ön Satış Token Değeri</label>
                        <input type="text" class="form-control form-control" id="siyah" name="on_satis_token_degeri" required value="<?php echo strip_tags($on_satis_token_degeri) ?>">
                        <br>
                        
                        </div>
                        
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat">Borsa ve İşbirliği</label>
                        <input type="text" class="form-control form-control" id="siyah" name="borsa_isbirligi" required value="<?php echo strip_tags($borsa_isbirligi) ?>">
                        
                        </div>
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat">Kurucular ve Ekip</label>
                        <input type="text" class="form-control form-control" id="siyah" name="kurucular_ekip" required value="<?php echo strip_tags($kurucular_ekip) ?>">
                        
                        
                        </div>
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat">Danışman</label>
                        <input type="text" class="form-control form-control" id="siyah" name="danisman" required value="<?php echo strip_tags($danisman) ?>">
                        
                        
                        </div>
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat">Ödül</label>
                        <input type="text" class="form-control form-control" id="siyah" name="odul" required value="<?php echo strip_tags($odul) ?>">
                        
                        
                        </div>
                        
                        <div class="col-md-8 col-lg-8"></div>
                        <div class="col-md-2 col-lg-2">
                        <br> <br>
                            <button type="submit" class="btn btn-secondary btn-warning  btn-stiped" type="button" name="ayarlari-guncelle-on-yuz"><?php echo $dil['ayarlari-guncelle-buton'] ?></button>
                                                

                        

                        </div>
                        
                        <div class="col-md-3 col-lg-3">
                                                <br> <br>
                                                <button type="submit" class="btn btn-secondary btn-danger  btn-stiped" type="button" name="anasayfaya-don"><?php echo $dil['geri-don-buton'] ?></button>
                                                


                                            </div>
                        </form>
                        <div class="col-md-12 col-lg-12">
                        <br>
                        
                        </div>
                        
                        </div>
                        </div>
                        
                        
                        
										
                            </div>
                            
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>