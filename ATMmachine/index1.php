<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ATMmachine</title>
        
    </head>
    <script lang="javascript">
                function validate()
                {
                    if(isNaN(document.f.num.value)){
                        alert('<h1>Enter Valid Digits</h1>');
                        return false;
                    }
                    return true;
                }
</script>
    <body style="background-image:url(Indian-Rupeenew.jpg)">
        <form name="f" action="login.php" method="post" onsubmit="javascript:return validate();">
            <center><br/><br/><br/><br/>
            <lable style="font-size:30px;">Enter Your Mobile Number:</lable><input type="text" name="num" required="required" maxlength="16" style="border-style: none;background: transparent;font-size:30px" autofocus/>
            <br/><br/><br/><br/>
            <input type="submit" value="Continue >>>" style="font-size:30px; width: 220px;"/><br/><br/>
<!--            <input type="submit" name="pin" Value="Get Pin >>>" style="font-size:30px; width: 220px;"/><br/><br/>-->
            </center>
        </form>
        
        <?php 
        if(isset($_GET['msg'])){
            echo "<script> alert('{$_GET['msg']}') </script>";
        }
        ?>
        
    </body>
</html>
