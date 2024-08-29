<html>

<head>
  <title>Nông Trại Organic(Quên mật khẩu)</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('frontend/css/auth.css') }}">
</head>

<body>
  <form action="{{ route('user-forgot_password') }}" method="post" class="login">
    @csrf
    <h2 style="font-size:16px; margin:10px 0;">Nhập email để lấy lại mật khẩu</h2>
    @if (session()->has('err'))
      <p style="margin-bottom: 10px; color:rgb(255, 74, 74);" class="alert alert-success">{{ session('err') }}</p>
    @endif
    @if (session()->has('forgot-success'))
      <p style="margin-bottom: 10px;" class="alert alert-success">{{ session('forgot-success') }}</p>
    @endif

    <div class="field">
      <span class="fa fa-envelope"></span>
      <input name="email" type="text" placeholder="Nhập Email" value="{{ old('email') }}">
    </div>
    @error('email')
      <span style="color:#ff3457">{{ $message }}</span> <br />
    @enderror
    <input type="submit" class="submit" value="Quên mật khẩu">
    <span class="login-form-copy">Bạn đã nhớ mật khẩu?
      <a href="{{ route('user-login') }}" class="login-form_sign-up">Đăng nhập</a>
    </span>
  </form>
</body>

</html>
