


    <title>Phép tính</title>
    <?php include ('./includes/header.html'); ?>
    <body>

<center>

<form action="xuli24.php" method="GET">
        <fieldset>
            <legend>Enter your information</legend>
            <form align='center' action="" method="post">

            <table>

                <tr><td>Họ tên:</td>

                 <td><input type="text" name="hoten"/></td>

                </tr>

                <tr><td>Địa chỉ:</td>

                 <td><input type="text" name="diachi" /></td>

                </tr>
                <tr><td>Số điện thoại</td>

                 <td><input type="text" name="sdt" /></td>

                </tr>

                <tr> 
                    <td>Giới tính</td>
                    <td>
                        <input type="radio" name="gt" value="Nam"<?php if(isset($_POST['radGT'])&&$_POST['radGT']=='Nam') echo 'checked="checked"';?> checked/>      Nam
                <input type="radio" name="gt" value="Nu" <?php if(isset($_POST['radGT'])&&$_POST['radGT']=='Nu') echo 'checked="checked"';?>/>
                    N&#7919;<br>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <select name="quoctich">

                            <option value="vietnam" >

                                Việt Nam

                            </option>

                            <option value="mi" >

                                Mĩ

                            </option>

                            <option value="sing" >

                                Singapore

                            </option>

                    </select>
                    </td>
                </tr>

                <TR>
                    <td>
                        Các môn đã học:</td>
            <td>
                        <input type="checkbox" name="php" value="PHP&MySQL" />PHP & MySQL <br> 
                        <input type="checkbox" name="c" value="C#"/>C#<br>
                        <input type="checkbox" name="xml" value="XML"/>XML<br>
                        <input type="checkbox" name="python" value="Python"/>Python<br>
                    </td>

                </TR>

                <tr>
                    <td>Ghi chú: 

                    </td>
                    <td><textarea cols="70"  rows="5" name="ghichu"></textarea></td>
                </tr>

                <tr>



                 <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>



                </tr>



            </table>

        </fieldset>
    </form> </center>


</body>
<?php include ('./includes/footer.html'); ?>
