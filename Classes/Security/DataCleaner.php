<script language='php'>
	class DataCleaner  
	{
		private $fSpoiler;
		
		function setSpoiler($value)
		{
			$this->fSpoiler = $value;
		}
		
		function getSpoiler()
		{
			return $this->fSpoiler;
		}
		
		/*Empty constructor*/
		function __Construct()
		{
			
		}
		
		/*Takes one parameter a text string and spoils the data.
		It does this by methods removeWhiteSpace and lowerCase and
		mixes the fSpoiler into it.*/
		function spoilText($text)
		{
			$result;
			$result = removeWhiteSpaces($text);
			$result = lowerCase($result);
			$result = $result + $this->getSpoiler();
			return $result;
		}
		/*Take one parameter a text string and removes the whitespace*/
		function removeWhiteSpace($text)
		{
			$result;
			return $result = preg_replace( '/\s+/', '', $result);
		}
		/*Take one parameter a text string and sets all to lowercase*/
		function lowerCase($text)
		{
			$result;
			return $result = strtolower($text);
		}
		/*Takes one parameter a text string and sets all to uppercase*/
		function upperCase ($text)
		{
			$result;
			return $result = strtoupper($text);
		}
	}
</script>