<?php 
require_once("include/session_activ.php");
require_once("include/config.php");
require_once("classes/class.user.php");
require_once("include/function.php");
require_once("classes/class.menu.php");
require_once("classes/class.main.php");
require_once("classes/class.pages.php");


$dbase=Connect_db($host,$dbuser,$dbpass,$dbname);
mysql_query("SET NAMES utf8",$dbase);

ini_set('log_errors', 'On');
ini_set('error_log', 'php_errors.log');

$id=$_SESSION['id'];
echo "<br>id=".$id;
$login=$_SESSION['login'];
echo "<br>login=".$login;
$st_id=$_SESSION['status_id'];
echo "<br>st_id=".$st_id;





?>
<!DOCTYPE HTML>
<html>
    
    <head>
        <title><?php echo $site_title; ?></title>
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
                        $user=new TUser;
                        if(!isset($id)){
                            $user->EditorUserAction();      //выводит форму авторизации/регистрации  
                        }else{                                                                  
                                $user->ViewUserOnId($id,$login); //выводит данные авторизованного пользователя
                            }
                    ?>  
              
                </div>              
                
        </header>
                
        <main>        
                    <div id="top_menu">
                        <?php                                                         
                            $menu = new TMenu;   
                            if((!isset($id))&&(!isset($st_id))){                                                                                                                                   
                            $menu->ViewMainMenuSel(0,$dbmenutable); //выводит верхнее главное меню учебника
                            }else{
                              $menu->ViewMainMenuSel(1,$dbmenutable);  //выводит меню авторизованного пользователя с учетом его статуса
                            }                                                        
                        ?>
                    </div>
                    
                    
                         
                   
                    
                    <div id="left_menu">
                        <?php
                            $content= new TContentSite;
                            if((!$id)&&(!$st_id)){                           
                            $menu->ViewPodmenuSel(0);
                            }else{
                                $menu->ViewPodmenuSel(1); 
                            }
                            
                        ?>
                    </div>
                    
                    <div id="content">                                                                                        
                    
                        <?php                                
                            if((!$id)&&(!$st_id)){  
                                        //$content->Init();                               
                                        //$content->ViewTextArticle(1); 
                                        echo '<p id="main_title">
                                        Уважаемые посетители сайта!<br>
                                        Добро пожаловать в электронный 
                                        учебник ГБПОУ ППК имени Н. Г. Славянова.<br>
                                        Данный ресурс доступен только студентам и преподавателям колледжа.
                                        Доступ осуществляется по логину и паролю.<br>
                                        Если у вас еще нет логина и пароля,то вы можете зарегистрироваться,
                                        нажав на ссылку "Регистрация",которая находится вверху сайта.<br>
                                        После регистрации, администратором сайта производится проверка ваших 
                                        данных и, в зависимости от их подтверждения вам присваивается статус
                                        "Студент" либо "Преподаватель". <br>
                                        После этого,используя указанные вами при регистрации логин и пароль 
                                        вы сможете получить доступ к электронному учебнику и своему профилю.
                                        </p>
                                        ';
                                        
                                        }
                                        else{        
                                            
                                            $pages=new TPageReactor;
                                            $pages->InitPluginVars();
                                            //$pages->Is_Page();
                                            //$pages->Is_Page_Test($st_id);
                                            //$pages->user_pagearticle($st_id);
                                            $pages->ViewTextArticleTest($id,$st_id);
                                            
                                                                                                                                                                                                                      
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