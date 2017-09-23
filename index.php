<!DOCTYPE HTML>
<!--EzGallery is created by Eli Adelhult. (http://jxz.se) -->
<html>
<head>
<link rel=stylesheet type=text/css href=style.css>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel=stylesheet>
<meta name=theme-color content=#f0f0f0>
<style>body{background:#f0f0f0;font-family:arial;margin:0;padding:0;-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.pageWrapper{position:relative;margin-left:auto;margin-right:auto}#custom{max-width:100%;overflow-x:hidden}#multi-container{position:relative;margin-left:auto;margin-right:auto;margin-top:50px;width:880px}.imageHolder{background:#d7d7d7;position:relative;width:200px;height:200px;padding:0;float:left;margin:10px;transition:all .2s;cursor:zoom-in;background-position:center;background-size:cover;background-repeat:no-repeat;transition:all .2s}.image-data{font-family:arial;position:fixed;color:#acacac;bottom:25px;right:25px;font-weight:bold;z-index:200;background:#f0f0f0;padding:5px;border-radius:2px}.large-image{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);max-height:85%;max-width:100%;animation:appear .2s}.icon-container{position:fixed;right:15px;bottom:15px;z-index:100}.icons{display:inline-block;cursor:pointer}.icons .material-icons{font-size:35px;color:#959595;transition:.2s}#arrow-back,#arrow-forward{position:fixed;left:15px;top:50%;transform:translate(0,-50%);width:65px;height:65px;background:#cdcdcd;z-index:200;border-radius:50px;transition:background .2s;font-size:65px;color:#2f2f2f;text-decoration:none;box-shadow:0 1px 2px rgba(0,0,0,.48)}#arrow-back:hover,#arrow-forward:hover{background:#b0b0b0}#arrow-forward{left:inherit;right:15px}@media(max-width:880px){#multi-container{width:100%;margin:0}.imageHolder{width:calc(50vw -(50vw - 50%));height:0;padding-bottom:calc(50vw -((100vw - 100%)/2));margin:0}}@media(max-width:750px){#arrow-back,#arrow-forward{bottom:20px;top:inherit;transform:none}.icon-container{right:50%;bottom:25px;transform:translateX(50%);background:rgba(240,240,240,1);border-radius:2px;padding:5px}.icons{margin-left:5px;margin-right:5px}.icons .material-icons{color:#707070}}@media(max-width:750px) and (orientation:landscape){#arrow-back,#arrow-forward{position:fixed;left:15px;top:50%;transform:translate(0,-50%)}#arrow-forward{left:inherit;right:15px}.icon-container{right:50px;top:15px;transform:translateX(50%)}.large-image{max-height:100%;max-width:85%}.icons{display:block}}@keyframes appear{from{opacity:0;margin-top:60px}to{opacity:1;margin-top:0}}@keyframes appear2{0%{opacity:0}to{opacity:1}}</style>
<title>EzGallery</title>
<meta charset=utf-8>
</head>
<body>
<div class=pageWrapper>
<?php
    $i = 0;
    $directory = "images/";
    $images = glob("$directory*.{jpg,JPG,gif,png,PNG}", GLOB_BRACE);

    if($_GET[d] == NULL){
      $current_img = -1;
    }else{
      $current_img = $_GET[d];
    }

    if($current_img == -1){

      if(file_exists("ezgallery-cover.php")){
        echo"<div id=custom>";
        include'ezgallery-cover.php';
        echo"</div>";
      }else{
        $current_img = 0;
      }

    }if($current_img >= 0){
      echo "<img class=large-image src=" . str_replace(' ', '%20', $images[$current_img])  . "><br>";
      echo "<div class=icon-container><a  href=?d=-1><div class=icons><i class=material-icons>home</i></a></div>";
      echo "<a  href=?d=-2><div class=icons><i class=material-icons>apps</i></a></div></div>";
    }

    if($current_img > 0 || $current_img == 0 and file_exists("ezgallery-cover.php")){
      echo"<a href=?d=" . ($current_img - 1) . "><i id=arrow-back class=material-icons>keyboard_arrow_left</i></a>";
    }

    if($current_img < count($images) - 1 && $current_img > -2){
      echo"<a href=?d=" . ($current_img + 1) . "><i id=arrow-forward class=material-icons>keyboard_arrow_right</i></a>";
    }

    if($current_img == -2){
      echo"<div id=multi-container>";
      foreach($images as $image_string){
        $image = str_replace(' ', '%20', $image_string);
        echo"<a href=?d=" . $i ." >";
        echo"<div class=imageHolder style=\"background-image:url($image); animation: appear2 " . (0.04 * $i + 0.2 ) . "s;\" >";
        echo"</div></a>";
        $i++;
      }
      echo"</div>";
    }

  ?>
</div>
</body>
</html>
