<body  style="background-image:url(Indian-Rupeenew.jpg)">
       <center> <h1> Please Select The Bank </h1></center>
<?php
session_start();
if($_SESSION['card']==""){
        echo "<script> window.location.href='index.php' </script>";
    }
include 'dbconnection.php';

//     echo "{$_SESSION['id']}";
     
    $query="select DISTINCT(bankname) as bankname,bcode from tbluserdetails where atmcard='{$_SESSION['card']}'";
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result))
{
//    echo "in";
//    $b=$row['bcode'];
//    $_SESSION['bcode']=$b;
//    $q="select ifsccode from tblbank where bcode='{$row['bcode']}'";
//        $rs=mysql_query($q);
//        $row1=mysql_fetch_assoc($rs)
//                
    ?>
            <br/><br/>
<center>
    
        <a href=accesspin.php?bcode=<?php echo "{$row['bcode']}"?>
       <table width='100%'>
           <?php
//           if($row['bankname']=="SBI")
//           {
//            
           ?>
                <tr><td align='left'><button name="b1" style="width:300px; height:100px; font-size:40px;"><?php echo $row['bankname'] ?></button></td></tr></a>
<?php
        //   }
           ?>
</table>
    
    
    
    </a>
</center>
<?php } ?>

</body>
