
<body  style="background-image:url(Indian-Rupeenew.jpg)">
<?php
session_start();
if($_SESSION['card']==""){
        echo "<script> window.location.href='index.php' </script>";
    }
include 'dbconnection.php';
//echo "{$_SESSION['accno']}";
$query="select max(slno) as id from tbltransaction where accno='{$_SESSION['accno']}' and bcode='{$_SESSION['bcode']}'";
$result=  mysql_query($query);
if(mysql_num_rows($result)>0)
{
    
    ?>
<center>
<table>
    <tr>
        <br/><br/><br/><br>/<br/><br/><br/><br/>
        <td><h1>Your Current Balance is</h1></td>    
    
    </tr>
    <?php
    while($row=mysql_fetch_assoc($result))
    {
        $q="select bal from tbltransaction where slno={$row['id']} and bcode='{$_SESSION['bcode']}' ";
        $r=  mysql_query($q);
        $r=mysql_fetch_assoc($r);
       
        
    
        ?>
    <tr>
        
        <td><?php echo "<h1>Rs. {$r['bal']}</h1>" ?></td>
    </tr></table>
        <a href='banklist.php'><input type="button" value=">>>BACK"  style="font-size:30px"/></a>
     
<?php } }
 else {
     echo '<h1>Invalid Account Number</h1>';
 }
?>    




</table>
</center>
</body>




