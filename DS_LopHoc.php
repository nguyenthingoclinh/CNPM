<?php
    include 'data.php';
    include 'dau.php';
    $hocphan = "";

    if (isset($_POST['btn'])) {
        $hocphan = $_POST['hocphan'];
    }
?>

<main id="main" class="main">

<div class="pagetitle">
		<h2>Danh sách lớp học</h2>
</div>
<p>
  <a href="ThemLop.php" class="btn btn-success">
    <i class="bi bi-file-earmark-text me-1"></i>Thêm lớp học
  </a>
</p>
<form method="POST">
        <div class="d-flex align-items-center">
            <div class="col-6">
                <h5><label for="hocphan" class="form-label">Chọn học phần</label></h5>
                <div class="d-flex">
                    <select class="form-control" name="hocphan">
                        <option value="">-- Chọn học phần --</option>
                        <?php
                            $sql1 = 'SELECT * FROM MonHoc';
                           
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    $selected = ($row1['IDMonHoc'] == $hocphan) ? "selected" : "";
                                    echo "<option value='{$row1['IDMonHoc']}' $selected>{$row1['TenMonHoc']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có</option>";
                            }
                        ?>
                    </select>
                    <button type="submit" class="btn btn-primary ml-3" name="btn">Lọc</button>
                </div>
            </div>
        </div>
    </form>
    <br>
	<section class="section dashboard">
		<div class="row">
			<div class="col-12">
                
				<div class="card recent-sales overflow-auto">
					<div class="card-body mt-4">
						<table class="table table-borderless datatable">
							<thead>
								<tr>
									<th class="col-1 text-center">#</th>
									<th class="col-3 text-center">Tên lớp</th>
                                    <th class="col-3 text-center">Môn học</th>
                                    <th class="col-2 text-center">Giảng viên</th>
                                    <th class="col-2 text-center">Số lượng</th>
                                    <th class="col-2 text-center">Kỳ</th>
                                    <th class="col-2 text-center">Năm học</th>
                                    <th class="col-2 text-center">Chức năng</th>
								</tr>
							</thead>
							<tbody>
                                <?php $sql = 'SELECT lh.*, MH_GV.IDMH_GV, nd.HoTen, mh.TenMonHoc  FROM LopHoc lh join MH_GV on MH_GV.IDMH_GV = lh.IDMH_GV
                                join NguoiDung nd on nd.IDNDung = MH_GV.IDNDung
                                join MonHoc mh on mh.IDMonHoc = MH_GV.IDMonHoc
                                order by lh.TenLop';
                                 if (!empty($hocphan)) {
                                    $sql .= " WHERE mh.IDMonHoc = '$hocphan'";
                                }
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
                                            
                                        <td class="text-center"><?php echo $row['TenMonHoc']; ?></td>
                                        <td class="text-center"><?php echo $row['HoTen']; ?></td>
                                        <td class="text-center"><?php echo $row['SoLuong']; ?></td>
                                        <td class="text-center"><?php echo $row['Ky']; ?></td>
                                        <td class="text-center"><?php echo $row['NamHoc']; ?></td>
                                            <td class="text-center">
                                            <a href="SuaLop.php?this_id=<?php echo $row['IDLop']; ?>" class="btn btn-primary btn-sm" title="Sửa lớp">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="XoaLop.php?this_id=<?php echo $row['IDLop']; ?>" class="btn btn-danger btn-sm" title="Xóa lớp">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                            <a href="DS_SV_Lop.php?this_id=<?php echo $row['IDLop']; ?>" class="btn btn-success btn-sm" title="Danh sách sinh viên">
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
