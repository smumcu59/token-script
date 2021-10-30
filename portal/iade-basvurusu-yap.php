<?php include 'header.php'; 

$uye_id =  $veri_cek['id'];







if(isset($_SESSION['cuzdan-basariyla-eklendi'])){
    ?>
    <script type="text/javascript">
alert("Cüzdan başarıyla eklendi!");
</script>
<?php 
    unset($_SESSION['cuzdan-basariyla-eklendi']);
}

$connect->set_charset("utf8");



$queryy ="SELECT * FROM iade_nedenleri";  
$resultt = mysqli_query($connect, $queryy);

$query ="SELECT * FROM odeme_gecmisi WHERE uye_id=$uye_id ORDER BY id DESC";  
$result = mysqli_query($connect, $query);

?>

<style>
   
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
    zorunlualan
    {
        color: red;
    }
</style>

<div class="main-panel">
				<div class="content">
					<div class="page-inner">
						<div class="page-header">
							<h4 class="page-title"><?php echo $dil['iade-basvurusu-yap'] ?></h4>
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
									<a href="#"><?php echo $dil['basvuru'] ?></a>
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
                        <h2><b><?php echo $dil['iade-basvurusu-yap'] ?></b></h2>
                        </div>
                        <form action="islemler/islem.php" method="POST">

                        <div class="col-md-12 col-lg-12">

                        <div class="row">
                        
                        <div class="col-md-6 col-lg-6">
                        <br>
                        <label class="from tarih_saat"><?php echo $dil['islem-kimligi'] ?> <zorunlualan>*</zorunlualan></label>
                        <select name="islem_secimi" class="form-control form-control" required>
                        <?php
                         while($row = mysqli_fetch_array($result))  {

                            
                                                
                                                
                               
                            ?> 
                        
                        
                            <option value="<?php echo $row['id']; ?>"><?php echo strip_tags($row['txid_kodu'])." (".strip_tags($row['tarih_saat']).")" ?></option>
                            <?php } ?>


                        </select>
                        
                        </div>
                        <div class="col-md-6 col-lg-6">
                        <br>
                        <label class="from iade_sebebi"><?php echo $dil['iade-sebebi'] ?> <zorunlualan>*</zorunlualan></label>
                        <select name="iade_sebebi_secimi" class="form-control form-control" required>
                        <?php 
                        while($row = mysqli_fetch_array($resultt))  {

                            
                                                
                                                
                               
                            ?> 
                        
                        
                            <option><?php echo strip_tags($row['neden']) ?></option>
                            <?php } ?>
                        </select>
                        </div>
                        <div class="col-md-12 col-lg-12">
                        <br>
                        <label class="from aciklama"><?php echo $dil['kullanici-yorumu']  ?> <zorunlualan>*</zorunlualan></label>
                        <textarea class="form-control form-control" id="siyah" name="aciklama" required ></textarea>
                        </div>
                        </div>
                        </div>
                        
                        
                        
										
											
											
											<div class="col-md-3 col-lg-3">
                                                <br>
                                                <button type="submit" class="btn btn-secondary btn-primary  btn-stiped" type="button" name="iade-basvurusu-isle"><?php echo $dil['basvuruyu-gonder']  ?></button>
                                                


                                            </div>
											</form>
                            </div>
                            









                            </div>
                            </div>
                        </div>
                        
   
                        
   







<?php include 'footer.php'; ?>