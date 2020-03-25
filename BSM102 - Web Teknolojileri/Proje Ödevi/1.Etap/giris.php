<!DOCTYPE html>
<html>
    <head>
		<head><title>Şehrim</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
	</head>
    <body>
		<div id="sayfa">
			<div id="top">
				<table border=0 align="center" width=100% height=100% >
					<tr>
					<td width=5%></td>
					<td width=12% bgcolor=#34495e ><a href=# class=top-list>Giriş Sayfası</td>
					<td width=36%></td>
					<td></td>	
					<td width=25%><h4>
						<?php
						$username = $_POST['username'];
						$password= $_POST['password'];
							if($username =='admin' && $password=='123456'){
								echo "Hoşgeldin ".$_POST['username'];
							}else{
								echo 'Kullancı adı veya şifre hatalı';
								header("Refresh: 3; url=index.html");
							}
						?>
					</h4>
					</td>
					</tr>
				</table>
			</div>
			<div id="orta">
				<div id="title">
				   <h1>Hakkımda</h1>
				</div>
			</div>
			<div id="bottom"></div>
		</div>
	</body>
</html>