<script language ='php'>
	//mySQL database connector.
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	include_once('/home1/huntitc1/Classes/Security/SecurityController.php');
	include_once('/home1/huntitc1/Classes/Profiles/ProfileController.php');
	include_once('/home1/huntitc1/Classes/Content/ContentController.php');
	class Coordinator
	{
		private $fSecurityController;
		private $fProfileController;
		private $fContentController;
		
		/*Creates a new instance of Coordinator and instantiates SecurityController, ProfileController and ContentController.*/
		public function __Construct()
		{
			$this->fSecurityController = new SecurityController();
			$this->fProfileController = new ProfileController('localhost', 'huntitc1_dba', 'Alexander1', 'huntitc1_websolutions');
			$this->fContentController = new ContentController('localhost', 'huntitc1_dba', 'Alexander1', 'huntitc1_websolutions');
		}
		
		//All code relating to users and user validation
		
		/*Creates a new user.
		Encrypts the password before sending message to
		Profiles to create a new user.*/
		function createUser($userId, $password, $accountType)
		{
			$password = $this->fSecurityController->oneWayEnc($password);
			$this->fProfileController->createUser($userId, $password, $accountType);
		}
		
		/*Checks a user name and password to see if they match those held in a database*/
		public function validateUser($profileId, $password)
		{
			$result;
			$password = $this->fSecurityController->oneWayEnc($password);
			if ($this->fProfileController->checkPassword($profileId, $password))
			{
				$result = true;
			}
			else
			{
				$result = false;
			}
			return $result;
		}
		
		//All code relating to blogs
		
		/*loads blogs for a specific user*/
		function loadBlogs($userId)
		{
			$this->fContentController->loadBlogs($userId);
		}
		
		/*Loads all blogs for every user*/
		function loadAllBlogs()
		{
			$this->fContentController->loadAllBlogs();		
		}
		
		/*Communicates with Content package to create a blog.*/
		public function createBlog($userId, $date, $file)
		{
			$this->fContentController->createBlog($userId, $date, $file);
		}
				
	}
	
</script>