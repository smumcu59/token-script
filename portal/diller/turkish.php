<?php 

$veriyi_alsinssspp = $db->prepare("SELECT * FROM token_ayarlari");
$veriyi_alsinssspp->execute();
$veriyi_ceksinssspp = $veriyi_alsinssspp->fetch(PDO::FETCH_ASSOC);

$varsayilan_dil_id = $veriyi_ceksinssspp['varsayilan_dil_id'];
$token_adi = $veriyi_ceksinssspp['token_adi'];
$birim = $veriyi_ceksinssspp['token_birimi'];

## Giriş yap
$dil['giris-yap-baslik'] = $token_adi." Müşteri Girişi";
$dil['e-posta-girin'] = "Elektronik posta adresinizi girin...";
$dil['parola-girin'] = "Parolanızı girin...";
$dil['giris-yap-buton'] = "Giriş Yap";
$dil['portal-parolami-unuttum'] = "Portal Parolamı Unuttum";
$dil['kayit-ol'] = "Kayıt Ol";

##

## Kayıt ol ekranı

$dil['kayit-ol-baslik'] = $token_adi." - Müşteri Kaydı";
$dil['kayit-ol-isim-soyisim'] = "İsminizi ve Soyisminizi giriniz...";
$dil['referans-kullanici-mail'] = "Referanslı kullanıcı mail adresini giriniz...";
$dil['kayit-ol-buton'] = "Sisteme kayıt ol";
$dil['zaten-bir-hesabin-mi-var'] = "Zaten bir hesabın mı var? Giriş yap!";

##

$dil['fazladan-token-hediye'] = "Fazladan token hediye!!";


## Müşteri paneli 

$dil['token-bakiyesi-profil'] = "Token Bakiyesi :";
$dil['gecmisini-gelecegin-ile-koru-title'] = "Geçmişini Geleceğin İle Koru";
$dil['parolami-degistir'] = "Parolamı Değiştir";
$dil['cikis-yap'] = "Çıkış Yap";
$dil['anasayfa-header'] = "Anasayfa";
$dil['on-siparis-islemleri-header'] = "ÖN SİPARİŞ İŞLEMLERİ";
$dil['cuzdanim-header'] = "Cüzdanım";
$dil['islem-gecmisim-header'] = "İşlem Geçmişim";
$dil['iade-talepleri-header'] = "İade Talepleri";
## İndex
$dil['token-satin-al'] = $token_adi." Satın Al";
$dil['on-satis'] = "Ön Satış";
$dil['paket-secin'] = "Paket Seçin";
$dil['istedigin-kadar-token-satin-al'] = "İstediğin kadar ".$birim." satın al!";
$dil['yedi-yirmidort-destek'] = "7 Gün 24 Saat Destek Al!";
$dil['teknik-destek-iade-garantisi'] = "Teknik arızalara karşı iade politikası.";
$dil['adet'] = "Adet";
$dil['satin-al'] = "Satın Al";

## Bitiş


##

## Parolamı değiştir sayfası

$dil['parolayi-degistir-title'] = "Parolayı Değiştir";
$dil['parola-degistirme-islemi-title-aciklama'] = "Parola Değiştirme İşlemi";
$dil['mevcut-parolaniz'] = "Mevcut Parolanız";
$dil['yeni-parolaniz'] = "Yeni Parolanız";
$dil['yeni-parola-onayi'] = "Yeni Parola Onayı";
$dil['mevcut-parolaniz-aciklama'] = "Mevcut parolanızı giriniz...";
$dil['yeni-parolaniz-aciklama'] = "Yeni parolanızı giriniz...";
$dil['yeni-parolaniz-onayi-aciklama'] = "Yeni parolanızı tekrar giriniz...";
$dil['parolayi-guncelle'] = "Parolayı Güncelle";
$dil['anasayfaya-don'] = "Anasayfaya Dön";
$dil['goruntule-metin'] = "Görüntüle";
$dil['cuzdan-bakiyesi'] = "Cüzdan Bakiyesi";
$dil['onay-bekleyen-islem-sayisi'] = "Onay Bekleyen Ödeme İşlemi";
$dil['cuzdanlarim'] = "Cüzdanlarım";
$dil['cuzdan-kimligi'] = "Cüzdan Kimliği";
$dil['cuzdan-kimligi-aciklama'] = "Lütfen cüzdan kimliği giriniz...";
$dil['cuzdan-adi'] = "Cüzdan Adı (Cüzdanları diğer cüzdanlarınızdan ayırt edin.)";
$dil['cuzdan-adi-aciklama'] = "Lütfen cüzdan adı giriniz...";
$dil['cuzdani-ekle-buton'] = "Cüzdanı Ekle";
$dil['cuzdan-adi-tablo'] = "Cüzdan Adı";
$dil['secenek-tablo'] = "Seçenek";
$dil['geri-don'] = "Geri Dön";




##

## İşlem geçmişi

$dil['islem-gecmisi'] = "İşlem Geçmişi";
$dil['txid-islem-numarasi'] = "TxID (İşlem) Numarası";
$dil['tarih-saat'] = "Tarih/Saat";
$dil['iade-cuzdani'] = "İade Cüzdanı";
$dil['token-metin'] = "Token";
$dil['odenen-tutar'] = "Ödenen Tutar";
$dil['islem-turu'] = "İşlem Türü";
$dil['islem-durumu'] = "İşlem Durumu";





##
## İade talepleri

$dil['iade-talepleri'] = "İade Talepleri";
$dil['basvuru-tarih-saat'] = "Başvuru Tarihi/Saati";
$dil['iade-sebebi'] = "İade Sebebi";
$dil['iade-durumu'] = "İade Durumu";
$dil['iade-basvurusu-yap'] = "İade Başvurusu Yap";
##

## Kasa

$dil['kasa'] = "Kasa";
$dil['satin-alim-islemi'] = "Satın Alım İşlemi";
$dil['secimlerim'] = "Seçimlerim";
$dil['tek-paket-fiyati'] = "Tek Paket Fiyatı";
$dil['toplam-tutar'] = "Toplam Tutar";
$dil['hediyesiz-toplam-token'] = "Hediyesiz Toplam ".$birim."";
$dil['hediye-edilen-toplam-token'] = "Hediye Edilen Toplam ".$birim."";
$dil['hesaba-yatacak-toplam-token'] = "Hesaba Yatırılacak Toplam ".$birim."";
$dil['islem-kimligi'] = "İşlem Kimliği (TxId)";
$dil['iade-cuzdaniniz'] = "İade Cüzdanınız";
$dil['islem-kimligi-aciklama'] = "İşlem kimliğini (TXID) giriniz...";
$dil['odeme'] = "Ödeme";
$dil['odeme-yapacaginiz-odeme-adresi'] = "Ödemeyi yapacağınız USD TRC-20 Adresi :";
$dil['uyari'] = "UYARI:";
$dil['bilgi'] = "BİLGİ:";
$dil['uyari-1-aciklama'] = "Yukarıda verilen adrese ödemeyi yaparken TRON ağını kullanmalısınız.";
$dil['uyari-2-aciklama'] = "Gerçekleşecek teknik aksaklıklarda iade işlemi yapılırken sizin girmiş olduğunuz TXID numarası büyük rol oynar. Lütfen TXID numarasını doğru bir şekilde girin.";
$dil['bilgi-1-aciklama'] = "Ödeme işleminde işlem ücretini siz karşılarsınız.";
$dil['bilgi-2-aciklama'] = "Yeni kayıt olan müşterilerimiz 'Cüzdanım' bölümünden cüzdanlarını eklemelidirler.";
$dil['onay-yazisi'] = "Yukarıdaki bilgilendirme mesajlarını okudum. Ödemeyi gerçekleştirdim ve işlem kimliğini (Txİd) doğru bir şekilde girdim.";
$dil['satin-alimi-onayla'] = "Satın Alımı Onayla";
$dil['cuzdan-kimligi-aciklama-11'] = "Lütfen cüzdan kimliği giriniz...";
$dil['cuzdan-adi-aciklama-11'] = "Lütfen cüzdan adı giriniz...";

##

## Cüzdanı düzenle
$dil['cuzdani-duzenle'] = "Cüzdanı Düzenle";
$dil['duzenleme-islemi'] = "Düzenleme İşlemi";
$dil['cuzdani-guncelle'] = "Cüzdanı Güncelle";


##

## İade başvurusu yap

$dil['iade-basvurusu-yap'] = "İade Başvurusu Yap";
$dil['basvuru'] = "Başvuru";
$dil['kullanici-yorumu'] = "Kullanıcı Yorumu";
$dil['basvuruyu-gonder'] = "Başvuruyu Gönder";


##


## Parolamı unuttum

$dil['parolami-unuttum-baslik'] = "Parolamı Unuttum Sayfası";
$dil['parolami-unuttum-gonder'] = "Mail Gönder";

##











?>
