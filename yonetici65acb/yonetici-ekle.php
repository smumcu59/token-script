<?php include 'header.php'; 


$connect->set_charset("utf8");



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
							<h4 class="page-title"><?php echo $dil['yonetici-ekle-baslik'] ?></h4>
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
									<a href="#"><?php echo $dil['ekleme-islemi-metin'] ?></a>
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
                        <h2><b><?php echo $dil['yonetici-ekle-baslik'] ?></b></h2>
                        </div>

                        <div class="col-md-12 col-lg-12">

                        <div class="row">
                        <div class="col-md-3 col-lg-3">
                        <br>
                        <label class="from tarih_saat"><?php echo $dil['yonetici-isim-soyisim-metin'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="isim_soyisim" required >
                        </div>
                        <div class="col-md-3 col-lg-3">
                        <br>
                        <label class="from tarih_saat"><?php echo $dil['yonetici-eposta-metin'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="e_posta" required >
                        
                        </div>
                        <div class="col-md-3 col-lg-">
                        <br>
                        <label class="from tarih_saat"><?php echo $dil['yonetici-telefon-metin'] ?></label>
                        <input type="text" class="form-control form-control" id="siyah" name="telefon" required >
                        
                        </div>
                        <div class="col-md-3 col-lg-">
                        <br>
                        <label class="from tarih_saat"><?php echo $dil['yonetici-parolasi-metin'] ?></label>
                        <input type="password" class="form-control form-control" id="siyah" name="parola" required >
                        
                        </div>
                        <div class="col-md-2 col-lg-2">
                        <br> <br>
                            <button type="submit" class="btn btn-secondary btn-success  btn-stiped" type="button" name="yoneticiyi-ekle"><?php echo $dil['yoneticiyi-ekle-buton'] ?></button>
                                                


                        </div>
                        <div class="col-md-3 col-lg-3">
                                                <br> <br>
                                                <button type="submit" class="btn btn-secondary btn-danger  btn-stiped" type="button" name="yonetici-listesine-geri-don"><?php echo $dil['geri-don-buton'] ?></button>
                                                


                                            </div>
                        </form>
                       
                        
                        </div>
                        </div>
                        
                        
                        
										
                            </div>
                            
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>