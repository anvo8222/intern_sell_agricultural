<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Hồ sơ của tôi</title>
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
    <form class="form-profile" action="{{ route('user-profile_update') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div style="display: flex">
        <label for="fname">Tên:</label><br>
        <input type="text" id="fname" name="name" value="{{ $user->name }}"><br>
      </div>
      @error('name')
        <span style="color:Red">{{ $message }}</span> <br />
      @enderror
      <div style="display: flex">
        <label for="fname">Email:</label><br>
        <input style="width: 100%" type="text" name="email" value="{{ $user->email }}" disabled><br>
      </div>
      @error('email')
        <span style="color:Red">{{ $message }}</span> <br />
      @enderror
      <div style="display: flex">
        <label for="fname">Số điện thoại:</label><br>
        <input type="number" value="{{ $user->phone }}" name="phone"><br>
      </div>
      @error('phone')
        <span style="color:Red">{{ $message }}</span> <br />
      @enderror
      <div style="display: flex">
        <label for="fname">Avatar:</label><br>
        <input name="avatar" style="border: none" type="file">
        <br>
      </div>
      @error('avatar')
        <span style="color:Red">{{ $message }}</span> <br />
      @enderror
      <div style="display: flex">
        <label for="fname">Địa chỉ:</label><br>
        <input style="width: 100%" type="text" id="fname" name="address" value="{{ $user->address }}"><br>
      </div>
      @error('address')
        <span style="color:Red">{{ $message }}</span> <br />
      @enderror
      <input class="submit" type="submit" value="Cập nhật">
    </form>
  @endsection
</body>

</html>
