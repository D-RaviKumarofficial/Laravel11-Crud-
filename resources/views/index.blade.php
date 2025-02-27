<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center mb-4">Data List</h1>
    
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('create') }}" class="btn btn-primary">Add New Data</a>
    </div>
    
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Datas as $Data)
                <tr>
                    <td>{{ $Data->id }}</td>
                    <td>{{ $Data->name }}</td>
                    <td>{{ $Data->email }}</td>
                    <td>{{ $Data->dob }}</td>
                    <td>{{ $Data->year }}</td>
                    <td>
                        <!-- <a href="{{ route('show', $Data->id) }}" class="btn btn-info btn-sm">View</a> -->
                        <a href="{{ route('edit', $Data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('destroy', $Data->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    // SweetAlert for Success Message
    @if (session('success'))
    Swal.fire({
        title: 'Success!',
        text: "{{ session('success') }}",
        icon: 'success',
        confirmButtonText: 'OK'
    });
    @endif

    // SweetAlert for Delete Confirmation
    function confirmDelete(event) {
        event.preventDefault(); // Prevent form submission
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit(); // Submit the form
            }
        });
    }
</script>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
