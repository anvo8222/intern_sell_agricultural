<html>

<head>
    <title>Nông Trại Organic(Đăng ký)</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/auth.css') }}">
</head>

<body>
    <form action="{{ route('user-register') }}" method="post" class="login">
        @csrf
        <div class="field">
            <span class="fa fa-user"></span>
            <input name="name" type="text" placeholder="Nhập Tên của bạn" value="{{ old('name') }}">
        </div>
        @error('name')
            <span style="color:#ff3457">{{ $message }}</span> <br />
        @enderror
        <div class="field">
            <span class="fa fa-envelope"></span>
            <input name="email" type="text" placeholder="Nhập Email" value="{{ old('email') }}">
        </div>
        @error('email')
            <span style="color:#ff3457">{{ $message }}</span> <br />
        @enderror
        <div class="field">
            <span class="fa fa-lock"></span>
            <input name="password" type="password" placeholder="Nhập mật khẩu">
        </div>
        @error('password')
            <span style="color:#ff3457">{{ $message }}</span> <br />
        @enderror
        <div class="field">
            <span class="fa fa-lock"></span>
            <input name="confirm_password" type="password" placeholder="Nhập lại mật khẩu">
        </div>
        @error('confirm_password')
            <span style="color:#ff3457">{{ $message }}</span> <br />
        @enderror
        <input type="submit" class="submit" value="Đăng ký">
        <span class="login-form-copy">Bạn đã có tài khoản?
            <a href="{{ route('user-login') }}" class="login-form_sign-up">Đăng nhập</a>
        </span>
    </form>
</body>

</html>
