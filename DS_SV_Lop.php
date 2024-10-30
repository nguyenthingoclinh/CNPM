<?php
    include 'data.php';
    include 'dau.php';
    $this_id = $_GET['this_id'];
    
?>

<main id="main" class="main">

<div class="pagetitle">
		<h2>Danh sách lớp học</h2>
</div>
<p>
  <a href="ThemSVLop.php?this_id=<?php echo $this_id; ?>" class="btn btn-success">
    <i class="bi bi-file-earmark-text me-1"></i>Thêm sinh viên
  </a>
  <a href="DS_LopHoc.php" class="btn btn-warning ">
  <i class="bi bi-arrow-left-circle"></i>Quay lại
  </a>
</p>
	<section class="section dashboard">
		<div class="row">
			<div class="col-12">
            <form method="POST">
				<div class="card recent-sales overflow-auto">
					<div class="card-body mt-4">
						<table class="table table-borderless datatable">
							<thead>
								<tr>
									<th class="col-1 text-center">#</th>
									<th class="col-3 text-center">Tên lớp</th>
                                    <th class="col-2 text-center">ID</th>
                                    <th class="col-3 text-center">Họ Tên</th>
                                    <th class="col-2 text-center">Ngày sinh</th>
                                    <th class="col-2 text-center">Chức năng</th>
								</tr>
							</thead>
							<tbody>
                                <?php $sql = 'SELECT * FROM Lop_SV lopsv join NguoiDung nd on nd.IDNDung = lopsv.IDNDung
                                join LopHoc lh on lh.IDLop = lopsv.IDLop
                                where lh.IDLop = '.$this_id;
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <th class="text-center" scope="row"><?php echo $row['IDLop']; ?></th>
                                            <td>
                                                <a href="<?php echo $row['IDLop']; ?>" class="text-primary">
                                                    <?php echo $row['TenLop']; ?>
                                                </a>
                                            </td>
                                            <td class="text-center"><?php echo $row['IDNDung']; ?></td>
                                            <td class="text-center"><?php echo $row['HoTen']; ?></td>
                                            <td class="text-center"><?php echo $row['NgaySinh']; ?></td>
                                            <td class="text-center">
                                                <a href="XoaSVLop.php?idnd=<?php echo $row['IDNDung']; ?>&this_id=<?php echo $this_id; ?>" class="btn btn-danger btn-sm" title="Xóa sinh viên">
                                                    <i class="bi bi-trash"></i>
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
