<?php


if(count($_POST)>0){
	$is_admin=0;
	if(isset($_POST["is_admin"])){$is_admin=1;}
	$user = new UserData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	//$user->is_admin=$is_admin;//
	$user->is_admin = isset($_POST['is_admin']) ? 1 : 2; // Si está marcado, es 1 (admin), sino es 2 (paciente)
	$user->password = sha1(md5($_POST["password"]));
	$user->add();

print "<script>window.location='index.php?view=users';</script>";


}


?>