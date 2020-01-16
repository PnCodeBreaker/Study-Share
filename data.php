<?php
session_start();
?>

<?php
$type = $_SESSION['type'];
if($type=="teacher"){
@$password = $_SESSION['password'];
@$email = $_SESSION['email'];
@$fname = $_SESSION['fname'];
@$lname = $_SESSION['lname'];
@$contact = $_SESSION['contact'];
@$topic = $_SESSION['topic'];
$name = $fname." ".$lname ;
$con = mysqli_connect("localhost", "root", "", "reboot");          
                if($con){
                    $sql = "INSERT INTO registertable (email,password,fname,lname,name,contact,topic,type) VALUES ('$email','$password','$fname','$lname','$name','$contact','$topic','$type')";
                    $query = mysqli_query($con, $sql);
                    if($query){
                        $str = strtolower($fname.$lname) ;
                        if(file_exists($str)){
                            for($i=1;$i<=10000;$i++){
                                if(file_exists($str.$i)){
                                    continue;
                                } else {
                                    
                                     $str = strtolower($str.$i);
                                    mkdir($str);
                                    break;
                                }
                            }
                        } else {
                            $str = strtolower($str);
                            mkdir($str);
                        }
                        copy("profile.php",$str."/index");
                        mkdir($str."/css");
                        copy("css/style.css",$str."/css/style.css");
                        copy("profilepics/av1.png",$str."/av1.png");
                        $sql2 = "SELECT * FROM registertable WHERE email = '$email' AND password = '$password' ";
                        $data = strtolower($_SESSION['fname'].date("YsHm")."post");
                        $sql3 = "CREATE TABLE $data (id int(20) AUTO_INCREMENT , content LONGTEXT ,date varchar(100),postpic varchar(200),filepost varchar(200),likes varchar(10), size varchar(200),postid varchar(20),PRIMARY KEY (id) )";
                        mysqli_query($con,$sql3);
                        $sql4 = "UPDATE registertable SET data ='$data' , username='$str' WHERE email ='$email'";
                        mysqli_query($con,$sql4);
                        $query = mysqli_query($con,$sql2);
                        $row = mysqli_fetch_assoc($query);
                        if($row['email']==$email && $row['password']==$password){
                           
                            $_SESSION['email']=$email;
                            $_SESSION['fname']=$row['fname'];
                            $_SESSION['name']=$row['name'];
                            $_SESSION['lname']=$row['lname'];
                            $_SESSION['contact']=$row['contact'];
                            $_SESSION['topic']=$row['topic'];
                            $_SESSION['password']=$row['password'];
                            setcookie("email",$email);
                            setcookie("password",$password);
                            header("location:profile");
                        } else {
                             echo "Wrong Email or Password. ";
                        }
                        
                    } else {
                        echo "Email Exists";
                    }
                } else {
                     echo "Error Establishing Connection ";
                }
} else if ($type=="student"){
    $type="student";
    @$password = $_SESSION['password'];
@$email = $_SESSION['email'];
@$fname = $_SESSION['fname'];
@$lname = $_SESSION['lname'];
@$contact = $_SESSION['contact'];
@$class = $_SESSION['class'];
$name = $fname." ".$lname ;
$con = mysqli_connect("localhost", "root", "", "reboot");          
                if($con){
                    $sql = "INSERT INTO registertable (email,password,fname,lname,name,contact,class,type) VALUES ('$email','$password','$fname','$lname','$name','$contact','$class','$type')";
                    $query = mysqli_query($con, $sql);
                    if($query){
                        $str = strtolower($fname.$lname) ;
                        if(file_exists($str)){
                            for($i=1;$i<=10000;$i++){
                                if(file_exists($str.$i)){
                                    continue;
                                } else {
                                    
                                     $str = strtolower($str.$i);
                                    mkdir($str);
                                    break;
                                }
                            }
                        } else {
                            $str = strtolower($str);
                            mkdir($str);
                        }
                        copy("profile",$str."/index");
                        mkdir($str."/css");
                        copy("css/style.css",$str."/css/style.css");
                        copy("profilepics/av1.png",$str."/av1.png");
                        $sql2 = "SELECT * FROM registertable WHERE email = '$email' AND password = '$password' ";
                        $data = strtolower($_SESSION['fname'].date("YsHm")."post");
                        $ftable = strtolower($_SESSION['fname'].date("YsHm")."follow");
                        $sql3 = "CREATE TABLE $data (id int(20) AUTO_INCREMENT , content LONGTEXT ,date varchar(100),postpic varchar(200),filepost varchar(200),size varchar(200),likes varchar(10),postid varchar(20),PRIMARY KEY (id) )";
                        mysqli_query($con,$sql3);
                        $sql4 = "CREATE TABLE $ftable (id int(20) AUTO_INCREMENT , teachertable varchar(200), PRIMARY KEY (id) )";
                        mysqli_query($con,$sql4);
                        $sql5 = "UPDATE registertable SET data ='$data' , username='$str' , followtable='$ftable' WHERE email ='$email'";
                        mysqli_query($con,$sql5);
                        $query = mysqli_query($con,$sql2);
                        $row = mysqli_fetch_assoc($query);
                        if($row['email']==$email && $row['password']==$password){
                           
                            $_SESSION['email']=$email;
                            $_SESSION['fname']=$row['fname'];
                            $_SESSION['name']=$row['name'];
                            $_SESSION['lname']=$row['lname'];
                            $_SESSION['contact']=$row['contact'];
                            $_SESSION['class']=$row['class'];
                            $_SESSION['password']=$row['password'];
                            setcookie("email",$email);
                            setcookie("password",$password);
                            header("location:profile");
                        } else {
                             echo "Wrong Email or Password. ";
                        }
                        
                    } else {
                        echo "Email Exists dd";
                    }
                } else {
                     echo "Error Establishing Connection ";
                }
}
?>