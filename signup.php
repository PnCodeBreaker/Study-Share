<?php
if (!isset($_COOKIE["email"]) && !isset($_COOKIE["password"])){
?>

<html>

    <head>
        <script>
        history.pushState(null, null, '<?php echo $_SERVER["REQUEST_URI"]; ?>');
window.addEventListener('popstate', function(event) {
    window.location.assign("index");
});
        </script>
        <style>
            
            .group {
                width:500px;
                padding-top: 10px;
                padding-bottom: 35px;
                border-radius: 6px;
                box-shadow: 0 4px 30px 0 rgba(0,0,0,0.2);
                 border-bottom: 5px solid crimson;
                 border-right: 5px solid crimson;
            }
            .cont {
                float:left;
                padding-left:20px;
                padding-top: 4px;
                font-family:gothamb;
                font-size:25px;
                color:crimson;
            }
            .btn2{
    border : 1px solid gainsboro;
    background: #ffffff;
    padding-left:25px;
    padding-right:25px;
    padding-top:10px;
    padding-bottom:10px;
    border-radius: 4px;
    cursor: pointer;
    outline: none;
    transition: all 0.3s ease;
    text-decoration: none;
    font-family: gothamb;   
    font-size: 18px;
}
.btn2:hover{
    box-shadow: 0 4px 30px 0 rgba(0,0,0,0.2);

}
            input[type=radio]{
                
            }
       
           @font-face{
    src : url('fonts/gotham/Gotham-Bold.otf');
    font-family: gothamb;
}
            @font-face{
    src : url('fonts/gotham/GothamMedium.ttf');
    font-family: gotham;
}
            @media screen and (max-width:640px) {
               .group {
                width:80%;
                padding-top: 10px;
                padding-bottom: 35px;
                border-radius: 6px;
                box-shadow: 0 4px 30px 0 rgba(0,0,0,0.2);
                 border-bottom: 5px solid crimson;
                 border-right: 5px solid crimson;
            }
            .cont {
                float:left;
                padding-left:20px;
                padding-top: 4px;
                font-family:gothamb;
                font-size:25px;
                color:crimson;
            } 
                input[type=email],input[type=password],input[type=text],select,option{
    text-align: center;
    width: 50%;
    font-family:gotham;
    font-size: 13px;
    outline: none;
    padding-left:10px;
    padding-right:10px;
    padding-top:5px;
    padding-bottom:5px;
    border-radius: 4px;
    border : 1px solid gainsboro;
    transition: all 0.4s ease;
    
}
input[type=email]:focus,input[type=password]:focus,input[type=text]:focus,select:focus,option:focus{
    border : 1px solid black;
}
                
                
            }
        </style><link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta charset="UTF-8">
        
        <title>Reboot Remastered</title>
       <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div class="topnav">
    <a href="index" style="padding-right:0;"><i class="material-icons" style="font-size:24px;">arrow_back</i></a><a><b style="color:grey;font-family:gotham">Daero</b> <b style="font-family:Josefin">Study Share</b></a>
        </div>
        <BR><BR>
        <?php
@$type = $_POST['type'];
if($type=="teacher") {
@$password = str_replace(" ",'', $_POST['password']);
@$hash = md5($password);
@$email = str_replace(" ",'', $_POST['email']);
@$fname = str_replace(" ",'', $_POST['fname']);
@$lname = str_replace(" ",'', $_POST['lname']);
@$contact = str_replace(" ",'', $_POST['contact']);
@$topic = $_POST['topic'];
$con = mysqli_connect("localhost", "root", "", "reboot");
 if(isset($_POST['signup'])){
       if(isset($email) && isset($password)){
            if(!empty(trim($email)) && !empty(trim($password)) && !empty(trim($fname)) && !empty(trim($lname)) && !empty(trim($contact)) && $topic!="--Select Stream--"){
                if(is_numeric($contact)){
                if($con){
                    $sql = "SELECT * FROM registertable WHERE email = '$email'";
                    $query = mysqli_query($con, $sql);
                    if(mysqli_num_rows($query)==0){
                        session_start();
                        $_SESSION['email']=$email;
                        $_SESSION['password']=$hash;
                        $_SESSION['fname']=$fname;
                        $_SESSION['lname']=$lname;
                        $_SESSION['contact']=$contact;       
                        $_SESSION['topic']=$topic;
                        $_SESSION['type'] = $_POST['type'];
                        header("location:data.php");
                    } else {
                        echo " <script> alert('Email Exists'); </script>";
                    }
                } else {
                     echo "Error Establishing Connection ";
                }
            } else {
                echo "Enter a valid Contact Number";
            }

            } else {
               
                 echo "<center>Make sure all the fields are not empty";
           
            }
       } else {
             echo "Make sure the fields are set";
       }
 } 
 
} else {
    @$password = str_replace(" ",'', $_POST['password']);
@$hash = md5($password);
@$email = str_replace(" ",'', $_POST['email']);
@$fname = str_replace(" ",'', $_POST['fname']);
@$lname = str_replace(" ",'', $_POST['lname']);
@$contact = str_replace(" ",'', $_POST['contact']);
@$class = $_POST['class'];
$con = mysqli_connect("localhost", "root", "", "reboot");
 if(isset($_POST['signup'])){
       if(isset($email) && isset($password)){
            if(!empty(trim($email)) && !empty(trim($password)) && !empty(trim($fname)) && !empty(trim($lname)) && !empty(trim($contact)) && $class!="--Select Class--"){
                if(is_numeric($contact)){
                if($con){
                    $sql = "SELECT * FROM registertable WHERE email = '$email'";
                    $query = mysqli_query($con, $sql);
                    if(mysqli_num_rows($query)==0){
                        session_start();
                        $_SESSION['email']=$email;
                        $_SESSION['password']=$hash;
                        $_SESSION['fname']=$fname;
                        $_SESSION['lname']=$lname;
                        $_SESSION['contact']=$contact;       
                        $_SESSION['class']=$class;      
                        $_SESSION['type'] = $_POST['type'];
                        header("location:data.php");
                    } else {
                        echo " <script> alert('Email Exists'); </script>";
                    }
                } else {
                     echo "Error Establishing Connection ";
                }
            } else {
                echo "Enter a valid Contact Number";
            }

            } else {
               
                 echo "<script>alert('Make Sure nothing is empty');</script>";
           
            }
       } else {
             echo "Make sure the fields are set";
       }
 } 
 echo "</center>" ;
}
?>
<?php
} else {
header("location:profile");
}
?>

   <style>
            <?php include "css/style.css"; ?>
        </style>     
        
        
        <center>

            
            <BR>
    
            <div class="body">
                <div class="group">
<span class="cont">Sign Up</span>
<br><BR>
  <form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
               <br><br> <center>  
                <input placeholder="First Name" type="text" name='fname' value = "<?php echo @$_POST['fname']; ?>"><br><br>
                <input placeholder="Last Name" type="text" name='lname' value = "<?php echo @$_POST['lname']; ?>"><br><br>
                    <input placeholder="Email" type="email" name='email' value = "<?php echo @$_POST['email']; ?>"><br><br>
                    <input placeholder="Contact" type="text" name='contact' value = "<?php echo @$_POST['contact']; ?>"><br><br>
                <input placeholder="Password" type="password" name='password'><br><br>
      <input type="radio" name="type" value="teacher" id="teacher" onclick="display1()" style="font-family:gothamb" autocomplete="off"><font style="font-family:gothamb;font-size:15px;">Teacher</font>&nbsp;&nbsp; <input style="font-family:gothamb" type="radio" name="type" value="student" id="student" onclick="display2()" autocomplete="off"><font style="font-family:gothamb;font-size:15px;">Student</font><br><br>
           <select name="topic" id="topic" name="topic" style="display:none;">
                                       <option>--Select Stream--</option>
                                       <option value="Physics">Physics</option>
                                       <option value="Chemistry">Chemistry</option>
                                       <option value="Mathematics">Mathematics</option>
                                       <option value='Computer Science'>Computer Science</option>
                                       </select>
      <select id="class" name="class" style="display:none;">
                                       <option>--Select Class--</option>
                                       <option value="VIII">VIII</option>
                                       <option value="IX">IX</option>
                                       <option value="X">X</option>
                                       <option value='XI'>XI</option>
                                       <option value='XII'>XII</option>
                                       </select>
           <br><br>
                    <button name="signup"  class="login">Sign Up</button>
                    </center>
                    <br>
                    </form>
</div>



</div>

<script>

function display2(){
    document.getElementById('class').style.display = "block";
    document.getElementById('topic').style.display = "none";    
}
    function display1(){
    document.getElementById('class').style.display = "none";
    document.getElementById('topic').style.display = "block";    
}
</script>
                
            </div>
        </center>
    </body>
</html>          
<font style="font-size: 20px;font-family: Consolas;">
