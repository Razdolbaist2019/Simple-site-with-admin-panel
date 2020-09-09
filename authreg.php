<?php 
require_once("include/session_activ.php");
require_once("include/config.php");
require_once("classes/class.user.php");
require_once("include/function.php");
require_once("classes/class.menu.php");
require_once("classes/class.main.php");


$dbase=Connect_db($host,$dbuser,$dbpass,$dbname);
mysql_query("SET NAMES utf8",$dbase);

?>
<!DOCTYPE HTML>
<html>
    
    <head>
        <title><?php 
        if($_POST['go_reg']){
            echo $auth_page; 
        }else{
            if($_POST['go_log']){
                echo $reg_page;
            }
        }
        
        
        ?></title>
        <link href="/css/style.css" rel="stylesheet" type="text/css" /> 
        <?php
            echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        ?>
              
    </head>
    
    <body>
    
    <div id="container">
        <header id="header">
                
                <div id="form_main">
              
                    <?php 
                    if($_POST['go_reg']){
                        echo "Регистрация пользователя";
                        }else{
                            if($_POST['go_log']){
                                echo "Авторизация пользователя";
                            }
                        }
                        
                    ?>  
              
                </div>              
                
        </header>
                
        <main>        
                    <div id="top_menu">
                        <?php 
                            
                            
                        ?>
                    </div>
                    
                    <div id="left_menu">
                        <?php
                             
                            
                        ?>
                    </div>
                    
                    <div id="content">
                        <?php    
                            
                           $user=new TUser;
                            if($_POST['go_log']){
                                
                                echo "<div id='authreg'>Добро пожаловать!</div>";
                                
                                
                                $user->Autorization($_POST['usr_log'],$_POST['usr_pass']);
                                
                            }else{
                                if($_POST['go_reg']){
                                $user->RegisterNewUser($_POST['fam'],$_POST['name'],$_POST['otch'],$_POST['log'],$_POST['pass']);
                                
                                    
                                }
                            }
                                                                                              
                        ?>                       
                    </div>
        </main>       
    
        <footer id="footer">
        
        </footer>
    
    </div>

    </body>

</html>

<?php
//}
?>