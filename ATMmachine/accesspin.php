<html>
<body  style="background-image:url(Indian-Rupeenew.jpg)"> 
    
<center>
    <form name="f" action="" method="post"><br/><br/><br/><br/><br/><br/>
    <lable style="font-size:30px;">Enter Bank Access Pin:</lable><input type="password" name="bankpin" maxlength="4" style="border-style: none;background: transparent;font-size:30px" autofocus /><br/><br/><br/><br/><br/>
    <input type="submit" name="sub" value="Continue >>>" style="font-size:30px; width: 220px;"/><br/>
<!--    <input type="submit" name="pin" Value="Get Pin >>>" style="font-size:30px; width: 220px;"/><br/><br/>-->
    <input type="hidden" name="bc" value="<?php echo $_GET['bcode']; ?>"/>
<?php
    session_start();
    if($_SESSION['card']==""){
        echo "<script> window.location.href='index.php' </script>";
    }
    $f=$_GET['bcode'];
    $_SESSION['bcode']=$f;
    include 'dbconnection.php';
    
   
    if(isset($_REQUEST['sub']))
    {
        $a=$_POST['bankpin'];
        
      $query="select * from tbluserdetails where accesspin='$a' and bcode='$f' and atmcard='{$_SESSION['card']}'";
      $result=mysql_query($query) or die(mysql_error());
      if(mysql_num_rows($result)>0){
          $row=mysql_fetch_assoc($result);
          $ac=$row['accno'];
          $_SESSION['accno']=$ac;
          //echo $ac;
                    header('location:banklist.php');
      }else{
          echo '<h1><br/><br/>Wrong Bank Access Pin </h1>';

        
      }
    }
    
    if(isset($_REQUEST['pin']))
    {
        
      $query="select * from tbluserdetails where bcode='{$_POST['bc']}' and atmcard='{$_SESSION['card']}'";
      $result=mysql_query($query);
      if(mysql_num_rows($result)>0){
          $row=mysql_fetch_assoc($result);
        echo "<script> alert('Your Bank Access pin is: {$row['accesspin']}. Please do not disclose to any one.');</script>";
    }
    }

?>
    </form>
</center>
</body>
</html>