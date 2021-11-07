
<?php 

$veriyi_alsinssspp = $db->prepare("SELECT * FROM token_ayarlari");
$veriyi_alsinssspp->execute();
$veriyi_ceksinssspp = $veriyi_alsinssspp->fetch(PDO::FETCH_ASSOC);

$token_adi = $veriyi_ceksinssspp['token_adi'];
$birim = $veriyi_ceksinssspp['token_birimi'];
$referans = $veriyi_ceksinssspp['referans_kazanci'];

$dil['token-nedir-header'] = "What İs ".$token_adi."?";
$dil['faz-sistemi-header'] = "Phase System";
$dil['yol-haritasi-header'] = "Road Map";
$dil['sss-header'] = "FAQ";
$dil['giris-yap-butonu'] = "Login";
$dil['kayit-ol-butonu'] = "Register";
$dil['slider-yazisi'] = "PROTECT YOUR PAST WITH YOUR FUTURE!";
$dil['title-yazisi'] = "".$token_adi." - Geçmişini Geleceğin İle Koru!";
$dil['navigasyon'] = "Navigasyon";
$dil['yol-haritamiz-yazi'] = "Yol Haritamız";
$dil['token-satin-al-butonlari'] = "Buy ".$token_adi."";
$dil['satis-durumu-yazisi'] = "Sales Status";
$dil['ilerleme-cubugu-satis-yazisi'] = "Sales";
$dil['simdiye-kadar-yapilan-toplam-token-satisi'] = "Total Sold So Far :";
$dil['suanda-satista-olan-toplam-token'] = "Total Currently On Sale :";
$dil['suana-kadar-satilan-toplam-token-degeri'] = "Total ".$birim." Value Sold So Far : ";
$dil['satista-olan-toplam-token-degeri'] = "Total ".$birim." Value Currently On Sale : ";
$dil['token-nedir'] = "What is ".$token_adi."?";
$dil['token-nedir-aciklama'] = "".$token_adi." was created as a payment tool for cloud systems. There are a total of one hundred million (100,000,000) ".$token_adi.". ".$token_adi." cannot be mined. The abbreviation of ".$token_adi." is '".$birim."'. ".$token_adi." was created on the Bsc network. The aim of our project is to combine blockchain, the technology of the future, with currently used cloud systems. We believe that the ".$token_adi." issued to pay for storage will have great potential both now and for the future, and we aim to do so.";
$dil['yeni-nesil-iko-on-satisi'] = "NEW GENERATION ICO PRE-SALE";
$dil['yeni-nesil-iko-on-satisi-aciklama-1'] = "With an unusual new generation ICO, you can earn by investing immediately.";
$dil['referans-basina-bonus-kazan'] = "EARN BONUS PER REFERENCE!";
$dil['referans-basine-bonus-kazan-aciklama1'] = "Recommend ".$token_adi." to your friends. Earn ".$referans."% tokens on every purchase with your friends' referrals.";
$dil['avantajlara-genel-bakis'] = "ADVANTAGES OVERVIEW";
$dil['avantajlara-genel-bakis-aciklama'] = "People who own ".$token_adi." have the following advantages.";
$dil['kar'] = "Profit";
$dil['kar-aciklama'] = "Profit expectation can be calculated in advance...";
$dil['cuzdan-entegrasyonu'] = "Wallet Integration";
$dil['cuzdan-entegrasyonu-aciklama'] = $token_adi." supports many commonly used wallets...";
$dil['sinir-yok'] = "No limit!!";
$dil['sinir-yok-aciklama'] = "Can be used anytime, anywhere...";
$dil['cevre-dostu'] = "Eco-Friendly";
$dil['cevre-dostu-aciklama'] = "Only available resources are used. ".$token_adi." cannot be mined!";
$dil['ico-on-satisi'] = "ICO Pre-Sale";
$dil['ico-on-satisi-aciklama'] = "With an unusual new generation ICO, you can earn by investing immediately... ";
$dil['yol-haritamiz'] = "ROAD MAP";
$dil['yol-haritamiz-ceyrek-1'] = "Q1";
$dil['yol-haritamiz-ceyrek-2'] = "Q2";
$dil['yol-haritamiz-ceyrek-3'] = "Q3";
$dil['yol-haritamiz-ceyrek-4'] = "Q4";
$dil['yol-haritamiz-fikir-gelistirildi'] = "Idea Developed";
$dil['yol-haritamiz-fikir-gelistirildi-aciklama'] = $token_adi." Idea Improved.";
$dil['yol-haritamiz-ekip-kuruldu'] = "Team established";
$dil['yol-haritamiz-ekip-kuruldu-aciklama'] = "The necessary team for ".$token_adi." has been created.";
$dil['yol-haritamiz-altyapi-kuruldu'] = "Infrastructure Established";
$dil['yol-haritamiz-altyapi-kuruldu-aciklama'] = "Website has been prepared. ".$token_adi." has been created. ICO Pre-sale will be held.";
$dil['yol-haritamiz-borsalarda-adim-adim'] = "Step by Step in Stock Exchanges";
$dil['yol-haritamiz-borsalarda-adim-adim-aciklama'] = "Starting trading of ".$token_adi." on DEX and CEX exchanges.";
$dil['yol-haritamiz-reklam-anlasmasi'] = "Advertising Agreement";
$dil['yol-haritamiz-reklam-anlasmasi-aciklama'] = "Advertising and Cooperation agreements.";
$dil['yol-haritamiz-sonraki-adimlar'] = "Next Steps";
$dil['yol-haritamiz-sonraki-adimlar-aciklama'] = "Realization of one of the set goals.";
$dil['token-yol-haritasi-alti-aciklama'] = "This chart shows our token economy, which our economists have adapted to its profitable progressive system.";
$dil['sozlesme-adresi'] = "Contract Address";
$dil['sembol'] = "Symbol";
$dil['sozlesme-adresi'] = "Sözleşme Adresi";
$dil['token_isim'] = "Token Name";
$dil['platform'] = "Platform";
$dil['toplam-token'] = "Total ".$token_adi."";
$dil['on-satis-token'] = "Total ".$token_adi." to be pre-sold";
$dil['on-satis'] = "Pre-Sale";
$dil['borsa-ve-isbirligi'] = "Stock Exchange and Cooperation";
$dil['kurucular-ve-ekip'] = "Founders and Team";
$dil['danismanlar'] = "Consultants";
$dil['odul'] = "Award";
$dil['sss-baslik'] = "FAQ";
$dil['sss-token-nedir'] = "What is ".$token_adi."?";
$dil['sss-token-nedir-aciklama'] = "".$token_adi." was created as a payment tool for cloud systems. There are a total of one hundred million (100,000,000) ".$token_adi.". ".$token_adi." cannot be mined. The abbreviation of ".$token_adi." is '".$birim."'. ".$token_adi." was created on the Bsc network. The aim of our project is to combine blockchain, the technology of the future, with currently used cloud systems. We believe that the ".$token_adi." issued to pay for storage will have great potential both now and for the future, and we aim to do so.";
$dil['sss-token-nasil-satin-alinir'] = "How to buy ".$token_adi."?";
$dil['sss-token-nasil-satin-alinir-aciklama'] = "".$token_adi." will only be sold on our website. Click on 'BUY ".$token_adi."' at the top of our website, register by entering your e-mail address. After signing up you will be ready to receive your first ".$token_adi." at our ICO.";
$dil['sss-token-alabilecegim-kac-tane-paket-var'] = "How many campaigns are there where I can purchase ".$token_adi."?";
$dil['sss-token-alabilecegim-kac-tane-paket-var-aciklama'] = $token_adi." ICO pre-sale will be sold in 3 campaigns. A minimum purchase of $100 can be made.";
$dil['sss-on-satis-ne-zaman-bitecek'] = "When will the ".$token_adi." ICO pre-sale end?";
$dil['sss-on-satis-ne-zaman-bitecek-aciklama'] = "The ".$token_adi." ICO pre-sale will end when 10,000,000 ".$birim." tokens are sold or signed with a major exchange.";
$dil['sss-token-bilinirligi'] = "Why is ".$token_adi." so little known?";
$dil['sss-token-bilinirligi-aciklama'] = "We are currently actively using our Twitter and Telegram account. In the future, we will start to serve with different platforms.";
$dil['sss-en-az-kac-adet-alinir'] = "How many ".$token_adi." can I purchase at least?";
$dil['sss-en-az-kac-adet-alinir-aciklama'] = "".$token_adi." purchases are made with at least $100.";
$dil['bizimle-iletisime-gecin-baslik'] = "CONTACT US";
$dil['big-isim-soyisim'] = "Name Surname";
$dil['big-place-isim'] = "Please enter your name and surname...";
$dil['big-e-posta'] = "Your Email Address";
$dil['big-e-posta-place'] = "Please enter your e-mail address...";
$dil['big-sorununuz'] = "Your problem";
$dil['big-sorun-place'] = "Please write your problem...";
$dil['big-eposta-adresi'] = "E-Mail Address";
$dil['big-gonder-butonu'] = "Send";




























?>
