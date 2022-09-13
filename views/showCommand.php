<?php 
    include_once('../models/functions.php');
    include_once('../models/CommandClass.php');
    include_once('../models/ProductClass.php');
?>
<div class="container-fluid" id="container_list_command">
    
    <div class="row justify-content-center" id="row_title_cathegorie">
        <div class="col-md-12">

            <div class="alert alert-primary" role="alert">Liste des Commandes</div>

        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 align-self-center">
         <table class="table" id="tb_list_command">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Client</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Possible livraison</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                        $listCommand = getListAllCommand();
                        $counter = count($listCommand) -1;

                        for($i = 0; $i <= $counter; $i++){
                            $command = $listCommand[$i];
                            $product = getProductById($command->getIdProduct());
                            echo "
                            <tr id='tr_cmd' data-toggle='modal' data-target='#modal".$command->getId()."'>
                                <th scope='row'>".$command->getId()."</th>
                                <td>".$command->getClientName()."</td>
                                <td>".$command->getTelefone()."</td>
                                <td>".$command->getMail()."</td>
                                <td>".$command->getAdresse()."</td>
                                <td>".$product->getName()."</td>
                                <td>".$command->getQtyCmd()."  ".$product->getUnity()."</td>
                                <td>".$command->getDateDelivry()."</td>
                                <td>".$command->getStatus()."</td>
                            </tr>
                            
                            <!-- Modal -->
                            <div class='modal fade' id='modal".$command->getId()."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                            <div class='modal-dialog  modal-dialog-centered' role='document'>
                                <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='exampleModalCenterTitle'><img src='../images/images/commande.png' alt='' /> Commande N° ".$command->getId()."</h5>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                <div class='modal-body' id='modal_update_command'>
                                    <form>

                                        <div class='form-row'>
                                            <div class='form-group col-md-12'>
                                                <label for='delivryDate'>Possible date de Livraison</label>
                                                <input type='date' id='delivry".$command->getId()."' name='delivry' class='form-control' id='delivryDate' placeholder='YYYY-mm-dd'>
                                            </div>
                                        </div>

                                        <div class='form-row'>
                                            <div class='form-group col-md-12'>
                                                <label for='status'>Status de la commande</label>
                                                <select name='status' class='form-control' id='status".$command->getId()."'>
                                                    <option value='".$command->getStatus()."'>".$command->getStatus()."</option>
                                                ";
                                                //list status
                                                    getListStatus($command->getStatus());
                                                echo"</select>
                                            </div>
                                        </div>

                                        <div class='form-row'>
                                            <div class='form-group col-md-12' id='col_result".$command->getId()."'>
                                                <button type='button' class='btn btn-primary' onclick='updateCommand(".$command->getId().")'>Enregistrer</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'><img src='../images/close.png' alt='' /></button>
                                </div>
                                </div>
                            </div>
                            </div>

                            ";
                        }

                ?>
                </tbody>
                </table>
        </div>
    </div>

</div>
