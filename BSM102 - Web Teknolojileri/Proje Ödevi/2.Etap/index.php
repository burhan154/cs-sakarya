<?php
error_reporting(0);
session_start();
$HtmlForm = <<< BLOK
	<button onclick="document.getElementById('giris-sayfasi').style.display='block'">ÜYE GİRİŞİ</button>
		<div id="giris-sayfasi" class="sayfa">
			<form class="sayfa-icerik" method="POST" action="giris.php" id="login">
				<h1>Giriş Paneli</h1>
				<h4><div id="uyari">-----</div></h4>
				<input type="text" placeholder="Kullanıcı adı" name="username" id="username" onkeyup="kontrol();" required maxlength="30">
				<input type="password" placeholder="Parola" name="password" id="password" onkeyup="kontrol();" required maxlength="30">        
				<button type="button" onclick="gonder();" >Giriş Yapın</button>			
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
$YetkiliGiris= 'Merhaba ';
$Cikis= <<<BLOK
	<a href="cikis.php" class=buton-cikis>ÇIKIŞ</a>
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
	fclose($dosya);	
}


$Mesajlar= <<<BLOK
	<a href="mesajlar.php" class=buton-cikis>$sayi Mesaj</a>
BLOK;
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
				<table border=0 align="center" width=100% height=100% >
					<tr>
					<td width=1%></td>
					<td width=12% bgcolor=#34495e ><a href=# class=top-list>Ana Sayfa</td>
					<td width=12%><a href="ozgecmis.php" class=top-list>Özgeçmiş</a></td>
					<td width=12%><a href="sehrim.php" class=top-list>Şehrim</a></td>
					<td width=12%><a href="mirasimiz.php" class=top-list>Mirasımız</a></td>
					<td width=12%><a href="iletisim.php" class=top-list>İletişim</a></td>						
					<td>
					<?php
						error_reporting(0);
						session_start();
						if($_SESSION['username']){
							echo $Mesajlar;
						}				
					?>   	
					</td>
					<td width=27%><h4>
					<?php
						error_reporting(0);
						session_start();
						if($_SESSION['username']){
							$Yetkili= true;
							echo $YetkiliGiris.$_SESSION['username'].$Cikis;
						}
						else{
							echo $HtmlForm;
						}					
					?>   	
					</h4></td>
					</tr>
				</table>
			</div>
			<div id="orta">
				<div id="orta-baslik"><h1>Hakkımda</h1></div>
				<div id="orta-alan">
					<div id="resim-sol"><img src="./images/resim1.jpg" width="420" height="340"></div>
					<div id="yazi-sag"><h3>Yazı-1</h3></div>
					<div class="sifirla"></div>
					<div id="yazi-sol"><h3>Yazı-2</h3></div>
				<div id="resim-sag"><img src="./images/resim2.jpg" width="420"height="340"></div>
				</div>
			</div>
			<div id="alt"><div id="copyright"><h5>© 2020 Hüseyin Burhan Başaran</h5></div></div>
		</div>
	</body>
</html>





