<body  style="background-image:url(Indian-Rupeenew.jpg)">
    
    <form name='f' action='changebankpin.php' method='post'>
       <center> 
    <table>
        <center>
<?php
session_start();
include 'dbconnection.php';
if($_SESSION['card']==null){
    header('location:index.php');
}
else{
//    echo "<tr><td>ATM Card Number:</td><td><input type='text' class='form-control' name='name' value='{$_SESSION['id']}' size='35' readonly='true'/></td></tr>";
    echo "<tr><td><h1> Old Pin</h1></td><td><input type='password' class='form-control' name='oldbankpin' maxlength='4' required='required' style='font-size:30px' /></td></tr></h1>";
    echo "<h1><tr><td><h1>New Pin</h1></td><td><input type='password' class='form-control' name='newbankpin' maxlength='4' required='required' style='font-size:30px' /></td></tr></h1>";
    echo "<h1><tr><td><h1>Confirm Pin</h1></td><td><input type='password' class='form-control' name='p2' maxlength='4' required='required'style='font-size:30px' /></td></tr></h1>";
}

?>
         <tr><td>&nbsp;</td></tr>
         <tr><td>&nbsp;</td><td><input type="submit" value="Change Pin" style="font-size:30px"/></td></tr>
         
</table>
           </center>
    </form>

</body>        
