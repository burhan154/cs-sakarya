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
					<td width=10% bgcolor=#4CAF50><a href=# class=secili>Özgeçmiş</a></td>
					<td width=10%><a href="sehrim.php" class=menu>Şehrim</a></td>
					<td width=10%><a href="mirasimiz.php" class=menu>Mirasımız</a></td>	
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
			<div id="orta" style="height:1220px;">
				<div id="orta-baslik"><h1>Özgeçmiş</h1></div>
				<div id="orta-alan" style="background-color:#ecf0f1;width:80%;margin:20px auto 20px auto;">
					<table border=1 align="center" width=100% height=100% id="bilgi">
						<tr><th colspan="3"><h2>KİŞİSEL BİLGİLERİM</h2></th></tr>
						<tr><td><h4>Ad-Soyad</h4></td><td><h4>Hüseyin Burhan Başaran</h4></td><td rowspan="5" width=30px;><img src="./images/cv.jpg" height=100%;></td></tr>
						<tr><td><h4>Cinsiyet</h4></td><td><h4>Erkek</h4></td></tr>
						<tr><td><h4>Doğum tarihi</h4></td><td><h4>01/07/2000</h4></td></tr>
						<tr><td><h4>Medeni durum</h4></td><td><h4>Bekar</h4></td></tr>
						<tr><td><h4>Uyruk</h4></td><td><h4>Türkiye Cumhuriyeti</h4></td></tr>
						<tr><td><h4>Sürücü Belgesi</h4></td><td colspan="2"><h4>B1</h4></td></tr>
						<tr><td><h4>Askerlik Durumu</h4></td><td colspan="2"><h4>Tamamlamadı</h4></td></tr>
						<tr><td><h4>Telefon </h4></td><td colspan="2"><h4>05555555555</h4></td></tr>
						<tr><td><h4>Adres</h4></td><td colspan="2"><h4>Pursaklar/Ankara</h4></td></tr>
						<tr><td><h4>E-Mail</h4></td><td colspan="2"><h4>burhan.basaran@ogr.sakarya.edu.tr</h4></td></tr>
						<tr><th colspan="3"><h2>EĞİTİM BİLGİLERİM</h2></th></tr>
						<tr><td><h4>2006-2010</h4></td><td colspan="2"><h4>Barmek İlköğretim Okulu</h4></td></tr>
						<tr><td><h4>2010-2014</h4></td><td colspan="2"><h4>Karacaören Orta Okulu</h4></td></tr>
						<tr><td><h4>2014-2018</h4></td><td colspan="2"><h4>Ayyıldız Anadolu Lisesi</h4></td></tr>
						<tr><td><h4>2019-</h4></td><td colspan="2"><h4>Sakarya Üniversitesi Bilgisayar Mühendisliği</h4></td></tr>
						<tr><th colspan="3"><h2>BİLGİSAYAR BİLGİSİ</h2></th></tr>
						<tr><td><h4>C++</h4></td><td colspan="2"><h4>Orta</h4></td></tr>
						<tr><td><h4>C#</h4></td><td colspan="2"><h4>Orta</h4></td></tr>
						<tr><td><h4>Php</h4></td><td colspan="2"><h4>Başlangıç</h4></td></tr>
						<tr><td><h4>JavaScript</h4></td><td colspan="2"><h4>Başlangıç</h4></td></tr>
						<tr><td><h4>CSS-HTML</h4></td><td colspan="2"><h4>Orta</h4></td></tr>
						<tr><td colspan="3"><h4>Word, Photoshop</h4></td></tr>
						<tr><th colspan="3"><h2>YABANCI DİLLER</h2></th></tr>
						<tr><td><h4>İngilizce</h4></td><td colspan="2"><h4>B1</h4></td></tr>
						<tr><th colspan="3"><h2>SOSYAL AKTİVİTELER</h2></th></tr>
						<tr><td colspan="3"><h4>Futbol, Badminton</h4></td></tr>
					</table>
				</div>
			</div>
			<div id="alt"><div id="copyright"><h5>© 2020 Copyright Hüseyin Burhan Başaran</h5></div></div>
		</div>
	</body>
</html>





