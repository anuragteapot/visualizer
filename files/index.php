<?php session_start();
	
	if(isset($_SESSION['u_username'])){
	include_once '../includes/dbh.inc.php';
	$user = $_SESSION['u_username'];
	$sql="SELECT * FROM code WHERE username='$user'";
    $result=mysqli_query($conn,$sql);
	$count=0;
	} else {
		header("Location: ../");
	}
?>

<!DOCTYPE HTML>
<!--
	Photon by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Photon by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  position: fixed;
  z-index: 10;
  background-color: white;
  color: black;
  text-align: center;
  font-size: 20px;  
}


#del{

	color: red;
}

#del:hover{
	color: red!important;
}
.table-inner{
	background-color: white; 
	color: black!important;

}

.table-inner h2{
	color: black!important;
	text-align: center;
}
</style>

	<body>
		<div id="filter">
		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
		</div>
		<!-- Header -->
			<section id="header">
				
				<div class="inner" style="padding:10%">
					<div class="table-inner">  	

  <h2>List of your files</h2>
                                                                                      
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Filename</th>
        <th>Last modified</th>
        <th>Download</th>
        <th>Share</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody id="myUL">
    <?php

     while ($row = @mysqli_fetch_array($result))
        {

          	
  echo '<tr>
        <td>'.@++$count.'</td>
        <td>'.@$row['file'].'</td>
        <td>'.@$row['time'].'</td>
        <td><a href="../includes/download.inc.php?file='.@$row['file'].'.c&'.md5($row['time']).'=1">Download file</a></td>
        <td>New York</td>
        <td><a href="../includes/delete.inc.php?file='.@$row['file'].'&'.md5($row['time']).'&tok='.$row['id'].'" id="del">Delete</a></td>
      	</tr>';
  		
  		}

      ?>
    
    </tbody>
  </table>
  </div>

</div>
				</div>
			</section>



		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrolly.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
			<script>
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("tr");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("td")[1];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}
</script>


	</body>
</html>