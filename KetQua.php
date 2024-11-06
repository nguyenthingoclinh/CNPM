<?php
  include "data.php";
  include "dau.php";
  $baithi = "";
    if (isset($_POST['btn'])) {
        $baithi = $_POST['baithi'];
    }
?>
<main id="main" class="main">

    <div class="pagetitle">
            <h2>Danh sách Kết quả</h2>
    </div>
    <form method="POST">
        <div class="d-flex align-items-center">
            <div class="col-6">
                <label for="baithi" class="form-label">Chọn bài thi</label>
                <div class="d-flex">
                    <select class="form-control" name="baithi">
                        <option value="">-- Chọn bài thi --</option>
                        <?php
                            $sql1 = 'SELECT * FROM BaiThi';
                            
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    $selected = ($row1['IDBaiThi'] == $baithi) ? "selected" : "";
                                    echo "<option value='{$row1['IDBaiThi']}' $selected>{$row1['TenBaiThi']}</option>";
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
                                <th class="col-3 text-center">Tên môn</th>
                                <th class="col-3 text-center">Tên bài thi</th>
                                <th class="col-1 text-center">Mã sinh viên</th>
                                <th class="col-2 text-center">Họ tên</th>
                                <th class="col-1 text-center">Điểm</th>
                                <th class="col-1 text-center">Ngày thi</th>
                            </tr>
							</thead>
							<tbody>
                                <?php $sql = "Select * from KetQua kq join BaiThi bt on bt.IDBaiThi = kq.IDBaiThi 
                                join MH_GV mhgv on mhgv.IDMH_GV = bt.IDMH_GV 
                                join MonHoc mh on mh.IDMonHoc = mhgv.IDMonHoc 
                                join NguoiDung nd on nd.IDNDung = kq.IDNDung 
                                ";
                                if (!empty($baithi)) {
                                    $sql .= " WHERE bt.IDBaiThi = '$baithi'";
                                }
                                $sql.= " order by bt.TenBaiThi";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <th class="text-center" scope="row"><?php echo $row['IDKetQua']; ?></th>
                                        <td>
                                            <a href="<?php echo $row['IDKetQua']; ?>" class="text-primary">
                                                <?php echo $row['TenMonHoc']; ?>
                                            </a>
                                        </td>
                                        <td class="text-center"><?php echo $row['TenBaiThi']; ?></td>
                                        <td class="text-center"><?php echo $row['IDNDung']; ?></td>
                                        <td class="text-center"><?php echo $row['HoTen']; ?></td>
                                        <td class="text-center"><?php echo $row['Diem']; ?></td>
                                        <td class="text-center"><?php echo date('Y-m-d', strtotime($row['TGNop'])); ?></td>
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
    include "cuoi.php";
?>