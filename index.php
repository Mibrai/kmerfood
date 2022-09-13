<!DOCTYPE html>
<?php
    session_start();
    //ini_set("display_errors","off");
    include_once('models/functions.php');
    include_once('models/ProductClass.php');
    include_once('models/CathegorieClass.php');
    include_once('models/CommandClass.php');
?>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Kamerfood</title>
    <meta name="keywords" content="African food shop,Cameroon food,Afro shop online,African spices,African+spices,Nourriture africaine,Alimentation Camerounaise,Kamerfood,Kmerfood,Camerfood,Camer food,food,Afroshop">
    <meta name="description" content="Afroshop Camerounais en Italie">
    <meta name="author" content="kamerfood">
    
   <!-- <meta http-equiv="refresh" content="180"> -->

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/images/logo.jpeg" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/images/small-logo.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="design/design3.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!-- ALL PLUGINS -->
    

</head>
<script>
          document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.dropdown-trigger');
                var instances = M.Dropdown.init(elems);
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
                                                <li><a href='views/productView.php'><i class='material-icons'>format_list_bulleted</i>Produits</a></li>
                                                <li><a href='views/commandView.php'><i class='material-icons'>view_module</i>Commandes</a></li>
                                                <li class='divider' tabindex='-1'></li>
                                                <li><a href='controller/disconnect.php'><i class='material-icons'>logout</i>logout</a></li>
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
                    <i class="material-icons">dehaze</i>
                </button>
                    <a class="navbar-brand" href="index.html"><i class="material-icons">dehaze</i></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Acceuil</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">A propos de nous</a></li>
                       <!-- <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Produits</a>
                            <ul class="dropdown-menu">
								<li><a href="shop.html">Sidebar Shop</a></li>
								<li><a href="shop-detail.html">Shop Detail</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                            </ul>
                        </li>
                           
                        <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>  -->
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Contactez nous</a></li>
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
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="images/images/logo.jpeg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Bienvenue sur <br> Kmerfood</strong></h1>
                            <p class="m-b-40">Bienvenue dans Kmerfood l' Afroshop qui vous livre partout</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/images/waterleaf.jpeg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Bienvenue sur <br> Kmerfood</strong></h1>
                            <p class="m-b-40">Produits 100% Camerounais</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/images/avocat.jpeg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Bienvenue sur <br> Kmerfood</strong></h1>
                            <p class="m-b-40">Avec des meilleurs prix et soldes</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/images/koki.jpeg" alt="" />
                        <a class="btn hvr-hover" href="#">Koki</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/images/haricotrouge.jpeg" alt="" />
                        <a class="btn hvr-hover" href="#">Haricots Rouge</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/images/passion.jpeg" alt="" />
                        <a class="btn hvr-hover" href="#">Fruits de la passion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Categories -->
	
	<div class="box-add-products">
		<div class="container">
			<div class="row">
                
				<div class="col-lg-12 col-md-6 col-sm-12">
					<div class="offer-box-products">
						<img class="img-fluid" src="images/images/banner.gif" alt="" />
					</div>
				</div>
				
			</div>
		</div>
	</div>


    <!--   show all cathegorie -->
        <?php 
                $listCathegorie = getAllCathegorie();
                $count = count($listCathegorie) -1;
                for ($i = 0; $i <= $count; $i++) {
                    $id = explode(" ", $listCathegorie[$i]->getLabel());
                    $id = $id[0]."".$listCathegorie[$i]->getId(); 
        ?>

        <!-- Start Products  -->
        <div class="products-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-all text-center">
                            <h1><?php echo  $listCathegorie[$i]->getLabel(); ?></h1>
                            <p>Vos <?php echo  $listCathegorie[$i]->getLabel(); ?> encore frais et nouvellement livré</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="special-menu text-center">
                            <div class="button-group filter-button-group">
                                <button class="active" data-filter="*">Tous</button>
                                <button data-filter=".top-featured">Top vu</button>
                                <button data-filter=".best-seller">Meilleurs ventes</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row special-list">
                    <?php 
                        $listProduct = getProductByCathegorie($listCathegorie[$i]->getId());
                        $counter = count($listProduct) -1;
                        $x = 0;

                        for ($y = 0; $y <= $counter; $y++) {
                            $product = $listProduct[$y];
                            $x ++;
                            
                    ?>

                    <div class="col-lg-3 col-md-6 special-grid top-featured">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    <p class="new"><?php echo " <del>".$product->getOldPrice()." €</del>"; ?></p>
                                </div>
                                <?php echo "<img src='images/".$product->getImagePath()."' class='img-fluid' alt='Image product'>"; ?>
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Vu"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Comparer"><i class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Ajouter a mes favoris"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                    <a class="cart" href="#" <?php echo "data-toggle='modal' data-target='#".$product->getId()."'"; ?>>Commander</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <?php echo "
                                
                                <div class='card-body'>
                                <del>".$product->getOldPrice()." €</del> <span><img src='images/images/poids.png' alt=' loading... '/> 1kg</span>
                                <p class='card-text'>".$product->getCurrentPrice()."  <img src='images/images/prix.png' alt=' loading... '/></p>
                                </div>
                                
                                "; 
                                
                                 //Modal by product
                                 echo " 
                                 <div class='modal fade' id='".$product->getId()."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                     <div class='modal-dialog modal-lg modal-dialog-centered' role='document'>
                                     <div class='modal-content' id='modal_command'>
                                         <div class='modal-header'>
                                         <h5 class='modal-title' id='exampleModalCenterTitle'><img src='images/images/cart+.png' alt=' ' /> Commander le produit <img src='images/images/next.png' alt=' :: ' /> ".$product->getName()." </h5>
                                         <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                             <span aria-hidden='true'>&times;</span>
                                         </button>
                                         </div>
                                         <div class='modal-body'>

                                             <div class='container-fluid'>
                                                 <div class='row' id='row_y_modal'>

                                                     <div class='col-md-4'>
                                                         <div class='nav flex-column nav-pills' id='v-pills-tab' role='tablist' aria-orientation='vertical'>
                                                             <a class='nav-link active' id='v-pills-instant".$product->getId()."-tab' data-toggle='pill' href='#v-pills-instant".$product->getId()."' role='tab' aria-controls='v-pills-instant".$product->getId()."' aria-selected='true'>Instantanée <img src='images/images/phone.png' /></a>
                                                             <a class='nav-link' id='v-pills-differe".$product->getId()."-tab' data-toggle='pill' href='#v-pills-differe".$product->getId()."' role='tab' aria-controls='v-pills-differe".$product->getId()."' aria-selected='false'>Normal <img src='images/images/dauert.png' /></a>
                                                         </div>
                                                     </div>

                                                     <div class='col-md-8'>
                                                         <div class='tab-content' id='v-pills-tabContent'>

                                                             <div class='tab-pane fade show active' id='v-pills-instant".$product->getId()."' role='tabpanel' aria-labelledby='v-pills-instant".$product->getId()."-tab'>
                                                                 <div class='alert alert-info' role='alert'> Passez votre commande directement par telephone au numero suivant </div>
                                                                 <span><img src='images/images/handy.png' alt='Instant Command per Call :' /> +39 3511 81 88 08 </span>
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
                                         <button type='button' class='btn btn-light' data-dismiss='modal'><img src='images/images/close.png' alt='fermer' /></button>
                                         </div>
                                     </div>
                                     </div>
                                 </div>
                              ";
                                //end modal prouct
                                ?>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    ?> 

                </div>
            </div>
        </div>
        <!-- End Products  -->
        
        <?php
                }
        ?>

    <!-- End all cathegorie -->

    <!-- Start Blog  
    <div class="latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>latest blog</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="images/blog-img.jpg" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Fusce in augue non nisi fringilla</h3>
                                <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc sed mollis. Praesent laoreet lacinia elit id lobortis.</p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#"><i class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="images/blog-img-01.jpg" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Fusce in augue non nisi fringilla</h3>
                                <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc sed mollis. Praesent laoreet lacinia elit id lobortis.</p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#"><i class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="images/blog-img-02.jpg" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Fusce in augue non nisi fringilla</h3>
                                <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc sed mollis. Praesent laoreet lacinia elit id lobortis.</p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#"><i class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 End Blog  -->


    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/images/waterleaf.jpeg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/images/sel.jpeg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/images/prunes.jpeg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/images/passion.jpeg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/images/avocat.jpeg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/images/basilic.jpeg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/images/escargot.jpeg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/images/gombo.jpeg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/images/epice_sauce.jpeg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/images/folere.jpeg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->


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
							<h3>Reseaux Sociaux</h3>
							<p>Suivez-nous sur tous les reseaux</p>
							<ul>
                            <li><a href="https://www.facebook.com/Foodkamer"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://twitter.com/kamerfood"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="https://instagram.com/kamer_food_online?igshid=3xmws6zuxool"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                               
                            </ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Whatsapp</h3>
							<p>acces facile</p>
                            <a href="https://wa.me/message/P6WHY6CVFDKVF1">    <img src="images/kmerfood.jpg" /></a>
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
                                <li><a href="#"><i class="material-icons">info</i>A propos de nous</a></li>
                                <li><a href="#"><i class="material-icons">accessibility</i>Nos Termes &amp; Conditions</a></li>
                                <li><a href="#"><i class="material-icons">local_shipping</i>Information de Livraison</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="material-icons">location_on</i>Address: via del lavoro <br>40127 Bologna<br> </p>
                                </li>
                                <li>
                                    <p><i class="material-icons">phone</i>Telephone: <a href="tel:+333511818808">+33-351181 8808</a></p>
                                </li>
                                <li>
                                    <p><i class="material-icons">email</i>Email: <a href="mailto:kamerfooditalia@gmail.com">kamerfooditalia@gmail.com</a></p>
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
    <p class="footer-company">All Rights Reserved. &copy; 2020 <a href="www.kamerfood.com">Kamerfood</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <!--<script src="js/jquery-3.2.1.min.js"></script>-->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/script.js"></script>
</body>

</html>