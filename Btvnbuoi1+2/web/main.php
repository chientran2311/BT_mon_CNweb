<?php

$data = [
    ['ID' => 1, 'Name' => 'Chiến', 'Gender' => 'Nam'],
    ['ID' => 2, 'Name' => 'Skibidi', 'Gender' => 'None'],
    ['ID' => 3, 'Name' => 'Mạnh', 'Gender' => 'Nữ']
];


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    // Lấy dữ liệu từ form
    $action = htmlspecialchars($_POST['action']);
    $name = htmlspecialchars($_POST['name']);
    $gender = htmlspecialchars($_POST['gender']);

    if ($action == 'update') {
        $studentId = htmlspecialchars($_POST['studentid']);
        
        // Cập nhật thông tin sinh viên trong mảng
        foreach ($data as &$row) {
            if ($row['ID'] == $studentId) {
                $row['Name'] = $name;
                $row['Gender'] = $gender;
                break;
            }
        }
    } elseif ($action == 'insert') {
        $studentId = htmlspecialchars($_POST['studentid']); // Lấy studentId từ form

        // Kiểm tra xem ID có trùng không
        $idExists = false;
        foreach ($data as $row) {
            if ($row['ID'] == $studentId) {
                $idExists = true;
                break;
            }
        }

        if (!$idExists) {
            // Nếu ID không trùng, thêm sinh viên mới vào mảng
            array_push($data, [
                'ID' => $studentId,
                'Name' => $name,
                'Gender' => $gender]
            );
        } else {
            echo "ID đã tồn tại, vui lòng chọn ID khác.";
        }
    }
}

// Xử lý yêu cầu xóa
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $studentId = htmlspecialchars($_GET['studentid']); // Lấy studentId từ URL
    
    // Tìm và xóa sinh viên khỏi mảng
    foreach ($data as $key => $row) {
        if ($row['ID'] == $studentId) {
            unset($data[$key]); // Xóa sinh viên khỏi mảng
            break;
        }
    }
}

// Bước 2: Hiển thị bảng HTML với Bootstrap
?>
<!doctype html>
<html lang="en">

<head>
    <title>CRUD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<link rel="stylesheet" href="Css/domnet.css">

<body>

    <main>
        <div class="container">
            <div class="card-header bg-dark text-white rounded-3 my-2">
                <h1 class="mx-2">CRUD TABLE</h1>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-hover">
                    <tr>
                        <th>ID Student</th>
                        <th>Name</th>
                        <th>Gender</th>

                        <th>Function</th>
                    </tr>
                    <?php
                    foreach ($data as $row) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['ID']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['Name']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['Gender']) . '</td>';
                        
                        echo '<td>
                                <a href="http://localhost:8080/ONCLASS/web/editWeb.php?studentid=' . htmlspecialchars($row['ID']) . '" class="btn btn-warning">Edit</a>
                                <a href="?action=delete&studentid=' . htmlspecialchars($row['ID']) . '" class="btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn xóa không?\');">Delete</a>
                              </td>';
                        echo '</tr>';
                    }
                    ?>
                </table>

                <a href="http://localhost:8080/ONCLASS/web/insertWeb.php" class="btn btn-primary btn-lg">ADD STUDENT</a>

                <nav aria-label="Page navigation">
                    <ul class="pagination mt-3 justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </main>
    <footer>

    </footer>
    
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd 85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>