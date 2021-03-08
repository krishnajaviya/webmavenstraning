<?php
include_once('functions.php');
error_reporting(0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$size =  get('size');
$binding = get('binding');
$color = get('color');
$lamination = get('lamination');
$pages = get('pages');
$qty = get('qty');
$dis = get('dis');
$price=get('price');
$discount=get('discount');

$price = $size +($color*$pages) +($binding *$pages)+($lamination + $qty);

if($qty>=50 && $qty <=99 ){
    $discount = ($price -($price* (10/100)));
    $quantity ='50-99';
    $dis = 10 . '%';     
}
elseif ($qty<=249 && $qty >=100) {
    $discount = ($price- ($price * (15/100)));
    $quantity ='100-249';
    $dis = 15 .'%';

}
elseif ($qty >=250 && $qty <=499) {
    $discount = ($price- ($price * (20/100)));
    $quantity ='250-499';
    $dis = 20 .'%';
}
elseif ($qty >=500 && $qty <=999 ) {
    $discount = ($price- ($price * (25/100)));
    $quantity ='500-999';
    $dis = 25 . '%';    
}
elseif ($qty >=1000 ) {
    $discount = ($price- ($price * (30/100)));
    $quantity ='1000+';
    $dis =30 . '%' ;
    
}else{
    $discount = ($price- ($price * (0/100)));
    $quantity='1-49';
    $dis ='-';
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title></title>
</head> 
<body>
    <form action="" method="post">
        <div class="row">
            <div class="col">
                <label for="size">size</label>
                <div class="dropdownmenu">
                    <select class="form-control" name="size">
                        <option value="" <?php if($size== "") echo "selected"; ?>></option>
                        <?php $sizes = array("6x9"=>"1.50","5.5x8.5"=>"1.50", "7.5x7.5"=>"1.50","8.5x11"=>"1.50");?>

                        <?php 
                        foreach ($sizes as $size_value =>$si){ ?>
                        
                        <option  value="<?php echo $size_value; ?>"<?php if(isset($_POST['size']) && $_POST['size'] == $size_value){ echo 'selected ="selected"';} ?>><?php echo $size_value?></option>
                              <?php }  ?>        
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="binding">binding</label>
                <div class="dropdownmenu">
                    <select class="form-control"name="binding">
                        <option value="" <?php if($binding== "") echo "selected"; ?>></option>
                        <?php $bindings =array("spiral"=>"0.02","perfect"=>"10.00");?>
                        <?php 
                        foreach ($bindings as $binding_value =>$bi) {?>
                      
                        <option  value="<?php echo $binding_value; ?>"<?php if(isset($_POST['binding']) && $_POST['binding'] == $binding_value){ echo 'selected ="selected"';} ?>><?php echo $binding_value?></option>
                              <?php }  ?>     
                    </select>
                </div> 
            </div>
            <div class="col">
                <label for="color" align="center">Color</label>
                <div class="dropdownmenu">
                    <select class="form-control" name="color">
                        <option value="" <?php if($color== "") echo "selected"; ?>></option>
                        <?php $colors = array("Black n White Interior / Color Cover"=>"0.032","Full Color Interior / Color Cover"=>"0.11", "cream Color Interior / Color Cover"=>"0.04");?>

                        <?php 
                        foreach ($colors as $color_value =>$ci){ ?>

                         <option  value="<?php echo $color_value; ?>"<?php if(isset($_POST['color']) && $_POST['color'] == $color_value){ echo 'selected ="selected"';} ?>><?php echo $color_value?></option>
                              <?php }  ?> 
                    </select>
                </div> 
            </div>
            <div class="col">
                <label for="lamination">Lamination</label>
                <div class="dropdownmenu">
                    <select class="form-control"name="lamination">
                        <option value="" <?php if($lamination== "") echo "selected"; ?>></option>
                        <?php $laminations=array("glossy"=>"0.00","matt"=>"1.00");?>
                        <?php 
                        foreach ($laminations as $lamination_value => $li) {?>
                        <option value="<?php echo $lamination_value;?>"<?php if(isset($_POST['lamination'])&&$_POST['lamination']==$lamination_value){echo 'selected="selected"';}?>><?php echo $lamination_value;?></option>
                       <?php }?>
                        
                    </select>
                </div> 
            </div>
        </div>
        <div class="row">   
            <div class="col-md-3">
                <label for ="pages">pages</label>
                <div class="text">
                    <?php
                     $pages = !empty($_POST['pages']) ? $_POST['pages'] : '';
                     $qty = !empty($_POST['qty']) ? $_POST['qty'] : '';
                    ?>
                    <input type="text" class="form-control"name="pages" value="<?php echo $pages;?>"/>
                </div>
            </div>
            <div class="col-md-3">
                    <label for="qty">quantity</label>
                <div class="input-group mb-1">
                    <input type="text" name="qty" class="form-control" aria-describedby="basic-addon3" value="<?php echo $qty;?>"/>
                 </div>
            </div>
        </div>
        <p id="demo"></p>
        <div class="row">
            <button type="submit" class="btn btn-primary" name="submit">submit</button>
        </div>
        </form>
        <?php if (isset($_POST['submit'])) {?>
            <div class="container">
                <div class="row text-white bg-dark">
                <div class="col">
                    <label for ="qty">quantity</label>
                </div>
                <div class="col">
                    <label for="price" name ="price">price</label>
                    
                </div>
                <div class="col">
                    <label for="discount" name ="discount">Actualprice</label>
                </div>
                <div class="col">
                    <label for ="dis" name ="dis">Discount</label>
                </div>
            </div>
                <div class ="row">
                    <div class="col">
                        <?php echo $quantity ;?>
                    </div>
                    <div class="col">
                        <?php echo '$'. $price;?>
                    </div>
                    <div class="col">
                        <?php echo '$'. $discount;?>
                    </div>
                    <div class="col">
                        <?php echo  $dis ; ?>
                    </div>
                </div>
        
            <?php }?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</body>
</html>