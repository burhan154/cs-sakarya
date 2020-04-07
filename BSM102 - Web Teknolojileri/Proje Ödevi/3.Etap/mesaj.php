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
				<table border=0 align="center" width=100% height=100% >
					<tr>
					<td width=1%></td>
					<td width=10%><a href="index.php" class=top-list>Ana Sayfa</td>
					<td width=10%><a href="ozgecmis.php" class=top-list>Özgeçmiş</a></td>
					<td width=10%><a href="sehrim.php"class=top-list>Şehrim</a></td>
					<td width=10%><a href="mirasimiz.php" class=top-list>Mirasımız</a></td>	
					<td width=10% bgcolor=#34495e><a href=# class=top-list>İletişim</a></td>	
					<td></td>
					<td width=10%></td>
					<td width=20%><h4>
					    <?php
						error_reporting(0);
						session_start();
						if($_SESSION['username']){
							echo 'Merhaba '.$_SESSION['username'].' ';
						}
						?>      
					</h4></td>
					<td width=10%>
					    <?php
						error_reporting(0);
						session_start();
						if($_SESSION['username']){
							echo '<a href="cikis.php" class=top-list>ÇIKIŞ</a';
						}
						?>      
					</td>
					</tr>
				</table>
			</div>
			<div id="orta">
				<div id="orta-baslik"><h1>İletişim</h1></div>
				<div id="orta-alan"><h4>
					<?php
					error_reporting(0);
					if($_POST['eposta']){
						$ad = $_POST['ad'];
						$soyad= $_POST['soyad'];
						$eposta=$_POST['eposta'];
						$mesaj=$_POST['mesaj'];
						echo "<div id='mesajkutusu' style='text-align:center;'>$ad"." "."$soyad"." Mesajınız başarıyla gönderildi.</div><br/>";
						echo "<div id='mesajkutusu'>$mesaj</div><br/>";
						$dosya = fopen ("mesajlar.txt" , 'a'); 
						$yaz= $ad.' '.$soyad.' - '.$eposta.' - '.$mesaj; 
						fwrite ( $dosya , $yaz."\n" ) ;
						fclose ($dosya);
						header("Refresh:2; url=index.php");
					}
					else{
						header('Location: index.php');
					}
					?></h4>
				</div>
			</div>
			<div id="alt"><div id="copyright"><h5>© 2020 Hüseyin Burhan Başaran</h5></div></div>
		</div>
	</body>
</html>





