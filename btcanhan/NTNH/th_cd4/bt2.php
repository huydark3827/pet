<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>

fieldset {

  background-color: #eeeeee;
  max-width: 700px;

}



legend {

  background-color: gray;

  color: white;

  padding: 5px 10px;

}



input {

  margin: 5px;

}

</style>
</head>

<body>
  <?php
  function nam_nhuan($nam)
  {
    return ($nam % 400 == 0 || ($nam % 4 == 0 && $nam % 100 != 0));
  }
  if(isset($_POST['nam']))
  {
    $nam=$_POST['nam'];
    $kq = "";
    foreach (range(2000,$nam) as $year)
    {
      if(nam_nhuan($year))
      $kq = $kq. $year . " ";
    }
    if($kq!="")
      $kq =$kq . " là năm nhuận";
    else
    $kq = "Không có năm nhuận";
  }
  else{
    $nam = 2000;
    $kq = "";
  }
  ?>
</body>
<?php include ('./includes/header.html'); ?>
 <center>
 <form action="" method="POST">
    <fieldset>
      <legend>Tìm năm nhuận</legend>
      <label>Năm: </label>
      <input type="text" name="nam" value="<?php echo $nam; ?>">
      <br>
      <textarea name="kq" disabled cols="30" rows="10"><?php echo $kq?></textarea>
      <br>
      <input type="submit" value="Tìm năm nhuận" name="tinh">
    </fieldset>
  </form>
 </center>

 <?php include ('./includes/footer.html'); ?>
</html>