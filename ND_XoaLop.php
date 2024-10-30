
<?php
    include "data.php";
    include "ND_dau1.php";
    $this_id = $_GET['this_id'];
    $sql1 = "select * from LopHoc where IDLop=".$this_id;
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    if(isset($_POST['btn'])){
        $sql = "delete from LopHoc where IDLop=".$this_id;
        mysqli_query($conn, $sql);
        echo "<script type='text/javascript'>
        window.location.href = 'ND_DS_Lop.php';
        </script>";
    }
    if(isset($_POST['btnq'])){
        echo "<script type='text/javascript'>
        window.location.href = 'ND_DS_Lop.php';
        </script>";
    }
    
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> 
            <h2 class="text-center mb-4">Xóa Lớp Học</h2>
            <form  method="POST">
                <div class="mb-3">
                    <label for="tenlophoc" class="form-label">Tên lớp học</label>
                    <input type="text" class="form-control" name="tenlophoc" value = "<?php echo $row['TenLop'] ?>" disabled>
                </div>
                <div class="mb-3">
                    <<label for="mota" class="form-label">Mô tả</label>
                    <input type="text" class="form-control" name="mota" value = "<?php echo $row['MoTa'] ?>" disabled>
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