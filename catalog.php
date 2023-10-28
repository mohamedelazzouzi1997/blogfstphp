<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location: login.php");
        exit();
    }
    include('connect.php');
    include('server.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
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
        <a href="catalog.php" class="w3-bar-item w3-button"><i class="fa ffa fa-sliders fa-2x"></i><span class="bar-name">store</span></a>
        <a href="profil.php" class="w3-bar-item w3-button"><i class="fa fa-users fa-2x"></i><span class="bar-name">User</span></a>
        <a href="login.php" class="w3-bar-item w3-button"><i class="fa fa-info-circle fa-2x"></i><span class="bar-name">Logs</span></a>
        <a href="login.php?logoutuser='2'" class="w3-bar-item w3-button"><i class="fa fa-sign-out fa-2x"></i><span class="bar-name">Out</span></a>
    </div>
 
         <div style="padding-left: 85px; background-color: rgb(170, 170, 170); width: 100%; position: relative; margin-left: 58px; font-size: 20px; font-weight:bold;"><?php echo ' <span style="color:seagreen;">Welcome </span>' . $_SESSION['username'] ?></div>
  
    <div class="container">
        <div class="row">
                <div class="col-4">
                    <div class="form_div3">
                        <button class="btn btn_add" id="catalog_btn"><i class="fa fa-plus-circle fa-5x" aria-hidden="true" ></i></button>
                        <form class="catalog_form"  action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="catalog_form" enctype="multipart/form-data"> 
                            <input class="img_name" type="text" name="img_name" placeholder="Picture name">
                            <input type="text" name="img_location" placeholder="Location">
                            <textarea name="img_description" cols="45" rows="10" placeholder="Picture Description"></textarea>
                            <input class="img_file" type="file" name="img_file">
                            <input class="img_price" type="text" name="img_price" placeholder="Picture Price" id="">
                            <input class="img_copie" type="text" name="img_copie" placeholder="Number of copies" id="">
                            <button class="check btn btn-primay" name="upload" type="submit"><i class="fa fa-check"></i></button>
                        </form>
                    </div>
                </div> 
                    <?php
                         include('connect.php');
                         $username = $_SESSION['username'];
                                $q = "SELECT * FROM users WHERE username='$username'";
                                $result = mysqli_query($con,$q);
                                if($row = mysqli_fetch_array($result)){
                                    $id_row = $row['id'];
                                    $query = "SELECT * FROM user_catalog WHERE user_id='$id_row'";
                                    $result = mysqli_query($con,$query);
                                    while($row = mysqli_fetch_array($result)){
                                        include('catalogdisplay.php');
                               }             
                    
                            }
                    ?>

            </div>    

 </div>
<div style="width: 100%; background-color:transparent; height:10px; margin-top:20">
</div>

    <script>
        const catalog_btn = document.getElementById("catalog_btn");
        const catalog_form = document.getElementById("catalog_form");
        const input = document.querySelector("input");
        catalog_btn.addEventListener("click",function(){
            catalog_btn.classList.add("none");
            catalog_form.classList.add("block");
        });

        function edit(id){
            
            document.getElementById(id.toString()).classList.add('none');
            document.getElementById('form_'+id.toString()).classList.add('block');
        }
        function cancel(id){
            
            document.getElementById(id.toString()).classList.remove('none');
            document.getElementById('form_'+id.toString()).classList.remove('block');
        }
 


    </script>
</body>
</html>