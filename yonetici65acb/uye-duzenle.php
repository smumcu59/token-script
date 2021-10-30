<?php include 'header.php'; 

$uye_id = $_SESSION['duzenlenecek_uyenin_idsi'];

$veriyi_alll = $db->prepare("SELECT * from uyeler WHERE id=:id_kimlik");
$veriyi_alll->execute(array(':id_kimlik' =>$uye_id));
$veri_cekk = $veriyi_alll->fetch(PDO::FETCH_ASSOC);

$uye_isim_soyisim = $veri_cekk['isim_soyisim'];

$uye_eposta = $veri_cekk['elektronik_posta_adresi'];

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
							<h4 class="page-title">Üyeyi Düzenle</h4>
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
									<a href="#">Düzenleme İşlemi</a>
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
                        <h2><b>Üyeyi Düzenle</b></h2>
                        </div>

                        <div class="col-md-12 col-lg-12">

                        <div class="row">
                        <div class="col-md-5 col-lg-5">
                        <br>
                        <label class="from tarih_saat">Üye İsim Soyisim</label>
                        <input type="text" class="form-control form-control" id="siyah" name="isim_soyisim" required value="<?php echo strip_tags($uye_isim_soyisim) ?>">
                        </div>
                        <div class="col-md-5 col-lg-5">
                        <br>
                        <label class="from tarih_saat">Üye Elektronik Posta Adresi</label>
                        <input type="text" class="form-control form-control" id="siyah" name="e_posta" required value="<?php echo strip_tags($uye_eposta) ?>">
                        
                        </div>
                        <div class="col-md-2 col-lg-2">
                        <br> <br>
                            <button type="submit" class="btn btn-secondary btn-warning  btn-stiped" type="button" name="uyeyi-guncelle">Üyeyi Güncelle</button>
                                                


                        </div>
                        </form>
                       
                        
                        </div>
                        </div>
                        
                        
                        
										
                            </div>
                            <form action="islemler/islem.php" method="POST" accept-charset="utf-8">
											
											
											<div class="col-md-3 col-lg-3">
                                                <br> <br>
                                                <button type="submit" class="btn btn-secondary btn-danger  btn-stiped" type="button" name="uye-listesine-don">Geri Dön</button>
                                                


                                            </div>
											</form>
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>