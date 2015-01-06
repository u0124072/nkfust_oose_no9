<?php session_start();
	//將session清空
	// unset($_SESSION['ID']);
	// unset($_SESSION['name']);
	session_destroy();//此方法會將全部的 session 清除
	header('Location:../index.php');//導向首頁
?>