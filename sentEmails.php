<?php
	echo "JAAAAALLLOO";
	echo "<br><br>";

	$data = json_decode(file_get_contents('php://input'));

	echo $data;

	if (isset($data)){

		$myfile = fopen("testfile.txt", "w") ;
		$txt = $data;
		fwrite($myfile, $txt);
		fclose($myfile);
	}else{

	}