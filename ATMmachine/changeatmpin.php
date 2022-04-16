<html>
<body  style="background-image:url(Indian-Rupeenew.jpg)"> 
<form name='f' action='' method='post'>
    <center>
<?php
include 'dbconnection.php';
session_start();
if($_SESSION['card']==""){
        echo "<script> window.location.href='index.php' </script>";
    }
$old=$_POST['oldatmpin'];
$p1=$_POST['newatmpin'];


    $query="select * from tbluserdetails where atmcard='{$_SESSION['card']}' and atmpin='$old'";
    $result=  mysql_query($query);
   
        if(mysql_num_rows($result)>0){
                       $query="update tbluserdetails set atmpin='$p1' where atmcard='{$_SESSION['card']}'";
            $result=mysql_query($query);
            if(mysql_affected_rows()>0){
                echo '<h1>Your ATM Pin Changed Successfully</h1>';
                ?> <a href='banklist.php'><input type="button" value=">>>BACK"  style="font-size:30px"/></a>
     <?php
            }
            
            else{
                    echo '<h1>Can Not Change Your  ATM Pin at This Moment!!!Please Try Later</h1>';
                    ?> <a href='banklist.php'><input type="button" value=">>>BACK"  style="font-size:30px"/></a>
     <?php
                          }

        }
        else
        {
            echo "<h1>Your ATM Pin Does not Match</h1>";            
                     ?> <a href='banklist.php'><input type="button" value=">>>BACK"  style="font-size:30px"/></a>
     <?php   }
        
?>
</center>
</form>
</body>
</html>