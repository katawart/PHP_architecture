<script language='php'>
	include_once('/home1/huntitc1/Classes/Databases/DatabaseHandler.php');
	
	
	class Clients extends DatabaseHandler
	{
		
		public function loadClient()
		{
			echo"<table>";
			$this->createView("SELECT * FROM client");
			while ($row = mysql_fetch_assoc($this->view))
			{
				extract($row);
				echo "<tr><td>{$id}</td><td>{$type}</td><td>{$address}</td></tr>";
			}
			echo "</table>";
		}
	}
	
</script>