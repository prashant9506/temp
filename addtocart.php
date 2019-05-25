<?php
include('db_connection.php');
$bookid=$_GET['$b_id'];
$sel="SELECT * FROM book WHERE id=$bookid";
$run=mysqli_query($con,$sel);
$data=mysqli_fetch_assoc($run);
?><h1>Buy Book....</h1>
	<div style="height:auto;width:200px;border:solid 2px">
		<div style="height:auto;width:197px;border:solid 2px red">
			<?php echo "book name-".$data['book'];
			nl2br();                                   //for break a new line
			echo "book price-".$data['price'];?>
		</div>
		<div style="height:auto;width:150px;padding-left:50px">
		   <img src="bookimg/<?php echo $data['bookimg']?>" width=100px/>
		</div>
		<div style="width:127px;border:solid 2px red;padding-left:70px">
		    <a href="#">Buy Book</a>
		</div>
	</div>
<?php

?>