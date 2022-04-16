    <?php
    session_start();
    include 'dbconnection.php';
    if($_SESSION['card']==null){
    header('location:index.php');
}
    else{
    ?>
<body  style="background-image:url(Indian-Rupeenew.jpg)">
<center>
    <form name="f" action="" method="post"><br/><br/><br/><br/><br/><br/>
   <lable style="font-size:30px;">Enter Your ATM Pin:</lable><input type="password" name="atmpin" maxlength="4" required="required" style="border-style: none;background: transparent;font-size:30px" autofocus/>
    <br/><br/><br/><br/><br/>
    <input type="submit" name="sub" value="ENTER" style="font-size:30px;"/>
</form>
<?php
            }
include 'dbconnection.php';
if(isset($_REQUEST['sub']))
{
    $p=$_POST['atmpin'];
    $query="select * from tbluserdetails where atmpin='$p'";
$result=mysql_query($query);
if(mysql_num_rows($result)>0)
{
    header('location:bankmain.php');
}
 else {
    echo '<h1>Wrong ATM Pin</h1>';
}

    }
?>
</center>
</body>