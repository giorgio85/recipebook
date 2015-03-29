<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"></meta>

    <!-- Resourse "http://ashobiz.asia/cakefactory125"> -->

    <!-- Title here -->

    <title> Gallery - RecipeBook </title>

    <!-- Description, Keywords and Author -->

    <meta content="Your description" name="description"></meta>
    <meta content="Your,Keywords" name="keywords"></meta>
    <meta content="ResponsiveWebInc" name="author"></meta>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"></meta>

    <!-- Styles -->

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="css/bootstrap.min.css"></link>

    <!-- Carusel Bootstrap CSS -->

    <link href="css/carousel.css" rel="stylesheet">

    <!-- Portfolio CSS -->

    <link rel="stylesheet" href="css/prettyPhoto.css"></link>

    <!-- Font awesome CSS -->

    <link rel="stylesheet" href="css/font-awesome.min.css"></link>

    <!-- Custom Less -->

    <link rel="stylesheet" href="css/less-style.css"></link>

    <!-- Custom CSS -->

    <link rel="stylesheet" href="css/style.css"></link>
    <script>

            document.getElementById('myCarousel').style.display='none';

    </script>
</head>
<body onload="hidden();">


<!-- Page Wrapper -->

<div class="wrapper">
    <div class="header">
        <div class="container">
            <div class="header-top">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="header-contact">
                            <!-- TODO -->                    
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div style="float:right; margin:20px 0 0 -800px;">
                            <div class=" header-search">
                                <form class="form" role="form">
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="Search a dish..."></input>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="button">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </span>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <!-- Button login / sign in -->
							<?php include 'button_login_sigin.php';?>
							<a href="#" style="float:right; margin:25px -230px 0 0; width:70px;" style="outline:0;"><b><?php if (isset($_SESSION['user'])){ echo $_SESSION['user'];}?><a></b>
                        <!-- Form login -->
                        <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="login_modal"><b>Login</b></h4>
                                    </div>
									<form action = "login.php" method="post">
										<div class="modal-body">
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" class="form-control" name="email1" id="email" placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" name = "password" id="password" placeholder="Password">
                                            </div>
										</div>
										<div class="modal-footer">
											<input type="submit" class="btn btn-success" style="width:100%;" value="Login">
										</div>
									</form>
                                </div>
                            </div>
                        </div>

                        <!-- Form sign in -->

                        <div class="modal fade" id="signin_modal" tabindex="-1" role="dialog" aria-labelledby="Login_modal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="signin_modal"><b>Sign in</b></h4>
                                    </div>
									<form action = "register.php" method="post">
										<div class="modal-body">
                                            <div class="form-group">
                                                <input type="text" name="user" class="form-control"  id="name1" placeholder="Name" required="required"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="lastname1" class="form-control"  id="lastname1" placeholder="Lastname" required="required"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email1" class="form-control"  id="email1" placeholder="Email" required="required"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password1" class="form-control" id="password1" placeholder="Password" required="required"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control"  name="password2" id="password2" placeholder="Confirm password" required="required"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="image" class="form-control" id="image" placeholder="URL to user profile pic"/>
                                            </div>
										</div>
                                        <div class="modal-footer">
											<div class="clearfix"></div>
											<input type="submit" class="btn btn-success" style="width:100%;" value="Sign In">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-5">
                        <a href="index.php">

                            <!-- Logo area -->

                            <div class="logo">
                                <img class="img-responsive" alt="" src="img/chef.png"></img>
                                <h1 style="color:red";>R</h1><h1>ecipeBook</h1>
                                <br/>
                                <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Learn, Share and Have Fun Cooking! </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-8 col-sm-7">

                        <!-- Navigation -->

                        <nav class="navbar navbar-default navbar-right" role="navigation">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button class="navbar-toggle" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" type="button">
                                        <span class="sr-only"> Toggle navigation </span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav">
                                        <li>
                                            <a href="index.php"><img class="img-responsive" alt="" src="img/home.png"></img> Home </a>
                                        </li>
										<?php include 'elements_menu.php';?>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div id= "view_all_recipe">
            <iframe name="view_recipes" id="view_recipes" frameborder="0" scrolling="yes" src="index2.php" style="width:100%; height:500px;"></iframe>
        </div>
        <!-- Carousel -->

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img class="first-slide" src="img/meal1.jpg" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1 style="color: black"> Learn, Share and have fun cooking</h1>
                            <p><a class="btn btn-lg btn-danger" href="#" role="button" data-toggle="modal" data-target="#signin_modal">Sign in today</a></p>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <img class="second-slide" src="img/meal2.jpg" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1 style="color: black">Did you know that...?</h1>
                            <p> Get whiter, healthier teeth an apple won’t replace your toothbrush, but biting and chewing an apple stimulates the production of saliva in your mouth, reducing tooth decay by lowering the levels of bacteria.</p>

                            <p><a class="btn btn-lg btn-primary" href="http://www.besthealthmag.ca/best-eats/nutrition/15-health-benefits-of-eating-apples#m837gGkUwy640pig.99." role="button">Learn more</a></p>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <img class="third-slide" src="img/meal3.jpg" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1 style="color: black;" >Prepare delicious desserts is very simple</h1>
                            <p><a class="btn btn-lg btn-success" href="#" role="button">Browse gallery</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="showcase">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="showcase-item">
                            <img class="img-responsive" alt="" src="img/foto1home.jpg"></img>
                            <h3><a href="#"> Recipe of the Week </a></h3>
                            <p><a href="#"> Paella by Max </a><br> Thake a look to the most voted recipe of the week! </p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="showcase-item">
                            <img class="img-responsive" alt="" src="img/foto2home.jpg"></img><h3><a href="#">Last Uploaded Recipe</a></h3>
                            <p><a href="#"> Chocolate Cake By Rita </a><br> Take a look to our last recipe! </p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <div class="footer padd">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-widget">
                        <div class="logo">
                            <img class="img-responsive" alt="" src="img/chef.png"></img>
                            <h1> RecipeBook </h1>
                        </div>
                        <p> The biggest Cooking social network! Be part of our family! </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-widget">
                        <h4> Famous Dishes </h4>
                        <!-- Images -->
                        <a href="#"><img class="dish img-responsive" alt="" src="img/dish/paella.jpg"></img></a>

                        <a href="#"><img class="dish img-responsive" alt="" src="img/dish/pasta1.jpg"></img></a>

                        <a href="#"><img class="dish img-responsive" alt="" src="img/dish/tarta1.jpg"></img></a>

                        <a href="#"><img class="dish img-responsive" alt="" src="img/dish/pizza1.jpg"></img></a>

                        <a href="#"><img class="dish img-responsive" alt="" src="img/dish/ensalada1.jpg"></img></a>

                        <a href="#"><img class="dish img-responsive" alt="" src="img/dish/Marisco.jpg"></img></a>

                        <a href="#"><img class="dish img-responsive" alt="" src="img/dish/tarta2.jpg"></img></a>

                        <a href="#"><img class="dish img-responsive" alt="" src="img/dish/ensaladamar.jpg"></img></a>

                        <a href="#"><img class="dish img-responsive" alt="" src="img/dish/macarons.jpg"></img></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-widget">
                        <h4> Join Us Today </h4>
                        <p> You will receive our last recipes and news!</p>
                        <form role="form">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Your name"></input>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" placeholder="Your email"></input>
                            </div>
                            <button class="btn btn-danger" type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-widget">
                        <h4>Contact Us</h4>
                        <div class="contact-details">
                            <i class="fa fa-map-marker br-red"></i>
                            <span> Av los cocineros 21 <br> Las Palmas - 35001 <br> Spain </span>
                            <div class="clearfix"></div>
                            <i class="fa fa-phone br-green"></i>
                            <span> +34 928 555 555 </span>
                            <div class="clearfix"></div>
                            <i class="fa fa-envelope-o br-lblue"></i>
                            <span><a href="#">info@recipebok.com </a></span>
                            <div class="clearfix"></div>
                        </div>

                        <div class="social">
                            <a class="facebook" href="#"><i class="fa fa-facebook"></i> </a>

                            <a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a>

                            <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>

                            <a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <p> © Copyright 2015 <a href="#"> RecipeBook </a> </p>
            </div>
        </div>
    </div>
</div>
<span class="totop" style="display: none;"><a href="#"><i class="fa fa-angle-up"></i></a></span>

<!-- Javascript files -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jsfunction.js"></script>

</body>
</html>

