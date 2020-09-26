<?php
    session_start();
    //ini_set("display_errors","off");
    include_once('models/functions.php');
    include_once('models/ProductClass.php');
    include_once('models/CathegorieClass.php');
    include_once('models/CommandClass.php');
?>
<html>
    <head>
         <meta charset = "utf-8" /> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="design/design3.css">
        <script src="js/script.js"></script>
        <script src="js/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    
    <title>Kmer food</title>
    <link rel="icon" href="images/logo.jpeg" type="image/icon type">
    </head>
<body>
    
    <div class="container-fluid">

    <div class="row" >
            <div class="col-lg-12" id="col_navbar">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"><img src="images/logo.jpeg" alt="logo kmer food "/> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Acceuil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Ingredients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Pre-faits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Traiteurs</a>
                    </li>
                    </ul>

                    <!--  login btn -->
                   <!-- Button trigger modal -->
                        <?php
                                if(!isset($_SESSION['id_user']))
                                    echo "<a href='#' class='btn btn-light' data-toggle='modal' data-target='#modalLogin'> <img src='images/login.png' alt='login button '/> </a>";
                                else{
                                        echo"
                                        <div class='dropdown' id='btn_group_info'>
                                          <button type='button' class='btn btn-light dropdown-toggle' data-toggle='dropdown' id='dropdownMenuButton' aria-haspopup='true' aria-expanded='false'>
                                          ".$_SESSION['surname_user']." <img src='images/user48.png' alt='User icone '/> 
                                          </button>
                                          <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                            <a class='dropdown-item disabled' href='views/profil.php'>Infos User</a>
                                            <a class='dropdown-item' href='views/productView.php'>Gerer les Produits</a>
                                            <a class='dropdown-item disabled' href='views/commandView.php'>Gerer les commandes</a>
                                            <div class='dropdown-divider'></div>
                                            <a class='dropdown-item' href='controller/disconnect.php'><img src='images/logout.png' alt='logout icone '/>Se deconnecter</a>
                                          </div>
                                        </div>
                                        ";
                                }

                        ?>

                        <!-- Modal -->
                        <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLoginTitle"><img src="images/user.png" alt="User "/>  Se connecter !</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="modal_connect">
                                
                                <form action="controller/controlConnect.php" name="form_login" method="POST">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                        <label for="validationDefaultUsername">Login</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend2"><img src="images/login_icone.PNG"></img></span>
                                            </div>
                                            <input type="text" class="form-control" name="login" id="login" placeholder="Benutzername" aria-describedby="inputGroupPrepend2" required>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationDefaultUsername">Mot de passe</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend2"><img src="images/password_icone.PNG"></img></span>
                                            </div>
                                            <input type="password" class="form-control" name="password" id="password"  aria-describedby="inputGroupPrepend2" required>
                                        </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-light" id="submit" type="submit"><img src="images/connect.png" alt="go "/></button>
                                </form>


                            </div>
                            <div class="modal-footer">
                                <!--  php error message from connect here  -->
                                <?php
                                        if(isset($_GET['empty']))
                                            echo"<div class='alert alert-warning' role='alert'>Veuillez remplir tous les champs .</div> ";
                                ?>
                            </div>
                            </div>
                        </div>
                        </div>
                    <!-- end modal login -->
                </div>
                </nav>

            </div>
        </div>

    </div>

    <div class='container-fluid' id='container_slide'>
        <div class='col-lg-12'>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="images/logo2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="images/logo3.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="images/WhatsApp Image 2020-08-19 at 15.31.48.jpeg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="container_menu_y">

       <!-- <div class="row" id="row_y">
            <div class="col-1">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Ingredients <img src="images/ingrediens.png" /></a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Pre-faits <img src="images/dish.png" /></a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Traiteurs <img src="images/cook.png" /></a>
                </div>
            </div> 
            <div class="col-11">
                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                         Ingredients content -->
                        <div class="container-fluid" id="container_menu">
                            <div class="row justify-content-md-center">
                                <div class="col-xl-12">

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <?php 
                                    $listCathegorie = getAllCathegorie();
                                    $count = count($listCathegorie) -1;
                                    for($i = 0; $i <= $count; $i++){
                                        $id = explode(" ",$listCathegorie[$i]->getLabel());
                                        $id = $id[0]."".$listCathegorie[$i]->getId();
                                        if($i == 0)
                                            echo "
                                                <li class='nav-item'>
                                                    <a class='nav-link active' id='".$id."-tab' data-toggle='tab' href='#".$id."' role='tab' aria-controls='".$id."' aria-selected='true'>".$listCathegorie[$i]->getLabel()."</a>
                                                </li>
                                            ";
                                        else
                                            echo "
                                                <li class='nav-item'>
                                                    <a class='nav-link' id='".$id."-tab' data-toggle='tab' href='#".$id."' role='tab' aria-controls='".$id."' aria-selected='false'>".$listCathegorie[$i]->getLabel()."</a>
                                                </li>
                                            ";
                                    }
                                ?>
                                    </ul>

                                    <div class="tab-content" id="myTabContent">
                                    <?php 
                                            $listCathegorie = getAllCathegorie();
                                            $count = count($listCathegorie) -1;
                                            for ($i = 0; $i <= $count; $i++) {
                                                $id = explode(" ", $listCathegorie[$i]->getLabel());
                                                $id = $id[0]."".$listCathegorie[$i]->getId();

                                                if($i == 0)
                                                    echo "
                                                        <div class='tab-pane fade show active' id='".$id."' role='tabpanel' aria-labelledby='".$id."-tab'> 
                                                        <div class='container'>
                                                    ";
                                                else
                                                    echo "
                                                        <div class='tab-pane fade' id='".$id."' role='tabpanel' aria-labelledby='".$id."-tab'> 
                                                        <div class='container'>
                                                    ";
                                                //list of product here
                                                $listProduct = getProductByCathegorie($listCathegorie[$i]->getId());
                                                $counter = count($listProduct) -1;
                                                $x = 0;
                                                //create first row
                                                echo "<div class='row'>";
                                                if($counter < 0){

                                                    echo"
                                                        <div class='col-md-12 align-self-center' id='col_empty'> <img src='images/load.gif' alt='Cathegorie vide ' />  Les Produits de cette cathegorie sont en cours de chargement et seront bientot disponible !!  <img src='images/load.gif' alt='Cathegorie vide ' /></div>
                                                    </div>";
                                                }

                                                for($y = 0; $y <= $counter; $y++){
                                                    $product = $listProduct[$y];
                                                    $x ++;
                                                    if($x <= 3){
                                                        //Add cols
                                                        echo "
                                                            <div class='col'>
                                                            <div class='card' style='width: 18rem;'>
                                                            <img src='".$product->getImagePath()."' class='card-img-top' alt='Image product'>
                                                            <div class='card-body'>
                                                                <h5 class='card-title'><del>".$product->getOldPrice()." €</del> <span><img src='images/poids.png' alt=' loading... '/> 1kg</span> <img src='images/love.png' alt=' loading... '/></h5>
                                                                <p class='card-text'>".$product->getCurrentPrice()."  <img src='images/prix.png' alt=' loading... '/></p>
                                                                <a href='#' class='btn btn-outline-info' data-toggle='modal' data-target='#".$product->getId()."'>commander <img src='images/cart.png' alt=' loading... '/></a>
                                                            </div>
                                                            </div>
                                                            </div>

                                                         ";

                                                         //Modal by product
                                                         echo " 
                                                            <div class='modal fade' id='".$product->getId()."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                                                <div class='modal-dialog modal-lg modal-dialog-centered' role='document'>
                                                                <div class='modal-content' id='modal_command'>
                                                                    <div class='modal-header'>
                                                                    <h5 class='modal-title' id='exampleModalCenterTitle'><img src='images/cart+.png' alt=' ' /> Commander le produit <img src='images/next.png' alt=' :: ' /> ".$product->getName()." </h5>
                                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                        <span aria-hidden='true'>&times;</span>
                                                                    </button>
                                                                    </div>
                                                                    <div class='modal-body'>

                                                                        <div class='container-fluid'>
                                                                            <div class='row' id='row_y_modal'>

                                                                                <div class='col-md-4'>
                                                                                    <div class='nav flex-column nav-pills' id='v-pills-tab' role='tablist' aria-orientation='vertical'>
                                                                                        <a class='nav-link active' id='v-pills-instant".$product->getId()."-tab' data-toggle='pill' href='#v-pills-instant".$product->getId()."' role='tab' aria-controls='v-pills-instant".$product->getId()."' aria-selected='true'>Instantanée <img src='images/phone.png' /></a>
                                                                                        <a class='nav-link' id='v-pills-differe".$product->getId()."-tab' data-toggle='pill' href='#v-pills-differe".$product->getId()."' role='tab' aria-controls='v-pills-differe".$product->getId()."' aria-selected='false'>Normal <img src='images/dauert.png' /></a>
                                                                                    </div>
                                                                                </div>

                                                                                <div class='col-md-8'>
                                                                                    <div class='tab-content' id='v-pills-tabContent'>

                                                                                        <div class='tab-pane fade show active' id='v-pills-instant".$product->getId()."' role='tabpanel' aria-labelledby='v-pills-instant".$product->getId()."-tab'>
                                                                                            <div class='alert alert-info' role='alert'> Passez votre commande directement par telephone au numero suivant </div>
                                                                                            <span><img src='images/handy.png' alt='Instant Command per Call :' /> +39 3511 81 88 08 </span>
                                                                                        </div>

                                                                                        <div class='tab-pane fade' id='v-pills-differe".$product->getId()."' role='tabpanel' aria-labelledby='v-pills-differe".$product->getId()."-tab'>

                                                                                            <form>
                                                                                                <div class='form-row'>

                                                                                                    <div class='form-group col-md-6'>
                                                                                                        <label for='inputNom'>Nom</label>
                                                                                                        <input type='text' name='nom' class='form-control' id='inputNom".$product->getId()."' placeholder='Nom'>
                                                                                                    </div>
                                                                                                    <div class='form-group col-md-6'>
                                                                                                        <label for='inputEmail'>Email</label>
                                                                                                        <input type='email' name='mail' class='form-control' id='inputEmail".$product->getId()."' placeholder='Email'>
                                                                                                    </div>

                                                                                                </div>

                                                                                                <div class='form-row'>

                                                                                                    <div class='form-group col-md-6'>
                                                                                                        <label for='inputAdress'>Adresse</label>
                                                                                                        <input type='text' name='adresse' class='form-control' id='inputAdress".$product->getId()."' placeholder='1234 Naple St'>
                                                                                                    </div>

                                                                                                    <div class='form-group col-md-6'>
                                                                                                        <label for='inputTelefone'>Telephone </label>
                                                                                                        <input type='text' name='telefone' class='form-control' id='inputTelefone".$product->getId()."' placeholder='+ 32 5984 6859 '>
                                                                                                    </div>

                                                                                                </div>

                                                                                                <div class='form-row'>
                                                                                                    <div class='form-group col-md-12'>
                                                                                                        <label for='inputQte'>Quantité</label>
                                                                                                        <input type='text' name='qty' class='form-control' id='inputQte".$product->getId()."' placeholder='Quantité de ".$product->getName()." desirée'>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class='form-row'>
                                                                                                    <div class='col-md-12' id='col_result'></div>
                                                                                                </div>

                                                                                                <div class='form-group'>
                                                                                                    <button type='button' class='btn btn-primary' onclick='saveCommand(".$product->getId().",".$product->getCurrentPrice().")'>Terminer</button>
                                                                                                </div>
                                                                                        
                                                                                             </form>

                                                                                         </div>

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class='modal-footer'>
                                                                    <button type='button' class='btn btn-light' data-dismiss='modal'><img src='images/close.png' alt='fermer' /></button>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                         ";


                                                    }

                                                    if($x == 3 || $y == $counter){
                                                        //close the previous row
                                                        echo "
                                                        </div>
                                                        ";
                                                    }

                                                    if($y != $counter && $x == 3){
                                                        //create new row
                                                        echo "
                                                            <div class='row'>
                                                        ";

                                                        $x = 0;
                                                    }
                                                
                                                }
                                                //end div tab-pane and container
                                                echo "
                                                    </div>    
                                                </div>";
                                            }
                                    ?>
                                    <!--  end tab autres -->
                                </div>

                                </div>
                            </div>
                        </div>
                  <!--  </div>

                </div>
            </div>
        </div>-->

    </div>


    <div class="container-fluid" id="container_banner">

        <div class="row justify-content-md-center">
            <div class="col-xl-12">
                <img src="images/banner.gif" alt="Bienvenue sut la plateform de Kmer food" />
            </div>
        </div>
    </div>

        <!-- Footer -->
        <footer class="page-footer font-small special-color-dark pt-4">

        <!-- Footer Elements -->
        <div class="container">

            <!-- Social buttons -->
            <ul class="list-unstyled list-inline text-center">
            <li class="list-inline-item">
                <a class="btn-floating btn-gplus mx-1" href="#">
                    <img src="images/instagram.png" /> @kamer_food_italia
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-li mx-1" href="#">
                    <img src="images/facebook.png" />#Kmer Food Officiel
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-dribbble mx-1" href="#">
                    <img src="images/whatsapp.png" /> +39 3511 81 88 08
                </a>
            </li>
            </ul>
            <!-- Social buttons -->

        </div>
        <!-- Footer Elements -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="http://kmerfood.online/">Kmer food</a>
        </div>
        <!-- Copyright -->

        </footer>
        <!-- Footer -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/mdb.min.js"></script>
        <!-- Plugin file -->
        <script src="./js/addons/datatables.min.js"></script>

        <script>
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
        </script>

</body>
</html>