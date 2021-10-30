<?php include 'header.php'; 

$uye_id =  $veri_cek['id'];

$connect->set_charset("utf8");



$queryy ="SELECT * FROM cuzdan_bilgisi ORDER BY id DESC";  
$resultt = mysqli_query($connect, $queryy);

$sayi = 0;


if(isset($_SESSION['cuzdan-basariyla-guncellendi'])){
    ?>
    <script type="text/javascript">
alert("Cüzdan başarıyla güncellendi!");
</script>
<?php 
    unset($_SESSION['cuzdan-basariyla-guncellendi']);
}

if(isset($_SESSION['cuzdan-silme-islemi-basarili'] )){
    ?>
    <script type="text/javascript">
alert("Cüzdan Başarıyla Silindi!");
</script>
<?php 
    unset($_SESSION['cuzdan-silme-islemi-basarili'] );
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
							<h4 class="page-title">Cüzdan Listesi</h4>
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
                        <h2><b>Cüzdan Listesi</b></h2>
                        </div>
                        
                        
                        <div class="table-responsive">
                            <br> <br>
											<table id="datatable" class="display table table-striped table-hover" >
												<thead>
													<tr>
														<th>#</th>
														<th>Cüzdan Kimliği</th>
                                                        <th>Cüzdan Takma Adı</th>
                                                        <th>Üye Adı</th>
                                                        <th>Cüzdan Aktifliği</th>
                                                        <th>Seçenekler</th>
                                                        
                                                        
														
														
														
													</tr>
												</thead>
												
												<tbody>
                                                
											<?php 
                                            
											while($row = mysqli_fetch_array($resultt))  {

                                                
                                                
                                                
                               
                                                ?> 
                                           <tr>  
                                     
                                    <td><?php echo strip_tags($row['id']) ?>
                                    <td><?php echo strip_tags($row['cuzdan_kimligi']) ?></td>
                                    <td><?php echo strip_tags($row['isim']) ?></td>
                                    
                                    <td><?php
                                    $uye_id = $row['uye_id'];

                                    $veriyi_alsinsssp = $db->prepare("SELECT * FROM uyeler WHERE id=?");
                                    $veriyi_alsinsssp->execute(array($uye_id));
                                    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
                                    echo $veriyi_ceksinsssp['isim_soyisim'];
                                    
                                    ?></td>
                                    <td><?php 
                                    $aktiflik = $row['durum'];
                                    if($aktiflik == 1){
                                        ?>
                                        <span class="badge badge-success badge-pill px-35">
                                        <?php echo "Aktif cüzdan";
                                    } else{
                                        ?>
                                        <span class="badge badge-danger badge-pill px-35">
                                        <?php
                                        echo "Devre dışı cüzdan";
                                    }
                                    
                                    ?></td>
                                    
                                    
                                    
                                    
                                    
                                    
                                    <td> 
                                    <div class="d-flex justify-content-center">
                                    <form action="islemler/islem.php" method="POST" accept-charset="utf-8">
                                    <input type="hidden" name="cuzdani-guncelleyin" value="<?php echo $row["id"] ?>">
                                    <button type="submit" name="duzenle" class="btn btn-warning btn-sm btn-icon-split">
                                    <span class="icon text-white-60">
                                    <i class="fas fa-edit"></i>
                                    </span>
                                    </button>
                                    </form>
                                    <form class="mx-2" action="islemler/islem.php" method="POST" accept-charset="utf-8">
                                    <input type="hidden" name="cuzdani-silin" value="<?php echo $row["id"] ?>">
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