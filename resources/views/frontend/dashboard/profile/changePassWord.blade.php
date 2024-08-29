<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Thay đổi mật khẩu</title>
  <style>
    .form-profile {
      background-color: #fff;
      margin: auto auto;
      padding: 10px;
      border-radius: 10px;
    }

    .form-profile div {
      margin: 20px 0;
    }

    .form-profile div label {
      min-width: 110px;
    }

    .form-profile div input {
      border: 1px solid #ccc;
      padding: 4px;
      border-radius: 4px;
    }

    .form-profile div input:focus {
      outline: solid 1px rgb(229, 229, 229);
    }

    .form-profile .submit {
      display: block;
      width: 100px;
      font-size: 16px;
      margin: 0 auto;
      border: none;
      background-color: #27ae60;
      padding: 4px;
      margin-top: 10px;
      border-radius: 4px;
      cursor: pointer;
      color: #fff;
    }

    .form-profile .submit:hover {
      background-color: #07652f;

    }
  </style>
</head>

<body>
  @extends('frontend.dashboard.layouts.app')
  @section('content')
    @include('sweetalert::alert')
    <form class="form-profile" action="{{ route('user-update_password') }}" method="post">
      @csrf
      <div style="display: flex">
        <label for="fname">Mật khẩu cũ:</label><br>
        <input id="fname" type="password" name="oldPassword"><br>
      </div>
      @error('oldPassword')
        <span style="color:Red">{{ $message }}</span> <br />
      @enderror
      <div style="display: flex">
        <label for="fname">Mật khẩu mới:</label><br>
        <input style="width: 100%" type="password" name="newPassword"><br>
      </div>
      @error('newPassword')
        <span style="color:Red">{{ $message }}</span> <br />
      @enderror
      <div style="display: flex">
        <label for="fname">Nhập lại mật khẩu:</label><br>
        <input type="password" name="password_confirm"><br>
      </div>
      @error('password_confirm')
        <span style="color:Red">{{ $message }}</span> <br />
      @enderror
      <input class="submit" type="submit" value="Cập nhật">
    </form>
  @endsection
</body>

</html>
