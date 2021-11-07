<?php include 'header.php'; 


$metin = "Standart Alım";

$connect->set_charset("utf8");
 


$queryy ="SELECT * FROM odeme_gecmisi WHERE durum=4";  
$resultt = mysqli_query($connect, $queryy);





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
							<h4 class="page-title"><?php echo $dil['tamamlanan-satislar-metin'] ?></h4>
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
                        <h2><b><?php echo $dil['tamamlanan-satislar-metin'] ?></b></h2>
                        </div>
                        
                        
                        <div class="table-responsive">
                            <br> <br>
											<table id="datatable" class="display table table-striped table-hover" >
												<thead>
													<tr>
														<th>#</th>
														<th><?php echo $dil['txid-metin'] ?></th>
                                                        <th><?php echo $dil['tarih-saat'] ?></th>
                                                        <th><?php echo $dil['odeme-saglanan-cuzdan'] ?></th>
                                                        <th><?php echo $dil['yatirilacak_token'] ?></th>
                                                        <th><?php echo $dil['odenen-tutar-metin'] ?></th>
														<th><?php echo $dil['islem-turu-metin'] ?></th>
                                                        <th><?php echo $dil['islem-durumu-metin'] ?></th>
														
														
														
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

                                    $cuzdan_adi = $veri_cekkq['isim'];

                                    $uye_id = $veri_cekkq['uye_id'];

                                    $veriyi_allqq = $db->prepare("SELECT * from uyeler WHERE id=?");
									$veriyi_allqq->execute(array($uye_id));
									$veri_cekkqq = $veriyi_allqq->fetch(PDO::FETCH_ASSOC);
                                    
                                    $isim_soyisim = $veri_cekkqq['isim_soyisim'];

                                    $cuzdan_adi = $veri_cekkq['isim'];
                                    echo strip_tags($cuzdan_adi." "."(".$isim_soyisim.")");
                                    
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
                                                <button type="submit" class="btn btn-secondary btn-danger  btn-stiped" type="button" name="anasayfaya-don"><?php echo $dil['geri-don-buton'] ?></button>
                                                


                                            </div>
											</form>
                            </div>
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>