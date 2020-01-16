<?php
$tablename = $_POST['tablename'];
$postid = $_POST['postid'];
$con = mysqli_connect("localhost","root","","reboot");
$key = $_POST['key'];
$sql="SELECT * FROM $tablename WHERE postid = '$postid'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
$like = $row['likes'];


if ($key=='a'){
    
    $likenew = $like + 1;
    $sql2 = "UPDATE $tablename SET likes ='$likenew' WHERE postid='$postid' ";
    mysqli_query($con,$sql2);
    
    
}
?>
<script>
window.location = "index.php#<?php echo $postid; ?>";
</script>

<?php


?>

