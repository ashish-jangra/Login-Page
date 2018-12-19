<html>
	<head>
		<title>Insert</title>
	</head>
	<body>
		<form method="post">
			<label>Username</label>
			<br>
			<input type="text" name="Username">
			<br>
			<label>Password</label>
			<br>
			<input type="password" name="Password">
			<br>
			<input type="submit" value="Submit" style="margin:10px">
		</form>
	</body>
</html>
<?php
	if($_POST)
	{
		$conn=mysqli_connect('localhost','root','','student');
		if(!$conn)
			echo "Connection failed";
		else
		{
			$v='"'.$_POST['Username'].'","'.$_POST['Password'].'"';
			$sql="insert into login(Username,Password) values($v)";
			//echo "$sql";
			if(mysqli_query($conn,$sql))
				echo "Record inserted";
			else
				echo "Could not insert record ".mysqli_error($conn);
			mysqli_close($conn);
		}
	}
?>