<?php
    include('../../app/config/config.php');
    include('../../app/config/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>DOCTOR - Responsive HTML &amp; Bootstrap Template</title>
    <link rel="stylesheet" href="<?php echo $URL;?>/app/templates/doctor/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $URL;?>/app/templates/doctor/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $URL;?>/app/templates/doctor/css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=BenchNine:300,400,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo $URL;?>/public/images/32x32_favicon.png" rel="shortcut icon" type="image/x-icon" />
    <script src="<?php echo $URL;?>/app/templates/doctor/js/modernizr.js"></script>
    <!--[if lt IE 9]>
    <script src=<?php echo $URL;?>"/app/templates/doctor/js/html5shiv.js" ></script>
    <script src=<?php echo $URL;?>"/app/templates/doctor/js/respond.min.js" ></script>
    <![endif]-->

</head>
<body>

<!-- ====================================================
header section -->
<header class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-5 header-logo">
                <br>
                <a href="index.html"><img src="<?php echo $URL;?>/public/images/logo.png" width="80" height="80" alt="" class="img-responsive logo"></a>
            </div>

            <div class="col-md-7">
                <nav class="navbar navbar-default">
                    <div class="container-fluid nav-bar">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                            <ul class="nav navbar-nav navbar-right">
                                <li><a class="menu active" href="#home" >Cuentas</a></li>
                                <li><a class="menu" href="#about">Créditos</a></li>
                                <li><a class="menu" href="#service">Inversiones </a></li>
                                <li><a class="menu" href="#team">Conocenos</a></li>
                                <li><a class="menu" href="#contact"> Educación Financiera</a></li>
                                <li><a class="menu" href="../../login/"> Auditoria</a></li>
                            </ul>
                        </div><!-- /navbar-collapse -->
                    </div><!-- / .container-fluid -->
                </nav>
            </div>
        </div>
    </div>
</header> <!-- end of header area -->

<section class="slider" id="home">
    <div class="container-fluid">
        <div class="row">
            <div id="carouselHacked" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="header-backup"></div>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="<?php echo $URL;?>/public/images/portada-01-juntos.jpg" alt="">
                        <div class="carousel-caption">
                            <h1>providing</h1>
                            <p>highquality service for men &amp; women</p>
                            <button>learn more</button>
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?php echo $URL;?>/public/images/portada-02-calificacion-aa+.jpg" alt="">
                        <div class="carousel-caption">
                            <h1>providing</h1>
                            <p>highquality service for men &amp; women</p>
                            <button>learn more</button>
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?php echo $URL;?>/public/images/portada-03-angie-y-neisi.jpg" alt="">
                        <div class="carousel-caption">
                            <h1>providing</h1>
                            <p>highquality service for men &amp; women</p>
                            <button>learn more</button>
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?php echo $URL;?>/public/images/portada-04-negocio.jpg" alt="">
                        <div class="carousel-caption">
                            <h1>providing</h1>
                            <p>highquality service for men &amp; women</p>
                            <button>learn more</button>
                        </div>
                    </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carouselHacked" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carouselHacked" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section><!-- end of slider section -->

<!-- about section -->
<section class="about text-center" id="about">
    <div class="container">
        <div class="row">
            <h2>Créditos</h2>
            <h4>Juntos construyendo sueños</h4>
            <div class="col-md-6 col-sm-6">
                <div class="single-about-detail clearfix">
                    <div class="about-img">
                        <img class="img-responsive" src="<?php echo $URL;?>/public/images/cuentas-v1.png" alt="">                    </div>
                    <div class="about-details">
                        <div class="pentagon-text">
                            <h1>C</h1>
                        </div>
                        <h3>Cuentas de ahorro</h3>
                        <p>Ahorrando para hoy, mañana y siempre. La cuenta que se adapta a ti.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="single-about-detail">
                    <div class="about-img">
                        <img class="img-responsive" src="<?php echo $URL;?>/public/images/otros-servicios-v1.png" alt="">
                    </div>
                    <div class="about-details">
                        <div class="pentagon-text">
                            <h1>W</h1>
                        </div>

                        <h3>Otros servicios</h3>
                        <p>Lo que buscabas, justo para ti, adaptado a tus necesidades, animate a cumplir tus sueños.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- end of about section -->

<!-- footer starts here -->
<footer class="footer clearfix">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 footer-para">
                <p>&copy;UNIANDES Derechos reservados</p>
            </div>
            <div class="col-xs-6 text-right">
                <a href="https://www.facebook.com/cacpepas"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/CACPEPAS"><i class="fa fa-twitter"></i></a>
                <a href="https://www.instagram.com/cacpe_pastaza/"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>

<!-- script tags
============================================================= -->
<script src="<?php echo $URL;?>/app/templates/doctor/js/jquery-2.1.1.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?php echo $URL;?>/app/templates/doctor/js/gmaps.js"></script>
<script src="<?php echo $URL;?>/app/templates/doctor/js/smoothscroll.js"></script>
<script src="<?php echo $URL;?>/app/templates/doctor/js/bootstrap.min.js"></script>
<script src="<?php echo $URL;?>/app/templates/doctor/js/custom.js"></script>
</body>
</html>
