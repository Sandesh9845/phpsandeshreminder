<?php
session_start(); 

include "connection.php";

if (isset($_GET['uname']) && isset($_GET['pass'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
     
       return $data;
    }


    $uname = validate($_GET['uname']);
    $pass = validate($_GET['pass']);

    if (empty($uname)) {
        header("Location: login.php?error=User Name is required");
        exit();

    }else if(empty($pass)){
        header("Location: login.php?error=Password is required");
        exit();

    }else{

        $sql = "SELECT * FROM client_user WHERE UName='$uname' AND Password='$pass'";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['UName'] === $uname && $row['Password'] === $pass) {
                echo "Logged in!";

                $_SESSION['UName'] = $row['UName'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['id'] = $row['id'];

                header("Location: index.php");

                exit();

            }else{

                header("Location: login.php?error=Incorrect User name or password");

                exit();

            }

        }else{

            header("Location: login.php?error=Incorrect User name or password");

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}