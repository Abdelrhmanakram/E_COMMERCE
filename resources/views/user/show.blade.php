@extends('user.layout')



@section('body')


<div class="col-md-2">
    <div class="product-item">
     <img src="{{asset("storage/$product->image")}}"" alt=""  style="width:auto;" srcset="">
        <div class="down-content"> <br>
           <h4>{{$product->name}}</h4>
           <p>{{$product->desc}}</p>
            <h6>${{$product->price}}</h6>
        </div>
    </div>
</div>

@endsection







