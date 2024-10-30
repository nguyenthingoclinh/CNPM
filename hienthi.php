<?php
    include 'data.php';
    include "classND.php"; 
    $user = new User(); 
    $id = $user->layIDNguoiDung();
    include "ND_dau.php";
?>
<div class="container py-5">
    <div class="container-fluid service pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Bài thi</h4>
                    <h1 class="display-5 mb-4">Các bài thi hiện có</h1>
                    <p class="mb-0">Dưới đây là danh sách các bài thi bạn có thể tham gia. Hãy chọn bài thi phù hợp với bạn để kiểm tra kiến thức của mình và nâng cao kỹ năng. Mỗi bài thi được thiết kế để giúp bạn kiểm tra và củng cố kiến thức đã học.
                    </p>
                </div>
                <div class="row g-4">
                <?php
                    $sql = "SELECT * FROM BaiThi bt join MH_GV mhgv on mhgv.IDMH_GV = bt.IDMH_GV
                    join MonHoc mh on mh.IDMonHoc = mhgv.IDMonHoc 
                    join NguoiDung nd on nd.IDNDung = mhgv.IDNDung
                    where nd.IDNDung = '$id'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="NguoiDung/img/service-1.jpg" class="img-fluid rounded-top w-100" alt="Image">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="ND_VaoThi.php?this_id=<?php echo $row['IDBaiThi'] ?>" class="h4 d-inline-block mb-4"> <?php echo $row['TenBaiThi'] ?></a>
                                <p class="mb-4">
                                    Hãy sẵn sàng cho bài thi của bạn! Mỗi câu hỏi được thiết kế để kiểm tra kiến thức và khả năng của mình trong các lĩnh vực liên quan. Đảm bảo rằng bạn đã chuẩn bị kỹ càng trước khi bắt đầu.
                                </p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="ND_VaoThi.php?this_id=<?php echo $row['IDBaiThi'] ?>">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                <?php
                        }
                    }
                ?>
                </div>
            </div>
    </div>
                
</div>

<?php
    include "ND_cuoi.php";
?>