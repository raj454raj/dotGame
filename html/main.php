<!DOCTYPE html>
<html>
<head>
	<title>The Dot Game</title>
	<script src="../scripts/jquery.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>       
</head>

<body onload="makegreen()">
	<?php
	$p1 = ucfirst($_GET['P1']);
	$p2 = ucfirst($_GET['P2']);
	$dobp1 = $_GET['dob1'];
	$dobp2 = $_GET['dob2'];
	$count1 = 0;
	$count2 = 0;
	include "confidential.php";
	
	
	$q1=mysqli_query($con, "SELECT * FROM Players WHERE Name='$p1' AND DOB='$dobp1'");
	$q2=mysqli_query($con, "SELECT * FROM Players WHERE Name='$p2' AND DOB='$dobp2'");
	while($row1=mysqli_fetch_array($q1))
	{
		$count1+=1;
	}
	while($row2=mysqli_fetch_array($q2))
	{
		$count2+=1;
	}
		if(!$count1)         //If Player1 is not in the database add him/her
			mysqli_query($con,"INSERT INTO Players (Name, DOB, Wins) VALUES ('$p1','$dobp1',0)");
		if(!$count2)         //If Player2 is not in the database add him/her
			mysqli_query($con,"INSERT INTO Players (Name, DOB, Wins) VALUES ('$p2','$dobp2',0)");

 	?>
	<div id="errordiv">Please fill player names</div>
	<div id="showleaderboard">
		<div id="ltext"><strong>L<br/>E<br/>A<br/>D<br/>E<br/>R<br/>B<br/>O<br/>A<br/>R<br/>D<br/></strong></div>
		<div id="arrowdiv" style="color:black;"><strong><b><h3>></h3></b></strong></div>
	</div>
	<div style="color:white;" id="mainleaderboard">
	<br/><br/>
	<table>
		
		<tr class="header"><td>Name</td><td style="cell-spacing:100px">Date Of Birth</td><td>Wins</td></tr>
		<?php
		$q=mysqli_query($con, "SELECT * FROM Players ORDER BY Wins DESC");
	
		while($row = mysqli_fetch_array($q))
		{
			echo "<tr class='queryrows'>"."<td>".$row['Name']."</td> "."<td>",date("d-m-Y", strtotime($row['DOB']))."</td> "."<td>".$row['Wins']."</td></tr>";
		}
		mysqli_close($con);
	?>	
	</table>
	</div>
	<div id="aftergame">
		<div id="winnername">
			<div style="float:left">
			<img src="../styles/trophy.png" style="height:100px;width:100px;"/>
			</div>
			<div style="text-align:center;">
			<p id="winner" style="float:left;font-size:30px;margin-left:15%;"><strong><b>WINNER IS RAJ!!!</b></strong></p>
			<img src="../styles/trophy.png" style="height:100px;width:100px;float:right"/>
			</div>
		</div>
	</div>
	<div id="game">
	<img src="../styles/dot.png" id="logo"/>
	<canvas id="maincanvas" width="500px" height="500px" onmousedown="showcoordinate(event)"></canvas>
	<link rel="stylesheet" href="../styles/style.css">
	<script type="text/javascript" src="../scripts/game.js"></script>
	<div id="statusred"></div>
	<div id="statusgreen"></div>
	<div id="result" style="visibility:hidden;">0</div>
	<div id="player1">
	<?php
		echo ucfirst($p1);
	?>
	</div>
	<div id="player2">
	<?php
		echo ucfirst($p2);
	?>
	</div>
	

</div>
<div id="player1dob">
	<?php
		echo $dobp1;
	?>
	</div>
	<div id="player2dob">
	<?php
		echo $dobp2;
	?>
	</div>
</body>
</html>
