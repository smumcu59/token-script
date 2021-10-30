<?php include 'header.php'; 

$uye_id =  $veri_cek['id'];

$connect->set_charset("utf8");



$queryy ="SELECT * FROM iade_nedenleri ORDER BY id DESC";  
$resultt = mysqli_query($connect, $queryy);

$sayi = 0;


if(isset( $_SESSION['iade-nedeni-basariyla-guncellendi'])){
    ?>
    <script type="text/javascript">
alert("İade nedeni başarıyla güncellendi!");
</script>
<?php 
    unset( $_SESSION['iade-nedeni-basariyla-guncellendi']);
}

if(isset($_SESSION['iade-nedeni-basariyla-silindi'])){
    ?>
    <script type="text/javascript">
alert("İade nedeni başarıyla silindi!");
</script>
<?php 
    unset($_SESSION['iade-nedeni-basariyla-silindi']);
}

if(isset($_SESSION['iade-nedeni-basariyla-eklendi'] )){
    ?>
    <script type="text/javascript">
alert("İade nedeni başarıyla eklendi!");
</script>
<?php 
    unset($_SESSION['iade-nedeni-basariyla-eklendi'] );
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
							<h4 class="page-title">İade Nedenleri</h4>
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
									<a href="#">Yönetim İşlemi</a>
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
                        <h2><b>İade Nedenleri</b></h2>
                        </div>
                        <div class="col-md-12 col-lg-12">
                        <br>
                        <form action="islemler/islem.php" method="POST">
                            <br>
                            <div class="row">
                            <div class="col-md-5 col-lg-5">
                            <label class="from cuzdanAdi">İade Nedeni <zorunlualan>*</zorunlualan></label>
                                <input type="text" class="form-control form-control" name="iade_nedeni" placeholder="Lütfen bir iade nedeni girin." required>
                                                               

                            </div>
                            
                            <div class="col-md-2 col-lg-2">
                                <br>
                            <button class="btn btn-success" name="iade-nedenini-ekle" type="submit">İade Nedenini Ekle</button>

                            </div>
                            </div>
                        </form>
                        </div>
                        
                        <div class="table-responsive">
                            <br> <br>
											<table id="datatable" class="display table table-striped table-hover" >
												<thead>
													<tr>
														<th>İade Nedeni</th>
														
                                                        <th>Seçenekler</th>
                                                        
														
														
														
													</tr>
												</thead>
												
												<tbody>
                                                
											<?php 
                                            
											while($row = mysqli_fetch_array($resultt))  {

                                                
                                                
                                                
                               
                                                ?> 
                                           <tr>  
                                     
                                    <td><?php echo strip_tags($row['neden']) ?>

                                    
                                    <td> 
                                    <div class="d-flex justify-content-center">
                                    <form action="islemler/islem.php" method="POST" accept-charset="utf-8">
                                    <input type="hidden" name="iade-nedenini-duzenle" value="<?php echo $row["id"] ?>">
                                    <button type="submit" name="duzenle" class="btn btn-warning btn-sm btn-icon-split">
                                    <span class="icon text-white-60">
                                    <i class="fas fa-edit"></i>
                                    </span>
                                    </button>
                                    </form>
                                    <form class="mx-2" action="islemler/islem.php" method="POST" accept-charset="utf-8">
                                    <input type="hidden" name="iade-nedenini-sil" value="<?php echo $row["id"] ?>">
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