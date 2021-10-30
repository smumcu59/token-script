<?php include 'header.php'; 

$connect->set_charset("utf8");

$cekilecek_id =  $_SESSION['secilen-uye'];

$veriyi_alsinsssp = $db->prepare("SELECT * FROM uyeler WHERE id=:id_kimlik");
$veriyi_alsinsssp->execute(array(':id_kimlik' =>$cekilecek_id));
$veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
$uye_adi = $veriyi_ceksinsssp['isim_soyisim'];







if(isset($_SESSION['cuzdan-basariyla-eklendi'])){
    ?>
    <script type="text/javascript">
alert("Cüzdan başarıyla eklendi!");
</script>
<?php 
    unset($_SESSION['cuzdan-basariyla-eklendi']);
}

if(isset($_SESSION['cuzdan-basariyla-devre-disi-birakildi'] )){
    ?>
    <script type="text/javascript">
    alert("Cüzdan başarıyla silindi!");
    </script>
<?php 
    unset($_SESSION['cuzdan-basariyla-devre-disi-birakildi']);
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
							<h4 class="page-title"><?php echo strip_tags($uye_adi)." isimli üyeye token yüklüyorsun" ?></h4>
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
									<a href="#">Token Yükleme İşlemi</a>
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
                        <h2><b>Yükleme İşlemi</b></h2>
                        </div>
                        
                        <div class="col-md-12 col-lg-12">
                        <form action="islemler/islem.php" method="POST">
                            <br>
                            <div class="row">
                            <div class="col-md-6 col-lg-6">
                            <label class="from cuzdanAdi">Yüklenecek Token (ARH)</label>
                                <input type="number" class="form-control form-control" name="yuklenecek_token" placeholder="Yükleyeceğiniz token miktarını yazınız." >
                                                               

                            </div>
                           
                            <div class="col-md-2 col-lg-2">
                                <br>
                            <button class="btn btn-success" name="tokeni-yukle" type="submit">Tokeni Yükle</button>

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