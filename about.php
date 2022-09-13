<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Kmerfood</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

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

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
							<option>$ USD</option>
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
						<select id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
                        <?php
                                if(!isset($_SESSION['id_user']))
                                    echo "
                                        <option>S'inscrire ici</option>
                                        <option><a href='#' data-toggle='modal' data-target='#modalLogin'>Se connecter</a></option>
                                    ";
                                else{
                                    echo "
                                        <option>".$_SESSION['surname_user']." <img src='images/images/user48.png' alt='User icone '/></option>
                                        <option><a class='dropdown-item' href='views/productView.php'>Gerer les Produits</a></option>
                                        <option><a class='dropdown-item' href='controller/disconnect.php'><img src='images/images/logout.png' alt='logout icone '/>Se deconnecter</a></option>
                                    ";
                                }
                        ?>
							
                        </select>
                        
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
                                            <span class="input-group-text" id="inputGroupPrepend2"><img src="images/images/login_icone.PNG"></img></span>
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
                                            <span class="input-group-text" id="inputGroupPrepend2"><img src="images/images/password_icone.PNG"></img></span>
                                            </div>
                                            <input type="password" class="form-control" name="password" id="password"  aria-describedby="inputGroupPrepend2" required>
                                        </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-light" id="submit" type="submit"><img src="images/images/connect.png" alt="go "/></button>
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
                    <a class="navbar-brand" href="index.php"><img src="images/images/logo-removebg-previewsmall.PNG" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Acceuil</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">A propos de nous</a></li>
                      <!--  <li class="dropdown">
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
                           
                        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>  -->
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

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>ABOUT US</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
                        <li class="breadcrumb-item active">A popos de Nous</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start About Page  -->
    <div class="about-box-main">
    <div class="container">
            <div class="row">
				<div class="col-lg-6">
                    <div class="banner-frame"> <img class="img-fluid" src="images/images/logo-removebg-preview.png" alt="" />
                    </div>
                </div>
              <div class="col-lg-6">
                    <h2 class="noo-sh-title-top">NOUS SOMMES<span> KAMERFOOD</span></h2>
                    <p>KAMERFOOD est la matérialisation d’un désire, d’une envie culinaire née,
                        De la tradition des retrouvailles de tous les weekend d’un groupe de jeunes africains vivant loin de chez eux.
                        La nostalgie et le désire de partager un repas typiquement africain, combiné a la rareté et l’absence de points de distributions fiables et rapides de produits alimentaires 100% AFRICAINS donnes naissance a KAMERFOOD.
                        Désormais, vos retrouvailles entre africain de la diaspora pourront être accompagnés de chez nous, de la qualité des produits a notre entière disposition. 
                        Visa - vis de vous KAMERFOOD n’a qu’un seul objectif  Vous Satisfaire
                        « notre rêve, vous ramenez chez vous en l’espace d’un seul repas »

                       
                    </p>
                    <p> 
                       </p>
					<a class="btn hvr-hover" href="#">Lire Plus</a>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Nous sommes digne de Confiance</h3>
                        <p>Nous entretenons de bonnes relations clients pour perfectionner nos produits et services </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Nous sommes Professionel</h3>
                        <p> Vos achats se font dans la sécurité totale, au-delà d'avoir des produits de grandes qualités, vous pouvez suivre votre commande jusqu'à la livraison. </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Nous sommes Experts</h3>
                        <p>Qualite de Service garantie. </p>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-12">
                    <h2 class="noo-sh-title">Notre Equipe</h2>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="images/kevinwamba.jpeg" alt="" />
                            <div class="team-content">
                                <h3 class="title">KEVIN WAMBA</h3> <span class="post">ADMINISTRATOR</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>« Mon soucis depuis longtemps a toujours été celui d’apporter quelque chose de nouveau et d’utile dans la plus grande efficacité pour le bien social » </p>
                        </div>
                        <hr class="my-0"> </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="images/images/administrator.jpg" alt="" />
                            <div class="team-content">
                                <h3 class="title">STEVE MEKINDA </h3> <span class="post">ADMINISTRATOR</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>« Mon credo, la rigueur, la discipline et respect »</p>
                        </div>
                        <hr class="my-0"> </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="images/images/LauretteMafo.jpeg" alt="" />
                            <div class="team-content">
                                <h3 class="title">LAURETTE MAFO </h3> <span class="post">MARKETING MANAGER </span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>« Ma philosophie est celle d’être  à l’écoute des autres pour mieux les satisfaire » </p>
                        </div>
                        <hr class="my-0"> </div>
                </div>
                                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="images/images/seyd.jpg" alt="" />
                            <div class="team-content">
                                <h3 class="title">Bill Parich</h3> <span class="post">Web Developer</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>Bienvenue sur le site de Kmerfood.  </p>
                        </div>
                        <hr class="my-0"> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Page -->

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
                                <li><a href="https://www.facebook.com/Foodkamer"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://twitter.com/kamerfood"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="https://instagram.com/kamer_food_online?igshid=3xmws6zuxool"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
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
    <script src="js/jquery-3.2.1.min.js"></script>
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