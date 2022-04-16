<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <center>
    <body style="background-image:url(Indian-Rupeenew.jpg)">
        <?php
        date_default_timezone_set('Asia/Kolkata');
        session_start();
        if($_SESSION['card']==""){
        echo "<script> window.location.href='index.php' </script>";
    }
        include 'dbconnection.php';
        $r=1;
        
           $w=$_GET['i'];
           $query2="select MAX(slno)as no from tbltransaction where accno='{$_SESSION['accno']}' and bcode='{$_SESSION['bcode']}'";
           $result2=mysql_query($query2) or die(mysql_error());
           if(mysql_num_rows($result2)>0){
//           echo $_SESSION['accno'];
               $r1=mysql_fetch_assoc($result2) ;
           $query="select bal from tbltransaction where slno={$r1['no']} and accno={$_SESSION['accno']} "; 
           $result= mysql_query($query);
            if($result)
           {
//                echo 'againin';
           $row=mysql_fetch_assoc($result);
               
               $a=$row['bal'];
//              echo $_SESSION['bcode'];
//              echo $_SESSION['accno'];
//              echo $a;
               if($a<$w)
               {
                   echo '<h1>Insuffient balance</h1>';
               }
               else {
                   $total=$a-$w;
               $dt=Date('Y/m/d h:i:s');
                   $query2="select MAX(slno)as no from tbltransaction where accno='{$_SESSION['accno']}' and bcode='{$_SESSION['bcode']}'";
           $result2=mysql_query($query2) or die(mysql_error());
           $r1=mysql_fetch_assoc($result2);
              if($r1['no']!=null){
                 $r=$r1['no']+1;
              }
           
                
               $query1="insert into tbltransaction values('$r','{$_SESSION['bcode']}','{$_SESSION['accno']}','$dt','ATM Withdrawn','0','$w','$total')";
               $result1=  mysql_query($query1) or die(mysql_error());
               if($result1>0)
               {
                   echo '<h1>Please Collect Your Cash>>></h1>';
               }
           
                else {
                        echo '<h1>Your Account Can not Update at This Time!!!Please Try after sometime</h1>';
                        }
               
              } 
              
        }
        else
        {
            echo '<h1>You Cant Withdraw the Amount</h1>';
        }
        
           
        }
        ?>
    </body></center>
</html>
