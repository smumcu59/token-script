<?php include 'header.php'; 

$uye_id =  $veri_cek['id'];

$connect->set_charset("utf8");



$queryy ="SELECT * FROM yoneticiler ORDER BY id DESC";  
$resultt = mysqli_query($connect, $queryy);

$sayi = 0;


if(isset($_SESSION['yonetici-basariyla-guncellendi'])){
    ?>
    <script type="text/javascript">
alert("Yönetici Başarıyla Güncellendi!");
</script>
<?php 
    unset($_SESSION['yonetici-basariyla-guncellendi']);
}

if(isset($_SESSION['yonetici-basariyla-silindi'])){
    ?>
    <script type="text/javascript">
alert("Yönetici başarıyla silindi!");
</script>
<?php 
    unset($_SESSION['yonetici-basariyla-silindi']);
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
							<h4 class="page-title"><?php echo $dil['yonetici-listesi-metin'] ?></h4>
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
                        <h2><b><?php echo $dil['yonetici-listesi-metin'] ?></b></h2>
                        </div>
                        
                        
                        <div class="table-responsive">
                            <br> <br>
											<table id="datatable" class="display table table-striped table-hover" >
												<thead>
													<tr>
														<th>#</th>
														<th><?php echo $dil['isim-soyisim'] ?></th>
                                                        <th><?php echo $dil['eposta-adresi'] ?></th>
                                                        <th><?php echo $dil['telefon-numarasi-metin'] ?></th>
                                                        <th><?php echo $dil['secenekler'] ?></th>
                                                        
														
														
														
													</tr>
												</thead>
												
												<tbody>
                                                
											<?php 
                                            
											while($row = mysqli_fetch_array($resultt))  {

                                                
                                                
                                                
                               
                                                ?> 
                                           <tr>  
                                     
                                    <td><?php echo $row['id'] ?>
                                    <td><?php echo strip_tags($row['ad_soyad']) ?></td>
                                    <td><?php echo strip_tags($row['elektronik_posta_adresi']) ?></td>
                                    <td><?php
                                    echo strip_tags($row['telefon_numarasi']);
                                    
                                    ?></td>
                                    
                                    
                                    
                                    
                                    
                                    
                                    <td> 
                                    <div class="d-flex justify-content-center">
                                    <form action="islemler/islem.php" method="POST" accept-charset="utf-8">
                                    <input type="hidden" name="yoneticiyi-duzenle" value="<?php echo $row["id"] ?>">
                                    <button type="submit" name="duzenle" class="btn btn-warning btn-sm btn-icon-split">
                                    <span class="icon text-white-60">
                                    <i class="fas fa-edit"></i>
                                    </span>
                                    </button>
                                    </form>
                                    <form class="mx-2" action="islemler/islem.php" method="POST" accept-charset="utf-8">
                                    <input type="hidden" name="yoneticiyi-sil" value="<?php echo $row["id"] ?>">
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
										
                            </div>
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>