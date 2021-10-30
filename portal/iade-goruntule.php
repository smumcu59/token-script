<?php include 'header.php'; 

$uye_id =  $veri_cek['id'];

$iade_basvuru_idsi = $_SESSION['iade_edilen_basvuruyu_goruntule'];

$veriyi_alsinsssp = $db->prepare("SELECT * FROM iade_talepleri WHERE id=:id_kimlik");
$veriyi_alsinsssp->execute(array(':id_kimlik' =>$iade_basvuru_idsi));
$veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
$iade_red_aciklamasi = $veriyi_ceksinsssp['red_sebebi'];

$txid = $veriyi_ceksinsssp['islem_id'];

$veriyi_alsinssspq = $db->prepare("SELECT * FROM odeme_gecmisi WHERE id=:id_kimlik");
$veriyi_alsinssspq->execute(array(':id_kimlik' =>$txid));
$veriyi_ceksinssspq = $veriyi_alsinssspq->fetch(PDO::FETCH_ASSOC);
$txid_kodu = $veriyi_ceksinssspq['txid_kodu'];

$iade_sebebi = $veriyi_ceksinsssp['iade_sebebi'];
$iade_basvuru_tarihi_saati = $veriyi_ceksinsssp['basvuru_tarih_saat'];
$iade_aciklamasi = $veriyi_ceksinsssp['kullanici_aciklamasi'];


$connect->set_charset("utf8");



if(isset($_SESSION['cuzdan-basariyla-eklendi'])){
    ?>
    <script type="text/javascript">
alert("Cüzdan başarıyla eklendi!");
</script>
<?php 
    unset($_SESSION['cuzdan-basariyla-eklendi']);
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
							<h4 class="page-title">İade Görüntüle</h4>
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
									<a href="#">Görüntüle</a>
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
                        <h2><b>İade Görüntüle</b></h2>
                        </div>

                        <div class="col-md-12 col-lg-12">

                        <div class="row">
                        <div class="col-md-4 col-lg-4">
                        <br>
                        <label class="from tarih_saat">İade Başvuru Tarihi/Saati</label>
                        <input type="text" class="form-control form-control" id="siyah" name="tarih_saat" value="<?php echo strip_tags($iade_basvuru_tarihi_saati); ?>" disabled>
                        </div>
                        <div class="col-md-4 col-lg-4">
                        <br>
                        <label class="from tarih_saat">İşlem Numarası (TXID)</label>
                        <input type="text" class="form-control form-control" id="siyah" name="tarih_saat" value="<?php echo strip_tags($txid_kodu); ?>" disabled>
                        
                        </div>
                        <div class="col-md-4 col-lg-4">
                        <br>
                        <label class="from iade_sebebi">İade Sebebi</label>
                        <input type="text" class="form-control form-control" id="siyah" name="iade_sebebi" value="<?php echo strip_tags($iade_sebebi); ?>" disabled>
                        </div>
                        <div class="col-md-12 col-lg-12">
                        <br>
                        <label class="from aciklama">Kullanıcı Yorumu</label>
                        <textarea class="form-control form-control" id="siyah" name="aciklama" disabled><?php echo strip_tags($iade_aciklamasi) ?></textarea>
                        </div>
                        <div class="col-md-12 col-lg-12">
                        <br>
                        <label class="from aciklama">İade Red Açıklaması</label>
                        <textarea class="form-control form-control" id="siyah" name="aciklama" disabled><?php 
                        if($iade_red_aciklamasi == NULL){
                            echo "Talep halen inceleniyor";
                        } else{
                            echo strip_tags($iade_red_aciklamasi);
                        }
                        
                        
                        
                        ?></textarea>
                        </div>
                        </div>
                        </div>
                        
                        
                        
										<form action="islemler/islem.php" method="POST">
											
											
											<div class="col-md-3 col-lg-3">
                                                <br>
                                                <button type="submit" class="btn btn-secondary btn-danger  btn-stiped" type="button" name="iade-taleplerine-don">Geri Dön</button>
                                                


                                            </div>
											</form>
                            </div>
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>