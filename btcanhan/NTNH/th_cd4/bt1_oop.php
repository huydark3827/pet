

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Mang tim kiem</title>

<style type="text/css">

	table{

		color: #ffff00;

		background-color: gray;		
		max-width: 1000px;
	
	}

	table th{

		

		font-style: vni-times;

		color: yellow;

	}
	tr,td{
		text-align:center;
		
	}


</style>

</head>

<body>

	<?php
    class Nguoi{
        protected $hoTen;
        protected $diaChi;
        protected $gioiTinh;

        public function setHoTen($ten){
		$this->hoTen=$ten;
		}

		public function setDiaChi($dc){
		$this->diaChi=$dc;
		}

		public function setGioiTinh($gt){
		$this->gioiTinh=$gt;
		}

		public function gethoTen(){
			return $this->hoTen;
		}
		public function getdiaChi(){
			return $this->diaChi;
		}
		public function getgioiTinh(){
			return $this->gioiTinh;
		}
    }


    class SinhVien extends Nguoi{
        private $lopHoc;
        private $nganhHoc;

        public function setLopHoc($lh){
		$this->lopHoc=$lh;
		}

		public function setNganhHoc($nh){
		$this->nganhHoc=$nh;
		}

		public function getlopHoc(){
			return $this->lopHoc;
		}
		public function getnganhHoc(){
			return $this->nganhHoc;
		}

        function TinhDiem(){
            switch ($this->nganhHoc){
                case "cntt":
                    return 1;
                    break;
                case "kt":
                    return 1.5;
                    break;
                default:
                    return 0;
                    break;
            }
        }
    }

  

    class GiangVien extends Nguoi{
        private $trinhDo; 

        const LUONG = 10500000;


        public function setTrinhDo($td){
		$this->trinhDo=$td;
		}

		public function getLuong(){
			return $this->LUONG;
		}

		public function gettrinhDo(){
			return $this->trinhDo;
		}



         function TinhLuong(){
            switch ($this->trinhDo){
                case "cuNhan":
                    return 2.34*self::LUONG;
                    break;
                case "thacSi":
                    return 3.67*self::LUONG;
                    break;
                case "tienSi":
                    return 5.66*self::LUONG;
                    break;
            }
        }
    }

    $str = NULL;

    if(isset($_POST['tinh'])){

		if(isset($_POST['nghe']) && ($_POST['nghe'])=="sv"){

			$sv=new SinhVien();

			$sv->setHoTen($_POST['hoTen']);

			$sv->setDiaChi($_POST['diaChi']);
			$sv->setGioiTinh($_POST['gioiTinh']);

			$sv->setLopHoc($_POST['lopHoc']);
			$sv->setNganhHoc($_POST['nganhHoc']);

			$str= "Thong tin sinh vi??n: t??n ".$sv->gethoTen()." ?????a ch??? : ".$sv->getdiaChi()." gi???i t??nh: ". $sv->getgioiTinh().

			 		" l???p ".$sv->getlopHoc()." ng??nh : ".$sv->getnganhHoc() . "T??nh ??i???m:" . $sv->TinhDiem();

		}


		if(isset($_POST['nghe']) && ($_POST['nghe'])=="gv"){

			$gv=new GiangVien();

			$gv->setHoTen($_POST['hoTen']);
			$gv->setDiaChi($_POST['diaChi']);
			$gv->setGioiTinh($_POST['gioiTinh']);

			$gv->setTrinhDo($_POST['trinhDo']);

			$str= "Thong tin gi???ng vi??n: t??n ".$gv->gethoTen()." ?????a ch??? : ".$gv->getdiaChi()." gi???i t??nh: ". $gv->getgioiTinh().

			 		" tr??nh ????? ".$gv->gettrinhDo(). " T??nh l????ng:" . $gv->TinhLuong();

		}
	}

    
?>

<?php include ('./includes/header.html'); ?>

<center>
<form action="" method="post">

<table border="0" cellpadding="0" align=center>

	<th colspan="2"><h2>NH???P TH??NG TIN</h2></th>

	<tr>

		<td>H??? T??n</td>

		<td><input type='text' name='hoTen' size= '30' value='<?php if(isset($_POST['hoTen'])) echo $_POST['hoTen']; ?> '/></td>

	</tr>

	<tr>

		<td>Gi???i t??nh</td>

		<td><input type="radio" name="gioiTinh" value="nam" <?php if(isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == 'nam') echo 'checked="checked"'; ?>/>  Nam
			<input type="radio" name="gioiTinh" value="nu" <?php if(isset($_POST['gioiTinh'])&&$_POST['gioiTinh']=='nu') echo 'checked="checked"';?>/> N???

		</td>

	</tr>

	<tr>

		<td>?????a ch???</td>

		<td><input type="text" name="diaChi" size= "30" value="<?php if(isset($_POST['diaChi'])) echo $_POST['diaChi']; ?> "/></td>

	</tr>


	<tr>

		<td>Ngh??? nghi???p</td>

		<td><input type="radio" name="nghe" value="sv" <?php if(isset($_POST['nghe']) && $_POST['nghe'] == 'sv') echo 'checked="checked"'; ?>/>  Sinh vi??n
			<input type="radio" name="nghe" value="gv" <?php if(isset($_POST['nghe'])&&$_POST['nghe']=='gv') echo 'checked="checked"';?>/> Gi???ng vi??n

		</td>



	</tr>

	<tr>

		<td colspan="3" >
			<fieldset >
				<legend>Sinh vi??n</legend>
				L???p h???c <input type='text' name='lopHoc' size= '30' value='<?php if(isset($_POST['lopHoc'])) echo $_POST['lopHoc']; ?> '/> <br>
				Ng??nh h???c 
				<select name="nganhHoc">

			<option value="cntt" <?php if(isset($_POST['nganhHoc'])&& $_POST['nganhHoc']=='cntt') echo 'selected';?>>

				C??ng ngh??? th??ng tin

			</option>

			<option value="kt" <?php if(isset($_POST['nganhHoc'])&& $_POST['nganhHoc']=='kt') echo 'selected';?>>

				Kinh t???

			</option>

			<option value="khac" <?php if(isset($_POST['nganhHoc'])&& $_POST['nganhHoc']=='khac') echo 'selected';?>>

				Kh??c

			</option>


		</select><br>
			</fieldset>
		</td>
		<td colspan="3">
			<fieldset>
				<legend>Gi???ng vi??n</legend>
				<select name="trinhDo">

			<option value="cuNhan" <?php if(isset($_POST['trinhDo'])&& $_POST['trinhDo']=='cuNhan') echo 'selected';?>>

				C??? nh??n

			</option>

			<option value="thacSi" <?php if(isset($_POST['trinhDo'])&& $_POST['trinhDo']=='thacSi') echo 'selected';?>>

				Th???c s??

			</option>

			<option value="tienSi" <?php if(isset($_POST['trinhDo'])&& $_POST['trinhDo']=='TienSi') echo 'selected';?>>

				Ti???n s??
			</option>

		</select><br>

			<input type='text' name='luong' disabled="disabled" size= '30' value='1500000'/>
			</fieldset>
		</td>


	</tr>


		


	<tr>

		<td></td>

		<td><input type="submit" name="tinh"  size="20" value="  T??nh "/></td>

	</tr>

	<tr><td>K???t qu???:</td>

			<td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str;?></textarea></td></tr>

</table>




</form>
</center>
<?php include ('./includes/footer.html'); ?>
</body>

</html>

