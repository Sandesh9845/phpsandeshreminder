<?php

    require_once('connection.php');


  if(isset($_POST['btn-save']))
  {
        $UserName = mysqli_real_escape_string($con,$_POST['UserName']);
        $Email = mysqli_real_escape_string($con,$_POST['Email']);
        $Password = mysqli_real_escape_string($con,$_POST['Password']);
        $CPassword = mysqli_real_escape_string($con,$_POST['CPass']);

        if(empty($UserName) || empty($Email) || empty($Password) || empty($CPassword))
       { 
         echo  "please fill the blank";
       }

       if($Password!=$CPassword)
       {
         echo "password not matched";
       }
       else
       {
         $Pass=md5($Password);
         $sql="insert into client_user (UName,Email,Password) values('$UserName','$Email','$Pass')";
         $result=mysqli_query($con,$sql);

         if($result)
          {
            echo 'YOur Record has been saved in the Database';

          }
          else
          {
            echo 'Please check your query';
          }


       }
    }


  ?>