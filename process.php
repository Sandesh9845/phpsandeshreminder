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



<!--adding new reminder -->
<?php

    require_once('connection.php');


  if(isset($_POST['btn-reminder-save']))
  {
        $Text = mysqli_real_escape_string($con,$_POST['Text']);
        $Date = mysqli_real_escape_string($con,$_POST['Date']);

        if(empty($Text) || empty($Date))
       { 
         echo  "please fill the blank";
       }
       
         $sql="insert into reminder (Text,Date) values('$Text','$Date')";
         $result=mysqli_query($con,$sql);

         if($result)
          {
            header("Location: http://localhost/sandeshphp/index.php" );
            exit();

          }
          else
          {
            echo 'Please check your query';
          }
       
    }


  ?>




<!-- fetch data of new reminder -->

<?php
include('connection.php');
// write query for  reminder

$sql= "SELECT * FROM reminder";

// make queary & get result
$result=mysqli_query($con, $sql);

// // fetchg the result rows as an array
// $reminder = mysqli_fetch_array($result);
// // free result from mem,ory
// mysqli_free_result($result);

// close connectio
mysqli_close($con);


?>



<!-- fetch data of new reminder -->

<?php
include('connection.php');
error_reporting(0);
// write query for  reminder to delete
$date=$_GET["dt"];
$sql= "DELETE FROM reminder where Date='$date'";

// make queary & get result
$data=mysqli_query($con, $sql);
if ($data)
{
  echo "(Data deleted)";
}

// // fetchg the result rows as an array
// $reminder = mysqli_fetch_array($result);
// // free result from mem,ory
// mysqli_free_result($result);

// close connectio
mysqli_close($con);


?>


<!-- fetch data of new reminder -->

<?php
include('connection.php');
error_reporting(0);
//  write query for  reminder to count

$query= "SELECT COUNT('*') as count FROM reminder ";

//  make query & get result
$query_result=mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($query_result)) {
  $output= $row['count'];
}



?>


