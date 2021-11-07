<?php include 'header.php'; 

$uye_id =  $veri_cek['id'];

$connect->set_charset("utf8");
$query ="SELECT * FROM odeme_gecmisi WHERE uye_id =$uye_id AND durum=1 OR durum=2";  
$result = mysqli_query($connect, $query); 


$queryy ="SELECT * FROM odeme_gecmisi WHERE uye_id=$uye_id ORDER BY id ASC";  
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
							<h4 class="page-title"><?php echo $dil['islem-gecmisi'] ?></h4>
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
									
									 <h2 class="mb-2"><span class="fas fa-wallet"></span> <?php echo strip_tags($veri_cek['bakiye'])." ".$birim ?></h2>
									<p><?php echo $dil['cuzdan-bakiyesi'] ?></p>
									
								</div>
							</div>
                                </div>
                                <div class="col-md-3">
                            <div class="card card-dark bg-warning-gradient">
								<div class="card-body pb-0">
									
									 <h2 class="mb-2"><span class="fas fa-search"></span> <?php echo $sayi." ".$dil['adet'] ?></h2>
									<p><?php echo $dil['onay-bekleyen-islem-sayisi'] ?></p>
									
								</div>
							</div>
						</div>
                        <div class="col-md-12 col-lg-12">
                        <h2><b><?php echo $dil['islem-gecmisi'] ?></b></h2>
                        </div>
                        
                        
                        <div class="table-responsive">
                            <br> <br>
											<table id="datatable" class="display table table-striped table-hover" >
												<thead>
													<tr>
														<th>#</th>
														<th><?php echo $dil['txid-islem-numarasi'] ?></th>
                                                        <th><?php echo $dil['tarih-saat'] ?></th>
                                                        <th><?php echo $dil['iade-cuzdani'] ?></th>
                                                        <th><?php echo $dil['token-metin'] ?></th>
														
                                                        <th><?php echo $dil['odenen-tutar'] ?></th>
														<th><?php echo $dil['islem-turu'] ?></th>
                                                        <th><?php echo $dil['islem-durumu'] ?></th>
														
														
														
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
                                    <td><?php echo strip_tags($row['txid_kodu']) ?></td>
                                    <td><?php echo strip_tags($row['tarih_saat']) ?></td>
                                    <td><?php

                                    $cuzdan_id = $row['odenen_cuzdan_id'];

                                    $veriyi_allq = $db->prepare("SELECT * from cuzdan_bilgisi WHERE id=?");
									$veriyi_allq->execute(array($cuzdan_id));
									$veri_cekkq = $veriyi_allq->fetch(PDO::FETCH_ASSOC);
                                    echo strip_tags($veri_cekkq['isim']);
                                    
                                    
                                    ?></td>
                                    <td><?php echo strip_tags($row['yatirilacak_token'])." ".$birim; ?>
                                    </td>  
                                    <td><?php echo "$".strip_tags($row['odenen_tutar']) ?></td>
									<td><?php echo strip_tags($row['tur']) ?></td>
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
                               </tr>  
                               
                          <?php } ?> </div>
												</tbody>
											</table>
										</div>
										<form action="islemler/islem.php" method="POST">
											
											
											<div class="col-md-3 col-lg-3">
                                                <br>
                                                <button type="submit" class="btn btn-secondary btn-danger  btn-stiped" type="button" name="anasayfaya-don"><?php echo $dil['geri-don'] ?></button>
                                                


                                            </div>
											</form>
                            </div>
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>