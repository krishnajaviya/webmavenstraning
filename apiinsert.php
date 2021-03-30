<?php 
include "dbconn.php";
include_once('functions.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$name = $slug = $sku = $moq = $categories = $search_keywords = $price = $discount_type = $discount_value ='';
$error = array('name' =>'', 'slug' =>'', 'sku' => '','moq'=>'','categories'=>'','search_keywords'=>'','price'=>'','discount_type'=>'','discount_value'=>'');

$data=json_decode(file_get_contents("php://input"), true);

$name = $data['name'];
$slug = $data['slug'];
$sku = $data['sku'];
$moq = $data['moq'];
$categories = $data['categories'];
$search_keywords = $data['search_keywords'];
$price = $data['price'];
$discount_type = $data['discount_type'];
$discount_value = $data['discount_value'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST['name'])){
		
		$error['name']="name can be required" ;
	}else{
		$name=$_POST['name'];
		echo $name;
		if(!preg_match('/^([A-Za-z\s\@\0-9]+)(,\s*[A-Za-z\s\0-9]*)*$/', $name)){
			$error['name'] =  "name can be only letter" ;

		}
	}
	if(empty($_POST['slug'])){	
		
		$error['slug'] =  "slug can be required" ;
	}else{
		$slug=$_POST['slug'];
		echo $slug;
		die();
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
		
		$error['moq']= "moq is required";
	}else{
		$moq=$_POST['moq'];
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
		
		$error['price']= "price is required";
	}else{
		$price=$_POST['price'];
	}
	if(empty($_POST['discount_type'])){
		
		$error['discount_type'] =  "discount type can be required" ;
	}else{
		$discount_type=$_POST['discount_type'];
		if(!preg_match('/^([A-Za-z\s\@\0-9]+)(,\s*[A-Za-z\s\0-9]*)*$/', $discount_type)){
			$error['discount_type'] =  "discount_type can be only letter" ;
		}
	}
	if(empty($_POST['discount_value'])){
		
		$error['discount_value']= "discount value is required";
	}else{
		$discount_value=$_POST['discount_value'];
	}
	if($error['name'] != '' || $error['slug'] != '' || $error['sku'] != '' || $error['moq'] != '' || $error['categories'] != '' || $error['search_keywords'] != '' || $error['price'] != '' || $error['discount_type'] != '' || $error['discount_value'] != ''){
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

	   $sql=insert('product',$update,$dbh);

		if($sql){
			
			
			echo json_encode(array('message'=>'record inserted.','status'=>true));
			
		}else{
			
			
			echo json_encode(array('message'=>'record  not inserted.','status'=>false));
		}
	}
}
?>
