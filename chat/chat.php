<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location: ../loginpage/loginpage.php");
	}
	
	function sessionstop(){
		
		session_destroy();
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CHATROOM</title>
        <meta name="author" content="Dinesh 2020115029">
        <meta charset="utf-8">
        <link rel="stylesheet" href="chat3.css">
		<link rel="icon" type="image/png" href="../images/favicon.png"/>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script>
				var for_vibes=['sega-remix','dancin','patlamaya-devam','The-Box-Remix',"Can't-stop-jiggin"];
				var gangsta=['gta','Big-Gangsta','Still-Dre','Next-Episode','Baby'];
				var soothing=['Future-Mask-off','Peaches','Devil-eyes','Old-Town-Road','The-nights'];
				<?php
					$theme="soothing";
					
					if(isset($_COOKIE["theme"])){
						
						$theme=$_COOKIE["theme"];
					}
					
					
				?>
				var songarr=soothing;
		</script>
    </head>
    <body onload="songAssign('<?php echo $theme; ?>')">
	
		
		<header>
			<div>
				<button onclick="songAssign('for_vibes')" class="theme">For vibes</button>
				<button onclick="songAssign('gangsta')" class="theme">Gangsta</button>
				<button onclick="songAssign('soothing')" class="theme">Soothing</button>
			</div>
			<div>
			
				<?php 
				echo "<span style='text-align:left;'><span style='color:white;font-family:monospace;font-size:120%;font-weight:bold;'>". htmlspecialchars('<?php ')."</span><span style='color:yellow;font-family:monospace;font-size:150%;font-weight:bold;'>". htmlspecialchars('$_')."</span><span style='color:hotpink;font-family:monospace;font-size:150%;font-weight:bold;'>".htmlspecialchars('POST')."</span><span style='color:white;font-family:monospace;font-size:120%;font-weight:bold;'>"."[ <span style='color:hotpink'>'".$_SESSION["user"]."'</span> ]". htmlspecialchars(' ?>')."\t</span></span>"; 
				?>
				<button onclick="sessionstop()" class="logout">Logout</button>
				<button id="delete" class="logout">Delete account</button>

			</div>
			
		</header>
        <div class="outer">
            <div class="sec">
                <ul>
				
				<h2 style="color:white;font-size:100%;">General channels</h2>
					<li onclick="changeGroup('chat')"><b>#Chat</b></li>
					<li onclick="changeGroup('events')"><b>#Events</b></li>
					<li onclick="changeGroup('study-group')"><b>#Study-group</b></li>
				</ul>
            </div>
            <div class="msg">
				<h1 id="group" style="color:white;font-family:sans-serif;"></h1>
				<div id="cmt" style="color:white">
				
				</div>
               
                <div id="chat">
                    <input type="text" placeholder="Type something" id="message" autocomplete="off" novalidate/>
					
					<input type="image" src="../images/send.png"  id="sub" style="width:4%" alt="Submit" />
                </div>
                
            </div>
            <div class="sec">
                <ul>
				<h2 style="color:white;font-size:100%;">Music</h2>
					<li onclick="Player('0') "><b id="song1"></b></li>
					<li onclick="Player('1')"><b id="song2"></b></li>
					<li onclick="Player('2')"><b id="song3"></b></li>
					<li onclick="Player('3')"><b id="song4"></b></li>
					<li onclick="Player('4')"><b id="song5"></b></li>
				</ul>
				<div class="player" style="padding:20px;">
				
					<audio src="intro.mp3" id="player" controls autoplay hidden>
					</audio>
					<button style="border:none;outline:none;background-color:black;cursor:pointer;" onclick="playPause()"><img src="../images/pause.png" id ="pause" name ="pause" class="playpause" alt="play/pause"/></button>
				</div>
            </div>
        </div>
		
		<script>
			var tableName = "chat";
			var ele=document.getElementById("group");
			ele.innerHTML="# "+tableName.toUpperCase();
			
			function Player(SongName){
				
				var song=document.getElementById("player");
				song.pause;
				song.src="../songs/"+songarr[parseInt(SongName)]+".mp3";
				song.play;
				
            }
			
			function playPause(){
				var s=document.getElementById("player");
				var b= document.querySelector("#pause");
				if(b.name=="pause"){
					b.src="../images/play.png";
					b.name="play";
					s.pause();
				}else{
					b.src="../images/pause.png";
					b.name="pause";
					s.play();
				}
				
			}
			function sessionstop(){
				
				<?php
					sessionstop();
				?>
				window.location = "../loginpage/loginpage.php";
			}
			function changeGroup(nm){
				tableName =nm;
				var temp=document.getElementById("group");
				temp.innerHTML="# "+tableName.toUpperCase();
				
			}
			function songAssign(s){
				
				switch(s){
					case "for_vibes" : songarr=for_vibes;
									   changeTheme(songarr,"../images/astronaut.gif");
										break;
					case "gangsta"	: songarr=gangsta;
									  changeTheme(songarr,"../images/gangsta3.jpg");
										break;
					case "soothing" : songarr=soothing;
									  changeTheme(songarr,"../images/soothing.png");
										break;
					default			: songarr=soothing;
									  changeTheme(songarr,"../images/soothing.png");
				}
					$.post("../php/settheme.php",{theme:s});
			}
			function changeTheme(arr,back){
				var b1=document.querySelector("#song1");
				var b2=document.querySelector("#song2");
				var b3=document.querySelector("#song3");
				var b4=document.querySelector("#song4");
				var b5=document.querySelector("#song5");
				b1.innerHTML=arr[0];
				b2.innerHTML=arr[1];
				b3.innerHTML=arr[2];
				b4.innerHTML=arr[3];
				b5.innerHTML=arr[4];
				document.body.style.backgroundImage = " url('"+back+"') ";
			}
			
					
		
		</script>
		<script>
			 $(document).ready(function(){
                $("#sub").click(function(){
					var msg= $("#message").val();
                    $.ajax({
                        url:"../php/store.php",
                        type:"POST",
                        data: {msg:msg,
								uname:"<?php echo $_SESSION["user"]; ?>",
								tableName:tableName},
								success:function(d){
						
							$.post("../php/get.php",{tableName:tableName},function(respose){
								$("#cmt").html(respose);
								$("#cmt").scrollTop($(document).height());
							});
							$("#message").val('');
						}
                    });
                });
				
				$("#message").bind("keypress",function(e){
					if( e.keyCode==13 ){
						var msg= $("#message").val();
						$.ajax({
							url:"../php/store.php",
							type:"POST",
							data: {msg:msg,
									uname:"<?php echo $_SESSION["user"]; ?>",
									tableName:tableName},
									success:function(d){
								
								$.post("../php/get.php",{tableName:tableName},function(respose){
									$("#cmt").html(respose);
									$("#cmt").scrollTop($(document).height());
								});
								$("#message").val('');
							}
						});
					}
                });
                $("#delete").click(function(){
					var user='<?php echo $_SESSION["user"]; ?>'; 
					$.post("../php/delete.php",{user:user},function(d){
						alert(d);
						window.location = "../loginpage/loginpage.php";
					})
				});
				setInterval(function(){
				
							$.post("../php/get.php",{tableName:tableName},function(respose){
								$("#cmt").html(respose);
								
							});
				},1000);
				
			});
		</script>
    </body>
</html>
