<?php 
include "dbconn.php";
include_once('functions.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id= get('id');
$name = $slug = $sku = $moq = $categories = $search_keywords = $price = $discount_type = $discount_value ='';
$error = array('name' =>'', 'slug' =>'', 'sku' => '','moq'=>'','categories'=>'','search_keywords'=>'','price'=>'','discount_type'=>'','discount_value'=>'');

if (isset($_POST['submit'])){
	if (empty($_POST['name'])){
			$error['name']="name can be required" ;
	}else{  
		$name=$_POST['name'];
		if(!preg_match('/^([A-Za-z\s\@\0-9]+)(,\s*[A-Za-z\s\0-9]*)*$/', $name)){
			$error['name'] =  "name can be only letter" ;
			
		}
	}
 	if (empty($_POST['slug'])){
 		$error['slug'] =  "slug can be required" ;
 	}else{
	 	$slug=$_POST['slug'];
	 	if(!preg_match('/^([A-Za-z\s\@\0-9]+)(,\s*[A-Za-z\s\0-9]*)*$/', $slug)){
			$error['slug'] =  "slug can be only letter" ;
	
		}
	}
 	if(empty($_POST['sku'])){
 		$error['sku'] =  "sku can be required" ;
 	}else{
	 	$sku=$_POST['sku'];
	 	if(!preg_match('/^([A-Za-z\s\@\0-9]+)(,\s*[A-Za-z\s\0-9]*)*$/', $sku)){
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
	 	$categories=$_POST['categories'];
	 	if(!preg_match('/^([A-Za-z\s\@\0-9]+)(,\s*[A-Za-z\s\0-9]*)*$/', $categories)){
			$error['categories'] =  "categories can be only letter" ;
		}
    }
    if(empty($_POST['search_keywords'])){
    	$error['search_keywords'] =  "search_keywords can be required" ;
 	}else{
	 	$search_keywords=$_POST['search_keywords'];
	 	if(!preg_match('/^([A-Za-z\s\@\0-9]+)(,\s*[A-Za-z\s\0-9]*)*$/', $search_keywords)){
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
	 	$discount_type= $_POST['discount_type'];
	 	if(!preg_match('/^([A-Za-z\s\@\0-9]+)(,\s*[A-Za-z\s\0-9]*)*$/', $discount_type)){
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
   	if (!array_filter($error)){

		$update = array();
		$update['name'] = $name;
		$update['slug'] = $slug;
		$update['sku'] = $sku;
		$update['moq'] = $moq;
		$update['categories'] = $categories;
		$update['search_keywords'] = $search_keywords;
		$update['price'] = $price;
		$update['discount_type'] = $discount_type;
		$update['discount_value'] = $discount_value;
	
		if(isset($_GET['id'])){
			echo "test";
			$id=$_GET['id'];
			$wh = "id='" . $id . "'";
			$res = update('product', $wh, $update , $dbh);
			if(!$res){
				mysqli_error($dbh);
			}else{
				header("Location: product_form.php");
			}
			
			
			// $edit=mysqli_query($dbh,"UPDATE product SET name='$name', slug='$slug', sku='$sku', moq='$moq', categories='$categories', search_keywords='$search_keywords', price='$price', discount_type='$discount_type',discount_value='$discount_value' WHERE id='$id'");
			//echo $edit;
			// if($edit){
			// 	header("location:product_form.php");
			// }else{
			// 	mysqli_error();
			//}
		}else{
			$sql=insert('product', $update , $dbh);
			if(!$sql){
				mysqli_error($dbh);
			}else{
			header("Location: product_form.php");
			}
			// $sql = mysqli_query($dbh,"INSERT INTO product(name, slug, sku, moq, categories, search_keywords, price, discount_type, discount_value) VALUES('$name', '$slug','$sku', '$moq', '$categories', '$search_keywords', '$price','$discount_type', '$discount_value')");
		 //     if(!$sql)
		 //    {
		 //    	echo mysqli_error();
		 //    }
			// else
			// {
			// 	header('location:product_form.php');    	
			// }
		}

	}
}
if(isset($_GET['id'])){
	$select =mysqli_query($dbh,"SELECT * FROM product WHERE id ='$id'");
	while($raw =mysqli_fetch_array($select)){
		$id=$raw['id'];
	   	$name= $raw['name'];
	    $slug= $raw['slug'];
	    $sku= $raw['sku'];
	    $moq= $raw['moq'];
	    $categories =$raw['categories'];
	    $search_keywords = $raw['search_keywords'];
	    $price =$raw['price'];
	    $discount_type =$raw['discount_type'];
	    $discount_value= $raw['discount_value'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class ="container">
		<form method="POST" action="">
			<div class="form-group">
				<input type="hidden" name="id">
				<div class="row">
					<div class="col">
						Name:<input type="text" name="name" class="form-control mb-2 mr-sm-2" value="<?php echo htmlspecialchars($name)?>" required>
						<span id="name" style="color: red"><?php echo $error['name'];?></span>
					</div>
					<div class="col">
						Slug:<input type="text" name="slug" class="form-control mb-2 mr-sm-2" value="<?php echo htmlspecialchars($slug) ?>" required>
						<span id="slug" style="color: red"><?php echo $error['slug'];?></span>
					</div>
				</div>
				<div class="row">
					<div class="col">
						Sku :<input type="text" name="sku" class="form-control mb-2 mr-sm-2" value="<?php echo htmlspecialchars($sku) ?>" required>
						<span id="sku" style="color: red"><?php echo $error['sku'];?></span>
					</div>
					<div class="col">
						moq :<input type="number" name="moq" class="form-control mb-2 mr-sm-2" value="<?php echo htmlspecialchars($moq) ?>" required>
						<span id="moq" style="color: red"><?php echo $error['moq'];?></span>
					</div>
				</div>
				<div class="row">
					<div class="col">
						categories :<input type="text" name="categories" class="form-control mb-2 mr-sm-2" value="<?php echo htmlspecialchars($categories) ?>" required>
						<span id="categories" style="color: red"><?php echo $error['categories'];?></span>
					</div>
					<div class="col">
						search_keywords:<input type="text" name="search_keywords" class="form-control mb-2 mr-sm-2" value="<?php echo htmlspecialchars($search_keywords) ?>" required>
						<span id="search_keywords" style="color: red"><?php echo $error['search_keywords'];?></span>
					</div>
				</div>
				<div class="row">
					<div class ="col">
						price:<input type="number" name="price" class="form-control mb-2 mr-sm-2" value="<?php echo htmlspecialchars($price) ?>" required>
						<span id="price" style="color:red"><?php echo $error['price'];?></span>
					</div>
					<div class="col">
						discount_type:<input type="text" name="discount_type" class="form-control mb-2 mr-sm-2" value="<?php echo htmlspecialchars($discount_type) ?>" required>
						<span id="discount_type" style="color: red"><?php echo $error['discount_type'];?></span>
					</div>
				</div>
				discount_value:<input type="number" name="discount_value" class="form-control mb-2 mr-sm-2" value="<?php echo htmlspecialchars($discount_value) ?>" required>
				<span id="discount_value" style="color: red"><?php echo $error['discount_value'];?></span>
				
				<button type="submit" name="submit" class = "btn btn-primary" value="submit">Submit</button> 
			</div>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</body>
</html>
