<?php 
include "functions.php";
$id=get('id');
// error_reporting(0);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include "dbconn.php";

// $name=get('name');
// $slug=get('slug');
// $sku=get('sku');
// $moq=get('moq');
// $categories=get('categories');
// $search_keywords=get('search_keywords');
// $price=get('price');
// $discount_type=get('discount_type');
// $discount_value=get('discount_value');

// $insert= array();
// $insert['name']=$name;
// $insert['slug']=$slug;
// $insert['sku']=$sku;
// $insert['moq']=$moq;
// $insert['categories']=$categories;
// $insert['search_keywords']=$search_keywords;
// $insert['price']=$price;
// $insert['discount_type']=$discount_type;
// $insert['discount_value']=$discount_value;

$name = $slug = $sku = $moq = $categories = $search_keywords = $price = $discount_type = $discount_value ='';
$error = array('name' =>'', 'slug' =>'', 'sku' => '','moq'=>'','categories'=>'','search_keywords'=>'','price'=>'','discount_type'=>'','discount_value'=>'');
		if (isset($_POST['submit'])) {
			if (empty($_POST['name'])){
 				$error['name']="name can be required" ;
 			}else{
 			    $name = $_POST['name'];
	 			if(!preg_match('/^[A-Za-z-]+$/', $name)){
	 			$error['name'] =  "name can be only letter" ;
	 			}
 			}
		 	if (empty($_POST['slug'])){
		 		$error['slug'] =  "slug can be required" ;
		 	}else{
			 	$slug = $_POST['slug'];
	 			if(!preg_match('/^[A-Za-z-]+$/', $slug)){
	 			$error['slug'] =  "slug can be only letter" ;
	 			}
		 	}
		 	if(empty($_POST['sku'])){
		 		$error['sku'] =  "sku can be required" ;
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
		    	$error['categories'] =  "categories can be required" ;
		 	}else{
			 	$categories = $_POST['categories'];
	 			if(!preg_match('/^[A-Za-z-]+$/', $categories)){
	 			$error['categories'] =  "categories can be only letter" ;
	 			}

		    }
		    if(empty($_POST['search_keywords'])){
		    	$error['search_keywords'] =  "search_keywords can be required" ;
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
		    	$error['discount_type'] =  "discount_type can be required" ;
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
		 		$categories = mysqli_real_escape_string($db,$_POST['categories']);
		 		$search_keywords = mysqli_real_escape_string($db, $_POST['search_keywords']);
		 		$price = mysqli_real_escape_string($db, $_POST['price']);
		 		$discount_type = mysqli_real_escape_string($db, $_POST['discount_type']);
		 		$discount_value = mysqli_real_escape_string($db, $_POST['discount_value']);

				// $query= insert('product',$insert,$db);
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
<?php 
//if($id !=get('id')){?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<section class="container grey-text">
	<form method="POST" action="">
		<input type="hidden" name="id">
		Name: <input type="text" name="name" value="<?php echo htmlspecialchars($name)?>" required>
  		<span id="name" style="color: red"><?php echo $error['name'];?></span>
  		<br>
		<br>
		Slug:<input type="text" name="slug" value="<?php echo htmlspecialchars($slug) ?>" required>
		<span id="slug" style="color: red"><?php echo $error['slug'];?></span>
		<br>
		<br>
		Sku :<input type="text" name="sku" value="<?php echo htmlspecialchars($sku) ?>" required>
		<span id="sku" style="color: red"><?php echo $error['sku'];?></span>
		<br>
		<br>
		moq :<input type="number" name="moq" value="<?php echo htmlspecialchars($moq) ?>" required>
		<span id="moq" style="color: red"><?php echo $error['moq'];?></span>
		<br>
		<br>
		categories :<input type="text" name="categories" value="<?php echo htmlspecialchars($categories) ?>" required>
		<span id="categories" style="color: red"><?php echo $error['categories'];?></span>
		<br>
		<br>
		search_keywords:<input type="text" name="search_keywords" value="<?php echo htmlspecialchars($search_keywords) ?>" required>
		<span id="search_keywords" style="color: red"><?php echo $error['search_keywords'];?></span>
		<br>
		<br>
		price :<input type="number" name="price" value="<?php echo htmlspecialchars($price) ?>" required>
		<span id="price" style="color:red"><?php echo $error['price'];?></span>
		<br>
		<br>
		discount_type :<input type="text" name="discount_type" value="<?php echo htmlspecialchars($discount_type) ?>" required>
		<span id="discount_type" style="color: red"><?php echo $error['discount_type'];?></span>
		<br>
		<br>
		discount_value :<input type="number" name="discount_value" value="<?php echo htmlspecialchars($discount_value) ?>" required>
		<span id="discount_value" style="color: red"><?php echo $error['discount_value'];?></span>
		<br>
		<br>
		<input type="submit" name="submit" value="submit">
		</form>
	</section>
</body>
</html>
<?php 
if($id=get('id')){?>

	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<section class="container grey-text">
		<form method="POST"  >
			<!-- <input type="hidden" name="id"> -->
			Name123: <input type="text" name="name" value="" Required>
	  	    
	  		<br>
			<br>
			Slug:<input type="text" name="slug" value="" required>
			<!-- <span id="slug" style="color: red"><?php echo $error['slug'];?></span> -->
			<br>
			<br>
			Sku :<input type="text" name="sku" value="" required>
			<!-- <span id="sku" style="color: red"><?php echo $error['sku'];?></span> -->
			<br>
			<br>
			moq :<input type="number" name="moq" value="" required>
			<!-- <span id="moq" style="color: red"><?php echo $error['moq'];?></span> -->
			<br>
			<br>
			categories :<input type="text" name="categories" value="" required>
			<!-- <span id="categories" style="color: red"><?php echo $error['categories'];?></span> -->
			<br>
			<br>
			search_keywords:<input type="text" name="search_keywords" value="" required>
			<!-- <span id="search_keywords" style="color: red"><?php echo $error['search_keywords'];?></span> -->
			<br>
			<br>
			price :<input type="number" name="price" value="" required>
			<!-- <span id="price" style="color:red"><?php echo $error['price'];?></span> -->
			<br>
			<br>
			discount_type :<input type="text" name="discount_type" value="" required>
			<!-- <span id="discount_type" style="color: red"><?php echo $error['discount_type'];?></span> -->
			<br>
			<br>
			discount_value :<input type="number" name="discount_value" value="" required>
			<!-- <span id="discount_value" style="color: red"><?php echo $error['discount_value'];?></span> -->
			<br>
			<br>
			<input type="submit" name="submit" value="submit">
			</form>
		</section>
	</body>
	</html>
<?php }
$select=mysqli_query($db,"SELECT * FROM product WHERE id='$id'");

$raw =mysqli_fetch_array($select);

if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$slug=$_POST['slug'];
	$sku=$_POST['sku'];
	$moq=$_POST['moq'];
	$categories=$_POST['categories'];
	$search_keywords=$_POST['search_keywords'];
	$price=$_POST['price']; 
	$discount_type=$_POST['discount_type'];
	$discount_value=$_POST['discount_value'];

	$edit=mysqli_query($db,"UPDATE product SET name='$name', slug='$slug', sku = '$sku' ,moq='$moq', categories='$categories',search_keywords='$search_keywords', price='$price', discount_type='$discount_type',discount_value='$discount_value' WHERE id= '$id'");
	if($edit){
		header("location:product_form.php");
		exit;
	}else{
		mysqli_error();
	}
}
?>