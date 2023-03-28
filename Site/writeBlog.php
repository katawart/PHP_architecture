<?php
require_once('pageHeaders.php');

	if (isset($_POST['blog']))
	{
		if ($_POST['blog'] == '')
		{
			$error = "No blog typed";
		}
		else
		{
			$date = date("Y-m-d");
			$fCoordinator->createBlog($_SESSION['user'], $date, $_POST['blog']);
		}
		$_POST['blog'] = '';
	}

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
					if (!isset($_SESSION['user']))
					{
						echo"You must be logged in to write new blogs.";
					}
					elseif(isset($_SESSION['user']))
					{
						
						echo"<p>Your blog will appear instantly once submitted.<br />
						Blogs deemed to contain unacceptable content will be deleted by the administrator.</p>
						<form method='post' action='writeBlog.php' id='blog'>
							<table id='newBlog'>
								<tr>
									<td><h3>Write Your Next Blog</h3></td>
								</tr>
								<tr>
									<td><textarea name='blog' value='' maxlength='2000'></textarea></td>
								</tr>
								<tr>
									<td><input type='submit' value='blog'></td>
								</tr>
							</table>
						</form>";
					}	
				echo"</div>
			<div class='right'>
				<div class='loginArea'>";
					
				if (!isset($_SESSION['user']))
				{
					echo "<form method='post' action='writeBlog.php' id='login'>
						<table>
							<tr>
								<td>User Name</td>
								<td><input type='text' maxlength='60' name='user' value=''></td>
								<td><a href='register.php'>Not registered?</a></td>
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
					echo "<form method='post' action='writeBlog.php' id='logout'>
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
				<p>You can contact the site administrator below.</p>
				<p>richard.hunt@go.edgehill.ac.uk</p>
			<div>
		</div>
	</body>

</html>";
?>