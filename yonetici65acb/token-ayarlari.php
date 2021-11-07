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
							<h4 class="page-title"><?php echo $dil['token-ayarlari-baslik'] ?></h4>
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
                        <h2><b><?php echo $dil['token-ayarlari-baslik'] ?></b></h2>
                        </div>

                        <div class="col-md-12 col-lg-12">

                        <div class="row">
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat"><?php echo $dil['token-birimi'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="token_birimi" required value="<?php echo strip_tags($token_birimi) ?>">
                        
                        </div>
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat"><?php echo $dil['token-adi'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="token_adi" required value="<?php echo strip_tags($token_adi) ?>">
                        
                        </div>
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat"><?php echo $dil['varsayilan-dil-secimi'] ?></label>
                        <select name="dil-secimi" class="form-control" required>
                        <option disabled selected>--SEÇİM YAPIN--</option>
                        <?php
                        while($row = mysqli_fetch_array($resultt))  {

                            ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['dil_adi'] ?></option>
                            <?php } ?>
                        </select>
                        
                        
                        </div>
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat"><?php echo $dil['on-satis-token-siniri'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="sinir" required value="<?php echo strip_tags($on_satis_siniri) ?>">
                        <br>
                        
                        </div>
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat"><?php echo $dil['cuzdan-kimligi'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="cuzdan_kimligi" required value="<?php echo strip_tags($cuzdan_kimligi) ?>">
                        
                        </div>
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat"><?php echo $dil['sozlesme-adresi'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="sozlesme_adresi" required value="<?php echo strip_tags($sozlesme_adresi) ?>">
                        
                        </div>
                        <div class="col-md-4 col-lg-4">
                        <label class="from tarih_saat"><?php echo $dil['referans-kazanc-orani'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="kazanc_orani" required value="<?php echo strip_tags($referans_orani) ?>">
                        
                        
                        </div>
                        <div class="col-md-8 col-lg-8"></div>
                        
                        <div class="col-md-2 col-lg-2">
                        <br> <br>
                            <button type="submit" class="btn btn-secondary btn-warning  btn-stiped" type="button" name="ayarlari-guncelle"><?php echo $dil['ayarlari-guncelle-buton'] ?></button>
                                                

                        

                        </div>
                        
                        <div class="col-md-3 col-lg-3">
                                                <br> <br>
                                                <button type="submit" class="btn btn-secondary btn-danger  btn-stiped" type="button" name="anasayfaya-don"><?php echo $dil['geri-don-buton'] ?></button>
                                                


                                            </div>
                        </form>
                        <div class="col-md-12 col-lg-12">
                        <br>
                        <h2><label><turuncu><?php echo $dil['bilgi-baslik'] ?>: </turuncu> <?php echo $dil['bilgi-sinir-aciklamasi'] ?></label></h2>
                        </div>
                        
                        </div>
                        </div>
                        
                        
                        
										
                            </div>
                            
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>