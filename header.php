<?php
$con=mysqli_connect('localhost','ulduz','777','xeberdata');
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>News</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
        <meta content="Bootstrap News Template - Free HTML Templates" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="b-logo">
                            <a href="index.php">
                                <img src="img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="b-ads">
                            <a href="https://htmlcodex.com">
                                <img src="img/ads-1.jpg" alt="Ads">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="b-search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.php" class="nav-item nav-link active">Bas sehife</a>
                            <?php
                    
                            $sec = mysqli_query($con,"SELECT * FROM xeber WHERE cat IN('İqtisadiyyat','Siyasət','Cəmiyyət','Dünya','İdman') GROUP BY cat");
                            while($info = mysqli_fetch_array($sec))
                            {echo'<a href="category.php?cat='.$info['cat'].'" class="nav-item nav-link">'.$info['cat'].'</a>';}
                            
                            
                            ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Diger</a>
                                <div class="dropdown-menu">
                                <?php
                    
                                $sec = mysqli_query($con,"SELECT * FROM xeber WHERE cat NOT IN('İqtisadiyyat','Siyasət','Cəmiyyət','Dünya','İdman') GROUP BY cat");
                                while($info = mysqli_fetch_array($sec))
                                {echo'<a href="category.php?cat='.$info['cat'].'" class="dropdown-item">'.$info['cat'].'</a>';}
                                
                                
                                ?>
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link">Elaqe</a>
                        </div>
                        <div class="social ml-auto">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->