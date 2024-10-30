<?php
    include 'data.php';
    include 'dau.php';
    
?>

<main id="main" class="main">

<div class="pagetitle">
		<h2>Danh sách Môn học</h2>
</div>
<p>
  <a href="ThemMH.php" class="btn btn-success">
    <i class="bi bi-file-earmark-text me-1"></i>Thêm Môn học
  </a>
</p>
<p>
  <a href="ThemMHCT.php" class="btn btn-success">
    <i class="bi bi-file-earmark-text me-1"></i>Thêm Giảng viên
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
									<th class="col-3 text-center">Tên môn học</th>
                  <th class="col-2 text-center">Số tín chỉ</th>
                  <th class="col-2 text-center">Mô tả</th>
									<th class="col-2 text-center">Chức năng</th>
								</tr>
							</thead>
							<tbody>
                <?php $sql = "SELECT * from MonHoc";
                
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                      <th class="text-center" scope="row"><?php echo $row['IDMonHoc']; ?></th>
                        <td>
                          <a href="<?php echo $row['IDMonHoc']; ?>" class="text-primary">
                            <?php echo $row['TenMonHoc']; ?>
                          </a>
                        </td>
                        <td class="text-center"><?php echo $row['SoTC']; ?></td>
                       
                        <td class="text-center"><?php echo $row['MoTa']; ?></td>
                       
                        <td class="text-center">
                          <a href="SuaMH.php?this_id=<?php echo $row['IDMonHoc']; ?>" class="btn btn-primary btn-sm" title="Sửa menu">
                            <i class="bi bi-pencil"></i>
                          </a>
                          <a href="XoaMH.php?this_id=<?php echo $row['IDMonHoc']; ?>" class="btn btn-danger btn-sm" title="Xóa menu">
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


