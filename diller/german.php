
<?php 

$veriyi_alsinssspp = $db->prepare("SELECT * FROM token_ayarlari");
$veriyi_alsinssspp->execute();
$veriyi_ceksinssspp = $veriyi_alsinssspp->fetch(PDO::FETCH_ASSOC);

$token_adi = $veriyi_ceksinssspp['token_adi'];
$birim = $veriyi_ceksinssspp['token_birimi'];
$referans = $veriyi_ceksinssspp['referans_kazanci'];


$dil['token-nedir-header'] = "Was ist ".$token_adi."?";
$dil['faz-sistemi-header'] = "Phasensystem";
$dil['yol-haritasi-header'] = "Straßenkarte";
$dil['sss-header'] = "FAQ";
$dil['sozlesme-adresi'] = "Sözleşme Adresi";
$dil['giris-yap-butonu'] = "Anmeldung";
$dil['kayit-ol-butonu'] = "Registrieren";
$dil['slider-yazisi'] = "Schützen Sie Ihre Vergangenheit mit Ihrer Zukunft!";
$dil['title-yazisi'] = $token_adi." - Geçmişini Geleceğin İle Koru!";
$dil['navigasyon'] = "Navigasyon";
$dil['yol-haritamiz-yazi'] = "Yol Haritamız";
$dil['token-satin-al-butonlari'] = $token_adi." kaufen";
$dil['satis-durumu-yazisi'] = "Verkaufsstatus";
$dil['ilerleme-cubugu-satis-yazisi'] = "Der Umsatz";
$dil['simdiye-kadar-yapilan-toplam-token-satisi'] = "Bisher verkaufte Gesamtmenge :";
$dil['suanda-satista-olan-toplam-token'] = "Insgesamt derzeit im Angebot :";
$dil['suana-kadar-satilan-toplam-token-degeri'] = "Bisher verkaufter ".$birim." -Gesamtwert : ";
$dil['satista-olan-toplam-token-degeri'] = "".$birim."-Gesamtwert derzeit im Angebot : ";
$dil['token-nedir'] = "Was ist ein ".$token_adi."?";
$dil['token-nedir-aciklama'] = $token_adi." wurde als Zahlungstool für Cloud-Systeme erstellt. Es gibt insgesamt einhundert Millionen (100.000.000) ".$token_adi.". ".$token_adi." können nicht abgebaut werden. Die Abkürzung für ".$token_adi." ist '".$birim."'. ".$token_adi." Bsc ağında oluşturulmuştur. Ziel unseres Projekts ist es, Blockchain, die Technologie der Zukunft, mit aktuell eingesetzten Cloud-Systemen zu verbinden. Wir glauben, dass der zur Bezahlung der Speicherung ausgegebene ".$token_adi." sowohl jetzt als auch in Zukunft großes Potenzial haben wird und streben dies an.";
$dil['yeni-nesil-iko-on-satisi'] = "ICO VORVERKAUF DER NEUEN GENERATION";
$dil['yeni-nesil-iko-on-satisi-aciklama-1'] = "Mit einem ungewöhnlichen ICO der neuen Generation können Sie sofort verdienen, indem Sie investieren.";
$dil['referans-basina-bonus-kazan'] = "VERDIENEN SIE BONUS PRO REFERENZ!";
$dil['referans-basine-bonus-kazan-aciklama1'] = "Empfehle ".$token_adi." deinen Freunden. Verdienen Sie ".$referans."% Token für jeden Einkauf mit den Empfehlungen Ihrer Freunde.";
$dil['avantajlara-genel-bakis'] = "VORTEILE ÜBERSICHT";
$dil['avantajlara-genel-bakis-aciklama'] = "Personen, die ".$token_adi." besitzen, haben die folgenden Vorteile.";
$dil['kar'] = "Die Einnahme";
$dil['kar-aciklama'] = "Die Gewinnerwartung kann im Voraus berechnet werden...";
$dil['cuzdan-entegrasyonu'] = "Wallet-Integration";
$dil['cuzdan-entegrasyonu-aciklama'] = $token_adi." unterstützt viele häufig verwendete Wallets...";
$dil['sinir-yok'] = "Keine Begrenzung!";
$dil['sinir-yok-aciklama'] = "Immer und überall einsetzbar...";
$dil['cevre-dostu'] = "Umweltfreundlich";
$dil['cevre-dostu-aciklama'] = "Es werden nur verfügbare Ressourcen verwendet. ".$token_adi." können nicht abgebaut werden!";
$dil['ico-on-satisi'] = "ICO-Vorverkauf";
$dil['ico-on-satisi-aciklama'] = "Mit einem ungewöhnlichen ICO der neuen Generation können Sie durch sofortiges Investieren verdienen... ";
$dil['yol-haritamiz'] = "UNSERE STRASSENKARTE";
$dil['yol-haritamiz-ceyrek-1'] = "Q1";
$dil['yol-haritamiz-ceyrek-2'] = "Q2";
$dil['yol-haritamiz-ceyrek-3'] = "Q3";
$dil['yol-haritamiz-ceyrek-4'] = "Q4";
$dil['yol-haritamiz-fikir-gelistirildi'] = "Idee entwickelt";
$dil['yol-haritamiz-fikir-gelistirildi-aciklama'] = "Idee für ".$token_adi." entwickelt.";
$dil['yol-haritamiz-ekip-kuruldu'] = "Team gegründet";
$dil['yol-haritamiz-ekip-kuruldu-aciklama'] = "Das notwendige Team für ".$token_adi." wurde erstellt.";
$dil['yol-haritamiz-altyapi-kuruldu'] = "Infrastruktur aufgebaut";
$dil['yol-haritamiz-altyapi-kuruldu-aciklama'] = "Webseite wurde vorbereitet. ".$token_adi." wurde erstellt. Der ICO-Vorverkauf findet statt.";
$dil['yol-haritamiz-borsalarda-adim-adim'] = "Schritt für Schritt an Börsen";
$dil['yol-haritamiz-borsalarda-adim-adim-aciklama'] = "Beginn des Handels mit ".$token_adi." an den Börsen DEX und CEX.";
$dil['yol-haritamiz-reklam-anlasmasi'] = "Werbevereinbarung";
$dil['yol-haritamiz-reklam-anlasmasi-aciklama'] = "Werbe- und Kooperationsverträge.";
$dil['yol-haritamiz-sonraki-adimlar'] = "Nächste Schritte";
$dil['yol-haritamiz-sonraki-adimlar-aciklama'] = "Verwirklichung eines der gesetzten Ziele.";
$dil['token-yol-haritasi-alti-aciklama'] = "Diese Grafik zeigt unsere Token-Ökonomie, die unsere Ökonomen an ihr profitables progressives System angepasst haben.";
$dil['sozlesme-adresi'] = "Vertragsadresse";
$dil['sembol'] = "Symbol";
$dil['token_isim'] = "Name";
$dil['platform'] = "Platform";
$dil['toplam-token'] = "".$token_adi." insgesamt";
$dil['on-satis-token'] = "Gesamtzahl der ".$token_adi.", die vorverkauft werden sollen";
$dil['on-satis'] = "Vorverkauf";
$dil['borsa-ve-isbirligi'] = "Börse und Kooperation";
$dil['kurucular-ve-ekip'] = "Gründer und Team";
$dil['danismanlar'] = "Berater";
$dil['odul'] = "Preis";
$dil['sss-baslik'] = "FAQ";
$dil['sss-token-nedir'] = "Was ist ein ".$token_adi."?";
$dil['sss-token-nedir-aciklama'] = $token_adi." wurde als Zahlungstool für Cloud-Systeme erstellt. Es gibt insgesamt einhundert Millionen (100.000.000) ".$token_adi.". ".$token_adi." können nicht abgebaut werden. Die Abkürzung für ".$token_adi." ist '".$birim."'. ".$token_adi." Bsc ağında oluşturulmuştur. Ziel unseres Projekts ist es, Blockchain, die Technologie der Zukunft, mit aktuell eingesetzten Cloud-Systemen zu verbinden. Wir glauben, dass der zur Bezahlung der Speicherung ausgegebene ".$token_adi." sowohl jetzt als auch in Zukunft großes Potenzial haben wird und streben dies an.";
$dil['sss-token-nasil-satin-alinir'] = "Wie kaufe ich ".$token_adi."?";
$dil['sss-token-nasil-satin-alinir-aciklama'] = $token_adi." werden nur auf unserer Website verkauft. Klicken Sie oben auf unserer Website auf „ ".$token_adi." KAUFEN“ und registrieren Sie sich, indem Sie Ihre E-Mail-Adresse eingeben. Nach der Anmeldung sind Sie bereit, Ihre ersten ".$token_adi." bei unserem ICO zu erhalten.";
$dil['sss-token-alabilecegim-kac-tane-paket-var'] = "Wie viele Kampagnen gibt es, bei denen ich ".$token_adi." kaufen kann?";
$dil['sss-token-alabilecegim-kac-tane-paket-var-aciklama'] = "Der Vorverkauf von ".$token_adi." ICO wird in 3 Kampagnen verkauft. Ein Mindesteinkauf von $100 kann getätigt werden.";
$dil['sss-on-satis-ne-zaman-bitecek'] = "Wann endet der Vorverkauf des ".$token_adi." ICO?";
$dil['sss-on-satis-ne-zaman-bitecek-aciklama'] = "Der Vorverkauf von ".$token_adi." ICO endet, wenn 10.000.000 ".$birim."-Token verkauft oder bei einer großen Börse unterzeichnet wurden.";
$dil['sss-token-bilinirligi'] = "Warum ist ".$token_adi." so wenig bekannt?";
$dil['sss-token-bilinirligi-aciklama'] = "Wir nutzen derzeit aktiv unseren Twitter-Account. In Zukunft werden wir beginnen, mit verschiedenen Plattformen zu dienen.";
$dil['sss-en-az-kac-adet-alinir'] = "Wie viele ".$token_adi." kann ich mindestens kaufen?";
$dil['sss-en-az-kac-adet-alinir-aciklama'] = "".$token_adi." -Käufe werden mit mindestens 100 US-Dollar getätigt.";
$dil['bizimle-iletisime-gecin-baslik'] = "KONTAKTIERE UNS";
$dil['big-isim-soyisim'] = "Vorname Nachname";
$dil['big-place-isim'] = "Bitte geben Sie Ihren Vor- und Nachnamen ein";
$dil['big-e-posta'] = "Ihre E-Mail-Adresse";
$dil['big-e-posta-place'] = "Geben Sie bitte Ihre Email-Adresse ein";
$dil['big-sorununuz'] = "Ihr Problem";
$dil['big-sorun-place'] = "Bitte schreiben Sie Ihr Problem";
$dil['big-eposta-adresi'] = "E-Mail-Addresse";
$dil['big-gonder-butonu'] = "Senden";




























?>
