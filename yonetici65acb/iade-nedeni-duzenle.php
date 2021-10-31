<?php include 'header.php'; 


$connect->set_charset("utf8");

$duzenlenecek_id = $_SESSION['duzenlenecek_iade_nedeni_idsi'];

$veriyi_alsinsssp = $db->prepare("SELECT * FROM iade_nedenleri WHERE id=:id_kimlik");
$veriyi_alsinsssp->execute(array(':id_kimlik' =>$duzenlenecek_id));
$veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

$iade_nedeni = $veriyi_ceksinsssp['neden'];

if(isset($_SESSION['yonetici-basariyla-eklendi'])){
    ?>
    <script type="text/javascript">
alert("Yönetici Başarıyla Eklendi!");
</script>
<?php 
    unset($_SESSION['yonetici-basariyla-eklendi']);
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
							<h4 class="page-title"><?php echo $dil['iade-nedeni-duzenle-baslik'] ?></h4>
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
									<a href="#"><?php echo $dil['duzenleme-islemi-metin'] ?></a>
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
                        <h2><b><?php echo $dil['iade-nedeni-duzenle-baslik'] ?></b></h2>
                        </div>

                        <div class="col-md-12 col-lg-12">

                        <div class="row">
                        <div class="col-md-6 col-lg-6">
                        <br>
                        <label class="from tarih_saat"><?php echo $dil['iade-nedeni-metin'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="iade_nedeni" required value="<?php echo strip_tags($iade_nedeni) ?>">
                        </div>
                        
                        <div class="col-md-2 col-lg-2">
                        <br> <br>
                            <button type="submit" class="btn btn-secondary btn-warning  btn-stiped" type="button" name="iade-nedenini-guncelle"><?php echo $dil['iade-nedenini-guncelle'] ?></button>
                                                


                        </div>
                        <div class="col-md-3 col-lg-3">
                                                <br> <br>
                                                <button type="submit" class="btn btn-secondary btn-danger  btn-stiped" type="button" name="iade_nedenlerine_don"><?php echo $dil['geri-don-buton'] ?></button>
                                                


                                            </div>
                        </form>
                       
                        
                        </div>
                        </div>
                        
                        
                        
										
                            </div>
                            
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>