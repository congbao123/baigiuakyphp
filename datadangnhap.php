<?php 
 session_start();
 error_reporting(E_ALL ^ E_DEPRECATED);
 require_once 'database.php';
 
 if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT *FROM users WHERE username = '$username' AND password =('$password')";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($res);
    if($row > 0) 
    {
        $_SESSION['usernameadmin'] = $username;
        while($row = mysqli_fetch_assoc($res)) {
            $_SESSION['id-Admin'] = $row['id'];
        }
        echo "<script>alert('Đăng nhập thành công');</script>";
    }
    else 
    {
        $_SESSION['error'] ='Ten dang nhap hoac mat khau sai!';
        echo "<script>alert('Tên đăng nhập hoặc mật khẩu sai');</script>";
        die("");
        exit();
    }
 }
?>

