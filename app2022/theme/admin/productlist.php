<?php

include __DIR__.'/db.php';
//$query = "SELECT * FROM product";
//echo $query; die();

$shwoquery = "SELECT * FROM `product`";
				$q = mysqli_query($conn,$shwoquery);
               // print_r($q); die();


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title></title>
	<style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>

<body>
	<section>
		<table>
			<tr>
				<th>Id</th>
				<th>Title</th>
				<th>Price</th>
				<th>product_code</th>
				<th>Select_size</th>
				<th>Total_product</th>
				<th>Description</th>
				<th>Delete</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS-->
			<?php // LOOP TILL END OF DATA
				while($rows=$q->fetch_assoc())
				{
			?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
				<td><?php echo $rows['id'];?></td>
				<td><?php echo $rows['title'];?></td>
				<td><?php echo $rows['price'];?></td>
				<td><?php echo $rows['product_code'];?></td>
				<td><?php echo $rows['select_size'];?></td>
				<td><?php echo $rows['total_product'];?></td>
				<td><?php echo $rows['description'];?></td>
				<td><a href="delete.php?id=<?php echo $rows['id']; ?>">Delete</a></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>
</body>

</html>


