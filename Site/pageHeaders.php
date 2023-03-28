<script language = 'php'>

	include('coordinator.php');

	$fCoordinator;
	$fCoordinator = new Coordinator();
	$loggedin;
	$user;
	$pass;
	$error;
	
	session_start();
	
	if (isset($_POST['out']))
	{
		session_destroy();
	}
	
	
	if (isset($_SESSION['user']))
	{
		
		$user = $_SESSION['user'];
		$loggedin = true;
	
	}
	else $loggedin = false;
	
	echo"<!DOCTYPE HTML>
	<html>
		<head>
			<link rel='Stylesheet' type='text/css' href='stylesheet/stylesheet.css' />
			<link rel='shortcut icon' href='images/webSolutions.ico'>
			<title>Hunt IT Web Solutions</title>
		</head>";

	
	if (isset($_POST['user']))
	{
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		if ($user =="" || $pass == "")
		{
			$error = "Not all fields completed";
			
		}
		else
		{
			$validate = $fCoordinator->validateUser($user, $pass);
			if ($validate)
			{
				$_SESSION['user'] = $user;
				$_SESSION['pass'] = $pass;
			}
			else
			{
				session_destroy();
				echo"Invalid username/password!";
			}
		}
	}
</script>