<script language = 'php'>
	include_once('UserProfiles.php');
	
	/**/
	class ProfileController
	{
		private $fUserProfiles;
		
		
		/*Creates a new instace of ProfileController*/
		function __Construct($dbhost, $dbuser, $dbpass, $dbname)
		{
			$this->fUserProfiles = new UserProfiles($dbhost, $dbuser, $dbpass, $dbname);
		}
		
		
		/*Creates a home user using 18 parameters.*/
		/*If fUserProfiles createHomeUser fails then
		false is returned, otherwise true is returned.*/
		function createUser($userId, $password, $accountType)
		{
			$result;
			
			if ($this->fUserProfiles->createUser($userId, $password, $accountType))
			{
				$result = true;
			}
			else
			{
				$result = false;
			}
			return $result;
		}
				
		/**/
		function deleteProfile($profileId, $table)
		{
			$this->fUserProfiles->deleteProfile($profileId, $table);
		}
	
		/**/
		function editProfile($table)
		{

			$this->fUserProfiles->editProfile($profileId, $changes, $table);
		}
		
		/**/
		function checkPassword($profileId, $password)
		{
			$result;
			if ($this->fUserProfiles->checkPassword($profileId, $password))
			{
				$result = true;
			}
			else $result = false;
			return $result;
		}
	}
</script>