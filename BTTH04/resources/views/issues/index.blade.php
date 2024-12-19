<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application Using PHP OOPS PDO MySQL & FETCH API of ES6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            margin-top: 20px;
            background: #f8f8f8
        }

.btn-edit, .btn-delete {
    display: inline-block;
    font-size: 14px;
    padding: 8px 12px;
    border-radius: 5px;
    text-decoration: none;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
}


.btn-edit {
    background-color: #153f99;
    color: white;
    border: 1px solid #153f99;
}

.btn-edit:hover {
    background-color:white; /* Màu tím đậm */
    color: #153f99;
    border-color: white;
}

/* Nút Delete */
.btn-delete {
    background-color: #ff4d4f; /* Màu đỏ nhạt */
    color: white;
    border: 1px solid #ff4d4f;
}

.btn-delete:hover {
    background-color: #f3b5b5; /* Màu đỏ đậm */
    border-color: #ecb4b4;
}

/* Thêm hiệu ứng khi nhấn */
.btn-edit:active, .btn-delete:active {
    transform: scale(0.95);
}
 .font-bold{
    font-weight: bold;
 }
    </style>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
                <div class="card p-3">
                    <div class="e-navlist e-navlist--active-bg">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link px-2 active" href="#"><i
                                        class="fa fa-fw fa-bar-chart mr-1"></i><span>Overview</span></a></li>
                            <li class="nav-item"><a class="nav-link px-2"
                                    href="https://www.bootdey.com/snippets/view/bs4-crud-users" target="__blank"><i
                                        class="fa fa-fw fa-th mr-1"></i><span>CRUD</span></a></li>
                            <li class="nav-item"><a class="nav-link px-2"
                                    href="https://www.bootdey.com/snippets/view/bs4-edit-profile-page"
                                    target="__blank"><i class="fa fa-fw fa-cog mr-1"></i><span>Settings</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="e-tabs mb-3 px-3">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#">Issues</a></li>
                    </ul>
                </div>

                <div class="row flex-lg-nowrap">
                    <div class="col mb-3">
                        <div class="e-panel card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h6 class="mr-2"><span>Issues</span><small class="px-1">from computers</small>
                                        @if (session('success'))
                                            <div class="alert alert-success my-3">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                    </h6>
                                </div>
                                <div class="e-table">
                                    <div class="table-responsive table-lg mt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>

                                                    <th>ID issues</th>
                                                    <th class="max-width">computer_name </th>
                                                    <th class="sortable">reported_by</th>
                                                    <th>reported_date</th>
                                                    <th>description</th>
                                                    <th>urgency</th>
                                                    <th>status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($issues1 as $issues)
                                                    <tr>
                                                        <td class="text-nowrap align-middle">{{ $issues->id }}</td>
                                                        <td class="text-nowrap align-middle">{{ $issues->computer->computer_name }}</td>
                                                        <td class="text-nowrap align-middle">{{ $issues->reported_by }}
                                                        </td>
                                                        <td class="text-nowrap align-middle">
                                                            {{ $issues->reported_date }}</td>
                                                        <td class="text-nowrap align-middle">
                                                            {{ Str::limit($issues->description, 20, '...') }}</td>
                                                        <td class="text-wrap align-middle">{{ $issues->urgency }}</td>
                                                        <td class="text-nowrap align-middle">{{ $issues->status }}</td>

                                                        <td class="text-center align-middle">
                                                            <div class="btn-group align-top">
                                                                <a href="{{ route('issues.edit', $issues->id) }}"
                                                                   class="btn btn-edit">Edit</a>
                                                                <button class="btn btn-delete"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteModal{{ $issues->id }}"
                                                                        type="button">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </td>

                                                            <!-- Modal xác nhận xóa -->
                                                            <div class="modal fade" id="deleteModal{{ $issues->id }}"
                                                                tabindex="-1"
                                                                aria-labelledby="deleteModalLabel{{ $issues->id }}"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="deleteModalLabel{{ $issues->id }}">
                                                                                <i class="fa-solid fa-bell"></i> Alert</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <span class="font-bold ">Are you sure you want to delete this record ?</span>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cancel</button>
                                                                            <form
                                                                                action="{{ route('issues.destroy', $issues->id) }}"
                                                                                method="POST" style="display:inline;">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                    class="btn btn-danger">Yes</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="d-flex justify-content-center">
                                        {{ $issues1->links('pagination::bootstrap-4') }}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center px-xl-3">
                                    <a href="{{ route('issues.create') }}" class="btn btn-success btn-block"
                                        type="button">New Issues <i class="fa-solid fa-box-tissue"></i></a>
                                </div>
                                <hr class="my-3">
                                <div class="e-navlist e-navlist--active-bold">
                                    <ul class="nav">
                                        <li class="nav-item active"><a href=""
                                                class="nav-link"><span>Issues total:</span>&nbsp;<small>/&nbsp;{{ $recordCount }}</small></a>
                                        </li>
                                        <li class="nav-item"><a href=""
                                                class="nav-link"><span>High urgency:</span>&nbsp;<small>/&nbsp;{{ $HighCount}}</small></a>
                                        </li>
                                        <li class="nav-item"><a href=""
                                            class="nav-link"><span>Medium urgency:</span>&nbsp;<small>/&nbsp;{{ $MediumCount }}</small></a>
                                    </li>
                                    <li class="nav-item"><a href=""
                                        class="nav-link"><span>Low urgency:</span>&nbsp;<small>/&nbsp;{{ $LowCount }}</small></a>
                                </li>
                                    </ul>
                                </div>
                                <hr class="my-3">
                                <div>
                                    <div class="form-group">
                                        <label>Date from - to:</label>
                                        <div>
                                            <input id="dates-range" class="form-control flatpickr-input"
                                                placeholder="23 NOV 24 - 19 DEC 24" type="text"
                                                readonly="readonly">
                                        </div>
                                    </div>

                                </div>
                                <hr class="my-3">
                                <div class="">
                                    <label>Status:</label>
                                    <div class="px-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="user-status"
                                                id="users-status-disabled">
                                            <label class="custom-control-label"
                                                for="users-status-disabled">Disabled</label>
                                        </div>
                                    </div>
                                    <div class="px-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="user-status"
                                                id="users-status-active">
                                            <label class="custom-control-label"
                                                for="users-status-active">Active</label>
                                        </div>
                                    </div>
                                    <div class="px-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="user-status"
                                                id="users-status-any" checked="">
                                            <label class="custom-control-label" for="users-status-any">Any</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</body>

</html>
