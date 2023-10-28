<?php

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!--  <link rel="stylesheet" href="css/bootstrap.css.map">-->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css.map">-->
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .container p:hover{
            color: seagreen!important;
        }
        .container i:hover{
            color: seagreen!important;
        }
        .container a:hover{
            color: seagreen!important;
        }
    </style>
</head>

<body style="background-image: url('1b55e4bdb4fc6051382e370bf26d5a59.jpg');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;">
    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:5%;    height: 105%;">
        <a href="#" class="w3-bar-item w3-button"><i class="fa ffa fa-sliders fa-2x"></i><span class="bar-name">store</span></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-users fa-2x"></i><span class="bar-name">User</span></a>
        <a href="catalog.php" class="w3-bar-item w3-button"><i class="fa fa-info-circle fa-2x"></i><span class="bar-name">Logs</span></a>
        <a href="login.php" class="w3-bar-item w3-button"><i class="fa fa-sign-in fa-2x"></i><span class="bar-name">Login</span></a>
    </div>

    <div class="container">
    <div class="form-div form-div2">
               <h3 class="text-center"><i class="fa ffa fa-sliders fa-2x"></i><p><?php 
               $x = 0;
               if(isset($_SESSION['username'])){
                   echo $_SESSION['username'].' you are already logued';
                   $x = 1;
               }else{
                echo $_SESSION['admin'].' you are already logued ';
               }  
               ?></p></h3>
               <?php if($x==1){ ?>
                    <i style="margin-top: 20px; left: 175px;line-height: 0;position: relative;" class="fa fa-info-circle fa-2x"><a style="text-decoration: none;" class="text-center" href="catalog.php" class="w3-bar-item w3-button"><p style="line-height: 2;left: -70px;position: relative; " class="bar-name">Go to Catalog</p></a></i>               
               <?php }else{ ?>
                <i style="margin-top: 20px; left: 175px;line-height: 0;position: relative;" class="fa fa-users fa-2x"><a style="text-decoration: none;" class="text-center" href="admin.php" class="w3-bar-item w3-button"><p style="line-height: 2;left: -90;position: relative; " class="bar-name">Go to admin page</p></a></i>
               <?php } ?>
   </div>
    </div>
    <?php

    ?>
    </body>
</html>