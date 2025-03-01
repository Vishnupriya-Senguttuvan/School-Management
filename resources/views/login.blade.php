<!DOCTYPE html>
<html>
<head>
    <title>Role-Based Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Login</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <!-- Email Input -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <!-- Password Input -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <!-- Role Dropdown -->
                <div class="mb-3">
                    <label for="role" class="form-label">Select Role</label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="" disabled selected>Select your role</option>
                        <option value="admin">Admin</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
