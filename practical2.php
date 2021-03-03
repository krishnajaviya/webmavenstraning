<?php
include_once('functions.php');

$size =  get('size');
$binding = get('binding');
$color = get('color');
$lamination = get('lamination');
$pages = get('pages');
$qty = get('qty');
$price = get('price');
$result = get('result');
$prizeperpage = get('prize');
$result = get('prize');
$lamination = "$0.00";
switch ($lamination) {
    case '$0.00':
        break;
    
    case '$1.00':
        break;  
 }  
?>
<!DOCTYPE html>
<html>
   <head>
   		<title></title>
	</head>
	   	<body>
            <form action="" method="post">
		        <label for="size">Size</label>
		        <br>
                <select name="size" id="size" >
	                <option value="6*9">6*9</option>
	                <option value="7*10">7*10</option>
	                <option value="8*10">8*10</option>
                </select>
                <br>
                <label for="binding" align="right">Binding</label>
                <br>
                <select name="binding" id="binding" align="right">
                	<option value="spiral">spiral</option>
                	<option value="perfect">perfect</option>
                </select>
                <br>
                <label for="color" align="center">Color</label>
                <br>
                <select name="color" id="color">
                	<option value="Black n White Interior / Color Cover">Black n White Interior / Color Cover</option>
                	<option value="Full Color Interior / Color Cover">Full Color Interior / Color Cover</option>
                	<option value="Cream Color Interior / Color Cover">Cream Color Interior / Color Cover</option>
                </select>
                <br>
                <label for="lamination">Lamination</label>
                <br>
                <select name="lamination" id="lamination">
                	<option value="Glossy">Glossy</option>
                	<option value="Matt">Matt</option>
                </select>
                <br>
                <label for="pages">Pages</label>
                <br>
                <input type="text" name="pages" size="30"/>
                <br>
                <label for="lamination">Qty</label>
                <br>
                <input type="text" name="qty" size="30"/>
                <input type="submit" value="submit" name="submit" /><br>
                <?php if (isset($_POST['submit'])) {?>
                    <table style="width: 10%" border="2">
                    <tr>
                        <th>quantity</th><?php if ($_POST['submit']) {?>
                        <th>price</th><?php if ($_POST['submit']) {?>
                        <th>price actual</th>
                        <th>Discount</th>
                    </tr>
                    <tr>
                        <?php
                            echo "<td>$qty</td>";
                        ?>
                        <?php $result = $price + ($prizeperpage * $pages) + $lamination * $qty; ?>
                        <?php
                        echo "<td>$price</td>";
                        echo "<td>$price</td>";
                        ?>
                    </tr>
                <?php }?>
                 <?php } ?>
                    </table>
                </form>
                <!-- <?php $result = $prize + ($prizeperpage * $pages)+ $lamination + $binding * $noofcopy; ?> -->
                 <?php echo 'the size is : ' . $size .'<br>' ?>
                <?php echo 'The binding is : ' . $binding . '<br>';?>
                <?php echo 'The color is :' . $color . '<br>';?>
                <?php echo 'The lamination is : ' . $lamination . '<br>'; ?>
                <?php echo 'The pages are :' . $pages . '<br>';?>
                <?php echo 'The quantity are :' . $qty . '<br>'; ?>
                <?php }?> 
	    </body>
</html>
