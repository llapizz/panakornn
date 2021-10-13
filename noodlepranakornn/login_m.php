<?php 
session_start();
        if(isset($_POST['user_email'])){
                  include("connect.php");
                  $user_email = $_POST['user_email'];
                  $user_password = $_POST['user_password'];

                  $sql="SELECT * FROM user 
                  WHERE  user_email='".$user_email."' 
                  AND  user_password='".$user_password."' ";
                  $result = mysqli_query($conn,$sql);
        
                  if(mysqli_num_rows($result)==1){
                      $row = mysqli_fetch_array($result);

                      $_SESSION["user_email"] = $row["user_email"];
                      $_SESSION["type_id_user"] = $row["type_id_user"];

                      if($_SESSION["type_id_user"]=="1"){ 

                        Header("Location: backend/");

                      }
                      if ($_SESSION["type_id_user"]=="2"){ 
 
                        Header("Location: staff/");
 
                      }
                      if ($_SESSION["type_id_user"]=="3"){ 
 
                        Header("Location: member/");
 
                      }
 
                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
 
                  }
 
        }else{
 
 
             Header("Location: index.php"); //user & password incorrect back to login again
 
        }
?>