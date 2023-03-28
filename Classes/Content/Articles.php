<script language='php'>
	include_once('Content.php');
	
	
	class Articles extends Content
	{
	
		/*Loads all the blogs for a user*/
		public function loadArticles($userID)
		{
			/*$this->createView("SELECT * FROM articles WHERE user_id = '{$userID}'");
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
			}*/
		}
		
		public function loadAllArticles()
		{
			/*$this->createView("SELECT * FROM blogs");
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
			}*/
		}
		
		/*Creates a new article entry within the articles database.*/
		public function createArticle($userID, $date, $file)
		{
			$countRows = 0;
			$this->createView("SELECT * FROM articles");
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
			$this->editTable("INSERT INTO articles VALUES ('{$countRows}', '{$userId}', '{$date}', '{$file}');");
		}
	
	}
</script>