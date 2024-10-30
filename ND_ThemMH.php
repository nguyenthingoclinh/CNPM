
<?php
    include "data.php";
   
    if(isset($_POST['btn'])){
        $tenmonhoc = $_POST['tenmonhoc'];
        $mota = $_POST['mota'];
        $sql = "insert into MonHoc(TenMonHoc, MoTa) values('$tenmonhoc', '$mota')";
        mysqli_query($conn, $sql);
        header('Location: ND_DS_MH.php');
        /*echo "<script type='text/javascript'>
        window.location.href = 'ND_DS_MHCT.php';
        </script>";*/
      
    }
    if(isset($_POST['btnq'])){
        header('Location: ND_DS_MH.php');
    }
    include "ND_dau1.php";
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> 
            <h2 class="text-center mb-4">Thêm Môn Học</h2>
            <form  method="POST">
                <div class="mb-3">
                    <label for="tenmonhoc" class="form-label">Tên Môn Học</label>
                    <input type="text" class="form-control" name="tenmonhoc" >
                </div>
                <div class="mb-3">
                    <label for="mota" class="form-label">Mô Tả</label>
                    <textarea class="form-control" name="mota" rows="3" ></textarea>
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