@extends('Admin.layout')

@section('body')

@include('errors')

@include('success')

<table class="table">

    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">price</th>
            <th scope="col">Quantity</th>

            <th scope="col">Category ID</th>
            <th scope="col">Image</th>
            <th scope="col">Aciton</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product )
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
        <td> <a href="{{url("products/show/$product->id")}}"> {{$product->name}} </a></td>
        <td>{{$product->price}}</td>
        <td>{{$product->quantity}}</td>
        {{-- <td>{{$product->desc}}</td> --}}
        <td>{{$product->category_id}}</td>
        <td><img src="{{asset("storage/$product->image")}}" width="100 px" alt="" srcset=""></td>
        <td>
            <a class="btn btn-success" href="{{url("product/edit/$product->id")}}" >edit</a>  <br>
            <form action="{{url("products/$product->id")}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
            <h1>

            </h1>
        </td>
    </tr>
    @endforeach


</tbody>
</table>
@endsection
