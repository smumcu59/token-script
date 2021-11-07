<?php include 'header.php'; 

$uye_id = $veri_cek['id'];

$veriyi_alsinsqs = $db->prepare("SELECT * FROM token_ayarlari WHERE id = 1");
$veriyi_alsinsqs->execute();
$veri_ceek = $veriyi_alsinsqs->fetch(PDO::FETCH_ASSOC);

$odeme_yapilacak_cuzdan_id = $veri_ceek['cuzdan_kimligi'];

$paket_kimligi = $_SESSION['paket_kimligi'];
$toplam_token = $_SESSION['toplam_token'];
$toplam_tutar = $_SESSION['toplam_tutar'];
$paket_adedi = $_SESSION['paket_adedi'];
$hediyeli_tutar = $_SESSION['hediye_edilen_tutar'];

$hediye_haric_tutar = $toplam_token-$hediyeli_tutar;
$_SESSION['hediye_haric_tutar'] = $hediye_haric_tutar;


$veriyi_alsinsqsq = $db->prepare("SELECT * FROM paketler WHERE id=:id_kimlik");
$veriyi_alsinsqsq->execute(array(':id_kimlik' => $paket_kimligi));
$veri_ceekq = $veriyi_alsinsqsq->fetch(PDO::FETCH_ASSOC);

$paket_adi = $veri_ceekq['paket_adi'];
$paket_fiyati = $veri_ceekq['paket_fiyati'];

$connect->set_charset("utf8");
$query ="SELECT * FROM cuzdan_bilgisi WHERE uye_id=$uye_id AND durum=1";  
$result = mysqli_query($connect, $query); 

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
    zorunlualan
    {
      color: red;
    }
</style>


<div class="main-panel">
				<div class="content">
					<div class="page-inner">
						<div class="page-header">
							<h4 class="page-title"><?php echo $dil['kasa'] ?></h4>
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
									<a href="#"><?php echo $dil['satin-alim-islemi']  ?></a>
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
   
                        <body class="bg-dark">
                            <div class="card card-body">
                                <div class="deneme">
   <div class="container">
  

  <div class="row" >
    <div class="col-md-4 order-md-2 mb-4 ">
      <h4 class="d-flex justify-content-between align-items-center mb-3 ">
        <span class="text-muted"><?php echo $dil['secimlerim'] ?></span>
        <span class="badge badge-secondary badge-pill"><?php echo strip_tags($paket_adedi)." ".$dil['adet'] ?></span> 
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0"><beyaz><?php echo strip_tags($paket_adi) ?> x <?php echo strip_tags($paket_adedi) ?> </beyaz></h6>
            <small class="text-muted"><beyaz><?php echo $dil['tek-paket-fiyati']  ?> : $<?php echo strip_tags($paket_fiyati) ?> </beyaz></small>
          </div>
          <span class="text-muted"><beyaz>$<?php echo strip_tags($toplam_tutar) ?> </beyaz></span>
        </li>
        
       
       
        <li class="list-group-item d-flex justify-content-between">
          <span><?php echo $dil['toplam-tutar'] ?> (USD)</span>
          <strong>$<?php echo strip_tags($toplam_tutar) ?></strong>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span><?php echo $dil['hediyesiz-toplam-token'] ?> :</span>
          <strong><?php echo strip_tags($hediye_haric_tutar) ?> <?php echo $birim ?></strong>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span><?php echo $dil['hediye-edilen-toplam-token'] ?> :</span>
          <strong><?php echo strip_tags($hediyeli_tutar) ?> <?php echo $birim ?></strong>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span><?php echo $dil['hesaba-yatacak-toplam-token'] ?> :</span>
          <strong><?php echo strip_tags($toplam_token) ?> <?php echo $birim ?></strong>
        </li>
      </ul>

     
    </div>
    <div class="col-md-8 order-md-1">
      
      <form action="islemler/islem.php" method="POST">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName"><?php echo $dil['islem-kimligi'] ?> <zorunlualan>*</zorunlualan></label>
            <input type="text" class="form-control" name="txid" placeholder="<?php echo $dil['islem-kimligi-aciklama'] ?>" value="" required>
            
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName"><?php echo $dil['iade-cuzdaniniz'] ?> <zorunlualan>*</zorunlualan></label>
            <select class="form-control form-control" name="cuzdan_secimi">
            <?php 
            while($row = mysqli_fetch_array($result))  {
                ?>
                <option id="cuzdan" value="<?php echo $row['id'] ?>"><?php echo strip_tags($row['isim']); ?></option>

                                                
                                                
                     <?php } ?>       

        </select>
            
          </div>
        </div>
    
       

       

       

        

        
       

        <h4 class="mb-3"><?php echo $dil['odeme'] ?></h4>
        <div class="row">

        <div class="col-md-5 col-lg-5">
            <label><?php echo $dil['odeme-yapacaginiz-odeme-adresi'] ?> </label>
        </div>
        <div class="col-md-6 col-lg-6">
            <input type="text" id="siyah" class="form-control form-control" name="odeme-yapilacak-adres" value="<?php echo strip_tags($odeme_yapilacak_cuzdan_id) ?>" disabled>
            
        </div>
        <div class="col-md-12 col-lg-12">
            <label><br><turuncu> <b> <?php echo $dil['uyari']; ?> </b> </turuncu> <?php echo $dil['uyari-1-aciklama'] ?></label> 
            <label><br><turuncu> <b> <?php echo $dil['uyari']; ?> </b>  </turuncu> <?php echo $dil['uyari-2-aciklama'] ?></label>
            <label><br><mavi> <b> <?php echo $dil['bilgi']; ?> </b>  </mavi> <?php echo $dil['bilgi-1-aciklama'] ?></label>
            <label><br><mavi> <b> <?php echo $dil['bilgi']; ?> </b>  </mavi> <?php echo $dil['bilgi-2-aciklama'] ?></label>
        </div>
        <div class="col-md-12 col-lg-12">
                                            <br>
                                        <input type="checkbox" id="onay-butonu" name="onay" required>  <?php echo $dil['onay-yazisi'] ?>
                                        
                                        
                                        </div>
       
        </div>
        
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" name="satin-alimi-onayla" type="submit"><?php echo $dil['satin-alimi-onayla'] ?></button>
      </form>
    </div>
  </div>

  
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="form-validation.js"></script>

</body>










<?php include 'footer.php'; ?>