<?php
  require("connection.php");
  try {
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM loai_hoa");
    $stmt->execute();
    $loaihoa_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo "error". $e->getMessage() ."";
  }
?>


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
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
    <header>
        <div class="container" id="head">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand" href="#">EMAGAZINE</a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation"></button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" aria-current="page">DR.BLUE <span
                                    class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">House N Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">NỀN TẢNG HẠNH PHÚC</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ẤN PHẨM HOUSE N HOME</a>
                        </li>
                    </ul>
                    <form class="d-flex my-2 my-lg-0">
                        <input class="form-control me-sm-2" type="text" placeholder="Search" />
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                            Search
                        </button>
                    </form>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-1">
                    <a href="../index.php"><img src="../images/—Pngtree—creative company_1420804.png" class="img-fluid rounded-top"
                            alt="" />
                    </a>
                </div>
                <div class="col-2 text-center">
                    <a href="" class="btn btn-light  mt-3 rounded-5">Mua nhà trả góp</a>

                </div>
                <div class="col-2 text-center">
                    <a href="" class="btn btn-light  mt-3 rounded-5">Tiêu dùng thông minh </a>

                </div>
            </div>
            <div class="row">
                <ul class="nav" id="navs">
                    <li class="nav-item">
                        <a class="nav-link  text-light" href="../index.php" aria-current="page"> <i
                                class="fa-solid fa-house"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="insert.php">Hậu trường</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="edit.php">Thế giới quanh ta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="delete.php">Mẹ & Bé</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Mua sắm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Ăn ngon </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Làm đẹp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Yêu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">PR sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Đặt hoa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Tiêu dùng</a>
                    </li>


                </ul>

            </div>
        </div>
    </main>
    </header>
  
    
        <main>

            <div class="container my-5">
                <a href="insert.php" class="btn btn-primary mb-4 my-5">Thêm loài hoa mới</a>
                <div class="table-responsive-lg">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th scope="col">Tên Loài hoa</th>
                                <th scope="col">Thông tin loài hoa</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        foreach ($loaihoa_data as $row) {
                            ?>
                        <tr class="">
                                <td scope="row"><?= $row['id'] ?></td>
                                <td><?= $row['ten_hoa'] ?></td>
                                <td><?= $row['mo_ta'] ?></td>
                                <td><img src="<?= $row['link_anh'] ?>" alt=""></td>
                                <td><a href="edit.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td><a href="delete.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                            
                        <?php 
                        }
                        ?>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

    <footer>
    <main>
        <div class="container my-5">
            <h1 class="text-center">BTTH buổi 1</h1>
            <p class="text-center">Xây dựng trang web hiển thị và dạng crud</p>
        </div>
    </main>


    <footer class="mt-auto text-white text-center ">
       


        <div class="row text-white" id="fut1">
            <div class="col-3"></div>
            <div class="col-6 text-center">
                <h4 class="card-title my-4 text-center">@2024 TRƯỜNG ĐẠI HỌC THỦY LỢI</h4>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="bg">
            <div class="container">
                <ul class="nav justify-content-center fw-bold">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border" href="#">Hậu trường</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border" href="#">Life-Style</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border" href="#">Xã Hội</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border" href="#">Giáo Dục</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border" href="#">Giải trí</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border" href="#">Yêu</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link border" href="#">Tiêu dùng</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link border" href="#">Tâm lý</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link border" href="#">Sức khỏe</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-4 item text-dark">
                    <h4>Trụ sở hà nội</h4>
                    <p><i class="fa-solid fa-location-dot"></i> Tầng 21, Tòa nhà Center Building,
                        Hapulico Complex, Số 1 Nguyễn Huy
                        Tưởng, phường Thanh Xuân Trung, quận Thanh Xuân, Hà Nội. <br>
                        <i class="fa-solid fa-phone"></i>Điện thoại: 024 7309 5555, máy lẻ 62.370 <br>
                        <i class="fa-solid fa-envelope"></i> Email: contact@afamily.vn
                    </p>
                </div>
                <div class="col-4 item text-dark">
                    <h4>Liên hệ quảng cáo</h4>
                    <p><i class="fa-solid fa-location-dot"></i> Tầng 20, Tòa nhà Center Building - Hapulico Complex, Số
                        1 Nguyễn Huy Tưởng, Thanh Xuân, Hà Nội.<br>Chính sách bảo mật <br>
                        Tưởng, phường Thanh Xuân Trung, quận Thanh Xuân, Hà Nội. <br>
                        <i class="fa-solid fa-phone"></i> 02473007108 <br>
                        <i class="fa-solid fa-envelope"></i> Email: giaitrixahoi@admicro.vn
                    </p>
                </div>
                <div class="col-4 text-dark">
                    <h5>© Copyright 2008 - 2024 – Công ty cổ phần VCCorp</h5>
                    <p> Tầng 17, 19, 20, 21 Tòa nhà Center Building -
                        Hapulico Complex, Số 1 Nguyễn Huy Tưởng, Thanh Xuân, Hà Nội. Giấy phép thiết lập trang thông tin
                        điện tử tổng hợp trên mạng số 2217/GP-TTĐT do Sở Thông tin và Truyền thông Hà Nội cấp ngày 10
                        tháng 4 năm 2019
                    </p>
                </div>
            </div>
        </div>
    </footer>
    </footer>
        

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>