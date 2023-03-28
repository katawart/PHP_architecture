<script language = 'php'>
	include_once('Content.php');
	include_once('Blogs.php');
	include_once('Articles.php');
	include_once('FileHandler.php');
	
	class ContentController
	{
		private $fContent;
		private $fBlogs;
		private $fArticles;
		private $fFileHandler;
		
		/**/
		public function __Construct($dbhost, $dbuser, $dbpass, $dbname)
		{
			$this->fContent = new Content($dbhost, $dbuser, $dbpass, $dbname);
			$this->fBlogs = new Blogs($dbhost, $dbuser, $dbpass, $dbname);
			$this->fArticles = new Articles($dbhost, $dbuser, $dbpass, $dbname);
			$this->fFileHandler = new FileHandler();
		}
		
		/**/
		public function populateTable($table)
		{
			$this->fContent->populateTable($table);
		}
		
		/**/
		public function loadBlogs($userId)
		{
		
			$this->fBlogs->loadBlogs($userId);
		}
		
		/**/
		public function loadAllBlogs()
		{
			$this->fBlogs->loadAllBlogs();
		}
		
		/**/
		public function createBlog($userId, $date, $file)
		{
			$this->fBlogs->createBlog($userId, $date, $file);
		}
		
		/*Creates a new article by creating a new file with all the text,
		a web new page for the article to be based
		and adds an entry into the articles database.*/
		public function createArticle($userID, $date, $file)
		{
			$this->fFilehandler->createNewFile($file); //Article text
			$this->fFilehandler->createNewFile($file); //Article location
			$this->fArticles->createArticle($userID, $date, $file); //Updatedatabase
		}

	}
</script>