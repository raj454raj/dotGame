<!DOCTYPE html>
<html>
<head>
	<title>Player Details</title>
	<script src="jquery.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
    <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <style>
        #ui-datepicker-div {
            background-color: white; 
        }
        .ui-datepicker-calendar a {
            text-decoration: None;
            color: black;
        }
        #players {
            background-color: #2c3e50;
            text-align: center;
            height: 100%;
            width: 50%;
        }
        #players-form {
            position: absolute;
            left: 57%;
            top: 43%;
        }
        #circle {
            border-radius:50%;
            background-color: #8e44ad;
            height: 200px;
            width: 200px;
            position: absolute;
            left:41.5%;
            opacity: 1;
            top: 40%;
            z-index: 201;
        }
        h1 {
            font-family: 'Titillium Web', sans-serif;
            color: white;
            font-size: 100px;
        }
        #logo-initial {
            z-index: 1000;
            position: absolute;
            left: 5%;
            top: 42%;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
    </style>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
</head>
<body>
	<link rel="stylesheet" href="style.css">
    <script>
        $(function(){
            $("#dobp1").datepicker();
            $("#dobp2").datepicker();
        });
    </script>
    <div id="logo-initial"><h1>dotGame</h1></div>
    <div id="circle"></div>
	<div id="initialdiv">
		<div id="players">
			<br/>
            <div id="players-form">
			<form id="playerform" method="GET" action="main.php" style="display: inline">
                <table>
                    <tr>
					<td><h2>Player 1: </h2></td>
					<td><input class="form-control" id="inp1" name="P1" type="text" style="width:180px;" required/></td>
    				<td><input class="form-control" type="text" id="dobp1" name="dob1" style="width:180px;" required/></td>
					<tr>
                    <td><h2>Player 2: </h2></td>
					<td><input class="form-control" id="inp2" name="P2" type="text" style="width:180px;" required/></td>
					<td><input class="form-control" type="text" id="dobp2" name="dob2" style="width:180px;" required/></td>
				<tr><td></td><td><input id="subbutton" type="submit" class="btn btn-default btn-lg" value="Play!!!"/></td><td></td></tr>
                </table>
			</form>
            </div>
		</div>
	</div>
	
</body>
</html>
