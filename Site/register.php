<?php
include_once('pageHeaders.php');

if (isset($_POST['userId']))
{

	$fCoordinator->createUser($_POST['userId'], $_POST['password'], 'home user');

}

echo "

		<body>
		<div class='wrapper'>
			<div class='banner'>
				<div class='livery'>
					<div id='logo'>
						<img src='images/logo/webSolutions.gif' />
						<h1>Professional Bespoke Websites</h1>
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
						<p>Please register below to make use of this blogging service. When picking a user name please do not use your email address.
						By completing this form you agree that the data you provide will be used as part of a third year computing project at Edge Hill University.<br />
						No personal information is intended to be taken and advise your user name not be identifiable as you.<br />
						</p>
						";if (!isset($_POST['userId']))
						{	
							echo"<form method='post' action='register.php' id='newUser'>
							<table>
								<tr>
									<td>Preferred User ID </td>
									<td class='error'>";if (isset($_POST['userId']) && $_POST['userId'] == '')
									{
										echo"*";
									}
									echo"</td>
									<td><input type='text' maxlength='60' name='userId' value='";if (isset($_POST['userId']))
									{
										echo"{$_POST['userId']}";
									}
									echo"'></td>
								</tr>
								<tr>
									<td>Password </td>
									<td class='error'>";if (isset($_POST['userId']) && $_POST['password'] =='')
									{
										echo"* Passwords must match!";
									}
									echo"</td>
									<td><input type='text'  minlength='5' maxlength='15' name='password' value=''></td>
								</tr>
								<tr>
									<td>Re-type password </td>
									<td class='error'>";if (isset($_POST['userId']) && $_POST['repassword'] =='')
									{
										echo"* Passwords must match!";
									}
									echo"</td>
									<td><input type='text' minlength='5' maxlength='15' name='repassword' value=''></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td><input type='submit' value='Submit'></td>
								</tr>
							</table>
						</form>
				";
				}
				else
				{
					echo "Thanks for registering!";
				}
				echo"</div>
			<div class='right'>
				<div class='loginArea'>";
					
				if (!isset($_SESSION['user']))
				{
					echo "<form method='post' action='register.php' id='login'>
						<table>
							<tr>
								<td>User Name</td>
								<td><input type='text' maxlength='60' name='user' value=''></td>
								<td><a href='registerBusiness.php'>Not registered?</a></td>
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
					echo "<form method='post' action='register.php' id='logout'>
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