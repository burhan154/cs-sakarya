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
function kontroluyari()
{
	if(kontrol()==1 && kontroleposta()==1){
		document.getElementById('uyari').innerHTML="";
		document.getElementById('uyari').style.backgroundColor="#27ae60";	
	}
	else{
		document.getElementById('uyari').style.backgroundColor="#c0392b";
	}
	
}
function temizle()
{
	document.getElementById('mesaj').value='';
	document.getElementById('ad').value='';
	document.getElementById('soyad').value='';
	document.getElementById('eposta').value='';
}
function kontrol()
{
	var _ad=document.getElementById('ad').value;
	var _soyad=document.getElementById('soyad').value;
	var _mesaj=document.getElementById('mesaj').value;
	
	if(_ad.length==0){
		document.getElementById('uyari').innerHTML="Ad boş bırakılamaz.";
		document.getElementById('uyari').style.backgroundColor="#c0392b";
		return false;		
	}
	else if(_soyad.length==0){
		document.getElementById('uyari').innerHTML="Soyad boş bırakılamaz.";
		document.getElementById('uyari').style.backgroundColor="#c0392b";		
		return false;		
	}
	else if(kontroleposta()==0){
		document.getElementById('uyari').style.backgroundColor="#c0392b";
		return false;
	}
	else if(_mesaj.length==0){	
		document.getElementById('uyari').innerHTML="Mesaj boş bırakılamaz.";
		document.getElementById('uyari').style.backgroundColor="#c0392b";
		return false;	
	}
	else{
		document.getElementById('uyari').innerHTML="";
		document.getElementById('uyari').style.backgroundColor="#27ae60";
		return true;
	}
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
			document.getElementById('uyari').innerHTML="Lütfen Geçerli bir e-posta adresi giriniz.";
			return false;
		}     
		else
		{	
			return true;
		}   
	}
	kontrol();
}

