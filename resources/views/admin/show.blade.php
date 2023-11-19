
@extends('Admin.layout')

@section('body')

Product name: {{$product->name}}   <br> <br>
Product desc: {{$product->desc}} <br> <br>
Product price: {{$product->price}} <br> <br>
Product quantity: {{$product->quantity}}  <br>   <br>
Product category_id: {{$product->category_id}} <br>   <br>
Product image: <img src="{{asset("storage/$product->image")}} " width="150 px" alt="" srcset=""> <br>


@endsection
