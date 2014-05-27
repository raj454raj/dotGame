<!DOCTYPE html>
<html>
<head>
	<title>Player Details</title>
	<script src="../scripts/jquery.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>       
</head>
<body>
	<link rel="stylesheet" href="../styles/style.css">
	<script type="text/javascript" src="../scripts/game.js"></script>
	
	<div id="initialdiv">
		<div id="players">
			<br/>
			<form id="playerform" method="GET" action="main.php"><!-- onsubmit="fillplayernames()">-->
				Player 1: <input id="inp1" name="P1" type="text" required/><input type="date" id="dobp1" name="dob1" style="width:80px;" value="yyyy-mm-dd" required/><br/><br/>
				Player 2: <input id="inp2" name="P2" type="text" required/><input type="date" id="dobp2" name="dob2" style="width:80px;" value="yyyy-mm-dd" required/><br/><br/>
				<input id="subbutton" type="submit" value="Play!!!"/>
			</form>
		</div>
	</div>
	
</body>
</html>
