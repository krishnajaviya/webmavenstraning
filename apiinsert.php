<?php 
include "dbconn.php";
require_once "functions.php";
header('Content-Type: application/json');
// header('Access-Control-Allow-Origin:*');
// header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
$name = $slug = $sku = $moq = $categories = $search_keywords = $price = $discount_type = $discount_value ='';
$error = array();
$data=json_decode(file_get_contents("php://input"), true);

if(empty($data['name'])){
	$error['name']="Name Is Required";

}else{
	$name=$data['name'];
}
if(empty($data['slug'])){
	$error['slug']="slug is required";
}else{
	$slug=$data['slug'];
}
if(empty($data['sku'])){
	$error['sku']="sku is required";
}else{
	$sku=$data['sku'];
}
if(empty($data['moq'])){
	$error['moq']="moq is required";
}else{
	$moq=$data['moq'];
}
if(empty($data['categories'])){
	$error['categories']="categories is required";
}else{
	$categories=$data['categories'];
}
if(empty($data['search_keywords'])){
	$error['search_keywords']="search_keywords is required";

}else{
	$search_keywords=$data['search_keywords'];

}
if(empty($data['price'])){
	$error['price']="price is required";
}else{
	$price=$data['price'];
}
if(empty($data['discount_type'])){
	$error['discount_type']="discount type is required";
}else{
	$discount_type=$data['discount_type'];
}
if(empty($data['discount_value'])){
	$error['discount_value']="discount value is required";
}else{
	$discount_value=$data['discount_value'];
}

if($error){
	echo json_encode("<pre>");
	echo json_encode($error);	
	echo json_encode("error");
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

	   $sql=insert('product',$update,$dbh);

		if($sql){
			
			
			echo json_encode(array('message'=>'record inserted.','status'=>true));
			
		}else{
			
			
			echo json_encode(array('message'=>'record  not inserted.','status'=>false));
		}
	}
?>
