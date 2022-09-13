<?php 
    include_once('../models/functions.php');
    include_once('../models/CommandClass.php');
    include_once('../models/ProductClass.php');
?>
<div class="container-fluid" id="container_list_command">
    
    <div class="row justify-content-center" id="row_title_cathegorie">
        <div class="col-md-12">

            <div class="alert alert-primary" role="alert">Liste des Produits</div>

        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 align-self-center" id="col_list_product">
         <table class="table" id="tb_list_command">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Ancien prix</th>
                        <th scope="col">Prix actuel</th>
                        <th scope="col">Qte en stock</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                        $listProduct = getAllProduct();
                        $counter = count($listProduct) -1;

                        for($i = 0; $i <= $counter; $i++){
                            $product = $listProduct[$i];
                            echo "
                            <tr id='tr_cmd' data-toggle='modal' data-target='#modal".$product->getId()."'>
                                <td scope='row'>".$product->getId()."</td>
                                <td><img src='../images/".$product->getImagePath()."' alt='Image' /></td>
                                <td>".$product->getName()."</td>
                                <td>".$product->getOldPrice()."</td>
                                <td>".$product->getCurrentPrice()."</td>
                                <td>".$product->getCurrentQty()."</td>
                            </tr>
                            
                            <!-- Modal -->
                            <div class='modal fade' id='modal".$product->getId()."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                            <div class='modal-dialog  modal-dialog-centered' role='document'>
                                <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='exampleModalCenterTitle'><img src='../images/images/commande.png' alt='' /> Article : ".$product->getName()."</h5>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                <div class='modal-body' id='modal_update_command'>
                                    <p> <button type='button' class='btn btn-light' data-toggle='tooltip' data-placement='bottom' title='Supprimer le produit ".$product->getName()."' onclick='deleteProduct(".$product->getId().")'><img src='../images/delete.png' alt='' /></button>  </p>
                                    <form>

                                        <div class='form-row'>
                                            <div class='form-group col-md-12'>
                                                <label for='old_price".$product->getId()."'>Ancien Prix</label>
                                                <input type='number' step='0.01' id='old_price".$product->getId()."' name='old_price' class='form-control' placeholder='0.0'>
                                            </div>
                                        </div>

                                        <div class='form-row'>
                                            <div class='form-group col-md-12'>
                                                <label for='new_price".$product->getId()."'>Nouveau Prix</label>
                                                <input type='number' step='0.01' id='new_price".$product->getId()."' name='new_price' class='form-control' placeholder='0.0'>
                                            </div>
                                        </div>

                                        <div class='form-row'>
                                            <div class='form-group col-md-12' id='col_result".$product->getId()."'>
                                                <button type='button' class='btn btn-primary' onclick='updateProduct(".$product->getId().")'>Enregistrer</button>
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
