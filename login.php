<!DOCTYPE html>
<html>
<head>
	<title>Player Details</title>
	<script src="jquery.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
    <style>
        #ui-datepicker-div {
            background-color: white; 
        }
        .ui-datepicker-calendar a {
            text-decoration: None;
            color: black;
        }
        #players {
            padding: 5%;
            background-color: blue;
            text-align: center;
            border-radius: 10px;
        }

    </style>
</head>
<body>
	<link rel="stylesheet" href="style.css">
    <script>
        $(function(){
            $("#dobp1").datepicker();
            $("#dobp2").datepicker();
        });
    </script>	
	<div id="initialdiv">
		<div id="players">
			<br/>
			<form id="playerform" method="GET" action="main.php">
				<table>
				<tr>
					<td>Player 1: </td>
					<td><input id="inp1" name="P1" type="text" required/></td>
					<td><input class="hasDatePicker" type="text" id="dobp1" name="dob1" style="width:80px;" value="yyyy-mm-dd" required/></td>
				</tr>
				<tr>
					<td>Player 2: </td>
					<td><input id="inp2" name="P2" type="text" required/></td>
					<td><input class="hasDatePicker" type="text" id="dobp2" name="dob2" style="width:80px;" value="yyyy-mm-dd" required/></td>
				</tr>
				<tr><td></td><td><input id="subbutton" type="submit" value="Play!!!"/></td><td></td></tr>
				</table>
			</form>
		</div>
	</div>
	
</body>
</html>
