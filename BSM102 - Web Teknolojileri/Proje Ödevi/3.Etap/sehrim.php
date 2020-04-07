<!DOCTYPE html>
<html>
    <head>
		<head><title>Burhan Başaran Kişisel Web Sitesi</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/slider.css">
		<script src="js/slider.js"></script>
	</head>
    <body>
		<div id="sayfa">
			<div id="ust">
				<table border=0 align="center" width=100% height=100% >
					<tr>
					<td width=1%></td>
					<td width=10%><a href="index.php" class=top-list>Ana Sayfa</td>
					<td width=10%><a href="ozgecmis.php" class=top-list>Özgeçmiş</a></td>
					<td width=10% bgcolor=#373c40><a href=# class=top-list>Şehrim</a></td>
					<td width=10%><a href="mirasimiz.php" class=top-list>Mirasımız</a></td>
					<td width=10%><a href="iletisim.php" class=top-list>İletişim</a></td>	
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
				<div id="orta-baslik"><h1>Şehrim</h1></div>
				<div id="orta-alan">
					<div class="slideshow-container">
						<div class="mySlides fade" style="display: block;">
						  <div class="numbertext">1 / 5</div>
						  <img src="./images/img1.jpg" style="width:100%">
						  <div class="text-resim ">Yozgat</div>
						</div>
						<div class="mySlides fade" style="display: none;">
						  <div class="numbertext">2 / 5</div>
						  <img src="./images/img2.jpg" style="width:100%">
						  <div class="text-resim ">Saat Kulesi</div>
						</div>
						<div class="mySlides fade" style="display: none;">
						  <div class="numbertext">3 / 5</div>
						  <img src="./images/img3.jpg" style="width:100%">
						  <div class="text-resim ">Saat Kulesi</div>
						</div>
						<div class="mySlides fade" style="display: none;">
						  <div class="numbertext">4 / 5</div>
						  <img src="./images/img4.jpg" style="width:100%">
						  <div class="text-resim ">Akdağmadeni</div>
						</div>
						<div class="mySlides fade" style="display: none;">
						  <div class="numbertext">4 / 5</div>
						  <img src="./images/img5.jpg" style="width:100%">
						  <div class="text-resim ">Akdağmadeni</div>
						</div>
						<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
						<a class="next" onclick="plusSlides(1)">&#10095;</a>
					</div><br>
				</div>							
			</div>
			<div id="alt"><div id="copyright"><h5>© 2020 Hüseyin Burhan Başaran</h5></div></div>
		</div>
	</body>
</html>





