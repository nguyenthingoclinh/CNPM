
<?php
    include "data.php";
    include "ND_dau1.php";
    if(isset($_POST['btn'])){
        $tenlophoc = $_POST['tenlophoc'];
        $mota = $_POST['mota'];
        $sql = "insert into LopHoc(TenLop, MoTa) values('$tenlophoc', '$mota')";
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
            <h2 class="text-center mb-4">Thêm Lớp Học</h2>
            <form  method="POST">
                <div class="mb-3">
                    <label for="tenlophoc" class="form-label">Tên lớp học</label>
                    <input type="text" class="form-control" name="tenlophoc">
                </div>
                <div class="mb-3">
                    <label for="mota" class="form-label">Mô tả</label>
                    <input type="text" class="form-control" name="mota">
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