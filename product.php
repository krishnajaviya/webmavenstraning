<?php 
include "dbconn.php";
include_once('functions.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$name = $slug = $sku = $moq = $categories = $search_keywords = $price = $discount_type = $discount_value ='';
$error = array('name' =>'', 'slug' =>'', 'sku' => '','moq'=>'','categories'=>'','search_keywords'=>'','price'=>'','discount_type'=>'','discount_value'=>'');

$id = get('id');
$name = get('name');
$slug = get('slug');
$sku = get('sku');
$moq = get('moq');
$categories = get('categories');
$search_keywords = get('search_keywords');
$price = get('price');
$discount_type = get('discount_type');
$discount_value = get('discount_value');

if (isset($_POST['submit'])){
	// if (empty($_POST['name'])){
	// 	$error['name']="name can be required" ;
	// }else{
	// 	$name=$_POST['name'];
	// 	if(!preg_match('/^([A-Za-z\s\@\0-9]+)(,\s*[A-Za-z\s\0-9]*)*$/', $name)){
	// 		$error['name'] =  "name can be only letter" ;
	// 	}
	// }

	// if (empty($_POST['slug'])){
	// 	$error['slug'] =  "slug can be required" ;
	// }else{
	// 	$slug=$_POST['slug'];
	// 	if(!preg_match('/^([A-Za-z\s\@\0-9]+)(,\s*[A-Za-z\s\0-9]*)*$/', $slug)){
	// 		$error['slug'] =  "slug can be only letter" ;
	// 	}
	// }
	
	// if(empty($_POST['sku'])){
	// 	$error['sku'] =  "sku can be required" ;
	// }else{
	// 	$sku=$_POST['sku'];
	// 	if(!preg_match('/^([A-Za-z\s\@\0-9]+)(,\s*[A-Za-z\s\0-9]*)*$/', $sku)){
	// 		$error['sku'] =  "sku can be only letter" ;
	// 	}
	// }
	// if(empty($_POST['moq'])){
	// 	$error['moq']= "moq is required";
	// }else{
	// 	$moq=$_POST['moq'];
	// }
	// if(empty($_POST['search_keywords'])){
	// 	$error['search_keywords'] =  "search_keywords can be required" ;
	// }else{
	// 	$search_keywords=$_POST['search_keywords'];
	// 	if(!preg_match('/^([A-Za-z\s\@\0-9]+)(,\s*[A-Za-z\s\0-9]*)*$/', $search_keywords)){
	// 		$error['search_keywords'] =  "search_keywords can be only letter" ;
	// 	}
	// }
	// if(empty($_POST['price'])){
	// 	$error['price']= "price is required";
	// }else{
	// 	$moq=$_POST['price'];
	// }
	// if(empty($_POST['discount_type'])){
	// 	$error['discount_type'] =  "discount typecan be required" ;
	// }else{
	// 	$search_keywords=$_POST['discount_type'];
	// 	if(!preg_match('/^([A-Za-z\s\@\0-9]+)(,\s*[A-Za-z\s\0-9]*)*$/', $discount_type)){
	// 		$error['discount_type'] =  "discount_type can be only letter" ;
	// 	}
	// }
	// if(empty($_POST['discount_value'])){
	// 	$error['discount_value']= "discount value is required";
	// }else{
	// 	$moq=$_POST['discount_value'];
	// }
	
	if ($error['name'] != '' || $error['slug'] != '' || $error['sku'] != '' || $error['moq'] != '' || $error['categories'] != '' || $error['search_keywords'] != '' || $error['price'] != '' || $error['discount_type'] != '' || $error['discount_value'] != ''){
		echo "Error";
	}else{
		$upadate=array();
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
			// Update
			$id=$_GET['id'];
			$wh = "id='" . $id . "'";
			$res = update('product', $wh, $update);
			header("Location: product_form.php");
			if(!$res){
				mysqli_error($dbh);
			}else{
				header("Location: product_form.php");
			}
		}else{
			// Insert
			insert('product',$update,$dbh);
			header("Location: product_form.php");
			
		}
	}
}
if(isset($_GET['id'])){
	// Get product data
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
	<!-- <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/jquery.validate.js"></script>
	<script src="js/product.form.js"></script> -->
</head>
<body>
	<div class ="container">
		<form method="POST" id="productform">
			<div class="form-group">
				<div class="row">
					<div class="col">
						<label for="name">name</label>
						<input type="text" id="name" name="name" class="form-control mb-2 mr-sm-2" value="<?php echo htmlspecialchars($name)?>">
						<span id="name" style="color: red"><?php echo $error['name'];?></span>
					</div>
					<div class="col">
						<label for="slug">slug</label>
						<input type="text" id="slug" name="slug" class="form-control mb-2 mr-sm-2" value="<?php echo htmlspecialchars($slug) ?>">
						<span id="slug" style="color: red"><?php echo $error['slug'];?></span>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label for="sku">sku</label>
						<input type="text" id="sku" name="sku" class="form-control mb-2 mr-sm-2" value="<?php echo htmlspecialchars($sku) ?>">
						<span id="sku" style="color: red"><?php echo $error['sku'];?></span>
					</div>
					<div class="col">
						<label for="moq">moq</label>
						<input name="moq" id ="moq" class="form-control mb-2 mr-sm-2" type="number" value="<?php echo htmlspecialchars($moq)?>">
						<span id="errmsg"></span>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label for="categories">categories</label>
						<input type="text" id="categories" name="categories" class="form-control mb-2 mr-sm-2" value="<?php echo htmlspecialchars($categories) ?>">
						<span id="categories" style="color: red"><?php echo $error['categories'];?></span>
					</div>
					<div class="col">
						<label for="search_keywords">search_keywords</label>
						<input type="text" id="search_keywords" name="search_keywords" class="form-control mb-2 mr-sm-2" value="<?php echo htmlspecialchars($search_keywords) ?>">
						<span id="search_keywords" style="color: red"><?php echo $error['search_keywords'];?></span>
					</div>
				</div>
				<div class="row">
					<div class ="col">
						<label for="price">price</label>
						<input type="number" name="price" id ="price" class="form-control mb-2 mr-sm-2" value="<?php echo htmlspecialchars($price) ?>">
						<span id="price" style="color:red"><?php echo $error['price'];?></span>
					</div>
					<div class="col">
						<label for="discount_type">discount type</label>
						<input type="text" id="discount_type" name="discount_type" class="form-control mb-2 mr-sm-2" value="<?php echo htmlspecialchars($discount_type) ?>">
						<span id="discount_type" style="color: red"><?php echo $error['discount_type'];?></span>
					</div>
				</div>
				<label for="discount_value">discount value</label>
				<input type="number" name="discount_value" id="discount_value" class="form-control mb-2 mr-sm-2" value="<?php echo htmlspecialchars($discount_value) ?>">
				<span id="discount_value" style="color: red"><?php echo $error['discount_value'];?></span>
				
				<button type="submit" name="submit"id ="submit" class = "btn btn-primary" value="submit">Submit</button> 
			</div>
		</form>
	</div>
	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  -->

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
		<script type="text/javascript" src="jquery-3.6.0.min.js"></script>
		<script type="text/javascript" src="jquery.validate.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
	$("#productform").validate({
		rules :{
			name :{
			  required: true
			},
			slug :{
				required : true
			},
			sku :{
				required : true
			},
			moq :{
				required :true
			},
			categories: {
    			required: true
    		},
    		search_keywords: {
    			required: true
    		},
    		price: {
    			required: true
    		},
    		discount_type: {
    			required: true
    		},
    		discount_value: {
    			required: true
    		},
		},
			messages :{

			 	name : {
			 		required: "please enter name"
			 	},
			 	slug : {
			 		required: "please enter slug"
			 	},
			 	sku : {
			 		required : "please enter sku"
			 	},
			 	moq :{
			 		required : "please enter moq"
			 	},
			 	categories: {
			 		required : "please enter categories"
			 	},
			 	search_keywords: {
    				required: "please enter Search Keywords"
    			},
    			price: {
    				required: "please enter Price"
    			},
    			discount_type: {
    				required: "please enter Discount Type"
    			},
    			discount_value: {
    				required: "please enter Discount Value"
    			}
			}
		
	});
	$("#moq").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
	<?php if(!isset($_GET['id'])){?>
	// 	$("#name").on("keyup", function(){
	//    var value = $(this).val();
	//     value = value.replace(/a-z A-z 0-9) 
	//    $("#slug").val(value);
	// });
	$('#name').keyup(function() {
    var replaceSpace = $(this).val(); 

    var result = replaceSpace.replace("", "-");

    $("#slug").val(result);

});
	<?php }?>
	

</script>
</body>
</html>
