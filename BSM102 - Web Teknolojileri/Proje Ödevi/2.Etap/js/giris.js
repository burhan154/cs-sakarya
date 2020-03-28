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
	document.getElementById('uyari').innerHTML="-----";
	if(_username.length==0){
		document.getElementById('uyari').innerHTML="Kullanıcı adı boş olamaz.";
		return false;
	}
	else{
		var atpos=_username.indexOf("@");
		var dotpos=_username.lastIndexOf(".");
		if ( atpos!=10 || dotpos<atpos+10 || dotpos+2>=_username.length )
		{
			document.getElementById('uyari').innerHTML="Lütfen Geçerli bir e-posta adresi giriniz.";
			return false;
		}     
		else
		{
			if(_password.length==0){
				document.getElementById('uyari').innerHTML="Parola boş olamaz.";
				return false;
			}
			else{
				document.getElementById('uyari').innerHTML="-----";
				return true;
			}
		} 
	}
	if(_password.length==0){
		document.getElementById('uyari').innerHTML="Parola boş olamaz.";
		return false;
	}
}
