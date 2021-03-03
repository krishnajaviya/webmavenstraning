<?php
$produts = [
	['name' => 'pencil' , 'price' => 10],
	['name' => 'scale' , 'price' => 20],
	['name' => 'pen' , 'price' => 30],
	['name' => 'bottle' , 'price' => 50]
];
foreach ($produts as $product){
	if($product['name'] === 'pen'){
		break;
	}
	if($product['price'] <= 20){
		continue;
	}
	echo $product['name'] . '<br>';

}
?>