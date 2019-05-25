<html>
<head>
<body>
 <h1>Registration</h1>
 
 <form action="index.php" method="post" enctype="multipart/form-data" >
  <input type="text" name="name" placeholder="enter name"/>
  <input type="email" name="email" placeholder="enter email"/>
  <input type="radio" name="gender" value="male">Male <input type="radio" name="gender" value="female">Female
  City<select name="city">
	 <option>----</option>
     <option value="Ghz">Ghz</option>
	 <option value="Lko">Lko</option>
  </select>
  <input type="text" name="subject" placeholder="enter subject name"/>
  <input type="file" name="img" />
  <input type="password" name="password" placeholder="enter password"/>
  <input type="submit"  name="submit"/>

 </form>
 
 <!--login code-->

<br><br>
<h1>Student Login .....</h1>
<form action="" method="post" >
	<input type="email" name="emaillogin" placeholder="enter email"/>
	<input type="password" name="passwordlogin" placeholder="enter password"/>
	<input type="submit" value="Login" name="login"/>
	
</form>


<!--Teacher detail Registration-->
<br><br>
<h1>Teacher Registration.....</h1>
<form action="index.php" method="post">
<input type="text" name="tname" placeholder="enter teacher name"/>
<input type="email" name="temail" placeholder="enter teacher email"/>
<input type="submit" name="registration" value="Registration"/>
</form>
</body>
</head>
</html>


<!--Book Entries-->
<br><br>
<h1>Book Entries</h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
	<input type="number" name="id" placeholder="enter Book id"/>
	<input type="text" name="book" placeholder="enter book name"/>
	<input type="number" name="price" placeholder="enter book price"/>
	<input type="file" name="bookimg"/>
	<input type="submit" name="BookEntry" VALUE="Book Entery"/>
	<a href="showallbook.php">All Books</a>
</form>



<!--php code....-->
<?php

include('db_connection.php');
include('emptyerror.php');  //udf file
session_start();

if(isset($_POST['submit']))
{
	
		emptyerror();  //udf
	
}
//Registration code...



if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$city=$_POST['city'];
	$subject=$_POST['subject'];
	$img=$_FILES['img']['name'];
	$tempimgname=$_FILES['img']['tmp_name'];
	$pass=$_POST['password'];
	$password=md5($pass);
	
	
	
	//for check email is unique 
	$sel="SELECT * FROM registration";
	$runn=mysqli_query($con,$sel);
	$data=mysqli_fetch_assoc($runn);
	if($_POST['email']==$data['email'])
	{?>
			<script>alert('Email is unique , please enter other email');</script>
			
    <?php exit();
    }
	//end 'for check email is unique'
	
	
	$ins="INSERT INTO registration (name,email,gender,city,sub,image,password) VALUES ('".$name."','".$email."','".$gender."','".$city."','".$subject."','".$img."','".$password."')";
	
	$run=mysqli_query($con, $ins);
	if($run==true)
	{
		move_uploaded_file($tempimgname,"images/$img");
		
		
		?>
				<script>alert('student added successfully')</script>
		<?php
	}
	else
	{
		?>
			<script>alert('student added unsuccessfully')</script>
		<?php
	}
}


//LOgin code....
if(isset($_POST['login']))
{
	$email=$_POST['emaillogin'];
	$password=$_POST['passwordlogin'];
	$pass=md5($password);
	
	
	$sel=" SELECT * FROM registration WHERE email='".$email."' AND password='".$pass."'";
	$run=mysqli_query($con, $sel);
	$row=mysqli_num_rows($run);
	if($row<1)
	{?>
		<script>alert('email or password incorrect');</script>
		
	<?php
	}
	else{
		
		$data=mysqli_fetch_assoc($run);
		$email=$data['email'];
		$_SESSION['email']=$email;
		header('location:dashboard.php');
	
	}
}


//Teacher Registration code....
if(isset($_POST['registration']))
{
$tname=$_POST['tname'];
$temail=$_POST['temail'];
$ins="INSERT INTO teacher (tname,temail) VALUES ('".$tname."','".$temail."')";	
$run=mysqli_query($con,$ins);
if($run==true)
{?>
	<script>alert('Teacher Registration successfully');</script>
<?php	
}
else {?>
	<script>alert('Teacher Registration unsuccessfully');</script>
<?php
}
}

//Book Entries.....
if(isset($_POST['BookEntry']))
{
	$b_id=$_POST['id'];
	$b_name=$_POST['book'];
	$b_price=$_POST['price'];
	$b_imgname=$_FILES['bookimg']['name'];
	$b_tmpname=$_FILES['bookimg']['tmp_name'];
	
	$ins="INSERT INTO book (id,book,price,bookimg) VALUES ('".$b_id."','".$b_name."','".$b_price."','".$b_imgname."')";
	$run=mysqli_query($con,$ins);
	if($run==true)
	{
		move_uploaded_file($b_tmpname,"bookimg/$b_imgname");
		?>
		<script>alert('book entry successfully');</script>
		<?php
	}
	else
	{ ?>
		<script>alert('book entry unccessfull');</script>	
	<?php
	}
	
	
}


?>

