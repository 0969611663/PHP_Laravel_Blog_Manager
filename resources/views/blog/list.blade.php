@extends('layouts.master')
@section('title', 'Danh sách công viêc')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Danh Sách Blog</h2>
        </div>
        <div class="col-12">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ Session::get('success') }}
                </p>
            @endif
        </div>
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name Blog</th>
                    <th scope="col">Author</th>
                    <th scope="col">Publish</th>
                    <th scope="col">image</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($blogs as $key => $blog)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $blog->name }}</td>
                        <td>{{ $blog->author }}</td>
                        <td>{{ $blog->publish }}</td>
                        <td>
                            @if($blog->image)
                                <a href="{{ route('blog_show', $blog->id) }}">
                                    <img src="{{ asset('storage/'.$blog->image) }}" alt="" style="width: 200px; height: 200px">
                                </a>
                            @else
                                {{'Chưa có ảnh'}}
                            @endif
                        </td>
                        <td><a href="{{ route('blog_edit', $blog->id) }}">sửa</a></td>
                        <td><a href="{{ route('blog_destroy', $blog->id) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('blog_create') }}" class="btn btn-primary">Thêm mới</a>
        </div>
    </div>
@endsection
