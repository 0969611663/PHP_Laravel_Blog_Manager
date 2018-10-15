@extends('layouts.master')

@section('title', 'Thêm mới Blog')


@section('content')

    <div class="row">

        <div class="col-md-12">

            <h2>Thêm mới Blog</h2>

        </div>

        <div class="col-md-12">

            <form method="post" action="{{ route('blog_store') }}" enctype="multipart/form-data">

            @csrf

            <div class="form-group">

                <label>Tên Blog</label>

                <input type="text" class="form-control" name="name" required>

            </div>

            <div class="form-group">

                <label>Nội dung</label>

                <textarea class="form-control" rows="3" name="content" required></textarea>

            </div>

            <div class="form-group">

                <label>Tên tac gia</label>

                <input type="text" class="form-control" name="author" required>

            </div>

            <div class="form-group">

                <label for="exampleFormControlFile1">Ngày xuat ban</label>

                <input type="date" name="publish" class="form-control" required>

            </div>

            <div class="form-group">

                <label for="exampleFormControlFile1">Ảnh</label>

                <input type="file" name="image" class="form-control-file" required>

            </div>


            <button type="submit" class="btn btn-primary">Thêm mới</button>

            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>

            </form>

        </div>

    </div>


@endsection
