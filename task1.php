<?php
include_once('functions.php');

$size =  get('size');
$binding = get('binding');
$color = get('color');
$lamination = get('lamination');
$pages = get('pages');
$qty = get('qty');
$dis = get('dis');
$percentage=50;
if($qty>=50 && $qty <=99){
	 $dis = 10 . '%';
}
elseif ($qty<=249 && $qty >=100) {
	 $dis = 15 .'%';
}
elseif ($qty >=250 && $qty <=499) {
	$dis = 20 .'%';
}
elseif ($qty >=500 && $qty <=999 ) {
	$dis = 25 . '%';	
}
elseif ($qty >=1000 ) {
	$dis =30 . '%' ;
	
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
					<select class="form-control" name="size" selected="<?php echo $_POST['size'];?>">
						<option value="" <?php if($size== "") echo "selected"; ?>></option>
	        			<option  value="0" <?php if($size== "0") echo "selected"; ?>>6*9</option>
	          			<option  value="14" <?php if($size== "14") echo "selected"; ?>>7*10</option>
	          			<option value="15" <?php if($size== "15") echo "selected"; ?>>8*10</option>
	          		</select>
	       		</div>
	     	</div>
	        <div class="col">
	        	<label for="binding">binding</label>
	        	<div class="dropdownmenu">
	        		<select class="form-control"name="binding" id="select1" selected="<?php echo $_POST['binding'];?>">
	        			<option value="" <?php if($binding== "") echo "selected"; ?>></option>
	        			<option value="$0.02" <?php if($binding== "$0.02") echo "selected"; ?>>spiral</option>
	        			<option value="$10.00" <?php if($binding== "$10.00") echo "selected"; ?>>perfect</option>
	          		</select>
	          	</div> 
	        </div>
	        <div class="col">
	        	<label for="color" align="center">Color</label>
	        	<div class="dropdownmenu">
	        		<select class="form-control" name="color" id="select1" selected="<?php echo $_POST['color'];?>">
	        			<option value="" <?php if($color== "") echo "selected"; ?>></option>
	        			<option value="0.032" <?php if($color== "0.032") echo "selected"; ?>>Black n White Interior / Color Cover</option>
	            		<option value="0.11"  <?php if($color== "0.11") echo "selected"; ?>>Full Color Interior / Color Cover</option>
	            		<option value="0.04" <?php if($color== "0.04") echo "selected"; ?>>Cream Color Interior / Color Cover</option>
	          		</select>
	          	</div> 
	        </div>
	        <div class="col">
	    		<label for="lamination">Lamination</label>
	    		<div class="dropdownmenu">
	    			<select class="form-control"name="lamination" id="select1" selected="<?php echo $_POST['lamination'];?>">
	    				<option value="" <?php if($lamination== "") echo "selected"; ?>></option>
	    				<option value="$0.00" <?php if($lamination== "$0.00") echo "selected"; ?>>Glossy</option>
	            		<option value="$1.00" <?php if($lamination== "$1.00") echo "selected"; ?>>Matt</option>
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
		        	<?php $price = $size +($color * $pages) + $lamination +$binding;?>
		    	</div>
				<div class="col">
					actual price
				</div>
				<div class="col">
					<label for ="dis" name ="dis">Discount</label>
				</div>
			</div>
				<div class ="row">
					<div class="col">
						<?php echo $qty;?>
					</div>
					<div class="col">
						<?php echo '$'. $price;?>
					</div>
					<div class="col">
						<?php echo '$'. $price;?>
					</div>
					<div class="col">
						<?php echo  $dis ?>
					</div>
				</div>
		
			<?php }?>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>	
</body>
</html>