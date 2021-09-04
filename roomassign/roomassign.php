<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Room assign</title>
        <meta name="author" content="Dinesh 2020115029">
        <meta charset="utf-8">
        <link rel="stylesheet" href="roomassign.css">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<link rel="icon" type="image/png" href="../images/favicon.png"/>
    </head>
    <body>
        <header>
			<div class="title">
				
				<img src="../images/logo1.png" class="logo" alt="logo" width="200" height="50" />
			</div>
		<nav id="menu">
			<ul>
				<li><a href="../index.html">Home</a></li>
				<li><a href="../feedback/feedback.html">Feedback</a></li>
				<li><a href="../policies/Policies.html">Privacy</a></li>
				<li><a href="../documentation/documentation.html">Documentation</a></li>
			</ul>
		</nav>
		</header>
		<div class="login">
            <div class="cred">
                <div>
                    <h1>ASSIGN ROOM</h1>
					<input type="number" id="room" class="feild" placeholder="Enter your room id" min="1" max="10" style="width:100%;" required/><br><br>
					
					<button class="btn" id="s">Enter room</button>
					<button class="btn" id="new">Create room</button>
					
				</div>
            </div>
        </div>
		<script>
			$(document).ready(function(){
				$("#s").click(function(){
					if($("#room").val() != ""){
						var table=$("#room").val();
					
						$.post("../php/tablevalidate.php",{table:table},function(d){
							if(d){
								localStorage.setItem("table",$("#room").val());
								window.location= "../privatechat/privatechat.php";
							}
							else{
								alert("Room ID does not exist");
							}
						});
                        
						
					}
				});
				$("#new").click(function(){
					$.get("../php/createroom.php",function(d){
						 alert("Assigned room ID: "+d);
						$.post("../insert/insert.php",{table:d},function(data){
							
						});
					});
				});
			});
		</script>
	</body>
</html>