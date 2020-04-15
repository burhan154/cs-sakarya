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
					<td width=10% bgcolor=#4CAF50><a href=# class=secili>İletişim</a></td>	
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
				<div id="orta-alan"><h4>
					<?php
					error_reporting(0);
					if($_POST['eposta']){
						$ad = $_POST['ad'];
						$soyad= $_POST['soyad'];
						$eposta=$_POST['eposta'];
						$mesaj=$_POST['mesaj'];
						$cinsiyet=$_POST['cinsiyet'];
						echo "<div id='mesajkutusu' style='text-align:center;'>$ad"." "."$soyad"." Mesajınız başarıyla gönderildi.</div><br/>";
						echo "<div id='mesajkutusu'>$mesaj</div><br/>";
						$dosya = fopen ("mesajlar.txt" , 'a'); 
						$yaz= $ad.' '.$soyad.' - '.$cinsiyet.' - '.$eposta.' - '.$mesaj; 
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





