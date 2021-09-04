<?php	
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>login</title>
        <meta name="author" content="Dinesh 2020115029">
        <meta charset="utf-8">
        <link rel="stylesheet" href="login.css">
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
                    <h1>LOGIN</h1>
                    <input type="text" id="uname" class="feild" placeholder="Enter your username" novalidate autocomplete="off" required/><br><br>
                    <input type="password" id="pass" class="feild" placeholder="Enter your password" required/><br><br>
					<input type="radio" name="options" value="Global chat" id="opt1" checked/>
					<label for="opt1">Global chat</label>
					<input type="radio" name="options" value="Private chat" id="opt2"/>
					<label for="opt2">Private chat</label><br><br>
                    <button class="btn" id="s">Log in</button>
                    <a href="../createaccount/createaccount.html"><input type="button" value="Create Account" class="btn" id="r"/></a>
            
				</div>
            </div>
        </div>
		<script>
			var flag=0;
			$(document).ready(function(){
				
				$("#s").click(function(){
					
					var uname= $("#uname").val();
					var pass=$("#pass").val();
					if(uname=="" || pass==""){
						alert("enter username and password!");
					}else{
					$.ajax({
						url:"../php/login.php",
						type:"post",
						data:{	uname:uname,
								pass:pass
								},
						success:function(d){
							
							if(d){
								
								if($('#opt1').is(':checked')){
								window.location = "../chat/chat.php";
								}else if($('#opt2').is(':checked')){
									window.location = "../roomassign/roomassign.php"////////////////
								}
								else{
									window.location = "../chat/chat.php";
								}
								
								
							}
							else{
								alert("Invalid credentials!");
							}
						}
					});
					}
				});
			});
			
		</script>
    </body>
</html>