<?php include 'header.php';

$veriyi_alsinsqs = $db->prepare("SELECT * FROM paketler WHERE id = 1");
$veriyi_alsinsqs->execute();
$veri_ceek = $veriyi_alsinsqs->fetch(PDO::FETCH_ASSOC);


$paket_kimligi_1 = $veri_ceek['id'];
$paket_adi_1 = $veri_ceek['paket_adi'];
$paket_fiyati_1 = $veri_ceek['paket_fiyati'];
$token_degeri_1 = $veri_ceek['token_degeri'];
$paket_aciklamasi_1 = $veri_ceek['paket_aciklamasi'];
$paket_kazanci_1 = $veri_ceek['paket_kazanci'];

$veriyi_alsinsqs = $db->prepare("SELECT * FROM paketler WHERE id = 2");
$veriyi_alsinsqs->execute();
$veri_ceek = $veriyi_alsinsqs->fetch(PDO::FETCH_ASSOC);

$paket_kimligi_2 = $veri_ceek['id'];
$paket_adi_2 = $veri_ceek['paket_adi'];
$paket_fiyati_2 = $veri_ceek['paket_fiyati'];
$token_degeri_2 = $veri_ceek['token_degeri'];
$paket_aciklamasi_2 = $veri_ceek['paket_aciklamasi'];
$paket_kazanci_2 = $veri_ceek['paket_kazanci'];

$veriyi_alsinsqs = $db->prepare("SELECT * FROM paketler WHERE id = 3");
$veriyi_alsinsqs->execute();
$veri_ceek = $veriyi_alsinsqs->fetch(PDO::FETCH_ASSOC);

$paket_kimligi_3 = $veri_ceek['id'];
$paket_adi_3 = $veri_ceek['paket_adi'];
$paket_fiyati_3 = $veri_ceek['paket_fiyati'];
$token_degeri_3 = $veri_ceek['token_degeri'];
$paket_aciklamasi_3 = $veri_ceek['paket_aciklamasi'];
$paket_kazanci_3 = $veri_ceek['paket_kazanci'];


if(isset($_SESSION['token-siniri-asildi'])){
  ?>
  <script type="text/javascript">
  alert("Değerli müşteri; \nSistem üzerinde talep ettiğiniz token değeri sisteme adanan ön satış değerini aşmaktadır. Lütfen daha az token almayı deneyin. Sistem üzerinde satın alınabilir token sayısını öğrenmek için www.archivetoken.net adresini ziyaret edin.");
   </script>
<?php 
    unset($_SESSION['token-siniri-asildi']);
}

if(isset($_SESSION['satin-alim-basarili'])){
  ?>
  <script type="text/javascript">
  alert("Değerli müşteri; \n Satın alım işleminiz başarıyla tamamlanmıştır. Ödeme sistem yöneticileri tarafından onaylandıktan sonra cüzdanınıza yansıyacaktır. ");
   </script>
<?php 
    unset($_SESSION['satin-alim-basarili']);
}

?>

<style>

burs
{
    color: orangered;
    
}


/* CSS Document */
@import url(http://fonts.googleapis.com/css?family=Open+Sans:300italic,500,400,300,800);
@import url(http://fonts.googleapis.com/css?family=Ubuntu:300,400,700);
@import url(http://fonts.googleapis.com/css?family=Roboto:100,300,400);

body{ 
    background-color:#f0f3f6;
  overflow-x: hidden;

}
h1,h2,h3,h4,h5,h6,div,input,p,a{
    font-family: "Open Sans";  
    margin:0px; 
}

h3{ 
    font-size:22px;
}
.container-fluid,.container { 
    margin:auto;
  padding:0px 15px;
  max-width:1200px;
}
label{
  font-weight:500;
}
.form-group{
  margin-bottom:5px;
}


input,textarea,select,button{ 
    margin: 5px 0px ;
    font-size:13px !important; 
    border-radius:0px;
}
input[type=text],input[type=password],textarea,input[type=email],select,textarea{ 
    width: 100%; 
    border:1px solid #DADADA; 
    padding: 5px 10px;  
    height:45px;  
}
input[type=submit],input[type=button],input[type=reset],button{
    border:none; 
    font-size: 11px;  
  border-radius:3px;
  height:45px;
  color:#FFF;
}

.btn:hover,.btn:focus{  
    cursor:pointer; 
    color:#FFF;
}
input[type=radio]{
    margin:0px;
    padding:0px; 
    height:auto;
}
.form-control{ 
    box-shadow:none !important;  
  border-radius:0px;
}
.form-control:focus{
    border:1px solid #CCC;
}
.btn:focus{
  box-shadow:none !important;
}

textarea{ 
    width: 100%;
}
input[type=reset]{ 
    margin-left: 10px;
}
textarea{
  min-height:100px;
}
a{ 
    color: inherit;
}
a:hover,a:focus{ 
    text-decoration: none !important; 
    color: inherit !important;
}
ul{
    margin: 0px; 
    padding: 0px; 
    list-style: none;
}
.relative{ 
    position: relative;
}
.absolute{ 
    position: absolute;
}
.fixed{ 
    position: fixed;
}

.pricing-table-container{
  padding:50px 0px;
}
.description{
  padding:15px 0px;
}
.description a{
  padding:10px;
  font-size:13px;
  display:block;
  font-weight:bold;
  border-bottom:1px solid #DDD;
}
.description a.active{
  background-color:#FFF;
  padding-left:25px;
}

/* DEMO 01 */
.pricing-table-3{
  background-color:#FFF;
  margin:15px auto;
  box-shadow:0px 0px 25px rgba(0,0,0,0.1);
  max-width:325px;
  border-radius:0px 10px 0px 10px;
  overflow:hidden;
  position:relative;
  min-height:250px;
  transition:all ease-in-out 0.25s;
}
.pricing-table-3:hover{
  transform:scale(1.1,1.1);
  cursor:pointer;
}

.pricing-table-3.basic .price{
  background-color:#28b6f6;
  color:#FFF;
}
.pricing-table-3.premium .price{
  background-color:#ff9f00;
  color:#FFF;
}
.pricing-table-3.business .price{
  background-color:#c3185c;
  color:#FFF;
}

.pricing-table-3 .pricing-table-header{
  background-color:#212121;
  color:#FFF;
  padding:20px 0px 0px 20px;
  position:absolute;
  z-index:5;
}
.pricing-table-3 .pricing-table-header p{
  font-size:12px;
  opacity:0.85;
}
.pricing-table-3 .pricing-table-header::before{
  content:"";
  position:absolute;
  left:-50px;
  right:-180px;
  height:125px;
  top:-50px;
  background-color:#212121;
  z-index:-1;
  transform:rotate(-20deg)
}

.pricing-table-3 .price{
  position:absolute;
  top:0px;
  text-align:right;
  padding:110px 30px 0px 0px;
  right:0px;
  left:0px;
  font-size:20px;
  z-index:4;
}
.pricing-table-3 .price::before{
  content:"";
  position:absolute;
  left:0px;
  right:0px;
  height:100px;
  bottom:-25px;
  background-color:inherit;
  transform:skewY(10deg);
  z-index:-1;
  box-shadow:0px 5px 0px 5px rgba(0,0,0,0.05);
}


.pricing-table-3 .pricing-body{
  padding:35px;
  padding-top:200px;  
}
.pricing-table-3 .pricing-table-ul li{
  color:rgba(0,0,0,0.7);
  font-size:13px;
  padding:10px;
  width: 250px;
  border-bottom:1px solid rgba(0,0,0,0.1);
}
.pricing-table-3 .pricing-table-ul .fa{
  margin-right:15px;
}
.pricing-table-3.basic .pricing-table-ul .fa{
  color:#28b6f6;
}
.pricing-table-3.premium .pricing-table-ul .fa{
  color:#ff9f00;
}
.pricing-table-3.business .pricing-table-ul .fa{
  color:#c3185c;
}
.pricing-table-3 .view-more{
  margin:10px 20px;
  display:block;
  text-align:center;
  background-color:#212121;
  padding:10px 0px;
  color:#FFF;
}
siyah
{
	color: black;
}
#ortala
{
  text-align: center;
  
}




 </style>

<div class="main-panel">
				<div class="content">
					<div class="page-inner">
						<div class="page-header">
							<h4 class="page-title"><?php echo $dil['paket-onizleme-ekrani'] ?></h4>
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
									<a href="#"><?php echo $dil['onizleme-metin'] ?></a>
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
                                        <h2><?php echo $dil['paket-onizleme-ekrani'] ?></h2> <br> <br>
										<div class="row justify-content-center align-items-center">
                       
									<div class="row">
									<div class="row">
    <div class="col-md-4 col-sm-6">
        <div class="pricing-table-3 basic">
            <div class="pricing-table-header">
            
                <h4><strong><?php echo $paket_adi_1 ?></strong></h4>
                <p><?php echo $dil['fazladan-token-kazanin'] ?></p>
            </div>
            <div class="price"><strong><?php echo $token_degeri_1 ?></strong> ARH + % <?php echo $paket_kazanci_1 ?> </div>
            <div class="pricing-body">
                <ul class="pricing-table-ul">
                    <li><i class="fa fa-donate"></i> % <?php echo $paket_kazanci_1." ".$dil['fazladan-token-kazanin'] ?></li>
                    <li><i class="fa fa-retweet"></i><?php echo $dil['istedigin-kadar-token-satin-al'] ?></li>
                    <li><i class="fa fa-envelope"></i> <?php echo $dil['her-zaman-destek'] ?></li>
                    <li class="not-avail"><i class="fa fa-backspace"></i> <?php echo $dil['teknik-ariza-iade-politikasi'] ?></li>
                    
                </ul><form action="#" method="POST"><input type="hidden" name="kimlik" value="<?php echo $paket_kimligi_1 ?>"> <input type="number" id="ortala" name="adet" class="form-control form-control" placeholder="örn: 2" value="1" minlength="1"><siyah><b> <?php echo $dil['adet-metin'] ?> <center> <h3> <?php echo "$ ".$paket_fiyati_1 ?> </h3> </center></b></siyah> <br> <button type="submit" class="btn btn-secondary btn-primary btn-stiped" type="button" name="satin-al"><?php echo $dil['satin-al-metin'] ?></button> </form></div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="pricing-table-3 premium">
            <div class="pricing-table-header">
                <h4><strong><?php echo $paket_adi_2 ?></strong></h4>
                <p><?php echo $dil['fazladan-token-kazanin'] ?></p>
            </div>
            <div class="price"><strong><?php echo $token_degeri_2 ?></strong> ARH + % <?php echo $paket_kazanci_2?></div>
            <div class="pricing-body">
                <ul class="pricing-table-ul">
                    <li><i class="fa fa-donate"></i>  % <?php echo $paket_kazanci_2." ".$dil['fazladan-token-kazanin']  ?></li>
                    <li><i class="fa fa-retweet"></i><?php echo $dil['istedigin-kadar-token-satin-al'] ?></li>
                    <li><i class="fa fa-envelope"></i> <?php echo $dil['her-zaman-destek'] ?></li>
                    <li class="not-avail"><i class="fa fa-backspace"></i> <?php echo $dil['teknik-ariza-iade-politikasi'] ?></li>
                    
                </ul><form action="#" method="POST"><input type="hidden" name="kimlik" value="<?php echo $paket_kimligi_2 ?>"><input type="number" id="ortala" name="adet" class="form-control form-control" placeholder="örn: 2" value="1" minlength="1"><siyah><b> <?php echo $dil['adet-metin'] ?> <center> <h3> <?php echo "$ ".$paket_fiyati_2 ?> </h3> </center></b></siyah><br><button type="submit" class="btn btn-secondary btn-primary btn-stiped" type="button" name="satin-al"><?php echo $dil['satin-al-metin'] ?></button></form></div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="pricing-table-3 business">
            <div class="pricing-table-header">
                <h4><strong><?php echo $paket_adi_3 ?></strong></h4>
                <p><?php echo $dil['fazladan-token-kazanin'] ?></p>
            </div>
            <div class="price"><strong><?php echo $token_degeri_3 ?></strong> ARH + % <?php echo $paket_kazanci_3 ?></div>
            <div class="pricing-body">
                <ul class="pricing-table-ul">
                    <li><i class="fa fa-donate"></i>  % <?php echo $paket_kazanci_3." fazladan ARH hediye!" ?></li>
                    <li><i class="fa fa-retweet"></i><?php echo $dil['istedigin-kadar-token-satin-al'] ?></li>
                    <li><i class="fa fa-envelope"></i> <?php echo $dil['her-zaman-destek'] ?></li>
                    <li class="not-avail"><i class="fa fa-backspace"></i> <?php echo $dil['teknik-ariza-iade-politikasi'] ?></li>
                    
                </ul><form action="#" method="POST"><input type="hidden" name="kimlik" value="<?php echo $paket_kimligi_3 ?>"><input type="number" id="ortala" name="adet" class="form-control form-control" placeholder="örn: 2" value="1" minlength="1"><siyah><b> <?php echo $dil['adet-metin'] ?> <br> <center> <h3> <?php echo "$ ".$paket_fiyati_3 ?> </h3> </center></b></siyah><br><button type="submit" class="btn btn-secondary btn-primary btn-stiped" type="button" name="satin-al"><?php echo $dil['satin-al-metin'] ?></button></form></div>
        </div>
    </div>
									</div>
                                        
                                        
                                        
                                    </div>
                                    
									</div>
                                    
										
										
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			
										









<?php include 'footer.php'; ?>