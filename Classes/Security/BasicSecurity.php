<script language='php'>
/*BasicSecurity is an abstract class that is used to encrpyt ascii characters
within a given range.*/
	abstract class BasicSecurity
	{
		private $fKey;
		private $numberOfChars;
		/*Creates a new instance of BasicSecurity with $key set to keyValue,
		which is the basic set of ascii characters.*/
		function __Construct($keyValue, $charValue)
		{
			$this->setNumberOfChars(charValue);
			$this->setKey(keyValue);
			
		}
		/*Sets the $key to a user defined value.*/
		function setKey($value)
		{
			$this->fKey = $value;
		}
		/*Gets the value of $key*/
		protected function getKey()
		{
			$result = $this->fKey;
			return $result;
		}
		/*Sets the $numberOfChars to be used in a shift encryption.*/
		function setNumberOfChars($value)
		{
			$this->numberOfChars = $value;
		}
		/*Gets the current value of $numberOfChars*/
		function getNumberOfChars()
		{
			$result = $this->numberOfChars;
			return $result;
		}
		
		/*Abstract function not implemented*/
		abstract public function encrypt($text);
		
		/*Abstract function not implemented*/
		abstract public function decrypt($text);
		
		/*Encodes a given character into ascii and decreases the character
		by numberOfChars so no non-printing characters are generated.*/
		protected function encode($char)
		{
			return ord($char) - $this->getNumberOfChars();
		}
		/*Decodes a character from ascii adds numberOfChars to generate a printable character.*/
		protected function decode($ascii)
		{
			return chr($ascii + $this->getNumberOfChars());
		}
	}
</script>