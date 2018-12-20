<?php
	$host='localhost';
	$user='root';
	$pass="";
	$db='student';
	if($_POST)
	{
		$conn=mysqli_connect($host,$user,$pass,$db);
		if(!$conn)
			echo "Connnection failed";
		else
		{
			$sql='select * from login';
			$table=mysqli_query($conn,$sql);
			if(mysqli_num_rows($table)>0)
			{
				while($row=mysqli_fetch_assoc($table))
				{
					if($_POST['Username']==$row['Username']&&$_POST['Password']==$row['Password'])
					{
						break;
					}
				}
				if(!$row)
					echo "You entered wrong password ;)<br>";
				else
				{
                    echo "Successfully logged in<br>";
                    if($_POST['Username']=='admin')
                    {
                        echo "<a href='insert.php'>Insert Records</a><br>";
					    echo "<a href='ShowRecords.php'>Show Records</a>";
                    }
				}
			}
			mysqli_close($conn);
		}
	}
?>