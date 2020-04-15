<!DOCTYPE html>
<html>
    <head>
		<head><title>Burhan Başaran Kişisel Web Sitesi</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
	</head>
    <body>
		<div id="sayfa" style="height:500px;">
			<div id="ust">
				<table border=0 align="center" width=100% height=100% class="menu">
					<tr>
					<th width=14%></th>
					<td width=12% bgcolor=#4CAF50 ><a href=# class=secili>Giriş Sayfası</td>
					<th width=38%></th>
					<th></th>
					<th width=10%></th>				
					<th width=30%><h4>
						<?php
						error_reporting(0);
						session_start();
						if($_SESSION['username']){	
							echo 'Merhaba '.$_SESSION['username'].' ';
							header("Refresh:2; url=index.php");
						}
						else{
							$username = $_POST['username'];
							$password= $_POST['password'];
							if($username =='g191210077@sakarya.edu.tr' && $password=='123'){
								$kullaniciadi = explode('@',$username);
								echo "Hoşgeldin ".$kullaniciadi[0];
								$_SESSION['username'] = $kullaniciadi[0];
								header('Location: index.php');
							}else{
								echo 'Kullancı adı veya şifre hatalı';
								unset($_SESSION["username"]);
								unset($_SESSION["password"]);
								header("Refresh:2; url=index.php");
							}
						}
						?>
					</h4>
					</td>
					</tr>
				</table>
			</div>
			<div id="orta" style="height:340px;">
				<div id="orta-baslik">
				   <h1>Ana Sayfaya Yönlendiriliyorsunuz.</h1>
				</div>
			</div>
			<div id="alt"><div id="copyright"><h5>© 2020 Hüseyin Burhan Başaran</h5></div></div>
		</div>
	</body>
</html>