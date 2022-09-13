<?php
        include_once('../models/functions.php');
        include_once('../models/CommandClass.php');

    if(isset($_GET['id_product'])){

        deleteProduct($_GET['id_product']);

    }
?>