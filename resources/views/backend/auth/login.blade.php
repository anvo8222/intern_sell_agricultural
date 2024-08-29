<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="{{ asset('backend/css/auth/login.css') }}">

</head>

<body>
  <div class="center">
    <h1>Login</h1>
    <form id="form" action="{{ route('admin-login') }}" method="post">
      @csrf
      <div class="txt_field">
        <input name="email" type="text" required value="{{ old('email') }}">
        <span></span>
        <label>Email</label>
      </div>
      <div class="txt_field">
        <input name="password" type="password" required>
        <span></span>
        <label>Password</label>
      </div>
      {{-- <div class="pass">Forgot Password?</div> --}}
      <input type="submit" value="Login">
      <div class="signup_link">
        {{-- Not a member? <a href="#">Signup</a> --}}
        @if ($errors->has('err'))
          <span style="color:red">
            <strong>{{ $errors->first('err') }}</strong>
          </span>
        @endif
      </div>
    </form>
  </div>

</body>

</html>
