<?php
        include_once('../models/functions.php');
        include_once('../models/CommandClass.php');

    if(isset($_GET['id_cmd']) && ($_GET['status']) && ($_GET['delivry'])){

        updateStatusCommand($_GET['id_cmd'],$_GET['status'],$_GET['delivry']);

    }
?>