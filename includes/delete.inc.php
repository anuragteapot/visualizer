<?php session_start();

if(isset($_SESSION['u_username']))
{ 

if(isset($_GET['file']))
{
    include_once 'dbh.inc.php';

    $file=mysqli_real_escape_string($conn ,$_GET['file']);
    $id=mysqli_real_escape_string($conn ,$_GET['tok']);

if(!empty($file))
 { 
    $user = $_SESSION['u_username'];
  $user=strtoupper($user);
    $check="SELECT * FROM login WHERE username='$user'";
        

        $result=mysqli_query($conn,$check);
        $row=mysqli_fetch_assoc($result);
         
        if($row > 0)
        {
            $sql="DELETE FROM code WHERE id='$id' AND username='$user'";
              @mysqli_query($conn,$sql);
              $file_path='/opt/lampp/htdocs/project/vis/OnlinePythonTutor-master/v5-unity/uploads/'.$user.'/'.$file.'.c';

              unlink($file_path) or die('Error on Delete');
              header("Location: ../files/");
              exit();
      }
    
        
      }
    }

    else
  {
    
    header("Location: ../");
    exit();
  }

 
 }

 else
{
  
  header("Location: ../");
  exit();
}


?>
    
                     
                       


      



  










