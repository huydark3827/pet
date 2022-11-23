<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <style>


    </style>
</head>
<body>
   

<?php
$page_title = 'Login';
include ('includes/header.html');
$conn = mysqli_connect ('localhost','root','','qlbanthucung') OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
mysqli_set_charset($conn, 'UTF8');

session_start();

if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $mk = $_POST['mk'];

   $sql = " SELECT TenKH, SDT, Email, Password FROM khach_hang WHERE Email = '$email' && Password = '$mk' ";

   $result = mysqli_query($conn, $sql);

   if(mysqli_num_rows($result) <> 0){
      $rows=mysqli_fetch_row($result);
         $_SESSION['dangnhap'] = $rows;
          
         header('location:index.php');
      
   }else{
      $error[] = 'Email hoặc mật khẩu không đúng!';
      
   }

};
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đăng nhập tài khoản</title>

   <link rel="stylesheet" href="./includes/style2.css">

</head>
<body>
   
<div class="form-container">

   <center>
   <form action="" method="post">
      <h3>Đăng nhập</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="email" required placeholder="Nhập tên đăng nhập" background-color=white;>
      <input type="password" name="mk" required placeholder="Nhập mật khẩu">
      <input type="submit" name="submit" value="Đăng nhập" class='w3-button w3-green w3-round-large'>
      <br><br>
      <p>Bạn chưa có tài khoản? <a href="dangky.php" class='w3-button w3-blue w3-round-large'>Đăng ký ngay</a></p>
      <br>
   </form>
   </center>
   

</div>

</body>
</html>

<?php include ('includes/footer.html'); ?>
</body>
</html>