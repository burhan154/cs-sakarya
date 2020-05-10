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
		<link rel="stylesheet" type="text/css" href="css/slider.css">
		<link rel="icon" href="./images/logo.ico" type="image/x-icon">
		<script src="js/slider.js"></script>
	</head>
    <body>
		<div id="sayfa">
			<div id="ust">
				<table border=0 align="center" width=100% height=100% class="menu">
					<tr>
					<th width=14%><img src="./images/logom.png" width=78%></th>
					<td width=10%><a href="index.php" class=menu>Ana Sayfa</td>
					<td width=10%><a href="ozgecmis.php" class=menu>Özgeçmiş</a></td>
					<td width=10% bgcolor=#4CAF50><a href=# class=secili>Şehrim</a></td>
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
				<div id="orta-baslik"><h1>Şehrim</h1></div>
				<div id="orta-alan" style="height:2860px;">
					<div class="slider">
						<div class="slider-panel fade" style="display: block;">
						  <div class="numara">1 / 6</div>
						  <a href="#yazi2"><img src="./images/img1.jpg" style="width:100%"></a>
						  <div class="yazi-resim">Anıtkabir</div>
						</div>
						<div class="slider-panel fade" style="display: none;">
						  <div class="numara">2 / 6</div>
						  <a href="#yazi3"><img src="./images/img2.jpg" style="width:100%"></a>
						  <div class="yazi-resim">Birinci TBMM binası (Kurtuluş Savaşı Müzesi)</div>
						</div>
						<div class="slider-panel fade" style="display: none;">
						  <div class="numara">3 / 6</div>
						  <a href="#yazi4"><img src="./images/img3.jpg" style="width:100%"></a>
						  <div class="yazi-resim">İkinci TBMM binası (Cumhuriyet Müzesi)</div>
						</div>
						<div class="slider-panel fade" style="display: none;">
						  <div class="numara">4 / 6</div>
						  <a href="muze.html"><img src="./images/img4.jpg" style="width:100%"></a>
						  <div class="yazi-resim">Anadolu Medeniyetleri Müzesi</div>
						</div>
						<div class="slider-panel fade" style="display: none;">
						  <div class="numara">5 / 6</div>
						  <a href="ulucanlar.html"><img src="./images/img5.jpg" style="width:100%"></a>
						  <div class="yazi-resim">Ulucanlar Cezaevi Müzesi</div>
						</div>
						<div class="slider-panel fade" style="display: none;">
						  <div class="numara">6 / 6</div>
						  <a href="ankara-kalesi.html" ><img src="./images/img6.jpg" style="width:100%"></a>
						  <div class="yazi-resim">Ankara Kalesi</div>
						</div>
						<a class="onceki" onclick="hareket(-1)">&#10094;</a>
						<a class="sonraki" onclick="hareket(1)">&#10095;</a>
					</div><br><h4>
					<table border=1 align="center" id="bilgi" style="float:right;width:30%;">
						<tr><th colspan=2 style="padding-top:5px;padding-bottom:5px;"><h2>Ankara</h2></th></tr>
						<tr><td colspan=2><img src="./images/ankara-harita-1.jpg" width=100%>Ankara'nın Türkiye'deki konumu</td></tr>
						<tr><td colspan=2><img src="./images/ankara-harita-2.jpg" width=100%>Ankara'nın İlçeleri</td></tr>
						<tr><td>Yüzölçümü</td><td>25.632 km²</td></tr>
						<tr><td>Yüzölçümü Sırası</td><td>3. Şehir</td></tr>
						<tr><td>Rakım</td><td>938 m </td></tr>
						<tr><td>Nüfus</td><td>5.639.076</td></tr>
						<tr><td>Nüfus Sırası</td><td>2. Şehir</td></tr>
						<tr><td>İlk yerleşim</td><td>MÖ 3. binyıl</td></tr>
						<tr><td colspan=2><iframe allowfullscreen="" frameborder="0" height="300" src="https://www.google.com/maps/embed
						?pb=!1m18!1m12!1m3!1d195884.20789703025!2d32.622681311993134!3d39.90355566449729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768
						!4f13.1!3m3!1m2!1s0x14d347d520732db1%3A0xbdc57b0c0842b8d!2sAnkara!5e0!3m2!1str!2str!4v1525076656699" 
						style="border: 0;" width=100%></iframe></td></tr>
					</table>
					<a name="yazi1"><div id="sehrim-panel">
					<h2 style="color:#4CAF50;font-size:36px;">ANKARA’NIN TARİHİ</h2><br><h5>
					Ankara ve çevresinde yapılan arkeoloji kazıları sonucunda tarihi Bronz çağındaki Hatti Uygarlığına kadar gider. 
					Hatta Yontmataş devrinden kalma araç-gereçler ortaya çıkarılmıştır. İsa’dan önce 2000’li yıllarda yöredeki ilk 
					yerleşme merkezinin Anadolu'da ilk siyasal birliği sağlayan Hititler döneminde kurulduğu sanılmaktadır. İ.Ö. 
					VIII. yy'da Frigyalıların eline geçmiş, İ.Ö. VIII. yy'da Frigyalılar Lidyalılara bağımlı hale gelmişler, 
					İ.Ö.547'de Lidya kralının Perslere yenilmesinden sonra da Pers egemenliği başlamıştır. Batı Anadolu'daki Sardeis
					(Sardes) ile İran'daki Susa kentleri arasında uzanan Kral yolu üstünde yer alan Ankara, Persler döneminde önemli
					bir konaklama ve ticaret merkezi haline gelmiştir.</h5><br><br>
					<h3>ANKARA’NIN İLK İSMİ<br><br></h3><h5>İsa’dan önce üçüncü yüzyılda, bir Kelt ırkı olan Galatlar Ankara’yı 
					başkent yapmıştır. İlin tarihteki ismi “Ankyra”dır. Ankara, İ.Ö.II.yy'da Roma İmparatorluğu'na katılmış ve önemli
					bir askeri merkez haline gelmiştir.Romalılar döneminde tapınaklar, hamamlar ve hipodrom yapılan (günümüze bu 
					yapıtlardan Augustus tapınağı ile Roma hamamının bir bölümü kalmıştır) kent, Bizans döneminde, (395-1073) kalın 
					bir dış surla çevrildi ve tam bir Ortaçağ kenti görünümü aldı. 1071'de Selçukluların Malazgirt zaferini kazanarak
					Anadolu'ya girmelerinden sonraki yıllarda Ankara, Bizanslılar ve Selçuklular arasında birkaç kez el değiştirdi. 
					Selçuklular döneminde Ankara kenti, kalın surlarla çevriliydi ve askeri önemini korumaktaydı; ama ana ulaşım 
					yollarına göre sapa kaldığından ticari önemini yitirmişti.</h5><br><br>
					<h3>ANKARA’NIN TÜRK HAKİMİYETİNE GİRİŞİ<br><br></h3><h5>VII. ve VIII. yüzyıllarda İslamiyetin doğuşuyla birlikte 
					şehir Pers ve Arap akımlarına maruz kalmıştır. 871-893 tarihleri arasında birkaç kez el değiştirir. 1127’de şehir
					kesin olarak Türk hakimiyetine girer ve adı “Engüriye” olur. 1304 yılında İlhanlıların eline geçen Ankara, 40 yıl
					süreyle onların yönetiminde kaldı. Ankara Osmanlılara ilk olarak Orhan Bey zamanında geçti(1356) kısa bir süre 
					için el değiştirdikten sonra I. Murat tarafından yeniden(1360) alındı. 1402’de Yıldırım Bayezid ve Timurlenk 
					arasındaki Ankara Savaşında şehir kısa bir süre Moğol hakimiyetinde kalır. Ancak 1414’de kesin olarak Osmanlı 
					hakimiyetine girer.</h5><br><br>
					<h3>ANKARA'NIN BAŞKENT OLUŞU<br><br></h3><h5>Kurtuluş savaşı sırasında 1920’de Ankara merkez üs olarak seçildi. 
					23 Nisan 1920’de Büyük Millet Meclisi açıldı. 13 Ekim 1923’te Gazi Mustafa Kemal Atatürk tarafından coğrafi, 
					stratejik, siyasi ve Kurtuluş Savaşındaki merkez üs özellikleri nedeniyle başkent ilan edildi. Sonrasında da 29
					Ekim 1923’de Türkiye Cumhuriyeti kuruldu. Cumhuriyetin ilk yıllarında An­kara bozkırın ortasında çorak bir kasaba
					görünümündeydi. O günlerde Avrupa’dan şehir mimarları getirilerek bugünkü modern Ankara’nın temelleri atıldı. 
					Prof. Hermann Jansen'in hazırladığı kent planı çerçevesinde imar hareketleri hız kanırken diğer yandan, kamu 
					yönemitinin başlıca kurumları kentte örgütlenmeye başlamıştır.<br><br>Nüfus'u 1920'lerde 25.000 dolaylarında 
					olan kent büyümüş ve 1990'lı yıllarda 4 milyona ulaşmıştır.</h5>
					</div></a>
					<a name="yazi2"><div id="sehrim-panel">
					<h2 style="color:#4CAF50;font-size:36px;">ANITKABİR</h2><br>
					<h5>Anıtkabir, Türkiye'nin başkenti Ankara'nın Çankaya ilçesinde yer alan 
					Mustafa Kemal Atatürk'ün anıt mezarıdır.<br><br>Atatürk'ün 10 Kasım 1938'deki vefatının ardından, 13 Kasım'da Atatürk'ün
					naaşının Ankara'da inşa edilecek bir anıt mezara defnedileceği ve bu inşaat tamamlanana kadar naaşın Ankara 
					Etnografya Müzesi'nde kalacağı açıklandı. Bu anıt mezarın inşa edileceği yeri belirlemesi amacıyla hükûmet 
					tarafından kurulan komisyonun raporu doğrultusunda, 17 Ocak 1939'da toplanan Cumhuriyet Halk Partisi meclis grubu
					toplantısında Anıtkabir'in Rasattepe'ye inşa edilmesine karar verildi. Bu kararın ardından arazine kamulaştırma 
					çalışmaları başlatılırken, Anıtkabir'in tasarımını belirleme amacıyla 1 Mart 1941'de bir proje yarışması başlatıldı. 
					2 Mart 1942'de sona eren yarışma sonrasında yapılan değerlendirmeler sonucunda, Emin Onat ve Orhan Arda'nın projesi 
					birinci olarak belirlendi. Proje, birkaç farklı dönemde yapılan birtakım değişikliklerle, Ağustos 1944'te 
					gerçekleştirilen temel atma töreniyle uygulanmaya başlandı. Dört kısım hâlinde gerçekleştirilen inşaat; yaşanan 
					birtakım sorunlar ve aksaklıklar nedeniyle planlanandan ve hedeflenenden geç olarak Ekim 1952'de tamamlandı. 10
					Kasım 1953'te ise Atatürk'ün naaşı buraya nakledildi.<br><br>1973'ten beri İsmet İnönü'nün kabrinin de yer aldığı 
					Anıtkabir'e 1966'da defnedilen Cemal Gürsel'in naaşı ise 27 Ağustos 1988'de kaldırılmıştır.</h5></div></a>
					
					<a name="yazi3"><div id="sehrim-panel" style="width:100%;"><h2 style="color:#4CAF50;font-size:36px;">TBMM BİNALARI</h2><br>
					<h3>Birinci TBMM binası (Kurtuluş Savaşı Müzesi)<br><br></h3><h5>1920-1924 yılları arasında TBMM faaliyetlerinin 
					gerçekleştirildiği bina. Ankara'nın Altındağ ilçesinin Ulus Meydanı'nda bulunan I. Türkiye Büyük Millet Meclisi
					binasının inşaasına, 1915 yılında başlanmıştır. İlkin İttihat ve Terakki Cemiyeti kulüp binası olarak tasarlanmış
					binanın planı evkaf mimarı Salim Bey tarafından yapılmış, inşasına ise kolordunun askeri mimarı Hasip Bey nezaret 
					etmiştir.<br><br>Türk mimari stilinde olan iki katlı binanın en belirgin özelliği duvarlarında Ankara taşı (Andezit)
					kullanılmış olmasıdır.<br><br>Meclisin, 23 Nisan 1920'de bu binada toplanması kararlaştırıldığında henüz bitirilmemiş
					olan bina, milli bir heyecanın eseri olarak milletin katkısıyla tamamlanmıştır.<br><br>23 Nisan 1920 ile 15 Ekim 1924
					tarihleri arasında I. Türkiye Büyük Millet Meclisi olarak kullanılan bina daha sonra Cumhuriyet Halk Fırkası Genel 
					Merkezi ve Hukuk Mektebi olarak işlevini sürdürmüş, 1952 yılında Maarif Vekâletine devredilmiş, 1957 yılında ise müzeye 
					dönüştürülmek üzere çalışmalara başlanmıştır. Bina 23 Nisan 1961'de "Türkiye Büyük Millet Meclisi Müzesi" adıyla halkın 
					ziyaretine açılmıştır.<br><br>Atatürk'ün doğumunun 100. yılını kutlama programı çerçevesinde, 1981 yılında Kültür ve 
					Turizm Bakanlığı Eski Eserler ve Müzeler Genel Müdürlüğü tarafından restorasyon Ve teşhir-tanzim çalışmaları sonucu 1981
					yılında "Kurtuluş Savaşı Müzesi" adıyla yeniden ziyarete açılmıştır.<br><br>I. Türkiye Büyük Millet Meclisi binası olarak
					kullanılan cumhuriyetin ilk yönetim merkezi hem hükûmetin, hem de devletin yönetildiği bir yerdir. Dönemindeki meclis 
					hükûmeti anlayışının da bir sonucu olan bu biçim aynı zamanda savaş şartlarının ağır koşullarından da kaynaklanmaktadır. 
					Kurtuluş Savaşı Müzesi içerisinde günümüzde Bakanlar Kurulu odası gibi hükûmet çalışma odaları hâlen muhafaza edilmektedir.
					<br><br>Kurtuluş Savaşı Müzesi geniş bir koleksiyon sahibidir. Yalnızca doğal olarak yapının eski halinden aldığı eserler 
					de sergilenmekteyken aynı zamanda kongrelerin hatıratı da yapı içerisinde teşhir edilmektedir. Diğer yandan Lozan Antlaşması
					ve Sevr Antlaşması ait belgeler, çeşitli devlet büyüğü hediyeleri ve dönemin ruhunu anlatan yazışma ve haberleşme araçları 
					yapı içerisinde sergilenmektedir.<br><br>Kurtuluş Savaşı Müzesi çerisinde yer alan eserlerden doğal olarak yapıya miras kalan
					eserler dönemin Meclis Başkanlığı makamına ait eserler, Riyaset makamı da denilen Başbakanlık makamı eserleri, bakanlara ait 
					çeşitli eserler yer almaktadır. Bunlarla birlikte de alt katta fotoğrafhane ve çeşitli sanat eserleri sergilenmektedir. Üstte 
					ise kongre dönemlerinin şahane ürünleri, anlaşmalara ait tutanaklar, dönemin ilginç telgrafları ve bizzat Mustafa Kemal imzalı
					yazışmalar bulunmaktadır. Diğer yandan Kurtuluş Savaşı Müzesi içerisinde yer alan Büyük Taarruz hatıraları da ziyaretçilerin 
					ilgisini çekmektedir.<br><br></h5></div></a><a name="yazi4"><div id="sehrim-panel" style="width:100%;">
					<h3>İkinci TBMM binası (Cumhuriyet Müzesi)<br><br></h3><h5>1924-1960 yılları arasında TBMM faaliyetlerinin gerçekleştirildiği 
					bina. Ankara'nın Altındağ ilçesinin Ulus semtinde bulunmaktadır. 1923 yılında mimar Vedat Tek (1873-1942) tarafından Cumhuriyet
					Halk Fırkası mahfili (toplantı yeri) olarak tasarlanan ve inşa edilen bu bina işlevi değiştirilerek meclis olarak kullanılmıştır.
					Bodrum üzerine iki katlı olan bu yapının iç bölümleri, iki kat boyunca yükselen ortadaki meclis salonunun üç kenarına 
					dizilmişlerdir. Girişten sonra enine uzanan, iki ucunda merdivenlerin yer aldığı geniş geçit, Selçuklu ve Osmanlı bezeme 
					motiflerinin yer aldığı bir tavanla örtülmüştür. Benzer biçimde ele alınmış yerlerden birisi de büyük salondur. Yer yer localarla
					değerlendirilen bu salonun özellikle yıldız motiflerini içeren ahşap tavanı, sonradan düzenlenen taç kapı ve bazı noktalar 
					dışında kemerler, saçaklar, yer yer çinilerin yer aldığı bölümler ile bu dönemin mimari özelliklerini yansıtmaktadır.<br><br>
					I. Türkiye Büyük Millet Meclisi binasının yetersiz olması ve gelişen Cumhuriyet Türkiye'si meclisinin ihtiyaçlarını
					karşılayamaması nedeni ile bina bir takım değişiklikler geçirmiş, sonra da II. Türkiye Büyük Millet Meclisi olarak 18
					Ekim 1924 tarihinde hizmete açılmıştır.<br><br>II. Türkiye Büyük Millet Meclisi 1924-1960 yılları arasında Atatürk ilke ve 
					inkılâplarının gerçekleştirildiği; Cumhuriyetimizin gelişmesi için çok önemli çağdaş kararların alındığı; çağdaş yasaların 
					çıkarıldığı uluslararası alanda Türkiye'nin etkinliğini ve saygınlığını artıran antlaşmaların yapıldığı; çok partili sisteme
					geçişin sağlandığı önemli bir yapıdır. Türk siyasi tarihinde önemli yeri olan II. Türkiye Büyük Millet Meclisi binası 
					işlevini 27 Mayıs 1960 Askerî Darbesi'ne kadar 36 yıllık bir dönem boyunca sürdürmüştür. 1961 yılında yeniden açılan Meclisin
					yapımı tamamlanmış olan modern binasına taşınması üzerine bu bina Merkezi Antlaşma Teşkilatı'na (CENTO) tahsis edilmiştir. 
					1961-1979 yılları arasında CENTO Genel Merkezi olarak kullanılan bu bina CENTO'nun kaldırılması ile aynı yıl Kültür Bakanlığı'na 
					devredilmiştir. Bu binanın ön kısmının Cumhuriyet Müzesi olarak düzenlenmesi, arka kısmının ise Eski Eserler ve Müzeler Genel 
					Müdürlüğü'nün hizmet binası olarak kullanılması kararlaştırılmıştır. Müze kısmı onarım ve restorasyonlardan sonra düzenlenerek 
					30 Ekim 1981 tarihinde "Cumhuriyet Müzesi" olarak ziyarete açılmıştır. Bu düzeniyle 1985 yılına kadar hizmet vermiştir. Aynı yıl
					ziyarete kapatılarak, teşhir çalışmaları başlamıştır. Çalışmalar 1991 yılına kadar devam etmiş, Ocak 1992 yılında yeniden ziyarete
					açılmıştır. Ağustos 2001 tarihinde tekrar ziyarete kapatılan müze, restorasyon ve teşhir - tanzim çalışmalarından sonra 29 Ekim 
					2008 tarihinde ziyarete açılmıştır.</br></br>Müzede ilk üç Cumhurbaşkanı dönemini yansıtan olaylar, kendi sözleri, fotoğrafları, 
					bazı özel eşyaları ile o dönemde mecliste alınan kararlar ve kanunlar sergilenmektedir.<br></h5></div></a>
				</div>							
			</div>
			<div id="alt"><div id="copyright"><h5>© 2020 Copyright Hüseyin Burhan Başaran</h5></div></div>
		</div>
	</body>
</html>





