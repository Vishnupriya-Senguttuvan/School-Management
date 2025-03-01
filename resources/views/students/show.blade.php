<!DOCTYPE html>
<html>
<head>
    <title>View Student</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header text-center bg-primary text-white">
            <h2>Student Details</h2>
        </div>
        <div class="card-body">
            <!-- Create a row with columns for details and image -->
            <div class="row">
                <!-- Left Column for Details -->
                <div class="col-md-8">
                    <p><strong>Name:</strong> {{ $student->name }}</p>
                    <p><strong>Email:</strong> {{ $student->email }}</p>
                    <p><strong>Date of Birth:</strong> {{ $student->dob }}</p>
                    <p><strong>Mobile:</strong> {{ $student->mobile }}</p>
                </div>
                <!-- Right Column for Image -->
                <div class="col-md-4 text-center">
                    @if($student->student_image)
                        <img src="{{ asset( $student->student_image) }}" alt="Student Image" class="img-fluid rounded" style="max-height: 250px;">
                    @else
                        <p>No image available</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('student.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
