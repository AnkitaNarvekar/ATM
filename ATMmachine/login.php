<body  style="background-image:url(Indian-Rupeenew.jpg)"> 
<center>
    
<?php
session_start();
include 'dbconnection.php';
$num=$_POST['num'];

if(isset($_REQUEST['pin'])){
    $query="select * from tbluserdetails where regmob='$num'";
    $result=mysql_query($query);
    if(mysql_num_rows($result)>0){
        $row=mysql_fetch_assoc($result);
        echo "<script> alert('Your ATM pin is: {$row['atmpin']}. Please do not disclose to any one.') ;
                       window.location.href='index1.php' </script>";
    }else{
         header('location:index1.php?msg=Invalid card number');
    }
}
else{
$query="Select * from tbluserdetails where regmob='$num'";
$result=mysql_query($query) or die(mysql_error());
if(mysql_num_rows($result)>0)
{
$row=mysql_fetch_assoc($result);
        $_SESSION['id']=$num;
        $ac=$row['atmcard'];
        $_SESSION['card']=$ac;
//        echo "{$_SESSION['id']}";
       header('location:ATMmain.php');
    }     

 else {
        echo '<h1>Invalid Mobile Number</h1>';
    }
}

?>
</center>
</body>    
  
