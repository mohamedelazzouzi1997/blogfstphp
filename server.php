<?php
    

        //admin page
        if(isset($_POST['add'])){
            //$error_msg = '';
            include('connect.php');
            $imgPath = 'images/'.basename($_FILES['image']['name']);
            $img_tmp = $_FILES['image']['tmp_name'];
        // get submit data from form
           $img = $_FILES['image']['name'];
           $username =$_POST['username'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $query ="INSERT INTO `users` (`images`, `username`, `email`, `password`) VALUES('$img','$username','$email','$password')";
            $insert = mysqli_query($con,$query);
               if($insert){
                      move_uploaded_file($_FILES['image']['tmp_name'],$imgPath);
                 }
        }
        //login page
        if(isset($_POST['login'])){
            
            $username_login = $_POST['username'];
            $password_login = md5($_POST['password']);
            if($username_login == "admin" && $_POST['password'] == "admin"){
                $_SESSION['admin']='admin';
                header("location: admin.php");
            }
            include('connect.php');
            $query = "SELECT * FROM users WHERE username='$username_login' AND password='$password_login'";
            $result = mysqli_query($con,$query);
                if(mysqli_num_rows($result)>0){
                    $_SESSION['username'] = $username_login;
                    header("location: catalog.php");
                
                }else{
                    $error_msg = 'wrong username or password!';
                }

        }
        //logout
        if(isset($_GET['logoutadmin'])){
            session_destroy();
            unset($_SESSION['admin']);
        }elseif(isset($_GET['logoutuser'])){
            session_destroy();
            unset($_SESSION['username']);
        }

        //catalog upload data

        if(isset($_POST['upload'])){
            $username = $_SESSION['username'];
            $img_name = $_POST['img_name'];
            $img_location = $_POST['img_location'];
            $img_description = $_POST['img_description'];
            $img_price = $_POST['img_price'];
            $img_copie = $_POST['img_copie'];
            $img_file = $_FILES['img_file']['name'];

            $imgPath = 'catalog/'.basename($img_file);
            $img_tmp = $_FILES['img_file']['tmp_name'];

            $q = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($con,$q);

            if($row = mysqli_fetch_array($result)){
                
                $id_row = $row['id'];
                $query = "INSERT INTO `user_catalog`(  
                `images_name`,
                `images_location`,
                `images_description`,
                `images_price`,
                `images_copie`,
                `img_file`,
                `user_id`
                )
              VALUES(
                  '$img_name',
                  '$img_location',
                  '$img_description',
                  '$img_price',
                  '$img_copie',
                  '$img_file',
                  '$id_row'
                  )";

            $insert = mysqli_query($con,$query);
            if($insert){
                
                move_uploaded_file($_FILES['img_file']['tmp_name'],$imgPath);
            }
            }
        }

        //delete button
        if(isset($_GET['delete'])){
            $id = $_GET['delete'];
            $q = "DELETE FROM user_catalog WHERE id='$id'";
            mysqli_query($con,$q) or die($con);
        }
        if(isset($_POST['edit'])){
            $id = $_POST['id'];
            
            $img_name = $_POST['img_name'];
            $img_location = $_POST['img_location'];
            $img_description = $_POST['img_description'];
            $img_price = $_POST['img_price'];
            $img_copie = $_POST['img_copie'];
            $img_file = $_FILES['img_file']['name'];

            $imgPath = 'catalog/'.basename($img_file);
            $img_tmp = $_FILES['img_file']['tmp_name'];
            
            $q = "UPDATE user_catalog SET 
                images_name='$img_name',
                images_location='$img_location',
                images_description='$img_description',
                images_price='$img_price',
                images_copie='$img_copie',
                img_file='$img_file'
                  WHERE id=$id";
            $result = mysqli_query($con,$q); 
            if($result){
                
                move_uploaded_file($_FILES['img_file']['tmp_name'],$imgPath);
            }
       
        }

?>