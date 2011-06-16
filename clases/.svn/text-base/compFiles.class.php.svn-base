<?Php
/**
 * Class to compare two similar (text) files 
 * It returns the output in two iframes and highlights the differences
 *
 *
 * @author Rochak Chauhan
 */

Class ClassToCompareFiles {
	public $cnt1 = 0;
	public $cnt2 = 0;


	/**
	 * Function to create an array from file contents (text)
	 *
	 * @param $fileContents string - File contents
	 *
	 * @return array - array of lines of the file contents
	 */
	 private function filetoArray($fileContents) {
		 return file($fileContents);
	 }

	 /**
	  * Function to compare two file contents 
	  *
	  * @param $file1 string - path of the first file
  	  * @param $file2 string - path of the second file
	  *
	  */
	 public function compareFiles($file1, $file2) {
		 $file1ReturnArray = Array();
		 $file2ReturnArray = Array();
		 
		 $mainFileArray = file($file1);
		 $duplicateFileArray = file($file2);
     	 $linesInMainFile = count($mainFileArray);
		 $linesInDuplicateFile = count($duplicateFileArray);

		 // Main login to highlight lines
		 if( $linesInMainFile >= $linesInDuplicateFile ) {
			 for($i=0; $i<$linesInDuplicateFile; $i++) {
				 if($mainFileArray[$i] == $duplicateFileArray[$i]) {
					 $file1ReturnArray[] = "<font style='background-color:#ccddff'>".htmlentities($mainFileArray[$i])."</font>";
					 $file2ReturnArray[] = "<font style='background-color:#ffccdd'>".htmlentities($duplicateFileArray[$i])."</font>";
					 $this->cnt1++;
				 }
				 else{
				 	 $file1ReturnArray[] = "<font style='background-color:#ffccdd'>".htmlentities($mainFileArray[$i])."</font>";
					 $file2ReturnArray[] = "<font style='background-color:#ccddff'>".htmlentities($duplicateFileArray[$i])."</font>";
					 $this->cnt2++;
				 }



			 }
		 }
		 else {
			 for($i=0; $i<$linesInMainFile; $i++) {
					if($mainFileArray[$i] == $duplicateFileArray[$i] ) {
						$file1ReturnArray[] = "<font style='background-color:#ccddff'>".htmlentities($mainFileArray[$i])."</font>";
						$file2ReturnArray[] = "<font style='background-color:#ffccdd'>".htmlentities($duplicateFileArray[$i])."</font>";
						$this->cnt1++;
					 }	
					 else {
					 	 $file1ReturnArray[] = "<font style='background-color:#ffccdd'>".htmlentities($mainFileArray[$i])."</font>";
						 $file2ReturnArray[] = "<font style='background-color:#ccddff'>".htmlentities($duplicateFileArray[$i])."</font>";
						 $this->cnt2++;
					 }

				 
			 }
		 }
		$this->createIFrames($file1ReturnArray, $file2ReturnArray);	
	}	

	/**
	 * Function to create left and right iframes to display the comparison between files.
	 *
	 * @param $file1Contents array - Modified/ Highlighted contents of file1
	 * @param $file2Contents array - Modified/ Highlighted contents of file2
	 *
	 */
	public function createIFrames($file1Contents, $file2Contents) {
		// prepare file1 to display
		
		$openFile1 = fopen('file1.html', 'w');
		$html1Code = "<html> <body bgcolor='#ccddff'>";
		fwrite($openFile1, $html1Code);
		for($i=0; $i<count($file1Contents); $i++) {
			$file1 = "<PRE><font style='background-color:#ffccdd'><b>".($i+1). "</b></font>".$file1Contents[$i]."</PRE>";
			fwrite($openFile1, $file1);
		}
		fwrite($openFile1, "</body></html>");
		fclose($openFile1);

		// prepare file2 to display
		$openFile2 = fopen('file2.html', 'w');

		$html2Code = "<html> <body bgcolor='#ffccdd'>";
		fwrite($openFile2, $html2Code);
		for($j=0; $j<count($file2Contents); $j++) {
			$file2 = "<PRE><font style='background-color:#ffccdd'><b>".($j+1). "</b></font>".$file2Contents[$j]."</PRE>";
			fwrite($openFile2, $file2);
		}
			fwrite($openFile2, "</body></html>");
			fclose($openFile2);

	}
}
?>