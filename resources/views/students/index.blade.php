<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- font awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">STUDENT LIST</h1>
        <!-- Add Student Button -->
        <div class="mb-3 text-end">
            <a href="{{ route('student.create') }}" class="btn btn-success">Add Student</a>
        </div>
        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Students Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Mobile</th>
                        <th>Student Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->dob }}</td>
                            <td>{{ $student->mobile }}</td>
                            <td>{{$student->image}}Image file</td>
                            <td>
                                <a href="{{ route('student.show', $student->id) }}" class="btn btn-info btn-sm" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- <form action="{{ route('student.destroy', $student->id) }}" method="POST" class="d-inline"> --}}
                                    {{-- @csrf  --}}
                                    {{-- @method('DELETE') --}}
                                    {{-- <button type="submit" class="btn btn-danger btn-sm">Delete</button> --}}
                                {{-- </form> --}}

                                <form action="{{ route('student.destroy', $student->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this student?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this student?')) {
                window.location.href ="{{ url('/students') }}/" + id + "/delete";
            }
        }
    </script>
    <!-- Include Bootstrap JS (Optional, for dynamic components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
