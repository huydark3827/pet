

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Mang tim kiem</title>

<style type="text/css">

table{

color: #ffff00;

background-color: gray;		
max-width: 800px;

}

tr,td{
		text-align:center;
		
	}








</style>

</head>

<body>

<?php

    class PhanSo{
        private $tuSo;
        private $mauSo;

        function __construct($ts, $ms = 1)
        {
            if($ms < 0){
                $ts *= -1;
                $ms *= -1;
            }

            $this->tuSo = $ts;
            $this->mauSo = $ms;
        }

        public function gettuSo(){
			return $this->tuSo;
		}
        public function getmauSo(){
			return $this->mauSo;
		}

        function UCLN($a,$b){
            if ($a%$b!=0)
                return $this->UCLN($b,$a%$b);
            else
                return $b;
        }

        function RutGon(){
            $a = $this->tuSo;
            $b = $this->mauSo;
            $c = $this->UCLN($a,$b);
            if($c <0){
                $this->tuSo /= $c *-1;
                $this->mauSo /= $c *-1;
            }else{
                $this->tuSo /= $c;
                $this->mauSo /= $c;
            }
            
        }

        function add($a){
            $this->tuSo = $this->tuSo*$a->mauSo + $this->mauSo*$a->tuSo;
            $this->mauSo *= $a->mauSo;
            
        }
        function minus($a){
            $this->tuSo = $this->tuSo*$a->mauSo - $this->mauSo*$a->tuSo;
            $this->mauSo *= $a->mauSo;
            
        }
        function multy($a){
            $this->tuSo = $this->tuSo*$a->tuSo;
            $this->mauSo *= $a->mauSo;
            
        }
        function dev($a){
            $this->tuSo = $this->tuSo*$a->mauSo;
            $this->mauSo *= $a->tuSo;
            
        }

        function __toString()
        {
            return $this->tuSo . "/" .$this->mauSo;
        }
    }


    
    $tu1 = NULL;
    $tu2 = NULL;
    $mau1 = NULL;
    $mau2 = NULL;
    $ketqua = NULL;
    
    if(isset($_POST['tinh'])){

        $tu1 = $_POST['tuso1'];
        $tu2 = $_POST['tuso2'];
        $mau1 = $_POST['mauso1'];
        $mau2 = $_POST['mauso2'];

        $ps1 = new PhanSo($tu1,$mau1);
        $ps2 = new PhanSo($tu2,$mau2);

        if(isset($_POST['toantu']) && $_POST['toantu'] == '+'){
            
            $ps3 = new PhanSo($ps1->gettuSo(), $ps1->getmauSo());
            $ps3->add($ps2);
            $ps3->RutGon();
            
            

            $ketqua = $ps1->__toString() . $_POST['toantu'] . $ps2->__toString() . " = " . $ps3->__toString();

        }

        if(isset($_POST['toantu']) && $_POST['toantu'] == '-'){
            
            $ps3 = new PhanSo($ps1->gettuSo(), $ps1->getmauSo());
            $ps3->minus($ps2);
            $ps3->RutGon();
            
            

            $ketqua = $ps1->__toString() . $_POST['toantu'] . $ps2->__toString() . " = " . $ps3->__toString();

        }

        if(isset($_POST['toantu']) && $_POST['toantu'] == '*'){
            
            $ps3 = new PhanSo($ps1->gettuSo(), $ps1->getmauSo());
            $ps3->multy($ps2);
            $ps3->RutGon();
            
            

            $ketqua = $ps1->__toString() . $_POST['toantu'] . $ps2->__toString() . " = " . $ps3->__toString();

        }

        if(isset($_POST['toantu']) && $_POST['toantu'] == '/'){
            
            $ps3 = new PhanSo($ps1->gettuSo(), $ps1->getmauSo());
            $ps3->dev($ps2);
            $ps3->RutGon();
            
            

            $ketqua = $ps1->__toString() . $_POST['toantu'] . $ps2->__toString() . " = " . $ps3->__toString();

        }
    }

?>

<?php include ('./includes/header.html'); ?>

<center>
<form action="" method="post">

<table border="1" cellpadding="10">

	<th colspan="5"><h2>Ch???n c??c ph??p t??nh tr??n ph??n s???</h2></th>

	<tr>

		<td >Nh???p ph??n s??? th??? 1:</td>
        <td> T??? s??? 1:</td>
		<td ><input type='text' name='tuso1' size= '10' value='<?php if(isset($_POST['tuso1'])) echo $_POST['tuso1']; ?> '/></td>
        <td >M???u s??? 1:</td>
		<td ><input type='text' name='mauso1' size= '10' value='<?php if(isset($_POST['mauso1'])) echo $_POST['mauso1']; ?> '/></td>

	</tr>

    <tr>

		<td >Nh???p ph??n s??? th??? 2:</td>
        <td> T??? s??? 2:</td>
		<td ><input type='text' name='tuso2' size= '10' value='<?php if(isset($_POST['tuso2'])) echo $_POST['tuso2']; ?> '/></td>
        <td >M???u s??? 2:</td>
		<td ><input type='text' name='mauso2' size= '10' value='<?php if(isset($_POST['mauso2'])) echo $_POST['mauso2']; ?> '/></td>

	</tr>

    <tr>
        <td colspan="5"> 
        <fieldset >
				<legend>Ch???n ph??p t??nh</legend>
                <input type="radio" name="toantu" value="+" <?php if(isset($_POST['toantu'])&&($_POST['toantu'])=="+") echo 'checked="checked"'?>/>C???ng

								<input type="radio" name="toantu" value="-"<?php if(isset($_POST['toantu'])&&($_POST['toantu'])=="-") echo 'checked="checked"'?>/>Tr???

								<input type="radio" name="toantu" value="*"<?php if(isset($_POST['toantu'])&&($_POST['toantu'])=="*") echo 'checked="checked"'?>/>Nh??n 
								<input type="radio" name="toantu" value="/"<?php if(isset($_POST['toantu'])&&($_POST['toantu'])=="/") echo 'checked="checked"'?>/>Chia
			</fieldset>
        </td>
    </tr>
    
		
	<tr>

		<td colspan="5" align="center"><input  type="submit" name="tinh"  size="20" value="  T??nh  "/></td>

	</tr>

   

    <tr>

		<td>K???t qu???</td> 
        <td><input type='text' disabled="disabled " name='ketqua' size= '20' value='<?php if(isset($_POST['tinh']) ) echo $ketqua; ?> '/></td>

	

	</tr>

	
</table>




</form>
</center>
<?php include ('./includes/footer.html'); ?>
</body>

</html>

