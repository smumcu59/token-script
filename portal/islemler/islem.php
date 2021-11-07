
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



    
    $login = $db->prepare("SELECT * FROM uyeler WHERE elektronik_posta_adresi= :eposta AND parola= :parolasifre");
    $login->execute(array(':eposta' => $elektronik_posta_adresi, ':parolasifre' => $sifrelenen_parola));
    if ($login->rowCount())
    {
        //echo "Login success\n Welcome $kullanici_adi";
        
        $_SESSION['kullanici_adi']=$elektronik_posta_adresi;
        
        $_SESSION['uye-oturumu']="1";
        echo $sifrelenen_parola;
        
        $_SESSION['uye-giris-durumu']="False";
        header("location:/portal/index.php");
        exit;
        
    }
    else
    {
     $basarisiz_giris = "Your login failed. Please check the information." ;  
     
     header("location:/giris-yap");
     echo $sifrelenen_parola;
     $_SESSION['uye-giris-durumu']="True";
     exit;
     
        
    }
     
      
 }
 ##Giriş yapma sistemi bitiş

 ## Kayıt olma başlangıç

if(isset($_POST['kayit-ol'])){
    $isim_soyisim = $_POST['kullanici_isim_soyisim'];
    
    $parola = $_POST['parola'];
    
    $elektronik_posta = $_POST['eposta'];
    
    $referans = $_POST['referans'];

    if($elektronik_posta == $referans){
        $_SESSION['e-posta-ile-referans-ayni'] = 1;
        header("location:/kayit-ol");
        exit;
    }
    
    $veriyi_alsinss = $db->prepare("SELECT * FROM uyeler WHERE elektronik_posta_adresi= :eposta");
    $veriyi_alsinss->execute(array(':eposta' => $referans));
    $veriyi_ceksinss = $veriyi_alsinss->fetch(PDO::FETCH_ASSOC);
    $referans_id = $veriyi_ceksinss['id'];
    

    
    $encrypt_method = 'AES-256-CBC'; 
    $secret_key = '11*_33'; 
    $secret_iv = '22-=**_'; 
    $key = hash('sha256', $secret_key); 
    $iv = substr(hash('sha256', $secret_iv), 0, 16); 
    
    $sifrelenen_parola = openssl_encrypt($parola,$encrypt_method, $key, false, $iv);
    



    $veriyi_alsinss = $db->prepare("INSERT INTO uyeler SET elektronik_posta_adresi=:eposta,parola=:parola,isim_soyisim=:isim_soyisim,referans=:referans_id");
    $veriyi_alsinss->execute(array(':eposta' => $elektronik_posta,':parola' =>$sifrelenen_parola,':isim_soyisim' =>$isim_soyisim,':referans_id' =>$referans_id));
    $veriyi_ceksinss = $veriyi_alsinss->fetch(PDO::FETCH_ASSOC);

    $_SESSION['kayıt-basarili'] = 1;
    header("location:/giris-yap");
    exit;


}


 ## Bitiş

 ## Paket seçimi ve adet sonucu kazanç ve toplam hesaplama
if(isset($_POST['satin-al'])){
    $kimlik = $_POST['kimlik']; ## Paketin kimlik numarası var. 1 ile 3 arasında
    $satin_alinacak_adet = $_POST['adet']; ## Müşterinin talep etmiş olduğu paket adedi var. 

    $veriyi_alsinss = $db->prepare("SELECT * FROM paketler WHERE id=:kimlik");
    $veriyi_alsinss->execute(array(':kimlik' =>$kimlik));
    $veriyi_ceksinss = $veriyi_alsinss->fetch(PDO::FETCH_ASSOC);

    $paket_fiyati = $veriyi_ceksinss['paket_fiyati']; ## Paketin fiyatı var.
    $paket_kazanci = $veriyi_ceksinss['paket_kazanci']; ## Yüzdelik değer var örn %20

    

    $token_degeri = $veriyi_ceksinss['token_degeri'];

    $bonus_haric_token_toplami = $token_degeri*$satin_alinacak_adet;


    
    $toplam_kazanc = ($bonus_haric_token_toplami/100)*$paket_kazanci;


    $toplam_token_degeri = $bonus_haric_token_toplami+$toplam_kazanc;
    $toplam_paket_fiyati = $paket_fiyati*$satin_alinacak_adet;


    $veriyi_alsinsss = $db->prepare("SELECT * FROM token_ayarlari WHERE id=1");
    $veriyi_alsinsss->execute();
    $veriyi_ceksinsss = $veriyi_alsinsss->fetch(PDO::FETCH_ASSOC);
    $on_satis_siniri = $veriyi_ceksinsss['on_satis_siniri'];

    if($on_satis_siniri >= $toplam_token_degeri){
        $_SESSION['paket_kimligi'] = $kimlik;
        $_SESSION['paket_adedi'] = $satin_alinacak_adet;
        $_SESSION['hediye_edilen_tutar'] = $toplam_kazanc;
        $_SESSION['toplam_token'] = $toplam_token_degeri;
        $_SESSION['toplam_tutar'] = $toplam_paket_fiyati;

        header("location:../kasa");
        exit;
    } else{
        $_SESSION['token-siniri-asildi'] = 1;
        header("location:../index");
        exit;
    }






    
    




}



 ## Bitiş

 ## Cüzdan ekleme işlemi

if(isset($_POST['cuzdani-ekle'])){
    $cuzdan_kimligi = $_POST['cuzdanKimligi'];
    echo $cuzdan_kimligi."<br>";
    $cuzdan_adi = $_POST['cuzdanAdi'];
    echo $cuzdan_adi."<br>";
    
    $kullanici_adi = $_SESSION['kullanici_adi'] ;
    echo $kullanici_adi."<br>";
    
    $veriyi_alsinsssp = $db->prepare("SELECT * FROM uyeler WHERE elektronik_posta_adresi=:eposta");
    $veriyi_alsinsssp->execute(array(':eposta' =>$kullanici_adi));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
    $kullanici_idsi = $veriyi_ceksinsssp['id'];

    $veriyi_alsinsss = $db->prepare("INSERT INTO cuzdan_bilgisi SET cuzdan_kimligi =:cuzdan_kimlik, isim=:cuzdan_isim, uye_id=:uye_kimlik");
    $veriyi_alsinsss->execute(array(':cuzdan_kimlik' =>$cuzdan_kimligi,':cuzdan_isim' =>$cuzdan_adi,':uye_kimlik' =>$kullanici_idsi));
    $veriyi_ceksinsss = $veriyi_alsinsss->fetch(PDO::FETCH_ASSOC);
    
    $_SESSION['cuzdan-basariyla-eklendi'] = 1;
    header("location:../cuzdanim");
    exit;
}




 ## Bitiş

 ## Satın alma işlemi

if(isset($_POST['satin-alimi-onayla'])){
    $txid = $_POST['txid'];
    $cuzdan_secimi = $_POST['cuzdan_secimi'];
    $kullanici_adi = $_SESSION['kullanici_adi'];
    
    $veriyi_alsinsssp = $db->prepare("SELECT * FROM uyeler WHERE elektronik_posta_adresi=:eposta");
    $veriyi_alsinsssp->execute(array(':eposta' =>$kullanici_adi));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
    $kullanici_idsi = $veriyi_ceksinsssp['id'];

    $yatirilacak_token = $_SESSION['toplam_token'];
    $hediye_tutari = $hediyeli_tutar = $_SESSION['hediye_edilen_tutar'];
    $hediye_haric_tutar = $_SESSION['hediye_haric_tutar'];
    $odenen_tutar = $_SESSION['toplam_tutar'];
    $paket_kimligi = $_SESSION['paket_kimligi'];
    $paket_adedi = $_SESSION['paket_adedi'];
    date_default_timezone_set('Europe/Istanbul');
    echo $tarih_saat = date('d/m/Y H:i:s');



    $veriyi_alsinsss = $db->prepare("INSERT INTO odeme_gecmisi SET uye_id=:uye_kimlik,yatirilacak_token=:yatan_token,hediyesiz_token=:hediyesiz_token,hediye_token=:hediye_token,odenen_tutar=:odenen_para,paket_id=:paket_kimlik,alinan_adet=:alinan_adet,odenen_cuzdan_id=:odenen_cuzdan_kimlik,txid_kodu=:txid_kodu,tarih_saat=:tarih_saat");
    $veriyi_alsinsss->execute(array(':uye_kimlik' =>$kullanici_idsi,':yatan_token' =>$yatirilacak_token,':hediyesiz_token' => $hediye_haric_tutar,':hediye_token' => $hediye_tutari,':odenen_para' =>$odenen_tutar,':paket_kimlik' =>$paket_kimligi,':alinan_adet' =>$paket_adedi,':odenen_cuzdan_kimlik' =>$cuzdan_secimi,':txid_kodu' =>$txid,':tarih_saat' =>$tarih_saat));
    $veriyi_ceksinsss = $veriyi_alsinsss->fetch(PDO::FETCH_ASSOC);

    $_SESSION['satin-alim-basarili'] = 1;
    header("location:../index");
    exit;
    



    
}



 ##
## İade görüntüle

if(isset($_POST['iade-basvurusunu-goruntule'])){
    $iade_edilen_id = $_POST['iade-basvurusunu-goruntule'];

    $_SESSION['iade_edilen_basvuruyu_goruntule'] = $iade_edilen_id;
    header("location:../iade-goruntule");
    exit;
}


##

## İade taleplerine dön
if(isset($_POST['iade-taleplerine-don'])){
    header("location:../iade-talepleri");
    exit;
}
##

## İade başvurusu yap

if(isset($_POST['iade-basvurusu-yap'])){
    header("location:../iade-basvurusu-yap");
    exit;

}


##

## İade başvurusunu işle

if(isset($_POST['iade-basvurusu-isle'])){

    $islem_numarasi = $_POST['islem_secimi'];
    $iade_sebebi = $_POST['iade_sebebi_secimi'];
    $aciklama = $_POST['aciklama'];
    date_default_timezone_set('Europe/Istanbul');
    $tarih_saat = date('d/m/Y H:i:s');
    


    $kullanici_adi = $_SESSION['kullanici_adi'];
    
    $veriyi_alsinsssp = $db->prepare("SELECT * FROM uyeler WHERE elektronik_posta_adresi=:eposta");
    $veriyi_alsinsssp->execute(array(':eposta' =>$kullanici_adi));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
    $kullanici_idsi = $veriyi_ceksinsssp['id'];


    $veriyi_alsinsss = $db->prepare("INSERT INTO iade_talepleri SET uye_id=:uye_kimlik,iade_sebebi=:iade_sebep,kullanici_aciklamasi=:kullanici_aciklama,basvuru_tarih_saat=:basvuru_tarih_saat,islem_id=:islem_kimlik");
    $veriyi_alsinsss->execute(array(':uye_kimlik' =>$kullanici_idsi,':iade_sebep' =>$iade_sebebi,':kullanici_aciklama' =>$aciklama,':basvuru_tarih_saat' =>$tarih_saat,':islem_kimlik' =>$islem_numarasi));
    $veriyi_ceksinsss = $veriyi_alsinsss->fetch(PDO::FETCH_ASSOC);


    $_SESSION['iade-basvurusu-alindi'] = 1;
    header("location:../iade-talepleri");
    exit;

   



}




##

## Cüzdanı sil

if(isset($_POST['cuzdani-sil'])){
    $silinecek_id = $_POST['cuzdani-sil'];

    $veriyi_alsinsssp = $db->prepare("UPDATE cuzdan_bilgisi SET durum=0 WHERE id=:id_kimlik");
    $veriyi_alsinsssp->execute(array(':id_kimlik' =>$silinecek_id));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $_SESSION['cuzdan-basariyla-devre-disi-birakildi'] = 1;
    header("location:../cuzdanim");
    exit;
}




##

## Cüzdanı düzenleme işlemi

if(isset($_POST['cuzdani-duzenle'])){
    $duzenlenecek_id = $_POST['cuzdani-duzenle'];

    $_SESSION['duzenlenecek_cuzdan_idsi'] = $duzenlenecek_id;
    header("location:../cuzdani-duzenle");
    exit;

}


##

## Cüzdanı düzenle

if(isset($_POST['cuzdani-guncelle'])){
    $duzenlenecek_id = $_SESSION['duzenlenecek_cuzdan_idsi'];


    $cuzdan_numarasi = $_POST['cuzdanKimligi'];
    $cuzdan_adi = $_POST['cuzdanAdi'];

    $veriyi_alsinsssp = $db->prepare("UPDATE cuzdan_bilgisi SET cuzdan_kimligi=:cuzdan_kimlik, isim=:isim WHERE id=:id_kimlik");
    $veriyi_alsinsssp->execute(array(':cuzdan_kimlik' =>$cuzdan_numarasi,':isim' =>$cuzdan_adi,':id_kimlik' =>$duzenlenecek_id));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

    $_SESSION['duzenleme_islemi_basarili'] = 1;
    header("location:../cuzdanim");
    exit;


}



##

## Parolayı değiştir
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
    
    $kullanici_adi = $_SESSION['kullanici_adi'];
    $veriyi_alsinsssp = $db->prepare("SELECT * FROM uyeler WHERE elektronik_posta_adresi=:eposta");
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

            $veriyi_alsinsssp = $db->prepare("UPDATE uyeler SET parola=:parola WHERE elektronik_posta_adresi=:eposta");
            $veriyi_alsinsssp->execute(array(':parola' =>$sifrelenen_parola1,':eposta' => $kullanici_adi));
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

## Yönlendirme

if(isset($_POST['anasayfaya-don'])){
    header("location:../index");
    exit;
}
if(isset($_POST['cuzdanima-don'])){
    header("location:../cuzdanim");
    exit;
}

##


## Parolamı unuttum işlemi (Mail gönderimi)

if(isset($_POST['parolami_unuttum'])){
    $eposta = $_POST['elektronikPosta'];
    $_SESSION['smtp-alici-mail-adresi'] = $eposta;
    $_SESSION['smtp-mail-tipi'] = "parolami-sifirla";

    $_SESSION['smtp-alici-mail-adresi'];

    header("location:/islemler/mail-gonder");
    exit;

}


##

## Parola sifirlama işle
if(isset($_POST['parolayi-sifirla-isle'])){
    $eposta = $_SESSION['basarili-parola-sifirlama-eposta'];

    $yeni_parola = $_POST['yeni-parola'];
    $yeni_parola_tekrar = $_POST['yeni-parola-tekrar'];

    if($yeni_parola == $yeni_parola_tekrar){

        $encrypt_method = 'AES-256-CBC'; //sifreleme yontemi
        $secret_key = '11*_33'; //sifreleme anahtari
        $secret_iv = '22-=**_'; //gerekli sifreleme baslama vektoru
        $key = hash('sha256', $secret_key); //anahtar hast fonksiyonu ile sha256 algoritmasi ile sifreleniyor
        $iv = substr(hash('sha256', $secret_iv), 0, 16); 
        $sifrelendi = openssl_encrypt($yeni_parola,$encrypt_method, $key, false, $iv);
       
        $veriyi_alsinsssp = $db->prepare("UPDATE uyeler SET parola=:parola WHERE elektronik_posta_adresi=:eposta");
        $veriyi_alsinsssp->execute(array(':parola' =>$sifrelendi,':eposta' =>$eposta));
        $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

        $_SESSION['parola-basariyla-sifirlandi'] = 1;
        header("location:/giris-yap");
        exit;
    }else{
        $_SESSION['parolalar-uyusmuyor'] = 1;
        header("location:/parolami-unuttum");
        exit;
    }
    

    
}
##





?>