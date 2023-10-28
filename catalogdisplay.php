<head>
    <style>
        p::-webkit-scrollbar {
  width: 5px;   
              /* width of the entire scrollbar */
}

p::-webkit-scrollbar-track {
  background: transparent;  
         /* color of the tracking area */
}

p::-webkit-scrollbar-thumb {
  background-color: white;    /* color of the scroll thumb */
  border-radius: 20px;   
     /* roundness of the scroll thumb */
 
}
.form_div4{
    
    width: 100%!important;
    height: 401!important;
    border-radius: 10px!important;
    margin-top: 30px!important;
    margin-left: 10px!important;
    margin-bottom: -20!important;
}
.form_div4:hover{
            box-shadow: 5px 5px 5px black;
        }
        p {
            scrollbar-width: thin!important;          /* "auto" or "thin" */
            scrollbar-color: white transparent!important;   /* scroll thumb and track */
        }
        p{
            
            color: white!important;
        }

       .form_div4 p{
            word-wrap: break-word!important;
            opacity: 0!important;
            transition: opacity .8s ease!important;
        }
        .form_div4:hover p{
            opacity: 1!important;
        }

        .form_div4 .btn_delete{
            height: 35;
            width: 35;
            border-radius: 50%!important;
            position: relative!important;
            top: -10!important;
            left: 400!important;
            background-color: red!important;
            padding-top: 10!important;
            display: block!important;
            margin: 0!important;
            
        }
        .form_div4 .btn_delete:hover{
            color: black;
            font-size: 17px;
        }
        .form_div4 .btn_mod:hover{
            color: black;
            font-size: 17px;
        }
        .form_div4 .btn_mod{
            height: 35;
            width: 35;
            border-radius: 50%!important;
            position: relative!important;
            top: -45px!important;
            left: 360px!important;
            background-color: #ffc107!important;
            padding-top: 10!important;
            display: block!important;
        }

        .p_name{
            
            width: 100%!important;
            text-transform: uppercase!important;
            padding: 10!important;
            font-size: 20!important;
            font-weight: bold!important;
            position: relative!important;
            top: -45!important;
            left: 0!important;
        }
        .p_location{
    
            width: 100%!important;
            font-size: 15!important;
            padding: 10!important;
            font-family: cursive!important;
            font-style: italic!important;
            font-weight: bold!important;
            position: relative!important;
            top: -45!important;
            left: 0!important;
        }
        .p_description{
            width: 100%!important;
            font-family: sans-serif!important;
            padding: 10!important;
            height: 180!important;
            overflow:scroll!important;
            position: relative!important;
            top: -45!important;
            left: 0!important;
            font-weight: bold;
        }
        .p_price{
            position: relative!important;
            top: -45!important;
            left: 0!important;
            width: 188!important;
            font-size: 20!important;
            padding: 10!important;
            float: left!important;
            margin-right: 20!important;
            font-weight: bolder!important;
            
        }
        .p_copie{
            position: relative!important;
            top: -45!important;
            left: 0!important;
            width: 200!important;
            font-size: 20!important;
            padding: 10!important;
            float: left!important;
            font-weight: bolder!important;
            text-align: right;
        }
        .content{
            transition: background-color .8s ease!important;
            height: 401!important;
            border-radius: 10px!important;
            margin-bottom: 10!important;
        }
        .content:hover{
            background-color: rgba(3, 3, 3, 0.5);
            min-height: 401;
            border-radius: 10px!important;
        }
        .form_edit{
            display: none;
        }


    </style>

</head>
<div class="col-4">
    
        <div class="form_div4" style="
                background-image: url('catalog/<?php if(empty($row['img_file'])){echo'empty.jpg';}else{echo $row['img_file'];} ?>')!important;
                background-color: transparent!important;
                background-position: center center!important;
                background-repeat: no-repeat!important;
                background-size: cover!important;
                " >
                    <div id="<?php echo $row['id'] ?>" class="content" >
                                <a href="catalog.php?delete=<?php echo $row['id'] ?>" name="delete" class="btn_delete btn btn-info justify-content-center" type="submit"><i class="fa fa-trash justify-content-center" ></i></a>
                                <div  onclick="edit(<?php echo $row['id']?>);" name="edit" class="btn_mod btn btn-danger" type="submit"><i class="fa fa-pencil" ></i></div>  
                        <!--****************************************************************************************************************-->      
                                <p class="img_name p_name"><?php if(empty($row['images_name'])){echo'N/A';}else{echo $row['images_name'];}  ?></p>
                        <!--****************************************************************************************************************-->    
                                <p class="img_location p_location"><?php if(empty($row['images_location'])){echo'N/A';}else{echo $row['images_location'];} ?></p>
                        <!--****************************************************************************************************************-->
                                <p class="p_description" ><?php echo $row['images_description']; ?></p>
                        <!--****************************************************************************************************************-->
                                <p class="img_price p_price" ><?php echo $row['images_price'].'$' ?></p>
                        <!--****************************************************************************************************************-->
                                <p class="img_copie p_copie" >Copies <?php echo $row['images_copie'] ?></p>
                    </div>
                    <div style="height: 400;" class="form_edit" id="<?php echo 'form_' . $row['id'] ?>">
                   
                        <form style="padding-top: 20;" class="catalog_form_edit"  action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" id="catalog_form" enctype="multipart/form-data"> 
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>" >
                            <input style="width: 100%;" class="img_name" type="text" name="img_name" value="<?php echo $row['images_name']; ?>">
                            <input style="width: 100%;" type="text" name="img_location" value="<?php echo $row['images_location']; ?>">
                            <textarea  name="img_description" cols="45" rows="10" value="<?php echo $row['images_description']; ?>"></textarea>
                            <input  class="img_file" type="file" name="img_file" value="<?php echo $row['img_file']; ?>">
                            <input  class="img_price" type="text" name="img_price" value="<?php echo $row['images_price'] ?>">
                            <input  class="img_copie" type="text" name="img_copie" value="<?php echo $row['images_copie'] ?>">
                            <button class="check btn btn-primay" name="edit" type="submit"><i class="fa fa-check"></i></button>
                        </form>
                        <button onclick="cancel(<?php echo $row['id']?>);"  class="cancel btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                    </div>
        </div>
    
</div>
