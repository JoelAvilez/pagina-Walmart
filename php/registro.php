<?php

if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["apellido"]) &&isset($_POST["username"]) &&isset($_POST["email"]) &&isset($_POST["password"]) &&isset($_POST["confirm_password"])){
		if($_POST["nombre"]!=""&& $_POST["apellido"]!=""&&$_POST["username"]!=""&&$_POST["email"]!=""&&$_POST["password"]==$_POST["confirm_password"]){
			include "conexion.php";
			
			$found=false;
			$sql1= "select * from user where username=\"$_POST[username]\" or email=\"$_POST[email]\"";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$found=true;
				break;
			}
			if($found){
				print "<script>alert(\"Nombre de usuario o email ya estan registrados.\");window.location='../registro.php';</script>";
			}
			$sql = "insert into user(nombre,apellido,username,email,password,created_at) value (\"$_POST[nombre]\",\"$_POST[apellido]\",$_POST[username]\",\"$_POST[email]\",\"$_POST[password]\",NOW())";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Registro exitoso. Proceda a logearse\");window.location='../login.php';</script>";
			}
		}
	}
}



?>