<?php
        include_once('../models/functions.php');
        include_once('../models/CommandClass.php');

        //push command
         if(isset($_GET['mail']) && ($_GET['phone']) && ($_GET['adresse']) && ($_GET['qty']) && ($_GET['id_product']) ){
            $command = new CommandClass();
            $command->setClientName($_GET['nom']);
            $command->setMail($_GET['mail']);
            $command->setAdresse($_GET['adresse']);
            $command->setTelefone($_GET['phone']);
            $command->setQtyCmd($_GET['qty']);
            $command->setStatus("En Attente");
            $command->setIdProduct($_GET['id_product']);
            $command->setPriceCmd($_GET['current_price']);

         $command->_push();
        }

?>