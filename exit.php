<?php
require_once("include/session_activ.php");
//require_once("include/config.php"); // ����������� ������������
//require_once("include/function.php"); // ����������� �������
setcookie("id","",time()-3600);
setcookie("login","",time()-3600);
setcookie("status_id","",time()-3600);
unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['status_id']);  
header('Location:index.php');
//session_destroy();
?>

