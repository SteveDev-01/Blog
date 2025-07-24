@php
    use App\Models\Post;
    use App\Models\Category;

    $categories = Category::all();
    $posts = Post::all();
@endphp

@extends('admin.layout')
@section('content')
    <div class="container mt-4">
        <h3>Posts</h3>
        <form action="{{ url('/create_post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="">Image: </label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="mb-3">
                <label for="">Title: </label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="category">Category: </label>
                <select name="category" class="form-select">
                    <option value="">Select</option>
                    @foreach($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="content">Content: </label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Create</button>
            </div>
        </form>

        <table class="table">
            <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Content</th>
                <th>Category</th>
                <th>Created by</th>
                <th>Created at</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $item)
                <tr>
                    <td>
                        <img src="{{ asset('images/' . $item->image) }}" style="width: 100px; object-fit: cover;" alt="">
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->content }}</td>
                  <td>{{ $item->categoryData->name }}</td>
                    <td>{{$item->userData->name}}</td>
{{--                    <td>{{ optional($item->categoryData)->name ?? 'Keine Kategorie' }}</td>--}}
{{--                    <td>{{ optional($item->userData)->name ?? 'Unbekannter Benutzer' }}</td>--}}

                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ url('/delete_post/' . $item->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
