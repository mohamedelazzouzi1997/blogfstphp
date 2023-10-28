<?php
//define msg error
$name_error = $mail_error = $password_error = $img_error ="";
$error_msg = '';
$z = 0;
$allowed_Ext = array('jpg','gif','jpeg','png');

//admin page
if(isset($_POST['add'])){
    //image
    $img_name = $_FILES['image']['name'];
   if($img_name===''){
    $img_error ="Image is required";
   }else{
    @$img_ext = strtolower(end(explode('.',$img_name)));
    if(!in_array($img_ext,$allowed_Ext)){
        $img_error ="File is not valid";
    }
   }



    //username
    if(empty($_POST['username'])){
        $name_error = "username is required";
    }
    
    if(!empty($_POST['username'])){
            $name = htmlspecialchars(strtolower(trim($_POST['username'])));
            if(!preg_match("/^[a-zA-Z0-9 ]*$/",$name)){
                $name_error = "Only letters and white space allowed";
                $z = 1;
            }
        }
    if($z != 1){
        include('connect.php');
        $query = "SELECT username FROM users";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_array($result)){
            if($row['username']=== $_POST['username']){
                $name_error = "This username already exist";
            }
        }
    }
    //email
    if(empty($_POST['email'])){
        $mail_error = "email is required";
    }else{
        $mail = htmlspecialchars(strtolower(trim(($_POST['email']))));
        if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
            $mail_error = "invalid email format";
        }
    }
    //password
    if(empty($_POST['password'])){
        $password_error = "password is required";
    }else{
        if(strlen($_POST['password'])< 6){
            $password_error = "Password must be 6 characters minimum";
        }
    }

}

//login page
if(isset($_POST['login'])){
    //username
    if(empty($_POST['username'])){
        $name_error = "username is required";
    }else{
        $name = htmlspecialchars(strtolower(trim($_POST['username'])));
        if(!preg_match("/^[a-zA-Z0-9 ]*$/",$name)){
            $name_error = "Only letters and white space allowed";
        }
    }
    //password
    if(empty($_POST['password'])){
        $password_error = "password is required";
    }

}