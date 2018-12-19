<?php
	$conn=mysqli_connect('localhost','root','','student');
	if(!$conn)
		echo "Connection failed";
	else
	{
		$sql="select * from login";
		$table=mysqli_query($conn,$sql);
		if(mysqli_num_rows($table)>0)
		{
			while($row=mysqli_fetch_assoc($table))
			{
				echo "Username: ".$row['Username']." Password: ".$row['Password']."<br>";
			}
		}
		else
			echo "No records found";
		mysqli_close($conn);
	}
?>