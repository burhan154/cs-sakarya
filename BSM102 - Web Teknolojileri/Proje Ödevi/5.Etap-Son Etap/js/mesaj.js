function gonder()
{
	if(kontrol()==1 && kontroleposta()==1){
		document.getElementById('mesaj-gonder').submit();		
	}
	else{
		document.getElementById('uyari').innerHTML="Hata lütfen daha sonra tekrar deneyin.";	
	}
	kontrol();
}
function temizle()
{
	document.getElementById('mesaj').value='';
	document.getElementById('ad').value='';
	document.getElementById('soyad').value='';
	document.getElementById('eposta').value='';
	var _cinsiyet = document.getElementsByName('cinsiyet');
	for (var i = 0; i < _cinsiyet.length; i++) {
		if (_cinsiyet[i].checked) {
			_cinsiyet[i].checked=false;
		}
	}
	document.getElementById("kabul").checked=false;
	document.getElementById('sehir').value=0;
}
function kontrol()
{
	var _ad=document.getElementById('ad').value;
	var _soyad=document.getElementById('soyad').value;
	var _mesaj=document.getElementById('mesaj').value;
	var _cinsiyet = document.getElementsByName('cinsiyet');
	var _sehir = document.getElementById('sehir').value;
	var _kabul = document.getElementById("kabul");
	var value = "";
	for (var i = 0; i < _cinsiyet.length; i++) {
		if (_cinsiyet[i].checked) {
			value = _cinsiyet[i].value;
		}
	}
	document.getElementById('ad').style.border = "2px solid #ccc";
	document.getElementById('ad').style.backgroundColor="#fff";
	document.getElementById('soyad').style.border = "2px solid #ccc";
	document.getElementById('soyad').style.backgroundColor="#fff";
	document.getElementById('mesaj').style.border = "2px solid #ccc";
	document.getElementById('mesaj').style.backgroundColor="#fff";
	document.getElementById('eposta').style.border = "2px solid #ccc";
	document.getElementById('eposta').style.backgroundColor="#fff";
	if(_ad.length==0){
		document.getElementById('uyari').innerHTML="Ad boş bırakılamaz.";
		document.getElementById('uyari').style.backgroundColor="#c0392b";
		document.getElementById('ad').style.border = "2px solid #c0392b";
		document.getElementById('ad').style.backgroundColor="#FFEBEE";
		return false;		
	}
	if(_soyad.length==0){
		document.getElementById('uyari').innerHTML="Soyad boş bırakılamaz.";
		document.getElementById('uyari').style.backgroundColor="#c0392b";
		document.getElementById('soyad').style.border = "2px solid #c0392b";
		document.getElementById('soyad').style.backgroundColor="#FFEBEE";		
		return false;		
	}
	if(kontroleposta()==0){
		document.getElementById('uyari').style.backgroundColor="#c0392b";
		document.getElementById('eposta').style.border = "2px solid #c0392b";
		document.getElementById('eposta').style.backgroundColor="#FFEBEE";
		return false;
	}
	if(_mesaj.length==0){	
		document.getElementById('uyari').innerHTML="Mesaj boş bırakılamaz.";
		document.getElementById('uyari').style.backgroundColor="#c0392b";
		document.getElementById('mesaj').style.border = "2px solid #c0392b";
		document.getElementById('mesaj').style.backgroundColor="#FFEBEE";
		return false;	
	}
	if(value == "" ){
		document.getElementById('uyari').innerHTML="Lütfen cinsiyet seçeneğini doldurunuz.";
		document.getElementById('uyari').style.backgroundColor="#c0392b";
		return false;
	}
	if(_sehir==0){
		document.getElementById('uyari').innerHTML="Lütfen yaşadığınız şehri seçiniz.";
		document.getElementById('uyari').style.backgroundColor="#c0392b";
		return false;
	}
	if(_sehir != 0){
		document.getElementById('sehir').style.backgroundColor="#2ecc71";
	}
	if(_kabul.checked==false){
		document.getElementById('uyari').innerHTML="Lütfen onaylayınız.";
		document.getElementById('uyari').style.backgroundColor="#c0392b";
		return false;
	}
	document.getElementById('uyari').innerHTML="";
	document.getElementById('sehir').style.backgroundColor="#2ecc71";
	document.getElementById('uyari').style.backgroundColor="#F5F5F5";
	return true;
	
}
function kontroleposta()
{
	var _eposta=document.getElementById('eposta').value;
	if(_eposta.length==0){
		document.getElementById('uyari').innerHTML="E-posta boş bırakılamaz.";
		return false;
	}
	else{
		var atpos=_eposta.indexOf("@");
		var dotpos=_eposta.lastIndexOf(".");
		if ( atpos<1 || dotpos<atpos+2 || dotpos+2>=_eposta.length )
		{
			document.getElementById('uyari').innerHTML="Lütfen geçerli bir e-posta adresi giriniz.";
			return false;
		}     
		else
		{	
			return true;
		}   
	}
	kontrol();
}