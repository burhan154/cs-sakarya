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
				<table border=0 align="center" width=100% height=100% >
					<tr>
					<td width=1%></td>
					<td width=12%><a href="index.php" class=top-list>Ana Sayfa</td>
					<td width=12% bgcolor=#34495e ><a href=# class=top-list>Mesajlar</td>
					<td width=48%></td>
					<td></td>	
					<td width=27%><h4>
						<?php
						error_reporting(0);
						session_start();						
						if($_SESSION['username']){
							echo 'Merhaba '.$_SESSION['username'].' ';
							echo '<a href="cikis.php" class=buton-cikis>ÇIKIŞ</a>';
							$Yetkili = true;
						}
						else{
							header('Location: index.php');
						}
						?>
					</h4>
					</td>
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
				<h4>
				<?php
					error_reporting(0);
					$sayi2 =0;
					$dosya2 = fopen("mesajlar.txt",'r');
					while(!feof($dosya2)){
						$sayi2++;
						$satir = fgets($dosya2);
						if($sayi2<=$sayi){
							echo "$sayi2 ) "."$satir <br />";
						}
					}
					fclose($dosya2);
				?>
				<h4>
				</div>
			</div>
			<div id="alt"><div id="copyright"><h5>© 2020 Hüseyin Burhan Başaran</h5></div></div>
		</div>
	</body>
</html>