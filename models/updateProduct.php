<?php
        include_once('../models/functions.php');
        include_once('../models/CommandClass.php');

    if(isset($_GET['id_product']) && ($_GET['old_price']) && ($_GET['new_price'])){

        $product = getProductById($_GET['id_product']);
        $product->setPrices($_GET['old_price'],$_GET['new_price']);

    }
?>