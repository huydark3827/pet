<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php include ('./includes/header.html'); ?>
  <?php
  $fp = @fopen("Bai4.txt", "w+");
  if (!$fp) {
    echo 'Mở file không thành công';
  } else {
    function tongdayso($arr)
    {
      $S = 0;
      $n = count($arr);
      for ($i = 0; $i < $n; $i++) {
        $S = $S + $arr[$i];
      }
      return $S;
    }
    $str = "";
    $tong = "";
    if (isset($_POST['tinh'])) {
      $str = $_POST['mang'];
      fwrite($fp,$str);
      
      $arr = explode(",", $str);
      $tong = tongdayso($arr);
      
      fwrite($fp,$tong);
    }
  }
  fclose($fp);
  ?>
 <center>
 <form action="" method="post">
    <table>
      <thead>
        <th colspan="2" align="center">
          <h3>Nhập và tính trên dãy số</h3>
        </th>
      </thead>
      <tr>
        <td>Nhập dãy số:</td>
        <td>
          <input type="text" name="mang" value="<?php echo $str; ?>"> (*)
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="submit" value="Tổng dãy số" name="tinh">
        </td>
      </tr>
      <tr>
        <td>Tổng dãy số:</td>
        <td>
          <input type="text" style="background: lightgreen;" disabled name="ketqua" value="<?php echo $tong; ?>">
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center"><label>(Các số được nhập cách nhau bằng dấu ",")</label></td>
      </tr>
    </table>
  </form>
 </center>
 <?php include ('./includes/footer.html'); ?>
</body>

</html>