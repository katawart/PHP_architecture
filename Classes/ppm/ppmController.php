<script language='php'>
include_once('Clients.php');
include_once('Properties.php');
	class PPMController
	{
		Private $fClient;
		Private $fProperties;
		function __Construct($dbhost, $dbuser, $dbpass, $dbname)
		{
		
			$this->fClient = new Clients($dbhost, $dbuser, $dbpass, $dbname);
			$this->fProperties = new Properties($dbhost, $dbuser, $dbpass, $dbname);
		
		}
		
		public function loadClient()
		{
		
			$this->fClient->loadClient();
		
		}
		
		public function loadProperty()
		{
		
			
		
		}
	
	}

</script>