<?php
include "dbconn.php";
include_once('functions.php');
$select =mysqli_query($dbh,"SELECT * FROM product ORDER BY id DESC");
$id=get('id');
$wh = "id='" . $id . "'";
delete('product',$wh);
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
	<div class="container">
	<form action="" method="POST">
	<button type="button" name="add product" class="btn btn-success"><a href="product.php">Add Product</a></button>
	
		<table class="table">
		<thead>
		<tr>
		 <th scope="col">ID</th>
		 <th scope="col">Name</th>
		 <th scope="col">SLUG</th>
		 <th scope="col">Sku</th>
		 <th scope="col">Moq</th>
		 <th scope="=col">categories</th>
		 <th scope="col">search_keywords</th>
		 <th scope="col">price</th>
		 <th scope="col">Discount_type</th>
		 <th scope="col">Discount_value</th>
		</thead>
	</tr>
	<tbody>
		<?php 
		while($raw=mysqli_fetch_array($select))
		{?>
	
		<tr>

		<td><?php echo $raw['id'];?></td>
		<td><?php echo $raw['name'];?></td>
		<td><?php echo $raw['slug'];?></td>
		<td><?php echo $raw['sku'];?></td>
		<td><?php echo $raw['moq'];?></td>
		<td><?php echo $raw['categories'];?></td>
		<td><?php echo $raw['search_keywords'];?></td>
		<td><?php echo $raw['price'];?></td>
		<td><?php echo $raw['discount_type'];?></td>
		<td><?php echo $raw['discount_value'];?></td>
		<td><button type="submit" name ="edit"><a href="product.php?id=<?php echo $raw['id'];?>">Edit</a></button></td>
		<td><button type="submit"name ="delete"><a href="product_form.php?id=<?php echo $raw['id'];?>">Delete</a></button></td>
		</tr>
		<?php 
	
		}
	 	?>
	</tbody>

	</table>
	</form>
</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>
</html>
<?php

?>