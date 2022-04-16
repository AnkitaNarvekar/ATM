<?php
session_start();
if($_SESSION['card']==""){
        echo "<script> window.location.href='index.php' </script>";
    }
?>
<body  style="background-image:url(Indian-Rupeenew.jpg)">
<center>
<table style="width:100%; align-content:center"><br/><br/><br/><br/><br/><br/>
    <tr><td><a href="withdraw.php"><input type="button" name="wi" value="WITHDRAWAL CASH" style="align-content:flex-start; width:500px; height:100px; font-size:40px"/></a></td>
        <td><a href="statement.php"><input type="button" name="st" value="MINI STATEMENT" style="align-content:flex-end; width:500px; height:100px; font-size:40px"/></a></td></tr>
    <tr><td><a href="balance.php"><input type="button" name="bal" value="BALANCE ENQUIRY" style="align-content:flex-start; width:500px; height:100px; font-size:40px"/></a></td>
        <td><a href="change.php"><input type="button" name="chngpass" value="CHANGE ATM PIN" style="align-content:flex-end; width:500px; height:100px; font-size:40px"/></a></td></tr>
    <tr><td><a href="changebpin.php"><input type="button" name="bpin" value="CHANGE BANK PIN" style="align-content:flex-start; width:500px; height:100px; font-size:40px"/></a></td>
        <td><a href="fastcash.php"><input type="button" name="fast" value="FAST CASH" style="align-content:flex-start; width:500px; height:100px; font-size:40px"/></a></td></tr>
<!--    <tr><td><a href="transfer.php"><input type="button" name="trn" value="TRANSFER AMOUNT" style="align-content:flex-start; width:500px; height:100px; font-size:40px"/></a></td>-->
        <td><a href="logout.php"><input type="button" name="exit" value="EXIT" style="align-content:flex-start; width:500px; height:100px; font-size:40px"/></a></td></tr>
</table>
</center>
</body>

