<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>
<body>
<?php
//include 'chechklikes.php';
//ob_start();
include 'connect_inc.php';
//session_start();
include 'header1.php';
//include 'postcomment.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
//$us_id = $_SESSION['us_id'];
$select_query = "SELECT * FROM  `users` ORDER BY `us_id` ASC ";
$sql = mysql_query($select_query) or die(mysql_error());
 $query_num_rows =  mysql_num_rows($sql);
//echo $query_num_rows;
if($query_num_rows == 0)
{
    echo '<strong>Now no users are there are on your website</strong>';
}
else
{
//$query_result = mysql_result($sql,0,'us_pl');
    echo '<p><u><h2  style="text-align:center;">You have following users on ur List:</h2></u></p><br>';
$y=0; 

echo '<div class="container"><div class="row"><div class="col-md-offset-5">';   
    ?>
    <table border="1px">
<?php while($row = mysql_fetch_assoc($sql))
{
	
	$y++;
    $id=$row['us_id']; 
    $qry = "SELECT `us_fn` FROM `users` WHERE `us_id` = '$id' ";
    $qry1 = "SELECT `us_ln` FROM `users` WHERE `us_id` = '$id' ";
    $qry5 = "SELECT `us_un` FROM `users` WHERE `us_id` = '$id' ";
    $query_run5 = mysql_query($qry5);
    $a= mysql_result($query_run5, 0, `us_un`);
    $b=$id;
    $qry_run =mysql_query($qry);
     $qry1_run =mysql_query($qry1);
     $qry_result = mysql_result($qry_run,0, `us_fn`);
     $qry1_result = mysql_result($qry1_run,0, `us_ln`);
     $spaceit = ' ';
     $ans = $qry_result.$spaceit.$qry1_result;    
     ?><tr><td style="padding:15px;"><?php echo $y;?></td><td style="padding:20px;"><a href = 'userposts.php?username=<?php echo $a;?>&userid=<?php echo $b; ?>'><?php echo $ans; ?> </a></td></tr>
    
     <?php
     

}

echo '</div></div></div>';
echo '</table>';

echo '
    <br><br><a href="afterposts.php"><button class="btn btn-lg success ">Create A New Post</button></a>';
}