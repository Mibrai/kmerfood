<?php
        session_start();
        include_once('../models/functions.php');
        include_once('../models/UserClass.php');
        if(isset($_POST['login']) && ($_POST['password'])){
            
            connect_form($_POST['login'],$_POST['password']);
            
        }else{
            header("Refresh:0; url='../index.php?empty=true' ");
        }
?>