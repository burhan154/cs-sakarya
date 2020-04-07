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
	if(_username.length==0){
		document.getElementById('uyari').innerHTML="E-posta boş olamaz.";
		return false;
	}
	else{
		var atpos=_username.indexOf("@");
		var dotpos=_username.lastIndexOf(".");
		if ( atpos!=10 || dotpos<atpos+10 || dotpos+2>=_username.length )
		{
			document.getElementById('uyari').innerHTML="Lütfen Geçerli bir e-posta adresi giriniz.";
			document.getElementById('uyari').style.backgroundColor="#c0392b";
			return false;
		}     
		else
		{
			if(_password.length==0){
				document.getElementById('uyari').innerHTML="Parola boş olamaz.";
				document.getElementById('uyari').style.backgroundColor="#c0392b";
				return false;
			}
			else{
				document.getElementById('uyari').innerHTML="";
				document.getElementById('uyari').style.backgroundColor="#27ae60";
				return true;
			}
		} 
	}
	if(_password.length==0){
		document.getElementById('uyari').innerHTML="Parola boş olamaz.";
		document.getElementById('uyari').style.backgroundColor="#c0392b";
		return false;
	}
}
