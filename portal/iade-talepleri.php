<?php include 'header.php'; 

$uye_id =  $veri_cek['id'];

$connect->set_charset("utf8");



$queryy ="SELECT * FROM iade_talepleri WHERE uye_id=$uye_id ORDER BY id ASC";  
$resultt = mysqli_query($connect, $queryy);

$sayi = 0;


if(isset($_SESSION['iade-basvurusu-alindi'])){
    ?>
    <script type="text/javascript">
alert("İade Başvurunuz Başarıyla Alınmıştır. Başvurunun durumunu iade taleplerim sayfasından görüntüleyebilirsiniz. \n Bilgi: Sistem yetkililerimiz iade değerlendirme aşamasında sisteme kayıtlı elektronik posta adresiniz üzerinden sizinle iletişime geçebilir.");
</script>
<?php 
    unset($_SESSION['iade-basvurusu-alindi']);
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
							<h4 class="page-title"><?php echo $dil['iade-talepleri'] ?></h4>
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
                                
                                
                                
                        <div class="col-md-12 col-lg-12">
                        <h2><b><?php echo $dil['iade-talepleri'] ?></b></h2>
                        </div>
                        
                        
                        <div class="table-responsive">
                            <br> <br>
											<table id="datatable" class="display table table-striped table-hover" >
												<thead>
													<tr>
														<th>#</th>
														<th><?php echo $dil['basvuru-tarih-saat'] ?></th>
                                                        <th><?php echo $dil['iade-sebebi'] ?></th>
                                                        <th><?php echo $dil['iade-durumu'] ?></th>
                                                        <th><?php echo $dil['secenek-tablo'] ?></th>
                                                        
														
														
														
													</tr>
												</thead>
												
												<tbody>
                                                
											<?php 
                                            $sayi1 = 0;
											while($row = mysqli_fetch_array($resultt))  {

                                                $sayi1 = $sayi1+1;
                                                
                                                
                               
                                                ?> 
                                           <tr>  
                                     
                                    <td><?php echo $sayi1 ?>
                                    <td><?php echo strip_tags($row['basvuru_tarih_saat']) ?></td>
                                    <td><?php echo strip_tags($row['iade_sebebi']) ?></td>
                                    
                                    
                                    
                                    
                                    <td><?php 
                                    $durum = $row["iade_durumu"];
									if($durum == 4){
                                
										?>
										<span class="badge badge-success badge-pill px-25">
									<?php } elseif($durum == 1){
										?>
										<span class="badge badge-warning badge-pill px-25">
									<?php } elseif($durum == 2){
										?>
										<span class="badge badge-primary badge-pill px-25">
									<?php } elseif($durum == 3){
										?>
										<span class="badge badge-danger badge-pill px-25">
									<?php } 
									
									?> 
									<?php
									$veriyi_all = $db->prepare("SELECT * from durumlar WHERE id=?");
									$veriyi_all->execute(array($durum));
									$veri_cekk = $veriyi_all->fetch(PDO::FETCH_ASSOC);
									$durum_yazisi = $veri_cekk['durum_adi'];
									echo strip_tags($durum_yazisi);
                                    
                                    
                                    
                                    ?></td>
                                    <td>
                                    
                                    <div class="d-flex justify-content-center">
                                    <form action="islemler/islem.php" method="POST" accept-charset="utf-8">
                                    <input type="hidden" name="iade-basvurusunu-goruntule" value="<?php echo $row["id"] ?>">
                                    <button type="submit" name="iade-goruntule" class="btn btn-primary btn-sm btn-icon-split">
                                    <span class="icon text-white-60">
                                    <i class="fas fa-eye"></i>
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
										<form action="islemler/islem.php" method="POST" accept-charset="utf-8">
											
											
											<div class="col-md-3 col-lg-3">
                                                <br>
                                                <button type="submit" class="btn btn-secondary btn-success  btn-stiped" type="button" name="iade-basvurusu-yap"><?php echo $dil['iade-basvurusu-yap'] ?></button>
                                                


                                            </div>
											</form>
                            </div>
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>