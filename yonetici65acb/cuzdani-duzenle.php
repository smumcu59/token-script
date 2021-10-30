<?php include 'header.php'; 

$connect->set_charset("utf8");

$duzenlenecek_id =  $_SESSION['guncellenecek_cuzdanin_idsi'];

$veriyi_alsinsssp = $db->prepare("SELECT * FROM cuzdan_bilgisi WHERE id=:id_kimlik");
$veriyi_alsinsssp->execute(array(':id_kimlik' =>$duzenlenecek_id));
$veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
$cuzdan_adi = $veriyi_ceksinsssp['isim'];
$cuzdan_numarasi = $veriyi_ceksinsssp['cuzdan_kimligi'];






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
							<h4 class="page-title">Cüzdanı Düzenle</h4>
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
                        <h2><b>Cüzdanı Düzenle</b></h2>
                        </div>
                        
                        <div class="col-md-12 col-lg-12">
                        <form action="islemler/islem.php" method="POST">
                            <br>
                            <div class="row">
                            <div class="col-md-6 col-lg-6">
                            <label class="from cuzdanAdi">Cüzdan Kimliği</label>
                                <input type="text" class="form-control form-control" name="cuzdanKimligi" placeholder="Lütfen cüzdan kimliği giriniz." value="<?php echo strip_tags($cuzdan_numarasi) ?>">
                                                               

                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label class="from cuzdanAdi">Cüzdan Adı (Cüzdanları diğer cüzdanlarınızdan ayırt edin.)</label>
                                <input type="text" class="form-control form-control" name="cuzdanAdi" placeholder="Lütfen cüzdan adı giriniz. " value="<?php echo strip_tags($cuzdan_adi) ?>">

                            </div>
                            <div class="col-md-2 col-lg-2">
                                <br>
                            <button class="btn btn-warning" name="cuzdan-bilgisini-guncelle" type="submit">Cüzdanı Güncelle</button>

                            </div>
                            <div class="col-md-2 col-lg-2">
                                <br>
                            <button class="btn btn-danger" name="cuzdan-listesine-don" type="submit">Cüzdan Listesine Geri Dön</button>

                            </div>
                            </div>
                        </form>
                        </div>
                        
										
                            </div>
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>