<script language='php'>
	/*This abstract class is for the purpose of handling communication 
	with databases. It has the purpose of direct manipulation of the schema
	and can create, update, alter and delete elements of the schema as required.*/
	abstract class DatabaseHandler
	{
		private $fConnection;
		private $fHost;
		private $fDatabase;
		private $fUserName;
		public $view;
		/*Creates a new instance of DatabaseHandler with the
		host, username and password and opens a specified
		database schema.*/
		function __Construct($dbhost, $dbuser, $dbpass, $dbname)
		{
			$this->fConnection = mysqli_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
			mysql_select_db($dbname) or die(mysql_error());
		}
		/*Gets the current value of fConnection*/
		protected function getConnection()
		{
			$result = fConnection;
			return $result;
		}
		/*Gets the current value of fHost*/
		protected function getHost()
		{
			$result = fHost;
			return $result;
		}
		/*Gets the current value of fDatabase*/
		protected function getDatabase()
		{
			$result = fDatabase;
			return $result;
		}
		/*Gets the current value of fUserName*/
		protected function getUserName()
		{
			$result = fUserName;
			return $result;
		}
		/*Creates a SQl view and returns the result*/
		function createView($aQuery)
		{
			
			$result = mysql_query($aQuery);
			$this->view = $result;
			return $result;
		}
		
		/*Creates a new table in the database schema.*/
		protected function createTable($table, $query)
		{
			$result;
			if($this->tableExists($table))
			{
			   $result = true;
			}
			else
			{
				mysql_query("CREATE TABLE {$table}({$query})");
				$result = false;
			}
			return $result;
		}
				
		/*Checks if table exists*/
		protected function tableExists($table)
		{
		
			$result = mysql_query("SHOW TABLES LIKE '{$table}'") or die(mysql_error());
			return $result;
		
		}
		
		/*Drops the specified table from the schema*/
		protected function dropTable($table)
		{
			mysql_query($table);
		}
		
		/*Edits the data in a table*/
		protected function editTable($aSql)
		{
			mysql_query($aSql);
		}

		
		/*Checks a given table and counts the rows to prove a
		connection is established.*/
		function testConnection($table)
		{
			return mysql_num_rows(createView("SELECT * FROM {$table}"));
		}
	}
</script>