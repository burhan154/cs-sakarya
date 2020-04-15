<!DOCTYPE html>
<html>
    <head>
		<head><title>Burhan Başaran Kişisel Web Sitesi</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/mesaj.js"></script>
	</head>
    <body>
		<div id="sayfa">
			<div id="ust">
				<table border=0 align="center" width=100% height=100% class="menu">
					<tr>
					<th width=14%></th>
					<td width=10%><a href="index.php" class=menu>Ana Sayfa</td>
					<td width=10%><a href="ozgecmis.php" class=menu>Özgeçmiş</a></td>
					<td width=10%><a href="sehrim.php"class=menu>Şehrim</a></td>
					<td width=10%><a href="mirasimiz.php" class=menu>Mirasımız</a></td>	
					<td width=10% bgcolor=#4CAF50><a href=#  class=secili>İletişim</a></td>	
					<th></th>
					<th width=10%></th>
					<th width=14%><h4>
					    <?php
						error_reporting(0);
						session_start();
						if($_SESSION['username']){
							echo 'Merhaba '.$_SESSION['username'].' ';
						}
						?>      
					</h4></th>
					
					    <?php
						error_reporting(0);
						session_start();
						if($_SESSION['username']){
							echo '<td width=10%><a href="cikis.php" class=menu>ÇIKIŞ</a></td>';
						}
						?>      
					
					</tr>
				</table>
			</div>
			<div id="orta">
				<div id="orta-baslik"><h1>İletişim</h1></div>
				<div id="orta-alan">
					<form class="mesaj-kutusu" method="POST" action="mesaj.php" id="mesaj-gonder">
						<h3><div class="uyari" id="uyari" onkeyup="return kontroluyari();"></div></h3>
						<input type="text" placeholder="Ad" name="ad" id="ad" onkeyup="return kontrol();" required maxlength="30">
						<input type="text" placeholder="Soyad" name="soyad" id="soyad" onkeyup="return kontrol();" required maxlength="30">
						<input type="text" placeholder="E-Posta" name="eposta" id="eposta" onkeyup="return kontrol();" required maxlength="30"> 						
						<textarea placeholder="Mesajınız" name="mesaj" id="mesaj" onkeyup="return kontrol();" required maxlength="250"></textarea>
						<div id="secim"><h4><input type="radio" name="cinsiyet" value="erkek" >ERKEK<input type="radio" name="cinsiyet" value="kadin">KADIN
						<select>
						<option>Istanbul</option>
						<option>Ankara</option>
						<option>Sakarya</option></select></h4></div>
						<button type="button" onclick="gonder();" style="margin: 8px 10px 8px 26px;" >Gönder</button>
						<button type="button" onclick="temizle();" style="margin: 8px 10px 8px 26px;" >Temizle</button>						
					</form>
				</div>
			</div>
			<div id="alt"><div id="copyright"><h5>© 2020 Hüseyin Burhan Başaran</h5></div></div>
		</div>
	</body>
</html>





