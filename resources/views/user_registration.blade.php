<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h1>User Registration Form</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('/users/store') }}" method="POST">
        @csrf

        <label>First Name:</label><br>
        <input type="text" name="first_name" value="{{ old('first_name') }}"><br><br>

        <label>Last Name:</label><br>
        <input type="text" name="last_name" value="{{ old('last_name') }}"><br><br>

        <label>Middle Name:</label><br>
        <input type="text" name="middle_name" value="{{ old('middle_name') }}"><br><br>

        <label>Nickname:</label><br>
        <input type="text" name="nickname" value="{{ old('nickname') }}"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <label>Age:</label><br>
        <input type="number" name="age" value="{{ old('age') }}"><br><br>

        <label>Address:</label><br>
        <textarea name="address">{{ old('address') }}</textarea><br><br>

        <label>Contact Number:</label><br>
        <input type="text" name="contact_number" value="{{ old('contact_number') }}"><br><br>

        <button type="submit">Register User</button>
    </form>

    <br>
    <a href="{{ url('/users') }}">View All Users</a>
</body>
</html>