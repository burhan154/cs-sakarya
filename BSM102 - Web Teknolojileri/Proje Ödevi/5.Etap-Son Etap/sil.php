<?php
error_reporting(0);
session_start();
if($_SESSION['username']){
	if(isset($_POST['sil'])){
		$satirlar = file("mesajlar.txt");
		$liste = $_POST['sil'];
		foreach($satirlar as $sira => $satir){
			if (preg_match("/\b($liste)\b/", $satir))
			{ 
				unset($satirlar[$sira]);
				break;
			}
		}
		file_put_contents("mesajlar.txt", implode("", $satirlar));
		header('Location: mesajlar.php'); 
	}
	else{
		header('Location: mesajlar.php');
	}
}
else{
	header('Location: index.php'); 
}
?>    