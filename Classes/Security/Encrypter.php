<script language='php'>
	include_once('BasicSecurity.php');
	/*A encrypter class that extends the BasicSecurity abstract class.
	This is used to encrypt a string.
	In order to function correctly the same $keyCode used to encrypt must
	be used to decrypt.*/
	class Encrypter extends BasicSecurity
	{
		function __Construct($keyValue, $charValue)
		{	
			$this->setNumberOfChars($charValue);
			$this->setKey($keyValue);
		}
		
		/*Encrypts a string $text and returns the encrypted string.*/
		function encrypt($text)
		{
			$messageCode;
			$keyCode;
			$charCode;
			$result = '';
			for ($i = 0; $i < strlen($text); $i++)
			{
				$messageCode = $this->encode($text[$i]); //Sets messageCode to char at text [i]
				$keyCode = $this->encode($this->getKey()); //Sets keyCode to getKey
				$charCode = ($messageCode + $keyCode) % $this->getNumberOfChars(); //Uses modulus based upon a modulation of $getNumberOfChars
				$result = ''.$result.$this->decode($charCode).'';
			}
			return $result;
		}
		
		/*Implemented from abstract class. Not used*/
		function decrypt($text)
		{
		}
		
		/*Encrypts using SHA1. Only used for data that should not be decrypted.
		For best results use with DataCleaner class.*/
		function oneWayEncrypt($text)
		{
			$result = sha1($text);
			return $result;
		}
	}
</script>