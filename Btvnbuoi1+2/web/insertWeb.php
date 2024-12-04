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
    <link rel="stylesheet" href="../Css/domnet.css">
</head>

<body>
    <header>
        <?php
          include("../web/header.php");
          ?>

    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="mb-3 mt-5">
                        <form action="index.php" method="post">
                        <input type="hidden" name="action" value="insert" />
                        <div class="mb-3">
                            <label for="" class="form-label">Student ID</label>
                            <input type="text" class="form-control" name="studentid" id="" aria-describedby="helpId"
                                placeholder="" />

                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                                placeholder="" />

                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Gender</label>
                            <input type="text" class="form-control" name="gender" id="" aria-describedby="helpId"
                                placeholder="" />

                        </div>
                        <button type="submit" class="btn btn-primary">
                            Add
                        </button>
                        </form>
                    </div>

                </div>
                <div class="col-4"></div>
            </div>
        </div>

    </main>
    <footer>
        <?php
            include("../web/footer.php");
            ?>
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