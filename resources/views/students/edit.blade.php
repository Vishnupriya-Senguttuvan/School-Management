<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Student</h1>
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Left Side: Form Fields -->
                        <div class="col-md-8">
                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    id="name" 
                                    name="name" 
                                    value="{{ old('name', $student->name) }}" 
                                    required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input 
                                    type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    id="email" 
                                    name="email" 
                                    value="{{ old('email', $student->email) }}" 
                                    required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- DOB Field -->
                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input 
                                    type="date" 
                                    class="form-control @error('dob') is-invalid @enderror" 
                                    id="dob" 
                                    name="dob" 
                                    value="{{ old('dob', $student->dob) }}" 
                                    required>
                                @error('dob')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Mobile Field -->
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('mobile') is-invalid @enderror" 
                                    id="mobile" 
                                    name="mobile" 
                                    value="{{ old('mobile', $student->mobile) }}" 
                                    required>
                                @error('mobile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Image Upload Field -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload New Image</label>
                                <input 
                                    type="file" 
                                    class="form-control @error('image') is-invalid @enderror" 
                                    id="image" 
                                    name="image" 
                                    accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- Right Side: Current Image Display -->
                        <div class="col-md-4 text-center">
                            <label for="currentImage" class="form-label">Current Image</label>
                            <div class="border rounded p-3">
                                <img 
                                    src="{{ $student->student_image ? asset($student->student_image) : 'https://via.placeholder.com/150' }}" 
                                    alt="Current Image" 
                                    id="currentImage" 
                                    class="img-fluid rounded-circle" 
                                    style="max-height: 150px;">
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('student.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Live preview of uploaded image
        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('currentImage').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
