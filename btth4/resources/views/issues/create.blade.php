<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Posts</title>
</head>

<body>


    <h1 style="margin: 50px 50px">Thêm Đồ án mới</h1>
    <form action="{{ route('issues.store') }}" method="POST" style="margin: 50px 50px">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Tên đồ án</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="computer_id" class="form-label">Máy tính</label>
            <select class="form-control" id="computer_id" name="computer_id" required>
                @foreach($computers as $computer)
                    <option value="{{ $computer->id }}">
                        {{ $computer->processor }} {{ $computer->model }} {{ $computer->memory }}
                        {{ $computer->operating_system }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="reported_by">Người báo cáo sự cố</label>
            <input type="text" name="reported_by" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="reported_date">Ngày báo cáo sự cố</label>
            <input type="date" name="reported_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="mb-3">
            <label for="urgency" class="form-label">Urgency</label>
            <select id="urgency" name="urgency" class="form-control" required>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="Open">Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Resolved">Resolved</option>
                <option value="Closed">Closed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>

</body>