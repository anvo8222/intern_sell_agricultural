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
                Tạo danh mục!
            </div>
            <form class="form" method="post" action="{{ route('admin-add_category') }}" enctype="multipart/form-data">
                @csrf
                <div class="inputfield">
                    <label>Tên danh mục<span style="color:red">*</span></label>
                    <input name="name" type="text" class="input" value="{{ old('name') }}">
                </div>
                @error('name')
                    <span style="color:Red">{{ $message }}</span> <br />
                @enderror
                <div class="inputfield">
                    <label>Hình ảnh </label>
                    <input name="image" type="file" class="input">
                </div>
                @error('image')
                    <span style="color:Red">{{ $message }}</span> <br />
                @enderror
                <div class="inputfield">
                    <label>Mô tả </label>
                    <textarea name="description" class="textarea">{{ old('description') }}</textarea>
                </div>
                @error('description')
                    <span style="color:Red">{{ $message }}</span> <br />
                @enderror
                <div class="inputfield">
                    <input type="submit" value="Thêm danh mục" class="btn">
                </div>
            </form>
        </div>
    @endsection
</body>

</html>
