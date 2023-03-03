<?php
require 'config/database.php';
$query = "SELECT * FROM packs";
$packs = mysqli_query($connection, $query);
// fetch current user from database
if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP & MySQL Blog Application with Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- CUSTOM STYLESHEET -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style1.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- GOOGLE FONT (MONTSERRAT) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>


<body>

    <nav class=" nav megamenu nav__container">
        
        <div class=" container-fluid nav__container ">

            <img class="logo__img" src="<?= ROOT_URL ?>images/mass.png" >

            <a href="<?= ROOT_URL ?>" class="nav__logo fw-bold fs-4">MASS<span style="color:hsl(51, 91%, 60%);">&</span>MUSCLE<span class="fs-4" style="color:hsl(51, 91%, 60%);">.</span></a>
            <ul class="nav__items">
                <ul class="megamenu-nav d-flex justify-content-center " role="menu">
                    <li class="nav-item is-parent">
                        <a class="nav-link" href="<?= ROOT_URL ?>blog.php" id="megamenu-dropdown-1" aria-haspopup="true" aria-expanded="false">
                            NOS PACKS<i class="fa fa-angle-down"></i>
                        </a>
                        <div class="megamenu-content" aria-labelledby="megamenu-dropdown-1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-8 pr-5">
                                        <div class="row">
                                            <div class="col-6">
                                                <h3 class="cc">NOS PACKS</h3>
                                                <hr>
                                                <ul class="subnav">
                                                    <?php while ($pack = mysqli_fetch_assoc($packs)) : ?>
                                                        <li class="subnav-item">
                                                            <a href="#" class="subnav-link">> <?=$pack['title'] ?></a>
                                                        </li>
                                                    <?php endwhile ?>
                                                </ul>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <img src="./images/1.jpg" class="img-fluid mb-3" alt="test image">
                                                <img src="./images/1ze.jpg" class="img-fluid mb-3" alt="test image">
                                            </div>
                                        </div>
                                        <hr>

                                    </div>
                                    <div class="col-4 mt-3">
                                        <img src="./images/45.jpg" class="img-fluid mb-3" style="max-height: 10rem;" alt="test image">
                                        <img src="./images/45.jpg" class="img-fluid mb-3" style="max-height: 10rem;" alt="test image">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, expedita sint quis rem amet, a nihil, non sunt ea quasi.
                                        </p>
                                        <a href="#">See more <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item is-parent">
                        <a class="nav-link" href="<?= ROOT_URL ?>about.php" id="megamenu-dropdown-2" aria-haspopup="true" aria-expanded="false">
                            NUTRITION SPORTIVE<i class="fa fa-angle-down"></i>
                        </a>
                        <div class="megamenu-content" aria-labelledby="megamenu-dropdown-2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-8 pr-5">
                                        <div class="row">
                                            <div class="col-4">
                                                <h3 class="cc">Protéines</h3>
                                                <hr>
                                                <ul class="subnav">
                                                    <li class="subnav-item">
                                                        <a href="#" class="subnav-link">> Caséines</a>
                                                    </li>
                                                    <li class="subnav-item">
                                                        <a href="#" class="subnav-link">> Protéines À Libération Progressive</a>
                                                    </li>
                                                    <li class="subnav-item">
                                                        <a href="#" class="subnav-link">> Protéines D'Oeuf </a>
                                                    </li>
                                                    <li class="subnav-item">
                                                        <a href="#" class="subnav-link">> Protéines De Viande</a>
                                                    </li>
                                                    <li class="subnav-item">
                                                        <a href="#" class="subnav-link">> Protéines Végétales</a>
                                                    </li>
                                                    <li class="subnav-item">
                                                        <a href="#" class="subnav-link">> Protéines Végétales</a>
                                                    </li>
                                                    <li class="subnav-item">
                                                        <a href="#" class="subnav-link">> Protéines Végétales</a>
                                                    </li>
                                                    <li class="subnav-item">
                                                        <a href="#" class="subnav-link">> Protéines Végétales</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="col-4">
                                                <h3 class="cc">Carbohydrates</h3>
                                                <hr>
                                                <ul class="subnav">
                                                    <li class="subnav-item">
                                                        <a href="#" class="subnav-link">> Index Glycémique Élevé</a>
                                                    </li>
                                                    <li class="subnav-item">
                                                        <a href="#" class="subnav-link">> Mélange Séquentiel D'Hydrates De Carbone</a>
                                                    </li>
                                                </ul>
                                                <div class="col">
                                                    <h3 class="cc">Acides Aminés</h3>
                                                    <hr>
                                                    <ul class="subnav">
                                                        <li class="subnav-item">
                                                            <a href="#" class="subnav-link">> L-arginine</a>
                                                        </li>
                                                        <li class="subnav-item">
                                                            <a href="#" class="subnav-link">> EAA - Mélange D'acides Aminés</a>
                                                        </li>
                                                        <li class="subnav-item">
                                                            <a href="#" class="subnav-link">> BCAA's (Acides Aminés Ramifiés)</a>
                                                        </li>
                                                        <li class="subnav-item">
                                                            <a href="#" class="subnav-link">> BCAA's + Glutamine</a>
                                                        </li>
                                                        <li class="subnav-item">
                                                            <a href="#" class="subnav-link">> De Viande</a>
                                                        </li>
                                                    </ul>


                                                </div>

                                            </div>
                                            <div class="col-4">
                                                <h3 class="cc">Acides Gras</h3>
                                                <hr>
                                                <ul class="subnav">
                                                    <li class="subnav-item">
                                                        <a href="#" class="subnav-link">> Gainer 50/50</a>
                                                    </li>
                                                    <li class="subnav-item">
                                                        <a href="#" class="subnav-link">> Gainer 10% à 30%</a>
                                                    </li>
                                                </ul>
                                                <div class="col">
                                                    <h3 class="cc">Anabolisants Naturels</h3>
                                                    <hr>
                                                    <ul class="subnav">
                                                        <li class="subnav-item">
                                                            <a href="#" class="subnav-link">> Multi-Action</a>
                                                        </li>
                                                        <li class="subnav-item">
                                                            <a href="#" class="subnav-link">> Pro-Hormone De Croissance (GH)</a>
                                                        </li>
                                                        <li class="subnav-item">
                                                            <a href="#" class="subnav-link">> Pro-Testostérone</a>
                                                        </li>
                                                        <li class="subnav-item">
                                                            <a href="#" class="subnav-link">> ZMA</a>
                                                        </li>

                                                    </ul>
                                                    <div class="col">
                                                        <h3 class="cc">Barres</h3>
                                                        <hr>
                                                        <ul class="subnav">

                                                            <li class="subnav-item">
                                                                <a href="#" class="subnav-link">> Barres De Protéines</a>
                                                            </li>
                                                            <li class="subnav-item">
                                                                <a href="#" class="subnav-link">> Barres Énergétiques</a>
                                                            </li>

                                                        </ul>


                                                    </div>


                                                </div>

                                            </div>
                                            <!--<div class="col-3 mt-3">
                                                <img src="./images/1.jpg" class="img-fluid mb-3" alt="test image">
                                                <img src="./images/1ze.jpg" class="img-fluid mb-3"  alt="test image">
                                            </div>-->
                                        </div>
                                        <hr>

                                    </div>
                                    <!--<div class="col-4 mt-3">
                                        <img src="./images/45.jpg" class="img-fluid mb-3" style="max-height: 10rem;" alt="test image">
                                        <img src="./images/45.jpg" class="img-fluid mb-3" style="max-height: 10rem;" alt="test image">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, expedita sint quis rem amet, a nihil, non sunt ea quasi.
                                        </p>
                                        <a href="#">See more <i class="fa fa-angle-double-right"></i></a>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item is-parent">
                        <a class="nav-link" href="<?= ROOT_URL ?>services.php" id="megamenu-dropdown-3" aria-haspopup="true" aria-expanded="true">
                            PROMOTIONS<span class="position top-0 start-100 text-align-center  badge rounded-pill bg-warning">
                                Promo</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <div class="megamenu-content" aria-labelledby="megamenu-dropdown-3">
                            <div class="container  text-center mt-5 mb-5">
                                <div class="row wrapper rounded fade show active" id="pills-home">
                                    <div class="col-lg-3 col-md-4 p-4">
                                        <div class="col menu-item">
                                            <div class="card border-0 text-center">
                                                <div class="card-body">
                                                    <div class="notify-badge rounded-circle d-flex align-items-center justify-content-center vh-100 top-0 end-0" style="margin-top:4rem;">
                                                        <span class="badge badge-secondary " style="font-size: 0.9rem;">New</span>
                                                    </div>
                                                    <div class="notify-badge rounded-circle d-flex align-items-center justify-content-center vh-100 top-0 end-0">
                                                        <span class="badge badge-secondary " style="font-size: 0.9rem;">-7%</span>
                                                    </div>
                                                    <div class="card-image">
                                                        <a href="<?= ROOT_URL ?>images/prod1.jpg" class="glightbox">
                                                            <img src="<?= ROOT_URL ?>images/prod1.jpg" class="menu-img img-fluid" alt="" width="250">
                                                        </a>
                                                    </div>
                                                    <div class="card-inner">
                                                        <p class="fw-bolder">MUSCLE JUICE REVOLUTION 2600 –</h4>
                                                        <div class="row align-items-center">
                                                            <div class="col-6   text-end ">
                                                                <p class="text-nowrap text-decoration-line-through fw-lighter">150.00 DT</p>
                                                            </div>
                                                            <div class="col-6  text-start" style="margin-right: -0.5rem;">
                                                                <p class=" text-nowrap fw-bolder " style="color:hsl(51, 91%, 60%);">140.00 DT</p>
                                                            </div>
                                                        </div>
                                                        <div class="d-grid gap-2 col-lg-8 col-6 mx-auto">
                                                            <button class="button-86" role="button">Details</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- Menu Item -->
                                    </div>
                                    <div class="col-lg-3 col-md-4 p-4">
                                        <div class="col  menu-item">
                                            <div class="card border-0 text-center">
                                                <div class="card-body">
                                                    <div class="notify-badge rounded-circle d-flex align-items-center justify-content-center vh-100 top-0 end-0" style="margin-top:4rem;">
                                                        <span class="badge badge-secondary " style="font-size: 0.9rem;">New</span>
                                                    </div>
                                                    <div class="notify-badge rounded-circle d-flex align-items-center justify-content-center vh-100 top-0 end-0">
                                                        <span class="badge badge-secondary " style="font-size: 0.9rem;">-7%</span>
                                                    </div>

                                                    <div class="card-image">
                                                        <a href="<?= ROOT_URL ?>images/prod1.jpg" class="glightbox">
                                                            <img src="<?= ROOT_URL ?>images/prod1.jpg" class="menu-img img-fluid" alt="" width="250">
                                                        </a>
                                                    </div>
                                                    <div class="card-inner">
                                                        <p class="fw-bolder">MUSCLE JUICE REVOLUTION 2600 –</h4>

                                                        <div class="row align-items-center">
                                                            <div class="col-6   text-end ">

                                                                <p class="text-nowrap text-decoration-line-through fw-lighter">150.00 DT</p>
                                                            </div>
                                                            <div class="col-6  text-start" style="margin-right: -0.5rem;">
                                                                <p class=" text-nowrap fw-bolder " style="color:hsl(51, 91%, 60%);">140.00 DT</p>
                                                            </div>
                                                        </div>

                                                        <div class="d-grid gap-2 col-lg-8 col-6 mx-auto">
                                                            <button class="button-86" role="button">Details</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- Menu Item -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <li class="nav-item is-parent">
                        <a class="nav-link text-black" href="<?= ROOT_URL ?>contact.php" aria-haspopup="true" aria-expanded="false">
                            CONTACT <i class="fa fa-angle-down"></i>
                        </a>
                    </li>
            </ul>
             <div class="megamenu-background" id="megamenu-background"></div>
        </div>
    </nav>
    <div class="megamenu-dim" id="megamenu-dim"></div>
    <!--====================== END OF NAV ====================-->