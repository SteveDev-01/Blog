
<?php

use App\Models\user;
$users = new User();
$users = $users->get();

?>

@extends('admin.layout')
@section('content')
    <div class="container mt-4">
        <h3>Users</h3>
        <form action="{{url('/create_user')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="">Name: </label>
                <input type="text" class="form-control" name="name">
                <label for="">Email: </label>
                <input type="email" class="form-control" name="email" >
                <label for="">Password </label>
                <input type="password" class="form-control" name="password" >


            </div>
            <button class="btn btn-primary">Create</button>

        </form>

        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $item)
                <tr>
                    <td>{{$item->name}} </td>
                    <td>{{$item->email}} </td>
                    <td>{{$item->password}} </td>

                    <td>{{$item->created_at}} </td>
                    <td>
                        <a href="{{url('/del_user')}}/{{$item->id}}" class="btn btn-danger">Delete</a>
                    </td>

                </tr>


            @endforeach

            </tbody>
        </table>


    </div>

@endsection
