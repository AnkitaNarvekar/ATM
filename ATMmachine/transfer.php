<body  style="background-image:url(Indian-Rupeenew.jpg)">
     <center>
    <form name='f' action='' method='post'>
       
    <table>       

        <tr><td><h1>Account Number:</h1></td><td><input type='text' class='form-control' name='accno' maxlength='16' required='required' style='font-size:30px' /></td></tr></h1>
        <h1><tr><td><h1>Receiver Mobile:</h1></td><td><input type='text' class='form-control' name='mob' maxlength='10' required='required' style='font-size:30px' /></td></tr></h1>
        <h1><tr><td><h1>Amount :</h1></td><td><input type='text' class='form-control' name='cash' pattern="[0-9]+" title="Numbers only" required='required'style='font-size:30px' /></td></tr></h1>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td><td><input type="submit" value="View Details >>>" name="sub" style="font-size:30px"/></td></tr>

     </table>
       
    </form>

    <?php
        date_default_timezone_set('Asia/Kolkata');
        session_start();
        if($_SESSION['card']==""){
        echo "<script> window.location.href='index.php' </script>";
    }
        include 'dbconnection.php';
        $r=1;
        
        if(isset($_REQUEST['sub'])){
            $sql=mysql_query("select * from tbluserdetails where accno='{$_POST['accno']}' and regmob='{$_POST['mob']}'");
           if(mysql_num_rows($sql)>0){
               $r=mysql_fetch_assoc($sql);
               echo "<br/>Acoount Holder Name: ".$r['name'];
               echo "<br/>Bank Name          : ".$r['bankname'];
               echo "<br/>Account Type       : ".$r['acctype'];
               ?>
         <form name="f" method="post" action="">    
         <table>   
        <tr><td><h1></h1></td><td><input type='hidden' class='form-control' name='accno' maxlength='16' required='required' value="<?php echo $_POST['accno'] ?>" style='font-size:30px' /></td></tr></h1>
        <h1><tr><td><h1></h1></td><td><input type='hidden' class='form-control' name='mob' maxlength='10' required='required' value="<?php echo $_POST['mob'] ?>" style='font-size:30px' /></td></tr></h1>
        <h1><tr><td><h1></h1></td><td><input type='hidden' class='form-control' name='cash' pattern="[0-9]+" title="Numbers only" value="<?php echo $_POST['cash'] ?>" required='required'style='font-size:30px' /></td></tr></h1>
        <tr><td>&nbsp;</td><td><input type="submit" value="Transfer >>>" name="sub1" style="font-size:30px"/></td></tr>
          
     </table>
                </form>
         <?php
           }else{
               echo "Invalid Account Number";
           }
        }
        
        if(isset($_REQUEST['sub1']))
        {
          
           $sql=mysql_query("select * from tbluserdetails where accno='{$_POST['accno']}' and regmob='{$_POST['mob']}'");
           if(mysql_num_rows($sql)>0){
               $w=$_POST['cash'];
               $query2="select MAX(slno)as no from tbltransaction where accno='{$_SESSION['accno']}' and bcode='{$_SESSION['bcode']}'";
               $result2=mysql_query($query2) or die(mysql_error());
               if(mysql_num_rows($result2)>0){
               $r1=mysql_fetch_assoc($result2) ;
               $query="select bal from tbltransaction where slno={$r1['no']} and accno={$_SESSION['accno']} "; 
               $result= mysql_query($query);
                if($result)
               {
               $row=mysql_fetch_assoc($result);

                   $a=$row['bal'];
                   if($a<$w)
                   {
                       echo 'Insuffient balance';
                   }
                   else {
                       $total=$a-$w;
                   $dt=Date('d/m/Y h:i:s');
                       $query2="select MAX(slno)as no from tbltransaction where accno='{$_SESSION['accno']}' and bcode='{$_SESSION['bcode']}'";
                       $result2=mysql_query($query2) or die(mysql_error());
                       $r1=mysql_fetch_assoc($result2);
                          if($r1['no']!=null){
                             $r=$r1['no']+1;
                          }

                   $query1="insert into tbltransaction values('$r','{$_SESSION['bcode']}','{$_SESSION['accno']}','$dt','ATM Transfer-{$_SESSION['accno']}','0','$w','$total')";
                   $result1=  mysql_query($query1) or die(mysql_error());
                   if($result1>0)
                   {
                       echo "<h1>Amount transfered successfully >>></h1>";
                       header("refresh:2;url=banklist.php");
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
        }else{
           echo '<h1>Please check the Account and Mobile Number...</h1>';
        }
        }
        
?>
         </center>
</body>        
