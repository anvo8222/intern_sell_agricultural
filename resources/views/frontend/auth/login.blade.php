<html>

<head>
  <title>Nông Trại Organic(Đăng nhập)</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('frontend/css/auth.css') }}">
</head>

<body>
  <form action="{{ route('user-login') }}" method="post" class="login">
    @csrf
    @if (session()->has('register-success'))
      <p style="margin-bottom: 10px" class="alert alert-success">{{ session('register-success') }}</p>
    @endif
    @if (session()->has('register-active-sucess'))
      <p style="margin-bottom: 10px" class="alert alert-success">{{ session('register-active-sucess') }}</p>
    @endif
    @if ($errors->has('register-active-err'))
      <span style="color:#f14a4a;margin-bottom: 10px">
        <p>{{ $errors->first('register-active-err') }}</p>
      </span>
    @endif
    @if ($errors->has('err_active'))
      <span style="color:#f14a4a;margin-bottom: 10px">
        <p>{!! $errors->first('err_active') !!}</p>
      </span>
    @endif
    @if ($errors->has('err_login'))
      <span style="color:#f14a4a;margin-bottom: 10px">
        <p>{{ $errors->first('err_login') }}</p>
      </span>
    @endif
    <div class="field">
      <span class="fa fa-user"></span>
      <input name="email" type="text" placeholder="Nhập Email">
    </div>
    <div class="field">
      <span class="fa fa-lock"></span>
      <input name="password" type="password" placeholder="Nhập mật khẩu">
    </div>
    <div class="forgot-password">
      <a href="{{ route('user-forgot_password') }}">Quân mật khẩu?</a>
    </div>
    <input type="submit" class="submit" value="Đăng nhập">

    <span class="login-form-copy">Bạn chưa có tài khoản?
      <a href="{{ route('user-register') }}" class="login-form_sign-up">Đăng ký</a>
    </span>
  </form>
</body>

</html>
