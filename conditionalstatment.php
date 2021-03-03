<?php
$produts = [
		['name' => 'pencil' , 'price' => 10],
	   	['name' => 'scale' , 'price' => 20],
	   	['name' => 'pen' , 'price' => 30],
	   	['name' => 'bottle' , 'price' => 50]];

	   /*	foreach ($produts as $product) {
	   		/*if($product['price'] < 30){
	   			echo $product['name'] . $product['price'] . '<br>';
	   		}*/
	   		/*if($product['price'] > 20 || $product['price'] < 50){
	   			echo $product['name'] . $product['price'] . '<br>';
	   		}
	   		# code...
	   	}*/
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title></title>
  </head>
  <body>
  	<div>
        <ul><?php foreach ($produts as $product) {?>
        <?php if ($product['price'] <= 50) {?>
        	<li> <?php echo $product['name']; ?></li>
       <?php } ?>
        <?php } ?>
    </ul>
    </div>
  </body>
  </html>