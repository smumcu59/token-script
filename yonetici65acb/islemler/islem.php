
<?php 

include 'baglan.php';

session_start();
ob_start();

##Giriş yapma sistemi başlangıç
if (isset($_POST['normal-giris'])) {
    
   
    $elektronik_posta_adresi = $_POST['elektronikPosta'];
    $parola = $_POST['parola'];

    $encrypt_method = 'AES-256-CBC'; 
    $secret_key = '11*_33'; 
    $secret_iv = '22-=**_'; 
    $key = hash('sha256', $secret_key); 
    $iv = substr(hash('sha256', $secret_iv), 0, 16); 
    
    $sifrelenen_parola = openssl_encrypt($parola,$encrypt_method, $key, false, $iv);



    
    $login = $db->prepare("SELECT * FROM yoneticiler WHERE elektronik_posta_adresi=:eposta AND parola=:parola");
    $login->execute(array(':eposta' =>$elektronik_posta_adresi,':parola' =>$sifrelenen_parola));
    if ($login->rowCount())
    {
        //echo "Login success\n Welcome $kullanici_adi";
        
        $_SESSION['yonetici_kullanici_adi']=$elektronik_posta_adresi;
        
        $_SESSION['yonetici-oturumu']="1";
        
        
        $_SESSION['yonetici-giris-durumu']="False";
        header("location:/yonetici65acb/index");
        exit;
        
    }
    else
    {
     $basarisiz_giris = "Your login failed. Please check the information." ;  
     
     header("location:/yoneticiap-giris");
     echo $sifrelenen_parola;
     $_SESSION['yonetici-giris-durumu']="True";
     exit;
     
        
    }
     
      
 }
 ##Giriş yapma sistemi bitiş


 ## Üye düzenleme işlemi

if(isset($_POST['uye-duzenle'])){
    $duzenlenecek_uye_id = $_POST['uye-duzenle'];
    $_SESSION['duzenlenecek_uyenin_idsi'] = $duzenlenecek_uye_id;

    header("location:../uye-duzenle");
    exit;
}


 ## Bitiş

 ## Üye düzenle / güncelle

if(isset($_POST['uyeyi-guncelle'])){
    $isim_soyisim = $_POST['isim_soyisim'];
    $isim_soyisim = strip_tags($isim_soyisim);
    $eposta = $_POST['e_posta'];
    $eposta = strip_tags($eposta);
    $uye_id = $_SESSION['duzenlenecek_uyenin_idsi'];

    $veriyi_alsinsssp = $db->prepare("UPDATE uyeler SET isim_soyisim=:isim_soyisim,elektronik_posta_adresi=:eposta WHERE id=:id_kimlik");
    $veriyi_alsinsssp->execute(array(':isim_soyisim' =>$isim_soyisim,':eposta' =>$eposta,':id_kimlik' =>$uye_id));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $_SESSION['uye-basariyla-guncellendi'] = 1;
    header("location:../uye-listesi");
    exit;




}

if(isset($_POST['uye-listesine-don'])){
    header('location:../uye-listesi');
    exit;
}

if(isset($_POST['cuzdan-listesine-don'])){
    header("location:../cuzdan-listesi");
    exit;
}



 ##

 ## üYE SİLME İŞLEMİ

if(isset($_POST['uye-sil'])){
    $silinecek_id = $_POST['uye-sil'];

    $veriyi_alsinsssp = $db->prepare("DELETE FROM uyeler WHERE id=:id_kimlik");
    $veriyi_alsinsssp->execute(array(':id_kimlik' =>$silinecek_id));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
    $_SESSION['uye-basariyla-silindi'] = 1;
    header("location:../uye-listesi");
    exit;
}




 ##

 ## Cüzdan düzenleme işlemi (Yönetici)


 if(isset($_POST['cuzdani-guncelleyin'])){
     $guncellenecek_cuzdan_id = $_POST['cuzdani-guncelleyin'];
     
     $_SESSION['guncellenecek_cuzdanin_idsi'] = $guncellenecek_cuzdan_id;
     header("location:../cuzdani-duzenle");
     exit;
     
 }





 ## Bitiş

 ## Cüzdan düzenleme işleme işlemi


 if(isset($_POST['cuzdan-bilgisini-guncelle'])){
    $cuzdan_kimligi = $_POST['cuzdanKimligi'];
    $cuzdan_adi = $_POST['cuzdanAdi'];
    $cuzdan_id = $_SESSION['guncellenecek_cuzdanin_idsi'];

    $veriyi_alsinsssp = $db->prepare("UPDATE cuzdan_bilgisi SET cuzdan_kimligi=:cuzdan_kimligi,isim=:isim WHERE id=:id_kimlik");
    $veriyi_alsinsssp->execute(array(':cuzdan_kimligi' =>$cuzdan_kimligi,':isim' =>$cuzdan_adi,':id_kimlik' =>$cuzdan_id));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $_SESSION['cuzdan-basariyla-guncellendi'] = 1;
    header("location:../cuzdan-listesi");
    exit;
 }




 ##

 ## Cuzdan silme işlemi (Yönetici)


if(isset($_POST['cuzdani-silin'])){
    $silinecek_cuzdanid = $_POST['cuzdani-silin'];
    
    $veriyi_alsinsssp = $db->prepare("UPDATE cuzdan_bilgisi SET durum=0 WHERE id=:id_kimlik");
    $veriyi_alsinsssp->execute(array(':id_kimlik' =>$silinecek_cuzdanid));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $_SESSION['cuzdan-silme-islemi-basarili'] = 1;
    header("location:../cuzdan-listesi");
    exit;

}




 ##

 ## Üye seçimi yap

if(isset($_POST['uye-sec'])){
    $secilen_uye = $_POST['uye-sec'];

    $_SESSION['secilen-uye'] = $secilen_uye;
    header("location:../token-yukleme");
    exit;
}

 ##

## Token yükleme işlemi tekil
if(isset($_POST['tokeni-yukle'])){
    $token_miktari = $_POST['yuklenecek_token'];
    $uye_id = $_SESSION['secilen-uye'];
    $tur = "Karşılıksız Tekil Token Yükleme";

    date_default_timezone_set('Europe/Istanbul');
    $tarih_saat = date('d/m/Y H:i:s');


    $veriyi_alsinssspp = $db->prepare("SELECT * FROM token_ayarlari");
    $veriyi_alsinssspp->execute();
    $veriyi_ceksinssspp = $veriyi_alsinssspp->fetch(PDO::FETCH_ASSOC);
    $token_siniri = $veriyi_ceksinssspp['on_satis_siniri'];

    if($token_siniri >= $token_miktari){

        $token_siniri = $token_siniri-$token_miktari;

        $veriyi_alsinssspq = $db->prepare("UPDATE token_ayarlari SET on_satis_siniri=:on_satis_siniri WHERE id=1");
        $veriyi_alsinssspq->execute(array(':on_satis_siniri' =>$token_siniri));
        $veriyi_ceksinssspq = $veriyi_alsinssspq->fetch(PDO::FETCH_ASSOC);

        $veriyi_alsinsssp = $db->prepare("INSERT INTO odeme_gecmisi SET durum=4,uye_id=:uye_id,yatirilacak_token=:yatirilacak_token,odenen_tutar=0,paket_id=0,alinan_adet=0,odenen_cuzdan_id=0,txid_kodu=0,tarih_saat=:tarih_saat,tur=:tur");
        $veriyi_alsinsssp->execute(array(':uye_id' =>$uye_id,':yatirilacak_token' =>$token_miktari,':tarih_saat' =>$tarih_saat,':tur' =>$tur));
        $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

        $veriyi_alsinsssp = $db->prepare("SELECT * FROM uyeler WHERE id=:id_kimlik");
        $veriyi_alsinsssp->execute(array(':id_kimlik' =>$uye_id));
        $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
        $bakiye = $veriyi_ceksinsssp['bakiye'];

        $yeni_bakiye = $bakiye+$token_miktari;

        $veriyi_alsinsssp = $db->prepare("UPDATE uyeler SET bakiye=:bakiye WHERE id=:id_kimlik");
        $veriyi_alsinsssp->execute(array(':bakiye' =>$yeni_bakiye,':id_kimlik' =>$uye_id));
        $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);



        $veriyi_alsinsssp = $db->prepare("SELECT * FROM token_ayarlari WHERE id=1");
        $veriyi_alsinsssp->execute();
        $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
        $top_satis = $veriyi_ceksinsssp['toplam_satis'];
        

        $yeni_top_satis = $top_satis+$token_miktari;
        

        $veriyi_alsinsssp = $db->prepare("UPDATE token_ayarlari SET toplam_satis=:toplam_satis WHERE id=1");
        $veriyi_alsinsssp->execute(array(':toplam_satis' =>$yeni_top_satis));
        $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);




        $_SESSION['token-yukleme-islemi-basarili'] = 1;
        header("location:../manuel-arh-tekil");
        exit;

    } else{
        $_SESSION['limit-asildi'] = 1;
        header("location:../manuel-arh-tekil");
        exit;
    }




}
##

## Toplu token yüklemesi yap
if(isset($_POST['tokeni-yukle-toplu'])){

    

    $connect->set_charset("utf8");

    $queryy ="SELECT * FROM uyeler";  
    $resultt = mysqli_query($connect, $queryy);

    $token_miktari = $_POST['yuklenecek_token'];
    $tur = "Karşılıksız Toplu Token Yükleme";

    date_default_timezone_set('Europe/Istanbul');
    $tarih_saat = date('d/m/Y H:i:s');


                                            
    while($row = mysqli_fetch_array($resultt))  {

        

        $uye_id = $row['id'];
        
        $veriyi_alsinssspp = $db->prepare("SELECT * FROM token_ayarlari");
        $veriyi_alsinssspp->execute();
        $veriyi_ceksinssspp = $veriyi_alsinssspp->fetch(PDO::FETCH_ASSOC);
        $token_siniri = $veriyi_ceksinssspp['on_satis_siniri'];
        
        if($token_siniri >= $token_miktari){
            $yeni_token_siniri = $token_siniri-$token_miktari;
            
            $veriyi_alsinssspq = $db->prepare("UPDATE token_ayarlari SET on_satis_siniri=:on_satis_siniri WHERE id=1");
            $veriyi_alsinssspq->execute(array(':on_satis_siniri' =>$yeni_token_siniri));
            $veriyi_ceksinssspq = $veriyi_alsinssspq->fetch(PDO::FETCH_ASSOC);

            $veriyi_alsinsssp = $db->prepare("INSERT INTO odeme_gecmisi SET durum=4,uye_id=:uye_id,yatirilacak_token=:yatirilacak_token,odenen_tutar=0,paket_id=0,alinan_adet=0,odenen_cuzdan_id=0,txid_kodu=0,tarih_saat=:tarih_saat,tur=:tur");
            $veriyi_alsinsssp->execute(array(':uye_id' =>$uye_id,':yatirilacak_token' =>$token_miktari,':tarih_saat' =>$tarih_saat,':tur' =>$tur));
            $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

            $veriyi_alsinsssp = $db->prepare("SELECT * FROM uyeler WHERE id=:id_kimlik");
            $veriyi_alsinsssp->execute(array(':id_kimlik' =>$uye_id));
            $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
            $bakiye = $veriyi_ceksinsssp['bakiye'];

            $yeni_bakiye = $bakiye+$token_miktari;

            $veriyi_alsinsssp = $db->prepare("UPDATE uyeler SET bakiye=:bakiye WHERE id=:id_kimlik");
            $veriyi_alsinsssp->execute(array(':bakiye' =>$yeni_bakiye,':id_kimlik' =>$uye_id));
            $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

            $veriyi_alsinsssp = $db->prepare("SELECT * FROM token_ayarlari WHERE id=1");
            $veriyi_alsinsssp->execute();
            $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
            $top_satis = $veriyi_ceksinsssp['toplam_satis'];
            
    
            $yeni_top_satis = $top_satis+$token_miktari;
            
    
            $veriyi_alsinsssp = $db->prepare("UPDATE token_ayarlari SET toplam_satis=:toplam_satis WHERE id=1");
            $veriyi_alsinsssp->execute(array(':toplam_satis' =>$yeni_top_satis));
            $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
            $_SESSION['token_basariyla_yuklendi'] = 1;




        } else{
            $_SESSION['limit-asildi'] = 1;

        }

        
    
    

    
    }
    header("location:../manuel-arh-cogul");
    exit;
    
}






##

## Satışı işleme al işlemi

if(isset($_POST['satisi-isleme-al'])){
    $isleme_alinacak_id = $_POST['satisi-isleme-al'];

    $veriyi_alsinsssp = $db->prepare("UPDATE odeme_gecmisi SET durum=2 WHERE id=:id_kimlik");
    $veriyi_alsinsssp->execute(array(':id_kimlik' =>$isleme_alinacak_id));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $_SESSION['isleme-basariyla-alindi'] = 1;
    header("location:../onay-bekleyen-satislar");
    exit;

}


##

## Satışı red etme işlemi

if(isset($_POST['satisi-red-et'])){
    $red_edilecek_id = $_POST['satisi-red-et'];

    $veriyi_alsinsssp = $db->prepare("UPDATE odeme_gecmisi SET durum=3 WHERE id=:id_kimlik");
    $veriyi_alsinsssp->execute(array(':id_kimlik' =>$red_edilecek_id));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $_SESSION['red-etme-islemi-basariyla-tamamlandı'] = 1;
    header("location:../onay-bekleyen-satislar");
    exit;
}



##

## Satışı onaylama işlemi

if(isset($_POST['satisi-onayla'])){
    $onaylanacak_id = $_POST['satisi-onayla'];

    $veriyi_alsinsssp = $db->prepare("SELECT * FROM odeme_gecmisi WHERE id=:id_kimlik");
    $veriyi_alsinsssp->execute(array(':id_kimlik' =>$onaylanacak_id));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $yatirilacak_token = $veriyi_ceksinsssp['yatirilacak_token'];
    $hediye_token = $veriyi_ceksinsssp['hediye_token'];
    $hediyesiz_token = $veriyi_ceksinsssp['hediyesiz_token'];
    $uye_id = $veriyi_ceksinsssp['uye_id'];

    $veriyi_alsinssspp = $db->prepare("SELECT * FROM token_ayarlari");
    $veriyi_alsinssspp->execute();
    $veriyi_ceksinssspp = $veriyi_alsinssspp->fetch(PDO::FETCH_ASSOC);
    $token_siniri = $veriyi_ceksinssspp['on_satis_siniri'];
    $odul_siniri = $veriyi_ceksinssspp['odul_siniri'];
    $referans_orani = $veriyi_ceksinssspp['referans_kazanci'];

    if($token_siniri >= $hediyesiz_token){

        $token_siniri = $token_siniri-$hediyesiz_token;
        if($odul_siniri >= $hediye_token){
            $odul_siniri = $odul_siniri - $hediye_token;
            $veriyi_alsinssspq = $db->prepare("UPDATE token_ayarlari SET odul_siniri=:odul_siniri WHERE id=1");
            $veriyi_alsinssspq->execute(array(':odul_siniri' =>$odul_siniri));
            $veriyi_ceksinssspq = $veriyi_alsinssspq->fetch(PDO::FETCH_ASSOC);
        }else{
            $yatirilacak_token = $yatirilacak_token-$hediye_token;
        }

        $veriyi_alsinssspq = $db->prepare("UPDATE token_ayarlari SET on_satis_siniri=:on_satis_siniri WHERE id=1");
        $veriyi_alsinssspq->execute(array(':on_satis_siniri' =>$token_siniri));
        $veriyi_ceksinssspq = $veriyi_alsinssspq->fetch(PDO::FETCH_ASSOC);

        $veriyi_alsinssspq = $db->prepare("UPDATE odeme_gecmisi SET durum=4 WHERE id=:id_kimlik");
        $veriyi_alsinssspq->execute(array(':id_kimlik' =>$onaylanacak_id));
        $veriyi_ceksinssspq = $veriyi_alsinssspq->fetch(PDO::FETCH_ASSOC);


        ## Referans alma ve işleme


        $veriyi_alsinsssp = $db->prepare("SELECT * FROM uyeler WHERE id=:id_kimlik");
        $veriyi_alsinsssp->execute(array(':id_kimlik' =>$uye_id));
        $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

        $referans_id = $veriyi_ceksinsssp['referans'];
        $ref_isim_soyisim = $veriyi_ceksinsssp['isim_soyisim'];

        if($referans_id == NULL){
            ## İŞLEM YOK
        } else{


            $eklenecek_referans_tutari = ($yatirilacak_token/100)*$referans_orani; ## Sistem her referans alımında orana göre token verecek. Bittiği zaman token 0 olacak ve referans ödemesi yapılamayacak.

            $veriyi_alsinssspp = $db->prepare("SELECT * FROM token_ayarlari");
            $veriyi_alsinssspp->execute();
            $veriyi_ceksinssspp = $veriyi_alsinssspp->fetch(PDO::FETCH_ASSOC);
            $odul_siniri = $veriyi_ceksinssspp['odul_siniri'];

            if($odul_siniri >= $eklenecek_referans_tutari){
                
                $yeni_odul_siniri = $odul_siniri-$eklenecek_referans_tutari;
                //echo $yeni_token_siniri;

               

                $veriyi_alsinssspq = $db->prepare("UPDATE token_ayarlari SET odul_siniri=:odul_siniri WHERE id=1");
                $veriyi_alsinssspq->execute(array(':odul_siniri' =>$yeni_odul_siniri));
                $veriyi_ceksinssspq = $veriyi_alsinssspq->fetch(PDO::FETCH_ASSOC);


            }
            else{
                $eklenecek_referans_tutari = $eklenecek_referans_tutari-$eklenecek_referans_tutari;
            }




            

            $veriyi_alsinsssp = $db->prepare("SELECT * FROM uyeler WHERE id=:id_kimlik");
            $veriyi_alsinsssp->execute(array(':id_kimlik' =>$referans_id));
            $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
            $referans_icin_bakiye = $veriyi_ceksinsssp['bakiye'];
            

            $yeni_ref_bakiye = $referans_icin_bakiye+$eklenecek_referans_tutari;

            $veriyi_alsinsssp = $db->prepare("UPDATE uyeler SET bakiye=:bakiye WHERE id=:id_kimlik");
            $veriyi_alsinsssp->execute(array(':bakiye' =>$yeni_ref_bakiye,':şd_kimlik' =>$referans_id));
            $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

            $tur = $ref_isim_soyisim." İsimli Üyenin Referans Kazancı";

            date_default_timezone_set('Europe/Istanbul');
            $tarih_saat = date('d/m/Y H:i:s');

            $veriyi_alsinsssp = $db->prepare("INSERT INTO odeme_gecmisi SET durum=4,uye_id=:uye_id,yatirilacak_token=:yatirilacak_token,hediyesiz_token=0,hediye_token=0,odenen_tutar=0,paket_id=0,alinan_adet=0,odenen_cuzdan_id=0,txid_kodu=0,tarih_saat=:tarih_saat,tur=:tur");
            $veriyi_alsinsssp->execute(array(':uye_id' =>$referans_id,':yatirilacak_token' =>$eklenecek_referans_tutari,':tarih_saat' =>$tarih_saat,':tur' =>$tur));
            $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
        }

        ##







        $veriyi_alsinsssp = $db->prepare("SELECT * FROM uyeler WHERE id=:id_kimlik");
        $veriyi_alsinsssp->execute(array(':id_kimlik' =>$uye_id));
        $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
        $bakiye = $veriyi_ceksinsssp['bakiye'];

        $yeni_bakiye = $bakiye+$yatirilacak_token;

        $veriyi_alsinsssp = $db->prepare("UPDATE uyeler SET bakiye=:bakiye WHERE id=:id_kimlik");
        $veriyi_alsinsssp->execute(array(':bakiye' =>$yeni_bakiye,':id_kimlik' =>$uye_id));
        $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);



        $veriyi_alsinsssp = $db->prepare("SELECT * FROM token_ayarlari WHERE id=1");
        $veriyi_alsinsssp->execute();
        $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
        $top_satis = $veriyi_ceksinsssp['toplam_satis'];
        

        $yeni_top_satis = $top_satis+$yatirilacak_token;
        $yeni_top_satis = $yeni_top_satis+$eklenecek_referans_tutari;
        

        $veriyi_alsinsssp = $db->prepare("UPDATE token_ayarlari SET toplam_satis=:toplam_satis WHERE id=1");
        $veriyi_alsinsssp->execute(array(':toplam_satis' =>$yeni_top_satis));
        $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);




        $_SESSION['onaylama-islemi-basarili'] = 1;
        header("location:../onay-bekleyen-satislar");
        exit;

    } else{
        $_SESSION['limit-asildi'] = 1;
        header("location:../onay-bekleyen-satislar");
        exit;
    }
}



##

## Yönlendir

if(isset($_POST['anasayfaya-don'])){
    header("location:../index");
    exit;
}

##

## İadeyi işleme al

if(isset($_POST['iadeyi-isleme-al'])){
    $isleme_alinacak_id = $_POST['iadeyi-isleme-al'];

    $veriyi_alsinsssp = $db->prepare("UPDATE iade_talepleri SET iade_durumu=2 WHERE id=:id_kimlik");
    $veriyi_alsinsssp->execute(array(':id_kimlik' =>$isleme_alinacak_id));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
    
    $_SESSION['iade-isleme-alma-islemi-basarili'] = 1;
    header("location:../bekleyen-iade-talepleri");
    exit;
}

##

## İadeyi red et işlemi

if(isset($_POST['iadeyi-red-et'])){
    $red_edilecek_id = $_POST['iadeyi-red-et'];

    $_SESSION['red-edilecek-iade-idsi'] = $red_edilecek_id;
    header("location:../iadeyi-red-et");
    exit;
}


##

## İadeyi işle

if(isset($_POST['red-islemini-gerceklestir'])){
    $red_sebebi = $_POST['red-sebebi'];
    $red_id = $_SESSION['red-edilecek-iade-idsi'];

    $veriyi_alsinsssp = $db->prepare("UPDATE iade_talepleri SET iade_durumu=3,red_sebebi=:red_sebebi WHERE id=:id_kimlik");
    $veriyi_alsinsssp->execute(array(':red_sebebi' =>$red_sebebi,':id_kimlik' =>$red_id));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $_SESSION['red-islemi-basariyla-tamamlandi'] = 1;
    header("location:../bekleyen-iade-talepleri");
    exit;

    




}


##

## İADE ONAY

if(isset($_POST['iadeyi-onayla'])){
    $onaylanacak_id = $_POST['iadeyi-onayla'];

    $veriyi_alsinsssp = $db->prepare("UPDATE iade_talepleri SET iade_durumu=4 WHERE id=:id_kimlik");
    $veriyi_alsinsssp->execute(array(':id_kimlik' =>$onaylanacak_id));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $_SESSION['iade-basariyla-onaylandi'] = 1;
    header("location:../bekleyen-iade-talepleri");
    exit;
}

##

## Yöneticiyi düzenleme işlemi

if(isset($_POST['yoneticiyi-duzenle'])){
    $duzenlenecek_yonetici_id = $_POST['yoneticiyi-duzenle'];

    $_SESSION['duzenlenecek-yonetici-id'] = $duzenlenecek_yonetici_id;
    header("location:../yoneticiyi-duzenle");
    exit;
}






##

## Yöneticiyi güncelleme işlemi

if(isset($_POST['yoneticiyi-guncelle'])){
    $yonetici_id = $_SESSION['duzenlenecek-yonetici-id'];
    $isim_soyisim = $_POST['isim_soyisim'];
    $elektronik_posta_adresi = $_POST['e_posta'];
    $telefon_numarasi = $_POST['telefon'];

    $veriyi_alsinsssp = $db->prepare("UPDATE yoneticiler SET ad_soyad=:ad_soyad,elektronik_posta_adresi=:eposta,telefon_numarasi=:telefon_numarasi WHERE id=:id_kimlik");
    $veriyi_alsinsssp->execute(array(':ad_soyad' =>$isim_soyisim,':eposta' =>$elektronik_posta_adresi,':telefon_numarasi' =>$telefon_numarasi,':id_kimlik' =>$yonetici_id));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $_SESSION['yonetici-basariyla-guncellendi'] = 1;
    header("location:../yonetici-listesi");
    exit;
}


##

## Yöneticiyi silme işlemi

if(isset($_POST['yoneticiyi-sil'])){
    $silinecek_id = $_POST['yoneticiyi-sil'];

    $veriyi_alsinsssp = $db->prepare("DELETE FROM yoneticiler WHERE id=:id_kimlik");
    $veriyi_alsinsssp->execute(array(':id_kimlik' =>$silinecek_id));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $_SESSION['yonetici-basariyla-silindi'] = 1;
    header("location:../yonetici-listesi");
    exit;
}


##

## Yönetici ekleme işlemi

if(isset($_POST['yoneticiyi-ekle'])){
    $isim_soyisim = $_POST['isim_soyisim'];
    $e_posta = $_POST['e_posta'];
    $telefon = $_POST['telefon'];
    $parola = $_POST['parola'];

    $encrypt_method = 'AES-256-CBC'; 
    $secret_key = '11*_33'; 
    $secret_iv = '22-=**_'; 
    $key = hash('sha256', $secret_key); 
    $iv = substr(hash('sha256', $secret_iv), 0, 16); 
    
    $sifrelenen_parola = openssl_encrypt($parola,$encrypt_method, $key, false, $iv);


    $veriyi_alsinsssp = $db->prepare("INSERT INTO yoneticiler SET ad_soyad=:ad_soyad,elektronik_posta_adresi=:eposta,telefon_numarasi=:telefon_numarasi,parola=:parola");
    $veriyi_alsinsssp->execute(array(':ad_soyad' =>$isim_soyisim,':eposta' =>$e_posta,':telefon_numarasi' =>$telefon,':parola' =>$sifrelenen_parola));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $_SESSION['yonetici-basariyla-eklendi'] = 1;
    header("location:../yonetici-ekle");
    exit;

    
}



##

## Paketleri güncelleme işlemi

if(isset($_POST['paketleri-guncelle'])){
    ## Paket adları
    $paket_1 = $_POST['paket1_isim'];
    $paket_2 = $_POST['paket2_isim'];
    $paket_3 = $_POST['paket3_isim'];
    ##
    ## Paket fiyatları
    $fiyat_1 = $_POST['fiyat1'];
    $fiyat_2 = $_POST['fiyat2'];
    $fiyat_3 = $_POST['fiyat3'];
    ##
    ## Paket kazançları
    $kazanc_1 = $_POST['kazanc1'];
    $kazanc_2 = $_POST['kazanc2'];
    $kazanc_3 = $_POST['kazanc3'];
    ##
    ## Paket tokenleri
    $token_1 = $_POST['token1'];
    $token_2 = $_POST['token2'];
    $token_3 = $_POST['token3'];
    ##
    ## Veritabanına gönderim ve güncelleme işlemi


    $veriyi_alsinsssp = $db->prepare("UPDATE paketler SET paket_adi=:paket_adi,paket_fiyati=:paket_fiyati,token_degeri=:token_degeri,paket_kazanci=:paket_kazanci WHERE id=1");
    $veriyi_alsinsssp->execute(array(':paket_adi' =>$paket_1,':paket_fiyati' =>$fiyat_1,':token_degeri' =>$token_1,':paket_kazanci' =>$kazanc_1));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $veriyi_alsinsssp = $db->prepare("UPDATE paketler SET paket_adi=:paket_adi,paket_fiyati=:paket_fiyati,token_degeri=:token_degeri,paket_kazanci=:paket_kazanci WHERE id=2");
    $veriyi_alsinsssp->execute(array(':paket_adi' =>$paket_2,':paket_fiyati' =>$fiyat_2,':token_degeri' =>$token_2,':paket_kazanci' =>$kazanc_2));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $veriyi_alsinsssp = $db->prepare("UPDATE paketler SET paket_adi=:paket_adi,paket_fiyati=:paket_fiyati,token_degeri=:token_degeri,paket_kazanci=:paket_kazanci WHERE id=3");
    $veriyi_alsinsssp->execute(array(':paket_adi' =>$paket_3,':paket_fiyati' =>$fiyat_3,':token_degeri' =>$token_3,':paket_kazanci' =>$kazanc_3));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);


    $_SESSION['paketler-basariyla-guncellendi'] = 1;
    header("location:../paket-yoneticisi");
    exit;


    ##

}



##

## Ayarları güncelleme işlemi

if(isset($_POST['ayarlari-guncelle'])){
    $sinir = $_POST['sinir'];
    $cuzdan_kimligi = $_POST['cuzdan_kimligi'];
    $referans_kazanci = $_POST['kazanc_orani'];
    $token_birimi = $_POST['token_birimi'];
    $token_adi = $_POST['token_adi'];
    $dil_secimi = $_POST['dil-secimi'];

    $veriyi_alsinsssp = $db->prepare("UPDATE token_ayarlari SET on_satis_siniri=:on_satis_siniri,cuzdan_kimligi=:cuzdan_kimligi,referans_kazanci=:referans_kazanci,token_birimi=:token_birim,token_adi=:token_ad,varsayilan_dil_id=:dil_id WHERE id=1");
    $veriyi_alsinsssp->execute(array(':on_satis_siniri' =>$sinir,':cuzdan_kimligi' =>$cuzdan_kimligi,':referans_kazanci' =>$referans_kazanci,':token_birim' =>$token_birimi,':token_ad' =>$token_adi,':dil_id' =>$dil_secimi));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $_SESSION['ayarlar-basariyla-guncellendi'] = 1;
    header("location:../token-ayarlari");
    exit;


}



##

## İade nedenini düzenleme işlemi

if(isset($_POST['iade-nedenini-duzenle'])){
    $duzenlenecek_iade_id = $_POST['iade-nedenini-duzenle'];
    $_SESSION['duzenlenecek_iade_nedeni_idsi'] = $duzenlenecek_iade_id;
    header("location:../iade-nedeni-duzenle");
    exit;
}

##

## İade nedenini güncelleme işlemi

if(isset($_POST['iade-nedenini-guncelle'])){

    $guncellenecek_id = $_SESSION['duzenlenecek_iade_nedeni_idsi'] ;
    
    $iade_nedeni = $_POST['iade_nedeni'];
    

    $veriyi_alsinsssp = $db->prepare("UPDATE iade_nedenleri SET neden=:neden WHERE id=:id_kimlik");
    $veriyi_alsinsssp->execute(array(':neden' =>$iade_nedeni,':id_kimlik' =>$guncellenecek_id));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $_SESSION['iade-nedeni-basariyla-guncellendi'] = 1;
    header("location:../iade-nedenleri");
    exit;



}


##

## İade nedenini sil

if(isset($_POST['iade-nedenini-sil'])){
    $silinecek_id = $_POST['iade-nedenini-sil'];

    $veriyi_alsinsssp = $db->prepare("DELETE FROM iade_nedenleri WHERE id=:id_kimlik");
    $veriyi_alsinsssp->execute(array(':id_kimlik' =>$silinecek_id));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $_SESSION['iade-nedeni-basariyla-silindi'] = 1;
    header("location:../iade-nedenleri");
    exit;

}

##

## İade nedenini ekle

if(isset($_POST['iade-nedenini-ekle'])){
    $iade_nedeni = $_POST['iade_nedeni'];

    $veriyi_alsinsssp = $db->prepare("INSERT INTO iade_nedenleri SET neden=:neden");
    $veriyi_alsinsssp->execute(array(':neden' =>$iade_nedeni));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $_SESSION['iade-nedeni-basariyla-eklendi'] = 1;
    header("location:../iade-nedenleri");
    exit;
}

##

if(isset($_POST['parolayi-guncelle'])){
    $mevcut_parola = $_POST['mevcut_parola'];
    $yeni_parola = $_POST['yeni_parola'];
    $yeni_parola_onay = $_POST['yeni_parola_onay'];

    $encrypt_method = 'AES-256-CBC'; 
    $secret_key = '11*_33'; 
    $secret_iv = '22-=**_'; 
    $key = hash('sha256', $secret_key); 
    $iv = substr(hash('sha256', $secret_iv), 0, 16); 
    
    $sifrelenen_parola = openssl_encrypt($mevcut_parola,$encrypt_method, $key, false, $iv);
    
    $kullanici_adi = $_SESSION['yonetici_kullanici_adi'];
    $veriyi_alsinsssp = $db->prepare("SELECT * FROM yoneticiler WHERE elektronik_posta_adresi=:eposta");
    $veriyi_alsinsssp->execute(array(':eposta' =>$kullanici_adi));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $parola = $veriyi_ceksinsssp['parola'];
    if($sifrelenen_parola == $parola){

        if($yeni_parola == $yeni_parola_onay){
            $encrypt_method = 'AES-256-CBC'; 
            $secret_key = '11*_33'; 
            $secret_iv = '22-=**_'; 
            $key = hash('sha256', $secret_key); 
            $iv = substr(hash('sha256', $secret_iv), 0, 16); 
        
            $sifrelenen_parola1 = openssl_encrypt($yeni_parola,$encrypt_method, $key, false, $iv);

            $veriyi_alsinsssp = $db->prepare("UPDATE yoneticiler SET parola=:parola WHERE elektronik_posta_adresi=:eposta");
            $veriyi_alsinsssp->execute(array(':parola' =>$sifrelenen_parola1,':eposta' =>$kullanici_adi));
            $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

            $_SESSION['parola-basariyla-degistirildi'] = 1;
            header("location:../parolayi-degistir");
            exit;


        } else{
            $_SESSION['yeni-parola-tekrar-ile-uyusmuyor'] = 1;
            header("location:../parolayi-degistir");
            exit;
        }
    } else{
        $_SESSION['parola-veritabani-ile-uyusmuyor'] = 1;
        header("location:../parolayi-degistir");
        exit;
    }

    
    
   
}

##

#


## Ayarları güncelleme işlemi

if(isset($_POST['ayarlari-guncelle-on-yuz'])){
    echo $platform = $_POST['platform'];
    echo $toplam_token = $_POST['toplam_token'];
    echo $on_satis_token_degeri = $_POST['on_satis_token_degeri'];
    
    echo $borsa_isbirligi = $_POST['borsa_isbirligi'];
    echo $kurucular_ekip = $_POST['kurucular_ekip'];
    echo $danisman = $_POST['danisman'];
    echo $odul = $_POST['odul'];

    $veriyi_alsinsssp = $db->prepare("UPDATE token_ayarlari SET platform=?,danisman=?,toplam_token=?,borsa_isbirligi=?,odul=?,on_satis_token_degeri=?,kurucular_ekip=? WHERE id=1");
    $veriyi_alsinsssp->execute(array($platform,$danisman,$toplam_token,$borsa_isbirligi,$odul,$on_satis_token_degeri,$kurucular_ekip));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $_SESSION['ayarlar-basariyla-guncellendi'] = 1;
    header("location:../on-yuz-ayarlari");
    exit;


}



##