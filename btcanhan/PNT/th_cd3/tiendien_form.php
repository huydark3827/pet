

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Tính tiền điện</title>

    <style type="text/css">

        body {  

            /*background-color: #d24dff;*/

        }

        table{

            background: #ffd94d;

            border: 0 solid yellow;

        }

        thead{

            background: #fff14d;    

        }

        td {

            color: blue;

        }

        h3{

            font-family: verdana;

            text-align: center;

            /* text-anchor: middle; */

            color: #ff8100;

            font-size: medium;

        }

        
    </style>





<body>

<center>
<?php include ('./includes/header.html'); ?>

<?php 
if(isset($_POST['cscu']))  

    $cscu=trim($_POST['cscu']); 

else $cscu=0;

if(isset($_POST['csmoi'])) 
  
    $csmoi=trim($_POST['csmoi']); 

else $csmoi=0;






if(isset($_POST['dongia'])) 
  
    $dongia=trim($_POST['dongia']); 



else $dongia=2000;



if(isset($_POST['tinh'])){

    if($_POST['chuho'] == "  " ) 

    {
        echo "Nhập tên chủ hộ";
        $thanhtoan="";
    }
    
        
     else 
        {
            if (is_numeric($cscu) && is_numeric($csmoi) && is_numeric($dongia))  

                if($cscu > $csmoi) {
                echo "Chỉ số mới phải lớn hơn chỉ số cũ!";

                    $thanhtoan = "";
                    
            }else {
            $thanhtoan=($csmoi - $cscu)*$dongia;
        }
                    



        else {
                echo "<font color='red'>Vui lòng nhập vào số! </font>"; 

                $thanhtoan="";
            }
        }

        
    
}  
else $thanhtoan=0;

?>







<form action="" method="post">

<table>

    <thead>

        <th colspan="2" align="center"><h3>THANH TOÁN TIỀN ĐIỆN</h3></th>

    </thead>

    <tr><td>Tên chủ hộ:</td>

     <td><input type="text" name="chuho" value="<?php if(isset($_POST['chuho'])) echo trim($_POST['chuho']); else echo "" ?>  "/></td>

    </tr>

    <tr><td>Chỉ số cũ:</td>

     <td><input type="text" name="cscu" value="<?php  echo $cscu;?> "/></td>

    </tr>
    <tr><td>Chỉ số mới:</td>

     <td><input type="text" name="csmoi" value="<?php  echo $csmoi;?> "/></td>

    </tr>
    <tr><td>Đơn giá:</td>

     <td><input type="text" name="dongia" value="<?php  echo $dongia;?> "/></td>

    </tr>

    <tr><td>Số tiền thanh toán:</td>



     <td><input type="text" name="thanhtoan" disabled="disabled" value="<?php  echo $thanhtoan;?> "/></td>



    </tr>



    <tr>



     <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>



    </tr>



</table>



</form></center>



</body>



<?php include ('./includes/footer.html'); ?>