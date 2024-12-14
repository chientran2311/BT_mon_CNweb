<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Post Form</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Facebook Clone</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <!-- Create Post Section -->
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h5 class="m-0">Tạo Post Mới</h5>
            </div>
            <div class="card-body">
                <!-- Form for Creating Post -->
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="postTitle" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="postTitle" name="title" placeholder="Nhập tiêu đề bài viết">
                    </div>

                    <!-- Content Field -->
                    <div class="mb-3">
                        <label for="postContent" class="form-label">Nội dung</label>
                        <textarea class="form-control" id="postContent" name="content" rows="4" placeholder="Hãy viết gì đó..."></textarea>
                    </div>

                    <!-- Created At Field -->
                    <div class="mb-3">
                        <label for="createdAt" class="form-label">Ngày tạo</label>
                        <input type="datetime-local" class="form-control" id="createdAt" name="created_at">
                    </div>

                    <!-- Updated At Field -->
                    <div class="mb-3">
                        <label for="updatedAt" class="form-label">Ngày cập nhật</label>
                        <input type="datetime-local" class="form-control" id="updatedAt" name="updated_at">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">Đăng Bài</button>
                </form>
            </div>
        </div>



    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
