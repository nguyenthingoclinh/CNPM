<?php
include "data.php";
$this_id = $_GET['this_id'];

if (isset($_POST['btnq'])) {
    header('Location: DS_BaiThi.php');
}

include 'dau1.php';
?>

<main class="main d-flex justify-content-center align-items-center" style="width: 100%;">
    <section class="section" style="width: 100%; max-width: 1400px;">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách</h5>  
                        <form method="POST">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body mt-4">
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th class="col-1 text-center">#</th>
                                                <th class="col-2 text-center">Tên bài thi</th>
                                                <th class="col-2 text-center">Môn học</th>
                                                <th class="col-2 text-center">Đề</th>
                                                <th class="col-1 text-center">Đáp án A</th>
                                                <th class="col-1 text-center">Đáp án B</th>
                                                <th class="col-1 text-center">Đáp án C</th>
                                                <th class="col-1 text-center">Đáp án D</th>
                                                <th class="col-3 text-center">Đáp án đúng</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sql = 'SELECT * FROM CH_BT chbt join BaiThi bt on bt.IDBaiThi = chbt.IDBaiThi
                                            join CauHoi ch on ch.IDCauHoi = chbt.IDCauHoi
                                            join MonHoc mh on mh.IDMonHoc = ch.IDMonHoc
                                            where bt.IDBaiThi = '.$this_id;
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <tr>
                                                    <th class="text-center" scope="row"><?php echo $row['IDBaiThi']; ?></th>
                                                    <td>
                                                        <a href="<?php echo $row['IDBaiThi']; ?>" class="text-primary">
                                                            <?php echo $row['TenBaiThi']; ?>
                                                        </a>
                                                    </td>
                                                    <td class="text-center"><?php echo $row['TenMonHoc']; ?></td>
                                                    <td class="text-center"><?php echo $row['TenDe']; ?></td>
                                                    <td class="text-center"><?php echo $row['DA1']; ?></td>
                                                    <td class="text-center"><?php echo $row['DA2']; ?></td>
                                                    <td class="text-center"><?php echo $row['DA3']; ?></td>
                                                    <td class="text-center"><?php echo $row['DA4'] ; ?></td>
                                                    <td class="text-center"><?php echo $row['DADung'] ; ?></td>
                                                    
                                                </tr>
                                                <?php
                                                }               
                                            }
                                            ?>            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-secondary" name="btnq">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
