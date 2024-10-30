<?php
    include 'data.php';
    include 'dau.php';
?>

<main id="main" class="main">

<div class="pagetitle">
		<h2>Danh sách Câu hỏi</h2>
</div>
<p>
  <a href="ThemCH.php" class="btn btn-success">
    <i class="bi bi-file-earmark-text me-1"></i>Thêm câu hỏi
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
									<th class="col-3 text-center">Đề</th>
                                    <th class="col-2 text-center">Môn học</th>
									<th class="col-1 text-center">Đáp án A</th>
									<th class="col-1 text-center">Đáp án B</th>
									<th class="col-1 text-center">Đáp án C</th>
									<th class="col-1 text-center">Đáp án D</th>
                                    <th class="col-1 text-center">Đáp án đúng</th>
                                    <th class="col-2 text-center">Chức năng</th>
								</tr>
							</thead>
							<tbody>
                                <?php $sql = 'SELECT * FROM CauHoi ch join MH_GV on MH_GV.IDMH_GV = ch.IDMH_GV 
                                join MonHoc mh on mh.IDMonHoc = MH_GV.IDMonHoc';
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                    <th class="text-center" scope="row"><?php echo $row['IDCauHoi']; ?></th>
                                        <td>
                                        <a href="<?php echo $row['IDCauHoi']; ?>" class="text-primary">
                                            <?php echo $row['TenDe']; ?>
                                        </a>
                                        </td>
                                        <td class="text-center"><?php echo $row['TenMonHoc']; ?></td>
                                        <td class="text-center"><?php echo $row['DA1']; ?></td>
                                        <td class="text-center"><?php echo $row['DA2']; ?></td>
                                        <td class="text-center"><?php echo $row['DA3']; ?></td>
                                        <td class="text-center"><?php echo $row['DA4'] ; ?></td>
                                        <td class="text-center"><?php echo $row['DADung'] ; ?></td>
                                        <td class="text-center">
                                        <a href="SuaCH.php?this_id=<?php echo $row['IDCauHoi']; ?>" class="btn btn-primary btn-sm" title="Sửa menu">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="XoaCH.php?this_id=<?php echo $row['IDCauHoi']; ?>" class="btn btn-danger btn-sm" title="Xóa menu">
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
  </main><!-- End #main -->

  <?php
  include 'cuoi.php';
  ?>
