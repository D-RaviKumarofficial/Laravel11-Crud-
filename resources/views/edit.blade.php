<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>
    <h1>Edit Data</h1>
    <form action="{{ route('update', $Data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $Data->name }}" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $Data->email }}" required>
        <br>
        <label>Date of Birth:</label>
        <input type="date" name="dob" value="{{ $Data->dob }}" required>
        <br>
        <label>Year:</label>
        <input type="number" name="year" value="{{ $Data->year }}" required>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
