<?php include 'header.php'; 

$uye_id =  $veri_cek['id'];

$connect->set_charset("utf8");


$queryy ="SELECT * FROM iade_talepleri WHERE iade_durumu=1 OR iade_durumu=2";  
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
							<h4 class="page-title"><?php echo $dil['bekleyen-iade-talepleri-baslik'] ?></h4>
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
									<a href="#"><?php echo $dil['isleme-yazi']; ?></a>
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
                        <h2><b><?php echo $dil['bekleyen-iade-talepleri-baslik'] ?></b></h2>
                        </div>
                        
                        
                        <div class="table-responsive">
                            <br> <br>
											<table id="datatable" class="display table table-striped table-hover" >
												<thead>
													<tr>
														<th>#</th>
														<th><?php echo $dil['uye-isim-soyisim'] ?></th>
                                                        
                                                        <th><?php echo $dil['iade-sebebi'] ?></th>
                                                        <th><?php echo $dil['tarih-saat'] ?></th>
                                                        <th><?php echo $dil['txid'] ?></th>
														
                                                        <th><?php echo $dil['iade-durumu'] ?></th>
                                                        <th><?php echo $dil['secenekler'] ?></th>
														
														
														
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
                                    echo $veri_cekkq['isim_soyisim'];

                                    
                                    
                                    
                                    ?></td>
                                    
                                    <td><?php

                                    echo $row['iade_sebebi'];

                                    
                                    ?></td>
                                    <td><?php echo $row['basvuru_tarih_saat']?>
                                    </td>  
                                    <td><?php 
                                    
                                    $islem_id = $row['islem_id'];
                                    $veriyi_allq = $db->prepare("SELECT * from odeme_gecmisi WHERE id=?");
									$veriyi_allq->execute(array($islem_id));
									$veri_cekkq = $veriyi_allq->fetch(PDO::FETCH_ASSOC);
                                    echo $veri_cekkq['txid_kodu'];
                                    
                                    
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
									echo $durum_yazisi;
                                    
                                    
                                    
                                    ?></td>
                                    <td>
                                    <div class="d-flex justify-content-center">
                                    <form action="islemler/islem.php" method="POST" accept-charset="utf-8">
                                    <input type="hidden" name="iadeyi-isleme-al" value="<?php echo $row["id"] ?>">
                                    <button type="submit" name="isleme-al" class="btn btn-primary btn-sm btn-icon-split">
                                    <span class="icon text-white-60">
                                    <i class="fas fa-edit"></i>
                                    </span>
                                    </button>
                                    </form>
                                    <form action="islemler/islem.php" method="POST" accept-charset="utf-8">
                                    <input type="hidden" name="iadeyi-red-et" value="<?php echo $row["id"] ?>">
                                    <button type="submit" name="red-et" class="btn btn-danger btn-sm btn-icon-split">
                                    <span class="icon text-white-60">
                                    <i class="fas fa-trash"></i>
                                    </span>
                                    </button>
                                    </form>
                                    <form action="islemler/islem.php" method="POST" accept-charset="utf-8">
                                    <input type="hidden" name="iadeyi-onayla" value="<?php echo $row["id"] ?>">
                                    <button type="submit" name="onayla" class="btn btn-success btn-sm btn-icon-split">
                                    <span class="icon text-white-60">
                                    <i class="fas fa-check"></i>
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
                                                <button type="submit" class="btn btn-secondary btn-danger  btn-stiped" type="button" name="anasayfaya-don"><?php echo $dil['geri-don-buton'] ?></button>
                                                


                                            </div>
											</form>
                            </div>
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>