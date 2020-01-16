<?php
if (!isset($_COOKIE["email"]) && !isset($_COOKIE["password"])){    
?>
    <html>

    <head>
        <style>
            @font-face {
                src: url('fonts/gotham/Gotham-Thin.otf');
                font-family: gotham;
            }

            @font-face {
                src: url('fonts/gotham/Gotham-Bold.otf');
                font-family: gothamb;
            }

            @font-face {
                src: url('fonts/comfortaa/Comfortaa-Bold.ttf');
                font-family: comfortaa;
            }

            #snackbar {
                visibility: hidden;
                min-width: 350px;
                margin-left: -120px;

                background-color: #333;

                color: #fff;

                text-align: center;
                font-family: monospace;

                border-radius: 10px;

                padding: 5px;

                position: fixed;

                z-index: 1;

                left: 65%;

                bottom: 30px;

            }



            #snackbar.show {
                visibility: visible;

                -webkit-animation: fadein 2s, fadeout 2s 10s;
                animation: fadein 2s, fadeout 2s 10s;
            }



            @-webkit-keyframes fadein {
                from {
                    bottom: 0;
                    opacity: 0;
                }
                to {
                    bottom: 30px;
                    opacity: 1;
                }
            }

            @keyframes fadein {
                from {
                    bottom: 0;
                    opacity: 0;
                }
                to {
                    bottom: 30px;
                    opacity: 1;
                }
            }

            @-webkit-keyframes fadeout {
                from {
                    bottom: 30px;
                    opacity: 1;
                }
                to {
                    bottom: 0;
                    opacity: 0;
                }
            }

            @keyframes fadeout {
                from {
                    bottom: 30px;
                    opacity: 1;
                }
                to {
                    bottom: 0;
                    opacity: 0;
                }
            }

        </style>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="UTF-8">
        <title>
            Study Share
        </title>
        <script>
            function myFunction() {

                var x = document.getElementById("snackbar");


                x.className = "show";


                setTimeout(function() {
                    x.className = x.className.replace("show", "");
                }, 12000);
            }

        </script>


    </head>

    <body onLoad="myFunction()">

        <div id="snackbar">All websites under <b>Daero LLP</b> uses cookies to run itself effortlessly on your computer.<br>if you agree you can continue using this website.</div>
        <center>
            <div class="row">
                <div class="col10">
                    <h1><a href="..\reboot_remastered" style="text-decoration: none; color:black; font-family:comfortaa;">Study Share</a></h1>
                </div>
            </div>
            <br>
            <p style="font-family: gotham;font-size: 60px;">
                The Best place for students and teachers
            </p>
            <br><br>
            <a class="btn2" style=" text-decoration: none;color: black;font-family: gothamb;font-size: 24px; " href="signup">Sign Up</a> &nbsp;&nbsp;&nbsp;<a class="btn2" style=" text-decoration: none;color: black;font-family: gothamb;font-size: 24px; " href="login">Login</a> &nbsp;&nbsp;&nbsp;<a class="btn2" style=" text-decoration: none;color: black;font-family: gothamb;font-size: 24px; " href="search">Search</a>
            <br><br><br><br><br><br>
            <a class="btn2" style=" text-decoration: none;color: black;font-family: gothamb;font-size: 24px; " href="listview">CHECK OUT TEACHERS FROM ALL AROUND THE WORLD</a>
        </center>

    </body>

    </html>
    <?php
} else {
    session_start();
    ?>
        <html>

        <head>
            
            <script>
function postpic() {
    window.location.assign("postpic")
}
</script>
            
            <style>
                @font-face {
                    src: url('fonts/gotham/GothamBook.ttf');
                    font-family: gotham;
                }

                .tucks {
                    background-color: #ffffff;
                    border: none;
                    color: white;

                    align-content: space-between;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    width: 100px;
                    height: 60px;
                    border-bottom-left-radius: 15px;
                    border-bottom-right-radius: 15px;
                    border : 1px solid gainsboro;
                    

                }

                .postbtn {
                    border: 1px solid gainsboro;
                    background: #ffffff;
                    padding-left: 25px;
                    padding-right: 25px;
                    padding-top: 10px;
                    padding-bottom: 10px;
                    border-radius: 4px;
                    width:300px;
                    height:50px;
                    cursor: pointer;
                    outline: none;
                    transition: all 0.3s ease;
                    text-decoration: none;
                    font-family: gothamb;
                    font-size: 18px;
                }
                .postbtn:hover{
                     border : 1px solid black;
                }
                .tucks:hover{
                    border : 1px solid #000000;
                }

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
                    src: url('fonts/gotham/Gotham-Bold.otf');
                    font-family: gothamb;
                }

                @font-face {
                    src: url('fonts/comfortaa/Comfortaa-Bold.otf');
                    font-family: comfortaa;
                }

                <?php $con=mysqli_connect("localhost",
                "root",
                "",
                "reboot");
                $user=$_COOKIE['email'];
                $sql2="SELECT * FROM registertable WHERE email = '$user'";
                $result=mysqli_query($con,
                $sql2);
                $row=mysqli_fetch_assoc($result);
                ?>

            </style>
            <link rel="stylesheet" type="text/css" href="css/style.css">
            <meta charset="UTF-8">
            <title>
                Reboot Remastered
            </title>
        </head>

        <body>

            <center>
                <div class="row">
                    <center>
                        <div class="col10">
                            <h1><a href="..\reboot_remastered" style="text-decoration: none;font-family:comfortaa; color:black">Study Share</a></h1>
                            <span class="h3"><a href="profile" style="color:black;text-decoration: none">Profile</a></center></span>
                            <form method="post" action=""><input style="float:right" class="btn4" type="submit" name="logout2" value="Sign Out"> </form>
                            <?php 
    if(isset($_POST['logout2']))
    {
        require 'signout.php'; 
    } 
                    ?>
                        </div>


                        <div><br><br><br>
                            <font face="comfortaa" size=6>Create a Post</font>
                            <br><br>
                            <p style="font-family: gothamb;font-size: 25px;">
                                <form id="myForm" action="userInfo" method="get">
                                    <textarea name="name" cols="40" rows="6"></textarea><br><br>
                                    <div class=postbtn id="sub" name="postSubmit">POST</div>
                                    <div class=tucks onclick="postpic()"><br><img src="images/photo.png" width=30px height=30px><br></div><div class=tucks><br><img src="images/pdf.png" width=30px height=30px><br></div><div class=tucks><br><img src="images/upload.png" width=30px height=30px><br></div><br><br><br><br>


                                </form>

                                <span id="result"></span>

                                <script src="js/jquery.min.js" type="text/javascript"></script>
                                <script src="js/script.js" type="text/javascript"></script>
                                <BR>

                                <?php
        $i=1;
        $j=0;
        $table  = strtolower($row['data']);
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
            $sql6 = "SELECT * from $table WHERE id= $i ";
            $row  = mysqli_query($con,$sql6);
            $result = mysqli_fetch_assoc($row);
            if($result['content']==""){
                            continue;
                        }
            if($result['postpic']==null){
            ?>
                                    <div style="padding:20px;width:40%;font-family: arial;font-size: 20px; border: 1px solid gainsboro ; border-radius: 4px;">
                                        <form method="post" action="">

                                            <font style="font-family: arial;font-size: 15px;float:left;"><a style="text-decoration:none;" href="user?u=<?php echo $result2['username']; ?>">
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

                                            <font style="font-family: arial;font-size: 15px;float:left;"><a style="text-decoration:none;" href="user?u=<?php echo $result2['username']; ?>">
                                  <b><font color=crimson><?php echo $_SESSION['name'];?></font></b></a> posted on
                                                <?php echo $result['date'];?> </font>
                                            <br>
                                            <p align=center>
                                                <img src="<?php echo $result['postpic']; ?>" width="450px" ><br><br>
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
            ?>
                            
            
                                    <?php
                        
                        
        }
    
       
           
        
        ?>

                            </p>
                            <br><br>


                    </center>
        </body>

        </html>
        <?php
}
?>
           