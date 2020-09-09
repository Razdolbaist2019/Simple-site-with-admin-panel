<?php 
require_once("include/session_activ.php");
require_once("include/config.php");
require_once("classes/class.user.php");
require_once("include/function.php");
require_once("classes/class.menu.php");
require_once("classes/class.main.php");
require_once("classes/class.pages.php");
require_once("classes/class.admfunc.php");

if(!isset($_SESSION['id'])){
    //echo "Пошел нафиг!";
    //return 0;
     header('Location:index.php');
}else{


$dbase=Connect_db($host,$dbuser,$dbpass,$dbname);
mysql_query("SET NAMES utf8",$dbase);

ini_set('log_errors', 'On');
ini_set('error_log', 'php_errors.log');

$id=$_SESSION['id'];
//echo "<br>id=".$id;
$login=$_SESSION['login'];
//echo "<br>login=".$login;
$st_id=$_SESSION['status_id'];
//echo "<br>st_id=".$st_id;

?>
<!DOCTYPE HTML>
<html>
    
    <head>
        <title><?php echo $site_title; ?></title>
        <link href="/css/style.css" rel="stylesheet" type="text/css" />  
        
           <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php    
            $adm=new TAdminBlock;
            $adm->InitAdminBlock();
        ?>
        
        <style>
        
         @font-face {
            font-family: a_BighausTitulBrkHil; /* Гарнитура шрифта */
            src: url(fonts/a_BighausTitulBrkHil.TTF); /* Путь к файлу со шрифтом */
         }
        h1 {
            font-family: a_BighausTitulBrkHil.TTF, 'Comic Sans MS', cursive;
        }
        
        </style>
             
    </head>
    
    <body>
    
    <div id="admcontainer">
        <header id="admheader">
        
        
        <?php 
if(!$_GET['make']=='activation'){
?>   

<table border=0 width=100% cellpadding=0 cellspacing=0>
<tr>
<td>

 <?php $adm->get_count_user_activation(1);?>

</td>
<td>

<?php $adm->get_count_user_activation(0);?>  

</td>
</tr>
</table>

<?php
}


                        if($_GET['make']=='activation'){	
                            $adm->activation_user($_GET["act"]);
                        }
            
                        if($_GET['make']=='deactivation'){	
                            $adm->deactivation_user($_GET["deact"]);
                        }



?>
             
                <div id="form_main">
       
                    <?php                         
                            echo "                                
                                <a href='/index.php'>Вернуться к учебнику</a>
                                <br><a href='exit.php'>Выход</a>
                            ";
                    ?>  
              
                </div>              
                
        </header>
                
        <main>        
                    <div id="top_menu">
                        <?php 

                        ?>
                    </div>
                    
                    
                         
                   
                    
                    <div id="admleft_menu">
                    
                        <?php                                                           
                            $adm->adm_menu();
                        ?>
                    </div>
                    
                    <div id="admcontent">
                        
                        <?php                          
                              $adm->admin_pagecontent();                                                                                                                                                       
                        ?>                       
                    </div>
                   
                    
                    
                    
        </main>       
    
        <footer id="admfooter">
        
        </footer>
    
    </div>

    </body>

</html>

<?php
}
?>