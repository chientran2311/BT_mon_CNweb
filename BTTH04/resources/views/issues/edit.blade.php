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

.button-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}
.btn-update {
    font-size: 16px;
    padding: 10px 20px;
    border-radius: 8px;
    background-color: #153f99;
    color: #ffffff;
    border: 1px solid #153f99;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}


.btn-update:hover {
    background-color: #ffffff;
    color: #153f99;
    border-color: #ffffff;
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
    transform: translateY(-2px);
}

.btn-update:active {
    background-color: #242424;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    transform: translateY(0);
}


</style>
</head>
<body>

<h1 style="margin: 50px 50px" class="text-center ">Update your issues</h1>

<form action="{{ route('issues.update', $issues1->id) }}" method="POST" style="margin: 50px 50px">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="computer_id">Computer name</label>
        <select name="computer_id" class="form-control" required>
            @foreach($computers as $computer)
            <option value="{{ $computer->id }}" {{ $computer->id == $issues1->computer_id ? 'selected' : '' }}>
                {{ $computer->computer_name }}
            </option>
            @endforeach  
        </select>
    </div>

    <div class="form-group">
        <label for="reported_by">Reported by</label>
        <input type="text" name="reported_by" class="form-control"
               value="{{ $issues1->reported_by }}" required>
    </div>

    <div class="mb-3">
        <label for="reported_date" class="form-label">Ngày báo cáo</label>
        <input type="date" class="form-control" id="reported_date" name="reported_date"
               value="{{ $issues1->reported_date }}" required>
    </div>


    <div class="mb-3">
        <label for="description" class="form-label">Mô tả</label>
        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $issues1->description }}</textarea>
    </div>


    <div class="mb-3">
        <label for="urgency" class="form-label">Mức độ khẩn cấp</label>
        <select class="form-control" id="urgency" name="urgency" required>
            <option value="Low" {{ $issues1->urgency == 'Low' ? 'selected' : '' }}>Low</option>
            <option value="Medium" {{ $issues1->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
            <option value="High" {{ $issues1->urgency == 'High' ? 'selected' : '' }}>High</option>
        </select>
    </div>


    <div class="mb-3">
        <label for="status" class="form-label">Trạng thái</label>
        <select class="form-control" id="status" name="status" required>
            <option value="Open" {{ $issues1->status == 'Open' ? 'selected' : '' }}>Open</option>
            <option value="In Progress" {{ $issues1->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
            <option value="Resolved" {{ $issues1->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
        </select>
    </div>

    <button type="submit" class="btn btn-update mt-2">Update <i class="fa-solid fa-arrow-up"></i></button>
</form>



</body>
