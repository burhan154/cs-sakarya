<!DOCTYPE html>
<html>
    <head>
		<head><title>Burhan Başaran Kişisel Web Sitesi</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
		<link rel="icon" href="./images/logo.ico" type="image/x-icon">
		<script src="js/giris.js"></script>
	</head>
    <body>
		<div id="sayfa">
			<div id="ust">
				<table border=0 align="center" width=100% height=100% class="menu">
					<tr>
					<th width=14%><img src="./images/logom.png" width=78%></th>
					<td width=10%><a href="index.php" class=menu>Ana Sayfa</a></td>
					<td width=10%><a href="ozgecmis.php" class=menu>Özgeçmiş</a></td>
					<td width=10%><a href="sehrim.php" class=menu>Şehrim</a></td>
					<td width=10%><a href="mirasimiz.php" class=menu>Mirasımız</a></td>
					<td width=10%><a href="iletisim.php" class=menu>İletişim</a></td>						
					<th></th>
					<th width=10%></th>				
					<td width=10% bgcolor=#4CAF50><a href=# class="secili">GİRİŞ YAP</a></td>
					</td>
					</tr>
				</table>
			</div>
			<div id="orta" style="height:600px;">
				<div id="orta-baslik">
				   <h1>Giriş Paneli</h1>
				   <?php
						error_reporting(0);
						session_start();
						if($_POST){
							$username = $_POST['username'];
							$password= $_POST['password'];
							if($username =='g191210077@sakarya.edu.tr' && $password=='123'){
								$kullaniciadi = explode('@',$username);
								$_SESSION['username'] = $kullaniciadi[0];
								header('Location: index.php');
							}
							else{
								$style='style="background: #c0392b;"';
								$hata= 'E-posta veya şifre hatalı tekrar deneyiniz.';
								unset($_SESSION["username"]);
								unset($_SESSION["password"]);
							}
						}
						if($_SESSION['username']){	
							header('Location: index.php');
						}
					?>
				   <div id="orta-alan">
					<form class="mesaj-kutusu" style="width:40%;margin-top:20px;" method="POST" action="giris.php" id="login" align="center">
					<img src="./images/logo.png" height=180px;></td>
					<h5><div id="uyari" <?php error_reporting(0); if($_POST){ echo $style;} ?>>
					<?php
						echo $hata;
					?>
					</div><div id="bilgi-kutusu">Demo: g191210077@sakarya.edu.tr : 123</div></h5>
					<input type="text" placeholder="E-posta" name="username" id="username" onkeyup="kontrol();" required maxlength="30">
					<input type="password" placeholder="Parola" name="password" id="password" onkeyup="kontrol();" required maxlength="30">        
					<button type="button" onclick="gonder();" style="margin: 8px auto 14px auto;">Giriş Yapın</button>			
					</form>	
					</div>
				</div>
			</div>
			<div id="alt"><div id="copyright"><h5>© 2020 Copyright Hüseyin Burhan Başaran</h5></div></div>
		</div>
	</body>
</html>