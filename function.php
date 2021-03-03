<?php
function formateproduct($product){
	echo "$product['name'] cost of $product['price'] to buy";

}
formateproduct(['name'=> 'gold star' , 'price' => 20])
?>