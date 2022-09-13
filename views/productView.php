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
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../images/images/logo.jpeg" type="image/x-icon">
    <link rel="apple-touch-icon" href="../images/images/small-logo.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../design/design2.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    

</head>
<script>
    document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.dropdown-trigger');
                var instances = M.Dropdown.init(elems);
            });
</script>

         <script>
            $(document).ready(function(){
            $('.toast').toast('show');
            $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
<body>
                <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
        <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
							<option>€ EUR</option>
						</select>
                    </div>
                    <div class="right-phone-box">
                        <p>Appellez nous :- <a href="#"> +33 900 800 100</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="#"><i class="fa fa-user s_color"></i> Mon Compte</a></li>
                            <li><a href="#"><i class="fas fa-location-arrow"></i> Notre Position</a></li>
                            <li><a href="#"><i class="fas fa-headset"></i> Contactez nous</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="login-box">
                    <?php
                                if(!isset($_SESSION['id_user']))
                                    echo "<a href='#' class='btn btn-light'  data-toggle='modal' data-target='#modalLogin'>login </a>";
                                else{
                                        echo"
                                        <a href='#' class='dropdown-trigger btn' data-target='dropdownMenu'><i class='material-icons'>person_pin</i>".$_SESSION['surname_user']."</a>
                                            <ul id='dropdownMenu' class='dropdown-content'>
                                                <li><a href='#' onclick='loadListProduct()'><i class='material-icons'>format_list_bulleted</i>Produits</a></li>
                                                <li><a href='#'  onclick='loadListCommand()'><i class='material-icons'>view_module</i>Commandes</a></li>
                                                <li class='divider' tabindex='-1'></li>
                                                <li><a href='../controller/disconnect.php'><i class='material-icons'>logout</i>logout</a></li>
                                            </ul>
                                        ";
                                }

                        ?>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLoginTitle"><img src="images/images/user.png" alt="User "/>  Se connecter !</h5>
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
                                            <span class="input-group-text" id="inputGroupPrepend2"><i class="material-icons">account_circle</i></span>
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
                                            <span class="input-group-text" id="inputGroupPrepend2"><i class="material-icons">password</i></span>
                                            </div>
                                            <input type="password" class="form-control" name="password" id="password"  aria-describedby="inputGroupPrepend2" required>
                                        </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-light" id="submit" type="submit"><i class="material-icons">login</i></button>
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
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> Bienvenue sur Kmerfood
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Le meilleur des Afroshop qui vous livre partout
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> les produits de meilleures qualites
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Consommez du 100% Camerounais 
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> partout ou vous vous trouvez
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Les meilleurs rabais
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> les meilleurs prix
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Abonnez vous et vous ne regretterez pas
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="../index.php"><img src="../images/images/logo-removebg-previewsmall.PNG" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="../index.php">Acceuil</a></li>
                        <li class="nav-item"><a class="nav-link" href="../about.php">A propos de nous</a></li>
                        <li class="nav-item"><a class="nav-link" href="../contact-us.php">Contactez nous</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
							<a href="#">
								<i class="fa fa-shopping-bag"></i>
								<span class="badge">0</span>
								<p>Mon Panier</p>
							</a>
						</li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>


  <div class="container" id="container_form_cathegorie">
    <div class="row justify-content-center" id="row_title_cathegorie">
        
        <div class="col-md-3" id="col_menu_left">
            <!-- col menu left -->
            <div class="list-group">
                <a href="productView.php" class="list-group-item list-group-item-action"><img src="../images/images/new.png" alt="logo kmer food "/>Ajouter Produit</a>
                <a href="#" class="list-group-item list-group-item-action" onclick="loadViewCategorie()" ><img src="../images/images/categorie.png" alt="logo kmer food "/>Créer Cathegorie</a>
                <a href="#" class="list-group-item list-group-item-action" onclick="loadListCommand()"><img src="../images/images/commande.png" alt="logo kmer food "/>Gérer Commandes 
                    <?php 
                         $listPending = getAllCommand("En Attente");
                        if(count($listPending) > 0)
                            echo "<span class='badge badge-primary badge-pill'>".count($listPending)."</span></a>";
                    ?>
                <a href="#" class="list-group-item list-group-item-action" onclick="loadListProduct()"><img src="../images/images/gerer.png" alt="logo kmer food "/>Gérer Produits </a>
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
                    <div class="col-md-12 align-self-center">

                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="name" id="label_designation">Désignation</label>
                                    <input type="text" class="form-control" name="name" id="nom" placeholder="nom du produit" onblur="checkIfExist(this.value)" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="old_price">Ancien prix</label>
                                    <input type="text" class="form-control" name="old_price" id="old_price" placeholder="0.0€"  required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="current_price">Prix actuel</label>
                                        <input type="text" class="form-control" name="current_price" id="current_price" placeholder="0.0€"  required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="old_qty">Quantité</label>
                                    <input type="text" class="form-control" name="old_qty" id="old_qty" placeholder="0" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="unity">Unité</label>
                                    <select  name="unity" id="unity" class="form-control">
                                        <option value="kg" selected>Kilogramme</option>
                                        <option value="L">Litre</option>
                                        <option value="unity">unité</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="description du produit..." required></textarea>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="command_url">Lien d'achat</label>
                                    <input type="text" class="form-control" name="command_url" id="command_url" placeholder="https://" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="cathegorie">Cathegorie</label>
                                    <select name="cathegorie" id="cathegorie" class="form-control">
                                            <?php loadAllCathegorie(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
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

                    uploadImageProduct("../images/images/files/",$_FILES['image_path'] ,$product);

                }
            ?>

        </div>
    </div>

</div>



    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Nos Horaires</h3>
							<ul class="list-time">
								<li>Lundi - Vendredi: 08.00am to 05.00pm</li> <li>Samedi: 10.00am to 08.00pm</li> <li>Dimanche: <span>Fermé</span></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Newsletter</h3>
							<form class="newsletter-box">
								<div class="form-group">
									<input class="" type="email" name="Email" placeholder="Email Address*" />
									<i class="fa fa-envelope"></i>
								</div>
								<button class="btn hvr-hover" type="submit">Envoyer</button>
							</form>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Reseaux Sociaux</h3>
							<p>Suivez-nous sur tous les reseaux</p>
							<ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
						</div>
					</div>
				</div>
				<hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>A propos de  Kmerfood</h4>
                            <p>Jeune Afroshop nouvellement cree et mettant a la disposition de ses clients des produits 100% Camerounais</p> 
							<p>Basé en Italie nous livrons nos Client peu importe ou ils se trouvent</p> 							
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">A propos de nous</a></li>
                                <li><a href="#">Notre Localisation</a></li>
                                <li><a href="#">Nos Termes &amp; Conditions</a></li>
                                <li><a href="#">Information de Livraison</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: Michael I. Days 3756 <br>Milan Afro Street,<br> KS 67213 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Telephone: <a href="tel:+33-888705770">+33-888 705 770</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:kmerfood2020@gmail.com">kmerfood2020@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="..js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="../js/jquery.superslides.min.js"></script>
    <script src="../js/bootstrap-select.js"></script>
    <script src="../js/inewsticker.js"></script>
    <script src="../js/bootsnav.js."></script>
    <script src="../js/images-loded.min.js"></script>
    <script src="../js/isotope.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/baguetteBox.min.js"></script>
    <script src="../js/form-validator.min.js"></script>
    <script src="../js/contact-form-script.js"></script>
    <script src="../js/custom.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/addons/datatables.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
    </script>
</body>

</html>