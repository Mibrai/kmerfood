<?php 
    include_once('../models/functions.php');
    include_once('../models/CathegorieClass.php');
?>
<div class="container-fluid" id="container_form_cathegorie">
    
    <div class="row justify-content-center" id="row_title_cathegorie">
        <div class="col-md-12">

            <div class="alert alert-primary" role="alert">Nouvelle Cathegorie !</div>

        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 align-self-center">

            <form action="" method="post">
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label for="label">Nom de la Cathegorie</label>
                    <input type="text" class="form-control" name="label" id="label" placeholder="Cathegorie" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                  </div>

                </div>
                <div class="form-row">
                    <div class="col-md-12 align-self-center" id="col_btn">
                        <button class="btn btn-primary" type="button" onclick="saveCathegorie()">Enregistrer</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6 align-self-center">

            <?php
                if(isset($_POST['label'])){
                    $cathegorie = new CathegorieClass();
                    $cathegorie->setLabel($_POST['label']);

                    $cathegorie->_push();
                }
            ?>

        </div>
    </div>

</div>
