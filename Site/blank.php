<?php
require_once('coordinator.php');
	echo"<!DOCTYPE HTML>
	<html>
		<head>
			<link rel='Stylesheet' type='text/css' href='stylesheet/stylesheet.css' />
			<link rel='shortcut icon' href='images/webSolutions.ico'>
			<title>Hunt IT Web Solutions</title>
		</head>
		<body>	
		<div class='wrapper'>
			<div class='banner'>
				<div class='livery'>
					<div id='logo'>

					</div>
					
					<div id='logoRight'>
						
						<img src='images/logo/hunt_IT.jpg' />
					</div>
				</div>
				<div class='navigation'>
					<ul class='nav'>
						<li><a href='home.php'>Home</a></li>
						<li><a href='design.php'>Design</a></li>
						<li><a href='packages.php'>Packages</a></li>
						<li><a href='seo.php'>SEO</a></li>
					</ul>

				</div>
			</div>
			<div class='content'>
				<div class='primary'>";
						/*$myFileHandler->readFile('content/home.txt');*/

				echo"</div>
			<div class='right'>
				<div class='loginArea'>";
					
				if (!isset($_SESSION['user']))
				{
					echo "<form method='post' action='home.php' id='login'>
						<table>
							<tr>
								<td>User Name</td>
								<td><input type='text' maxlength='16' name='user' value=''></td>
								<td><a href='registerHomeUser.php'>Not registered?</a></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type='password' maxlength='16' name='pass' value=''></td>
								<td><input type='submit' value='Login'></td>
							</tr>
						</table>
						
					</form>";
				}
				elseif (isset($_SESSION['user']))
				{
					echo "<form method='post' action='home.php' id='logout'>
						<table>
							<tr>
								<td>User Name: {$_SESSION['user']}</td>
			
								<td><input type='submit' name='out' value='Logout'></td>
							</tr>
						</table>
					</form>";
				}
					
				echo"</div>
				<div class='secondary'>
					<h3>Blog</h3>";
		
				echo"</div>
			</div>
			</div>
			<div class='footer'>
				Website designed by Hunt I.T. <br/>
				Copyright &copy; 2013 Hunt I.T. All rights reserved.<br/>
				No material may be reproduced without written permission.<br/>
			<div>
		</div>
	</body>

</html>";
?>