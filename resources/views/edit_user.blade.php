<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('/users/update/' . $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>First Name:</label><br>
        <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}"><br><br>

        <label>Last Name:</label><br>
        <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}"><br><br>

        <label>Middle Name:</label><br>
        <input type="text" name="middle_name" value="{{ old('middle_name', $user->middle_name) }}"><br><br>

        <label>Nickname:</label><br>
        <input type="text" name="nickname" value="{{ old('nickname', $user->nickname) }}"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email', $user->email) }}"><br><br>

        <label>Age:</label><br>
        <input type="number" name="age" value="{{ old('age', $user->age) }}"><br><br>

        <label>Address:</label><br>
        <textarea name="address">{{ old('address', $user->address) }}</textarea><br><br>

        <label>Contact Number:</label><br>
        <input type="text" name="contact_number" value="{{ old('contact_number', $user->contact_number) }}"><br><br>

        <button type="submit">Update User</button>
    </form>

    <br>
    <a href="{{ url('/users') }}">Back to Users List</a>
</body>
</html>