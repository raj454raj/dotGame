var can = document.getElementById("maincanvas");
var ctx = can.getContext("2d");
ctx.fillStyle = "#7f8c8d";
ctx.fillRect(0, 0, 500, 500);
var mainflag=0;
var supportflag=0;
var points = []
var edges = []
var k = 0;
var l = 0;
var red=0;
var green=0;
var nothing=0;
for(var i=0 ; i<6; ++i)
{
	for(var j=0;j<6;++j)
	{
		ctx.fillStyle = "#c0392b";
		ctx.beginPath();
		points[k++] = { y:75+70*i, x:70+70*j, l:0, r:0, u:0, d:0}
		ctx.arc(75+70*i,70+70*j,3,0,2*Math.PI);
		ctx.fill();
	}
}
function refreshthis()
{
	location.reload();
}
function showerrordiv()
{
	var tmp=document.getElementById("errordiv");
	tmp.style.visibility="visible";
}

function slideout()
{
	console.log('slideout');
	$("#showleaderboard").toggle(function(){
		$(this).stop().animate({left:"-2.5%"},500);
		$("#mainleaderboard").stop().animate({left:"-26%"},500);
	},function(){
		$(this).stop().animate({marginLeft:"55%"},500);
		$("#mainleaderboard").stop().animate({left:"-5%"},500);
	});
}
function fillplayernames()
{
	$("#game").fadeIn();
	$("#initialdiv").slideUp();
}
function animatewinner()
{
	$("#aftergame").slideDown();
}
function sendresults(num)
{
	var result = document.getElementById("result").innerHTML;
	var pname = document.getElementById("player"+num).innerHTML;
	var dob = document.getElementById("player"+num+"dob").innerHTML; 
	var win = document.getElementById("winner");
	win.innerHTML = "Winner is "+pname+"!!!"; 
	var xml = new XMLHttpRequest();
	xml.onreadystatechange=function(){
		if(xml.status==200 && xml.readyState==4)
		{
			animatewinner();
			setTimeout(refreshthis,3000);
		}
	}
	xml.open("GET", "update_db.php?name="+pname+"&dob="+dob);
	xml.send();
}
$(document).ready(function()
{
	$("#aftergame").hide();
	$("#showleaderboard").toggle(function(){
		$(this).stop().animate({left:"22%"},700);
		$("#mainleaderboard").stop().animate({left:"0%"},700);
		document.getElementById("arrowdiv").innerHTML="<strong><b><h3><</h3></b></strong>";
		$("#arrowdiv").stop().animate({left:"25%",top:"67%",position:"fixed"},700);
	},
	function(){
		$(this).stop().animate({left:"-2.5%"},700);
		$("#mainleaderboard").stop().animate({left:"-26%"},700);
		document.getElementById("arrowdiv").innerHTML="<strong><b><h3>></h3></b></strong>";
		$("#arrowdiv").stop().animate({left:"0.5%",top:"67%",position:"fixed"},700);
	});

	$("#initialdiv").slideDown(function(){
		$("#game").hide();
	});
});
function line_status(x1, y1, x2, y2)
{
	for(var i=0;i<l;i++)
	{
		if(edges[i].sx==x1 && edges[i].sy==y1 && edges[i].ex==x2 && edges[i].ey==y2)
			return 1;
	}
	return 0;
}
function makegreen()
{
	var greendiv=document.getElementById("statusgreen");
	var reddiv=document.getElementById("statusred");
	greendiv.style.backgroundColor="#00ff00";
	reddiv.style.backgroundColor="#7A0000";
	reddiv.style.opacity=0.25;
	greendiv.style.opacity=1;
}
function makered()
{
	var greendiv=document.getElementById("statusgreen");
	var reddiv=document.getElementById("statusred");
	greendiv.style.backgroundColor="#006600";
	reddiv.style.backgroundColor="#ff0000";
	reddiv.style.opacity=1;
	greendiv.style.opacity=0.25;
}

function showcoordinate(event)
{
	var x = event.clientX;
	var y = event.clientY;
	
	var can = document.getElementById("maincanvas");
	var nx = can.getContext("2d");	
	supportflag=0;
	var linedrawn=0;
	x-=400;
	y-=150;
	//console.log(mainflag);

	var flag=0;
	for(var i=0;i<35;i++)
	{
		check=0
			//console.log(i + " " + points[i].x+" "+points[i].y + " " + x + " " + y)
			//console.log("Horizontal check " + i + ": " + check);
			//if(check==1)
			//	break;
			if((x>points[i].x+10 && x<points[i+1].x-10) && (y>points[i].y-10&&y<points[i].y+10))
			{
				//console.log("hello")

				linedrawn=1;
				nx.beginPath();
				if(!mainflag)
					nx.strokeStyle="#66ff66";
				else
					nx.strokeStyle="#7A0000";

				nx.moveTo(points[i].x+5,points[i].y-5);
				nx.lineTo(points[i+1].x+5,points[i+1].y-5);
				nx.stroke();
				check = line_status(points[i].x, points[i].y, points[i+1].x, points[i+1].y);
				if(check==1)
					break;
				points[i].r=1;
				points[i+1].l=1;
				edges[l++]={sx:points[i].x, sy:points[i].y, ex:points[i+1].x, ey:points[i+1].y}
				if (points[i].d==1&&points[i+6].r==1&&points[i+7].u==1)
				{
					if(mainflag==0)
					{
						nx.fillStyle = "#00ff00";
						green++;
					}
					else
					{
						nx.fillStyle = "#ff0000";
						red++;
					}

					supportflag=1;
					nx.fillRect(points[i].x+5,points[i].y-5,70,70);
				}
				if (points[i].u==1&&points[i-6].r==1&&points[i-5].d==1)
				{
					if(mainflag==0)
					{
						nx.fillStyle = "#00ff00";
						green++;
					}
					else
					{
						nx.fillStyle = "#ff0000";
						red++;
					}
					supportflag=1;
					nx.fillRect(points[i-6].x+5,points[i-6].y-5,70,70);
				}
				break;
			}
		}
		if(check==1)
			return;
	//	console.log("hor:"+supportflag+" "+mainflag)
	if(red+green==25)
	{
		if(red>green)
		{
			sendresults(2);
			document.getElementById("result").innerHTML="2";
		}	
		else if(red<green)
		{
			sendresults(1);
			document.getElementById("result").innerHTML="1";
		}
	}
		if(supportflag==1&&linedrawn==1)
			return;

		x-=12;



		for(var i=0;i<30;i++)
		{
			check=0
			
			if((y>points[i].y+10 && y<points[i+6].y-10) && (x>points[i].x-10&&x<points[i].x+10))
			{
				//console.log("hello")

				linedrawn=1;
				nx.beginPath();
				if(!mainflag)
					nx.strokeStyle="#66ff66";
				else
					nx.strokeStyle="#7A0000";

				nx.moveTo(points[i].x+5,points[i].y-5);
				nx.lineTo(points[i+6].x+5,points[i+6].y-5);
				nx.stroke();

				points[i].d=1;
				points[i+6].u=1;
				check = line_status(points[i].x, points[i].y, points[i+6].x, points[i+6].y);
				if(check==1)
					break;
				edges[l++]={sx:points[i].x, sy:points[i].y, ex:points[i+6].x, ey:points[i+6].y}
				if (points[i].l==1&&points[i-1].d==1&&points[i+5].r==1)
				{
					if(mainflag==0)
					{
						nx.fillStyle = "#00ff00";
						green++;
					}
					else
					{
						nx.fillStyle = "#ff0000";
						red++;
					}
					supportflag=1;
					nx.fillRect(points[i-1].x+5,points[i-1].y-5,70,70);
				}
				if (points[i].r==1&&points[i+1].d==1&&points[i+7].l==1)
				{
					if(mainflag==0)
					{
						nx.fillStyle = "#00ff00";
						green++;
					}
					else
					{
						nx.fillStyle = "#ff0000";
						red++;
					}
					supportflag=1;
					nx.fillRect(points[i].x+5,points[i].y-5,70,70);
				}

				break;
			}
		}
	//if(check==1)
	//	return;
	//console.log("vert:"+supportflag+" "+mainflag)
	if (supportflag==0 && linedrawn==1 && check==0)
	{
		mainflag=1-mainflag;
		if(!mainflag)
			makegreen();
		else
			makered();
	}
	
	if(red+green==25)
	{
		if(red>green)
		{
			sendresults(2);
			document.getElementById("result").innerHTML="2";
		}
		else if(red<green)
		{
			sendresults(1);
			document.getElementById("result").innerHTML="1";
		}
	}
}
