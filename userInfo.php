<style>
<?php include("css/style.css"); ?>
</style>

<?php
        $con = mysqli_connect('localhost', 'root', '','reboot');
        date_default_timezone_set('Asia/Kolkata');
        $user=$_COOKIE['email'];
        $sql2="SELECT * FROM registertable WHERE email = '$user'";
        $result=mysqli_query($con,$sql2);
        $row=mysqli_fetch_assoc($result);
		$name = htmlentities(ltrim($_POST['name']));
        $table  = strtolower($row['data']);
        $date = date(" d M Y h:ia ");
        $id = date("YsHm");
        $sql = "INSERT INTO $table (content,date,postid,likes) VALUES('$name','$date','$id','0')";
        $sql2 = "INSERT INTO post (content,postid) VALUES('$name','$id')";
       
		if(mysqli_query($con,$sql2) && mysqli_query($con,$sql) && !empty($name)){
		 
            ?>
<script>
window.location = "index";
</script>
<?php
		} else {
		  echo "<br><span class='warn'>You Can't Post anything Empty <span style=\" cursor:pointer;font-weight:bold; \" onclick=\"this.parentElement.style.display='none';\">&times;</span></span><br> ";
      }
      
?>