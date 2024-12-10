<?php
require 'connection.php';
session_start();

function remove_bom($str) {
    if (substr($str, 0, 3) === "\xEF\xBB\xBF") {
        $str = substr($str, 3); 
    }
    return $str;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["csv_file"])) {
    $file = $_FILES["csv_file"]["tmp_name"];
    if (($handle = fopen($file, "r")) !== FALSE) {
        $conn->exec("DELETE FROM csv");  // Xóa dữ liệu cũ trong bảng CSV (nếu cần)

        $headers = fgetcsv($handle, 1000, ",");  // Đọc dòng tiêu đề
        $headers = array_map('remove_bom', $headers);

        // Đảm bảo rằng CSV có đúng số cột cần thiết
        if (count($headers) < 7) {
            echo "<div class='alert alert-danger'>Dữ liệu trong CSV không đủ cột. Vui lòng kiểm tra lại.</div>";
            fclose($handle);
            exit();
        }

        // Chuẩn bị câu lệnh SQL
        $sql = "INSERT INTO csv (username, password, lastname, firstname, city, email, course) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            
            if (count($data) == count($headers)) {
                
                if (!empty($data[0])) {
                    
                    $stmt->execute([
                        $data[0], 
                        $data[1],
                        $data[2], 
                        $data[3], 
                        $data[4], 
                        $data[5], 
                        $data[6] 
                    ]);
                } else {
                    
                    echo "<div class='alert alert-warning'>Dòng dữ liệu có 'username' trống, bỏ qua dòng này.</div>";
                }
            } else {
                
                echo "<div class='alert alert-warning'>Số cột trong dòng dữ liệu không khớp với tiêu đề, bỏ qua dòng này.</div>";
            }
        }

        fclose($handle);
        $_SESSION['uploaded'] = true;
        header("Location: " . $_SERVER['PHP_SELF']);  
        exit();
    } else {
        $message = "Không thể mở file. Vui lòng thử lại.";
    }
} elseif (isset($_SESSION['uploaded']) && $_SESSION['uploaded']) {
    $message = "Dữ liệu đã được tải lên và lưu vào CSDL thành công!";
    unset($_SESSION['uploaded']);
}

$stmt = $conn->prepare("SELECT * FROM csv");
$sinhvien = $stmt->fetchAll();
?>
<?php
  require("connection.php");
  try {
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM csv");
    $stmt->execute();
    $sinhvien = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo "error". $e->getMessage() ."";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<header>
    <?php include("header.php"); ?>
</header>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách sinh viên</h1>

        <form method="post" enctype="multipart/form-data" class="mb-4">
            <div class="mb-3">
                <label for="csv_file" class="form-label">Chọn file CSV</label>
                <input type="file" name="csv_file" id="csv_file" class="form-control" accept=".csv" required>
            </div>
            <button type="submit" class="btn btn-primary">Tải lên</button>
        </form>

        <?php if (isset($message)): ?>
            <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        
        <h2 class="text-center mt-5">Dữ liệu vừa được tải lên</h2>
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 1;
                foreach ($sinhvien as $sv): ?>
                    <tr>
                        <td><?= $stt++; ?></td>
                        <td><?= htmlspecialchars($sv['username']) ?></td>
                        <td><?= htmlspecialchars($sv['password']) ?></td>
                        <td><?= htmlspecialchars($sv['lastname']) ?></td>
                        <td><?= htmlspecialchars($sv['firstname']) ?></td>
                        <td><?= htmlspecialchars($sv['city']) ?></td>
                        <td><?= htmlspecialchars($sv['email']) ?></td>
                        <td><?= htmlspecialchars($sv['course']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
       
            <p class="text-center">Chưa có dữ liệu để hiển thị. Vui lòng tải lên file CSV.</p>
       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer>
<?php include("footer.php"); ?>
</footer>
</html>
