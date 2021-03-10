<?php 
include_once('functions.php');
error_reporting(0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn=mysqli_connect('localhost','root','','ecommerce');

if($conn)
{
	echo 'created' . '<br>';
}else{
	echo 'error';
}
$name=get('name');
$slug=get('slug');
$sku=get('sku');
$moq=get('moq');
$categories=get('categories');
$search_keywords=get('search_keywords');
$price=get('price');
$discount_type=get('discount_type');
$discount_value=get('discount_value');

$insert= array();
	$insert['name']=$name,
	$insert['slug']=$slug,
	$insert['sku']=$sku,
	$insert['moq']=$moq,
	$insert['categories']=$categories,
	$insert['search_keywords']=$search_keywords,
	$insert['price']=$price,
	$insert['discount_type']=$discount_type,
	$insert['discount_value']=$discount_value,

if (isset($_POST['submit'])) {
	$name =insert('product',$insert,$conn);
 	$slug =insert('product',$insert,$conn);
 	$sku =insert('product',$insert,$conn);
 	$moq=insert('product',$insert,$conn);
 	$categories=insert('product',$insert,$conn);
 	$search_keywords=insert('product',$insert,$conn);
 	$price=insert('product',$insert,$conn);
 	$discount_type=insert('product',$insert,$conn);
 	$discount_value=insert('product',$insert,$conn);

 	if(!$insert)
 	    {
 	        echo mysqli_error();
 	    }
 	    else
 	    {
 	        echo "Records added successfully.";
 		}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="#" method="POST">
		<label for ="name">name</label>
		<input tyep="text" name="name">
		<br>
		<label for="slug">slug</label>
		<input type="text" name="slug">
		<br>
		<label for="sku">sku</label>
		<input type="text" name="sku">
		<br>
		<label for="moq">moq</label>
		<input type="text" name="moq">
		<br>
		<label for="categories">categories</label>
		<input type="text" name="categories">
		<br>
		<label for="search_keywords">search key words</label>
		<input type="text" name="search_keyworlds">
		<br>
		<label for="price">price</label>
		<input type="text" name="price">
		<br>
		<label for="discount_type">discount_type</label>
		<input type="text" name="discount_type">
		<br>
		<label for="discount_value">discount_value</label>
		<input type="text" name="discount_value">
		<br>
		<input type="submit" name="submit" value="submit">
		

	</form>
	
</body>
</html>