<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
</head>
<body>
<form method="POST" action="{{ route('login') }}">
    @csrf
    @if (session('error'))
    <span class = "help-block">{{ session('error') }}</span><br>
    @endif
    <h1>User</h1>
    <input type="text" name="username" placeholder="Nhập username">
    <input type="password" name="password" placeholder="Nhập mật khẩu">
    <button type="submit">Đăng nhập</button>
</form>
</body>
</html>