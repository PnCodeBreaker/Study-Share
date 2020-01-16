<?php
session_start();
$con = mysqli_connect("localhost","root","","reboot");
@$email = $_COOKIE['email'];
@$password = $_COOKIE['password'];   
if($con){
    $sql = "SELECT * FROM registertable WHERE email = '$email'";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    $imgloc = $row['username'];
    if($row['email']==$email && $row['password']==$password){
        ?>
<html>
    <?php
        if(isset($_POST['update']) && !empty($_POST['fname'])){
            if($_POST['topic']!="--Select Stream--") {
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $contact = $_POST['contact'];
                    $topic = $_POST['topic'];
                    $class = $_POST['class'];
                    $bio = ltrim($_POST['bio']);
                    $qual = $_POST['qualification'];
                    $name = $fname." ".$lname;
                    $sql = "UPDATE registertable SET fname = '$fname' , lname = '$lname' , contact = '$contact', class  = '$class' , topic = '$topic', bio='$bio' , qualification='$qual', name='$name' WHERE email = '$email' ";
                    mysqli_query($con,$sql);
                    header("location:profile");
        } else {
                ?><script>alert('Select a Stream');</script><?php
            }
        }
                    ?>
    <head>
    <style>
        @font-face{
    src : url('fonts/gotham/Gotham-Bold.otf');
    font-family: gothamb;
}
            .img{
    height:140px;
    width:auto;  
    box-shadow: 0 10px 48px 0 rgba(0,0,0,0.3);            
    z-index: 1;
}
        .logo {
            width: 60px;
            height: 60px;
        }

            .card {
                width: 700px;
                height: auto;
                border-radius: 2px 2px 2px 2px;
                border: 1px solid gainsboro;
                padding-top: 60px;
                padding-bottom: 60px;
                padding-left: 30px;
                padding-right: 30px;
                border-radius: 5px;
                font-family: gothamb;
                transition : all 0.2s ease;
                font-size: 20px;
            }
            .card:hover{
                box-shadow: 0 4px 18px 0 rgba(0,0,0,0.3);
            }    
    </style>
       <style>
            <?php include "css/style.css"; ?>
        </style>
        </style><link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
          <title>Reboot Remastered</title>
    </head>
    <body>
     <center>    
        <div class="row">
                                        <div class="topnav">
<a href="profile" style="padding-right:0;"><i class="material-icons" style="font-size:24px;">arrow_back</i></a><a><b style="color:grey;font-family:gotham">Daero</b> <b style="font-family:Josefin">Study Share</b></a>
<a class=nav2 onclick="javascript:window.location='signout'" style="cursor:pointer;float:right;">Logout</a>
<a class=nav1 onclick="javascript:window.location='profile'" style="cursor:pointer;float:right;">Profile</a>

</div>
            
               
            </div>  
        </center>
        <BR>
        <div class="body">
            
            <center>

                
                <br><br><br>
                <div class="card">
                    <form method="post" action="">                       
                <br> First Name : <input placeholder="First Name" type="text" name='fname' value="<?php echo $row['fname'];?>"><br><br>
                 Last Name : <input placeholder="Last Name" type="text" name='lname' value="<?php echo $row['lname'];?>"><br><br>
                Contact No . : <input placeholder="Contact" type="text" name='contact' maxlength="10" value="<?php echo $row['contact'];?>"><br><br><br>
                       
                        <?php
                        if($_SESSION['type']=="teacher"){
                            echo "Topic :"
                        ?>
                        <select name="topic">
                                       <option>--Select Stream--</option>
                                       <option value="Physics" <?php if($row['topic']=="Physics"){ echo "selected"; }?> >Physics</option> 
                                       <option value="Chemistry" <?php if($row['topic']=="Chemistry"){ echo "selected"; }?>>Chemistry</option>
                                       <option value="Mathematics" <?php if($row['topic']=="Mathematics"){ echo "selected"; }?>>Mathematics</option>
                                       <option value='Computer Science' <?php if($row['topic']=="Computer Science"){ echo "selected"; }?>>Computer Science</option>
                                       </select> <br><br>
                        <textarea cols=30 rows=4 placeholder="Qualifications Separated with Commas" name="qualification" style="font-family: gothamb;font-size: 15px;outline:none;"><?php echo $row['qualification']?></textarea>
                        <?php
                        } else if($_SESSION['type']=="student"){
                            echo "Class :"
                        ?>
                        <select name="class">
                                       <option>--Select Class--</option>
                                       <option value="VIII" <?php if($row['class']=="VIII"){ echo "selected"; }?> >VIII</option> 
                                       <option value="IX" <?php if($row['class']=="IX"){ echo "selected"; }?>>IX</option>
                                       <option value="X" <?php if($row['class']=="X"){ echo "selected"; }?>>X</option>
                                       <option value='XI' <?php if($row['class']=="XI"){ echo "selected"; }?>>XI</option>
                                       <option value='XII' <?php if($row['class']=="XII"){ echo "selected"; }?>>XII</option>
                                       </select> 
                        <?php
                        }
                        ?>
                        <br><br>
                         <textarea cols=30 rows=10 placeholder="Bio" name="bio" style="font-family: gothamb;font-size: 15px;outline:none;"><?php echo $row['bio']?></textarea>
                        <br><br>
                         
                        
                         <br>
                        <a href="snalink/facebook.php"><img src="images/icons/facebook.png" class="logo"></a>&nbsp;&nbsp;<a href="snalink/twitter.php"><img src="images/icons/twitter.png" class="logo"></a>&nbsp;&nbsp;<a href="snalink/gplus.php"><img src="images/icons/google-plus.png" class="logo"></a>&nbsp;&nbsp;<a href="snalink/instagram.php"><img src="images/icons/instagram.png" class="logo"></a>&nbsp;&nbsp;<a href="snalink/linkedin.php"><img src="images/icons/linkedin.png" class="logo"></a>&nbsp;&nbsp;<a href="snalink/youtube.php"><img src="images/icons/youtube.png" class="logo"></a>
                        
                        
                        <br><br>
                        <input type="submit" style="font-family:gothamb" class="signup" name="update" value="Update">
                    </form>
                   
                </div><BR><BR><BR>
                

        </div></center>
    </body>
</html>

<?php
    }
}
?>     