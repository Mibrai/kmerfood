<?php
    include_once('../models/functions.php');
    include_once('../models/ProductClass.php');

    if(isset($_GET['name'])){
        $product = getProductByName($_GET['name']);

        if($product->getName() != null){
            echo"
           <!-- <div class='alert alert-danger' role='alert'>
                un produit du nom ".$product->getName()." existe deja    <img src='../".$product->getImagePath()."' alt='loading...' />
            </div> -->

          <div aria-live='polite' aria-atomic='true' style='position: relative; min-height: 200px;'>
            <div class='toast' data-autohide='false' style='position: absolute; top: 0; right: 0;'>
                <div class='toast-header'>
                <img src='...' class='rounded mr-2' alt='...'>
                <strong class='mr-auto'>Bootstrap</strong>
                <small>11 mins ago</small>
                <button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                <div class='toast-body'>
                Hello, world! This is a toast message.
                </div>
            </div>
            </div>
            ";
        }else{
            echo"
            <div class='alert alert-success' role='alert'>
                Nom du produit valide  <img src='../images/good.png' alt='loading...' />
            </div>
            ";
        }
    }
?>