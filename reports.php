<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="css/_table.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="images/captain_logo.png"/>
    <title>Reports</title>
</head>

<body>
<div class="container-fluid">
    <?php
     include_once('url.php');
     include_once('navbar.php'); 
     include("config.php");
     ?>
     </div>
    <div class="wrapper">
    
    <nav id="sidebar">
            <div class="sidebar-header">
               
            <h3>Reports</h3>
            <strong>C</strong>
                
            </div>

            <ul class="list-unstyled components">
            <li class="active">
                    <a href="contact.php?filter">
                        <i class="fas fa-image"></i>
                        View Reports
                    </a>
                </li>

                <?php
                if($_SESSION['logged']){
                    if($_SESSION['user_type']!='Visitor'){
                            show();
                    } 
                }
               
                function show(){
                    echo '<li>';
                    echo    '<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-braille"></i>
                            
                        </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                        <a href="">Total Daily Sales</a>
                        </li>
                        <li>
                        <a href=""></a>
                        </li>
                        <li>
                        <a href="">Per Customer Sales</a>
                        </li>
                        <li>
                        <a href="">Per Showroom Sales</a>
                        </li>
                        </ul>';
                    echo '</li>';
                    echo '<li>
                        <a href="">
                            <i class="fas fa-image"></i>
                            Customers Report
                        </a>
                    </li>';
                    echo '<li>
                        <a href="">
                            <i class="fas fa-image"></i>
                            Showroom Stock
                        </a>
                    </li>';
                }
                
                ?>
            </ul>
        </nav>

    <div id="content">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-justify"></i>
            
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" 
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" 
        aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>

    </div>
</nav>


    
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>
</html>


              