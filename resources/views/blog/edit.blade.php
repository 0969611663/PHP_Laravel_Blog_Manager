@extends('layouts.master')
@section('title', 'Chỉnh sửa khách hàng')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12"><h1>Chỉnh sửa khách hàng</h1></div>
            <div class="col-12">
                <form method="post" action="{{ route('blog_update', $blog->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên Blog</label>
                    <input type="text" class="form-control" name="name" value="{{ $blog->name }}" >
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <input type="text" class="form-control" name="content" value="{{ $blog->content }}" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Ảnh</label>
                    <input type="file" name="image" class="form-control-file" >
                </div>
                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection
