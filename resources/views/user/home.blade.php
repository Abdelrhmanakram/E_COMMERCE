@extends('user.layout')




@section('body')

@foreach ($products as $product )

<div class="col-md-4">
    <div class="product-item">
        <img src="{{asset("storage/$product->image")}}" alt="">
        <div class="down-content"> <br>
            <a href="{{url("products/showone/$product->id")}}"><h4>{{$product->name}}</h4></a>
            <h6>${{$product->price}}</h6>
            <a class="btn btn-success" class="alert alert-success" href="{{url("cart/$product->id")}}" >Add to cart</a>
        </div>
    </div>
</div>
@endforeach

{{-- {!! $products->links() !!} --}}

@endsection
