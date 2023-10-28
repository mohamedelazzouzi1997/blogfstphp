<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header("location: login.php");
        exit();
    }
    include('error.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!--  <link rel="stylesheet" href="css/bootstrap.css.map">-->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css.map">-->
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:5%;    height: 105%;">
        <a href="#" class="w3-bar-item w3-button"><i class="fa ffa fa-sliders fa-2x"></i><span class="bar-name">store</span></a>
        <a href="admin.php" class="w3-bar-item w3-button"><i class="fa fa-users fa-2x"></i><span class="bar-name">User</span></a>
        <a href="login.php" class="w3-bar-item w3-button"><i class="fa fa-info-circle fa-2x"></i><span class="bar-name">Logs</span></a>
        <a href="login.php?logoutadmin='1'" class="w3-bar-item w3-button"><i class="fa fa-sign-out fa-2x"></i><span class="bar-name">Out</span></a>
    </div>


    <div class="container">
    <div style="font-weight: bolder;"><?php 
            if($name_error==''&& $mail_error ==''&& $password_error ==''&& $img_error =='')
              { 
                if($_SERVER["REQUEST_METHOD"]== "POST") 
                    {
                        echo 'welcome '.$_POST['username'] . '<br> <span style ="font-weight: 400;">Users</span>';
                    }
              }
        ?></div>
        <div class="form-div">
               
                    <form id="form_admin" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" method="POST">
                        <div class="img-container" id="img-container">
                        <input id="input-file" class="file_img" type="file" name="image" placeholder="image">
                            <img id="img-preview" src="" alt="immage" class="img-preview">
                            
                        </div>
                        <div style="text-align: center; text-decoration: underline;" class="error"><?php echo $img_error; ?></div>   
                        <input value="<?php if($_SERVER["REQUEST_METHOD"]== "POST"){ echo $_POST['username'] ;} ?>" style="<?php if($name_error !=''){echo 'border-bottom: 0.5px solid red;';}  ?>" id="username" class='text' type="text" name="username" placeholder="Name"><span style="<?php if($name_error !=''){echo 'color: red;';}  ?>" class="fa fa-keyboard-o errspan" ></span>
                             <div class="error"><?php echo $name_error; ?></div>
                        <input value="<?php if($_SERVER["REQUEST_METHOD"]== "POST"){ echo $_POST['email'] ;} ?>" style="<?php if($mail_error !=''){echo 'border-bottom: 0.5px solid red;';}  ?>" id="email" type="email" name="email" placeholder="Email" ><i style="<?php if($mail_error !=''){echo 'color: red;';}  ?>" class="fa fa-envelope-o errspan" aria-hidden="true"></i>
                             <div class="error"><?php echo $mail_error; ?></div>
                        <input style="<?php if($password_error !=''){echo 'border-bottom: 0.5px solid red;';}  ?>"  id="password" type="password" name="password" placeholder="Password"><i style="<?php if($password_error !=''){echo 'color: red;';}  ?>" class="fa fa-key errspan" aria-hidden="true"></i>
                            <div class="error"><?php echo $password_error; ?></div>
                        <button id="submit" class="btn btn-primary" type="submit" name="add" value="add">Add</button>
                    </form>
        </div>

        <?php 
                    if($name_error==''&& $mail_error ==''&& $password_error ==''&& $img_error ==''){
                        include('server.php');
                    }
                    include('connect.php');
                    $query = "SELECT * FROM users";
                    $result = mysqli_query($con,$query);
                    while($row = mysqli_fetch_array($result)){
                        include('adduser.php');
                    }
                ?>                   
    
    </div>
    <div style="width: 100%; background-color:transparent; height:10px; margin-top:20; clear:both"></div>
    <script src="js/main.js"></script>
</body>
</html>
