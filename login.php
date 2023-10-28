<?php
    session_start();
    include('error.php');
    if($name_error==''&& $password_error ==''){
        include('server.php');
    }
    if(isset($_SESSION['username']) || isset($_SESSION['admin'])){
        include('alreadylogin.php');
    }else{

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
</head>

<body style="background-image: url('1b55e4bdb4fc6051382e370bf26d5a59.jpg');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;">
    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:5%;    height: 105%;">
        <a href="catalog.php" class="w3-bar-item w3-button"><i class="fa ffa fa-sliders fa-2x"></i><span class="bar-name">store</span></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-users fa-2x"></i><span class="bar-name">User</span></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-info-circle fa-2x"></i><span class="bar-name">Logs</span></a>
        <a href="login.php" class="w3-bar-item w3-button"><i class="fa fa-sign-in fa-2x"></i><span class="bar-name">Login</span></a>
    </div>

    <div class="container">
    <div class="form-div form-div2">
               <h3 class="text-center"><i class="fa ffa fa-sliders fa-2x"></i><p>Monument Catalog Login</p></h3>
               
               <form enctype="multipart/form-data" method="POST">
                 
                    <div class="error"><?php echo $name_error; ?></div>
                    <input type="text" name="username" placeholder="Username"><i class="fa fa-keyboard-o errspan errspan_login" aria-hidden="true"></i>
                    <div class="error"><?php echo $password_error; ?></div>
                    <input type="password" name="password" placeholder="Password"><i class="fa fa-key errspan errspan_login" aria-hidden="true"></i>
                    <div class="error"><?php echo $error_msg; ?></div>
                    <input class="btn_login" type="submit" name="login" value="LOGIN">
               </form>
   </div>
    </div>
    <?php

    ?>
    </body>
</html><?php } ?>