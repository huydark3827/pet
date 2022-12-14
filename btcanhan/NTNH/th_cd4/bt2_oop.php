<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>



    <style>
        form{
            width: 800px;
            height: fit-content;
            background-color: lightpink;
            padding-left: 40px;
            padding-top: 20px;
        }
        td{
            padding: 5px;
        }
        .datetime{
            width: 165px;
            height: 20px;
        }
        h3{
            text-align: center;
        }
    </style>
</head>
<body>
    
<?php
 abstract class NhanVien {
       protected $name, $gender, $ngayvaolam,$hesoluong,$socon,$ngaysinh;
       const LuongCB = 1000000;

       public function setName($ten)
       {
           $this->name=$ten;
       }
       public function getName()
       {
		return $this->name;
	    }

        public function setGender($gt)
       {
           $this->gender=$gt;
       }
       public function getGender()
       {
		return $this->gender;
	    }

        public function setNgayVL($ngayvl)
        {
            $this->ngayvaolam=$ngayvl;
        }
        public function getNgayVL()
        {
         return $this->ngayvaolam;
         }
        
         public function setHeSoLuong($hsluong)
         {
             $this->hesoluong=$hsluong;
         }
         public function getHeSoLuong()
         {
          return $this->hesoluong;
          } 


          public function setSoCon($sc)
          {
              $this->socon=$sc;
          }
          public function getSoCon()
          {
           return $this->socon;
           } 
           public function setNgaySinh($ns)
           {
               $this->ngaysinh=$ns;
           }
           public function getNgaySinh()
           {
            return $this->ngaysinh;
            } 
        
       public function getLuong()
	{
		return $this->LuongCB;
	}
    
    function TinhThuong(){
        $t = time();
        return (date("Y",$t) - date("Y", $this->ngayvaolam)) * self::LuongCB;
    }
    abstract function TinhTienLuong();
    abstract function TinhTroCap();

    }

     class NhanVienVanPhong extends NhanVien{
        private $ngayvang;
        const DINHMUCVANG = 5;
        const DONGIAPHAT = 300000;

        public function setNgayVang($snv){
            $this->ngayvang = $snv;
        }
        public function getNgayVang(){
			return $this->ngayvang;
		}
        function TinhTienPhat(){
            if($this->ngayvang > self::DINHMUCVANG)
                return $this->ngayvang*self::DONGIAPHAT;
        }
        function TinhTienLuong(){
            return parent::LuongCB * $this->hesoluong - $this->TinhTienPhat();
        }
        function TinhTroCap(){
            if($this->gender == "N???")
                    return 200000*$this->socon*1.5;
                return 200000*$this->socon;
        }
    }

    class NhanVienSanXuat extends NhanVien{
        private $sosp;
        const DINHMUCSP = 5;
        const DONGIASP = 300000;

        public function setsoSanPham($ssp){
            $this->sosp=$ssp;
            }
    
            public function getsoSanPham(){
                return $this->sosp;
            }
    
            function TinhTienThuong(){
                if($this->sosp > self::DINHMUCSP){
                    return ($this->sosp - self::DINHMUCSP) * self::DONGIASP * 0.03;
                }
                
            }
    
            function TinhTienLuong(){
                return ($this->sosp * self::DONGIASP) + $this->TinhTienThuong();
            }
    
            function TinhTroCap()
            {
                
                    return 120000 * $this->socon;
            }


    }

    $tienluong = NULL;
    $trocap = NULL;
    $phat = NULL;
    $thuclinh = NULL;
    $thuong = NULL;


    if(isset($_POST['tinh']))
    {
        $ngayvaolam = $_POST['ngayvaolam'];
        $ngaysinh    = $_POST['ngaysinh'];
        if(isset($_POST['loainv']) && ($_POST['loainv'])=="vanphong"){

			$nv=new NhanVienVanPhong();

			$nv->setName($_POST['name']);

			$nv->setGender($_POST['gender']);
            $nv->setNgaySinh($_POST['ngaysinh']);

			$nv->setNgayVL($_POST['ngayvaolam']);
			$nv->setHeSoLuong($_POST['hesoluong']);

            $nv->setSoCon($_POST['socon']);

            $nv->setNgayVang($_POST['ngayvang']);

            $phat = $nv->TinhTienPhat();
            $tienluong = $nv->TinhTienLuong();
            $trocap = $nv->TinhTroCap();

            $thuclinh = $tienluong + $trocap + $thuong - $phat;
		}


		if(isset($_POST['loainv']) && ($_POST['loainv'])=="sanxuat"){

			$nv=new NhanVienSanXuat();

			$nv->setName($_POST['name']);

			$nv->setGender($_POST['gender']);
            $nv->setNgaySinh($_POST['ngaysinh']);

			$nv->setNgayVL($_POST['ngayvaolam']);
			$nv->setHeSoLuong($_POST['hesoluong']);

            $nv->setSoCon($_POST['socon']);

            $nv->setsoSanPham($_POST['sosp']);

          
            
            $thuong = $nv->TinhTienThuong();
            $tienluong = $nv->TinhTienLuong();
            $trocap = $nv->TinhTroCap();

            

            $thuclinh = $tienluong + $trocap + $thuong - $phat;

		}
    }

?>

<?php include ('./includes/header.html'); ?>

<center>
<form action="" method="post">
            <h3>QU???N L?? NH??N VI??N</h3>
        <table>
            <tr>
                <td>H??? v?? t??n :</td>
                <td><input type="text" name="name" require value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" /></td>
                <td>S??? con:</td>
                <td><input type="text" name="socon" require value="<?php if (isset($_POST['socon'])) echo $_POST['socon']; ?>" /></td>
            </tr>
            <tr>
                <td>Ng??y sinh :</td>
                <td><input class="datetime" type="date" require name="ngaysinh" value="<?php if (isset($_POST['ngaysinh'])) echo $_POST['ngaysinh']; ?>"/></td>
                <td>Ng??y v??o l??m : </td>
                <td><input class="datetime" type="date" require name="ngayvaolam" value="<?php if (isset($_POST['ngayvaolam'])) echo $_POST['ngayvaolam']; ?>"/></td>
            </tr>
            <tr>
                <td>Gi???i t??nh : </td>
                <td>
                    <input type="radio" name="gender" require value="Nam" <?php if (isset($_POST['gender']) && ($_POST['gender']) == "Nam") echo 'checked="checked"' ?> />Nam
                    <input type="radio" name="gender" require value="N???" <?php if (isset($_POST['gender']) && ($_POST['gender']) == "N???") echo 'checked="checked"' ?> />N???</td>
                <td>H??? s??? l????ng : </td>
                <td><input type="text" name="hesoluong" require value="<?php if (isset($_POST['hesoluong'])) echo $_POST['hesoluong']; ?>" /></td>
            </tr>
            <tr>
                <td>Lo???i nh??n vi??n :</td>
                <td><input type="radio" name="loainv" require value="vanphong" <?php if (isset($_POST['loainv']) && ($_POST['loainv']) == "V??n Ph??ng") echo 'checked="checked"' ?> />V??n Ph??ng</td>
                <td><input type="radio" name="loainv" require value="sanxuat" <?php if (isset($_POST['loainv']) && ($_POST['loainv']) == "S???n xu???t") echo 'checked="checked"' ?> />S???n xu???t</td>
            </tr>
            <tr>
                <td>S??? ng??y v???ng :</td>
                <td><input type="text" name="ngayvang"  require value="<?php if (isset($_POST['ngayvang'])) echo $_POST['ngayvang']; ?>" /></td>
                <td>S??? s???n ph???m :</td>
                <td><input type="text" name="sosp" require value="<?php if (isset($_POST['sosp'])) echo $_POST['sosp']; ?>" /></td>
            </tr>
            <tr>
                <td>   </td>
                <td></td>
                <td><input type="submit" name="tinh"  value="T??nh L????ng" /></td>
            </tr>
            <tr></tr>
            <tr>
                <td>Ti???n l????ng : </td>
                <td><input type="text" name="tienluong" disabled="disabled" value="<?php echo $tienluong; ?>" size="20"/></td>
                <td>Tr??? c???p</td>
                <td><input type="text" name="trocap" disabled="disabled" value="<?php echo $trocap; ?>" size="20"/></td>
            </tr>
            <tr>

            <td>Ti???n th?????ng :</td>
                <td><input type="text" name="thuong" disabled="disabled" value="<?php echo $thuong; ?>" size="20"/></td>
                <td>Ti???n ph???t :</td>
                <td><input type="text" name="phat" disabled="disabled" value="<?php echo $phat; ?>" size="20"/></td>
            </tr>
            <tr>
                <td>Th???c l??nh :</td>
                <td><input type="text" name="thuclinh" disabled="disabled" value="<?php echo $thuclinh; ?>" size="20"/></td>
            </tr>
        </table>
    </form>
</center>

<?php include ('./includes/footer.html'); ?>
</body>
</html>