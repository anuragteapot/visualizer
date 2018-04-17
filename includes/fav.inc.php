<?php session_start();

if(isset($_SESSION['u_username']))
{
  if(isset($_GET['file']))
  {
    include_once 'dbh.inc.php';

    $file =  mysqli_real_escape_string($conn ,$_GET['file']);
    $id = mysqli_real_escape_string($conn ,$_GET['tok']);
    $status = mysqli_real_escape_string($conn ,$_GET['fav']);

    if($status) {
      $status = 0;
    } else {
      $status = 1;
    }

    if(!empty($file))
    {
      $user = $_SESSION['u_username'];
      $user=strtoupper($user);
      $check="SELECT * FROM login WHERE username='$user'";
      $result=mysqli_query($conn,$check);
      $row=mysqli_fetch_assoc($result);
        if($row > 0)
        {
          $sql="UPDATE code SET fav='$status' WHERE username='$user' AND id='$id'";
          if(mysqli_query($conn,$sql))
          {
            header("Location: ../files/");
          } else {
            echo 'Server Error';
          }
          exit();
        }
      }
    }
    else {
    header("Location: ../");
    exit();
  }
} else {
  header("Location: ../");
  exit();
}
