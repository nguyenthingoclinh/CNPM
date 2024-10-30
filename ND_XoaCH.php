
<?php
    include "data.php";
    $this_id = $_GET['this_id'];
    $sql1 = "select * from CauHoi where IDCauHoi =".$this_id;
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    if(isset($_POST['btn'])){
        $sql = "delete from CauHoi where IDCauHoi = ".$this_id;
        mysqli_query($conn, $sql);
        header('Location: ND_DS_CauHoi.php');
    }
    if(isset($_POST['btnq'])){
        header('Location: ND_DS_CauHoi.php');
    }

    include "ND_dau1.php";
    
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> 
            <h2 class="text-center mb-4">Thêm Lớp Học</h2>
            <form  method="POST">
                <div class="mb-3">
                    <label for="tende" class="form-label">Đề</label>
                    <input type="text" class="form-control" name="tende" value = "<?php echo $row['TenDe'];?>" disabled>
                </div>
                <div class="mb-3">
                <label for="monhoc" class="form-label">Môn học</label>
                    <select class="form-control" name="monhoc" disabled>
                        <option value="">-- Chọn môn học --</option>
                        <?php
                            $sql2 = 'SELECT * FROM MonHoc';
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    $selected = ($row2['IDMonHoc'] == $row['IDMonHoc']) ? 'selected' : '';
                                    echo "<option value='{$row2['IDMonHoc']}' $selected>{$row2['TenMonHoc']} - ID: {$row2['IDMonHoc']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có môn học</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="DA1" class="form-label">Đáp án A</label>
                    <input type="text" class="form-control" name="DA1" value = "<?php echo $row['DA1'];?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="DA2" class="form-label">Đáp án B</label>
                    <input type="text" class="form-control" name="DA2" value = "<?php echo $row['DA2'];?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="DA3" class="form-label">Đáp án C</label>
                    <input type="text" class="form-control" name="DA3" value = "<?php echo $row['DA3'];?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="DA4" class="form-label">Đáp án D</label>
                    <input type="text" class="form-control" name="DA4" value = "<?php echo $row['DA4'];?>" disabled>
                </div>
                <div class="mb-3">
                <label for="DADung" class="form-label">Đáp án Đúng</label>
                    <select class="form-control" name="DADung" disabled>
                        <option value="A" <?php echo ($row['DADung'] == 'A') ? 'selected' : ''; ?>>A</option>
                        <option value="B" <?php echo ($row['DADung'] == 'B') ? 'selected' : ''; ?>>B</option>
                        <option value="C" <?php echo ($row['DADung'] == 'C') ? 'selected' : ''; ?>>C</option>
                        <option value="D" <?php echo ($row['DADung'] == 'D') ? 'selected' : ''; ?>>D</option>
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