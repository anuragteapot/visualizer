<?php session_start(); ?>

<?php

if(isset($_POST['submit']))
{

   include_once 'dbh.inc.php';

    $name=mysqli_real_escape_string($conn ,$_POST['name']);
    $username=mysqli_real_escape_string($conn ,$_POST['username']);
    $email=mysqli_real_escape_string($conn ,$_POST['email']);
    $password=mysqli_real_escape_string($conn ,$_POST['password']);


    //Error handlers

    if(empty($name)|| empty($username) || empty($email)|| empty($password))
    {
            $error="Input field is empty.";
            echo $error;
            exit();
    }
    else
    {

         if(!preg_match("/^[a-zA-Z\s]*$/",$name))
         {
            $error="Invalid name.";
            echo $error;
         	  exit();
          }
          else {
          	  //check email
          	   if(!filter_var($email,FILTER_VALIDATE_EMAIL))
          	    {
          		      $error="Email invalid.";
                    echo $error;
         	          exit();
                  } else {

          	         $sql1="SELECT * FROM login WHERE email ='$email'";
                     $result1=mysqli_query($conn,$sql1);
                     $result_check1=mysqli_num_rows($result1);

		                   if($result_check1<=0)
		                    {
          		              $sql="SELECT * FROM login WHERE username ='$username'";
          		              $result=mysqli_query($conn,$sql);
                            $result_check=mysqli_num_rows($result);

                            if($result_check >0)
          		               {

          		                   $error="Username already taken.";
                                 echo $error;
                     	           exit();
          		                } else {
                                  $password_hash=md5($password);
                                  $confirm='0';
                                  $otp=md5($username);

                     	            //Insert data to database

                                  $sql="INSERT INTO `login`(`username`, `name`, `email`, `password`, `confirm` , `otp` , `expire` , `timestamp`) VALUES ('$username','$name','$email','$password_hash','$confirm','$otp',NOW(),NOW());";
                                  mysqli_query($conn,$sql);
                                  $success='Please check your email to activate your account';
                                  echo $success;
/*
                                  $to = $email;

                            			$subject = "Confirm your Blog-Me account, ".$name;
                            			$addURLS="http://www.blogme.co/?hs=true&ee=".md5($to)."&em=".$email."&action=new&tok=".$otp."&secure=UTF-8";

                            			// PREPARE THE BODY OF THE MESSAGE

                            			$message = '<html><body>';
                            			$message .= '<h1>Hii ,'.$name.'</h1>';
                            			$message .= '</body></html>';

                            			$message .= "Final step...\r\n";
                            			$message .= "Confirm your email address to complete your Blog-Me account @".$username." It's easy-just click the link below.\r\n";
                            			$message .= "Note: Link expire in 24-Hours\r\n";
                            			$message .=  strip_tags($addURLS);



                            			$headers .= "From: Blog-Me<Blog-Me@blogme.co>\r\n";
                            			$headers .= "Reply-To: No-Reply<no-reply@blogme.co>\r\n";
                            			$headers .= "Return-Path: No-Reply<myplace@example.com>\r\n";
                            			$headers .= "CC: Admin<anurag@blogme.co>\r\n";
                            			$headers .= "BCC: Admin<hidden@example.com>\r\n";
                            			$headers .= "Organization: Sender Organization\r\n";
                            			$headers .= "MIME-Version: 1.0\r\n";
                            			$headers .= "X-Priority: 3\r\n";
                            			$headers .= "X-Mailer: PHP". phpversion() ."\r\n";
                            			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			                            mail($to,$subject,$message,$headers);
                                */
                       	           exit();
                                }
                            }
          	              else
          	               {
          		                 $error="EmailID already taken.";
                               echo $error;
                     	         exit();
                            }
                          }

                        }
                      }
                  }
else
{
  header("Location: error.inc.php");
	exit();
}




?>
