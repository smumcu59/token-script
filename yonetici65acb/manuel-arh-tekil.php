<?php include 'header.php'; 

$uye_id =  $veri_cek['id'];

$connect->set_charset("utf8");



$queryy ="SELECT * FROM uyeler ORDER BY id DESC";  
$resultt = mysqli_query($connect, $queryy);




if(isset($_SESSION['token-yukleme-islemi-basarili'])){
    ?>
    <script type="text/javascript">
alert("Token başarıyla yüklendi!");
</script>
<?php 
    unset($_SESSION['token-yukleme-islemi-basarili']);
}

if(isset($_SESSION['limit-asildi'] )){
    ?>
    <script type="text/javascript">
alert("Talep edilen token ön satış için tanımlanan değerden fazla. Bu sebeple işlem iptal edildi.");
</script>
<?php 
    unset($_SESSION['limit-asildi'] );
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
							<h4 class="page-title"><?php echo $dil['uye-secimi-metin'] ?></h4>
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
									<a href="#"><?php echo $dil['secim-yapin-metin'] ?></a>
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
                        <h2><b><?php echo $dil['uye-secimi-metin'] ?></b></h2>
                        </div>
                        
                        
                        <div class="table-responsive">
                            <br> <br>
											<table id="datatable" class="display table table-striped table-hover" >
												<thead>
													<tr>
														
														<th><?php echo $dil['uye-isim-soyisim'] ?></th>
                                                        
                                                        <th><?php echo $dil['secenekler'] ?></th>
                                                        
                                                        
														
														
														
													</tr>
												</thead>
												
												<tbody>
                                                
											<?php 
                                            
											while($row = mysqli_fetch_array($resultt))  {

                                                
                                                
                                                
                               
                                                ?> 
                                           <tr>  
                                     
                                    <td><?php echo $row['isim_soyisim'] ?>
                                    <td>
                                    <div class="d-flex justify-content-center">
                                    <form action="islemler/islem.php" method="POST" accept-charset="utf-8">
                                    <input type="hidden" name="uye-sec" value="<?php echo $row["id"] ?>">
                                    <button type="submit" name="secim" class="btn btn-primary btn-sm btn-icon-split">
                                    <span class="icon text-white-60">
                                    <i class="fas fa-check"></i>
                                    </span>
                                    </button>
                                    </form>
                                    
                                     
									
                                    
                                   
                                    
                                    
                                    </div></td>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                   
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