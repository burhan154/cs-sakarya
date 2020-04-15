<?php
error_reporting(0);
session_start();
$Yetkili = false;
$YetkiliBaslik = 'Mesajlar';
$YetkisizBaslik ='Ana Sayfaya Yönlendiriliyorsunuz';
?>
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
				<table border=0 align="center" width=100% height=100% class="menu">
					<tr>
					<th width=14%></th>
					<td width=10%><a href="index.php" class=menu>Ana Sayfa</td>
					<td width=10%><a href="ozgecmis.php" class=menu>Özgeçmiş</a></td>
					<td width=10%><a href="sehrim.php" class=menu>Şehrim</a></td>
					<td width=10%><a href="mirasimiz.php" class=menu>Mirasımız</a></td>
					<td width=10%><a href="iletisim.php" class=menu>İletişim</a></td>
					<th></th>
					<td width=10% bgcolor=#4CAF50 ><a href=#  class=secili>Mesajlar</td>					
					<th width=14%><h4>
						<?php
						error_reporting(0);
						session_start();						
						if($_SESSION['username']){
							echo 'Merhaba '.$_SESSION['username'].' ';
							$Yetkili = true;
						}
						else{
							header('Location: index.php');
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
				<div id="orta-baslik">
				<h1>
					<?php
						error_reporting(0);
						if($Yetkili == 1){
							$sayi =0;
							$dosya = fopen("mesajlar.txt",'r');
							while(!feof($dosya)){ 
								$sayi++;
								$satir = fgets($dosya);
							}
							$sayi--;
							echo $YetkiliBaslik.'('.$sayi.')';
							fclose($dosya);	
						}
						else{
							echo $YetkisizBaslik;
						}
					?>
				</h1>
				</div>
				<div id="orta-alan">
				<h5>
				
				<?php
					error_reporting(0);
					$sayi2 =0;
					$dosya2 = fopen("mesajlar.txt",'r');
					while(!feof($dosya2)){
						$sayi2++;
						$satir = fgets($dosya2);
						if($sayi2<=$sayi){
							echo "<form method='POST' action='sil.php'><div id='mesajkutusu'><h4 style='color:#fff;'>"."$sayi2 ) "."$satir <input type='hidden' name='sil' value=$satir><input type='SUBMIT' value='SİL'/></h4></div></form> ";							
						}
					}
					fclose($dosya2);
				?>
				
				
				</h5>
				</div>
			</div>
			<div id="alt"><div id="copyright"><h5>© 2020 Hüseyin Burhan Başaran</h5></div></div>
		</div>
	</body>
</html>