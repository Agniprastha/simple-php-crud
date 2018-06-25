<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);//echo $age;die();
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<!-- <form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Age</td>
				<td><input type="text" name="age" value="<?php echo $age;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form> -->
	<div class="container">   
	<!-- <form class="form-horizontal" action="edit.php" method="post" name="form1"> -->
		<form name="form1" method="post" action="edit.php">
		<div class="form-group">
		    <label class="control-label col-sm-2" for="email">Name:</label>
            <div class="col-sm-10">
		        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>">
		    </div>
		  </div>  
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Age:</label>
             <div class="col-sm-10">
		        <input type="text" class="form-control" id="age" name="age" value="<?php echo $age;?>">
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
		            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>">
		        </div> 
		  </div>
			<div class="form-group">        
			    <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
	                <input  type="submit" class="btn btn-info" name="update" value="Update">
			        <!-- <input type="submit" name="update" value="Update"> -->
			    </div>
			</div>
		</form> 
</div>
</body>
</html>
