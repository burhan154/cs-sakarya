<?php
error_reporting(0);
session_start();
$Yetkili= false;
if($_SESSION['username']){
	$Yetkili= true;
}
if($Yetkili == 1){
	$sayi =0;
	$dosya = fopen("mesajlar.txt",'r');
	while(!feof($dosya)){ 
		$sayi++;
		$satir = fgets($dosya);
	}
	$sayi--;
	if($sayi>99){
		$sayi="99+";
	}
	fclose($dosya);	
}
$Mesajlar= <<<BLOK
	<td width=10%><a href="mesajlar.php" class=menu >$sayi Mesaj</a></td>
BLOK;
?>
<!DOCTYPE html>
<html>
    <head>
		<head><title>Burhan Başaran Kişisel Web Sitesi</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
		<link rel="icon" href="./images/logo.ico" type="image/x-icon">
	</head>
    <body>
		<div id="sayfa">
			<div id="ust">
				<table border=0 align="center" width=100% height=100% class="menu">
					<tr>
					<th width=14%><img src="./images/logom.png" width=78%></th>
					<td width=10%><a href="index.php" class=menu>Ana Sayfa</td>
					<td width=10%><a href="ozgecmis.php" class=menu>Özgeçmiş</a></td>
					<td width=10%><a href="sehrim.php" class=menu>Şehrim</a></td>
					<td width=10% bgcolor=#4CAF50><a href=# class=secili>Mirasımız</a></td>
					<td width=10%><a href="iletisim.php" class=menu>İletişim</a></td>						
					<th></th>
					<?php
						error_reporting(0);
						session_start();
						if($_SESSION['username']){
							echo $Mesajlar;
						}				
					?>				
					<th width=14%><h4 style="color:#fff;">
					<?php
						error_reporting(0);
						session_start();
						if($_SESSION['username']){
							$Yetkili= true;
							echo 'Merhaba '.$_SESSION['username'];
						}				
					?></h4></th>
					<?php
						error_reporting(0);
						session_start();
						if($_SESSION['username']){
							echo '<td width=10%><a href="cikis.php" class=menu>ÇIKIŞ</a></td>';
						}
						else{
							echo '<td width=10%><a href="giris.php" class=menu>GİRİŞ YAP</a></td>';
						}						
					?>
					</tr>
				</table>
			</div>
			<div id="orta">
				<div id="orta-baslik"><h1>Mirasımız</h1></div>
				<div id="orta-alan" style="height:880px;">
				<div id="sehrim-panel" style="margin-top:0;padding-top:0;"><h2 style="color:#4CAF50;font-size:36px;">Ankaragücü</h2><br>
					<h3>Kuruluş</h3><br>
					<h5>Osmanlı İmparatorluğu döneminde İstanbul çapında maçların yapıldığı İstanbul Ligi sürmekteyken savunma sanayisinde 
					çalışan işçi futbolcular ile buralara işçi yetiştiren meslek okullarında okuyan gençler kendi kulüplerini kurmak için 
					girişimlerde bulunurlar. İmalat-ı Harbiye Mektebinin son sınıf öğrencilerinden Şükrü Abbas öncülüğündeki Turan Sanatkarangücü
					ile Agâh Orhan öncülüğündeki Altınörs İdmanyurdu aynı tarihte, 31 Ağustos 1910 günü kurulmuştur. İki kulüplü bir birleşmeyle
					kurulduğu için kulübün kurucu iki başkanı vardır. Bu başkanlar Kazım Bey ve Hasan Muslihiddin Bey’dir. Daha sonra birleşecek
					olan iki takım ilk maçlarını birbirlerine karşı yaparlar. 4 Nisan 1911 günü yapılan maç 0-0 berabere devam eden maç çıkan 
					olaylar nedeniyle tamamlanamamıştır. Bu dönemde sendikal faaliyette bulunarak işçi haklarını savunan çevrelerle kulüpler 
					yakın temas halindedir.</h5>
					<br><h3>İşgal yılları, Ankara ve Kurtuluş Savaşı</h3><br>
					<h5>Altınörs İdmanyurdu ve Turan Sanatkarangücü, kuruluşuna öncülük ettikleri Cuma Ligi’nde kesintili de olsa oynadıktan
					sonra I. Dünya Savaşı’nın sona ermesiyle oluşan yenilgi koşullarında spora ara vermek durumunda kalırlar. Kulüplerin 
					tarihinde İstanbul’daki işgalcilerle yapılan maçlara dair bir kayıt bulunmaması, işgalcilerle maç yapılmasının reddedilmesiyle 
					açıklanır. Kulüplerin etkin olduğu silah fabrikalarının yabancı askerler tarafından basılması ve Kuva-yi Milliye hareketine 
					desteğin engellenmesi üzerinde kulüpler Anadolu’ya geçme kararı alır. Türk Kurtuluş Savaşı sırasında çok zor koşullarda orduya
					silah ve cephane sağlayan İmalat-ı Harbiye işçilerinin bazıları savaş sırasında hayatını da kaybedecektir.</h5>
					<br><h3>Yeni kurulan Cumhuriyet ve başkentte Ankaragücü</h3><br>
					<h5>Kazanılan bağımsızlığın ardından ilan edilen cumhuriyetin başkenti yeniden kurulurken, Ankaragücü’nün de temelleri atılır.
					1920 yılından itibaren Ankara’da bulunan iki klüp 1922 yılından itibaren yeniden faaliyete geçer. Başkent Ankara’da ilk resmî
					futbol maçı 26 Ekim 1922 günü bugünkü Cebeci İnönü Stadyumu’nun bulunduğu yerde yapılan maçta Anadolu Sanatkarangücü askeri 
					takım olan Talimgâhgücü’nü 2-1 yener. Başkentin gelişmesi ve özellikle işçilerin artmasıyla birlikte sonradan Ankaragücü adını
					alacak kulübe destek artar. Fabrikalar çerçevesinde dayanışma sandıklarıyla, işçi örgütleriyle birlikte gelişen kulüp sosyal
					alanda da faaliyet gösterecek, o dönemde ilgi çeken bir bando takımı kuracaktır. Ankara’da kurulan ilk futbol ligi 1923-24 
					sezonuyla açılırken iki kulüp Anadolu-Turan Sanatkarangücü olarak birlikte katılır. Bu dönemden sonra çeşitli farklı isimler 
					altında mücadele edilecektir. 1933 yılında bugünkü adı olan Ankaragücü adını alacak olan mahalli Ankara Liginde çok kez şampiyon
					olacaktır. Profesyonel milli ligin kurulmasıyla bugüne dek gelen macerasına devam edecektir.</h5>
					<br><h3>Arma</h3><br>
					<h5>İmalat-ı Harbiye çalışanları tarafından desteklenen ve çalışanların bizzat oynadıkları Ankaragücü arması da kuruluşu ile 
					örtüşen bir semboldür. İmalat-ı Harbiye yani günümüz anlamıyla savaş malzemesi üretimi yapan devlet menşeili kuruluşun adıyla
					paralel olarak yatık bir mermiden esinlenerek çizilen logo asaleti ve vatanı müdafaayı simgelemektedir.Ayrıca şehit veren iki
					takımdan birisi olan Ankaragücü, “Milli Mücadele” yıllarında ülkeye yaptığı hizmetlerle ön plana çıkmıştır.</h5>
					</div>
				<table border=1 align="center" width=100% height=100% id="bilgi" style="float:right;width:30%;margin:0;">
					<tr><th colspan=2 style="padding-top:5px;padding-bottom:5px;"><h2>MKE Ankaragücü</h2></th></tr>	
					<tr><td colspan=2><img src="./images/ankaragucu-2.png" width=100%></td></tr>
					<tr><td><h4>Tam ad</h4></td><td>Makina Kimya Endüstrisi Ankaragücü Profesyonel Futbol Takımı</td></tr>
					<tr><td><h4>Takma ad</h4></td><td>Kupa beyi</td></tr>
					<tr><td><h4>Kısa ad</h4></td><td>AG, A.GÜCÜ</td></tr>
					<tr><td><h4>Renkler</h4></td><td>Sarı - Lacivert</td></tr>
					<tr><td><h4>Kuruluş</h4></td><td>31 Ağustos 1910</td></tr>
					<tr><td><h4>Stadyum</h4></td><td>Eryaman Stadyumu</td></tr>
					<tr><td><h4>Başkan</td><td>Fatih Mert</td></tr>
					<tr><td><h4>Teknik direktör</h4></td><td>Mustafa Reşit Akçay</td></tr>
					<tr><th colspan=2 style="padding-top:5px;padding-bottom:5px;"><h2>Başarıları</h2></th></tr>
					<tr><td rowspan=2><h4>Türkiye Futbol Şampiyonası</h4></td><td>Şampiyonluk (1): 1949</td></tr><tr><td>Üçüncülük (1): 1924</td></tr>
					<tr><td rowspan=2><h4>Türkiye Kupası</h4></td><td>Şampiyonluk (2): 1971, 1980</td></tr><tr><td>İkincilik (3): 1972, 1981, 1990</td></tr>
					<tr><td><h4>Türkiye Süper Kupası</h4></td><td>Şampiyonluk (1): 1981</td></tr>
					
				</table>	
				</div>
			</div>
			<div id="alt"><div id="copyright"><h5>© 2020 Copyright Hüseyin Burhan Başaran</h5></div></div>
		</div>
	</body>
</html>





