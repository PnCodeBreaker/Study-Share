<html>

<head>
    <style>
        .lnk {
            color: crimson;
            font-family: arial;
            font-size: 15px;
            border: 0.1px solid white;
            background: white;
            outline: none;
            cursor: pointer;
        }

        .lnk:hover {
            text-decoration: underline;

        }
         

        @font-face {
            src: url('fonts/comfortaa/Comfortaa-Bold.otf');
            font-family: comfortaa;
        }

        @font-face {
            src: url('fonts/gotham/Gotham-Bold.otf');
            font-family: gotham;
        }

        .img {
              
                width: 80px;
                height: 80px;
                border-radius: 100%;
            
        }

        .card {
            width: 700px;
            height: auto;
            border-radius: 2px 2px 2px 2px;
            padding-top: 60px;
            padding-bottom: 60px;
            padding-left: 30px;
            padding-right: 30px;
            border-radius: 5px;
            font-family: gothamb;
            box-shadow: 0 4px 58px 0 rgba(0, 0, 0, 0.2);
        }

        .logo {
            width: 40px;
            height: 40px;
        }

    </style>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>

</html>
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
    <?php        
if(isset($_POST['delete'])){   
    $sql2 = "SELECT * FROM registertable WHERE email = '$email'";
    $query2 = mysqli_query($con,$sql2);
    $row2 = mysqli_fetch_assoc($query2);
    $table = strtolower($row2['data']);
    $str = $row2['username'] ;
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    unlink($str."/css/style.css");
    $files = glob($str.'/*');
    foreach($files as $f) {
        if(is_file($f)){
            unlink($f);
        }
    }
    $dir = $str."/css";
    rmdir($dir);
    rmdir($str);
    $sql3 = "DROP TABLE $table ";
    mysqli_query($con,$sql3);
    $sql4  = "DELETE FROM registertable WHERE email = '$email'";
    if(mysqli_query($con,$sql4)){
setcookie("email", '', time() - (3600));
setcookie("password", '', time() - (3600));
 	?>
    <script>
        function redir() {
            window.location = "index";
        }
        setTimeout(redir(), 100);

    </script>
    <?php        
    }     
}
?>
    <style>
        <?php include "css/style.css";
        ?>

    </style>
    <center>
        <div class="row">
            <div class="topnav">
                <a href="index"><b style="color:grey;font-family:google">Daero</b> <b style="font-family:google">Study Share</b></a>
                

                        <a class=nav2 onclick="javascript:window.location='signout'" style="cursor:pointer;float:right;">Logout</a>
                        <a class=nav1 onclick="javascript:window.location='edit'" style="cursor:pointer;float:right;">Edit Profile</a>
                <?php
                        if($row['class']){
                            ?>
                    <html>

                    <head>
                        <link rel="stylesheet" type="text/css" href="css/style.css">

                    </head>

                    <body> <a class=nav3 onclick="javascript:window.location='search_teacher'" style="cursor:pointer;float:right;">Search Teachers</a>
                        
                        <a class=nav1 onclick="javascript:window.location='feeds'" style="cursor:pointer;float:right;">My Feeds</a>
                        <a class=nav3 onclick="javascript:window.location='followings'" style="cursor:pointer;float:right;">My Followings</a></body>

                    </html>
                    <?php
                        }
                        ?>

            </div>


        </div>
    </center>
    <BR>
    <div class="body">

        <center>
            <form method="post" enctype="multipart/form-data">
            </form>
            <center>
                <a href="profilepic" style="text-decoration:none;">
                    <?php
                    $imagesrc = $row['profilepic'];
                       if($imagesrc){
                          ?>
                        <img class="img" src="<?php echo $imagesrc ;?>">
                        <?php
                       } else {
                           $pic = $imgloc.'/av1.png';
                           $sql2 = "UPDATE registertable SET profilepic='$pic' WHERE email = '$email'";
                           mysqli_query($con,$sql2);
                           ?>
                            <img class="img" src="<?php echo $imgloc; ?>/av1.png">
                            <?php
                       }                                   
                ?>
                </a>
            </center>
            <br><br><br>
            <div class="card">

                <font size=5 face=comfortaa>
                    <?php echo strtoupper($row['fname']." ".$row['lname']) ?>
                </font>
                <br><br><br>
                <font size=4>Email:&nbsp;&nbsp;
                    <?php echo $row['email'] ?>
                </font>
                <br><br>
                <font size=4>Contact No.:&nbsp;&nbsp;
                    <?php echo $row['contact'] ?> </font>
                <br><br>
                <font size=4>
                    <?php
                        if($row['topic']){
                            echo "Teacher of ".$row['topic'];
                             echo "<br><br>";
                        }
                        ?>
                </font>
                <font size=4>
                    <?php
                        if($row['class']){
                            echo "Student of ".$row['class'];
                             echo "<br><br>";
                        }
                        ?>
                </font>
                <font size=4>
                    <?php
                        if($row['bio']){
                            echo "Bio : ".$row['bio'];
                             echo "<br><br>";
                        }
                        ?>
                </font>
                <font size=4>
                    <?php
                        if($row['qualification']){
                            echo "Qualifications : ".$row['qualification'];
                            echo "<br><br>";
                        } 
                        ?>
                </font>
                <br><br>
                <font size=4 face="comfortaa">CONNECT</font>
                <br>
                <br>
                <a href="<?php echo $row['fburl']; ?>">
                <img src="images/icons/facebook.png" class="logo"></a>&nbsp;&nbsp;
                <a href="<?php echo $row['twurl']; ?>">
                    <img src="images/icons/twitter.png" class="logo"></a>&nbsp;&nbsp;
                <a href="<?php echo $row['gpurl']; ?>">
                    <img src="images/icons/google-plus.png" class="logo"></a>&nbsp;&nbsp;
                <a href="<?php echo $row['insturl']; ?>">
                    <img src="images/icons/instagram.png" class="logo"></a>&nbsp;&nbsp;
                <a href="<?php echo $row['lnkdurl']; ?>">
                    <img src="images/icons/linkedin.png" class="logo"></a>&nbsp;&nbsp;
                <a href="<?php echo $row['yturl']; ?>">
                    <img src="images/icons/youtube.png" class="logo"></a>
            </div>
            <BR>
            <BR>
            <BR>
            <font size=6 face="comfortaa">RECENT POSTS</font>
            </b><br><br><br><br><br>
            <div id="container-floating">
                <div class="nd3 nds" data-toggle="tooltip" data-placement="left"><a href="filepost"><img class="reminder" src="images/pdf2.png" width=50px height=50px/></a></div>
                <div class="nd1 nds" data-toggle="tooltip" data-placement="left"><img class="reminder"><a href="postpic">
    <img src="images/photo2.png" width=50px height=50px></a>
                </div>

                <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create" onclick="newmail()">
                    <p class="plus">+</p>
                    <a href="index">
    <img class="edit" src="images/compose.png"></a>
                </div>

            </div>

            <?php
                    $table = strtolower($row['data']);
                    $sql5 = "SELECT COUNT(*) FROM $table ";
                    $r  = mysqli_query($con,$sql5);
                    $n  = mysqli_fetch_array($r);
        @$email = $_SESSION['email'];
        $sqlx = "select username from registertable where email = '$email'";
        $row2  = mysqli_query($con,$sqlx);
        $result2 = mysqli_fetch_assoc($row2);
        $sql = "SELECT id FROM $table";
$arr ;
    $query = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($query)){
      $arr[] = $row['id'];  
    }
@$arrlen = count($arr)-1;
@$arrid = $arr[$arrlen];
                    for($i=$arrid;$i>=1;$i--){
                        $sql3 = "SELECT * FROM $table where id = $i ";
                        $row = mysqli_query($con,$sql3);
                        $result = mysqli_fetch_assoc($row);
                        if($result['content']==""){
                            continue;
                        }
                      
                        if(isset($_POST['delete2'])){
                            $sql = "DELETE from $table where id=$i ";
                            mysqli_query($con,$sql);
                            header("location:/reboot_remastered/profile");
                        }

                       if($result['postpic']==null){
            ?>
                <div style="padding:20px;width:40%;font-family: arial;font-size: 20px; border: 1px solid gainsboro ; border-radius: 4px;">
                    <form method="post" action="">

                        <font style="font-family: arial;font-size: 15px;float:left;"><a style="text-decoration:none;" href="user.php?u=<?php echo $result2['username']; ?>">
                                  <b><font color=crimson><?php echo $_SESSION['name'];?></font></b></a> posted on
                            <?php echo $result['date'];?> </font>
                        <br>
                        <p align=left>
                            <?php echo $result['content']."<BR>"; ?>


                    </form>
                    <form method="post" action="deletepost.php">
                        <input type="submit" value="Delete" style="float:left;" class="lnk">
                        <input name="table" style="visibility:hidden;" value="<?php echo $table;?>">
                        <input name="id" style="visibility:hidden;" value="<?php echo $i;?>">

                    </form>
                    </p>
                </div>

                <br><br>
                <?php
            }
            elseif($result['postpic']==!null){
                
             ?>
                    <div style="padding:20px;width:40%;font-family: arial;font-size: 20px; border: 1px solid gainsboro ; border-radius: 4px;">
                        <form method="post" action="">

                            <font style="font-family: arial;font-size: 15px;float:left;"><a style="text-decoration:none;" href="user.php?u=<?php echo $result2['username']; ?>">
                                  <b><font color=crimson><?php echo $_SESSION['name'];?></font></b></a> posted on
                                <?php echo $result['date'];?> </font>
                            <br>
                            <p align=center>
                                <img src="<?php echo $result['postpic']; ?>" height="250px"><br><br>
                                <?php echo $result['content']."<BR>"; ?>


                        </form>
                        <form method="post" action="deletepost.php">
                            <input type="submit" value="Delete" style="float:left;" class="lnk" style="font-family:gothamb;">
                            <input name="table" style="visibility:hidden;" value="<?php echo $table;?>">
                            <input name="id" style="visibility:hidden;" value="<?php echo $i;?>">

                        </form>
                        </p>
                    </div>

                    <br><br>
                    <?php
                    } 
            ?>
                        <?php
                    }
        ?>

                            <br><br>
                            <!-- <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST">
                 <input type="submit"  class="login" name="delete" value="Delete Account">
            </form>-->
        </center>
    </div>
    <?php
    } else {
      header("location:login");
        die("");
    }
} else {
    echo "Can't Establish Connection";
}
?>
