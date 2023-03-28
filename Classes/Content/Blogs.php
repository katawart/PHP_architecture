<script language='php'>
	include_once('Content.php');
	
	
	class Blogs extends Content
	{
	
		/*Loads all the blogs for a user*/
		public function loadBlogs($userID)
		{
			$this->createView("SELECT * FROM blogs WHERE user_id = '{$userID}'");
			if (mysql_num_rows($this->view))
			{
				
				echo "<table cellpadding=5px'>";
				
				while ($row = mysql_fetch_assoc($this->view))
				{
					extract($row);
					echo "<tr>
						<td>{$file}</td>
					</tr>
					<tr>
						<td>{$date}</td>
						<td>{$user_id}</td>
					</tr>
					";
				}
				
					
				echo "</table>";
			}
		}
		
		public function loadAllBlogs()
		{
			$this->createView("SELECT * FROM blogs");
			if (mysql_num_rows($this->view))
			{
				
				echo "<table cellpadding=5px'>";
				
				while ($row = mysql_fetch_assoc($this->view))
				{
					extract($row);
					echo "<tr>
						<td>{$file}</td>
					</tr>
					<tr>
						<td>{$date}</td>
						<td>{$user_id}</td>
					</tr>
					";
				}
				
					
				echo "</table>";
			}
		}
		
		public function createBlog($userId, $date, $file)
		{
			$countRows = 0;
			$this->createView("SELECT * FROM blogs");
			if (mysql_num_rows($this->view) == 0)
			{
				$countRows = 1;
			}
			else
			{
				$countRows = mysql_num_rows($this->view);
				$countRows = $countRows + 1;
				echo"{$countRows}";
			}
			$this->editTable("INSERT INTO blogs VALUES ('{$countRows}', '{$userId}', '{$date}', '{$file}');");
		}
	
	}
</script>