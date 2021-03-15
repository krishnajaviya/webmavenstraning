<?php 

// error_reporting(0);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include "dbConn.php";
$name = $slug = $sku = $moq = $categories = $search_keywords = $price = $discount_type = $discount_value ='';
$error = array('name' =>'', 'slug' =>'', 'sku' => '','moq'=>'','categories'=>'','search_keywords'=>'','price'=>'','discount_type'=>'','discount_value'=>'');
		if (isset($_POST['submit'])) {
			if (empty($_POST['name'])) {
 				$error['name']="name can be required" ;
 			}else{
 			$name = $_POST['name'];
	 			if(!preg_match('/^[A-Za-z-]+$/', $name)){
	 			$error['name'] =  "name can be only letter" ;
	 			}
 			}
		 	if (empty($_POST['slug'])){
		 		$error['slug'] =  "slug can be only letter" ;
		 	}else{
			 	$slug = $_POST['slug'];
	 			if(!preg_match('/^[A-Za-z-]+$/', $slug)){
	 			$error['slug'] =  "slug can be only letter" ;
	 			}
		 	}
		 	if(empty($_POST['sku'])){
		 		$error['sku'] =  "sku can be only letter" ;
		 	}else{
			 	$sku = $_POST['sku'];
	 			if(!preg_match('/^[A-Za-z-]+$/', $sku)){
	 			$error['sku'] =  "sku can be only letter" ;
	 			}
		 	}
		 	if(empty($_POST['moq'])){
		 		$error['moq'] = 'moq is required' . '</br>';
		 	}else{
		 		$moq = $_POST['moq'];
		 		if(!filter_var($moq, FILTER_VALIDATE_INT)){
		 			$error['moq'] = "moq can be number";
 				}
 			}
		    if(empty($_POST['categories'])){
		    	$error['categories'] =  "categories can be only letter" ;
		 	}else{
			 	$categories = $_POST['categories'];
	 			if(!preg_match('/^[A-Za-z-]+$/', $categories)){
	 			$error['categories'] =  "categories can be only letter" ;
	 			}

		    }
		    if(empty($_POST['search_keywords'])){
		    	$error['search_keywords'] =  "search_keywords can be only letter" ;
		 	}else{
			 	$search_keywords = $_POST['search_keywords'];
	 			if(!preg_match('/^[A-Za-z-]+$/', $search_keywords)){
	 			$error['search_keywords'] =  "search_keywords can be only letter" ;
	 			}
		    }
		    if(empty($_POST['price'])){
		 		$error['price'] = 'price is required' . '</br>';
		 	}else{
		 		$price = $_POST['price'];
		 		if(!filter_var($price, FILTER_VALIDATE_INT)){
		 			$error['price'] ='price can be integer';
		 		}
		 	}
		 	 if(empty($_POST['discount_type'])){
		    	$error['discount_type'] =  "discount_type can be only letter" ;
		 	}else{
			 	$discount_type = $_POST['discount_type'];
	 			if(!preg_match('/^[A-Za-z-]+$/', $discount_type)){
	 			$error['discount_type'] =  "discount_type can be only letter" ;
	 			}
		    }
		     if(empty($_POST['discount_value'])){
		 		$error['discount_value'] = 'discount_value is required';
		 	}else{
		 		$discount_value = $_POST['discount_value'];
		 		if(!filter_var($discount_value, FILTER_VALIDATE_INT)){
		 			$error['discount_value']="discount_value can be integer";
		 		}
		 	}
		   if (array_filter($error)){
		   	
 			}else{
		 		$name = mysqli_real_escape_string($db, $_POST['name']);
		 		$slug = mysqli_real_escape_string($db, $_POST['slug']);
		 		$sku = mysqli_real_escape_string($db, $_POST['sku']);
		 		$moq = mysqli_real_escape_string($db, $_POST['moq']);
		 		$categories = mysqli_real_escape_string($db, $_POST['categories']);
		 		$search_keywords = mysqli_real_escape_string($db, $_POST['search_keywords']);
		 		$price = mysqli_real_escape_string($db, $_POST['price']);
		 		$discount_type = mysqli_real_escape_string($db, $_POST['discount_type']);
		 		$discount_value = mysqli_real_escape_string($db, $_POST['discount_value']);
				    
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
		}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<section class="container grey-text">
	<form method="POST" action="">
		
	
		Name: <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>" >
  		<div class="red-text"><?php echo $error['name'];?></div>
  		<br>
		
		Slug:<input type="text" name="slug" value="<?php echo htmlspecialchars($slug) ?>">
		<div class="red-text"><?php echo $error['slug'];?></div>
		<br>

		Sku :<input type="text" name="sku" value="<?php echo htmlspecialchars($sku) ?>">
		<div class="red-text"><?php echo $error['sku'];?></div>
		<br>
		
		moq :<input type="number" name="moq" value="<?php echo htmlspecialchars($moq) ?>">
		<div class="red-text"><?php echo $error['moq'];?></div>
		<br>
		
		categories :<input type="text" name="categories" value="<?php echo htmlspecialchars($categories) ?>">
		<div class="red-text"><?php echo $error['categories'];?></div>
		<br>
		
		search_keywords:<input type="text" name="search_keywords" value="<?php echo htmlspecialchars($search_keywords) ?>">
		<div class="red-text"><?php echo $error['search_keywords'];?></div>
		<br>
		
		price :<input type="number" name="price" value="<?php echo htmlspecialchars($price) ?>">
		<div class="red-text"><?php echo $error['price'];?></div>
		<br>
		
		discount_type :<input type="number" name="discount_type" value="<?php echo htmlspecialchars($discount_type) ?>">
		<div class="red-text"><?php echo $error['discount_type'];?></div>
		<br>
		
		discount_value :<input type="text" name="discount_value" value="<?php echo htmlspecialchars($discount_value) ?>">
		<div class="red-text"><?php echo $error['discount_value'];?></div>
		<br>
		<input type="submit" name="submit" value="submit">
		</form>
	</section>
</body>
</html>
		