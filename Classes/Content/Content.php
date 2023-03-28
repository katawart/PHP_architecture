<script language='php'>
	include_once('../Classes/Databases/DatabaseHandler.php');

	class Content extends DatabaseHandler
	{
	
		/*Fetches the query into a columlar table*/
		public function populateTable($table)
		{
		

				echo "<table cellpadding=5px'> <tr style='font-size:18px')><td style='width:250px'><b>C1</b></td><td style='width:50px'><b>C2</b></td><td style='width:150px'><b>C3</b></td></tr>";
				
				$this->createView("SELECT * FROM {$table}");
				while ($row = mysql_fetch_assoc($this->view))
				{
					extract($row);
					echo "<tr><td>{$profile_id}</td><td>{$password}</td><td>{$account_type}</td></tr>";
				}
				
					
				echo "</table>";
	
		}
		
	
	}
</script>