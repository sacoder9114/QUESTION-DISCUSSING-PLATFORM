<?php
require 'core_inc.php';
require 'connect_inc.php';
?>
<?php
//INSERT INTO `users` VALUES ('milo','hello','787','202cb962ac59075b964b07152d234b70','','','','','','')
if (isset($_REQUEST['us_un'])&&isset($_REQUEST['us_p']))
{
    $us_un=$_REQUEST['us_un'];
    $us_p=$_REQUEST['us_p'];
    $us_ph=md5($us_p);
   // echo $us_ph;
    if(!empty($us_un)&&!empty($us_p))
    {
         $us_un = mysql_real_escape_string($us_un);
         $query = "SELECT `us_id` FROM `users` WHERE `us_un` REGEXP '$us_un' AND `us_p` = '$us_ph' ";
    if( $query_run = mysql_query($query))
    {
        $query_num_rows = mysql_num_rows($query_run);
        if( $query_num_rows==0)
            {
        echo 'Invalid Username/password Combination';
            }
        else if( $query_num_rows == 1)
        {
         $us_id = mysql_result($query_run,0,'us_id');
         $_SESSION['us_id'] = $us_id;
         if($us_un=='admin'&&$us_ph='d81f9c1be2e08964bf9f24b15f0e4900')
         {
            header('Location: newstartadmin.php');  
         }
         else
         {
         header('Location: afterposts.php');
         }
        }
    }
    }
    else
    {
        echo "supply username and password";
    }
}
    ?>
<form action = "<?php echo $current_file ?>" method ="POST"> 
    <table align = "center" vertical-align = "top" >
        <tr><td align = 'center'>Username: <input type="text" name = "us_un" placeholder= "username" /></td></tr>
        <tr><td align = 'center'>Password: <input type="password" name = "us_p"/> </td></tr>
        <tr><td align = 'center'><input type = "submit" value = "Login"/></td></tr>
    </table>
</form>