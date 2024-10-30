<?php
include "data.php";
$this_id = $_GET['this_id'];
$socau = $_GET['socau'];

session_start(); 
if (!isset($_SESSION['randomQuestions'])) {
    $sql = "SELECT * FROM BaiThi bt 
            JOIN CauHoi ch ON ch.IDMH_GV = bt.IDMH_GV
            JOIN MH_GV mhgv ON ch.IDMH_GV = mhgv.IDMH_GV
            JOIN MonHoc mh ON mh.IDMonHoc = mhgv.IDMonHoc
            WHERE bt.IDBaiThi = '$this_id' 
            ORDER BY RAND() 
            LIMIT $socau";

    $result = mysqli_query($conn, $sql);
    
    if (!$result) {
        die("Lỗi truy vấn: " . mysqli_error($conn));
    }

    $_SESSION['randomQuestions'] = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['randomQuestions'][] = $row; 
        }
    } else {
        echo "Không có câu hỏi nào được tìm thấy!";
    }
}

if (isset($_POST['btnSubmit'])) {
    $cauhoi = $_POST['cauhoi'];
    $sql1 = "INSERT INTO CH_BT (IDBaiThi, IDCauHoi) VALUES ('$this_id', '$cauhoi')";
    mysqli_query($conn, $sql1);
    
    if (!isset($_SESSION['submittedQuestions'])) {
        $_SESSION['submittedQuestions'] = [];
    }
    $_SESSION['submittedQuestions'][] = $cauhoi;
}

if (isset($_POST['btnq'])) {
    unset($_SESSION['randomQuestions']);
    unset($_SESSION['submittedQuestions']);
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
                        <h5 class="card-title">Danh sách câu hỏi</h5>  
                        <form method="POST">
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
                                        <?php
                                        if (isset($_SESSION['randomQuestions'])) {
                                            foreach ($_SESSION['randomQuestions'] as $row) {
                                                
                                                $submitted = isset($_SESSION['submittedQuestions']) && in_array($row['IDCauHoi'], $_SESSION['submittedQuestions']);
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
                                                    <td class="text-center"><?php echo $row['DA4']; ?></td>
                                                    <td class="text-center"><?php echo $row['DADung']; ?></td>
                                                    <td class="text-center">
                                                        <form method="POST">
                                                            <input type="hidden" name="cauhoi" value="<?php echo $row['IDCauHoi']; ?>">
                                                            <button type="submit" class="btn <?php echo $submitted ? 'btn-success' : 'btn-primary'; ?>" 
                                                                    name="btnSubmit" <?php echo $submitted ? 'disabled' : ''; ?>>
                                                                <?php echo $submitted ? 'Đã thêm' : 'Submit'; ?>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='9' class='text-center'>Không có câu hỏi nào được hiển thị!</td></tr>";
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
