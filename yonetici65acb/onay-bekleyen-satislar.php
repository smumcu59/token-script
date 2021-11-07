<?php include 'header.php'; 

$uye_id =  $veri_cek['id'];

$connect->set_charset("utf8");


$queryy ="SELECT * FROM odeme_gecmisi WHERE durum=1 OR durum=2";  
$resultt = mysqli_query($connect, $queryy);




if(isset($_SESSION['isleme-basariyla-alindi'])){
    ?>
    <script type="text/javascript">
alert("Seçmiş olduğunuz satış işleme alındı olarak işaretlendi!");
</script>
<?php 
    unset($_SESSION['isleme-basariyla-alindi']);
}

if(isset($_SESSION['red-etme-islemi-basariyla-tamamlandı'])){
    ?>
    <script type="text/javascript">
alert("Seçmiş olduğunuz satış red edildi olarak işaretlendi!");
</script>
<?php 
    unset($_SESSION['red-etme-islemi-basariyla-tamamlandı']);
}
if(isset($_SESSION['onaylama-islemi-basarili'])){
    ?>
    <script type="text/javascript">
alert("Seçmiş olduğunuz satış onaylandı olarak işaretlendi!");
</script>
<?php 
    unset($_SESSION['onaylama-islemi-basarili']);
}
if(isset($_SESSION['limit-asildi'])){
    ?>
    <script type="text/javascript">
alert("Ön satış için belirlenen değer aşıldığı için işlem iptal edildi!");
</script>
<?php 
    unset($_SESSION['limit-asildi']);
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
							<h4 class="page-title"><?php echo $dil['satis-islemi-baslik'] ?></h4>
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
									<a href="#"><?php echo $dil['isleme-yazi'] ?></a>
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
                        <h2><b><?php echo $dil['satis-islemi-baslik'] ?></b></h2>
                        </div>
                        
                        
                        <div class="table-responsive">
                            <br> <br>
											<table id="datatable" class="display table table-striped table-hover" >
												<thead>
													<tr>
														
														<th><?php echo $dil['txid-metin'] ?></th>
                                                        
                                                        <th><?php echo $dil['odeme-saglanan-cuzdan'] ?></th>
                                                        <th><?php echo $dil['yatirilacak_token'] ?></th>
                                                        <th><?php echo $dil['odenen-tutar-metin'] ?></th>

														
                                                        <th><?php echo $dil['islem-durumu-metin'] ?></th>
                                                        <th><?php echo $dil['secenekler'] ?></th>
														
														
														
													</tr>
												</thead>
												
												<tbody>
                                                
											<?php 
                                            
											while($row = mysqli_fetch_array($resultt))  {

                                                
                                                
                                                
                               
                                                ?> 
                                           <tr>  
                                     
                                    
                                    <td><?php echo strip_tags($row['txid_kodu']) ?></td>
                                    
                                    <td><?php

                                    $cuzdan_id = $row['odenen_cuzdan_id'];

                                    $veriyi_allq = $db->prepare("SELECT * from cuzdan_bilgisi WHERE id=?");
									$veriyi_allq->execute(array($cuzdan_id));
									$veri_cekkq = $veriyi_allq->fetch(PDO::FETCH_ASSOC);
                                    echo strip_tags($veri_cekkq['cuzdan_kimligi']);
                                    
                                    
                                    ?></td>
                                    <td><?php echo strip_tags($row['yatirilacak_token'])." ".$birim; ?>
                                    </td>  
                                    <td><?php echo "$".strip_tags($row['odenen_tutar']) ?></td>
									
                                    <td><?php 
                                    $durum = $row["durum"];
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
                                    <input type="hidden" name="satisi-isleme-al" value="<?php echo $row["id"] ?>">
                                    <button type="submit" name="isleme-al" class="btn btn-primary btn-sm btn-icon-split">
                                    <span class="icon text-white-60">
                                    <i class="fas fa-edit"></i>
                                    </span>
                                    </button>
                                    </form>
                                    <form action="islemler/islem.php" method="POST" accept-charset="utf-8">
                                    <input type="hidden" name="satisi-red-et" value="<?php echo $row["id"] ?>">
                                    <button type="submit" name="red-et" class="btn btn-danger btn-sm btn-icon-split">
                                    <span class="icon text-white-60">
                                    <i class="fas fa-trash"></i>
                                    </span>
                                    </button>
                                    </form>
                                    <form action="islemler/islem.php" method="POST" accept-charset="utf-8">
                                    <input type="hidden" name="satisi-onayla" value="<?php echo $row["id"] ?>">
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