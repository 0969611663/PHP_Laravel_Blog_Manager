@extends('layouts.master')
@section('title', 'Danh sách công viêc')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Danh sách công viêc</h2>
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
                    <th scope="col">Content</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $blog->content }}</td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Back</button>
        </div>
    </div>
@endsection
