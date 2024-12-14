<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Post Layout</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Facebook Clone</a>
            <a class="btn btn-light" href="{{ route('posts.create') }}">Tạo Post Mới</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <!-- Example Post 1 -->
      @foreach ($posts as $posts)
      <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $posts->title }}</h5>
            <p class="card-text">{{ $posts->content }}</p>
            <p class="text-muted mb-1"><small>Được tạo vào: {{ $posts->created_at }}</small></p>
            <p class="text-muted mb-3"><small>Cập nhật lần cuối: {{ $posts->updated_at }}</small></p>
            <div class="d-flex justify-content-end">
                <a href="{{ route('posts.edit', $posts->id) }}" class="btn btn btn-warning me-2">Sửa</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $posts->id }}">
                    Xóa
                </button>
                <div class="modal fade" id="deleteModal{{ $posts->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $posts->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $posts->id }}">Xác nhận xóa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bạn có chắc chắn muốn xóa post này không?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <form action="{{ route('posts.destroy', $posts->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      @endforeach



    <!-- Bootstrap 5 JS (Bundle includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
