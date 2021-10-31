<?php 
include 'islemler/baglan.php';

$veriyi_alsinssspp = $db->prepare("SELECT * FROM token_ayarlari");
$veriyi_alsinssspp->execute();
$veriyi_ceksinssspp = $veriyi_alsinssspp->fetch(PDO::FETCH_ASSOC);

$toplam_satis = $veriyi_ceksinssspp['toplam_satis'];

$toplam_satista = $veriyi_ceksinssspp['on_satis_siniri'];

$toplam_satilan_dolar = $toplam_satis*0.2;

$toplam_satilacak_dolar = $toplam_satista*0.2;

$ilerleme_cubugu_algoritmasi = $toplam_satis/25000;

include 'diller/turkish.php';

?>


<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Archive Token - Geçmişini Geleceğin İle Koru</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link type="images/svg" rel="shortcut icon" href="favicon.svg">
    <!-- CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/responsive.css">
    
    <!-- Js -->
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/min/waypoints.min.js"></script>
    <script src="js/jquery.counterup.js"></script>

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="js/google-map-init.js"></script>


    <script src="js/main.js"></script>


  </head>
  <body>

<style>
  .proccess-bar-orange
  {
    background-color: orangered;
    color: white;
  }
  .proccess-bar-orange:hover
  {
    background-color: orangered;
    color: white;
  }
  .btn-view-works
  {
    background-color: orangered;
    color: white;
  }
  
  baslik
  {
    color: white;
  }
  #introdeneme
  {
    background-color: rgb(208, 208, 208);
  }
  #iletisim
  {
    background-color: rgb(220, 123, 32);
  }
  #yesil
  {
    color: green;
  }
  #footerkisim
  {
    background-color: rgb(220, 123, 32)
  }
  .login_btn
{
	min-width:50px;
	height:40px;
	background-color:#ffffff;
	float:left;
	border-radius:50px;
	padding:0px 13px;
	line-height:40px;
	cursor:pointer;
	transition: all 0.2s ease;
}
  
</style>

    <!-- Header Start -->
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- header Nav Start -->
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Navigasyon</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="nalogo_outer animated fadeInUp" href="index">
                  <img width="110" height="110" src="img/logo.svg" alt="Logo">
                </a>
              </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <br>
                  <ul class="nav navbar-nav navbar-right animated fadeInUp">
                    <li><a onclick="smoothScroll(document.getElementById('intro'))"><b><?php echo $dil['archive-nedir-header']; ?></b></a></li>
                    <li><a onclick="smoothScroll(document.getElementById('faz'))"><b><?php echo $dil['faz-sistemi-header']; ?></b></a></li>
                    <li><a onclick="smoothScroll(document.getElementById('zaman-cizelgesi'))"><b><?php echo $dil['yol-haritasi-header']; ?></b></a></li>
                    <li><a onclick="smoothScroll(document.getElementById('token'))"><b>Archive Token</b></a></li>
                    <li><a onclick="smoothScroll(document.getElementById('sss'))"><b><?php echo $dil['sss-header']; ?></b></a></li>
                    
                    <li><a href="giris-yap" class="d-flex btn proccess-bar-orange"><span class="fas fa-sign-in-alt"></span><b> <?php echo $dil['giris-yap-butonu']; ?></b></a></li>
                    <li><a href="kayit-ol" class="mx-1 btn proccess-bar-orange"><span class="fas fa-user-plus"></span><b> <?php echo $dil['kayit-ol-butonu']; ?></b></a></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
          </div>
        </div>
      </div>
    </header><!-- header close -->
        
    <!-- Slider Start -->
    <section id="slider">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-2">
            <div class="block">
              <h1  class="animated fadeInUp"><b>ARCHIVE TOKEN </b></h1>
              <p class="animated fadeInUp"><?php echo $dil['slider-yazisi']; ?></p>
              
                
                

                <br>
                <form action="islemler/islem.php" method="POST">  
                <a href="giris-yap" class="btn proccess-bar-orange"><span class="fas fa-coins"></span> <?php echo $dil['archive-token-satin-al-butonlari']  ?></a> <br> <br>
              <a href="img/whitepaper.pdf" class="btn proccess-bar-orange"><span class="fas fa-newspaper"></span> Whitepaper</a>
              
              <a href="https://t.me/joinchat/lCBOCxplfkY4MzY0" class="btn proccess-bar-orange"><span class="fab fa-telegram-plane"></span> Telegram</a>
                </form>

                 
            
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Wrapper Start -->
    <section id="introd">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="block">
              <div class="section-title">
                <h2><?php echo $dil['satis-durumu-yazisi']; ?></h2>
                <div class="col-md-1 col-lg-1">
                  <p><b><?php echo $dil['ilerleme-cubugu-satis-yazisi']; ?></b></p>
                </div>
                
               
              
              <br> <br>
              
              <center>
                <div class="col-md-12 col-lg-12">
                
                
                
                  
                
                
                
              
                <div class="progress" style="height:20px">
                  
                  <div class="progress-bar proccess-bar-orange progress-bar-striped" style="width:<?php echo $ilerleme_cubugu_algoritmasi ?>%"><?php echo $toplam_satis ?> Adet Satıldı</div>
                </div>
              </div>
              
            </center>
              
            </div>
            <center>
           <div class="col-md-12 col-lg-12">
             <div class="row">
               <div class="col-md-6 col-lg-6">
               <label><?php echo $dil['simdiye-kadar-yapilan-toplam-arh-satisi']; ?> <?php echo $toplam_satis." ARH" ?> </label>
               </div>
                
                <div class="col-md-6 col-lg-6">
                  <label><?php echo $dil['suanda-satista-olan-toplam-arh'] ?> <?php echo $toplam_satista ?> ARH</label>
                  </div>
                  
                    <div class="col-md-6 col-lg-6">
                      <br>
                    <label><?php echo $dil['suana-kadar-satilan-toplam-arh-degeri']; ?><?php echo "$".$toplam_satilan_dolar ?> </label>
                    </div>
                    <div class="col-md-6 col-lg-6">
                      <br>
                    <label><?php echo $dil['satista-olan-toplam-arh-degeri']; ?> <?php echo "$".$toplam_satilacak_dolar ?> </label>
                    </div>
                    <div class="col-md-12 col-lg-12">
                      <br>
                    <label><h3>1 Archive Token = 0.2 $ </h3></label>
                    </div>
                    
             </div>
           </div>
          </div><!-- .col-md-7 close -->
          
          </div><!-- .col-md-5 close -->
        </center>
        <center>
        <a href="giris-yap" class="btn proccess-bar-orange "><span class="fas fa-coins"></span> <?php echo $dil['archive-token-satin-al-butonlari']  ?></a> </center>
        </div>
      </div>
      <label><br></label>
    </section>
    <br>
    <section id="intro">
      <div class="container">
        <div class="row">
          <div class="col-md-7 col-sm-12">
            <div class="block">
              <div class="section-title">
                <h2><?php echo $dil['archive-token-nedir'] ?></h2>
                
              </div>
              <p><?php echo $dil['archive-token-nedir-aciklama'] ?></p>
            </div>
          </div><!-- .col-md-7 close -->
          <div class="col-md-5 col-sm-12">
            <div class="block">
              <img src="img/wrapper-img.gif" alt="Img">
            </div>
          </div><!-- .col-md-5 close -->
        </div>
      </div>
    </section>

  <section id="feature">
    <div class="container" id="faz">
      <div class="row">
        <div class="col-md-6 col-md-offset-6">
          <h2 ><?php echo $dil['yeni-nesil-iko-on-satisi'] ?></h2>
          <p><?php echo $dil['yeni-nesil-iko-on-satisi-aciklama-1']; ?></p> <br>
          <h2><?php echo $dil['referans-basina-bonus-kazan'] ?></h2>
          <p><?php echo $dil['referans-basine-bonus-kazan-aciklama1']; ?></p>
          
          
          
          <a href="giris-yap" class="btn proccess-bar-orange"><span class="fas fa-coins"></span> <?php echo $dil['archive-token-satin-al-butonlari']; ?></a>
        </div>
      </div>
    </div>
  </section>
  
    
  
  
        
    <!-- Service Start -->
    <section id="service">
      <div class="container">
        <div class="row">
          <div class="section-title">
            <h2><?php echo $dil['avantajlara-genel-bakis']; ?></h2>
            <p><?php echo $dil['avantajlara-genel-bakis-aciklama']; ?></p>
          </div>
        </div>
        <div class="row ">
          <div class="col-sm-6 col-md-3">
            <div class="service-item">
              <i class="fas fa-money-bill-alt"></i>
              <h4><?php echo $dil['kar']; ?></h4>
              <p><?php echo $dil['kar-aciklama'] ?></p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="service-item">
              <i class="fas fa-wallet"></i>
              <h4><?php echo $dil['cuzdan-entegrasyonu'] ?></h4>
              <p><?php echo $dil['cuzdan-entegrasyonu-aciklama'] ?> </p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="service-item">
              <i class="fas fa-undo-alt"></i>
              <h4><?php echo $dil['sinir-yok'] ?></h4>
              <p><?php echo $dil['sinir-yok-aciklama'] ?> </p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="service-item">
              <i class="fas fa-globe-americas"></i>
              <h4><?php echo $dil['cevre-dostu']; ?></h4>
              <p><?php echo $dil['cevre-dostu-aciklama']; ?></p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="service-item">
              <i class="fas fa-coins"></i>
              <h4><?php echo $dil['ico-on-satisi'] ?></h4>
              <p><?php echo $dil['ico-on-satisi-aciklama'] ?></p>
            </div>
          </div>
          
         
          
        </div>
      </div>
    </section>
    <section class="section" id="zaman-cizelgesi">
    <div class="row">
          <center><div class="section-title">
            <h2>Yol Haritamız</h2>
            <p></p>
          </div> </center>
        </div>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    
                    <div id="content">
                        <ul class="timeline">
                            <yesil><li class="event" data-date="2021 <?php echo "(".$dil['yol-haritamiz-ceyrek-1'].")" ?>"> 
                                <h3><?php echo $dil['yol-haritamiz-fikir-gelistirildi'] ?></h3>
                                <p><?php echo $dil['yol-haritamiz-fikir-gelistirildi-aciklama'] ?></p>
                            </li> </yesil>
                            <li class="event" data-date="2021  <?php echo "(".$dil['yol-haritamiz-ceyrek-2'].")" ?>">
                                <h3><?php echo $dil['yol-haritamiz-ekip-kuruldu'] ?></h3>
                                <p><?php echo $dil['yol-haritamiz-ekip-kuruldu-aciklama'] ?></p>
                            </li>
                            <li class="event" data-date="2021  <?php echo "(".$dil['yol-haritamiz-ceyrek-3'].")" ?>">
                                <h3><?php echo $dil['yol-haritamiz-altyapi-kuruldu'] ?></h3>
                                <p><?php echo $dil['yol-haritamiz-altyapi-kuruldu-aciklama'] ?></p>
                            </li>
                            <li class="event" data-date="2021 <?php echo "(".$dil['yol-haritamiz-ceyrek-4'].")" ?>">
                                <h3><?php echo $dil['yol-haritamiz-borsalarda-adim-adim']; ?></h3>
                                <p><?php echo $dil['yol-haritamiz-borsalarda-adim-adim-aciklama']; ?></p>
                            </li>
                            <li class="event" data-date="2022 <?php echo "(".$dil['yol-haritamiz-ceyrek-1'].")" ?>">
                                <h3><?php echo $dil['yol-haritamiz-reklam-anlasmasi'] ?></h3>
                                <p><?php echo $dil['yol-haritamiz-reklam-anlasmasi-aciklama'] ; ?></p>
                            </li>
                            <li class="event" data-date="2022 <?php echo "(".$dil['yol-haritamiz-ceyrek-2'].")" ?>">
                                <h3>Sonraki Adımlar</h3>
                                <p>Belirlenen hedeflerden birinin gerçekleştirilmesi.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </section>





    
    <section class="section" id="token">
      <center><div class="section-title">
        <h2><br> Archive Token</h2>
      </div> </center>
      <div class="container" id="">
        <div class="row" style="background-color:#ffffff; padding:20px;">
          <div class="left-text col-lg-5 col-md-12 col-sm-12 mobile-bottom-fix">
            <div class="left-heading">
              <h5>Archive Token</h5>
            </div>
            <p><?php echo $dil['archive-token-yol-haritasi-alti-aciklama'] ?> </p>
            <p><b><?php echo $dil['sozlesme-adresi'] ?>  :</b></p>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_outer">
              <input type="text" class="form-control" value="0x857a645053ef69490682c98a2cac91436ce2ec74" disabled="">
            </div>
            <p><small>Link: <a href="#">Binance Smart Chain</a></small></p>
            <!--<p style="margin-top:-20px;"><b>Para Havuzu  :</b></p>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_outer">
              <input type="text" class="form-control" value="0xf2c23a2a25ee6c9597b7b70b050871e34eee3385" disabled />
            </div>
            <p><small>Link: <a href="#">TRC-20</a></small></p>-->
          </div>
          
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 table_outer">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <th scope="row"><?php echo $dil['sembol'] ?></th>
                  <td>ARH</td>
                </tr>
                <tr>
                  <th scope="row"><?php echo $dil['token_isim']; ?></th>
                  <td>ARCHIVE</td>
                </tr>
                <tr>
                  <th scope="row">Platform</th>
                  <td>Binance Smart Chain</td>
                </tr>
                <tr>
                  <th scope="row"><?php echo $dil['toplam-archive-token'] ?></th>
                  <td>100.000.000 ARH</td>
                </tr>
                <tr>
                  <th scope="row"><?php echo $dil['on-satis-archive-token'] ?></th>
                  <td>10.000.000 ARH</td>
                </tr>
                <tr>
                  <th scope="row"><?php echo $dil['on-satis'];  ?> </th>
                  <td>10.000.000 ARH</td>
                </tr>
                <tr>
                  <th scope="row"><?php echo $dil['borsa-ve-isbirligi']; ?></th>
                  <td>65.000.000 ARH</td>
                </tr>
                <tr>
                  <th scope="row"><?php echo $dil['kurucular-ve-ekip'];  ?> </th>
                  <td>10.000.000 ARH</td>
                </tr>
                <tr>
                  <th scope="row"><?php echo $dil['danismanlar']; ?> </th>
                  <td>10.000.000 ARH</td>
                </tr>
                <tr>
                  <th scope="row"><?php echo $dil['odul']  ?></th>
                  <td>5.000.000 ARH</td>
                </tr>
                <!--<tr>
                  <th scope="row">Softcap</th>
                  <td>3.000.000 USD</td>
                </tr>
                <tr>
                  <th scope="row">Hardcap</th>
                  <td>22.500.000 USD</td>
                </tr>-->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <section id="sss">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="block">
              <center><div class="section-title">
                <h2><?php echo $dil['sss-baslik'] ?></h2>
               
              </div> </center>
              <div id="sorucevap">
                <div class="s"><?php echo $dil['sss-archive-token-nedir'] ?></div><div class="c"><br> <?php echo $dil['sss-archive-token-nedir-aciklama'] ?> <br></div>
                <div class="s"><?php echo $dil['sss-archive-token-nasil-satin-alinir']; ?></div><div class="c"><br><?php echo $dil['sss-archive-token-nasil-satin-alinir-aciklama']; ?> <br></div>
                <div class="s"><?php echo $dil['sss-archive-token-alabilecegim-kac-tane-paket-var']; ?></div><div class="c"><br><?php echo $dil['sss-archive-token-alabilecegim-kac-tane-paket-var-aciklama'] ?> <br></div>
                <div class="s"><?php echo $dil['sss-on-satis-ne-zaman-bitecek']; ?></div><div class="c"><br><?php echo $dil['sss-on-satis-ne-zaman-bitecek-aciklama']; ?><br></div>
                <div class="s"><?php echo $dil['sss-archive-token-bilinirligi'] ?></div><div class="c"><br><?php echo $dil['sss-archive-token-bilinirligi-aciklama'] ?><br></div>
                <div class="s"><?php echo $dil['sss-en-az-kac-adet-alinir']  ?></div><div class="c"><br><?php echo $dil['sss-en-az-kac-adet-alinir-aciklama']  ?><br></div>
              
              <br> <br>
              </div>
                
              <script type="text/javascript">
              $('#sorucevap .s').click(function(){
                $(this).next().slideToggle(200).siblings('.c').slideUp(200);
              });
              </script>
            </div>
          </div><!-- .col-md-7 close -->
          
        </div>
      </div>
    </section>
    <section id="iletisim">
      <div class="container">
        <div class="row">
          <div class="container">
            <div class="section-title">
              <h2><baslik><?php echo $dil['bizimle-iletisime-gecin-baslik']; ?></baslik></h2>
             
            </div>
            <div class="col-md-12 col-lg-12">
            <form action="islemler/islem.php" method="POST">
              <div class="col-md-6 col-lg-6">
              <label for="fname"><baslik><?php echo $dil['big-isim-soyisim']  ?></baslik></label>
              <input class="form-control form-control" type="text" id="fname" name="isimsoyisim" placeholder="<?php echo $dil['big-place-isim']; ?>">
              </div>
              
              
              <div class="col-md-6 col-lg-6">
              <label for="subject"><baslik><?php echo $dil['big-e-posta'] ?></baslik></label>
              <input class="form-control form-control" type="text" id="e-posta" name="elektronik_posta_adresi" placeholder="<?php echo $dil['big-e-posta-place'] ?>">
              </div>

              <div class="col-md-12 col-lg-12">
              <label for="subject"><baslik><?php echo  $dil['big-sorununuz'] ?></baslik></label>
              <textarea class="form-control form-control" name="sorun" placeholder="<?php echo $dil['big-sorun-place'] ?>"></textarea>
              <br>
              
            </div>
            <div class="col-md-3 col-lg-3">
              <label><baslik><?php echo $dil['big-eposta-adresi'] ?> : destek@archivetoken.net</baslik></label>
            </div>
            <div class="col-md-3 col-lg-3 pull-right">
              <br>
              <input class="form-control form-control btn btn-success" type="submit" value="<?php echo $dil['big-gonder-butonu'] ?>">
              <br>
            </div>
            </form>
            <br>
            </div>
            
          </div>
        </div>
      </div>
      <label><br></label>
    </section>
    
    
    








    
    <!-- footer Start -->
    <footer id="footerkisim"> 
      
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="footer-manu">
              <ul>
                <li><a href="#"><b>About Us</b></a></li>
                <li><a href="#"><b>Contact us</b></a></li>
                <li><a href="#"><b>How it works</b></a></li>
                <li><a href="#"><b>Support</b></a></li>
                <li><a href="#"><b>Terms</b></a></li>
              </ul>
            </div>
            <p>Copyright &copy; Crafted by <a href="https://archivetoken.net/">Archive Token</a>.</p>
          </div>
        </div>
      </div>
    </footer>
            
            
  <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
            
    
    </body>
</html>
<style type="text/css">
  #sorucevap{text-align:center;}
  #sorucevap .s{border-bottom:2px solid #000;
    font:bold 13px Arial; padding:10px; cursor:pointer; color:#fff;
    background-image: -ms-linear-gradient(top left, #352c2c 0%, #75A1C7 100%);
    background-image: -moz-linear-gradient(top left, #352c2c 0%, #75A1C7 100%);
    background-image: -o-linear-gradient(top left, #352c2c 0%, #75A1C7 100%);
    background-image: -webkit-gradient(linear, left top, right bottom, color-stop(0, #352c2c), color-stop(1, #75A1C7));
    background-image: -webkit-linear-gradient(top left, #352c2c 0%, #75A1C7 100%);
    background-image: linear-gradient(to bottom right, #352c2c 0%, #75A1C7 100%);
  }
  #sorucevap .c{display:none; background:#eee; border:1px solid #aaa; border-top:none;}


  body{margin-top:20px;}
.timeline {
    border-left: 3px solid #727cf5;
    border-bottom-right-radius: 4px;
    border-top-right-radius: 4px;
    background: rgba(114, 124, 245, 0.09);
    margin: 0 auto;
    letter-spacing: 0.2px;
    position: relative;
    line-height: 1.4em;
    font-size: 1.03em;
    padding: 50px;
    list-style: none;
    text-align: left;
    max-width: 40%;
}

@media (max-width: 767px) {
    .timeline {
        max-width: 98%;
        padding: 25px;
    }
}

.timeline h1 {
    font-weight: 300;
    font-size: 2em;
}

.timeline h2,
.timeline h3 {
    font-weight: 600;
    font-size: 2rem;
    margin-bottom: 10px;
}

.timeline .event {
    border-bottom: 3px dashed #e8ebf1;
    padding-bottom: 25px;
    margin-bottom: 25px;
    position: relative;
}

@media (max-width: 767px) {
    .timeline .event {
        padding-top: 30px;
    }
}

.timeline .event:last-of-type {
    padding-bottom: 0;
    margin-bottom: 0;
    border: none;
}

.timeline .event:before,
.timeline .event:after {
    position: absolute;
    display: block;
    top: 0;
}

.timeline .event:before {
    left: -207px;
    content: attr(data-date);
    text-align: right;
    font-weight: 100;
    font-size: 0.9em;
    min-width: 120px;
}

@media (max-width: 767px) {
    .timeline .event:before {
        left: 0px;
        text-align: left;
    }
}

.timeline .event:after {
    -webkit-box-shadow: 0 0 0 3px #727cf5;
    box-shadow: 0 0 0 3px #727cf5;
    left: -55.8px;
    background: #fff;
    border-radius: 50%;
    height: 9px;
    width: 9px;
    content: "";
    top: 5px;
}

@media (max-width: 767px) {
    .timeline .event:after {
        left: -31.8px;
    }
}

.rtl .timeline {
    border-left: 0;
    text-align: right;
    border-bottom-right-radius: 0;
    border-top-right-radius: 0;
    border-bottom-left-radius: 4px;
    border-top-left-radius: 4px;
    border-right: 3px solid #727cf5;
}

.rtl .timeline .event::before {
    left: 0;
    right: -170px;
}

.rtl .timeline .event::after {
    left: 0;
    right: -55.8px;
}
  </style>

  <script>
    window.smoothScroll = function (target) {
    var scrollContainer = target;
    do { //find scroll container
        scrollContainer = scrollContainer.parentNode;
        if (!scrollContainer) return;
        scrollContainer.scrollTop += 1;
    } while (scrollContainer.scrollTop == 0);

    var targetY = 0;
    do { //find the top of target relatively to the container
        if (target == scrollContainer) break;
        targetY += target.offsetTop;
    } while (target = target.offsetParent);

    scroll = function (c, a, b, i) {
        i++;
        if (i > 30) return;
        c.scrollTop = a + (b - a) / 30 * i;
        setTimeout(function () {
            scroll(c, a, b, i);
        }, 20);
    }
    // start scrolling
    scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
}
  </script>


<?php

$random_sayi = 1;

?>

 
<script type="text/javascript">
	$(document).ready(function(){
        //sayfa açıldığında otomatik açılması için
		$("#modalNesne").modal('show');
	});
</script>
</head>
<body>
<!-- modal nesnesi başlangıç -->
<div id="modalNesne" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Bilgilendirme</h4>
            </div>
            <div class="modal-body">
                
				<h3><center><?php 

          $veriyi_alsinssspp = $db->prepare("SELECT * FROM popup_pencere_maddeleri WHERE id=?");
          $veriyi_alsinssspp->execute(array($random_sayi));
          $veriyi_ceksinssspp = $veriyi_alsinssspp->fetch(PDO::FETCH_ASSOC);
          echo $veriyi_ceksinssspp['madde_yazisi'];
        
        
        ?></center> </h3>
        
               
                
            
            </div>
        </div>
    </div>
</div>
<!-- // modal nesnesi bitiş -->
</body>
</html>
 