<?php session_start();

  include_once 'dbh.inc.php';

  $code = $_POST['code'];
  $name = $_POST['name'];
  $user = $_SESSION['u_username'];
  $user=strtoupper($user);

  $file = '../uploads/'.$user.'/'.$name.'.c';
  $current_dir="/opt/lampp/htdocs/project/vis/OnlinePythonTutor-master/v5-unity/";

  if(!is_dir($current_dir.'/uploads/'.$user))
  {
    if(@mkdir($current_dir.'/uploads/'.$user,0755,true))
    {
      @umask($current_dir);
    }
  }

  if(empty($name))
  {
    echo 'Required File Name';
  }
  else
  {

      if (file_put_contents($file, $code)) {
         echo 'Saved';
         $_SESSION['save-file'] = $name;
      } else {
         echo 'Error On Saving';
      }

        $sql="SELECT * FROM code WHERE username='$user' AND file='$name'";
        $result=mysqli_query($conn,$sql);
        $row = @mysqli_fetch_array($result);

        $check = mysqli_num_rows($result);
        $path = $current_dir.'/uploads/'.$user.'/'.$name.'.c';

        if($check > 0)
        {
          $query="UPDATE code SET username='$user', code='$code', time=NOW(), file='$name', path='$path' WHERE username='$user' AND file='$name'";
        }
        else {
          $query="INSERT INTO code(username,code,time,file,path) VALUES ('$user','$code',NOW(),'$name','$path')";
        }

      mysqli_query($conn,$query);
      exit();
 }



?>
