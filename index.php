<?php
include('process.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.style.css">
</head>
<body>
    <!-- header -->
<div>
    <div class="loginlogout">
    <img src="./img/logo.PNG" alt="">
    <div class="tl" >
    <a  class="br" href="../sandeshphp/signup.php">signup</a>
    <a class="br" href="../sandeshphp/login.php">login</a>

    </div>
    
    </div>
    
        <ul>
            <li> <a href="">Dashboard</a></li>
            <li> <a href="">Manage client</a></li>
            <li> <a href="">Add Clients</a></li>
            <li> <a href="">Sort Clients</a></li>
        </ul>
       
    </div>
        </div>

<!-- reminder -->
<section class="reminder">
    <div>
        <h1>Reminder</h1>
    <div class="R1">
             <div class="r1s"> 
                 <div class="R11">Today 
                     <?php
                        echo $num_row;
                     ?>
                 </div>     
                <div class="R12">schedule</div>  
            </div>
             <div class="r1ss">
                 <div class="R13">All</div>     
                <div class="R14">Flag</div>  
             </div>
                  
    </div>       
            <button class="new_reminder">New Reminder</button>
                <aside>
            <form action="process.php" method="post">
            <input type="textarea" placeholder="User Name" class="txt" name="Text">
            <input type="date" placeholder="Password" class="txt" name="Date">
            <input type="submit" value="Text Reminder" class="btn" name="btn-reminder-save">
        </form>
                </aside>
             </div>  
            <div>
                <h1>Activities Today</h1>
            <div class="R2">
                <div class="R21">
                <?php while($row =mysqli_fetch_array($result)){
                    echo"<tr>
                    <td>".$row['Text']."</td>
                    <td>".$row['Date']."</td>
                   <td> <a href= 'process.php?dt=$row[Date]'>delete</td>
                   </tr>";
                }

                  ?>
                </div>     
                <div class="R22"></div>      
             </div>  
            </div>
                    
</div>
            </section>

<script>
    let btn= document.querySelector('button');
    let aside= document.querySelector('aside');

    btn.addEventListener('click',()=>{
        if(aside.style.display==='none'){
            aside.style.display="block";
            
        } else {
            aside.style.display="none";
        }
    });
</script>


</body>
</html>