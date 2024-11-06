
<?php
    include "data.php";
   
    $idnd = $_GET['idnd'];
    $this_id = $_GET['this_id'];
    $idmonhoc = $_GET['idmonhoc'];
    $sql1 = "select * from Lop_SV join NguoiDung nd on nd.IDNDung = Lop_SV.IDNDung
    join LopHoc lh on lh.IDLop = Lop_SV.IDLop
    where lh.IDLop=".$this_id;
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    $tenlop = $row['TenLop'];
    if(isset($_POST['btn'])){
        $sinhvien = $_POST['sinhvien'];
        $sql = "delete from Lop_SV where IDNDung = $idnd and IDLop = $this_id";
        mysqli_query($conn, $sql);
        /*echo "<script type='text/javascript'>
        window.location.href = 'ND_DS_SV_Lop.php?this_id=$this_id';
        </script>";*/
        header("Location: ND_DS_SV_Lop1.php?this_id=$this_id&idmonhoc=$idmonhoc");
    }
    if(isset($_POST['btnq'])){
        /*echo "<script type='text/javascript'>
        window.location.href = 'ND_DS_SV_Lop.php?this_id=$this_id';
        </script>";*/
        header("Location: ND_DS_SV_Lop1.php?this_id=$this_id&idmonhoc=$idmonhoc");
    }
    include "ND_dau1.php";
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> 
            <h2 class="text-center mb-4">Xóa sinh viên khỏi lớp</h2>
            <form  method="POST">
                <div class="mb-3">
                    <label for="tenlop" class="form-label">Tên lớp</label>
                    <input type="text" class="form-control" name="tenlop" value = "<?php echo $tenlop ?>" disabled>
                </div>
                <div class="mb-3">
                <label for="sinhvien" class="form-label">Sinh viên</label>
                    <select class="form-control" name="sinhvien">
                        <option value="">-- Chọn sinh viên --</option>
                        <?php
                            $sql2 = 'SELECT * FROM NguoiDung where VaiTro like "Sinh Viên"';
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    $selected = ($row2['IDNDung'] == $row['IDNDung']) ? 'selected' : '';
                                    echo "<option value='{$row2['IDNDung']}' $selected>{$row2['HoTen']} - ID: {$row2['IDNDung']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="btn">Submit</button>
                  <button type="submit" class="btn btn-secondary" name="btnq">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
     include "ND_cuoi.php";
?>