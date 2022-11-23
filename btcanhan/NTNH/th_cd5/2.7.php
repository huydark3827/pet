

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style type="text/css">
table{
    border-collapse: collapse;
  
    height: auto;

    color: #ffff00;

    background-color: whitesmoke;     
    text-align: center;
    border: black 3px;
    margin: auto;
  width: 70%;
  border: 3px solid green;
  padding: 10px;

}

table th{

    background-color: blue;

    font-style: vni-times;

    color: yellow;
    text-align: center;
    height: 40px;



}

table td
{
  border: 1px solid black;
    color: black;
    text-align: center;
    height: 50px;
    
    
}

tr:nth-child(odd) 
{
    background-color: lightblue;
}
</style>
</head>
<body>
<?php include ('./includes/header.html'); ?>
<?php

$conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
mysqli_set_charset($conn, 'UTF8');


$sql ="SELECT Ten_sua,Ten_hang_sua,Ten_loai,Trong_luong,Don_gia,Hinh,Ma_sua
FROM sua s INNER JOIN loai_sua ls ON s.Ma_loai_sua = ls.Ma_loai_sua
				 INNER JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua


";
$result = mysqli_query($conn, $sql);

$n=0;
  echo  "<table align=center>";
  echo  "<tr>";
        echo "<th colspan='10'>Thong tin sua</th>";
    echo "</tr>";
  while($rows=mysqli_fetch_row($result))
{
    
     echo $n%5==0 ? "<tr>" : "";
        echo "<td align=center>";
          echo "<a href='2.7_ct.php?id=$rows[6]'>$rows[0]</a>
            <br>
            $rows[3] - $rows[4] VND
            <br>
            <img src='Hinh_sua/$rows[5]' height =100 width=100</img>
                ";

      echo  "</td>";


     
                    $n++;
    echo $n%5==0? "</tr>" :"";
}
  echo "</table>";
?>


<?php include ('./includes/footer.html'); ?>



</body>
</html>