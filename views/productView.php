<?php 
    session_start();
    include_once('../models/functions.php');
    include_once('../models/CathegorieClass.php');
    include_once('../models/ProductClass.php');
    include_once('../models/CommandClass.php');
    ini_set("display_errors","off");
    if(!isset($_SESSION['id_user']))
         header("Refresh:0; url='../index.php' ");
?>
<html>
    <head>
         <meta charset = "utf-8" /> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../design/design2.css">
        <script src="../js/script.js"></script>
        <script src="../js/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

         <script>
            $(document).ready(function(){
            $('.toast').toast('show');
            $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    
    <title>Kmer food</title>
    <link rel="icon" href="../images/logo.jpeg" type="image/icon type">
    </head>
<body>
<div class="container" id="container_form_cathegorie">
    
    <div class="row justify-content-md-center" >
        <div class="col-lg-12" id="col_navbar">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"><img src="../images/logo.jpeg" alt="logo kmer food "/> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Acceuil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" >Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" >Soldes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" >Contacts</a>
                    </li>
                    </ul>
                    <?php
                                if(!isset($_SESSION['id_user']))
                                    echo "<a href='#' class='btn btn-light' data-toggle='modal' data-target='#modalLogin'> <img src='../images/login.png' alt='login button '/> </a>";
                                else{
                                        echo"
                                        <div class='dropdown' id='btn_group_info'>
                                          <button type='button' class='btn btn-light dropdown-toggle' data-toggle='dropdown' id='dropdownMenuButton' aria-haspopup='true' aria-expanded='false'>
                                          ".$_SESSION['surname_user']." <img src='../images/user48.png' alt='User icone '/> 
                                          </button>
                                          <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                            <a class='dropdown-item disabled' href='profil.php'>Infos User</a>
                                            <a class='dropdown-item' href='productView.php'>Gerer les Produits</a>
                                            <a class='dropdown-item disabled' href='commandView.php'>Gerer les commandes</a>
                                            <div class='dropdown-divider'></div>
                                            <a class='dropdown-item' href='../controller/disconnect.php'><img src='../images/logout.png' alt='logout icone '/>Se deconnecter</a>
                                          </div>
                                        </div>
                                        ";
                                }

                        ?>
                </div>
            </nav>

        </div>
    </div>


    <div class="row justify-content-center" id="row_title_cathegorie">
        
        <div class="col-md-3" id="col_menu_left">
            <!-- col menu left -->
            <div class="list-group">
                <a href="productView.php" class="list-group-item list-group-item-action"><img src="../images/new.png" alt="logo kmer food "/>Ajouter Produit</a>
                <a href="#" class="list-group-item list-group-item-action" onclick="loadViewCategorie()" ><img src="../images/categorie.png" alt="logo kmer food "/>Créer Cathegorie</a>
                <a href="#" class="list-group-item list-group-item-action" onclick="loadListCommand()"><img src="../images/commande.png" alt="logo kmer food "/>Gérer Commandes 
                    <?php 
                         $listPending = getAllCommand("En Attente");
                        if(count($listPending) > 0)
                            echo "<span class='badge badge-primary badge-pill'>".count($listPending)."</span></a>";
                    ?>
                <a href="#" class="list-group-item list-group-item-action" onclick="loadListProduct()"><img src="../images/gerer.png" alt="logo kmer food "/>Gérer Produits </a>
            </div>

        </div>

        <div class="col-md-9" id="bloc_central">

            <div class="container-fluid">
                <!--  first row center / title  -->
                <div class="row justify-content-center">
                    <div class="col-md-12 align-self-center"><div class="alert alert-primary" role="alert">Nouveau produit !</div></div>
                </div>
                <!--  second row center / form -->
                
                <div class="row justify-content-center">
                    <div class="col-md-8 align-self-center">

                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="name" id="label_designation">Désignation</label>
                                <input type="text" class="form-control" name="name" id="nom" placeholder="nom du produit" onblur="checkIfExist(this.value)" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="old_price">Ancien prix</label>
                                <input type="text" class="form-control" name="old_price" id="old_price" placeholder="0.0€"  required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="current_price">Prix actuel</label>
                                    <input type="text" class="form-control" name="current_price" id="current_price" placeholder="0.0€"  required>
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="old_qty">Quantité</label>
                                <input type="text" class="form-control" name="old_qty" id="old_qty" placeholder="0" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="unity">Unité</label>
                                <select  name="unity" id="unity" class="form-control">
                                    <option value="kg" selected>Kilogramme</option>
                                    <option value="L">Litre</option>
                                    <option value="unity">unité</option>
                                </select>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="description du produit..." required></textarea>
                            </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                <label for="command_url">Lien d'achat</label>
                                <input type="text" class="form-control" name="command_url" id="command_url" placeholder="https://" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                <label for="cathegorie">Cathegorie</label>
                                <select name="cathegorie" id="cathegorie" class="form-control">
                                        <?php loadAllCathegorie(); ?>
                                </select>
                                </div>
                                <div class="col-md-5 mb-3">
                                <label for="image_path">Image Produit</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image_path" id="image_path" required>
                                        <label class="custom-file-label" for="image_path">Image</label>
                                    </div>

                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 align-self-center" id="col_btn">
                                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>


                <!-- end container central -->
            </div>
            

        </div>

        <!--  end col  -->
    </div>


    <div class="row justify-content-center">
        <div class="col-md-6 align-self-center">

            <?php
                if(isset($_POST['name']) && ($_POST['old_price']) && ($_POST['current_price']) && ($_POST['old_qty']) && ($_POST['unity']) && ($_POST['command_url']) && ($_POST['cathegorie']) && ($_FILES['image_path'])){
                    $product = new ProductClass();
                    static $upload_status = false;
                    static $file_name ="";
                    $product->setName($_POST['name']);
                    $product->setDescription($_POST['description']);
                    $product->setOldPrice($_POST['old_price']);
                    $product->setCurrentPrice($_POST['current_price']);
                    $product->setUnity($_POST['unity']);
                    $product->setInitQty($_POST['old_qty']);
                    $product->setCurrentQty($_POST['old_qty']);
                    $product->setCommandUrl($_POST['command_url']);
                    $product->setIdCathegorie($_POST['cathegorie']);
                    $product->setIdUser("AS123");

                    uploadImageProduct("../images/files/",$_FILES['image_path'] ,$product);

                }
            ?>

        </div>
    </div>

</div>

    <nav class="navbar fixed-bottom navbar-light bg-light" id="nav_footer">
    
           <!-- Footer -->
    <footer class="page-footer font-small special-color-dark pt-4">

        <!-- Footer Elements -->
        <div class="container">

            <!-- Social buttons -->
            <ul class="list-unstyled list-inline text-center">
            <li class="list-inline-item">
                <a class="btn-floating btn-gplus mx-1" href="#">
                    <img src="../images/instagram.png" /> @kamer_food_italia
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-li mx-1" href="#">
                    <img src="../images/facebook.png" />#Kmer Food Officiel
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-dribbble mx-1" href="#">
                    <img src="../images/whatsapp.png" /> +39 3511 81 88 08
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

    </nav>

    <!-- Footer -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <!-- Plugin file -->
    <script src="../js/addons/datatables.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
    </script>

</body>
</html>