<?php 

// error_reporting(0);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include "dbConn.php";
// $name = $slug = $sku = $moq = $categories = $search_keywords = $price = $discount_type = $discount_value ='';
// $error = array('name' =>'', 'slug' =>'', 'sku' => '','moq'=>'','categories'=>'','search_keywords'=>'','price'=>'','discount_type'=>'','discount_value'=>'');

if (isset($_POST['submit'])) {
 	$name=$_POST['name'];
 	$slug=$_POST['slug'];
 	$sku = $_POST['sku'];
 	$moq=$_POST['moq'];
 	$categories=$_POST['categories'];
 	$search_keywords=$_POST['search_keywords'];
 	$price=$_POST['price'];
 	$discount_type=$_POST['discount_type'];
 	$discount_value=$_POST['discount_value'];
		 	
		 		
		 	 	
		  //   if(empty($_POST['categories'])){
		  //   	$error['categories'] =  "categories can be only letter" ;
		 	// }else{
			 // 	$categories = $_POST['categories'];
	 		// 	if(!preg_match('/^[A-Za-z-]+$/', $categories)){
	 		// 	$error['categories'] =  "categories can be only letter" ;
	 		// 	}

		  //   }
		  //   if(empty($_POST['search_keywords'])){
		  //   	$error['search_keywords'] =  "search_keywords can be only letter" ;
		 	// }else{
			 // 	$search_keywords = $_POST['search_keywords'];
	 		// 	if(!preg_match('/^[A-Za-z-]+$/', $search_keywords)){
	 		// 	$error['search_keywords'] =  "search_keywords can be only letter" ;
	 		// 	}
		  //   }
		  //   if(empty($_POST['price'])){
		 	// 	$error['price'] = 'price is required' . '</br>';
		 	// }else{
		 	// 	$price = $_POST['price'];
		 	// 	if(!filter_var($price, FILTER_VALIDATE_INT)){
		 	// 		$error['price'] ='price can be integer';
		 	// 	}
		 	// }
		 	//  if(empty($_POST['discount_type'])){
		  //   	$error['discount_type'] =  "discount_type can be only letter" ;
		 	// }else{
			 // 	$discount_type = $_POST['discount_type'];
	 		// 	if(!preg_match('/^[A-Za-z-]+$/', $discount_type)){
	 		// 	$error['discount_type'] =  "discount_type can be only letter" ;
	 		// 	}
		  //   }
		  //    if(empty($_POST['discount_value'])){
		 	// 	$error['discount_value'] = 'discount_value is required';
		 	// }else{
		 	// 	$discount_value = $_POST['discount_value'];
		 	// 	if(!filter_var($discount_value, FILTER_VALIDATE_INT)){
		 	// 		$error['discount_value']="discount_value can be integer";
		 	// 	}
		 	// }
		  //  if (array_filter($error)){
		   	
 			// }else{
		 	// 	$name = mysqli_real_escape_string($db, $_POST['name']);
		 	// 	$slug = mysqli_real_escape_string($db, $_POST['slug']);
		 	// 	$sku = mysqli_real_escape_string($db, $_POST['sku']);
		 	// 	$moq = mysqli_real_escape_string($db, $_POST['moq']);
		 	// 	$categories = mysqli_real_escape_string($db, $_POST['categories']);
		 	// 	$search_keywords = mysqli_real_escape_string($db, $_POST['search_keywords']);
		 	// 	$price = mysqli_real_escape_string($db, $_POST['price']);
		 	// 	$discount_type = mysqli_real_escape_string($db, $_POST['discount_type']);
		 	// 	$discount_value = mysqli_real_escape_string($db, $_POST['discount_value']);
				    
	    $sql = mysqli_query($db,"INSERT INTO product(name, slug, sku, moq, categories, search_keywords, price, discount_type, discount_value) VALUES('$name', '$slug','$sku', '$moq', '$categories', '$search_keywords', '$price','$discount_type', '$discount_value')");
			     if(!$sql)
			    {
			    	echo mysqli_error();
			    }
			    else
			    {

			        header('location:product_form.php');
			    	
			    }
}
		
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">  
        var specialKeys = new Array();  
        specialKeys.push(8);  
        function isNumber(evt) {
	    evt = (evt) ? evt : window.event;
	    var charCode = (evt.which) ? evt.which : evt.keyCode;
	    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	        return false;
	    }
	    return true;
		}
        function ValidateAlpha(evt)
   		 {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
   		}
   		function Validate(e) {
        var keyCode = e.keyCode || e.which;
 
        var lblError = document.getElementById("lblError");
        lblError.innerHTML = "";
        var regex = /^[A-Za-z]+$/;
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            lblError.innerHTML = "Only Alphabets allowed.";
        }
 
        return isValid;
    }
</script>  
</head>
<body>
	<section class="container grey-text">
	<form method="POST" action="">
		Name: <input type="text" name="name" onkeypress="return Validate(event);"/>
		<span id="lblError" style="color: red"></span>
  		<br>
		Slug:<input type="text" name="slug" onkeypress="return Validate(event);"/>
		<span id="lblError" style="color: red"></span>
		<br>
		Sku :<input type="text" name="sku" onkeypress="return ValidateAlpha(event);">
		<br>
		moq :<input type="text" name="moq" onkeypress="return isNumber(event);">
		<br>
		categories :<input type="text" name="categories" onkeypress="return Validate(event);" >
		<br>
		search_keywords:<input type="text" name="search_keywords" onkeypress="return Validate(event);">
		<br>
		price :<input type="text" name="price" onkeypress="return isNumber(event);">
		<br>
		discount_type :<input type="text" name="discount_type" onkeypress="return Validate(event);">
		<br>
		discount_value :<input type="text" name="discount_value"  pattern="[a-zA-Z]+" title="Letters only!">
		<br>
		<input type="submit" name="submit" value="submit">
		</form>
	</section>
</body>
</html>
		