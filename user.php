<?php
if(isset($_GET['u'])!="" && isset($_GET['u'])!=null){
    $username = $_GET['u'];
    $con = mysqli_connect("localhost", "root", "", "reboot");
    $sql = "SELECT * FROM registertable WHERE username = '$username'";
    $row=mysqli_query($con,$sql);
    $result=mysqli_fetch_assoc($row);
    ?>
<html>
<head>
    <title><?php echo $result['fname']." ".$result['lname']." - Reboot";?></title>
    <style>
                @font-face{
    src : url('fonts/gotham/Gotham-Bold.otf');
    font-family: gothamb;
}
            @font-face{
    src : url('fonts/gotham/GothamBook.ttf');
    font-family: gotham;
}
            .card {
               width:450px;
                padding-top: 10px;
                padding-bottom: 35px;
                border-radius: 6px;
                box-shadow: 0 4px 30px 0 rgba(0,0,0,0.2);
                 border-bottom: 5px solid #00b359;
                 border-right: 5px solid #00b359;
            }

            .profilepic {
                width: 80px;
                height: 80px;
                border-radius: 70px;
            }

            .card2 {
                width: 300px;
                height: 39px;
                border-radius: 20px 20px 0px 0px;
                background-color: aqua;
                float: center;
            }
 

        </style>
       <style>
            <?php include "css/style.css"; ?>
        </style>
    </head>

    <body>
        <center><div class="row">
                                        <div class="topnav">
  <a href="index"><b style="color:grey;font-family:gotham">Daero</b> <b style="font-family:Josefin">Study Share</b></a>


</div>
            </div><br><br>
            <div class="card">
                
                <br> <br>
                <img class="profilepic" src="<?php echo $result['profilepic']; ?>"><br><br>
                <b><font style="padding-top: 10px;font-family:gothamb"  size=6 color=grey><?php echo $result['fname']."&nbsp;".$result['lname']; ?></font></b><br><br>
                
                 <font  size=4 face="gothamb"><?php
                        if($result['topic']){
                            echo "Teacher of ".$result['topic'];
                             echo "<br><br>";
                        }
                        ?>
                      <font  size=4 face="gotham"><?php
                        if($result['class']){
                            echo "Student of ".$result['class'];
                             echo "<br><br>";
                        }
                        ?>
                <font style="padding-top: 10px;" face="gotham" size=4 color=grey>Contact Number:&nbsp;
                    <?php $mo = $result['contact'] ;
                                           echo "<a style='text-decoration:none;color:crimson;' href='tel:$mo'>$mo</a>"; ?>
                </font><br><br>
                          <?php 
    if($result['qualification']!=""){
        ?> <font style="padding-top: 10px;" face="gotham" size=4 color=grey>Qualifications:&nbsp;
                <?php
        
    echo $result['qualification']; 
        echo "</font><br><br>";
    }?>
                <font style="padding-top: 10px;" face="gotham" size=4 color=grey>Email:&nbsp;
                    <?php
                                           $em = $result['email'] ;
                                           echo "<a style='text-decoration:none;color:crimson;' href='mailto:$em'>$em</a>";
                    ?>
                </font>
                <br><br>
           
                <br>


                <BR>
            </div>
            <br>
        </center>
        <br><br>
    </body>
</html>

<?php
} else {
    header("location:index");
}
?>