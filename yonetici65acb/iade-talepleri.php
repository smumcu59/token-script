<?php include 'header.php'; 

$uye_id =  $veri_cek['id'];

$connect->set_charset("utf8");


$queryy ="SELECT * FROM iade_talepleri";  
$resultt = mysqli_query($connect, $queryy);




if(isset($_SESSION['iade-isleme-alma-islemi-basarili'])){
    ?>
    <script type="text/javascript">
alert("İade işleme alındı olarak işlendi!");
</script>
<?php 
    unset($_SESSION['iade-isleme-alma-islemi-basarili']);
}

if(isset($_SESSION['red-islemi-basariyla-tamamlandi'])){
    ?>
    <script type="text/javascript">
alert("İade başarıyla red edildi!");
</script>
<?php 
    unset($_SESSION['red-islemi-basariyla-tamamlandi']);
}
if(isset($_SESSION['iade-basariyla-onaylandi'])){
    ?>
    <script type="text/javascript">
alert("İade başarıyla onaylandı!");
</script>
<?php 
    unset($_SESSION['iade-basariyla-onaylandi']);
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
							<h4 class="page-title">Tüm İade Talepleri</h4>
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
                        <h2><b>Tüm İade Talepleri</b></h2>
                        </div>
                        
                        
                        <div class="table-responsive">
                            <br> <br>
											<table id="datatable" class="display table table-striped table-hover" >
												<thead>
													<tr>
														<th>#</th>
														<th>Üye İsim Soyisim</th>
                                                        
                                                        <th>İade Sebebi</th>
                                                        <th>Tarih/Saat</th>
                                                        <th>TXID</th>
														
                                                        <th>İade Durumu</th>
                                                        
														
														
														
													</tr>
												</thead>
												
												<tbody>
                                                
											<?php 
                                            
											while($row = mysqli_fetch_array($resultt))  {

                                                
                                                
                                                
                               
                                                ?> 
                                           <tr>  
                                     
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php 
                                    $uye_id = $row['uye_id'];
                                    
                                    $veriyi_allq = $db->prepare("SELECT * from uyeler WHERE id=?");
									$veriyi_allq->execute(array($uye_id));
									$veri_cekkq = $veriyi_allq->fetch(PDO::FETCH_ASSOC);
                                    echo strip_tags($veri_cekkq['isim_soyisim']);

                                    
                                    
                                    
                                    ?></td>
                                    
                                    <td><?php

                                    echo strip_tags($row['iade_sebebi']);

                                    
                                    ?></td>
                                    <td><?php echo strip_tags($row['basvuru_tarih_saat'])?>
                                    </td>  
                                    <td><?php 
                                    
                                    $islem_id = $row['islem_id'];
                                    $veriyi_allq = $db->prepare("SELECT * from odeme_gecmisi WHERE id=?");
									$veriyi_allq->execute(array($islem_id));
									$veri_cekkq = $veriyi_allq->fetch(PDO::FETCH_ASSOC);
                                    echo strip_tags($veri_cekkq['txid_kodu']);
                                    
                                    
                                    ?></td>
									
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
                                    
                               </tr>  
                               
                          <?php } ?> </div>
												</tbody>
											</table>
										</div>
										<form action="islemler/islem.php" method="POST">
											
											
											<div class="col-md-3 col-lg-3">
                                                <br>
                                                <button type="submit" class="btn btn-secondary btn-danger  btn-stiped" type="button" name="anasayfaya-don">Geri Dön</button>
                                                


                                            </div>
											</form>
                            </div>
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>