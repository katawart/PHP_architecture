<script language='php'>
	/*A file handling class that reads the contents 
	of files and uploads them either in whole or part.*/
	class FileHandler
	{
		private $fileName;
		private $fileSnippet;
		
		/*Prints the contents of $fileName to the screen.*/
		public function printToScreen($prefix, $upload, $suffix)
		{
			echo"".$prefix." ".$upload." ".$suffix."";
		}
		
		/*Takes one parameter a file directory location.
		If the file exists its content is wrote to $fileName
		else an error message is sent to $fileName.*/
		public function readFile($file)
		{
			if (file_exists($file))
			{
				$this->fileName = file_get_contents($file);
				
			}
			else
			{
				$this->fileName = 'This file is not available at this time.<br /> 
				Please try again later.';
			}
			$this->printToScreen('', $this->fileName, '');
		}
		
		/*Take one parameter the directory of a group of files and
		selects one at random. It then reads the fist 250 bytes
		and writes it to $fileSnippet.*/
		public function readFilePart($dir)
		{
			$files = scandir($dir);
			$arrayLength = count($files); //Determines the length of the $pictures array.
			$filesRedone = array();
			$ranFile;
			$link;
			foreach($files as $afile)
			{
				//Strip out two entries of . and ..
				if ($afile !="." && $afile != "..")
				{
					$filesRedone[] = $afile;
				}
				
			}

			if ($filesRedone != NULL)
			{
				
				$filesRedone=array_flip($filesRedone);
				$ranFile = array_rand($filesRedone, 1);
				$handle = fopen($dir.'/'.$ranFile, 'rb');
				$this->fileSnippet = fread($handle, 250);
				$link = basename($ranFile, '.txt');
				$this->fileSnippet = '<a href='.$link.'.php>'
				.$this->fileSnippet.'</a>';
				fclose($handle);
				
			}
			$this->printToScreen('', $this->fileSnippet, '...');
			
		}
		
		/*Create a new file in a given location*/
		public function createNewFile($fileName, $path)
		{	
			$file;
			$file = $path & '' & $fileName;
			if  (!file_exists($file))
			{
				$fileHandler = fopen($file, 'w');
			}
		}
		
		/*Copies a file*/
		public function copyfile($fileName, $path, $newFileName, $newPath)
		{
			$file;
			$file = $path & '' & $fileName;
			$fileCopy;
			$fileCopy = $newPath & '' & $newFileName;
			copy($file, $newFile);
		}
		
		
	}
</script>