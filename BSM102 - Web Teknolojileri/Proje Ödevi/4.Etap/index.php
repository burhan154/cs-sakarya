<?php
error_reporting(0);
session_start();
$HtmlForm = <<< BLOK
	<a class=menu onclick="document.getElementById('giris-sayfasi').style.display='block'">GİRİŞ YAP</a>
		<div id="giris-sayfasi" class="sayfa">
			<form class="sayfa-icerik" method="POST" action="giris.php" id="login">
				<h1>Giriş Paneli</h1>
				<h4><div style="width: 80%;margin: 8px 10%;" id="uyari"></div></h4>
				<input style="width: 80%;" type="text" placeholder="E-posta" name="username" id="username" onkeyup="kontrol();" required maxlength="30">
				<input style="width: 80%;" type="password" placeholder="Parola" name="password" id="password" onkeyup="kontrol();" required maxlength="30">        
				<button type="button" onclick="gonder();">Giriş Yapın</button>			
			</form>
		</div>
		<script>
			var sayfa = document.getElementById('giris-sayfasi');
			window.onclick = function(event) {
				if (event.target == sayfa) {
					sayfa.style.display = "none";
				}
			}
		</script>
BLOK;
$Cikis= <<<BLOK
	<a href="cikis.php" class=menu>ÇIKIŞ</a>
BLOK;
$Giris= <<<BLOK
	<a href="iletisim.php" class=top-list>Üye Girişi</a>
BLOK;
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
$YetkiliGiris= 'Merhaba '.$_SESSION['username'];
$Yetkili= false;
?>
<!DOCTYPE html>
<html>
    <head>
		<head><title>Burhan Başaran Kişisel Web Sitesi</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="js/giris.js"></script>
	</head>
    <body>
		<div id="sayfa">
			<div id="ust">
				<table border=0 align="center" width=100% height=100% class="menu">
					<tr>
					<th width=14%></th>
					<td width=10% bgcolor=#4CAF50><a href=# class="secili">Ana Sayfa</a></td>
					<td width=10%><a href="ozgecmis.php" class=menu>Özgeçmiş</a></td>
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
					<th width=14%><h4>
					<?php
						error_reporting(0);
						session_start();
						if($_SESSION['username']){
							$Yetkili= true;
							echo $YetkiliGiris;
						}				
					?></h4></th>
					<td width=10%>
					<?php
						error_reporting(0);
						session_start();
						if($_SESSION['username']){
							echo $Cikis;
						}
						else{
							echo $HtmlForm;
						}						
					?>
					</td>
					</tr>
				</table>
			</div>
			<div id="orta">
				<div id="orta-baslik"><h1>Hakkımda</h1></div>
				<div id="orta-alan">
					<div id="yazi-sol"><h2 style="color:#4CAF50;font-size:36px;">MERHABA<br>BEN HÜSEYİN BURHAN BAŞARAN</h2><br><br><br> 
					<h4>2000 senesinin Temmuz ayında Ankara'da dünyaya geldim.<br><br>
					
					10 yaşımda büyüyünce olmaya karar verdiğim meslek olan Bilgisayar Mühendisliği bölümünü şuan Sakarya Üniversitesi'nde okumaktayım.</h4>
					
					</div>
					<div id="resim-sol"><img src="./images/resim-hakkımda.png" width=100%;></div>
					<div id="yazi-sol" style="width:50%;height:200px;"> 
					<h4>YAZI2<br>
					</h4>
					
					</div>
					<div id="yazi-sag">
					<table border=1 align="center" width=100% height=100% id="bilgilerim">
						<tr><th colspan="2"><h2>KİŞİSEL BİLGİLERİM</h2></th></tr>
						<tr><td><h4>Ad</h4></td><td><h4>Hüseyin Burhan Başaran</h4></td></tr>
						<tr><td><h4>Yaş</h4></td><td><h4>20</h4></td></tr>
						<tr><td><h4>Boyu</h4></td><td><h4>175</h4></td></tr>
						<tr><td><h4>Kilo</h4></td><td><h4>80</h4></td></tr>
						<tr><td><h4>E-Mail</h4></td><td><h4>burhan.basaran@ogr.sakarya.edu.tr</h4></td></tr>
						
					</table>
					</div>
					
				</div>
				<div class="sifirla"></div>
			</div>
			<div id="alt"><div id="copyright"><h5>© 2020 Hüseyin Burhan Başaran</h5></div></div>
		</div>
	</body>
</html>





