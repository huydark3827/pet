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

	<?php
    abstract class NhanVien{
        protected $hoTen;
        protected $ngaySinh;
        protected $gioiTinh;
        protected $ngayVaoLam;
        protected $heSoLuong;
        protected $soCon;
        const LUONGCB = 1000000;

        public function sethoTen($ten){
		$this->hoTen=$ten;
		}

        public function setngaySinh($ns){
            $this->ngaySinh=$ns;
            }

		public function setgioiTinh($gt){
		$this->gioiTinh=$gt;
		}

        public function setngayVaoLam($nvl){
            $this->ngayVaoLam=$nvl;
        }

        public function setheSoLuong($hsl){
            $this->heSoLuong=$hsl;
        }

        public function setsoCon($sc){
            $this->soCon=$sc;
        }



		public function gethoTen(){
			return $this->hoTen;
		}

        public function getngaySinh(){
			return $this->ngaySinh;
		}

		public function getgioiTinh(){
			return $this->gioiTinh;
		}

        public function getngayVaoLam(){
			return $this->ngayVaoLam;
		}

        public function getheSoLuong(){
			return $this->heSoLuong;
		}

        public function getsoCon(){
			return $this->soCon;
		}

    

        function TinhTienThuong(){
            $t = time();
            return (date("Y", $t) - date("Y", $this->ngayVaoLam)) * self::LUONGCB;
        }
        abstract function TinhTienLuong();
        abstract function TinhTroCap();

    }


    class NhanVienVanPhong extends NhanVien{
        private $soNgayVang;
        const DINHMUCVANG = 5;
        const DONGIAPHAT = 300000;

        public function setsoNgayVang($snv){
		$this->soNgayVang=$snv;
		}

        public function getsoNgayVang(){
			return $this->soNgayVang;
		}

        function TinhTienPhat(){
            if($this->soNgayVang > self::DINHMUCVANG)
                return $this->soNgayVang*self::DONGIAPHAT;
        }


        function TinhTienLuong(){
            return parent::LUONGCB * $this->heSoLuong - $this->TinhTienPhat();
        }

        function TinhTroCap()
        {
            if($this->gioiTinh == "Nữ")
                return 200000 * $this->soCon * 1.5;
            else
                return 200000 * $this->soCon;
        }
    }

    class NhanVienSanXuat extends NhanVien{
        private $soSanPham;
        const DINHMUCSP = 5;
        const DONGIASP = 300000;

        public function setsoSanPham($ssp){
		$this->soSanPham=$ssp;
		}

        public function getsoSanPham(){
			return $this->soSanPham;
		}

        function TinhTienThuong(){
            if($this->soSanPham > self::DINHMUCSP){
                return ($this->soSanPham - self::DINHMUCSP) * self::DONGIASP * 0.03;
            }
            
        }

        function TinhTienLuong(){
            return ($this->soSanPham * self::DONGIASP) + $this->TinhTienThuong();
        }

        function TinhTroCap()
        {
            
                return 120000 * $this->soCon;
        }
    }

    

    $str = NULL;

    $tienLuong = NULL;
    $troCap = NULL;
    $tienPhat = NULL;
    $thucLinh = NULL;
    $tienThuong = NULL;

    



    if(isset($_POST['tinh'])){

        $ngayvaolam = $_POST['ngayvaolam'];

   $ngayvaolam = $_POST['ngaysinh'];

		if(isset($_POST['loainv']) && ($_POST['loainv'])=="vanphong"){

			$nv=new NhanVienVanPhong();

			$nv->sethoTen($_POST['hoten']);

			$nv->setgioiTinh($_POST['gioiTinh']);
            $nv->setngaySinh($_POST['ngaysinh']);

			$nv->setngayVaoLam($_POST['ngayvaolam']);
			$nv->setheSoLuong($_POST['hesoluong']);

            $nv->setsoCon($_POST['socon']);

            $nv->setsoNgayVang($_POST['songayvang']);

            $tienPhat = $nv->TinhTienPhat();
            $tienLuong = $nv->TinhTienLuong();
            $troCap = $nv->TinhTroCap();

            $thucLinh = $tienLuong + $troCap + $tienThuong - $tienPhat;
		}


		if(isset($_POST['loainv']) && ($_POST['loainv'])=="sanxuat"){

			$nv=new NhanVienSanXuat();

			$nv->sethoTen($_POST['hoten']);

			$nv->setgioiTinh($_POST['gioiTinh']);
            $nv->setngaySinh($_POST['ngaysinh']);

			$nv->setngayVaoLam($_POST['ngayvaolam']);
			$nv->setheSoLuong($_POST['hesoluong']);

            $nv->setsoCon($_POST['socon']);

            $nv->setsoSanPham($_POST['sosanpham']);

          
            
            $tienThuong = $nv->TinhTienThuong();
            $tienLuong = $nv->TinhTienLuong();
            $troCap = $nv->TinhTroCap();

            echo $tienLuong;

            $thucLinh = $tienLuong + $troCap + $tienThuong - $tienPhat;

		}
	}

    
?>



<center>
<form action="" method="post">

<table border="0" cellpadding="10">

	<th colspan="4"><h2>QUẢN LÝ NHÂN VIÊN</h2></th>

	<tr>

		<td >Họ và tên:</td>
		<td ><input type='text' name='hoten' size= '50' value='<?php if(isset($_POST['hoten'])) echo $_POST['hoten']; ?> '/></td>
        <td >Số con:</td>
		<td ><input type='text' name='socon' size= '50' value='<?php if(isset($_POST['socon'])) echo $_POST['socon']; ?> '/></td>

	</tr>

    <tr>

		<td >Ngày sinh:</td>
		<td ><input type='date' name='ngaysinh' size= '30' value='<?php if(isset($_POST['ngaysinh'])) echo $ngaySinh; ?> '/></td>
        <td >Ngày vào làm</td>
		<td ><input type='date' name='ngayvaolam' size= '30' value='<?php if(isset($_POST['ngayvaolam'])) echo $ngayVaoLam; ?> '/></td>

	</tr>



    <tr>

		<td >Giới tính:</td>
		<td ><input type="radio" name="gioiTinh" value="Nam" <?php if(isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == 'Nam') echo 'checked="checked"'; ?>/>  Nam
			<input type="radio" name="gioiTinh" value="Nữ" <?php if(isset($_POST['gioiTinh'])&&$_POST['gioiTinh']=='Nữ') echo 'checked="checked"';?>/> Nữ

		</td>
        <td >Hệ số lương:</td>
		<td ><input type='text' name='hesoluong' size= '50' value='<?php if(isset($_POST['hesoluong'])) echo $_POST['hesoluong']; ?> '/></td>

	</tr>

	<tr>

		<td >Loại nhân viên</td>

		<td ><input type="radio" name="loainv" value="vanphong" <?php if(isset($_POST['loainv']) && $_POST['loainv'] == 'vanphong') echo 'checked="checked"'; ?>/>  Văn phòng</td>

        <td colspan="2"><input type="radio" name="loainv" value="sanxuat" <?php if(isset($_POST['loainv'])&&$_POST['loainv']=='sanxuat') echo 'checked="checked"';?>/> Sản xuất </td> 

	</tr>

	<tr>
        <td></td>
		<td >Số ngày vắng: 
        <input type="text" name="songayvang" size= "30" value="<?php if(isset($_POST['songayvang'])) echo $_POST['songayvang']; ?> "/>
        </td>
	
		<td colspan="2">Số sản phẩm:<input type="text" name="sosanpham" size= "50" value="<?php if(isset($_POST['sosanpham'])) echo $_POST['sosanpham']; ?> "/></td>

	</tr>
		
	<tr>

		<td colspan="4" align="center"><input  type="submit" name="tinh"  size="20" value="  Tính lương  "/></td>

	</tr>

    <tr>

		<td >Tiền lương:</td>
		<td ><input type='text' disabled="disabled" name='tienluong' size= '50' value='<?php echo $tienLuong; ?> '/></td>
        <td >Tợ cấp:</td>
		<td ><input type='text'  disabled="disabled"  name='trocap' size= '50' value='<?php echo $troCap; ?> '/></td>

	</tr>

    <tr>

		<td >Tiền thưởng:</td>
		<td ><input type='text' disabled="disabled" name='tienthuong' size= '50' value='<?php echo $tienThuong; ?> '/></td>
        <td >Tiền phạt:</td>
		<td ><input type='text'  disabled="disabled"  name='tienphat' size= '50' value='<?php echo $tienPhat; ?> '/></td>

	</tr>

    <tr>

		<td  colspan="4" align="center">Thực lĩnh:
		<input type='text' disabled="disabled" name='thuclinh' size= '50' value='<?php echo $thucLinh; ?> '/></td>
        
	</tr>

	
</table>




</form>
</center>

</body>

</html>
<?php include ('./includes/footer.html'); ?>

