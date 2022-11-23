

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

			$str= "Thong tin sinh viên: tên ".$sv->gethoTen()." địa chỉ : ".$sv->getdiaChi()." giới tính: ". $sv->getgioiTinh().

			 		" lớp ".$sv->getlopHoc()." ngành : ".$sv->getnganhHoc() . "Tính điểm:" . $sv->TinhDiem();

		}


		if(isset($_POST['nghe']) && ($_POST['nghe'])=="gv"){

			$gv=new GiangVien();

			$gv->setHoTen($_POST['hoTen']);
			$gv->setDiaChi($_POST['diaChi']);
			$gv->setGioiTinh($_POST['gioiTinh']);

			$gv->setTrinhDo($_POST['trinhDo']);

			$str= "Thong tin giảng viên: tên ".$gv->gethoTen()." địa chỉ : ".$gv->getdiaChi()." giới tính: ". $gv->getgioiTinh().

			 		" trình độ ".$gv->gettrinhDo(). " Tính lương:" . $gv->TinhLuong();

		}
	}

    
?>

<?php include ('./includes/header.html'); ?>

<center>
<form action="" method="post">

<table border="0" cellpadding="0" align=center>

	<th colspan="2"><h2>NHẬP THÔNG TIN</h2></th>

	<tr>

		<td>Họ Tên</td>

		<td><input type='text' name='hoTen' size= '30' value='<?php if(isset($_POST['hoTen'])) echo $_POST['hoTen']; ?> '/></td>

	</tr>

	<tr>

		<td>Giới tính</td>

		<td><input type="radio" name="gioiTinh" value="nam" <?php if(isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == 'nam') echo 'checked="checked"'; ?>/>  Nam
			<input type="radio" name="gioiTinh" value="nu" <?php if(isset($_POST['gioiTinh'])&&$_POST['gioiTinh']=='nu') echo 'checked="checked"';?>/> Nữ

		</td>

	</tr>

	<tr>

		<td>Địa chỉ</td>

		<td><input type="text" name="diaChi" size= "30" value="<?php if(isset($_POST['diaChi'])) echo $_POST['diaChi']; ?> "/></td>

	</tr>


	<tr>

		<td>Nghề nghiệp</td>

		<td><input type="radio" name="nghe" value="sv" <?php if(isset($_POST['nghe']) && $_POST['nghe'] == 'sv') echo 'checked="checked"'; ?>/>  Sinh viên
			<input type="radio" name="nghe" value="gv" <?php if(isset($_POST['nghe'])&&$_POST['nghe']=='gv') echo 'checked="checked"';?>/> Giảng viên

		</td>



	</tr>

	<tr>

		<td colspan="3" >
			<fieldset >
				<legend>Sinh viên</legend>
				Lớp học <input type='text' name='lopHoc' size= '30' value='<?php if(isset($_POST['lopHoc'])) echo $_POST['lopHoc']; ?> '/> <br>
				Ngành học 
				<select name="nganhHoc">

			<option value="cntt" <?php if(isset($_POST['nganhHoc'])&& $_POST['nganhHoc']=='cntt') echo 'selected';?>>

				Công nghệ thông tin

			</option>

			<option value="kt" <?php if(isset($_POST['nganhHoc'])&& $_POST['nganhHoc']=='kt') echo 'selected';?>>

				Kinh tế

			</option>

			<option value="khac" <?php if(isset($_POST['nganhHoc'])&& $_POST['nganhHoc']=='khac') echo 'selected';?>>

				Khác

			</option>


		</select><br>
			</fieldset>
		</td>
		<td colspan="3">
			<fieldset>
				<legend>Giảng viên</legend>
				<select name="trinhDo">

			<option value="cuNhan" <?php if(isset($_POST['trinhDo'])&& $_POST['trinhDo']=='cuNhan') echo 'selected';?>>

				Cử nhân

			</option>

			<option value="thacSi" <?php if(isset($_POST['trinhDo'])&& $_POST['trinhDo']=='thacSi') echo 'selected';?>>

				Thạc sĩ

			</option>

			<option value="tienSi" <?php if(isset($_POST['trinhDo'])&& $_POST['trinhDo']=='TienSi') echo 'selected';?>>

				Tiến sĩ
			</option>

		</select><br>

			<input type='text' name='luong' disabled="disabled" size= '30' value='1500000'/>
			</fieldset>
		</td>


	</tr>


		


	<tr>

		<td></td>

		<td><input type="submit" name="tinh"  size="20" value="  Tính "/></td>

	</tr>

	<tr><td>Kết quả:</td>

			<td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str;?></textarea></td></tr>

</table>




</form>
</center>
<?php include ('./includes/footer.html'); ?>
</body>

</html>

