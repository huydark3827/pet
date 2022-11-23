

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$comment ="";
echo $comment;




        if(isset($_POST['in']))       
        {
            $dong = $_POST['dong'];
            $cot = $_POST['cot'];
            $matran = array();
                for($i=0; $i<$dong ; $i++)
                    {
                        for($j=0; $j<$cot ; $j++)
            
                            $matran[$i][$j] = rand(-1000,1000);
                    }
            
            
                for($i=0; $i<$dong ; $i++)
                {
                    for($j=0; $j<$cot ; $j++)
        
                        $comment .= $matran[$i][$j] . " ";
                        $comment .= "\n";
                }
                
            
           
        }


?>

<?php include ('./includes/header.html'); ?>
<center>
<form action="" name="myform" method="post">
<table>
        <tr><td>So dong:</td>

<td><input type="text" name="dong" value="<?php  if(isset($_POST['dong']))  echo $dong;?> "/></td>

</tr>

<tr><td>So cot:</td>

<td><input type="text" name="cot" value="<?php if(isset($_POST['cot']))  echo $cot;?> "/></td>

</tr>
</table>

<input type="submit" value="IN KET QUA" name="in" >
<br>
<textarea name="comment" rows="10" cols="40" ><?php echo $comment; ?></textarea>
</form>
</center>
<?php include ('./includes/footer.html'); ?>
</body>
</html>