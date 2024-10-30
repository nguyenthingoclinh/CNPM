<?php
    include "data.php";
    include "classND.php"; 
    $user = new User(); 
    $id = $user->layIDNguoiDung();
    if(isset($_POST['btn'])){
        $tende = $_POST['tende'];
        $monhoc = $_POST['monhoc'];
        $DA1 = $_POST['DA1'];
        $DA2 = $_POST['DA2'];
        $DA3 = $_POST['DA3'];
        $DA4 = $_POST['DA4'];
        $DADung = $_POST['DADung'];
        $sql = "insert into CauHoi(IDMonHoc, TenDe, DA1, DA2, DA3, DA4, DADung) values('$monhoc', '$tende','$DA1', '$DA2', '$DA3', '$DA4', '$DADung')";

        mysqli_query($conn, $sql);
        $ssql = "select IDCauHoi from CauHoi order by IDCauHoi desc LIMIT 1";
        $resultt = mysqli_query($conn, $ssql);
        $roww = mysqli_fetch_assoc($resultt);
        $idcauhoi = $roww['IDCauHoi'];
        $ssql1 = "insert into CH_ND(IDCauHoi, IDNDung) values('$idcauhoi', '$id')";
        mysqli_query($conn, $ssql1);
    }
    if(isset($_POST['btnq'])){
        header('Location: ND_DS_CauHoi.php');
    }

    include "ND_dau1.php";
    
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> 
            <h2 class="text-center mb-4">Thêm câu hỏi</h2>
            <form  method="POST">
                <div class="mb-3">
                    <label for="tende" class="form-label">Đề</label>
                    <input type="text" class="form-control" name="tende">
                </div>
                <div class="mb-3">
                <label for="monhoc" class="form-label">Môn học</label>
                    <select class="form-control" name="monhoc">
                        <option value="">-- Chọn môn học --</option>
                        <?php
                            $sql1 = "SELECT * FROM MH_GV join MonHoc mh on MH_GV.IDMonHoc = mh.IDMonHoc
                            join NguoiDung nd on nd.IDNDung = MH_GV.IDNDung
                            where nd.IDNDung = '$id'";
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    echo "<option value='{$row1['IDMonHoc']}'>{$row1['TenMonHoc']} - ID: {$row1['IDMonHoc']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có giảng viên</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="DA1" class="form-label">Đáp án A</label>
                    <input type="text" class="form-control" name="DA1">
                </div>
                <div class="mb-3">
                    <label for="DA2" class="form-label">Đáp án B</label>
                    <input type="text" class="form-control" name="DA2">
                </div>
                <div class="mb-3">
                    <label for="DA3" class="form-label">Đáp án C</label>
                    <input type="text" class="form-control" name="DA3">
                </div>
                <div class="mb-3">
                    <label for="DA4" class="form-label">Đáp án D</label>
                    <input type="text" class="form-control" name="DA4">
                </div>
                <div class="mb-3">
                <label for="DADung" class="form-label">Đáp án Đúng</label>
                    <select class="form-control" name="DADung">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
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