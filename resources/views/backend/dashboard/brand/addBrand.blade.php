<!DOCTYPE html>
<html>

<head>
    <title>Category</title>
    <meta content="noindex, nofollow" name="robots">
    <link href="{{ asset('backend/css/dashboard/form.css') }}" rel="stylesheet">
</head>

<body>
    @extends('backend.dashboard.layouts.app')
    @section('content')
        <div class="wrapper">
            <div class="title">
                Tạo thương hiệu!
            </div>
            <form class="form" method="post" action="{{ route('admin-add_brand') }}">
                @csrf
                <div class="inputfield">
                    <label>Tên thương hiệu<span style="color:red">*</span></label>
                    <input name="name" type="text" class="input" value="{{ old('name') }}">
                </div>
                @error('name')
                    <span style="color:Red">{{ $message }}</span> <br />
                @enderror
                <div class="inputfield btn-submit">
                    <input type="submit" value="Thêm thương hiệu" class="btn">
                </div>
            </form>
        </div>
    @endsection
</body>

</html>
