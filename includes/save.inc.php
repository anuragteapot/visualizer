<?php

  $code = $_POST['code'];
  $name = $_POST['name'];
  $user = $_POST['user'];

  $file = '../uploads/'.$name.'.txt';

      if (file_put_contents($file, $code)) {
         echo 'Saved';
      } else {
         echo 'Error On Saving';
      }
   

?>
