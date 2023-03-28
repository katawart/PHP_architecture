<?php
include_once('pageHeaders.php');

	echo"<body>	
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
						<li><a href='register.php'>Register</a></li>	
						<li><a href='writeBlog.php'>Write Blog</a></li>
						<li><a href='blogs.php'>Blogs</a></li>
					</ul>

				</div>
			</div>
			<div class='content'>
				<div class='primary'>
					<br />";
				
					
				echo"</div>
			<div class='right'>
				<div class='loginArea'>";
					
				if (!isset($_SESSION['user']))
				{
					echo "<form method='post' action='home.php' id='login'>
						<table>
							<tr>
								<td>User Name</td>
								<td><input type='text' maxlength='60' name='user' value=''></td>
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
						$fCoordinator->loadAllBlogs();
				echo"</div>
			</div>
			</div>
			<div class='footer'>

			<div>
		</div>
	</body>

</html>";
?>