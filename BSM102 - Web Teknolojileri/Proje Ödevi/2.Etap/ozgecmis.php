<!DOCTYPE html>
<html>
    <head>
		<head><title>Burhan Başaran Kişisel Web Sitesi</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
	</head>
    <body>
		<div id="sayfa">
			<div id="ust">
				<table border=0 align="center" width=100% height=100% >
					<tr>
					<td width=1%></td>
					<td width=12%><a href="index.php" class=top-list>Ana Sayfa</td>
					<td width=12% bgcolor=#34495e><a href=# class=top-list>Özgeçmiş</a></td>
					<td width=12%><a href="sehrim.php" class=top-list>Şehrim</a></td>
					<td width=12%><a href="mirasimiz.php" class=top-list>Mirasımız</a></td>	
					<td width=12%><a href="iletisim.php" class=top-list>İletişim</a></td>	
					<td></td>
					<td width=27%><h4>
					    <?php
						error_reporting(0);
						session_start();
						if($_SESSION['username']){
							echo 'Merhaba '.$_SESSION['username'].' ';
							echo '<a href="cikis.php" class=buton-cikis>ÇIKIŞ</a>';
						}
						?>      
					</h4></td>
					</tr>
				</table>
			</div>
			<div id="orta">
				<div id="orta-baslik">
				   <h1>Özgeçmiş</h1>
				</div>
			</div>

			<div id="alt"><div id="copyright"><h5>© 2020 Hüseyin Burhan Başaran</h5></div></div>
		</div>
	</body>
</html>





