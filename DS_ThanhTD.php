<?php
    include 'data.php';
    include 'dau.php';
?>

<main id="main" class="main">
<div class="pagetitle">
	<h2>Danh sách Thanh thực đơn</h2>
</div>
<p>
	<a href="ThemTTD.php" class="btn btn-success">
        <i class="bi bi-file-earmark-text me-1"></i>Thêm Thanh thực đơn
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
									<th class="col-3 text-center">Tên TTĐ</th>
									<th class="col-2 text-center">Mức độ</th>
									<th class="col-2 text-center">ID cha</th>
									<th class="col-1 text-center">Thứ tự</th>
									<th class="col-1 text-center">Mã quyền</th>
                                    <th class="col-1 text-center">Action Name</th>
                                    <th class="col-2 text-center">Chức năng</th>
								</tr>
							</thead>
							<tbody>
                               <?php $sql = 'SELECT * FROM Menu ';
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                  
                                    while ($row = mysqli_fetch_assoc($result)) {
                                       
                                    ?>
                                    <tr>
                                        <th class="text-center" scope="row"><?php echo $row['IDMenu']; ?></th>
                                        <td>
                                            <a href="<?php echo $row['IDMenu']; ?>" class="text-primary">
                                                <?php echo $row['TenMenu']; ?>
                                            </a>
                                        </td>
                                        <td class="text-center"><?php echo $row['MucDo']; ?></td>
                                        <td class="text-center"><?php echo $row['IdCha']; ?></td>
                                        <td class="text-center"><?php echo $row['ThuTu']; ?></td>
                                        <td class="text-center"><?php echo $row['MaQuyen'] ; ?></td>
                                        <td class="text-center"><?php echo $row['ActionName'] ; ?></td>
                                        <td class="text-center">
                                            <a href="SuaTTD.php?this_id=<?php echo $row['IDMenu']; ?>" class="btn btn-primary btn-sm" title="Sửa menu">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="XoaTTD.php?this_id=<?php echo $row['IDMenu']; ?>" class="btn btn-danger btn-sm" title="Xóa menu">
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


