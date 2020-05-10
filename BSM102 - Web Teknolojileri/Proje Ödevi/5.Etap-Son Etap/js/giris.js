function gonder()
{
	kontrol();
	var _username=document.getElementById('username').value;
	var _password=document.getElementById('password').value;
	if(kontrol()==1){
		document.getElementById('login').submit();
	}
}
function kontrol()
{
	var _username =document.getElementById('username').value;
	var _password =document.getElementById('password').value;
	document.getElementById('username').style.border = "2px solid #ccc";
	document.getElementById('password').style.border = "2px solid #ccc";
	document.getElementById('username').style.backgroundColor="#fff";
	document.getElementById('password').style.backgroundColor="#fff";
	if(_username.length==0){
		document.getElementById('uyari').innerHTML="E-posta boş olamaz.";
		document.getElementById('uyari').style.backgroundColor="#c0392b";
		document.getElementById('username').style.border = "2px solid #c0392b";
		document.getElementById('username').style.backgroundColor="#FFEBEE";
		return false;
	}
	else{
		var atpos=_username.indexOf("@");
		var dotpos=_username.lastIndexOf(".");
		if ( atpos<4 || dotpos<atpos+5 || dotpos+2>=_username.length )
		{
			document.getElementById('uyari').innerHTML="Lütfen Geçerli bir e-posta adresi giriniz.";
			document.getElementById('uyari').style.backgroundColor="#c0392b";
			document.getElementById('username').style.border = "2px solid #c0392b";
			document.getElementById('username').style.backgroundColor="#FFEBEE";
			return false;
		}     
		else
		{
			if(_password.length==0){
				document.getElementById('uyari').innerHTML="Parola boş olamaz.";
				document.getElementById('uyari').style.backgroundColor="#c0392b";
				document.getElementById('password').style.border = "2px solid #c0392b";
				document.getElementById('password').style.backgroundColor="#FFEBEE";
				return false;
			}
			else{
				document.getElementById('uyari').innerHTML="";
				document.getElementById('uyari').style.backgroundColor="#F5F5F5";
				return true;
			}
		} 
	}
	if(_password.length==0){
		document.getElementById('uyari').innerHTML="Parola boş olamaz.";
		document.getElementById('uyari').style.backgroundColor="#c0392b";
		document.getElementById('password').style.border = "2px solid #c0392b";
		document.getElementById('password').style.backgroundColor="#FFEBEE";
		return false;
	}
}
