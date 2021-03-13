<?php 

// error_reporting(0);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include "dbConn.php";
 $name = $slug = $sku = $moq = $categories = $search_keywords = $price = $discount_type = $discount_value ='';
 $error = array('name' =>'', 'slug' =>'', 'sku' => '','moq'=>'','categories'=>'','search_keywords'=>'','price'=>'','discount_type'=>'','discount_value'=>'');

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
     // var specialKeys = new Array();  
     // specialKeys.push(8);  
 //     function isNumber(evt) {
	//     evt = (evt) ? evt : window.event;
	//    	var charCode = (evt.which) ? evt.which : evt.keyCode;
	//     if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	//        moq.innerHTML="only Digits";
	//      }
	//     return charCode;
	// }
	
	function digitKeyOnly(e) {
	  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
	  var moq=document.getElementById("moq");
	  if ((keyCode >= 37 && keyCode <= 40) || (keyCode == 8 || keyCode == 9 || keyCode == 13) || (keyCode >= 48 && keyCode <= 57)) {
	    return true;
	  }
	  
	  moq.innerHTML="Only digits";
	}
   	function Validatename(e) {
        var keyCode = e.keyCode || e.which;
 
        var name = document.getElementById("name");
        name.innerHTML = "";
        var regex = /^[A-Za-z]+$/;
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            name.innerHTML = "Only Alphabets allowed.";
        }
 
        return isValid;
    }
   function Validateslug(e) {
        var keyCode = e.keyCode || e.which;
 
        var slug = document.getElementById("slug");
        slug.innerHTML = "";
        var re = /^[A-Za-z]+$/;
        var isValid = re.test(String.fromCharCode(keyCode));
        if (!isValid) {
            slug.innerHTML = "Only Alphabets allowed.";
        }
 
        return isValid;
    }
   function Validatesku(e) {
        var keyCode = e.keyCode || e.which;
 
        var sku = document.getElementById("sku");
        sku.innerHTML = "";
        var reg = /^[A-Za-z]+$/;
        var isValid = reg.test(String.fromCharCode(keyCode));
        if (!isValid) {
            sku.innerHTML = "Only Alphabets allowed.";
        }
 
        return isValid;
    }
    function validatemoqnumber(value) {
		var moq=document.getElementById("moq");
         var regexp = /^[0-9]+?$/;
         var isValid= regexp.test(value);
         if(!isValid){
         	moq.innerHTML="Only digits";
         }else{
         	return isValid;
         }
	}
    function Validatecategories(e) {
        var keyCode = e.keyCode || e.which;
 
        var sku = document.getElementById("categories");
        categories.innerHTML = "";
        var reg = /^[A-Za-z]+$/;
        var isValid = reg.test(String.fromCharCode(keyCode));
        if (!isValid) {
            categories.innerHTML = "Only Alphabets allowed.";
        }
 
        return isValid;
    }
    function Validatesearch_keywords(e) {
        var keyCode = e.keyCode || e.which;
 
        var sku = document.getElementById("search_keywords");
        search_keywords.innerHTML = "";
        var reg = /^[A-Za-z]+$/;
        var isValid = reg.test(String.fromCharCode(keyCode));
        if (!isValid) {
            search_keywords.innerHTML = "Only Alphabets allowed.";
        }
 
        return isValid;
    }
    function validateprice(e) {
		var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
	  var price=document.getElementById("price");
	  if ((keyCode >= 37 && keyCode <= 40) || (keyCode == 8 || keyCode == 9 || keyCode == 13) || (keyCode >= 48 && keyCode <= 57)) {
	    return true;
	  }
	  price.innerHTML="Only digits";
	}
    function Validatediscount_type(e) {
        var keyCode = e.keyCode || e.which;
        var discount_type = document.getElementById("discount_type");
        discount_type.innerHTML = "";
        var reg = /^[A-Za-z]+$/;
        var isValid = reg.test(String.fromCharCode(keyCode));
        if (!isValid) {
            discount_type.innerHTML = "Only Alphabets allowed.";
        }
 
        return isValid;
    }
    function validatediscount_value(e) {
		var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
	  	var discount_value=document.getElementById("discount_value");
	  	if ((keyCode >= 37 && keyCode <= 40) || (keyCode == 8 || keyCode == 9 || keyCode == 13) || (keyCode >= 48 && keyCode <= 57)) {
	    return true;
	 	}
	 	 discount_value.innerHTML="Only digits";
	}
    
</script>
</head>
<body>
	<section class="container grey-text">
	<form method="POST" action="" name="myform">
		Name: <input type="text"name="name" onkeypress="return Validatename(event);" placeholder="enter alphates only" />
		<span id="name" style="color: red"></span>
  		<br><br>
		Slug:<input type="text" name="slug" onkeypress="return Validateslug(event);" placeholder="enter alphates only"/>
		<span id="slug" style="color: red"></span>
		<br><br>
		Sku :<input type="text" name="sku" onkeypress="return Validatesku(event);" placeholder="enter alphates only"/ >
		<span id ="sku" style ="color:red"></span>
		<br><br>
		moq :<input type="text" name="moq" onkeypress="return digitKeyOnly(event);" placeholder="enter only digits"/>
		<span id ="moq" style="color:red"></span>
		<br><br>
		categories :<input type="text" name="categories" onkeypress="return Validatecategories(event);" placeholder="enter alphates only">
		<span id ="categories" style="color: red"></span>
		<br><br>
		search_keywords:<input type="text" name="search_keywords" onkeypress="return Validatesearch_keywords(event);" placeholder="enter alphates only">
		<span id ="search_keywords" style="color: red"></span>
		<br><br>
		price :<input type="text" name="price" onkeypress="return validateprice(event);" placeholder="enter only digits">
		<span id ="price" style="color: red"></span>
		<br><br>
		discount_type :<input type="text" name="discount_type" onkeypress="return Validatediscount_type(event);" placeholder="enter alphates only">
 		<span id ="discount_type" style="color: red"></span>
		<br><br>
		discount_value :<input type="text" name="discount_value" onkeypress="return validatediscount_value(event);" placeholder="enter only digits">
		<span id ="discount_value" style="color: red"></span>
		<br><br>
		<input type="submit" name="submit" value="submit">
	</form>
	</section>
</body>
</html>