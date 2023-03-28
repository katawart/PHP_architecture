<script language='php'>
	class SqlCleaner extends DataCleaner  
	{
		
		/*Empty constructor*/
		function __Constructor()
		{
		
		}
		
		/*Takes one parameter $text and checks to see if it contains
		SELECT, DELETE or INSERT.
		If these words are found it assumes an attempt is being made to 
		attack the database and returns true otherwise it returns false.*/
		function checkForAttack($text)
		{
			$result;
			if(strpos($text, 'SELECT') === false || strpos($text, 'DELETE') === false || strpos($text, 'INSERT') === false)
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