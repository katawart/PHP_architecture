<script language='php'>
	include_once('Profiles.php');
	/*This class is used for the creation of general users*/
	class UserProfiles extends Profiles
	{
		public function __construct($dbhost, $dbuser, $dbpass, $dbname)
		{
			parent:: __construct($dbhost, $dbuser, $dbpass, $dbname);
			
			$this->createTable('user_profiles', 'profile_id VARCHAR(60) NOT NULL, email VARCHAR(60) NOT NULL, validated BINARY NOT NULL DEFAULT 0');
		}

		/*Takes 18 parameters, the details of a new user.
		If the profile already exists false is returned.
		Otherwise a new user is created */

}	
</script>