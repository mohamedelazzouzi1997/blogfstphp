<div style="position: relative;" class="form-div">
    
    <img style="display: block;border-radius: 50%!important;
    width: 130px;height: 130px;
    position: relative;
    left: 225px;" id="img-preview" src="images/<?php echo $row['images']?>" alt="immage" class="img-preview">

    <div style="height: 30;
    width: 100%;
    position: absolute;
    top: 145;
    left: 0px;
    text-align: center;
    font-size: 25;
    font-weight: bold;
"><?php echo $row['username']?></div>

<div style="
    height: 30;
    width: 100%;
    position: absolute;
    top: 180;
    left: 0px;
    text-align: center;
    font-size: 25;
    font-weight: 300;
"><?php echo $row['email']?></div>
<div style="
    height: 30;
    width: 100%;
    position: absolute;
    top: 215;
    left: 0px;
    text-align: center;
    font-size: 25;
    font-weight: 300;
"><?php echo $row['id']." constribution"?></div>

</div>