<?php session_start();
	
	if(!isset($_SESSION['u_username']) || !isset($_GET['file'])){
		header("Location: ../");
	}

	$user = $_SESSION['u_username'];
  	$user=strtoupper($user);


if (isset($_GET['file']) && basename($_GET['file']) == $_GET['file']) {
	$filename = $_GET['file'];
} else {
	$filename = NULL;
}

if ($filename) {
	// define the path to your download folder plus assign the file name
	$path = '/opt/lampp/htdocs/project/vis/OnlinePythonTutor-master/v5-unity/uploads/'.$user.'/'.$filename;
	// check that file exists and is readable
	if (file_exists($path) && is_readable($path)) {
		// get the file size and send the http headers
		$size = filesize($path);
		header('Content-Type: application/octet-stream');
		header('Content-Length: '.$size);
		header('Content-Disposition: attachment; filename='.$filename);
		header('Content-Transfer-Encoding: binary');
		// open the file in binary read-only mode
		// display the error message if file can't be opened
		$file = @ fopen($path, 'rb');
		if ($file) {
			// stream the file and exit the script when complete
			fpassthru($file);
			exit;
		} 
	} 
}