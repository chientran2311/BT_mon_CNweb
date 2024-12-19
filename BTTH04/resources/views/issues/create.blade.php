<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-
GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<title>Posts</title>

<style>
    /* Style cho container */
/* Style cho container */
.button-container {
    display: flex;
    justify-content: center; /* Căn giữa ngang */
    align-items: center; /* Căn giữa dọc */
    margin-top: 20px; /* Khoảng cách trên */
}

/* Style cho nút Update */
.btn-update {
    font-size: 16px;
    padding: 10px 20px;
    border-radius: 8px;
    background-color: #153f99; /* Màu xanh đậm */
    color: #ffffff;
    border: 1px solid #153f99;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bóng nhẹ */
}

/* Hover effect */
.btn-update:hover {
    background-color: #ffffff; /* Chuyển sang màu trắng khi hover */
    color: #153f99; /* Chữ đổi sang màu xanh đậm */
    border-color: #ffffff;
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2); /* Tăng bóng */
    transform: translateY(-2px); /* Hiệu ứng nổi */
}

/* Active effect */
.btn-update:active {
    background-color: #242424; /* Màu tối hơn khi nhấn */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Giảm bóng */
    transform: translateY(0); /* Giảm hiệu ứng nổi */
}
</style>
</head>

<body>


    <h1 style="margin: 50px 50px" class="text-center ">Add New Issues </h1>
    <form action="{{ route('issues.store') }}" method="POST" style="margin: 50px 50px">
        @csrf
        <div class="mb-3">
            <label for="computer_id" class="form-label">Computer id</label>
            <select class="form-control" id="computer_id" name="computer_id" required>
                @foreach($issues2 as $issues)
                    <option value="{{ $issues->computer_id }}">{{ $issues->computer->computer_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="reported_by" class="form-label">Reported by</label>
            <input type="text" class="form-control" id="reported_by" name="reported_by" required>
        </div>
        <div class="mb-3">
            <label for="reported_date" class="form-label">Reported date</label>
            <input type="date" class="form-control" id="reported_date" name="reported_date" required>
        </div>
        <div class="mb-3">
            <label for="abstract" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="urgency" class="form-label">Urgency</label>
            <select class="form-control" id="urgency" name="urgency" required>
                <option value="Low">Low</option>
                <option value="Medium" selected>Medium</option>
                <option value="High">High</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Open" selected>Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Resolved">Resolved</option>
            </select>
        </div>

        <button type="submit" class="btn btn-update mt-2">Create <i class="fa-solid fa-plus"></i></button>
    </form>

</body>
