<html>
<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>


<head>	
	<title>Homepage</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<a href="add.html" class="btn btn-link">Add New Data</a><br/><br/>
<div class="container">
	<table class="table table-bordered" >
	    <thead>
			<tr>
				<td>Name</td>
				<td>Age</td>
				<td>Email</td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>	
			<?php 
			//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
			while($res = mysqli_fetch_array($result)) { 		
				echo "<tr>";
				echo "<td>".$res['name']."</td>";
				echo "<td>".$res['age']."</td>";
				echo "<td>".$res['email']."</td>";	
				echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
			}
			?>
		</tbody>	
	</table>
</div>
</body>
</html>
