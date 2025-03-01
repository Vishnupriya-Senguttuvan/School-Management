<!DOCTYPE html>
<html>
<head>
    <title>Admin Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
            <h2>Admin Details</h2>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $admin->name }}</p>
            <p><strong>Email:</strong> {{ $admin->email }}</p>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
