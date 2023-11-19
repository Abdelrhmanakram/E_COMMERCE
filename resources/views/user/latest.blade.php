<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>{{__('message.Latest Products')}}</h2>
            {{-- <a href="products.html">view all products <i class="fa fa-angle-right"></i></a> --}}
            <form action="{{url("search")}}" method="get" >
                <input type="text" name="key"  id="" class="form-control">
                <button type="submit" class="btn btn-success mt-2">search</button>
                </form>
          </div>
        </div>

       @yield("body")




      </div>
    </div>
  </div>
