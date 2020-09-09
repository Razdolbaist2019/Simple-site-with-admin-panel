<?php
require_once("include/session_activ.php");
require_once("include/config.php");

if(!isset($_SESSION['id'])){
    //echo "Пошел нафиг!";
    //return 0;
     header('Location:index.php');
}else{

?>
<!DOCTYPE HTML>

<html>
    
    <head>
        <title><?php echo $admin_razdel; ?></title>
        <link href="/css/style.css" rel="stylesheet" type="text/css" /> 
        <?php
            echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        ?>
               
        <script type="text/javascript">
var array = new Array();
var speed = 10;
var timer = 10;

// Loop through all the divs in the slider parent div //
// Calculate seach content divs height and set it to a variable //
function slider(target,showfirst) {
  var slider = document.getElementById(target);
  var divs = slider.getElementsByTagName('div');
  var divslength = divs.length;
  for(i = 0; i < divslength; i++) {
    var div = divs[i];
    var divid = div.id;
    if(divid.indexOf("header") != -1) {
      div.onclick = new Function("processClick(this)");
    } else if(divid.indexOf("content") != -1) {
      var section = divid.replace('-content','');
      array.push(section);
      div.maxh = div.offsetHeight;
      if(showfirst == 1 && i == 1) {
        div.style.display = 'block';
      } else {
        div.style.display = 'none';
      }
    }
  }
}

// Process the click - expand the selected content and collapse the others //
function processClick(div) {
  var catlength = array.length;
  for(i = 0; i < catlength; i++) {
    var section = array[i];
    var head = document.getElementById(section + '-header');
    var cont = section + '-content';
    var contdiv = document.getElementById(cont);
    clearInterval(contdiv.timer);
    if(head == div && contdiv.style.display == 'none') {
      contdiv.style.height = '0px';
      contdiv.style.display = 'block';
      initSlide(cont,1);
    } else if(contdiv.style.display == 'block') {
      initSlide(cont,-1);
    }
  }
}

// Setup the variables and call the slide function //
function initSlide(id,dir) {
  var cont = document.getElementById(id);
  var maxh = cont.maxh;
  cont.direction = dir;
  cont.timer = setInterval("slide('" + id + "')", timer);
}

// Collapse or expand the div by incrementally changing the divs height and opacity //
function slide(id) {
  var cont = document.getElementById(id);
  var maxh = cont.maxh;
  var currheight = cont.offsetHeight;
  var dist;
  if(cont.direction == 1) {
    dist = (Math.round((maxh - currheight) / speed));
  } else {
    dist = (Math.round(currheight / speed));
  }
  if(dist <= 1) {
    dist = 1;
  }
  cont.style.height = currheight + (dist * cont.direction) + 'px';
  cont.style.opacity = currheight / cont.maxh;
  cont.style.filter = 'alpha(opacity=' + (currheight * 100 / cont.maxh) + ')';
  if(currheight < 2 && cont.direction != 1) {
    cont.style.display = 'none';
    clearInterval(cont.timer);
  } else if(currheight > (maxh - 2) && cont.direction == 1) {
    clearInterval(cont.timer);
  }
}
</script>
 	
    <?php  //Это скрипт будет работать потом   ?>
     
  
        <?php

            require_once("include/function.php");            
            require_once("classes/class.menu.php");
            require_once("classes/class.main.php");
            require_once("classes/class.adm.php");
            require_once("classes/class.user.php");
            require_once("classes/class.pages.php");

            ///$id=$_SESSION['id'];

            //$login=$_SESSION['login'];                        

            $id=$_SESSION['id'];
            echo "<br>id=".$id;
            $login=$_SESSION['login'];
            echo "<br>login=".$login;
            $st_id=$_SESSION['status_id'];
            echo "<br>st_id".$st_id;


            $user = new TUser;
            $_SESSION['status']=$user->GetUserStID($id);
            $status=$_SESSION['status'];
            
            $dbase=Connect_db($host,$dbuser,$dbpass,$dbname);
            mysql_query("SET NAMES utf8",$dbase);
            
            ini_set('log_errors', 'On');
            ini_set('error_log', 'php_errors.log');
        ?>
    </head>
    
    <body onload="slider('slider',0)">
    
    <div id="container">
        <header id="header">
                <div id="form_main">
                    <?php
                    if(!isset($id)){                      
                        $user->EditorUserAction($id);
                    }
                    else{
                        $user->ViewUserOnIdAdmin($id,$login);   
                    }
                    ?>
                </div>
        </header>
        
  
        
        <main>        
                    <div id="top_menu">
                        <?php                                     
                            $menu = new TMenu;
                            if((!isset($id))&&(!isset($st_id))){                                                                                                                                   
                            //$menu->ViewMainMenuSel(1,$dbmenutable);
                            echo 'Авторизуйтесь для возможности редактирования учебника!';
                            }else{
                              $menu->ViewMainMenuSel(1,$dbmenutable);  
                            }
                        ?>
                    </div>
                    
                    <div id="left_menu">
                        <?php
                           $content= new TContentSite;
                            if((!$id)&&(!$st_id)){                           
                            $menu->ViewPodmenuSel(1);
                            }else{
                                $menu->ViewPodmenuSel(1); 
                            }                        
                        ?>
                    </div>
                    
                    <div id="content">
                        <?php  
                            
                            
                            
                            $myadm_content= new TAdminReactor;
                            $myadm_content->InitAdminReactor();
                            //$myadm_content->ViewAllContentForAdmin();                        
                                                        
                            //echo $myadm_content->WhoIsAddNSP($id);
                            //echo "Автор:".$myadm_content->OwnNSP(198); 
                            
                            $myadm_content->UpdateMainContent($_POST['main_article_text']);
                            
                            
                            $myadm_content->EditorMainArticle();
                              
                            
                            if (isset($del_article)) {
                                $myadm_content->DeleteArticle($del_article);
                            }
                            
                                                                        
                            $myadm_content->AddNewArticle();                                                            
                                                        
                            $myadm_content->UpdateCurrArticle();
                            
                            
                            
                                                        
                            $myadm_content->EditorPodmenuArticle();                                                         
                                                                                                                                   
                        ?>    
                        

        </main>       
    
        <footer id="footer">
        
        </footer>
    
    </div>



    </body>

</html>
<?php
}
?>