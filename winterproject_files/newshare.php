  <?php
if(isset($_REQUEST['us_share']))
{
    if(!empty($_REQUEST['us_share']))
    {
        $us_share = $_REQUEST['us_share'];
         include 'shareposts.php';
         shareposts($us_share);
    }
    else
    {
        echo "<script> alert(' FIELDS ARE MANDATORY!!!'); </script>";
    }
}
?>           
                    <form action = 'afterlogin.php' method ='POST'>
              
                         <textarea rows = "10" cols= "100" name = 'us_share' placeholder="Post Your Question Here...."></textarea>
                         <br>
                       <button class="btn" type ='submit' value ='share' name = 'us_sharesubmit'>Share</button>
                           
                    </form>
</table>