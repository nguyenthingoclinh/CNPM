<?php
    include 'data.php';
    
    include 'dau.php';
?>


<main id="main" class="main">

<div class="pagetitle">
		<h2>Danh sách Sinh viên</h2>
</div>
<p>
  <a href="ThemSV.php" class="btn btn-success">
    <i class="bi bi-file-earmark-text me-1"></i>Thêm Sinh viên
  </a>
</p>
	<section class="section dashboard">
		<div class="row">
			<div class="col-12">
				<div class="card recent-sales overflow-auto">
					<div class="card-body mt-4">
						<table class="table table-borderless datatable">
							<thead>
								<tr>
									<th class="col-1 text-center">#</th>
									<th class="col-3 text-center">Họ tên</th>
                  <th class="col-2 text-center">Ảnh</th>
									<th class="col-2 text-center">Vai trò</th>
									<th class="col-2 text-center">CCCD</th>
									<th class="col-1 text-center">Ngày sinh</th>
									<th class="col-1 text-center">Địa chỉ</th>
									<th class="col-2 text-center">Chức năng</th>
								</tr>
							</thead>
							<tbody>
                <?php $sql = 'SELECT * FROM NguoiDung WHERE VaiTro like "Sinh Viên"';
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                      <th class="text-center" scope="row"><?php echo $row['IDNDung']; ?></th>
                        <td>
                          <a href="<?php echo $row['IDNDung']; ?>" class="text-primary">
                            <?php echo $row['HoTen']; ?>
                          </a>
                        </td>
                        <td class="text-center">
                        <img src="<?php echo $row['anh']; ?>" alt="Ảnh sinh viên" style="width: 50px; height: auto;">
                        </td>
                        <td class="text-center"><?php echo $row['VaiTro']; ?></td>
                        <td class="text-center"><?php echo $row['CCCD']; ?></td>
                        <td class="text-center"><?php echo $row['NgaySinh']; ?></td>
                        <td class="text-center"><?php echo $row['DiaChi'] ; ?></td>
                        <td class="text-center">
                          <a href="SuaSV.php?this_id=<?php echo $row['IDNDung']; ?>" class="btn btn-primary btn-sm" title="Sửa menu">
                            <i class="bi bi-pencil"></i>
                          </a>
                          <a href="XoaSV.php?this_id=<?php echo $row['IDNDung']; ?>" class="btn btn-danger btn-sm" title="Xóa menu">
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


