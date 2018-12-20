<?php
	$host='localhost';
	$user='root';
	$pass='';
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
                    echo "<h1>Successfully logged in<br></h1>";
                    if($_POST['Username']=='admin')
                    {
                        echo "<h2><a href='insert.php'>Insert Records</a><br></h2>";
					    echo "<h2><a href='ShowRecords.php'>Show Records</a></h2>";
                    }
				}
			}
			mysqli_close($conn);
		}
	}
?>