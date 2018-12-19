<html>
	<head>
        <!--<link rel="stylesheet" type="text/css" href="index.css">!-->
		<title>Login</title>
        <style>
            .div
            {
                position: relative;
                top:110px;
                height: 25px;
                margin: 5px;
            }
        </style>
	</head>
	<body style="background-color: lightgray;">
		<form method="post">
			<center>
                <div style="background-color: gray;position:relative;top:100px; border:3px solid black; width:400;height:400px;">
            <label class="div"><b>Username</b></label>
			<br>
			<input type="text" class="div" name="Username">
			<br>
			<label class="div"><b>Password</b></label>
			<br>
			<input type="password" class="div" name="Password">
			<br>
			<input type="submit"  value="Submit" style="position: relative; top:120px; border-radius:10%"></div></center>
		</form>
	</body>
</html>
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