<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data=json_decode(file_get_contents("php://input"), true);

$name= $data['name'];
$slug= $data['slug'];
$sku= $data['sku'];
$moq= $data['moq'];
$categories =$data['categories'];
$search_keywords = $data['search_keywords'];
$price =$data['price'];
$discount_type =$data['discount_type'];
$discount_value= $data['discount_value'];

include "dbconn.php";
include_once('functions.php');

$name = $slug = $sku = $moq = $categories = $search_keywords = $price = $discount_type = $discount_value ='';
$error = array('name' =>'', 'slug' =>'', 'sku' => '','moq'=>'','categories'=>'','search_keywords'=>'','price'=>'','discount_type'=>'','discount_value'=>'');

if(empty($_POST['name'])){
	echo "name can be required" ;
}else{
	$name=$_POST['name'];
	if(!preg_match('/^([A-Za-z\s\@\0-9]+)(,\s*[A-Za-z\s\0-9]*)*$/', $name)){
		//$error['name'] =  "name can be only letter" ;
	}
	
}
if(!$error){
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

   $sql=insert('product',$update);

	if($sql){
		
		
		echo json_encode(array('message'=>'record inserted.','status'=>true));
		
	}else{
		
		
		echo json_encode(array('message'=>'record  not inserted.','status'=>false));
	}
}




?>
