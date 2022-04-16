
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body  style="background-image:url(Indian-Rupeenew.jpg)"><center>
            
        <?php
        session_start();
        if($_SESSION['card']==""){
        echo "<script> window.location.href='index.php' </script>";
    }
        ?>
        <table style="width:100%; align-content:center">
            <tr><br/><br/><br/><br/>
        <?php echo "<h1>Please Select the Amount To be Withdrawn</h1>" ?><br/><br/><br/><br/>
        <tr><td><a href="fastwithdraw.php?i=500"><input type="button" name="wi" value="500" style="align-content:flex-start; width:500px; height:100px; font-size:40px"/></a></td>
        <td><a href="fastwithdraw.php?i=1000"><input type="button" name="st" value="1000" style="align-content:flex-end; width:500px; height:100px; font-size:40px"/></a></td></tr>
    <tr><td><a href="fastwithdraw.php?i=2000"><input type="button" name="bal" value="2000" style="align-content:flex-start; width:500px; height:100px; font-size:40px"/></a></td>
        <td><a href="fastwithdraw.php?i=4000"><input type="button" name="chngpass" value="4000" style="align-content:flex-end; width:500px; height:100px; font-size:40px"/></a></td></tr>
    <tr><td><a href="fastwithdraw.php?i=5000"><input type="button" name="bal" value="5000" style="align-content:flex-start; width:500px; height:100px; font-size:40px"/></a></td>
        <td><a href="fastwithdraw.php?i=10000"><input type="button" name="bal" value="10000" style="align-content:flex-start; width:500px; height:100px; font-size:40px"/></a></td></tr>
        </table>
   </center> </body>
</html>
