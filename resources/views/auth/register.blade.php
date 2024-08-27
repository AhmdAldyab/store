<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register in </title>
    <link rel="stylesheet" href="{{ asset('asset/css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <h2>register in</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form  action="{{ route('user.store') }}"  method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name :</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="Rpassword">Repeat Password :</label>
                <input type="password" id="Rpassword" name="password_confirmation" required>
            </div>
            <button type="submit">register</button>
        </form>
    </div>
</body>
</html>
