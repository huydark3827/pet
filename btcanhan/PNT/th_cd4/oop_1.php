
<?php include ('./includes/header.html'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Mang tim kiem</title>

<style type="text/css">

	table{

		color: #ffff00;

		background-color: gray;		

	}

	table th{

		background-color: blue;

		font-style: vni-times;

		color: yellow;

	}

</style>

</head>

<body>

<center>
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
                case "Cử nhân":
                    return 2.34*self::LUONG;
                    break;
                case "Thạc sĩ":
                    return 3.67*self::LUONG;
                    break;
                case "Tiến sĩ":
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

			$str= "Thong tin sinh viên: tên ".$sv->gethoTen()." \nĐịa chỉ : ".$sv->getdiaChi()." \nGiới tính: ". $sv->getgioiTinh().

			 		" \nLớp ".$sv->getlopHoc()." \nNgành : ".$sv->getnganhHoc() . "\nTính điểm:" . $sv->TinhDiem();

		}


		if(isset($_POST['nghe']) && ($_POST['nghe'])=="gv"){

			$gv=new GiangVien();

			$gv->setHoTen($_POST['hoTen']);

			$gv->setDiaChi($_POST['diaChi']);
			$gv->setGioiTinh($_POST['gioiTinh']);

			$gv->setTrinhDo($_POST['trinhDo']);

			$str= "Thong tin giảng viên: \nTên ".$gv->gethoTen()."\nDịa chỉ : ".$gv->getdiaChi()."\nGiới tính: ". $gv->getgioiTinh().

			 		"\nTrình độ ".$gv->gettrinhDo(). "\nTính lương:" . $gv->TinhLuong();

		}
	}

    
?>



<form action="" method="post">

<table border="0" cellpadding="0">

	<th colspan="4"><h2>NHẬP THÔNG TIN</h2></th>

	<tr>

		<td colspan="1">Họ Tên</td>
		<td></td>

		<td colspan="2"><input type='text' name='hoTen' size= '50' value='<?php if(isset($_POST['hoTen'])) echo $_POST['hoTen']; ?> '/></td>

	</tr>

	<tr>

		<td colspan="1">Giới tính</td>

		<td></td>
		<td colspan="2"><input type="radio" name="gioiTinh" value="Nam" <?php if(isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == 'Nam') echo 'checked="checked"'; ?>/>  Nam
			<input type="radio" name="gioiTinh" value="Nữ" <?php if(isset($_POST['gioiTinh'])&&$_POST['gioiTinh']=='Nữ') echo 'checked="checked"';?>/> Nữ

		</td>

	</tr>

	<tr>

		<td colspan="1">Địa chỉ</td>
		<td></td>
		<td colspan="2"><input type="text" name="diaChi" size= "50" value="<?php if(isset($_POST['diaChi'])) echo $_POST['diaChi']; ?> "/></td>

	</tr>


	<tr>

		<td colspan="1">Nghề nghiệp</td>
		<td></td>
		<td colspan="2"><input type="radio" name="nghe" value="sv" <?php if(isset($_POST['nghe']) && $_POST['nghe'] == 'sv') echo 'checked="checked"'; ?>/>  Sinh viên
			<input type="radio" name="nghe" value="gv" <?php if(isset($_POST['nghe'])&&$_POST['nghe']=='gv') echo 'checked="checked"';?>/> Giảng viên

		</td>



	</tr>

	<tr>

		<td colspan="2">
			<fieldset >
				<legend>Sinh viên</legend>
				Lớp học <input type='text' name='lopHoc'   size= '50' value='<?php if(isset($_POST['lopHoc'])) echo $_POST['lopHoc']; ?> '/> <br>
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

			<option value="Cử nhân" <?php if(isset($_POST['trinhDo'])&& $_POST['trinhDo']=='cuNhan') echo 'selected';?>>

				Cử nhân

			</option>

			<option value="Thạc sĩ" <?php if(isset($_POST['trinhDo'])&& $_POST['trinhDo']=='thacSi') echo 'selected';?>>

				Thạc sĩ

			</option>

			<option value="Tiến sĩ" <?php if(isset($_POST['trinhDo'])&& $_POST['trinhDo']=='TienSi') echo 'selected';?>>

				Tiến sĩ
			</option>

		</select><br>

			<input type='text' name='luong' disabled="disabled" size= '70' value='1500000'/>
			</fieldset>
		</td>


	</tr>


		


	<tr>

		<td></td>

		<td><input type="submit" name="tinh"  size="20" value="  Tính "/></td>

	</tr>

	<tr><td>Kết quả:</td>

			<td colspan="3"><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str;?></textarea></td></tr>

</table>




</form>
</center>

</body>

</html>

<?php include ('./includes/footer.html'); ?>