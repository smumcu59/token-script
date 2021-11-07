<?php 

$veriyi_alsinssspp = $db->prepare("SELECT * FROM token_ayarlari");
$veriyi_alsinssspp->execute();
$veriyi_ceksinssspp = $veriyi_alsinssspp->fetch(PDO::FETCH_ASSOC);

$varsayilan_dil_id = $veriyi_ceksinssspp['varsayilan_dil_id'];
$token_adi = $veriyi_ceksinssspp['token_adi'];
$birim = $veriyi_ceksinssspp['token_birimi'];

## Giriş yap - Login Page
$dil['giris-yap-baslik'] = $token_adi." Customer Login";
$dil['e-posta-girin'] = "Enter your e-mail address...";
$dil['parola-girin'] = "Enter your password...";
$dil['giris-yap-buton'] = "Login";
$dil['portal-parolami-unuttum'] = "Forgot Password";
$dil['kayit-ol'] = "Register";

##

## Kayıt ol ekranı

$dil['kayit-ol-baslik'] = $token_adi." - Müşteri Kaydı";
$dil['kayit-ol-isim-soyisim'] = "İsminizi ve Soyisminizi giriniz...";
$dil['referans-kullanici-mail'] = "Referanslı kullanıcı mail adresini giriniz...";
$dil['kayit-ol-buton'] = "Sisteme kayıt ol";
$dil['zaten-bir-hesabin-mi-var'] = "Zaten bir hesabın mı var? Giriş yap!";

##

## Parolamı unuttum

$dil['parolami-unuttum-baslik'] = "Forgot Password Page";
$dil['parolami-unuttum-gonder'] = "SEND MAİL";

##


## Müşteri paneli - Customer Panel

$dil['token-bakiyesi-profil'] = "Token Balance :";
$dil['gecmisini-gelecegin-ile-koru-title'] = "Protect Your Past With Your Future";
$dil['parolami-degistir'] = "Change Password";
$dil['cikis-yap'] = "Logout";
$dil['anasayfa-header'] = "Home";
$dil['on-siparis-islemleri-header'] = "PRE-ORDER PROCESS";
$dil['cuzdanim-header'] = "My Wallet";
$dil['islem-gecmisim-header'] = "My Transaction History";
$dil['iade-talepleri-header'] = "Return Requests";
## İndex
$dil['token-satin-al'] = "Buy ".$token_adi."";
$dil['on-satis'] = "Pre-Sale";
$dil['paket-secin'] = "Select Package";
$dil['istedigin-kadar-token-satin-al'] = "Buy as many ".$birim." s as you want!";
$dil['yedi-yirmidort-destek'] = "Get Support 24 Hours, 7 Days a Day!";
$dil['teknik-destek-iade-garantisi'] = "Return policy against technical malfunctions.";
$dil['adet'] = "Number";
$dil['satin-al'] = "Buy";

$dil['fazladan-token-hediye'] = "Fazladan token hediye!!";

## Bitiş


##

## Parolamı değiştir sayfası - Change password page

$dil['parolayi-degistir-title'] = "Change Password";
$dil['parola-degistirme-islemi-title-aciklama'] = "Password Change Process";
$dil['mevcut-parolaniz'] = "Your Current Password";
$dil['yeni-parolaniz'] = "New Password";
$dil['yeni-parola-onayi'] = "New Password Confirmation";
$dil['mevcut-parolaniz-aciklama'] = "Enter your current password...";
$dil['yeni-parolaniz-aciklama'] = "Enter your new password...";
$dil['yeni-parolaniz-onayi-aciklama'] = "Re-enter your new password...";
$dil['parolayi-guncelle'] = "Update Password";
$dil['anasayfaya-don'] = "Back to Homepage";
$dil['goruntule-metin'] = "View";
$dil['cuzdan-bakiyesi'] = "Wallet Balance";
$dil['onay-bekleyen-islem-sayisi'] = "Payment Transaction Pending Approval";
$dil['cuzdanlarim'] = "My wallets";
$dil['cuzdan-kimligi'] = "Wallet ID";
$dil['cuzdan-kimligi-aciklama'] = "Please enter wallet ID...";
$dil['cuzdan-adi'] = "Wallet Name (Distinguish Wallets from your other wallets.)";
$dil['cuzdan-adi-aciklama'] = "Please enter wallet name...";
$dil['cuzdani-ekle-buton'] = "Add Wallet";
$dil['cuzdan-adi-tablo'] = "Wallet name";
$dil['secenek-tablo'] = "Action";
$dil['geri-don'] = "Back";




##

## İşlem geçmişi

$dil['islem-gecmisi'] = "Transaction History";
$dil['txid-islem-numarasi'] = "TxID (Transaction) Number";
$dil['tarih-saat'] = "Date/Time";
$dil['iade-cuzdani'] = "Returns Wallet";
$dil['token-metin'] = "Token";
$dil['odenen-tutar'] = "Amount Paid";
$dil['islem-turu'] = "Operation type";
$dil['islem-durumu'] = "Transaction Status";





##
## İade talepleri - Refund/Return request page

$dil['iade-talepleri'] = "Return Requests";
$dil['basvuru-tarih-saat'] = "Application Date/Time";
$dil['iade-sebebi'] = "Reason for Return";
$dil['iade-durumu'] = "Return Status";
$dil['iade-basvurusu-yap'] = "Apply for a Return";
##

## Kasa - Checkout

$dil['kasa'] = "Checkout";
$dil['satin-alim-islemi'] = "Purchase Process";
$dil['secimlerim'] = "My choices";
$dil['tek-paket-fiyati'] = "Single Package Price";
$dil['toplam-tutar'] = "Total amount";
$dil['hediyesiz-toplam-token'] = "No Gift Total ".$birim."";
$dil['hediye-edilen-toplam-token'] = "Total ".$birim." Gifted";
$dil['hesaba-yatacak-toplam-token'] = "Total ".$birim." to be Deposited";
$dil['islem-kimligi'] = "Transaction ID (TxId)";
$dil['iade-cuzdaniniz'] = "Your Returns Wallet";
$dil['islem-kimligi-aciklama'] = "Enter the Transaction ID (TXID)...";
$dil['odeme'] = "Payment";
$dil['odeme-yapacaginiz-odeme-adresi'] = "USD TRC-20 Address where you will make the payment :";
$dil['uyari'] = "WARNING:";
$dil['bilgi'] = "INFORMATION:";
$dil['uyari-1-aciklama'] = "You must use the TRON network when making the payment to the address given above.";
$dil['uyari-2-aciklama'] = "The TXID number you entered plays a major role in the return process in case of technical problems. Please enter the TXID number correctly.";
$dil['bilgi-1-aciklama'] = "You bear the transaction fee for the payment process.";
$dil['bilgi-2-aciklama'] = "Our newly registered customers should add their wallets in the 'My Wallet' section.";
$dil['onay-yazisi'] = "I have read the above informational messages. I made the payment and entered the transaction ID (TxId) correctly.";
$dil['satin-alimi-onayla'] = "Confirm Purchase";
$dil['cuzdan-kimligi-aciklama-11'] = "Please enter wallet ID...";
$dil['cuzdan-adi-aciklama-11'] = "Please enter wallet name...";

##

## Cüzdanı düzenle - Edit wallet
$dil['cuzdani-duzenle'] = "Edit Wallet";
$dil['duzenleme-islemi'] = "Edit Process";
$dil['cuzdani-guncelle'] = "Update Wallet";


##

## İade başvurusu yap - Return/Refund apply

$dil['iade-basvurusu-yap'] = "Apply for a Return";
$dil['basvuru'] = "Application";
$dil['kullanici-yorumu'] = "User Comment";
$dil['basvuruyu-gonder'] = "Submit Application";


##




?>
