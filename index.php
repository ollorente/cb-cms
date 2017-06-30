<?php

	include('includes/conn.php');

	session_start();

	if(isset($_REQUEST['user'])){
		$_SESSION['user']=$U;
		header('location:inicio.php');
	}

	if(isset($_REQUEST['U']) && !empty($_REQUEST['U'])){ 
		$U=$_REQUEST['U'];
		$P=$_REQUEST['P'];
		$siesta=mysql_num_rows(mysql_query("SELECT * FROM usuarios WHERE usuario = '".$U."' AND cb_claveusuario = '".$P."'"));
		if($siesta==1){
			$_SESSION['user']=$U;
			header('location:inicio.php');
		} else {
			$alert='Usuario o contraseña incorrectos!';
			$alert_color='danger';
		}
	}

	if(isset($_REQUEST['user'])  && !empty($_REQUEST['user'])){
		$U=$_REQUEST['user'];
		$P=$_REQUEST['pass'];
		$N=$_REQUEST['nombre'];
		$F=$_FILES['foto']['name'];
		$T=$_REQUEST['tipo'];
		$checar=mysql_num_rows(mysql_query("SELECT * FROM usuarios WHERE usuario = '".$U."'"));
		if($checar==1){
			$alert='Ya estás registrado!';
			$alert_color='danger';
		} else {
			mysql_query("INSERT INTO usuarios VALUES('".$U."', '".$P."', '".$N."', '".$U."', '".$T."')");
			move_uploaded_file($_FILES['foto']['tmp_name'], "images/avataruser/".$U.".jpg");
			header('location:index.php');
			$alert='Se registró con éxito!';
			$alert_color='success';
		}
	}

	include('includes/configuration.php');
	include('tmpl/default/index.php');
?>
