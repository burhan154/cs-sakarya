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
		<div id="sayfa" style="height:3300px;">
			<div id="ust">
				<table border=0 align="center" width=100% height=100% class="menu">
					<tr>
					<th width=14%><h1>HBB</h1></th>
					<td width=10%><a href="index.php" class=menu>Ana Sayfa</td>
					<td width=10%><a href="ozgecmis.php" class=menu>Özgeçmiş</a></td>
					<td width=10% bgcolor=#4CAF50><a href=# class=secili>Şehrim</a></td>
					<td width=10%><a href="mirasimiz.php" class=menu>Mirasımız</a></td>
					<td width=10%><a href="iletisim.php" class=menu>İletişim</a></td>	
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
			<div id="orta" style="height:3140px;">
				<div id="orta-baslik"><h1>Şehrim</h1></div>
				<div id="orta-alan" style="height:3080px;">
					<div class="slider">
						<div class="slider-panel fade" style="display: block;">
						  <div class="numara">1 / 5</div>
						  <a href="#yazi1" ><img src="./images/img1.jpg" style="width:100%"></a>
						  <div class="yazi-resim ">Yozgat</div>
						</div>
						<div class="slider-panel fade" style="display: none;">
						  <div class="numara">2 / 5</div>
						  <a href="#yazi2" ><img src="./images/img2.jpg" style="width:100%"></a>
						  <div class="yazi-resim ">Saat Kulesi</div>
						</div>
						<div class="slider-panel fade" style="display: none;">
						  <div class="numara">3 / 5</div>
						  <a href="#yazi3" ><img src="./images/img3.jpg" style="width:100%"></a>
						  <div class="yazi-resim ">Saat Kulesi</div>
						</div>
						<div class="slider-panel fade" style="display: none;">
						  <div class="numara">4 / 5</div>
						  <a href="#yazi4" ><img src="./images/img4.jpg" style="width:100%"></a>
						  <div class="yazi-resim ">Akdağmadeni</div>
						</div>
						<div class="slider-panel fade" style="display: none;">
						  <div class="numara">5 / 5</div>
						  <a href="#yazi5" ><img src="./images/img5.jpg" style="width:100%"></a>
						  <div class="yazi-resim ">Akdağmadeni</div>
						</div>
						<a class="onceki" onclick="hareket(-1)">&#10094;</a>
						<a class="sonraki" onclick="hareket(1)">&#10095;</a>
					</div><br><h4>
					<a name="yazi1"></a><div id="sehrim-panel">1</div>
					<a name="yazi2"></a><div id="sehrim-panel">2</div>
					<a name="yazi3"></a><div id="sehrim-panel">3</div>
					<a name="yazi4"></a><div id="sehrim-panel">4</div>
					<a name="yazi5"></a><div id="sehrim-panel">5</div>
					</h4>
				</div>							
			</div>
			<div id="alt"><div id="copyright"><h5>© 2020 Hüseyin Burhan Başaran</h5></div></div>
		</div>
	</body>
</html>





