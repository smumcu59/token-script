<?php include 'header.php'; 

$uye_id =  $veri_cek['id'];

$connect->set_charset("utf8");
$query ="SELECT * FROM odeme_gecmisi WHERE uye_id =$uye_id AND durum=1 OR durum=2";  
$result = mysqli_query($connect, $query); 


$queryy ="SELECT * FROM cuzdan_bilgisi WHERE uye_id=$uye_id AND durum=1";  
$resultt = mysqli_query($connect, $queryy);

$sayi = 0;
while($row = mysqli_fetch_array($result))  {
    $sayi = $sayi+1;
}


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
if(isset($_SESSION['duzenleme_islemi_basarili'])){
    ?>
    <script type="text/javascript">
    alert("Cüzdan başarıyla güncellendi!");
    </script>
<?php 
    unset($_SESSION['duzenleme_islemi_basarili']);
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
    zorunlualan
    {
        color: red;
    }
</style>

<div class="main-panel">
				<div class="content">
					<div class="page-inner">
						<div class="page-header">
							<h4 class="page-title"><?php echo $dil['cuzdanim-header'] ?></h4>
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
									<a href="#"><?php echo $dil['goruntule-metin'] ?></a>
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
                                
                                <div class="col-md-3">
							<div class="card card-dark bg-primary-gradient">
								<div class="card-body pb-0">
									
									 <h2 class="mb-2"><span class="fas fa-wallet"></span> <?php echo $veri_cek['bakiye']." ARH" ?></h2>
									<p><?php echo $dil['cuzdan-bakiyesi'] ?></p>
									
								</div>
							</div>
                                </div>
                                <div class="col-md-3">
                            <div class="card card-dark bg-warning-gradient">
								<div class="card-body pb-0">
									
									 <h2 class="mb-2"><span class="fas fa-search"></span> <?php echo $sayi." ".$dil['adet']; ?></h2>
									<p><?php echo $dil['onay-bekleyen-islem-sayisi'] ?></p>
									
								</div>
							</div>
						</div>
                        <div class="col-md-12 col-lg-12">
                        <h2><b><?php echo $dil['cuzdanlarim'] ?></b></h2>
                        </div>
                        
                        <div class="col-md-12 col-lg-12">
                        <form action="islemler/islem.php" method="POST">
                            <br>
                            <div class="row">
                            <div class="col-md-5 col-lg-5">
                            <label class="from cuzdanAdi"><?php echo $dil['cuzdan-kimligi'] ?> <zorunlualan>*</zorunlualan></label>
                                <input type="text" class="form-control form-control" name="cuzdanKimligi" placeholder="Lütfen cüzdan kimliği giriniz." required>
                                                               

                            </div>
                            <div class="col-md-5 col-lg-5">
                                <label class="from cuzdanAdi"><?php echo $dil['cuzdan-adi'] ?> <zorunlualan>*</zorunlualan></label>
                                <input type="text" class="form-control form-control" name="cuzdanAdi" placeholder="<?php echo $dil['cuzdan-adi-aciklama'] ?> " required>

                            </div>
                            <div class="col-md-2 col-lg-2">
                                <br>
                            <button class="btn btn-success" name="cuzdani-ekle" type="submit"><?php echo $dil['cuzdani-ekle-buton'] ?></button>

                            </div>
                            </div>
                        </form>
                        </div>
                        <div class="table-responsive">
                            <br> <br>
											<table id="datatable" class="display table table-striped table-hover" >
												<thead>
													<tr>
														<th><?php echo $dil['cuzdan-adi-tablo'] ?></th>
														<th><?php echo $dil['cuzdan-kimligi'] ?></th>
                                                        <th><?php echo $dil['secenek-tablo'] ?></th>
														
														
														
													</tr>
												</thead>
												
												<tbody>
											<?php 
											while($row = mysqli_fetch_array($resultt))  {

                                                
                                                
                               
                                                ?> 
                                           <tr>  
                                     
                                    <td><?php echo strip_tags($row['isim']) ?></td>  
                                    <td><?php echo strip_tags($row['cuzdan_kimligi']) ?></td>
                                    <td>
                                    <div class="d-flex justify-content-center">
                                    <form action="islemler/islem.php" method="POST" accept-charset="utf-8">
                                    <input type="hidden" name="cuzdani-duzenle" value="<?php echo $row["id"] ?>">
                                    <button type="submit" name="duzenle" class="btn btn-warning btn-sm btn-icon-split">
                                    <span class="icon text-white-60">
                                    <i class="fas fa-edit"></i>
                                    </span>
                                    </button>
                                    </form>
                                    <form class="mx-2" action="islemler/islem.php" method="POST" accept-charset="utf-8">
                                    <input type="hidden" name="cuzdani-sil" value="<?php echo $row["id"] ?>">
                                    <button type="submit" name="sil" class="btn btn-danger btn-sm btn-icon-split">
                                    <span class="icon text-white-60">
                                    <i class="fas fa-trash"></i>
                                    </span>
                                    </button>
                                    </form>
                                     
									
                                    
                                   
                                    
                                    
                                    </div>
                                    
                                    
                                    
                                    </td>  
                               </tr>  
                               
                          <?php } ?> </div>
												</tbody>
											</table>
										</div>
										<form action="islemler/islem.php" method="POST">
											
											
											<div class="col-md-3 col-lg-3">
                                                <br>
                                                <button type="submit" class="btn btn-secondary btn-danger  btn-stiped" type="button" name="anasayfaya-don"><?php echo $dil['geri-don']  ?></button>
                                                


                                            </div>
											</form>
                            </div>
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>