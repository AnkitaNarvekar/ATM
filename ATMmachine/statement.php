

<html>
    <body  style="background-image:url(Indian-Rupeenew.jpg)"> 
<center>
    <form name="f" action="" method="post">
        <table style='align-items:center'>
<?php
    session_start();
    include 'dbconnection.php';
    if($_SESSION['card']==null){
    header('location:index.php');
}
    else{
            $query="SELECT * from (select * FROM `tbltransaction` WHERE accno='{$_SESSION['accno']}' and bcode='{$_SESSION['bcode']}' order by slno desc limit 5) tbltransaction order by tbltransaction.slno asc";
            $result=  mysql_query($query) or die(mysql_error());
            if(mysql_num_rows($result)>0)
            {
                ?>
            <tr>
                <br/><br/><br/><br/>
                <td>   <h1>  Date of Transaction </h1></td>
                <td> <h1>Description</h1></td>
                <td><h1>Credit</h1></td>
                <td><h1>Debit</h1></td>
                <td><h1>Balance</h1></td>
            </tr>
            <?php
            while($row=  mysql_fetch_assoc($result))
            {?>
            <tr>
               
                <td><?php echo "<h1>{$row['dtdate']}</h1>" ?></td>
                <td><?php echo "<h1>{$row['discp']}</h1>" ?></td>
                <td align='right'><?php echo "<h1>{$row['cedit']}</h1>" ?></td>
                <td align='right'><?php echo "<h1>{$row['debit']}</h1>" ?></td>
                <td align='right'><?php echo "<h1>{$row['bal']}</h1>" ?></td>
            </tr>
           <?php }
           
            
            }
        else {
                    echo '<h1>Error in Displaying your Statement of Transaction!!!Sorry</h1>';
                    ?> <a href='banklist.php'><input type="button" value=">>>BACK"  style="font-size:30px"/></a>
     <?php
            
               }
        
            }

    
?>
    </table>        <a href='banklist.php'><input type="button" value=">>>BACK"  style="font-size:30px"/></a>

    </form>
    </center>
</body>
</html>