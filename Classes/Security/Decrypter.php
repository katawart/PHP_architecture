<script language='php'>
	include_once('BasicSecurity.php');
	/*A decrypter class that extends the BasicSecurity abstract class.
	This is used to decrypt a previously encrypted string.
	In order to function correctly the same $keyCode used to encrypt must
	be used to decrypt.*/
	class Decrypter extends BasicSecurity
	{
		function __Construct($keyValue, $charValue)
		{	
			$this->setNumberOfChars($charValue);
			$this->setKey($keyValue);
		}
		
		/*Decrypts a string $text and returns the decrypted string.*/
		function decrypt($text)
		{
			$messageCode;
			$keyCode;
			$charCode;
			$result = '';
			for ($i = 0; $i < strlen($text); $i++)
			{
				$messageCode = $this->encode($text[$i]);
				$keyCode = $this->encode($this->getKey());
				$charCode = ($messageCode - $keyCode) % $this->getNumberOfChars(); //Uses modulus based upon a modulation of $getNumberOfChars
				$result = ''.$result.$this->decode($charCode).'';
			}
			return $result;
		}
		
		/*Implemented from abstract class. Not used*/
		function encrypt($text)
		{
		}
	}
</script>