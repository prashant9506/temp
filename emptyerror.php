<?php
function emptyerror()
{
	$count='0';
	if(empty($_POST['email']))
	{?>
		<script>alert('email can not be empty ');</script>
	
    <?php
	$count++;
	}
	if(empty($_POST['name']))
	{?>
		<script>alert('name can not be empty');</script>
		
    <?php
	$count++;
	}
	
	if(empty($_POST['gender']))
	{?>
		<script>alert('gender can not be empty');</script>
		
    <?php
	$count++;
	}
	if($count>0)
	{?>
		<script>alert('Registration Unsuccessfully!!');</script>
	<?php
		exit();
	}
	
	
	
}
?>