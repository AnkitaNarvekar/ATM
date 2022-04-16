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
$oldp=$_POST['oldbankpin'];
$newp=$_POST['newbankpin'];


    $query="select * from tbluserdetails where accno='{$_SESSION['accno']}' and bcode='{$_SESSION['bcode']}' and accesspin='$oldp'";
    $result=  mysql_query($query);
   
        if(mysql_num_rows($result)>0){
                       $query="update tbluserdetails set accesspin='$newp' where accno='{$_SESSION['accno']}' and bcode='{$_SESSION['bcode']}'";
            $result=mysql_query($query);
            if(mysql_affected_rows()>0){
                echo '<h1>Your Bank Pin Changed Successfully</h1>';
                ?> <a href='banklist.php'><input type="button" value=">>>BACK"  style="font-size:30px"/></a>
     <?php
            }
            
            else{
                    echo '<h1>Can Not Change Your Bank Pin at This Moment!!!Please Try Later</h1>';
                    ?> <a href='banklist.php'><input type="button" value=">>>BACK"  style="font-size:30px"/></a>
     <?php
                          }

        }
        else
        {
            echo '<h1>Your Bank Pin Does not Match</h1>';
            ?> <a href='banklist.php'><input type="button" value=">>>BACK"  style="font-size:30px"/></a>
     <?php
        }
        
?>
    </center>
</form>
</body>
</html>