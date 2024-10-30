<?php
    include 'data.php';
    include 'dau.php';
?>

<main id="main" class="main">

<div class="pagetitle">
		<h2>Danh sách Bài thi</h2>
</div>
<p>
  <a href="ThemBT.php" class="btn btn-success">
    <i class="bi bi-file-earmark-text me-1"></i>Thêm bài thi
  </a>
</p>
	<section class="section dashboard">
		<div class="row">
			<div class="col-12">
				<div class="card recent-sales overflow-auto">
					<div class="card-body mt-4" >
						<table class="table table-borderless datatable">
							<thead>
								<tr>
									<th class="col-1 text-center">#</th>
									<th class="col-2 text-center">Tên bài thi</th>
                                    <th class="col-2 text-center">Giảng viên</th>
									<th class="col-2 text-center">Môn học</th>
									<th class="col-1 text-center">Số câu</th>
									<th class="col-2 text-center">Bắt đầu</th>
									<th class="col-2 text-center">Kết thúc</th>
                                    <th class="col-2 text-center">Chức năng</th>
								</tr>
							</thead>
							<tbody>
                                <?php $sql = 'SELECT * FROM BaiThi bt join MH_GV mhgv on mhgv.IDMH_GV = bt.IDMH_GV
                                join MonHoc mh on mh.IDMonHoc = mhgv.IDMonHoc 
                                join NguoiDung nd on nd.IDNDung = mhgv.IDNDung';
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                    <th class="text-center" scope="row"><?php echo $row['IDBaiThi']; ?></th>
                                        <td>
                                        <a href="DS_CH_BT.php?this_id=<?php echo $row['IDBaiThi']; ?>" class="text-primary" title="Danh sách câu hỏi">
                                            <?php echo $row['TenBaiThi']; ?>
                                        </a>
                                        </td>
                                        <td class="text-center"><?php echo $row['HoTen']; ?></td>
                                        <td class="text-center"><?php echo $row['TenMonHoc']; ?></td>
                                        <td class="text-center"><?php echo $row['SoCau']; ?></td>
                                        <td class="text-center"><?php echo $row['TGBatDau']; ?></td>
                                        <td class="text-center"><?php echo $row['TGKetThuc'] ; ?></td>
                                        <td class="text-center">
                                        <a href="SuaBT.php?this_id=<?php echo $row['IDBaiThi']; ?>" class="btn btn-primary btn-sm" title="Sửa bài thi">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="XoaBT.php?this_id=<?php echo $row['IDBaiThi']; ?>" class="btn btn-danger btn-sm" title="Xóa bài thi">
                                            <i class="bi bi-trash"></i>
                                            
                                        </a>
                                        <a href="CauHoi_BaiThi.php?this_id=<?php echo $row['IDBaiThi']; ?>&socau=<?php echo $row['SoCau']; ?>" class="btn btn-warning btn-sm" title="Danh sách câu hỏi">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="ThemLopThi.php?this_id=<?php echo $row['IDBaiThi']; ?>" class="btn btn-success btn-sm" title="Danh sách sinh viên">
                                            <i class="bi bi-file-earmark-text"></i>
                                        </a>
                                        </td>
                                    </tr>
                                    <?php
                                    }               
                                }
                                ?>            
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
  </main>

  <?php
  include 'cuoi.php';
  ?>