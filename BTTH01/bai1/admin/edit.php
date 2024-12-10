<?php
require("connection.php");
$id = $_GET['id'];
$sql = "SELECT ten_hoa, mo_ta,link_anh from loai_hoa where id = '$id'";
$stmt = $conn ->prepare($sql);
$stmt -> execute();
$show = $stmt->fetch(PDO::FETCH_ASSOC);
?>
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>

<body>
    <header>
        <?php include("../header.php"); ?>
    </header>
    <main>
        <div class="container mt-5 mb-3">
            <form  method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="" class="form-label">id</label>
                    <input type="text" class="form-control" name="id" readonly value="<?=$id?>">
                    <label for="" class="form-label">Tên loài hoa</label>
                    <input type="text" class="form-control" name="ten_hoa" id="" value="<?= $show['ten_hoa'] ?>">
                       
                    <label for="" class="form-label">Mô tả</label>
                    <input type="text" class="form-control" name="mo_ta" id="" placeholder="<?= $show['mo_ta'] ?>">
                       
                    <label for="fileToUpload" class="form-label mt-3 mx-3">Chọn file ảnh để upload</label>
                    <input type="file" class="mt-3" name="fileToUpload" id="fileToUpload" required>
                    <br>
                    <button type="submit" class="btn btn-success mt-3">
                        Tải ảnh
                    </button>
                    <a href="index.php" class="btn btn-success mt-3 mx-2">Quay lại</a>
                </div>

            </form>
        </div>
    </main>
    <footer>
        <?php include("../footer.php"); ?>
        
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
require("connection.php");
$target_dir = "../images";
$target_file = $target_dir ."/". basename($_FILES["fileToUpload"]["name"]);
$image_path  ='';
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $image_path = htmlspecialchars($target_file);
} else {
    echo "Xin lỗi, đã có lỗi xảy ra trong quá trình tải tệp tin của bạn.";
}
if(isset($_POST['ten_hoa'])&& isset($_POST['mo_ta'])) {
    $sua_ten_hoa = $_POST['ten_hoa'];
    $sua_mo_ta = $_POST['mo_ta'];
    $sua_link_anh = $image_path;
    $sql = "UPDATE loai_hoa SET 
    ten_hoa = :ten_hoa, mo_ta = :mo_ta, link_anh = :link_anh WHERE id = '$id'";
    $stmt_update = $conn->prepare($sql);
    $stmt_update->bindParam(':ten_hoa', $sua_ten_hoa);
    $stmt_update->bindParam(':mo_ta', $sua_mo_ta);
    $stmt_update->bindParam(':link_anh', $sua_link_anh);
    $stmt_update->execute();
    header('location: index.php');
}
?>