<?php
include('db_connection.php');

$sel="SELECT * FROM book";
$run=mysqli_query($con,$sel);
$row=mysqli_num_rows($run);
if($row<1)
{
	echo "<h1>"."Book NOt Found"."</h1>";
}
else
{
	while($data=mysqli_fetch_assoc($run))
	{?>
		<div  style="border:solid 2px red;width:300px;height:auto">
		<div   style="border:solid 2px">
		<?php
		echo "Book Name-".$data['book']."<br>";
		echo "Book Price-".$data['price'];
		?>
		</div>
		<div style="border:width:150px;height:auto;padding-left:80px">
		<img src="bookimg/<?php echo $data['bookimg']?>" width="100px"/>
		</div>
		<div style="padding-left:85px;border:solid 2px">
		<a href="addtocart.php?$b_id=<?php echo $data['id']?>">Add To Card</a>
		</div>
		</div><br>
		<?php
	}
}
?>