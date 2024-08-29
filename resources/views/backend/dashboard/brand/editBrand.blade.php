<!DOCTYPE html>
<html lang="en">

<head>
    <title>Category</title>
    <meta content="noindex, nofollow" name="robots">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <!-- Include CSS File Here-->
    <link href="{{ asset('backend/css/dashboard/form.css') }}" rel="stylesheet">
</head>

<body>
    @extends('backend.dashboard.layouts.app')
    @section('content')
        <div class="wrapper">
            <div class="title">
                Cập nhật thương hiệu!
            </div>
            <form class="form" method="post"
                action="{{ route('admin-edit_brand', ['id' => $brand->id]) }}"enctype="multipart/form-data">
                @csrf
                <div class="inputfield">
                    <label>Tên thương hiệu<span style="color:red">*</span></label>
                    <input name="name" type="text" class="input" value="{{ $brand->name }}">
                </div>
                @error('name')
                    <span style="color:Red">{{ $message }}</span> <br />
                @enderror
                <div class="inputfield">
                    <input type="submit" value="Cập nhật" class="btn">
                </div>
            </form>
        </div>
    @endsection
</body>

</html>
