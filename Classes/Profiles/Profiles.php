<script language='php'>
	include_once('../Classes/Databases/DatabaseHandler.php');
	/*This class extends DatabaseHandler and has the function 
	of creating new profiles for use in the web application*/
	class Profiles extends DatabaseHandler
	{
		
		public function __construct($dbhost, $dbuser, $dbpass, $dbname)
		{
			parent:: __construct($dbhost, $dbuser, $dbpass, $dbname);
			
			$this->createTable('user_logins', 'profile_id VARCHAR(60) NOT NULL, password VARCHAR(40) NOT NULL, 
								account_type VARCHAR(20) NOT NULL DEFAULT "user", PRIMARY KEY (profile_id)');
		}
		/*Takes four parameters, a profile ID, password, account type and table
		and creates a new profile in the table.*/
		protected function createProfile($profileId, $password, $accountType, $table)
		{
				$this->editTable("INSERT INTO {$table} (profile_id, password, account_type)
								VALUES ('{$profileId}', '{$password}', '{$accountType}');");
		}
		
		/*Creates a new user*/
		public function createUser($userId, $password, $accountType)
		{
			$result;
			$this->createProfile($userId, $password, $accountType, 'user_logins');
			$result = true;
		}
		
		/*Takes two parameters a profile ID and a table,
		Deletes the profile with $profileId from the
		table named $table*/
		protected function deleteProfile($profileId, $table)
		{
			$result;
			if (!$this->checkProfileExists($profileId))
			{
				$this->editTable("DELETE FROM {$table} WHERE profile_id = '{$profileId}';");
				$result = true;
			}
			else
			{
				$result = false;
			}
			return $result;
		}
		
		/*Takes three parameters, the profile id and an array of all
		changes that are to be made and the table to be edited.*/
		protected function editProfile($profileId, $fields, $values, $table)
		{
			$fields = "'";
			$values = "'";
			foreach ($changes as $key => $pair)
			{
				$fields = $fields + $key + "' = '";
				$values = $values + $pair + "', '";		
			}
			echo"{$fields}";
			$fields = substr($fields, 0, -2);
			$values = substr($values, 0, -2);
			$this->editTable("UPDATE {$table} SET {$values} WHERE profileId = '{$profileId}';");
		}
		
		/*Take three parameters a user id and two strings.
		representing the old and new password.
		If the old password does not match the stored password 
		then false is returned and no changes are made to the system.
		Otherwise the old password is overwriten by the new one.*/
		function changePassword($profileId, $oldPassword, $newPassword)
		{
			$result;
			if (!checkPassword($profileId, $oldPassword))
			{
				$result = false;
			}
			else
			{
				$this->editTable("UPDATE user_logins SET password ='{$newPassword}' WHERE profile_id = '{$profileId}';");
				$result = true;
			}
			return $result;
		}
		
		/*Takes one parameter, a profile_id.
		If the profile exists in the database true is returned,
		otherwise false is returned.*/
		protected function checkProfileExists($profileId)
		{
			$result;
			if (mysql_num_rows("SELECT * FROM user_logins WHERE profile_id = '{$profileId}';"))
			{
				$result = true;
			}
			else
			{
				$result = false;
			}
			return $result;
		}
		
		/*Takes two parameter, a profileId and a password
		If the password for profileId to the same as that stored in the
		database true is returned, otherwise false is returned.*/
		function checkPassword($profileId, $password)
		{

			$query = "SELECT * FROM user_logins WHERE profile_id = '{$profileId}' AND password = '{$password}'";
			
			if (mysql_num_rows($this->createView($query)) == 0)
			{
				$result = false;
			}
			else
			{
				$result = true;
			}
			return $result;
		}
		
	}
</script>