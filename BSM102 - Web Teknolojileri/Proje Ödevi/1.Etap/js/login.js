function gonder()
{
	kontrol();
	var _username=document.getElementById('username').value;
	var _password=document.getElementById('password').value;
	if(_username.length!=0 && _password.length!=0){
		document.getElementById('login').submit();
	}
}
function kontrol()
{
	var _username =document.getElementById('username').value;
	var _password =document.getElementById('password').value;
	document.getElementById('uyari').innerHTML="";
	if(_username.length==0){
		document.getElementById('uyari').innerHTML="Kullanıcı adı boş olamaz.";
	}
	if(_password.length==0){
		document.getElementById('uyari').innerHTML="Parola boş olamaz.";
	}
}
