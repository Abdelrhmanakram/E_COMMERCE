@extends('admin.layout')


@section('body')
{{-- user table --}}
<table class="table">

    <thead>
        <tr>Users</tr>

        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">role</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user )
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
        <td>  {{$user->name}} </a></td>
        <td>{{$user->email}}</td>
       <td>{{$user->role}}</td>

    </tr>
    @endforeach


</tbody>
</table>

<hr> <hr>

{{-- products table --}}
<table class="table">

    <thead>
        <tr>Products</tr>

        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">price</th>
            <th scope="col">Quantity</th>

            <th scope="col">Category ID</th>
            <th scope="col">Image</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product )
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
        <td>  {{$product->name}} </a></td>
        <td>{{$product->price}}</td>
        <td>{{$product->quantity}}</td>
        {{-- <td>{{$product->desc}}</td> --}}
        <td>{{$product->category_id}}</td>
        <td><img src="{{asset("storage/$product->image")}}" width="100 px" alt="" srcset=""></td>

    </tr>
    @endforeach


</tbody>
</table>




@endsection
