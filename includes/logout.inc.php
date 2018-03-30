<!-- By Anu1601CS Logout -->
<?php

if(	isset($_POST['submit']) )
{
		session_start();
  	session_unset();
		session_destroy();

		echo 'logout';
		//header("Location: ../");
}

?>
