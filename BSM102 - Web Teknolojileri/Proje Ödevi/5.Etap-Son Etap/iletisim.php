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
		<script src="js/mesaj.js"></script>
	</head>
    <body>
		<div id="sayfa">
			<div id="ust">
				<table border=0 align="center" width=100% height=100% class="menu">
					<tr>
					<th width=14%><img src="./images/logom.png" width=78%></th>
					<td width=10%><a href="index.php" class=menu>Ana Sayfa</td>
					<td width=10%><a href="ozgecmis.php" class=menu>Özgeçmiş</a></td>
					<td width=10%><a href="sehrim.php"class=menu>Şehrim</a></td>
					<td width=10%><a href="mirasimiz.php" class=menu>Mirasımız</a></td>	
					<td width=10% bgcolor=#4CAF50><a href=#  class=secili>İletişim</a></td>	
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
				<div id="orta-baslik"><h1>İletişim</h1></div>
				<div id="orta-alan">
					<form class="mesaj-kutusu" style="padding-top:20px;padding-bottom:20px;" method="POST" action="mesaj.php" id="mesaj-gonder">
						<h4><div align="center" class="uyari" id="uyari"></div></h4>
						<input type="text" placeholder="Ad" name="ad" id="ad" onkeyup="return kontrol();" required maxlength="30">
						<input type="text" placeholder="Soyad" name="soyad" id="soyad" onkeyup="return kontrol();" required maxlength="30">
						<input type="text" placeholder="E-Posta" name="eposta" id="eposta" onkeyup="return kontrol();" required maxlength="30"> 						
						<textarea placeholder="Mesajınız" name="mesaj" id="mesaj" onkeyup="return kontrol();" required maxlength="250"></textarea>
						<div id="secim"><h4><input type="radio" name="cinsiyet" value="erkek" onclick="kontrol();">ERKEK<input type="radio" name="cinsiyet" value="kadin" onclick="kontrol();">KADIN
						<select id="sehir" name="sehir" onclick="kontrol();" required>
						<option value="0">-Şehriniz-</option>
						<option value="İstanbul">İstanbul</option>
						<option value="Ankara">Ankara</option>
						<option value="İzmir">İzmir</option>
						<option value="Adana">Adana</option>
						<option value="Adıyaman">Adıyaman</option>
						<option value="Afyonkarahisar">Afyonkarahisar</option>
						<option value="Ağrı">Ağrı</option>
						<option value="Aksaray">Aksaray</option>
						<option value="Amasya">Amasya</option>
						<option value="Antalya">Antalya</option>
						<option value="Ardahan">Ardahan</option>
						<option value="Artvin">Artvin</option>
						<option value="Aydın">Aydın</option>
						<option value="Balıkesir">Balıkesir</option>
						<option value="Bartın">Bartın</option>
						<option value="Batman">Batman</option>
						<option value="Bayburt">Bayburt</option>
						<option value="Bilecik">Bilecik</option>
						<option value="Bingöl">Bingöl</option>
						<option value="Bitlis">Bitlis</option>
						<option value="Bolu">Bolu</option>
						<option value="Burdur">Burdur</option>
						<option value="Bursa">Bursa</option>
						<option value="Çanakkale">Çanakkale</option>
						<option value="Çankırı">Çankırı</option>
						<option value="Çorum">Çorum</option>
						<option value="Denizli">Denizli</option>
						<option value="Diyarbakır">Diyarbakır</option>
						<option value="Düzce">Düzce</option>
						<option value="Edirne">Edirne</option>
						<option value="Elazığ">Elazığ</option>
						<option value="Erzincan">Erzincan</option>
						<option value="Erzurum">Erzurum</option>
						<option value="Eskişehir">Eskişehir</option>
						<option value="Gaziantep">Gaziantep</option>
						<option value="Giresun">Giresun</option>
						<option value="Gümüşhane">Gümüşhane</option>
						<option value="Hakkâri">Hakkâri</option>
						<option value="Hatay">Hatay</option>
						<option value="Iğdır">Iğdır</option>
						<option value="Isparta">Isparta</option>
						<option value="Kahramanmaraş">Kahramanmaraş</option>
						<option value="Karabük">Karabük</option>
						<option value="Karaman">Karaman</option>
						<option value="Kars">Kars</option>
						<option value="Kastamonu">Kastamonu</option>
						<option value="Kayseri">Kayseri</option>
						<option value="Kırıkkale">Kırıkkale</option>
						<option value="Kırklareli">Kırklareli</option>
						<option value="Kırşehir">Kırşehir</option>
						<option value="Kilis">Kilis</option>
						<option value="Kocaeli">Kocaeli</option>
						<option value="Konya">Konya</option>
						<option value="Kütahya">Kütahya</option>
						<option value="Malatya">Malatya</option>
						<option value="Manisa">Manisa</option>
						<option value="Mardin">Mardin</option>
						<option value="Mersin">Mersin</option>
						<option value="Muğla">Muğla</option>
						<option value="Muş">Muş</option>
						<option value="Nevşehir">Nevşehir</option>
						<option value="Niğde">Niğde</option>
						<option value="Ordu">Ordu</option>
						<option value="Osmaniye">Osmaniye</option>
						<option value="Rize">Rize</option>
						<option value="Sakarya">Sakarya</option>
						<option value="Samsun">Samsun</option>
						<option value="Siirt">Siirt</option>
						<option value="Sinop">Sinop</option>
						<option value="Sivas">Sivas</option>
						<option value="Şırnak">Şırnak</option>
						<option value="Tekirdağ">Tekirdağ</option>
						<option value="Tokat">Tokat</option>
						<option value="Trabzon">Trabzon</option>
						<option value="Tunceli">Tunceli</option>
						<option value="Şanlıurfa">Şanlıurfa</option>
						<option value="Uşak">Uşak</option>
						<option value="Van">Van</option>
						<option value="Yalova">Yalova</option>
						<option value="Yozgat">Yozgat</option>
						<option value="Zonguldak">Zonguldak</option>
						<option value="Diğer">Diğer</option></select></h4></div>
						<div id="secim"><h4><input type="checkbox" value="kabul" id="kabul" onclick="kontrol();" required>Onaylıyorum</h4></div>
						<div id="secim"><button type="button" onclick="gonder();" >Gönder</button>
						<button type="button" class="button-kirmizi" onclick="temizle();" >Temizle</button></div>				
					</form>
				</div>
			</div>
			<div id="alt"><div id="copyright"><h5>© 2020 Copyright Hüseyin Burhan Başaran</h5></div></div>
		</div>
	</body>
</html>





