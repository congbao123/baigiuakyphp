<?php 
     require_once 'database.php';
     error_reporting(2);
     if(isset($_POST['submit']))
     {
      if(isset($_POST['fullname'])){
        $fullname=$_POST['fullname'];
      }
      if(isset($_POST['username'])){
        $username=$_POST['username'];
      }
      if(isset($_POST['password'])){
        $password=$_POST['password'];
      }
      if(isset($_POST['email'])){
        $email=$_POST['email'];
      }
      if(isset($_POST['address'])){
        $address=$_POST['address'];
      }
      if(isset($_POST['phone'])){
        $phone=$_POST['phone'];
      }
      $sql = "INSERT INTO users (fullname,username,password,email,phone,address,role)
       VALUES ('$fullname','$username','md5($password)','$email','$phone','$address',1)";
        $res = mysqli_query($conn,$sql);
           if($res){
            echo "<script>alert('Đăng ký thành công');</script>";
            exit();
           }
           else{    
            echo "<script>alert('lỗi ko thể đăng ký');</script>";
            exit();
           }
     }
?>
