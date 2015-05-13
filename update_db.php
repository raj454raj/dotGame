<?php
include 'confidential.php';
	$name=$_GET['name'];
	$dob=$_GET['dob'];
	$q=mysqli_query($con, "SELECT * FROM Players WHERE Name='$name' AND DOB='$dob'");
	while($row = mysqli_fetch_array($q))
	{
		$wins = $row['Wins'];
	}
	echo $wins;
	$wins += 1;
	mysqli_query($con,"UPDATE Players SET Wins=$wins WHERE Name='$name' AND DOB='$dob'");
?>
