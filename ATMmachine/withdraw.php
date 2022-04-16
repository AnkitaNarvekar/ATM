<!DOCTYPE html>
    <head><title>ATM Withdraw</title></head>
     <script lang="javascript">
                function validate()
                {
                    if(isNaN(document.f.cash.value)){
                        alert('Cash Should be in the Form of Digits');
                        return false;
                    }
                    if((document.f.cash.value)<100){
                         alert('Please Enter Minimum 100 Rs');
                        return false;
                    }
                    return true;
                }
</script>
<body  style="background-image:url(Indian-Rupeenew.jpg)">
<center>
    <form name='f' action='' method='post' onsubmit="javascript:return validate()"><br/><br/><br/><br/><br/><br/>
      <lable style="font-size:30px;">Enter The Amount To Be Withdrawn:</lable>
      <input type="text" pattern="[0-9]+" name="cash" required="required" style="border-style: none;background: transparent;font-size:30px;" autofocus/>
    <br/><br/><br/>
    <input type="submit" name="sub" value="ENTER" style="font-size:30px"/>
    <?php
        date_default_timezone_set('Asia/Kolkata');
        session_start();
        if($_SESSION['card']==""){
        echo "<script> window.location.href='index.php' </script>";
    }
        include 'dbconnection.php';
        $r=1;
        if(isset($_REQUEST['sub']))
        {
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
           
                $query1="insert into tbltransaction values('$r','{$_SESSION['bcode']}','{$_SESSION['accno']}','$dt','ATM Withdrawn','0','$w','$total')";
               $result1=  mysql_query($query1) or die(mysql_error());
               if($result1>0)
               {
                   echo "<h1>Please Collect Your Cash>>></h1>";
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
        }
        
?>
    </form>
</center>
</body>

</html>