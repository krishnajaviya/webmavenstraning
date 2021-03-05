<?php
include_once('functions.php');

$size =  get('size');
$binding = get('binding');
$color = get('color');
$lamination = get('lamination');
$pages = get('pages');
$qty = get('qty');

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
					<select class="form-control" name="size" id="select1">
	        			<option  value="0">6*9</option>
	          			<option  value="14">7*10</option>
	          			<option value="15">8*10</option>
	          		</select>
	       		</div>
	     	</div>
	        <div class="col">
	        	<label for="binding">binding</label>
	        	<div class="dropdownmenu">
	        		<select class="form-control"name="binding" id="select1">
	        			<option value="spiral">spiral</option>
	        			<option value="perfect">perfect</option>
	          		</select>
	          	</div> 
	        </div>
	        <div class="col">
	        	<label for="color" align="center">Color</label>
	        	<div class="dropdownmenu">
	        		<select class="form-control" name="color" id="select1">
	        			<option value="Black n White Interior / Color Cover">Black n White Interior / Color Cover</option>
	            		<option value="Full Color Interior / Color Cover">Full Color Interior / Color Cover</option>
	            		<option value="Cream Color Interior / Color Cover">Cream Color Interior / Color Cover</option>
	          		</select>
	          	</div> 
	        </div>
	        <div class="col">
	    		<label for="lamination">Lamination</label>
	    		<div class="dropdownmenu">
	    			<select class="form-control"name="lamination" id="select1">
	    				<option value="Glossy">Glossy</option>
	            		<option value="Matt">Matt</option>
	          		</select>
	          	</div> 
	        </div>
	    </div>
	    <div class="row">	
	    	<div class="col-md-3">
	    		<label for ="pages">pages</label>
	    		<div class="text">
	    			<input type="text" class="form-control"name="pages"/>
	        	</div>
	        </div>
	    	<div class="col-md-3">
	    			<label for="qty">quantity</label>
	    		<div class="input-group mb-1">
	    			<input type="text" name="qty" class="form-control" aria-describedby="basic-addon3"/>
	       	     </div>
	    	</div>
		</div>
		<p> 
        	<span class="output"></span>
        </p> 
		<div class="row">
			<button type="button" class="btn btn-primary" name="submit"onclick="getOption()">submit</button>
			
			<script type="text/javascript">
	        	function getOption() { 
	            selectElement = document.querySelector('#select1'); 
	                      
	            output =selectElement.options[selectElement.selectedIndex].value; 
	  
	            document.querySelector('.output').textContent = output; 
	       		 } 
    		</script> 
		</div>
		</form>
		<?php if(isset($_POST['submit'])) {?>
		<?php }?>
		<div class="row">
			<div class="col">
				<label for ="pages">pages</label>
			</div>
		<div class="col">
	        	<label for="price">price</label>
	    </div>
		<div class="col">
				actual price
		</div>
		<div class="col">
				discount
		</div>
	</div>


	
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
</body>
</html>