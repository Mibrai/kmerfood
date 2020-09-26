<?php
        include_once('../models/functions.php');
        include_once('../models/CathegorieClass.php');

    if(isset($_GET['name_cathegorie'])){

        $cathegorie = new CathegorieClass();
        $cathegorie->setLabel($_GET['name_cathegorie']);

        $cathegorie->_push();

    }
?>