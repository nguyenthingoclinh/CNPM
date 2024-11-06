<?php
    include 'data.php';
    include 'dau.php';
?>

<main id="main" class="main">

<div class="pagetitle">
		<h2>Danh sách Bài thi</h2>
</div>
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
                                    <th class="col-2 text-center">Vào thi</th>
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
                                        <a href="Thi.php?this_id=<?php echo $row['IDBaiThi']; ?>" class="btn btn-info btn-sm" title="Thi bài thi">
                                            <i class="bi bi-file-earmark-play"></i>
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