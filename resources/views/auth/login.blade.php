<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in </title>
    <link rel="stylesheet" href="{{ asset('asset/css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <h2>log in</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form  action="{{ route('login') }}"  method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" value="{{old('email')}}" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password :</label>
                <input type="password" id="password" value="{{__('Password')}}" name="password" required>
            </div>
            <div>
                <button type="submit">log in</button>
            </div>

        </form>
        <div class="register">
            <button><a href="{{ route('user.regster') }}">register</a></button>
        </div>

    </div>

</body>
</html>
