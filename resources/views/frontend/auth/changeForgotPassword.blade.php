<html>

<head>
  <title>Nông Trại Organic(Đổi mật khẩu)</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('frontend/css/auth.css') }}">
</head>

<body>
  <form action="{{ route('user-change_password', ['id' => $id, 'token' => $token]) }}" method="post" class="login">

    @csrf
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
    <input type="submit" class="submit" value="Đổi mật khẩu">
  </form>
</body>

</html>
