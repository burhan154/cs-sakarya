<?php
error_reporting(0);
session_start();
$Yetkili= false;
if($_SESSION['username']){
	$Yetkili= true;
}
if($Yetkili == 1){
	$sayi =0;
	$dosya = fopen("mesajlar.txt",'r');
	while(!feof($dosya)){ 
		$sayi++;
		$satir = fgets($dosya);
	}
	$sayi--;
	if($sayi>99){
		$sayi="99+";
	}
	fclose($dosya);	
}
$Mesajlar= <<<BLOK
	<td width=10%><a href="mesajlar.php" class=menu >$sayi Mesaj</a></td>
BLOK;
?>
<!DOCTYPE html>
<html>
    <head>
		<head><title>Burhan Başaran Kişisel Web Sitesi</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="icon" href="./images/logo.ico" type="image/x-icon">
		<script src="js/giris.js"></script>
	</head>
    <body>
		<div id="sayfa">
			<div id="ust">
				<table border=0 align="center" width=100% height=100% class="menu">
					<tr>
					<th width=14%><img src="./images/logom.png" width=78%></th>
					<td width=10% bgcolor=#4CAF50><a href=# class="secili">Ana Sayfa</a></td>
					<td width=10%><a href="ozgecmis.php" class=menu>Özgeçmiş</a></td>
					<td width=10%><a href="sehrim.php" class=menu>Şehrim</a></td>
					<td width=10%><a href="mirasimiz.php" class=menu>Mirasımız</a></td>
					<td width=10%><a href="iletisim.php" class=menu>İletişim</a></td>						
					<th></th>
				    <?php
						error_reporting(0);
						session_start();
						if($_SESSION['username']){
							echo $Mesajlar;
						}				
					?>				
					<th width=14%><h4 style="color:#fff;">
					<?php
						error_reporting(0);
						session_start();
						if($_SESSION['username']){
							$Yetkili= true;
							echo 'Merhaba '.$_SESSION['username'];
						}				
					?></h4></th>
					<?php
						error_reporting(0);
						session_start();
						if($_SESSION['username']){
							echo '<td width=10%><a href="cikis.php" class=menu>ÇIKIŞ</a></td>';
						}
						else{
							echo '<td width=10%><a href="giris.php" class=menu>GİRİŞ YAP</a></td>';
						}						
					?>
					</tr>
				</table>
			</div>
			
			<div id="orta">
				<div id="orta-baslik"><h1>Hakkımda</h1></div>
				<div id="orta-alan">
					<div id="yazi"><h2 style="color:#4CAF50;font-size:36px;">MERHABA<br>BEN HÜSEYİN BURHAN BAŞARAN</h2><br><br><br> 
					<h4><br><br>2000 senesinin Temmuz ayında Ankara'da dünyaya geldim. İki kardeşin ilkiyim.<br><br>
					10 yaşımda büyüyünce olmaya karar verdiğim meslek olan Bilgisayar Mühendisliği bölümünü şuan Sakarya Üniversitesi'nde okumaktayım.<br><br>
					Dizi izlemeyi ve müzik dinlemeyi severim. En sevdiğim dizi <a href="https://tr.wikipedia.org/wiki/Game_of_Thrones" target="_blank">Game of Thrones</a>'tur.
					En sevdiğim müzik ise <a href="https://tr.wikipedia.org/wiki/AC/DC" target="_blank">AC/DC</a> grubunun
					<a href="https://www.youtube.com/watch?v=v2AC41dglnM" target="_blank">Thunderstruck</a> şarkısıdır.<br><br>
					Sevdiğim filmler ise <a href="https://tr.wikipedia.org/wiki/Yıldız_Savaşları" target="_blank">Star Wars</a> serisinin Öncül ve Orijinal Üçlemeleridir.<br><br>
					Oynamayı sevdiğim oyun ise <a href="https://tr.wikipedia.org/wiki/Badminton" target="_blank">Badminton</a>'dur.</h4>
					</div>
					<div id="resim-hakkimda"><img src="./images/resim-hakkımda.png" width=100% height=100%></div>
					<div id="yazi-sol"> 
					<h3 align=center>Favori Dizilerim</h3><br><h4>
					<div id="sergi" title="17 Nisan 2011 tarihide başlayıp 8 sezon süren Game of Thrones dizisi; George R. R. Martin’in Buz ve Ateşin Şarkısı romanından uyarlandı ve daha sonra da kitap serisinden konuları işleyerek yoluna devam etti."><div id="sergiler"><img src="./images/dizi/1.jpg" height=80px width=100%></div><h6 align=center>Game of Thrones</h6></div>
					<div id="sergi" title=" 20 Ocak 2008 tarihinde Amerikan yapımı bir drama dizisi olarak, AMC kanalında yayınlanmaya başlayan Breaking Bad, kısa sürede adını efsaneler arasına yazdırdı. Breaking Bad, toplamda 5 sezon boyunca bizleri hem şaşırtmayı hem de heyecanlandırmayı başarmıştı." ><div id="sergiler"><img src="./images/dizi/2.jpg" height=80px width=100%></div><h6 align=center>Breaking Bad</h6></div>
					<div id="sergi" title="Uyuşturucu İle Mücadele Dairesi’nde çalışan bir Meksikalı bir ajan olan Javier Pena, ünlü Kolombiyalı uyuşturucu kaçakçısı Pablo Escobar’ı yakalamak için Birleşik Devletler tarafından Kolombiya’ya yollanır. Escobar'ın gerçek hayat hikayesinden uyarlanan dizi, dünya çapına yayılmış bir uyuşturucu şebekesini engellemeye çalışan kolluk kuvvetlerini konu ediniyor."><div id="sergiler"><img src="./images/dizi/3.jpg" height=80px width=100%></div><h6 align=center>Narcos</h6></div>
					<div id="sergi" title="Carl Sagan, Ann Druyan ve Steven Soter tarafından yazılan Cosmos: Kişisel Yolculuk’un devamı niteliğinde çekilen Cosmos: Bir Uzay Serüveni; Carl Sagan’ın eski öğrencisi ve dünyaca ünlü astrofizikçi Neil deGrasse Tyson’ın sunuculuğunu yaptığı olağanüstü bir belgesel dizisi."><div id="sergiler"><img src="./images/dizi/4.jpg" height=80px width=100%></div><h6 align=center>Cosmos</h6></div>
					<div id="sergi" title="Düşük profilli bir devlet üniversitesinde öğrenci ve öğretmenlerin yaşantısını işler. Bir durum komedisi olarak meta-mizaha, pop kültür referanslarına, film ve televizyon klişelerinin eleştirisine sıkça başvurulmuştur."><div id="sergiler"><img src="./images/dizi/5.jpg" height=80px width=100%></div><h6 align=center>Community</h6></div>
					<div id="sergi" title="Yıldız Savaşları film serisinden uyarlanan çizgi dizi Klon Savaşları, Bölüm II ile Bölüm III arasındaki zaman diliminde yaşanan olayları konu ediyor. Anakin Skywalker, Obi-Wan Kenobi, Padmé Amidala, Yoda, Yüce Başkan Palpatine ve General Grievous bu seride de karşımızda olacak. Olay örgüsü, Galaktik Senato ile Bağımsız Sistemler Konfederasyonu arasındaki anlaşmazlığa odaklanıyor."><div id="sergiler"><img src="./images/dizi/6.jpg" height=80px width=100%></div><h6 align=center>Clone Wars</h6></div>
					<div id="sergi" title="Dizi, Colorado eyaletinin South Park adlı küçük bir kasabasında yaşayan Stan Marsh, Kyle Broflovski, Eric Cartman ve Kenny McCormick isimli dört çocuk merkez alınarak anlatılan bir takım gerçeküstü olayların da yer aldığı maceralardır. "><div id="sergiler"><img src="./images/dizi/7.jpg" height=80px width=100%></div><h6 align=center>South Park</h6></div>
					<div id="sergi" title="Charming adlı bir kasabada, yasa dışı işler yapan, aynı zamanda Charming'deki suçları ve suçluları kontrol altında tutmaya çalışan ve diğer yandan da kanunlarla mücadele eden bir motosiklet kulübünün maceralarını anlatmaktadır. Asıl olarak tüm dünyada bilinen Hells Angels adlı motosiklet kulübünden esinlenerek bu diziye uyarlama yapıldığı düşünülmektedir."><div id="sergiler"><img src="./images/dizi/8.jpg" height=80px width=100%></div><h6 align=center>Sons of Anarchy</h6></div>
					</h4>
					</div>
					<div id="yazi-sag"><h3 align=center>Favori Müziklerim</h3><br><h4>
						<div id="sergi" style="width:92%;"><div id="sergiler" >AC/DC - Thunderstruck</div><h6>
						<audio controls="controls" style="width:100%;height:30px;"><source src="./ses/ses1.mp3" type="audio/mpeg" />
						Tarayıcınız audio etiketini desteklemiyor.</audio></h6></div>
						<div id="sergi" style="width:92%;"><div id="sergiler" >AC/DC - Shoot To Thrill</div><h6>
						<audio controls="controls" style="width:100%;height:30px;"><source src="./ses/ses2.mp3" type="audio/mpeg" />
						Tarayıcınız audio etiketini desteklemiyor.</audio></h6></div>
						<div id="sergi" style="width:92%;margin-bottom:18px"><div id="sergiler" >Motörhead - Ace Of Spades</div><h6>
						<audio controls="controls" style="width:100%;height:30px;"><source src="./ses/ses3.mp3" type="audio/mpeg" />
						Tarayıcınız audio etiketini desteklemiyor.</audio></h6></div>
						
					</h4></div>
					</div>
				<div class="sifirla"></div>
			</div>
			<div id="alt"><div id="copyright"><h5>© 2020 Copyright Hüseyin Burhan Başaran</h5></div></div>
		</div>
	</body>
</html>





