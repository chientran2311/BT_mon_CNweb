<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <?php include '../header.php' ?>
    </header>
    <main>
        <div class="container mt-5 mb-3">
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="" class="form-label">Tên loài hoa</label>
                    <input type="text" class="form-control" name="ten_hoa" id="" aria-describedby="helpId"
                        placeholder="Nhập tên loài hoa" />
                    <label for="" class="form-label">Mô tả</label>
                    <input type="text" class="form-control" name="mo_ta" id="" aria-describedby="helpId"
                        placeholder="Nhập mô tả (150 ký tự)" />
                    <label for="fileToUpload" class="form-label mt-3 mx-3">Chọn file ảnh để upload</label>
                    <input type="file" class="mt-3" name="fileToUpload" id="fileToUpload" required>
                    <br>
                    <button type="submit" class="btn btn-success mt-3">
                        Tải ảnh
                    </button>
                    <a href="index.php" class="btn btn-success mt-3 mx-2">
                        Quay lại
                    </a>
                </div>

            </form>
        </div>
    </main>
    <footer>
        <?php include '../footer.php' ?>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
<?php 
require 'connection.php';
$ten_loai_hoa = trim($_POST['ten_hoa']);
$mo_ta = trim($_POST['mo_ta']);

// xử lý ảnh để lấy ra đường dẫn
$target_dir = "../images";
$target_file = $target_dir ."/". basename($_FILES["fileToUpload"]["name"]);
$image_path  ='';
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $image_path = htmlspecialchars($target_file);
} else {
    echo "Xin lỗi, đã có lỗi xảy ra trong quá trình tải tệp tin của bạn.";
}
$sql =  "INSERT INTO loai_hoa (ten_hoa,mo_ta,link_anh) values (:ten_loai_hoa,:mo_ta,:image_path)";
$stmt = $conn->prepare($sql);
$stmt->bindparam(":ten_loai_hoa", $ten_loai_hoa);
$stmt ->bindParam(":mo_ta", $mo_ta);
$stmt ->bindParam(":image_path", $image_path);
$stmt -> execute();
header("location: index.php");

?>