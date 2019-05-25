<?php
include('db_connection.php');
session_start();
if(isset($_SESSION['email'])==false)
{
	header('location:index.php');
}
$useremail= $_SESSION['email'];
$sel="SELECT * FROM registration WHERE email='".$useremail."'";
$run=mysqli_query($con,$sel);
$data=mysqli_fetch_assoc($run);
$row=mysqli_num_rows($run);
if($row>0)
{
   	echo $data['email'];
	echo $data['name'];
	echo $data['city'];
	?>
		<img src="images/<?php echo $data['image'];?>" width="100px"/>
	<?php
}
else
{
	echo "data not found";
}

//join query....inner join

//$join="SELECT registration.sub, teacher.tname FROM registration INNER JOIN teacher ON registration.id=teacher.id";
$join="SELECT * FROM registration LIMIT 1 OFFSET 2";
$run=mysqli_query($con,$join);
$row=mysqli_num_rows($run);

  

   while($data=mysqli_fetch_assoc($run))
   {
	  // echo "".$data['sub']."->".$data['tname']."<br>";
	  echo $data['id'];
	  
   }	   
   

?>
<a href="logout.php">logout</a>