<script language='php'>
	include('Encrypter.php');
	include('Decrypter.php');
	include('DataCleaner.php');
	include('SqlCleaner.php');
	/*This is a coordinating class that ties together all the classes
	within the security package. Coordinators of other packages should
	communicate through the SecurityController only to decrease coupling.*/
	class SecurityController
	{	
		private $fEncrypter;
		private $fDecrypter;
		private $fDataCleaner;
		private $fSqlCleaner;
		private $returnedText;
		
		function __Construct()
		{
			$this->fEncrypter = new Encrypter(255, 70);
			$this->fDecrypter = new Decrypter(255, 70);
			$this->fDataCleaner = new DataCleaner();
			$this->fSqlCleaner = new SqlCleaner();
		}
		/*Sets the $returnedText field.*/
		function setReturnedText($text)
		{
			
			$this->returnedText = $text;

		}
		/*Gets the current value of the $returnedText field.*/
		function getReturnedText()
		{
			return $this->returnedText;
		}
		/*Take one parameter, $text and sends a message to $fEncypter to,
		Set $returnedText to the encoded result.*/
		function enc($text)
		{
			$result;
			$result = $this->fEncrypter->encrypt($text);
			return $result;
		}
		/*Take one parameter, $text and sends a message to $fDecypter to,
		Set $returnedText to the decoded result.*/
		function dec($text)
		{
			$result;
			$result = $this->fDecrypter->decrypt($text);
			return $result;
		}
		/**/
		function oneWayEnc($text)
		{
			$result;
			$result = $this->fEncrypter->oneWayEncrypt($text);
			return $result;
		}
		/*Takes two parameters, $text and $spoiler. Sets the data cleaner's
		spoiler to $spoiler and requests that the data cleaner spoils
		the text provided.*/
		function cleanData($text, $spoiler)
		{
			$result;
			$fDataCleaner->setSpoiler($spoiler);
			$result = $fDataCleaner->spoilText($text);
			return $result;
		}
		/*Takes one parameter $text and checks to see if any restricted
		words are included and returns true if threats found
		or false otherwise*/
		function validateSQL($text)
		{
			$result;
			$result = $fSqlCleaner->checkForAttack($text);
			return $result;
		}
	}
	
</script>