
<?php 

$veriyi_alsinssspp = $db->prepare("SELECT * FROM token_ayarlari");
$veriyi_alsinssspp->execute();
$veriyi_ceksinssspp = $veriyi_alsinssspp->fetch(PDO::FETCH_ASSOC);

$token_adi = $veriyi_ceksinssspp['token_adi'];
$birim = $veriyi_ceksinssspp['token_birimi'];
$referans = $veriyi_ceksinssspp['referans_kazanci'];

$dil['token-nedir-header'] = $token_adi." Nedir?";
$dil['faz-sistemi-header'] = "Faz Sistemi";
$dil['yol-haritasi-header'] = "Yol Haritası";
$dil['sss-header'] = "SSS";
$dil['giris-yap-butonu'] = "Giriş Yap";
$dil['kayit-ol-butonu'] = "Kayıt Ol";
$dil['slider-yazisi'] = "Geçmişini Geleceğin İle Koru!";
$dil['title-yazisi'] = $token_adi." - Geçmişini Geleceğin İle Koru!";
$dil['navigasyon'] = "Navigasyon";
$dil['yol-haritamiz-yazi'] = "Yol Haritamız";
$dil['token-satin-al-butonlari'] = $token_adi." Satın Al";
$dil['satis-durumu-yazisi'] = "Satış Durumu";
$dil['ilerleme-cubugu-satis-yazisi'] = "Satış";
$dil['simdiye-kadar-yapilan-toplam-token-satisi'] = "Şimdiye Kadar Satılan Toplam :";
$dil['suanda-satista-olan-toplam-token'] = "Şuanda Satışta Olan Toplam :";
$dil['suana-kadar-satilan-toplam-token-degeri'] = "Şuana Kadar Satılan Toplam ".$birim." Değeri : ";
$dil['satista-olan-toplam-token-degeri'] = "Şuanda Satışta Olan Toplam ".$birim. " Değeri : ";
$dil['token-nedir'] = $token_adi." Nedir?";
$dil['token-nedir-aciklama'] = $token_adi." bulut sistemleri için bir ödeme aracı olarak oluşturulmuştur. Toplam yüz milyon (100.000.000) adet " .$token_adi." vardır." .$token_adi." madenciliği yapılamaz." .$token_adi." ın kısaltması '".$birim."'dir. ".$token_adi." Bsc ağında oluşturulmuştur. Projemizin amacı, geleceğin teknolojisi olan blockchain'i şu anda kullanılan bulut sistemleriyle birleştirmek. Depolama ücreti ödemek amacıyla çıkarılan ".$token_adi." ın hem şimdi hem de gelecek için büyük bir potansiyele sahip olacağına inanıyoruz ve bunu yapmayı hedefliyoruz.";
$dil['yeni-nesil-iko-on-satisi'] = "YENİ NESİL ICO ÖN SATIŞI";
$dil['yeni-nesil-iko-on-satisi-aciklama-1'] = "Alışılmışın dışında yeni nesil ICO ile sizde hemen yatırım yaparak kazanabilirsiniz.";
$dil['referans-basina-bonus-kazan'] = "REFERANS BAŞINA BONUS KAZAN!";
$dil['referans-basine-bonus-kazan-aciklama1'] = $token_adi." ı arkadaşlarınıza önerin. Arkadaşlarınızın sizin referansıyla her alım işleminde %" .$referans." token kazanın..";
$dil['avantajlara-genel-bakis'] = "AVANTAJLARA GENEL BAKIŞ";
$dil['avantajlara-genel-bakis-aciklama'] = $token_adi." sahibi kişiler aşağıdaki bazı avantajlara sahiptir.";
$dil['kar'] = "Kâr";
$dil['sozlesme-adresi'] = "Sözleşme Adresi";
$dil['kar-aciklama'] = "Kâr beklentisi önceden hesaplanabilir...";
$dil['cuzdan-entegrasyonu'] = "Cüzdan Entegrasyonu";
$dil['cuzdan-entegrasyonu-aciklama'] = $token_adi.", yaygın olarak kullanılan birçok cüzdanı destekler...";
$dil['sinir-yok'] = "Sınır Yok!";
$dil['sinir-yok-aciklama'] = "Her zaman her yerde kullanılabilir...";
$dil['cevre-dostu'] = "Çevre Dostu";
$dil['cevre-dostu-aciklama'] = "Yalnızca mevcut kaynaklar kullanılır. ".$token_adi." kazılamaz!";
$dil['ico-on-satisi'] = "ICO Ön Satışı";
$dil['ico-on-satisi-aciklama'] = "Alışılmışın dışında yeni nesil ICO ile sizde hemen yatırım yaparak kazanabilirsiniz... ";
$dil['yol-haritamiz'] = "YOL HARITAMIZ";
$dil['yol-haritamiz-ceyrek-1'] = "1.Çeyrek";
$dil['yol-haritamiz-ceyrek-2'] = "2.Çeyrek";
$dil['yol-haritamiz-ceyrek-3'] = "3.Çeyrek";
$dil['yol-haritamiz-ceyrek-4'] = "4.Çeyrek";
$dil['yol-haritamiz-fikir-gelistirildi'] = "Fikir Geliştirildi";
$dil['yol-haritamiz-fikir-gelistirildi-aciklama'] = $token_adi." Fikri Geliştirildi.";
$dil['yol-haritamiz-ekip-kuruldu'] = "Ekip Kuruldu";
$dil['yol-haritamiz-ekip-kuruldu-aciklama'] = $token_adi." için gerekli ekip oluşturuldu.";
$dil['yol-haritamiz-altyapi-kuruldu'] = "Altyapı Kuruldu";
$dil['yol-haritamiz-altyapi-kuruldu-aciklama'] = "Web Site hazırlandı. ".$token_adi." oluşturuldu. ICO Ön satışı yapılacak.";
$dil['yol-haritamiz-borsalarda-adim-adim'] = "Borsalarda Adım Adım";
$dil['yol-haritamiz-borsalarda-adim-adim-aciklama'] = "DEX ve CEX borsalarında ".$token_adi."ın alım satımına başlanması.";
$dil['yol-haritamiz-reklam-anlasmasi'] = "Reklam Anlaşması";
$dil['yol-haritamiz-reklam-anlasmasi-aciklama'] = "Reklam ve İşbirliği anlaşmalarının yapılması.";
$dil['yol-haritamiz-sonraki-adimlar'] = "Sonraki Adımlar";
$dil['yol-haritamiz-sonraki-adimlar-aciklama'] = "Belirlenen hedeflerden birinin gerçekleştirilmesi.";
$dil['token-yol-haritasi-alti-aciklama'] = "Bu grafik, ekonomistlerimizin kâr getiren aşamalı sistemine uyarladığı jeton ekonomimizi göstermektedir.";
$dil['sozlesme-adresi'] = "Sözleşme Adresi";
$dil['sembol'] = "Sembol";
$dil['token_isim'] = "İsim";
$dil['platform'] = "Platform";
$dil['toplam-token'] = "Toplam ".$token_adi."";
$dil['on-satis-token'] = "Ön Satış Yapılacak Toplam ".$token_adi."";
$dil['on-satis'] = "Ön Satış";
$dil['borsa-ve-isbirligi'] = "Borsa ve İşbirliği";
$dil['kurucular-ve-ekip'] = "Kurucular ve Ekip";
$dil['danismanlar'] = "Danışmanlar";
$dil['odul'] = "Ödül";
$dil['sss-baslik'] = "Sıkça Sorulan Sorular";
$dil['sss-token-nedir'] = $token_adi." nedir?";
$dil['sss-token-nedir-aciklama'] = $token_adi." bulut sistemleri için bir ödeme aracı olarak oluşturulmuştur. Toplam yüz milyon (100.000.000) adet " .$token_adi." vardır." .$token_adi." madenciliği yapılamaz." .$token_adi." ın kısaltması '".$birim."'dir. ".$token_adi." Bsc ağında oluşturulmuştur. Projemizin amacı, geleceğin teknolojisi olan blockchain'i şu anda kullanılan bulut sistemleriyle birleştirmek. Depolama ücreti ödemek amacıyla çıkarılan ".$token_adi." ın hem şimdi hem de gelecek için büyük bir potansiyele sahip olacağına inanıyoruz ve bunu yapmayı hedefliyoruz.";
$dil['sss-token-nasil-satin-alinir'] = $token_adi." nasıl satın alınır?";
$dil['sss-token-nasil-satin-alinir-aciklama'] = $token_adi." ı yalnızca sitemizde satılacaktır. Web sitemizin üst kısmındaki '".$token_adi." SATIN AL' seçeneğine tıklayın, e-posta adresinizi girerek kaydolun. Kaydolduktan sonra ICO'muzda ilk ".$token_adi." ızı almaya hazır olacaksınız.";
$dil['sss-token-alabilecegim-kac-tane-paket-var'] = $token_adi." satın alabileceğim kaç tane kampanya var?";
$dil['sss-token-alabilecegim-kac-tane-paket-var-aciklama'] = $token_adi." ICO ön satışı 3 kampanya şeklinde satılacaktır. En az 100 dolarlık alım yapılabilmektedir.";
$dil['sss-on-satis-ne-zaman-bitecek'] = $token_adi." ICO ön satışı ne zaman bitecek?";
$dil['sss-on-satis-ne-zaman-bitecek-aciklama'] = $token_adi." ICO ön satışı 10.000.000 ".$birim." token satılınca veya büyük bir borsayla anlaşınca bitecektir.";
$dil['sss-token-bilinirligi'] = $token_adi." ın bilinirliği neden bu kadar az?";
$dil['sss-token-bilinirligi-aciklama'] = "Şu anda aktif olarak Twitter hesabımızı kullanıyoruz. İlerleyen zamanlarda farklı platformlar ile hizmet vermeye başlayacağız.";
$dil['sss-en-az-kac-adet-alinir'] = "En az kaç adet ".$token_adi." satın alabilirim?";
$dil['sss-en-az-kac-adet-alinir-aciklama'] = $token_adi." alımı en az 100 Dolar ile gerçekleşmektedir.";
$dil['bizimle-iletisime-gecin-baslik'] = "BİZİMLE İLETİŞİME GEÇİN";
$dil['big-isim-soyisim'] = "İsim Soyisim";
$dil['big-place-isim'] = "Lütfen isminizi soyisminizi giriniz";
$dil['big-e-posta'] = "Elektronik Posta Adresiniz";
$dil['big-e-posta-place'] = "Lütfen E-Posta adresinizi giriniz";
$dil['big-sorununuz'] = "Sorununuz";
$dil['big-sorun-place'] = "Lütfen sorununuzu yazınız";
$dil['big-eposta-adresi'] = "E-Posta Adresi";
$dil['big-gonder-butonu'] = "Gönder";




























?>
