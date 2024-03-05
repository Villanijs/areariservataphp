<?php 
spl_autoload_register(function($class){
    include_once("classi/".$class.".class.php");
}); 
?>