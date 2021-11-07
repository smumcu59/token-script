<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include 'baglan.php';
session_start();
ob_start();

$veriyi_alsinsssp = $db->prepare("SELECT * FROM elektronik_posta_ayarlari ");
$veriyi_alsinsssp->execute();
$veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

$smtp_sunucusu = $veriyi_ceksinsssp['smtp_sunucusu'];
$smtp_mail_adresi = $veriyi_ceksinsssp['smtp_mail_adresi'];
$smtp_mail_parolasi = $veriyi_ceksinsssp['smtp_mail_parolasi'];
$smtp_mail_port = $veriyi_ceksinsssp['smtp_port'];
$smtp_guvenlik = $veriyi_ceksinsssp['smtp_guvenlik'];

$alici_mail_adresi = $_SESSION['smtp-alici-mail-adresi'];

$mail_tipi = $_SESSION['smtp-mail-tipi'];



if($mail_tipi == "parolami-sifirla"){


    $veriyi_alsinsssp = $db->prepare("SELECT * FROM uyeler WHERE elektronik_posta_adresi=:eposta");
    $veriyi_alsinsssp->execute(array(':eposta' => $alici_mail_adresi));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
    $uye_id = $veriyi_ceksinsssp['id'];
    if ($veriyi_alsinsssp->rowCount())
    {

        $sayi = rand(1,500000);

        $encrypt_method = 'AES-256-CBC'; //sifreleme yontemi
        $secret_key = '11*_33'; //sifreleme anahtari
        $secret_iv = '22-=**_'; //gerekli sifreleme baslama vektoru
        $key = hash('sha256', $secret_key); //anahtar hast fonksiyonu ile sha256 algoritmasi ile sifreleniyor
        $iv = substr(hash('sha256', $secret_iv), 0, 16); 

        $sifrelendi = openssl_encrypt($sayi,$encrypt_method, $key, false, $iv);

        $veriyi_alsinsssp = $db->prepare("UPDATE uyeler SET guvenlik_kodu=:gk WHERE elektronik_posta_adresi=:eposta");
        $veriyi_alsinsssp->execute(array(':gk' =>$sifrelendi,':eposta' =>$alici_mail_adresi));
        $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);

        $konu = 'Archive Token Parola Sıfırlama İşlemi';
        $icerik = 'Parola Sıfırlama Kodunuz : https://archive.tikokul.ml/sifirla?dogrulama='.$sifrelendi."&id=".$uye_id;

    } else {
        $_SESSION['veritabaninda-mail-yok'] = 1;
        header("location:../parolami-unuttum");
        exit;
    }
}




require '../phpMailer/src/Exception.php';
require '../phpMailer/src/PHPMailer.php';
require '../phpMailer/src/SMTP.php';


$mail = new PHPMailer(true);
try {
 //Server settings
 $mail->CharSet = 'UTF-8';
 $mail->SMTPDebug = 0; // debug on - off
 $mail->isSMTP(); 
 $mail->Host = $smtp_sunucusu; // SMTP sunucusu örnek : mail.alanadi.com
 $mail->SMTPAuth = true; // SMTP Doğrulama
 $mail->Username = $smtp_mail_adresi; // Mail kullanıcı adı
 $mail->Password = $smtp_mail_parolasi; // Mail şifresi
 $mail->SMTPSecure = $smtp_guvenlik; // Şifreleme
 $mail->Port = $smtp_mail_port; // SMTP Port
$mail->SMTPOptions = array(
 'ssl' => array(
 'verify_peer' => false,
 'verify_peer_name' => false,
 'allow_self_signed' => true
 )
);

 //Alıcılar
 $mail->setfrom($smtp_mail_adresi, 'Archive Token Destek');
 $mail->addAddress($alici_mail_adresi);

 //İçerik
 $mail->isHTML(true);
 $mail->Subject = $konu;
 $mail->Body = $icerik;

 $mail->send();
 $_SESSION['mail-basariyla-gonderildi'] = 1;
 header("location:../giris-yap");
 exit;
} catch (Exception $e) {
 echo 'Mesajınız İletilemedi. Hata: ', $mail->ErrorInfo;
}

?>