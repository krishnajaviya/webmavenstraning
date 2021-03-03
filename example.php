<?php
$blog = ['krishna','mital','hemangi','divya','upasana'];
/*for ($i=0; $i <count($blog); $i++) { 
	echo $blog[$i].'<br>';
	# code...
}*/

/*foreach ($blog as $i) {
	echo $i. '<br>';
}*/

$produts = [
		['name' => 'pencil' , 'price' => 10],
	   	['name' => 'scale' , 'price' => 20],
	   	['name' => 'pen' , 'price' => 30],
	   	['name' => 'bottle' , 'price' => 50]];
	   		/*foreach ($produts as $product) {
	   			echo $product['name'] . '-' . $product['price'] . '</br>';
	   			# code...
	   		}*/
    		/*$i=0;
	   		while($i < count($produts))
	   		{
	   			echo $produts[$i]['name'] . ' - ' . $produts[$i]['price'];
	   			echo '<br>';
	   			$i++;
	   		}*/


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<ul><?php foreach ($produts as $product) {?>
	
	</ul>
	<h3> 
		<?php echo $product['name']; ?>
			
	</h3>
	<p><?php echo $product['price']; ?></p>
	<?php } ?>

</body>
</html>
