<html>
    <head></head>
    <script lang="javascript">
                function validate(){
                    
                    if((document.f.newatmpin.value)!=(document.f.p2.value))
                        {
                            alert('Password does not match');
                            return false;
                        }
                        return true;
                }
    
    </script>

<body  style="background-image:url(Indian-Rupeenew.jpg)">
   
    <form name='f' action='changeatmpin.php' method='post' onsubmit="javascript:return validate();">
         <center>
    <table>
<?php
session_start();
include 'dbconnection.php';
if($_SESSION['card']==null){
    header('location:index.php');
}
else{
    echo "<h1><tr><td><h1>Mobile</h1></td><td><input type='text' class='form-control' name='name' value='{$_SESSION['id']}' size='20' readonly='true' style='font-size:30px'/></td></tr></h1>";
    echo "<h1><tr><td><h1>Old Pin</h1></td><td><input type='password' class='form-control' name='oldatmpin' maxlength='4' required='required' style='font-size:30px'/></td></tr></h1>";
    echo "<h1><tr><td><h1>New Pin</h1></td><td><input type='password' class='form-control' name='newatmpin' maxlength='4' required='required' style='font-size:30px'/></td></tr></h1>";
    echo "<h1><tr><td><h1>Confirm Pin</h1></td><td><input type='password' class='form-control' name='p2' maxlength='4' required='required' style='font-size:30px'/></td></tr></h1>";
}

?>
         <tr><td>&nbsp;</td></tr>
         <tr><td>&nbsp;</td><td><input type="submit" value="Change Pin" style="font-size:30px"/></td></tr>
         
</table>
    
</center>
         
</form>
</body>
</html>