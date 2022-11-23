
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   


<?php # Script 3.4 - index.php
$page_title = 'Welcome to this Site!';
include ('includes/header.html');
?>
<?php

session_start();
// 1. Ket noi CSDL



 if(isset($_SESSION['dangnhap'])) 
    $tennd = $_SESSION['dangnhap'];
else
    $tennd = "Bạn chưa đăng nhập";


   echo "<br>";
   if(!isset($_SESSION['dangnhap']))
      echo "<center><font size='5' color='blue'> $tennd</font></center>";
   else
   echo "
 <table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse; margin: 0 auto;'>


 <tr >
    <th colspan=2 ><center><font size='5' color='blue'> THÔNG TIN TÀI KHOẢN</font></center></th>
 </tr>

 <tr>
   <td>Tên tài khoản:</td>
   <td> $tennd[0]</td>
 </tr>

 <tr>
   <td>SDT:</td>
   <td>$tennd[1]</td>
 </tr>

 <tr>
   <td>Email:</td>
   <td>$tennd[2]</td>
 </tr>

</table>";
?>

</body>
</html>

<?php
include ('includes/footer.html');
?>