<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

    <div class="container mt-5">
        <h1 class="text-center mb-4">Add Student</h1>
        <div class="card shadow">
            <div class="card-body">
             <form action="{{ route('student.store') }}" enctype="multipart/form-data" method="POST" class="form">
                {{ csrf_field() }}
                    <!-- Name Field -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            value="{{ old('email', $student->email ?? '') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- DOB Field -->
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input 
                            type="date" 
                            name="dob" 
                            class="form-control @error('dob') is-invalid @enderror" 
                            value="{{ old('dob', $student->dob ?? '') }}">
                        @error('dob')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Mobile Field -->
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input 
                            type="text" 
                            name="mobile" 
                            class="form-control @error('mobile') is-invalid @enderror" 
                            value="{{ old('mobile', $student->mobile ?? '') }}">
                        @error('mobile')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Student Image</label>
                        <input type="file" name="student_image" class="form-control">
                        @error('img')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">Save</button>
     

                </form>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS (Optional, for dynamic components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
